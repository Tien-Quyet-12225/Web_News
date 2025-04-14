<div class="container-fluid">
    <div class="row">
        <div class="col-lg-7 px-0">
            <div class="owl-carousel main-carousel position-relative">
                <?php foreach($slider_articles as $article): ?>
                <div class="position-relative overflow-hidden" style="height: 500px;">
                    <img class="img-fluid h-100" src="uploads/image/<?= htmlspecialchars($article['image']) ?>"
                        style="object-fit: cover;">
                    <div class="overlay">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                href="<?= BASE_URL ?>category/<?= htmlspecialchars($article['category_id']) ?>">
                                <?= htmlspecialchars($article['category']) ?>
                            </a>
                            <a class="text-white" href="">
                                <small><?= date('d/m/Y', strtotime($article['created_at'])) ?></small>
                            </a>
                        </div>
                        <a class="h2 m-0 text-white text-uppercase font-weight-bold"
                            href="<?= BASE_URL ?>show/<?= htmlspecialchars($article['id']) ?>">
                            <?= htmlspecialchars($article['title']) ?>
                        </a>
                        <div class="mt-3">
                            <small class="text-white mr-3">
                                <i class="far fa-user mr-2"></i><?= htmlspecialchars($article['full_name']) ?>
                            </small>
                            <small class="text-white mr-3">
                                <i class="far fa-eye mr-2"></i><?= number_format($article['view_count']) ?>
                            </small>
                            <small class="text-white">
                                <i class="far fa-comment mr-2"></i><?= number_format($article['comment_count']) ?>
                            </small>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-lg-5 px-0">
            <div class="row mx-0">
                <?php foreach($featured as $article): ?>
                <div class="col-md-6 px-0">
                    <div class="position-relative overflow-hidden" style="height: 250px;">
                        <img class="img-fluid w-100 h-100"
                            src="uploads/image/<?= htmlspecialchars($article['image']) ?>" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                    href="<?= BASE_URL ?>category/<?= htmlspecialchars($article['category_id']) ?>">
                                    <?= htmlspecialchars($article['category']) ?>
                                </a>
                                <a class="text-white" href="">
                                    <small><?= date('d/m/Y', strtotime($article['created_at'])) ?></small>
                                </a>
                            </div>
                            <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold"
                                href="<?= BASE_URL ?>show/<?= htmlspecialchars($article['id']) ?>">
                                <?= htmlspecialchars($article['title']) ?>
                            </a>
                            <div class="mt-3">
                                <small class="text-white mr-3">
                                    <i class="far fa-eye mr-2"></i><?= number_format($article['view_count']) ?>
                                </small>
                                <small class="text-white">
                                    <i class="far fa-comment mr-2"></i><?= number_format($article['comment_count']) ?>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<style>
    .overlay {
        position: absolute;
        padding: 30px;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background: rgba(0, 0, 0, .3);
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
    }

    .main-carousel .overlay {
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, .7) 100%);
    }

    .overlay small {
        font-size: 90%;
        opacity: .9;
    }

    .overlay .badge {
        transition: all .3s;
    }

    .overlay .badge:hover {
        background-color: #0056b3;
    }
</style>
