<?php

namespace App\Models;

class Category extends BaseModel
{
    protected $table = 'categories';

    public function all()
    {
        return $this->findAll($this->table);
    }

    public function findById($id)
    {
        return $this->find($this->table, $id);
    }
} 