<?php

namespace App\Controllers\Admin;

use App\Models\Admin\CategoryAdminModel;

use App\Controllers\BaseController;

use Exception;

class CategoryAdminController extends BaseController
{
    protected $categoryAdminModel;

    public function __construct()
    {
        $this->categoryAdminModel = new CategoryAdminModel();
    } 

    public function category_list()
    {
        $categories = $this->categoryAdminModel->list();

        $this->render('admin.categories.all_categories', compact('categories'));
    }
}
?>