<?php

namespace App\Models;
class UserModel extends BaseModel{
    
    public function getUserByEmail($email){
        return $this->findByColumn('users', 'email', $email);
    }
    public function add($username, $fullname, $email, $password, $avatar){
        $data = [
            'username' => $username,
            'full_name' => $fullname,
            'email' => $email,
            'password_hash' => $password,
            'avatar' => $avatar,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        return $this->create('users', $data);
    }
    
    public function add_token($email, $token, $expries){
        $data = [
            'email' => $email,
            'token' => $token,
            'expries' => $expries,
        ];

        return $this->create('password_resets', $data);
    }
}