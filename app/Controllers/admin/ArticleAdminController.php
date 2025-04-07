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

          } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

}