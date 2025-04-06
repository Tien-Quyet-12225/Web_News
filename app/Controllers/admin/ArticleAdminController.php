<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\Admin\ArticleAdminModel;

use App\Models\Admin\CategoryAdminModel;
use Exception;
use DOMDocument;

class ArticleAdminController extends BaseController
{
  protected $articleAdminModel;
  protected $categoryAdminModel;

  public function __construct()
  {
    $this->articleAdminModel = new ArticleAdminModel();
    $this->categoryAdminModel = new CategoryAdminModel();
  }
}
