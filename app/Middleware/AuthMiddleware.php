<?php

namespace App\Middleware;

use App\Controllers\BaseController;

class AuthMiddleware extends BaseController {
    public function __construct() {
        // Khởi tạo session
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Phương thức kiểm tra người dùng đăng nhập và role
    public function handle($requiredRole = 'admin') {
        if (!isset($_SESSION['user'])) {
            header("Location:".BASE_URL."login");
            exit; // Dừng lại nếu không có quyền
        }

        if ($requiredRole !== null && (!isset($_SESSION['user']['role']) || $_SESSION['user']['role'] !== $requiredRole)) {
            // Nếu người dùng không có vai trò phù hợp, chuyển hướng tới trang không có quyền truy cập
            header('Location:'.BASE_URL.'unauthorized');
            exit; // Dừng lại nếu không có quyền
        }
    }
}
