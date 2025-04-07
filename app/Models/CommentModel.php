<?php
namespace App\Models;

use App\Models\BaseModel;

class CommentModel extends BaseModel{

    protected $table = 'comments';
    public function list($article_id ,$value){
        return $this->findByColumn($this->table, $article_id, $value, true);
    }


    public function add($article_id, $user_id, $content){
        $data = [
            'article_id' => $article_id,
            'user_id' => $user_id,
            'content' => $content
        ];

        return $this->create($this->table ,$data);
    }

}