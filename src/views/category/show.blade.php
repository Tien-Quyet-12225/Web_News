@extends('layouts.master')

@section('content')



<!-- Category News Start -->
<div class="container-fluid mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h4 class="m-0 text-uppercase font-weight-bold">
                                <?= isset($category['name']) ? htmlspecialchars($category['name']) : 'Danh mục' ?>
                            </h4>
                        </div>
                    </div>
                    <?php if(isset($articles) && !empty($articles)): ?>
                    <?php foreach($articles as $article): ?>
                    <div class="col-lg-6 col-md-6 mb-4">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100"
                                src="<?= BASE_URL ?>uploads/image/<?= htmlspecialchars($article['image']) ?>"
                                style="object-fit: cover; height: 250px;">
                            <div class="bg-white border border-top-0 p-4">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href="<?= BASE_URL ?>category/<?= htmlspecialchars($article['category_id']) ?>">
                                        <?= htmlspecialchars($article['category']) ?>
                                    </a>
                                    <small
                                        class="text-body"><?= date('d/m/Y', strtotime($article['created_at'])) ?></small>
                                </div>
                                <a class="h5 d-block mb-3 text-secondary text-uppercase font-weight-bold"
                                    href="<?= BASE_URL ?>show/<?= htmlspecialchars($article['id']) ?>">
                                    <?= htmlspecialchars($article['title']) ?>
                                </a>
                                <p class="m-0">
                                    <?= htmlspecialchars(substr(strip_tags($article['content']), 0, 100)) ?>...</p>
                            </div>
                            <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                <div class="d-flex align-items-center">
                                    <small class="text-truncate">
                                        <i class="far fa-user mr-2"></i><?= htmlspecialchars($article['full_name']) ?>
                                    </small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <small class="ml-3">
                                        <i class="far fa-eye mr-2"></i><?= number_format($article['view_count']) ?>
                                    </small>
                                    <small class="ml-3">
                                        <i
                                            class="far fa-comment mr-2"></i><?= number_format($article['comment_count']) ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <div class="col-12">
                        <div class="bg-white border p-4">
                            <p class="m-0">Không có bài viết nào trong danh mục này.</p>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Popular News Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Tin nổi bật</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-3">
                        <?php if(isset($popular) && !empty($popular)): ?>
                        <?php foreach($popular as $post): ?>
                        <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                            <img class="img-fluid"
                                src="<?= BASE_URL ?>uploads/image/<?= htmlspecialchars($post['image']) ?>"
                                alt="" style="width: 110px; height: 110px; object-fit: cover;">
                            <div
                                class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                                        href="<?= BASE_URL ?>category/<?= htmlspecialchars($post['category_id']) ?>">
                                        <?= htmlspecialchars($post['category']) ?>
                                    </a>
                                    <small
                                        class="text-body"><?= date('d/m/Y', strtotime($post['created_at'])) ?></small>
                                </div>
                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold"
                                    href="<?= BASE_URL ?>show/<?= htmlspecialchars($post['id']) ?>">
                                    <?= htmlspecialchars($post['title']) ?>
                                </a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <p class="m-0">Không có tin nổi bật.</p>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Popular News End -->

                <!-- Categories Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Danh mục</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-3">
                        <?php if(isset($categories) && !empty($categories)): ?>
                        <?php foreach($categories as $cat): ?>
                        <a href="<?= BASE_URL ?>category/<?= htmlspecialchars($cat['id']) ?>"
                            class="btn btn-sm btn-secondary m-1">
                            <?= htmlspecialchars($cat['name']) ?>
                        </a>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <p class="m-0">Không có danh mục nào.</p>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Categories End -->
            </div>
        </div>
    </div>
</div>
<!-- Category News End -->

@endsection
