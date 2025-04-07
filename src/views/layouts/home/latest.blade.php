<div class="col-lg-8">
    <div class="row">
        <div class="col-12">
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">Latest News</h4>
                <a class="text-secondary font-weight-medium text-decoration-none" href="">View All</a>
            </div>
        </div>

        <?php $count = 0; ?>

        <?php foreach($latest as $article): ?>

        <?php if($count % 3 == 2): ?>

        <div class="col-lg-12">
            <div class="row news-lg mx-0 mb-3">
                <div class="col-md-6 h-100 px-0">
                    <img class="img-fluid h-100" src="uploads/image/<?= htmlspecialchars($article['image']) ?>"
                        style="object-fit: cover;">
                </div>
                <div class="col-md-6 d-flex flex-column border bg-white h-100 px-0">
                    <div class="mt-auto p-4">
                        <div class="mb-2">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                href=""><?= htmlspecialchars($article['category']) ?></a>
                            <a class="text-body"
                                href=""><small><?= date('M d, Y', strtotime($article['created_at'])) ?></small></a>
                        </div>
                        <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold"
                            href="<?= BASE_URL ?>show/<?= htmlspecialchars($article['id']) ?>"
                            class="char-limit"><?= htmlspecialchars(substr($article['title'], 0, 100)) . '...' ?></a>
                    </div>

                    <div class="d-flex justify-content-between bg-white border-top mt-auto p-4">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle mr-2" src="https://via.placeholder.com/50" width="25" height="25"
                                alt="">
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

        <div class="col-lg-6">
            <div class="position-relative mb-3">
                <div class="img-container w-100 h-100 overflow-hidden">
                    <img class="img-fluid w-100 h-100" src="uploads/image/<?= htmlspecialchars($article['image']) ?>"
                        style="object-fit: cover;">
                </div>
                <div class="bg-white border border-top-0 p-4" style="height: 200px">
                    <div class="mb-2">
                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                            href="#"><?= htmlspecialchars($article['category']) ?></a>
                        <a class="text-body"
                            href=""><small><?= date('M d, Y', strtotime($article['created_at'])) ?></small></a>
                    </div>
                    <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold"
                        href="<?= BASE_URL ?>show/<?= htmlspecialchars($article['id']) ?>"
                        class="char-limit"><?= htmlspecialchars(substr($article['title'], 0, 100)) . '...' ?></a>
                </div>
                <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                    <div class="d-flex align-items-center">
                        <img class="rounded-circle mr-2" src="https://via.placeholder.com/50" width="25" height="25"
                            alt="">
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

        <?php endif ?>

        <?php $count++; ?>

        <?php endforeach ?>
    </div>
</div>
