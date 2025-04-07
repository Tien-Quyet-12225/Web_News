<?php

namespace App\Models;

use App\Models\BaseModel;

class HomeModel extends BaseModel{
    public function latest(){
        $sql = "SELECT a.id, a.title, a.image, a.created_at, 
                        u.full_name, c.name as category, IFNULL(v.view_count, 0) as view_count, 
                        COUNT(com.id) as comment_count 
                FROM articles a 
                JOIN users u ON a.author_id = u.id 
                JOIN categories c ON a.category_id = c.id 
                LEFT JOIN article_views v ON a.id = v.article_id 
                LEFT JOIN comments com ON a.id = com.article_id 
                GROUP BY a.id, a.title, a.image, a.created_at, u.full_name, c.name, v.view_count 
                ORDER BY a.created_at DESC LIMIT 5 
        ";

        return $this->query($sql);
    }

    public function featured(){
        $sql = "SELECT a.id, a.title, a.content, a.image, a.created_at, u.full_name, c.name as category, v.view_count
                 FROM articles a
                 JOIN users u ON a.author_id = u.id
                 JOIN categories c ON a.category_id = c.id
                 LEFT JOIN article_views v ON a.id = v.article_id
                 ORDER BY v.view_count DESC LIMIT 4";
        return $this->query($sql);         
    }

    public function getArtById($id){
        $sql = "SELECT a.id, a.title, a.content, a.updated_at, u.username
                FROM articles a
                JOIN users u ON a.author_id = u.id
                WHERE a.id = :id";
        $params = [
            'id' => $id
        ];
        return $this->query($sql, $params, false);
    }

    public function getCmtById($id){
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

    public function updateView($article_id){
        $sql = "UPDATE article_views SET view_count = view_count + 1 WHERE article_id = :id";
        $params = [
            'id' => $article_id
        ];
        return $this->query($sql, $params, false);
    }
}