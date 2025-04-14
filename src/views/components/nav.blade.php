<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
        <a href="/" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 display-4 text-uppercase text-primary">Biz<span
                    class="text-white font-weight-normal">News</span></h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">
                <a href="/" class="nav-item nav-link active">Trang chủ</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Danh mục</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <?php if(isset($_SESSION['categories'])): ?>
                        <?php foreach($_SESSION['categories'] as $category): ?>
                        <a href="<?= BASE_URL ?>category/<?= htmlspecialchars($category['id']) ?>"
                            class="dropdown-item"><?= htmlspecialchars($category['name']) ?></a>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <a href="<?php echo BASE_URL; ?>about" class="nav-item nav-link">Giới thiệu</a>
                <a href="<?php echo BASE_URL; ?>contact" class="nav-item nav-link">Liên hệ</a>
            </div>
            <form action="<?php echo BASE_URL; ?>search" method="GET" class="input-group ml-auto d-none d-lg-flex"
                style="width: 100%; max-width: 300px;">
                <input type="text" name="keyword" class="form-control border-0" placeholder="Tìm kiếm..." required>
                <div class="input-group-append">
                    <button type="submit" class="input-group-text bg-primary text-dark border-0 px-3"><i
                            class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
    </nav>
</div>

<style>
    .dropdown-menu {
        background-color: #343a40;
        border: none;
        margin-top: 0;
        border-radius: 0;
        padding: 0;
    }

    .dropdown-item {
        color: rgba(255, 255, 255, .5);
        padding: 10px 20px;
        border-bottom: 1px solid rgba(255, 255, 255, .1);
    }

    .dropdown-item:last-child {
        border-bottom: none;
    }

    .dropdown-item:hover {
        color: #fff;
        background-color: #1E88E5;
    }

    .nav-item.dropdown:hover .dropdown-menu {
        display: block;
    }

    @media (max-width: 991.98px) {
        .dropdown-menu {
            border: none;
            margin-left: 1.5rem;
            background: none;
        }

        .dropdown-item {
            border: none;
            padding: 5px 15px;
        }

        .dropdown-item:hover {
            background: none;
        }
    }
</style>
