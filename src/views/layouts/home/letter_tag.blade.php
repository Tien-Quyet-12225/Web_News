<div class="mb-3">
    <div class="section-title mb-0">
        <h4 class="m-0 text-uppercase font-weight-bold">Newsletter</h4>
    </div>
    <div class="bg-white text-center border border-top-0 p-3">
        <p>Aliqu justo et labore at eirmod justo sea erat diam dolor diam vero kasd</p>
        <div class="input-group mb-2" style="width: 100%;">
            <input type="text" class="form-control form-control-lg" placeholder="Your Email">
            <div class="input-group-append">
                <a href="http://web_news.test/show_register" class="btn btn-primary font-weight-bold px-3">Sign Up</a>
            </div>
        </div>
        <small>Lorem ipsum dolor sit amet elit</small>
    </div>
</div>
<!-- Newsletter End -->

<!-- Tags Start -->
<div class="mb-3">
    <div class="section-title mb-0">
        <h4 class="m-0 text-uppercase font-weight-bold">Categories</h4>
    </div>
    <div class="bg-white border border-top-0 p-3">
        <div class="d-flex flex-wrap m-n1">
            @foreach ($categories as $category)
                <a href="{{ BASE_URL }}category/{{ $category['id'] }}" class="btn btn-sm btn-outline-secondary m-1">{{ $category['name'] }}</a>
            @endforeach
        </div>
    </div>
</div>