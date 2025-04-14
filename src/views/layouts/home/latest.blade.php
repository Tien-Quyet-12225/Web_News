<div class="col-lg-12">
    <div class="row">
        <div class="col-12">
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">Tin tức mới nhất</h4>
            </div>
        </div>

        <?php $count = 0; ?>
        <?php foreach($latest['articles'] as $article): ?>
        <?php if($count == 0): ?>
        <!-- Card lớn đầu tiên -->
        <div class="col-lg-8">
            <div class="position-relative mb-4">
                <img class="img-fluid w-100" src="uploads/image/<?= htmlspecialchars($article['image']) ?>"
                    style="object-fit: cover; height: 450px;">
                <div class="position-absolute bg-white border p-4"
                    style="width: calc(100% - 30px); bottom: 15px; left: 15px;">
                    <div class="d-flex mb-3">
                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                            href=""><?= htmlspecialchars($article['category']) ?></a>
                        <a class="text-body" href="">
                            <small><?= date('d/m/Y', strtotime($article['created_at'])) ?></small>
                        </a>
                    </div>
                    <a class="h3 d-block mb-3 text-secondary text-uppercase font-weight-bold"
                        href="<?= BASE_URL ?>show/<?= htmlspecialchars($article['id']) ?>"><?= htmlspecialchars(substr($article['title'], 0, 100)) . '...' ?></a>
                    <p class="text-muted mb-0">
                        <?= htmlspecialchars(substr(strip_tags($article['content']), 0, 200)) . '...' ?></p>

                    <div class="d-flex justify-content-between mt-3">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle mr-2" src="https://via.placeholder.com/50" width="25"
                                height="25" alt="">
                            <small><?= htmlspecialchars($article['full_name']) ?></small>
                        </div>
                        <div class="d-flex align-items-center">
                            <small class="ml-3"><i
                                    class="far fa-eye mr-2"></i><?= htmlspecialchars($article['view_count']) ?></small>
                            <small class="ml-3"><i
                                    class="far fa-comment mr-2"></i><?= htmlspecialchars($article['comment_count']) ?></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php else: ?>
        <!-- Card nhỏ cho các tin còn lại -->
        <div class="col-lg-4">
            <div class="position-relative mb-4">
                <img class="img-fluid w-100" src="uploads/image/<?= htmlspecialchars($article['image']) ?>"
                    style="object-fit: cover; height: 220px;">
                <div class="bg-white border border-top-0 p-4">
                    <div class="d-flex mb-2">
                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                            href=""><?= htmlspecialchars($article['category']) ?></a>
                        <a class="text-body" href="">
                            <small><?= date('d/m/Y', strtotime($article['created_at'])) ?></small>
                        </a>
                    </div>
                    <a class="h5 d-block mb-3 text-secondary text-uppercase font-weight-bold text-truncate"
                        href="<?= BASE_URL ?>show/<?= htmlspecialchars($article['id']) ?>"
                        title="<?= htmlspecialchars($article['title']) ?>"><?= htmlspecialchars($article['title']) ?></a>
                    <p class="text-muted mb-0" style="height: 48px; overflow: hidden;">
                        <?php echo substr(strip_tags($article['content']), 0, 100) . '...'; ?>
                    </p>

                    <div class="d-flex justify-content-between mt-3">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle mr-2" src="https://via.placeholder.com/50" width="25"
                                height="25" alt="">
                            <small class="text-truncate"
                                style="max-width: 90px;"><?= htmlspecialchars($article['full_name']) ?></small>
                        </div>
                        <div class="d-flex align-items-center">
                            <small class="ml-3"><i
                                    class="far fa-eye mr-2"></i><?= htmlspecialchars($article['view_count']) ?></small>
                            <small class="ml-3"><i
                                    class="far fa-comment mr-2"></i><?= htmlspecialchars($article['comment_count']) ?></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php $count++; ?>
        <?php endforeach; ?>

        <!-- Pagination -->
        <?php if ($latest['total'] > $latest['per_page']): ?>
        <div class="col-12">
            <nav class="mt-4">
                <ul class="pagination justify-content-center mb-0">
                    <?php
                    $total_pages = ceil($latest['total'] / $latest['per_page']);
                    $current_page = $latest['current_page'];
                    ?>

                    <!-- Previous Page -->
                    <?php if ($current_page > 1): ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?= $current_page - 1 ?>">
                            <i class="fas fa-angle-left"></i>
                        </a>
                    </li>
                    <?php endif; ?>

                    <!-- Page Numbers -->
                    <?php for ($i = max(1, $current_page - 2); $i <= min($total_pages, $current_page + 2); $i++): ?>
                    <li class="page-item <?= $i == $current_page ? 'active' : '' ?>">
                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                    <?php endfor; ?>

                    <!-- Next Page -->
                    <?php if ($current_page < $total_pages): ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?= $current_page + 1 ?>">
                            <i class="fas fa-angle-right"></i>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
        <?php endif; ?>
    </div>
</div>

<style>
    .text-truncate {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .pagination .page-link {
        color: #1E88E5;
        background-color: #fff;
        border-color: #dee2e6;
    }

    .pagination .page-item.active .page-link {
        background-color: #1E88E5;
        border-color: #1E88E5;
        color: #fff;
    }

    .pagination .page-link:hover {
        color: #0d47a1;
        background-color: #e9ecef;
        border-color: #dee2e6;
    }
</style>
