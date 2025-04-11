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
        try {
            $this->articleModel = new Article();
            $this->categoryModel = new Category();
        } catch (\Exception $e) {
            error_log("Error in CategoryController constructor: " . $e->getMessage());
            error_log("Stack trace: " . $e->getTraceAsString());
        }
    }

    public function show($id)
    {
        try {
            // Debug input
            error_log("Category ID received: " . $id);

            // Lấy thông tin category
            $category = $this->categoryModel->findById($id);
            error_log("Category data: " . print_r($category, true));
            
            if (!$category) {
                error_log("Category not found for ID: " . $id);
                return $this->redirect('/');
            }

            // Lấy danh sách bài viết thuộc category này
            $articles = $this->articleModel->getPostsByCategory($id);
            error_log("Articles data: " . print_r($articles, true));
            
            // Lấy categories cho sidebar
            $categories = $this->categoryModel->all();
            error_log("All categories: " . print_r($categories, true));
            
            // Lấy bài viết phổ biến cho sidebar
            $popular_posts = $this->articleModel->getPopularPosts();
            error_log("Popular articles: " . print_r($popular_posts, true));

            // Debug final data
            $viewData = [
                'category' => $category,
                'articles' => $articles,
                'categories' => $categories,
                'popular' => $popular_posts
            ];
            error_log("Final view data: " . print_r($viewData, true));

            return $this->render('category.show', $viewData);
            
        } catch (\Exception $e) {
            error_log("Error in CategoryController show method: " . $e->getMessage());
            error_log("Stack trace: " . $e->getTraceAsString());
            // Hiển thị lỗi cho người dùng
            echo "Có lỗi xảy ra: " . $e->getMessage();
            return;
        }
    }
} 