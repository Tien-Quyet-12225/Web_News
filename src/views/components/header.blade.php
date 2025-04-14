<div class="container-fluid d-none d-lg-block">
    <div class="row align-items-center bg-dark px-lg-5">
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-sm bg-dark p-0">
                <ul class="navbar-nav ml-n2">
                    <li class="nav-item d-flex">

                        @php
                            if (session_status() == PHP_SESSION_NONE) {
                                session_start();
                            }
                        @endphp

                        @if (isset($_SESSION['user']))
                            <a class="nav-link text-body small" href="#">{{ $_SESSION['user']['username'] }}</a>
                            <a class="nav-link text-body small" href="<?php echo BASE_URL; ?>logout">Logout</a>
                        @else
                            <a class="nav-link text-body small" href="<?php echo BASE_URL; ?>show_register">Register</a>
                            <a class="nav-link text-body small" href="<?php echo BASE_URL; ?>show_login">Login</a>
                        @endif
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="row align-items-center bg-white py-3 px-lg-5">
        <div class="col-lg-4">
            <a href="index.html" class="navbar-brand p-0 d-none d-lg-block">
                <h1 class="m-0 display-4 text-uppercase text-primary">Biz<span
                        class="text-secondary font-weight-normal">News</span></h1>
            </a>
        </div>
        <div class="col-lg-8 text-center text-lg-right">
            <a href="https://htmlcodex.com"><img class="img-fluid" src="img/ads-728x90.png" alt=""></a>
        </div>
    </div>
</div>
