<?php

namespace App\Models\Admin;

use App\Models\BaseModel;

class CategoryAdminModel extends BaseModel{
    protected $table = 'categories';

    public function list(){
        return $this->findAll($this->table);
    }

    public function del($id){
        return $this->delete($this->table, $id);
    }

    public function add($name, $description){
        $data = [
            'name' => $name,
            'description' => $description
        ];
        return $this->create($this->table,$data);
    }

    public function updt($id, $name, $description){
        $data = [
            'name' => $name,
            'description' => $description
        ];
        return $this->update($this->table, $id, $data);
    }
}
?>