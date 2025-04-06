<div class="container-fluid">
  <div class="row">
      <div class="col-lg-7 px-0">
          <div class="owl-carousel main-carousel position-relative">
              
              <?php foreach($latest as $key => $article): ?>

              <div class="position-relative overflow-hidden" style="height: 500px;">
                  <img class="img-fluid h-100" src="uploads/image/<?= $article['image'] ?>" style="object-fit: cover;">
                  <div class="overlay">
                      <div class="mb-2">
                          <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href=""><?= $article['category'] ?></a>
                          <a class="text-white" href=""><?= date('M d, Y', strtotime($article['created_at'])) ?></a>
                      </div>
                      <a class="h2 m-0 text-white text-uppercase font-weight-bold" href="<?= BASE_URL ?>show/<?= htmlspecialchars($article['id']) ?>"><?= $article['title'] ?></a>
                  </div>
              </div>

              <?php endforeach ?>
              
          </div>

        </div>
        <div class="col-lg-5 px-0">
            <div class="row mx-0">
                
            <?php foreach($featured as $article): ?>
                    
                <div class="col-md-6 px-0">
                    <div class="position-relative overflow-hidden" style="height: 250px;">
                        <img class="img-fluid w-100 h-100" src="uploads/image/<?= $article['image'] ?>" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href=""><?= $article['category'] ?></a>
                                <a class="text-white" href=""><small><?= date('M d, Y', strtotime($article['created_at'])) ?></small></a>
                            </div>
                            <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="<?= BASE_URL ?>show/<?= htmlspecialchars($article['id']) ?>"><?= $article['title'] ?></a>
                        </div>
                    </div>
                </div>

            <?php endforeach ?>    
                
            </div>

      </div>
  </div>
</div>