<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\StatisticsAdminModel;

class StatisticsAdminController extends BaseController
{
    protected $statisticsModel;

    public function __construct()
    {
        $this->statisticsModel = new StatisticsAdminModel();
    }

    public function dashboard()
    {
        // Lấy dữ liệu thống kê
        $totals = $this->statisticsModel->getTotals();
        $categoryStats = $this->statisticsModel->getCategoryStats();
        $articleStats = $this->statisticsModel->getArticleStats();

        // Hiển thị view với dữ liệu
        $this->render('admin.dashboard.statistics', compact('totals', 'categoryStats', 'articleStats'));
    }
} 