<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" intergrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Change Password</title>
    <style>
        .form-group{
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <div class="form-login mx-auto mt-3 p-5 shadow-lg rounded-3" style="width: 580px;">
        <form action="<?php echo BASE_URL ?>login" method="post">

            <h2>Change Password</h2>

            <div class="form-group">
                <label for="">Password:</label>
                <input type="password" class="form-control form-control-sm" name="pass" id=""  placeholder="Nhập mật khẩu">
            </div>

            <div class="form-group">
                <button type="submit" name='login-btn' class="btn btn-outline-success">Đăng nhập</button>
            </div>
        </form>

        <h6 class="mt-4 text-center">Bạn chưa có tài khoản? <a href="<?= BASE_URL ?>show_register" style="color: blue;">Đăng kí ngay!</a></h6>
    </div>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>