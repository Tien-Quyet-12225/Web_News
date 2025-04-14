<?php

namespace App\Models;

class Article extends BaseModel
{
    protected $table = 'articles';

    public function getPopularPosts($limit = 3)
    {
        $sql = "SELECT a.*, c.name as category, c.id as category_id,
                       u.full_name,
                       IFNULL(v.view_count, 0) as view_count,
                       (SELECT COUNT(*) FROM comments WHERE article_id = a.id) as comment_count
                FROM {$this->table} a
                JOIN categories c ON a.category_id = c.id
                JOIN users u ON a.author_id = u.id
                LEFT JOIN article_views v ON a.id = v.article_id
                ORDER BY v.view_count DESC 
                LIMIT " . (int)$limit;

        $result = $this->query($sql);
        return is_array($result) ? $result : [];
    }

    public function getPostsByCategory($categoryId, $limit = 12)
    {
        $sql = "SELECT a.*, c.name as category, c.id as category_id,
                       u.full_name,
                       IFNULL(v.view_count, 0) as view_count,
                       (SELECT COUNT(*) FROM comments WHERE article_id = a.id) as comment_count
                FROM {$this->table} a
                JOIN categories c ON a.category_id = c.id
                JOIN users u ON a.author_id = u.id
                LEFT JOIN article_views v ON a.id = v.article_id
                WHERE a.category_id = :category_id
                ORDER BY a.created_at DESC 
                LIMIT " . (int)$limit;

        $result = $this->query($sql, [
            'category_id' => $categoryId
        ]);
        return is_array($result) ? $result : [];
    }

    public function findById($id)
    {
        $sql = "SELECT a.*, c.name as category, c.id as category_id,
                       u.full_name,
                       IFNULL(v.view_count, 0) as view_count,
                       (SELECT COUNT(*) FROM comments WHERE article_id = a.id) as comment_count
                FROM {$this->table} a
                JOIN categories c ON a.category_id = c.id
                JOIN users u ON a.author_id = u.id
                LEFT JOIN article_views v ON a.id = v.article_id
                WHERE a.id = :id";

        return $this->query($sql, ['id' => $id], false);
    }

    public function incrementViews($id)
    {
        $sql = "INSERT INTO article_views (article_id, view_count) 
                VALUES (:id, 1)
                ON DUPLICATE KEY UPDATE view_count = view_count + 1";
        return $this->query($sql, ['id' => $id]);
    }
}
