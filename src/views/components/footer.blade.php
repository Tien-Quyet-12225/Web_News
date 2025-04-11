<div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
    <div class="row py-4">
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">Liên hệ</h5>
            <p class="font-weight-medium"><i class="fa fa-map-marker-alt mr-2"></i>Duy Tiên,Hà Nam,Việt Nam</p>
            <p class="font-weight-medium"><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
            <p class="font-weight-medium"><i class="fa fa-envelope mr-2"></i>info@example.com</p>
            <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">Theo dõi chúng tôi</h6>
            <div class="d-flex justify-content-start">
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="https://facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="https://linkedin.com/in/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="https://instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                <a class="btn btn-lg btn-secondary btn-lg-square" href="https://youtube.com/channel/" target="_blank"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">Popular News</h5>
            <?php foreach($popular as $post): ?>
            <div class="mb-3">
                <div class="mb-2">
                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href=""><?= htmlspecialchars($post['category']) ?></a>
                    <a class="text-body" href=""><small><?= date('M d, Y', strtotime($post['created_at'])) ?></small></a>
                </div>
                <a class="small text-body text-uppercase font-weight-medium" href="<?= BASE_URL ?>show/<?= htmlspecialchars($post['id']) ?>"><?= htmlspecialchars(substr($post['title'], 0, 100)) ?>...</a>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">Categories</h5>
            <div class="m-n1">
                <?php foreach($categories as $category): ?>
                <a href="" class="btn btn-sm btn-secondary m-1"><?= htmlspecialchars($category['name']) ?></a>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h5 class="mb-4 text-white text-uppercase font-weight-bold">Flickr Photos</h5>
            <div class="row">
                <div class="col-4 mb-3">
                    <a href=""><img class="w-100" src="img/news-110x110-1.jpg" alt=""></a>
                </div>
                <div class="col-4 mb-3">
                    <a href=""><img class="w-100" src="img/news-110x110-2.jpg" alt=""></a>
                </div>
                <div class="col-4 mb-3">
                    <a href=""><img class="w-100" src="img/news-110x110-3.jpg" alt=""></a>
                </div>
                <div class="col-4 mb-3">
                    <a href=""><img class="w-100" src="img/news-110x110-4.jpg" alt=""></a>
                </div>
                <div class="col-4 mb-3">
                    <a href=""><img class="w-100" src="img/news-110x110-5.jpg" alt=""></a>
                </div>
                <div class="col-4 mb-3">
                    <a href=""><img class="w-100" src="img/news-110x110-1.jpg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
    <p class="m-0 text-center">&copy; <a href="#">Your Site Name</a>. All Rights Reserved.

        <!--/*** This template is free as long as you keep the footer author's credit link/attribution link/backlink. If you'd like to use the template without the footer author's credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
        Design by <a href="https://htmlcodex.com">HTML Codex</a>
    </p>
</div>