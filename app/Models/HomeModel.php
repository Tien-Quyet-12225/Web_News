<?php

namespace App\Models;

use App\Models\BaseModel;

class HomeModel extends BaseModel
{
    public function latest()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 8; // số bài viết trên 1 trang
        $offset = ($page - 1) * $limit;

        $sql = "SELECT a.id, a.title, a.image, a.created_at, a.content,
                        u.full_name, c.name as category, c.id as category_id,
                        IFNULL(v.view_count, 0) as view_count,
                        (SELECT COUNT(*) FROM comments WHERE article_id = a.id) as comment_count
                FROM articles a 
                JOIN users u ON a.author_id = u.id 
                JOIN categories c ON a.category_id = c.id 
                LEFT JOIN article_views v ON a.id = v.article_id 
                ORDER BY a.created_at DESC 
                LIMIT " . $limit . " OFFSET " . $offset;

        $articles = $this->query($sql);

        return [
            'articles' => $articles,
            'current_page' => $page,
            'per_page' => $limit,
            'total' => $this->getTotalArticles()
        ];
    }

    public function getTotalArticles()
    {
        $sql = "SELECT COUNT(*) as total FROM articles";
        $result = $this->query($sql, [], false);
        return $result['total'];
    }

    public function getSliderArticles()
    {
        $sql = "SELECT a.id, a.title, a.image, a.created_at, a.content,
                        u.full_name, c.name as category, c.id as category_id,
                        IFNULL(v.view_count, 0) as view_count,
                        (SELECT COUNT(*) FROM comments WHERE article_id = a.id) as comment_count
                FROM articles a 
                JOIN users u ON a.author_id = u.id 
                JOIN categories c ON a.category_id = c.id 
                LEFT JOIN article_views v ON a.id = v.article_id 
                ORDER BY a.created_at DESC 
                LIMIT 5";  // Lấy 5 bài viết mới nhất cho slider

        return $this->query($sql);
    }

    public function featured()
    {
        $sql = "SELECT a.id, a.title, a.image, a.created_at, 
                       c.name as category, c.id as category_id,
                       IFNULL(v.view_count, 0) as view_count,
                       (SELECT COUNT(*) FROM comments WHERE article_id = a.id) as comment_count
                FROM articles a
                JOIN categories c ON a.category_id = c.id
                LEFT JOIN article_views v ON a.id = v.article_id
                ORDER BY v.view_count DESC 
                LIMIT 4";
        return $this->query($sql);
    }

    public function getArtById($id)
    {
        $sql = "SELECT a.id, a.title, a.content, a.updated_at, u.username
                FROM articles a
                JOIN users u ON a.author_id = u.id
                WHERE a.id = :id";
        $params = [
            'id' => $id
        ];
        return $this->query($sql, $params, false);
    }

    public function getCmtById($id)
    {
        $sql = "SELECT c.id, c.content, c.created_at, u.username
                FROM comments c
                JOIN users u ON c.user_id = u.id
                WHERE c.article_id = :id
                ORDER BY c.created_at DESC";
        $params = [
            'id' => $id
        ];
        return $this->query($sql, $params);
    }

    public function updateView($article_id)
    {
        $sql = "UPDATE article_views SET view_count = view_count + 1 WHERE article_id = :id";
        $params = [
            'id' => $article_id
        ];
        return $this->query($sql, $params, false);
    }

    public function getPopularPosts()
    {
        $sql = "SELECT a.id, a.title, a.created_at, c.name as category 
                FROM articles a
                JOIN categories c ON a.category_id = c.id
                LEFT JOIN article_views v ON a.id = v.article_id
                ORDER BY v.view_count DESC
                LIMIT 3";
        return $this->query($sql);
    }

    public function getCategories()
    {
        $sql = "SELECT * FROM categories ORDER BY name ASC";
        return $this->query($sql);
    }

    public function like($id)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $articleid = $id;
        $userid = $_SESSION['user']['id'];
        // var_dump($userid);
        // die;
        $data = [
            'article_id' => $articleid,
            'user_id' => $userid
        ];
        return $this->create('article_likes', $data);
    }

    public function unlike($id)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $articleid = $id;
        $userid = $_SESSION['user']['id'];
        // var_dump($userid);
        // die;
        $sql = "DELETE FROM article_likes WHERE article_id = :article_id AND user_id = :user_id";
        $params = [
            'article_id' => $articleid,
            'user_id' => $userid
        ];
        return $this->query($sql, $params, false);
    }

    public function isLiked($id)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $articleid = $id;
        $userid = $_SESSION['user']['id'];
        // var_dump($userid);
        // die;
        $sql = "SELECT * FROM article_likes WHERE article_id = :article_id AND user_id = :user_id";
        $params = [
            'article_id' => $articleid,
            'user_id' => $userid
        ];
        return $this->query($sql, $params, false);
    }

    public function getLikeCount($id)
    {
        $sql = "SELECT COUNT(*) as like_count FROM article_likes WHERE article_id = :article_id";
        $params = [
            'article_id' => $id
        ];
        return $this->query($sql, $params, false);
    }

    public function search($keyword)
    {
        $sql = "SELECT a.id, a.title, a.content, a.image, a.created_at, 
                        u.full_name, c.id as category_id, c.name as category, IFNULL(v.view_count, 0) as view_count, 
                        COUNT(com.id) as comment_count 
                FROM articles a 
                JOIN users u ON a.author_id = u.id 
                JOIN categories c ON a.category_id = c.id 
                LEFT JOIN article_views v ON a.id = v.article_id 
                LEFT JOIN comments com ON a.id = com.article_id 
                WHERE a.title LIKE :keyword OR a.content LIKE :keyword
                GROUP BY a.id, a.title, a.content, a.image, a.created_at, u.full_name, c.id, c.name, v.view_count 
                ORDER BY a.created_at DESC";

        $params = [
            'keyword' => '%' . $keyword . '%'
        ];

        return $this->query($sql, $params);
    }
}