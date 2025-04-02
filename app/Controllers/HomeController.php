<?php
    
namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\HomeModel;


class HomeController extends BaseController{
    
    protected $homeModel;

    public function __construct()
    {
        $this->homeModel = new HomeModel();
    }
    
    
    public function home(){
        
        $featured = $this->homeModel->featured();

        $latest = $this->homeModel->latest();

        $this->render('home', compact('featured', 'latest'));
    }
    
}
?>