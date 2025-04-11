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


  

  public function del($article_id)
  {
    return $this->delete($this->table, $article_id);
  }

    public function del($article_id)
    {
        return $this->delete($this->table, $article_id);
    }

    return $this->update($this->table, $article_id, $data);
  }
}