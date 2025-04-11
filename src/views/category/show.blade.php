@extends('layouts.master')

@section('content')
<!-- Category News Start -->
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h4 class="m-0 text-uppercase font-weight-bold"><?= isset($category['name']) ? htmlspecialchars($category['name']) : 'Danh mục' ?></h4>
                        </div>
                    </div>
                    <?php if(isset($articles) && is_array($articles)): ?>
                        <?php foreach($articles as $post): ?>
                        <div class="col-lg-6">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="<?= BASE_URL ?>img/<?= htmlspecialchars($post['image']) ?>" style="object-fit: cover;">
                                <div class="bg-white border border-top-0 p-4">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                            href=""><?= htmlspecialchars($post['category']) ?></a>
                                        <a class="text-body" href=""><small><?= date('M d, Y', strtotime($post['created_at'])) ?></small></a>
                                    </div>
                                    <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="<?= BASE_URL ?>show/<?= htmlspecialchars($post['id']) ?>"><?= htmlspecialchars($post['title']) ?></a>
                                    <p class="m-0">
                                    <?php 
                                        $content = strip_tags(html_entity_decode($post['content']));
                                        echo htmlspecialchars(mb_substr($content, 0, 200)) . '...';
                                    ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12">
                            <p>Không có bài viết nào trong danh mục này.</p>
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
                        <?php if(isset($popular) && is_array($popular)): ?>
                            <?php foreach($popular as $post): ?>
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="<?= BASE_URL ?>img/<?= htmlspecialchars($post['image']) ?>" alt="" style="width: 110px; height: 110px; object-fit: cover;">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href=""><?= htmlspecialchars($post['category']) ?></a>
                                        <a class="text-body" href=""><small><?= date('M d, Y', strtotime($post['created_at'])) ?></small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="<?= BASE_URL ?>show/<?= htmlspecialchars($post['id']) ?>"><?= htmlspecialchars($post['title']) ?></a>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Không có tin nổi bật.</p>
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
                        <?php if(isset($categories) && is_array($categories)): ?>
                            <?php foreach($categories as $cat): ?>
                            <a href="<?= BASE_URL ?>category/<?= htmlspecialchars($cat['id']) ?>" class="btn btn-sm btn-secondary m-1"><?= htmlspecialchars($cat['name']) ?></a>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Không có danh mục nào.</p>
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