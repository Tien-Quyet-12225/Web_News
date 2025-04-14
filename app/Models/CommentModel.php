<?php

namespace App\Models;

use App\Models\BaseModel;

class CommentModel extends BaseModel
{

    protected $table = 'comments';
    public function list($article_id, $value)
    {
        return $this->findByColumn($this->table, $article_id, $value, true);
    }


    public function add($article_id, $user_id, $content)
    {
        $data = [
            'article_id' => $article_id,
            'user_id' => $user_id,
            'content' => $content
        ];

        return $this->create($this->table, $data);
    }

    public function getAllComments()
    {
        $sql = "SELECT 
        comment.id AS comment_id,
        comment.content AS comment_content,
        comment.created_at,
        users.username AS user_name,
        articles.title AS article_title
        FROM comments AS comment
        JOIN users ON comment.user_id = users.id
        JOIN articles ON comment.article_id = articles.id
        ORDER BY comment.created_at DESC";

        return $this->query($sql);
    }
}
