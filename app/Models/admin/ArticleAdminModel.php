<?php

namespace App\Models\Admin;

use App\Models\BaseModel;

class ArticleAdminModel extends BaseModel
{
    protected $table = 'articles';
    public function list()
    {
        $sql = "SELECT a.id, a.title, a.image,
                        u.username, c.name as category 
                FROM articles a 
                JOIN users u ON a.author_id = u.id 
                JOIN categories c ON a.category_id = c.id 
                LEFT JOIN article_views v ON a.id = v.article_id 
                LEFT JOIN comments com ON a.id = com.article_id 
                GROUP BY a.id, a.title, a.image, u.username, c.name
                ORDER BY a.id DESC";
        return $this->query($sql);
    }

    public function add($title, $content, $author_id, $category_id, $image)
    {
        $data = [
            'title' => $title,
            'content' => $content,
            'author_id' => $author_id,
            'category_id' => $category_id,
            'image' => $image
        ];

        return $this->create($this->table, $data, true);
    }

    public function del($article_id)
    {
        return $this->delete($this->table, $article_id);
    }

    public function getArtById($article_id)
    {
        $sql = "SELECT a.*, c.name as category_name, u.username
                FROM articles a
                JOIN users u ON a.author_id = u.id
                LEFT JOIN categories c ON a.category_id = c.id
                WHERE a.id =  :id";
        $params = [
            ':id' => $article_id
        ]; 
        return $this->query($sql, $params, false);       
    }
    public function add_image($file_name, $file_path){
        $data = [
            'file_name' => $file_name,
            'file_path' => $file_path
        ];
        return $this->create('images', $data, true);
    }

    public function add_article_image($article_id, $image_id){
        $data = [
            'article_id' => $article_id,
            'image_id' => $image_id
        ];
        return $this->create('article_images', $data);
    }

    public function getArtImg($article_id){
        $sql = "SELECT i.*
                FROM article_images ai
                JOIN images i ON ai.image_id = i.id
                WHERE ai.article_id = :article_id";
        $params = [
            ':article_id' => $article_id
        ];
        return $this->query($sql, $params);
    }


    public function updt($article_id, $title, $content, $category_id, $image){
        $data = [
            'title' => $title,
            'content' => $content,
            'category_id' => $category_id,
            'image' => $image
        ];

        return $this->update($this->table, $article_id, $data);
    }
}
