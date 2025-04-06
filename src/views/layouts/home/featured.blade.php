<div class="container-fluid pt-5 mb-3">
    <div class="container">
        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">Featured News</h4>
        </div>
        <div class="owl-carousel news-carousel carousel-item-4 position-relative">

            <?php foreach($featured as $article): ?>
            
            <div class="position-relative overflow-hidden" style="height: 300px;">
                <img class="img-fluid h-100" src="uploads/image/<?= $article['image'] ?>" style="object-fit: cover;">
                <div class="overlay">
                    <div class="mb-2">
                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href=""><?= $article['category'] ?></a>
                        <a class="text-white" href=""><small><?= date('M d, Y', strtotime($article['created_at'])) ?></small></a>
                    </div>
                    <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="<?= BASE_URL ?>show/<?= htmlspecialchars($article['id']) ?>"><?= $article['title'] ?></a>
                </div>
            </div>
    </div>
</div>