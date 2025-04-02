<?php

namespace App\Models;
class UserModel extends BaseModel{
    
    public function getUserByEmail($email){
        return $this->findByColumn('users', 'email', $email);
    }