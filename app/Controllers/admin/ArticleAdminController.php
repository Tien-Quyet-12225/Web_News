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
    $this->render('admin.articles.all_articles', compact('articles'));
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
        $title = $_POST['title'];
        $content = $_POST['content'];
        $category_id = $_POST['category_id'];
        $author_id = $_SESSION['user']['id'];// lấy id ng dùng từ phiên 
        
        // ktra các trg
        $errors = [];
        if (empty($title)) {
          $errors['title'] = 'Vui lòng nhập tiêu đề bài viết';
        }
        if (empty($content)) {
          $errors['content'] = 'Vui lòng nhập nội dung bài viết';
        }
        if (empty($category_id)) {
          $errors['category_id'] = 'Vui lòng chọn danh mục bài viết';
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

}