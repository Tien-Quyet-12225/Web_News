<?php

namespace App\Models\Admin;

use App\Models\BaseModel;

class DashboardAdminModel extends BaseModel{
    public function countN(){
        $sql = "
            SELECT 
                (SELECT COUNT(*) FROM categories) AS total_categories,
                (SELECT COUNT(*) FROM users) AS total_users,
                (SELECT COUNT(*) FROM articles) AS total_articles
        ";

        return $this->query($sql);
    }
}