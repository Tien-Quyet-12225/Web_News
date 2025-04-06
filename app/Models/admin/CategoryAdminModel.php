<?php

namespace App\Models\Admin;

use App\Models\BaseModel;

class CategoryAdminModel extends BaseModel{
    protected $table = 'categories';

    public function list(){
        return $this->findAll($this->table);
    }

    
}
?>