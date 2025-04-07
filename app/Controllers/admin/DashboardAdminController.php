<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\Admin\DashboardAdminModel;

use Exception;

class DashboardAdminController extends BaseController
{

    protected $dashboardAdminModel;

    public function __construct()
    {
        $this->dashboardAdminModel = new DashboardAdminModel();
    }

    public function dashboard()
    {
        try {
            $totalsArray = $this->dashboardAdminModel->countN();

            $totals = $totalsArray[0];

            $this->render('admin.dashboard', compact('totals'));
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
