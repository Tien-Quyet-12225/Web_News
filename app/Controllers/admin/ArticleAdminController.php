<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\Admin\ArticleAdminModel;

use App\Models\Admin\CategoryAdminModel;
use Exception;
use DOMDocument;

class ArticleAdminController extends BaseController
{
  protected $articleAdminModel;
  protected $categoryAdminModel;

  public function __construct()
  {
    $this->articleAdminModel = new ArticleAdminModel();
    $this->categoryAdminModel = new CategoryAdminModel();
  }

  public function article_list()
  {

    $articles = $this->articleAdminModel->list();

    $this->render('admin.articles.all_article', compact('articles'));
  }

  public function form_add()
  {
    $categories = $this->categoryAdminModel->list();

    $this->render('admin.articles.add_article', compact('categories'));
  }

  public function article_add()
  {
    try {
      start_session();
      if ($this->isPost() && isset($_POST['btn-add'])) {
        // Lấy dữ liệu từ form
        $title = $_POST['title'];
        $content = $_POST['content'];
        $category_id = $_POST['category'];

        $author_id = $_SESSION['user']['id']; // Lấy ID người dùng từ phiên

        // Kiểm tra các trường bắt buộc
        $errors = [];
        if (empty($title)) {
          $errors[] = "Tiêu đề là bắt buộc.";
        }
        if (empty($content)) {
          $errors[] = "Nội dung là bắt buộc.";
        }
        if (empty($category_id)) {
          $errors[] = "Danh mục là bắt buộc.";
        }

        // Xử lý tải lên hình ảnh từ form
        $imageFileName = '';
        if (!empty($_FILES['image']['name'])) {
          $target_dir = PATH_ROOT . "public/uploads/image/";
          $imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
          $imageFileName = time() . '.' . $imageFileType;
          $target_file = $target_dir . $imageFileName;

          // Kiểm tra kiểu tệp và kích thước tệp
          $check = getimagesize($_FILES["image"]["tmp_name"]);
          if ($check === false) {
            $errors[] = "Tệp không phải là hình ảnh.";
          }
          if ($_FILES["image"]["size"] > 5000000) {
            $errors[] = "Tệp hình ảnh quá lớn.";
          }
          if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
            $errors[] = "Chỉ cho phép các định dạng JPG, JPEG, PNG và GIF.";
          }

          // Nếu không có lỗi, di chuyển tệp hình ảnh
          if (empty($errors)) {
            if (!is_dir($target_dir)) {
              mkdir($target_dir, 0755, true); // Tạo thư mục nếu chưa tồn tại
            }
            if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
              $errors[] = "Lỗi khi tải lên hình ảnh.";
            }
          }
        }

        // Xử lý ảnh trong nội dung (Summernote)
        $dom = new DOMDocument();
        @$dom->loadHTML('<?xml encoding="utf-8" ?>' . $content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        $image_ids = [];

        foreach ($images as $img) {

          $src = $img->getAttribute('src');

          if (strpos($src, 'data:image') === 0) {
            $data = explode(',', $src);
            $mime = explode(';', $data[0]);
            $type = explode(':', $mime[0]);
            $extension = explode('/', $type[1])[1];

            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            if (in_array($extension, $allowedExtensions)) {

              $image_data = base64_decode($data[1]);

              $file_name = time() . '-' . uniqid() . '.' . $extension;

              $file_src = BASE_URL . '/uploads/image/' . $file_name;

              $file_path = PATH_ROOT . 'public/uploads/image/' . $file_name;

              file_put_contents($file_path, $image_data);

              $img->setAttribute('src', BASE_URL . 'uploads/image/' . $file_name);

              $image_id = $this->articleAdminModel->add_image($file_name, $file_src);
              if ($image_id) {
                $image_ids[] = $image_id;
              }
            } else {
              $errors[] = 'Không cho phép định dạng ảnh trong nội dung.';
            }
          }
        }

        $content = $dom->saveHTML();

        // Nếu không có lỗi, thêm tin tức vào cơ sở dữ liệu
        if (empty($errors)) {
          $article_id = $this->articleAdminModel->add($title, $content, $author_id, $category_id, $imageFileName);
          if ($article_id) {
            foreach ($image_ids as $image_id) {
              $this->articleAdminModel->add_article_image($article_id, $image_id);
            }
            $_SESSION['toastr'] = [
              'type' => 'success',
              'message' => 'Tin tức đã được thêm thành công.'
            ];
          } else {
            $_SESSION['toastr'] = [
              'type' => 'error',
              'message' => 'Lỗi khi thêm tin tức.'
            ];
          }
        } else {
          $_SESSION['toastr'] = [
            'type' => 'error',
            'message' => implode('<br>', $errors)
          ];
        }
      } else {
        $_SESSION['toastr'] = [
          'type' => 'error',
          'message' => 'Không nhận được request.'
        ];
      }
      $this->redirect(BASE_URL_ADMIN . 'article-list');
    } catch (Exception $e) {
      dd($e->getMessage());
    }
  }

  public function article_delete($id)
  {
    try {

      // lấy data content bài viết
      $article = $this->articleAdminModel->find('articles', $id);

      // kiểm tra bài viết có tồn tại hay không
      if (!$article) {
        echo json_encode(['status' => 'error', 'message' => 'News not found']);
        return;
      }

      // lấy content
      $content = $article['content'];

      //tạo document từ content
      $dom = new DOMDocument();
      @$dom->loadHTML('<?xml encoding="utf-8"?>' . $content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

      //quét bài viết và lấy danh sách các hình ảnh có trong content
      $images = $dom->getElementsByTagName('img');

      //xóa file ảnh trong content
      //check nếu content không có ảnh thì bỏ qua
      if ($images->length > 0) {
        foreach ($images as $img) {
          //lấy url của ảnh
          $src = $img->getAttribute('src');
          //lấy đường dẫn tuyệt đối
          $relative_path = str_replace(BASE_URL, '', $src);
          //lấy đường dẫn tuyệt đối của thư mục chứa ảnh
          $dir_path = PATH_ROOT . 'public/' . $relative_path;
          //xóa file ảnh
          if (file_exists($dir_path)) {
            unlink($dir_path);
          }
        }
      }

      //xoá hình đại diện
      if (!empty($article['image'])) {
        $image_path = PATH_ROOT . 'public/uploads/image/' . $article['image'];
        if (file_exists($image_path)) {
          unlink($image_path);
        }
      }

      $result = $this->articleAdminModel->del($id);
      if ($result) {
        echo json_encode(['status' => 'success', 'message' => 'Category Deleted Successfully']);
      } else {
        echo json_encode(['status' => 'error', 'message' => 'Category Deleted Failed']);
      }
    } catch (Exception $e) {
      dd($e->getMessage());
    }
  }


  public function article_edit($id)
  {
    try {
      $categories = $this->categoryAdminModel->list();
      $article = $this->articleAdminModel->getArtById($id);

      if (!$article) return "Article Not Found";

      $this->render('admin.articles.edit_article', compact('categories', 'article'));
      // $this->render('welcome', compact('categories', 'article'));
    } catch (Exception $e) {
      dd($e->getMessage());
    }
  }

  public function article_update()
  {
    try {
      start_session();
      if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn-edit'])) {

        $id = $_POST['articleId'];

        $title = $_POST['newTitle'];

        $content = $_POST['newContent'];

        $category_id = $_POST['newCategory'];

        $article = $this->articleAdminModel->find('articles', $id);

        $current_img = $article['image'];

        // Xử lý tải lên hình ảnh đại diện từ form
        $imageFileName = '';
        if (!empty($_FILES['newImage']['name'])) {
          $target_dir = PATH_ROOT . "public/uploads/image/";
          $imageFileType = strtolower(pathinfo($_FILES["newImage"]["name"], PATHINFO_EXTENSION));
          $imageFileName = time() . '.' . $imageFileType;
          $target_file = $target_dir . $imageFileName;

          // Kiểm tra kiểu tệp và kích thước tệp
          $check = getimagesize($_FILES["newImage"]["tmp_name"]);
          if ($check === false) {
            $errors[] = "Tệp không phải là hình ảnh.";
          }
          if ($_FILES["image"]["size"] > 5000000) {
            $errors[] = "Tệp hình ảnh quá lớn.";
          }
          if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
            $errors[] = "Chỉ cho phép các định dạng JPG, JPEG, PNG và GIF.";
          }

          // Nếu không có lỗi, di chuyển tệp hình ảnh
          if (empty($errors)) {
            if (!is_dir($target_dir)) {
              mkdir($target_dir, 0755, true); // Tạo thư mục nếu chưa tồn tại
            }
            if (!move_uploaded_file($_FILES["newImage"]["tmp_name"], $target_file)) {
              $errors[] = "Lỗi khi tải lên hình ảnh.";
            }
            if (file_exists($target_dir . $current_img)) {
              unlink($target_dir . $current_img);
            } else {
              $errors[] = "Lỗi khi xoá hình ảnh đại diện.";
            }
          }
        } else {
          $imageFileName = $current_img;
        }



        // lấy ảnh content cũ từ serve
        $old_images = $this->articleAdminModel->getArtImg($id);

        $old_images_src = [];
        //tách lấy file path
        foreach ($old_images as $old_image) {
          $old_images_src[] = $old_image['file_path'];
        }

        // Xử lý ảnh trong nội dung mới
        $dom = new DOMDocument();
        @$dom->loadHTML('<?xml encoding="utf-8" ?>' . $content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $new_images = $dom->getElementsByTagName('img');
        $new_image_srcs = [];
        $image_ids = [];
        foreach ($new_images as $img) {

          //lưu src của tất cả img trong content mới
          $new_image_srcs[] = $img->getAttribute('src');

          //lưu các ảnh dạng data:image
          $src = $img->getAttribute('src');

          if (strpos($src, 'data:image') === 0) {
            $data = explode(',', $src);
            $mime = explode(';', $data[0]);
            $type = explode(':', $mime[0]);
            $extension = explode('/', $type[1])[1];

            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            if (in_array($extension, $allowedExtensions)) {

              $image_data = base64_decode($data[1]);

              $file_name = time() . '-' . uniqid() . '.' . $extension;

              $file_src = BASE_URL . '/uploads/image/' . $file_name;

              $file_path = PATH_ROOT . 'public/uploads/image/' . $file_name;

              file_put_contents($file_path, $image_data);

              // set lại src sau khi lưu

              $img->setAttribute('src', BASE_URL . 'uploads/image/' . $file_name);

              $image_id = $this->articleAdminModel->add_image($file_name, $file_src);
              if ($image_id) {
                $image_ids[] = $image_id;
              }
            } else {
              $errors[] = 'Không cho phép định dạng ảnh trong nội dung.';
            }
          }
        }

        $content = $dom->saveHTML();


        //so sánh file_path và new file_path

        $delete_img = array_diff($old_images_src, $new_image_srcs);

        //xoá những ảnh không dùng trong content

        foreach ($delete_img as $img) {
          //lấy đường dẫn tuyệt đối
          $relative_path = str_replace(BASE_URL, '', $img);
          //lấy đường dẫn tuyệt đối của thư mục chứa ảnh
          $dir_path = PATH_ROOT . 'public/' . $relative_path;
          //xóa file ảnh
          if (file_exists($dir_path)) {
            unlink($dir_path);
          }

          //xóa ảnh trong csdl
          $log = $this->articleAdminModel->deleteByColumn('images', 'file_path', $img);

          if (!$log) {
            $errors[] = "Lỗi khi xoá ảnh ở bảng images";
          }
        }


        // Nếu không có lỗi, thêm tin tức vào cơ sở dữ liệu
        if (empty($errors)) {
          $result = $this->articleAdminModel->updt($id, $title, $content, $category_id, $imageFileName);
          if ($result) {
            foreach ($image_ids as $image_id) {
              $this->articleAdminModel->add_article_image($id, $image_id);
            }
            $_SESSION['toastr'] = [
              'type' => 'success',
              'message' => 'Tin tức đã được update thành công.'
            ];
          } else {
            $_SESSION['toastr'] = [
              'type' => 'error',
              'message' => 'Lỗi khi update tin tức.'
            ];
          }
        } else {
          $_SESSION['toastr'] = [
            'type' => 'error',
            'message' => implode('<br>', $errors)
          ];
        }
      } else {
        $_SESSION['toastr'] = [
          'type' => 'error',
          'message' => 'Không nhận được request.'
        ];
      }
      $this->redirect(BASE_URL_ADMIN . 'article-list');
    } catch (Exception $e) {
      dd($e->getMessage());
    }
  }
}
