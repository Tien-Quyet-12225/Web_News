<?php

namespace App\Models\Admin;

use App\Models\BaseModel;

class UserAdminModel extends BaseModel{
    protected $table = 'users';

    public function list(){
        return $this->findAll($this->table);
    }

    public function del($id){
        return $this->delete($this->table, $id);
    }

    public function add($username, $fullname, $email, $password, $role, $avatar){
        $data = [
            'username' => $username,
            'full_name' => $fullname,
            'email' => $email,
            'password_hash' => $password,
            'role' => $role,
            'avatar' => $avatar,
        ];
        return $this->create($this->table, $data);
    }

    public function updt($id, $username, $fullname, $email, $role, $avatar){
        $data = [
            'username' => $username,
            'full_name' => $fullname,
            'email' => $email,
            'role' => $role,
            'avatar' => $avatar,
        ];
        return $this->update($this->table, $id, $data);
    }

    
}