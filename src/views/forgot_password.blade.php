<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Forgot Password</title>
    <style>
        .form-group{
            margin-top: 15px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    
    <div class="form-login mx-auto mt-3 p-5 shadow-lg rounded-3" style="width: 580px;">
       <form action="<?php echo BASE_URL ?>forgot_password" method="post">  

        <h2>Forgot Password</h2>

        <div class="form-group">
            <label for="">Email:</label>
            <input type="email" class="form-control form-control-sm" name="forgotEmail" id=""  placeholder="Nhập email của bạn...">
        </div>

        <div class="form-group">
            <button type="submit" name='forgot-btn' class="btn btn-outline-success">
                <span><i class="fa fa-envelope" aria-hidden="true"></i></span>
                Gửi Đường Dẫn Đặt Lại Mật Khẩu
            </button>
        </div>
       </form>  

       <h6 class="mt-4 text-center">Bạn đã có tài khoản? <a href="<?= BASE_URL ?>show_login">Đăng nhập ngay!</a></h6>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>