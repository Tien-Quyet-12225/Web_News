<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\HomeModel;


class HomeController extends BaseController
{

    protected $homeModel;

    public function __construct()
    {
        $this->homeModel = new HomeModel();
    }


    public function home()
    {

        $featured = $this->homeModel->featured();

        $latest = $this->homeModel->latest();

        $popular = $this->homeModel->getPopularPosts();

        $categories = $this->homeModel->getCategories();
        
        $slider_articles = $this->homeModel->getSliderArticles();

        session_start();
        $_SESSION['popular'] = $popular;

        $_SESSION['categories'] = $categories;

        $this->render('home', compact('featured', 'latest', 'slider_articles'));
    }

    public function about()
    {
        $this->render('about');
    }

    public function show($id)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $data = $this->homeModel->getArtById($id);
        $comments = $this->homeModel->getCmtById($id);
        $like_count = $this->homeModel->getLikeCount($id);

        if (isset($_SESSION['user'])) {
            $is_liked = $this->homeModel->isLiked($id) ? true : false;
        } else {
            $is_liked = false;
        }

        $this->homeModel->updateView($id);

        $this->render('news', compact('data', 'comments', 'like_count', 'is_liked'));
    }

    public function like($id)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user'])) {
            header("Location: /show_login");
            exit;
        }
        $this->homeModel->like($id);
        header("Location: /show/$id");
        exit;
    }

    public function unlike($id)
    {
        if (isset($_SESSION['user'])) {
            header("Location: /show_login");
            exit;
        }
        $this->homeModel->unlike($id);
        header("Location: /show/$id");
        exit;
    }

    public function contact()
    {
        $this->render('contact');
    }

    public function aboutweb()
    {
        $this->render('about');
    }

    public function search()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $keyword = $_GET['keyword'] ?? '';

        if (empty($keyword)) {
            header("Location: /");
            exit;
        }

        $searchResults = $this->homeModel->search($keyword);

        $this->render('search', compact('searchResults', 'keyword'));
    }
}