<?php

namespace App\Controllers;

use App\Models\Article;
use App\Models\Category;

class CategoryController extends BaseController
{
    private $articleModel;
    private $categoryModel;

    public function __construct()
    {
        $this->articleModel = new Article();
        $this->categoryModel = new Category();
    }

    public function show($id)
    {
        try {
            // Lấy thông tin category
            $category = $this->categoryModel->findById($id);
            if (!$category) {
                header("Location: " . BASE_URL);
                exit;
            }

            // Lấy danh sách bài viết thuộc category này
            $articles = $this->articleModel->getPostsByCategory($id);

            // Lấy categories cho sidebar
            $categories = $this->categoryModel->all();

            // Lấy bài viết phổ biến cho sidebar
            $popular = $this->articleModel->getPopularPosts();

            // Lưu categories vào session nếu chưa có
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            if (!isset($_SESSION['categories'])) {
                $_SESSION['categories'] = $categories;
            }

            return $this->render('category.show', compact('category', 'articles', 'categories', 'popular'));
        } catch (\Exception $e) {
            // Log lỗi và redirect về trang chủ
            error_log("Error in CategoryController show method: " . $e->getMessage());
            header("Location: " . BASE_URL);
            exit;
        }
    }
}