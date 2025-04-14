<?php

namespace App\Models\Admin;

use App\Models\BaseModel;

class StatisticsAdminModel extends BaseModel
{
    public function getTotals()
    {
        $sql = "
            SELECT 
                (SELECT COUNT(*) FROM categories) AS total_categories,
                (SELECT COUNT(*) FROM users) AS total_users,
                (SELECT COUNT(*) FROM articles) AS total_articles
        ";
        return $this->query($sql, [], false);
    }

    public function getCategoryStats()
    {
        $sql = "
            SELECT c.name, COUNT(a.id) as article_count
            FROM categories c
            LEFT JOIN articles a ON c.id = a.category_id
            GROUP BY c.id, c.name
            ORDER BY article_count DESC
        ";
        return $this->query($sql);
    }

    public function getArticleStats()
    {
        $sql = "
            SELECT 
                DATE_FORMAT(created_at, '%Y-%m') as month,
                COUNT(*) as count
            FROM articles
            GROUP BY DATE_FORMAT(created_at, '%Y-%m')
            ORDER BY month ASC
            LIMIT 12
        ";
        return $this->query($sql);
    }
} 