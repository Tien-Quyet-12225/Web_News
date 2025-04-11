<?php

namespace App\Models;

class Post extends BaseModel
{
    protected $table = 'posts';

    public function getPopularPosts($limit = 3)
    {
        $sql = "SELECT p.*, c.name as category FROM {$this->table} p 
                LEFT JOIN categories c ON p.category_id = c.id 
                ORDER BY p.views DESC LIMIT " . (int)$limit;
        $result = $this->query($sql);
        error_log("Popular Posts SQL: " . $sql);
        error_log("Popular Posts Result: " . print_r($result, true));
        return is_array($result) ? $result : [];
    }

    public function getPostsByCategory($categoryId, $limit = 10)
    {
        $sql = "SELECT p.*, c.name as category FROM {$this->table} p 
                LEFT JOIN categories c ON p.category_id = c.id 
                WHERE p.category_id = :category_id 
                ORDER BY p.created_at DESC LIMIT " . (int)$limit;
        $result = $this->query($sql, [
            'category_id' => $categoryId
        ]);
        error_log("Category Posts SQL: " . $sql);
        error_log("Category Posts Params: " . print_r(['category_id' => $categoryId], true));
        error_log("Category Posts Result: " . print_r($result, true));
        return is_array($result) ? $result : [];
    }

    public function findById($id)
    {
        $sql = "SELECT p.*, c.name as category FROM {$this->table} p 
                LEFT JOIN categories c ON p.category_id = c.id 
                WHERE p.id = :id";
        $result = $this->query($sql, ['id' => $id], false);
        error_log("Find By ID SQL: " . $sql);
        error_log("Find By ID Result: " . print_r($result, true));
        return $result;
    }

    public function incrementViews($id)
    {
        $sql = "UPDATE {$this->table} SET views = views + 1 WHERE id = :id";
        return $this->query($sql, ['id' => $id]);
    }
} 