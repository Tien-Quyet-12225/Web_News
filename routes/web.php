<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/Support/Support.php';
require_once __DIR__ . '/../config/config.php';
    
use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;
use App\Controllers\HomeController;
use App\Controllers\UserController;
use App\Controllers\CommentController;
use App\Middleware\AuthMiddleware;


use App\Controllers\Admin\DashboardAdminController;
use App\Controllers\Admin\ArticleAdminController;
use App\Controllers\Admin\CategoryAdminController;
use App\Controllers\Admin\UserAdminController;

$url = $_GET['url'] ?? '/';

try {
    $router = new RouteCollector();
    
    $router->get('/', [HomeController::class, 'home']);
    $router->get('/show_login', function (){
        require_once PATH_ROOT . "src/views/login.blade.php";
    });
    $router->post('/login', [UserController::class, 'login']);
    $router->get('/logout', [UserController::class, 'logout']);
    $router->get('/unauthorized', function() {
        echo "Unauthorized access.";
    });

    $router->get('/show_register', function(){
        require_once PATH_ROOT . "src/views/register.blade.php";
    });
    
    $router->post('/register', [UserController::class,'register']);
    
    $router->get('/show/{id}', [HomeController::class, 'show']);

    $router->post('/comment', [CommentController::class, 'comment']);

    $router->get('/show_forgot_password', function(){
        require_once PATH_ROOT . "src/views/forgot_password.blade.php";
    });


    $router->group(['before' => [AuthMiddleware::class, 'handle']], function(RouteCollector $router) {
        
        $router->get('admin/dashboard', [DashboardAdminController::class, 'dashboard']);

        $router->get('admin/user-list', [UserAdminController::class, 'user_list']);
        $router->get('admin/user-del/{id}', [UserAdminController::class, 'user_delete']);

        $router->post('admin/user-update', [UserAdminController::class, 'user_update']);

        $router->post('admin/user-add', [UserAdminController::class, 'user_add']);

        $router->get('admin/profile', [UserAdminController::class, 'profile']);
        $router->post('admin/profile-update', [UserAdminController::class, 'profile_update']);
        $router->get('admin/logout', [UserAdminController::class, 'logout']);

        $router->get('admin/article-list', [ArticleAdminController::class, 'article_list']);
        $router->get('admin/article-del/{id}', [ArticleAdminController::class, 'article_delete']);
        $router->get('admin/article-edit/{id}', [ArticleAdminController::class, 'article_edit']);
        $router->post('admin/article-update', [ArticleAdminController::class, 'article_update']);
        $router->get('admin/article-form-add', [ArticleAdminController::class, 'form_add']);
        $router->post('admin/article-add', [ArticleAdminController::class, 'article_add']);

        $router->get('admin/category-list', [CategoryAdminController::class, 'category_list']);
        $router->get('admin/category-del/{id}', [CategoryAdminController::class, 'category_delete']);
        $router->post('admin/category-update', [CategoryAdminController::class, 'category_update']);
        $router->post('admin/category-add', [CategoryAdminController::class, 'category_add']);
    });
    
    

    $routeData = $router->getData();

    $dispatcher = new Dispatcher($router->getData());

    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

    echo $response;
    
} catch (Phroute\Phroute\Exception\HttpRouteNotFoundException $e) {
    dd($e->getMessage());
} catch (Phroute\Phroute\Exception\HttpMethodNotAllowedException $e) {
    dd($e->getMessage());
} catch (Exception $e) {
    dd($e->getMessage());
}