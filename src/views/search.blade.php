@extends('layouts.master')

@section('title', 'Biznews')

@section('content')

<!-- Breaking News Start -->
<div class="container-fluid mt-5 mb-3 pt-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <div class="section-title border-right-0 mb-0" style="width: 180px;">
                        <h4 class="m-0 text-uppercase font-weight-bold">Tìm kiếm</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breaking News End -->

<!-- Search Results Start -->
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Kết quả tìm kiếm</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-3">
                        <h5 class="text-muted mb-3">Tìm thấy <?php echo count($searchResults); ?> kết quả cho "<?php echo htmlspecialchars($keyword); ?>"</h5>

                        <?php if (count($searchResults) > 0): ?>
                        <div class="row">
                            <?php foreach ($searchResults as $article): ?>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="position-relative mb-3">
                                    <img class="img-fluid w-100" src="uploads/image/<?= htmlspecialchars($article['image']) ?>"
                                        style="object-fit: cover; height: 200px;">
                                    <div class="bg-white border border-top-0 p-4">
                                        <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                href="<?php echo BASE_URL . 'category/' . $article['category_id']; ?>"><?php echo $article['category']; ?></a>
                                            <a class="text-body" href="#"><small><?php echo date('d/m/Y', strtotime($article['created_at'])); ?></small></a>
                                        </div>
                                        <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold"
                                            href="<?php echo BASE_URL . 'show/' . $article['id']; ?>"><?php echo $article['title']; ?></a>
                                        <p class="m-0"><?php echo substr(strip_tags($article['content']), 0, 100) . '...'; ?></p>
                                    </div>
                                    <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                        <div class="d-flex align-items-center">
                                            <small class="ml-3"><i
                                                    class="far fa-eye mr-2"></i><?php echo $article['view_count']; ?></small>
                                            <small class="ml-3"><i
                                                    class="far fa-comment mr-2"></i><?php echo $article['comment_count']; ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php else: ?>
                        <div class="text-center py-5">
                            <h4 class="text-muted">Không tìm thấy kết quả nào cho "<?php echo htmlspecialchars($keyword); ?>"</h4>
                            <p class="mb-0">Vui lòng thử lại với từ khóa khác.</p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Search Results End -->

@endsection
