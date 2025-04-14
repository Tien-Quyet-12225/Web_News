@extends('layouts.master')

@section('title', 'Biznews')

@section('content')

<div class="container mt-5">
    <div class="hero">
        <div class="">
            <h1>📰 BizNews</h1>
            <p>Nơi bạn cập nhật tin tức mỗi ngày - Nhanh, Chính xác và Đa chiều</p>
            <a href="#signup" class="btn">Đăng ký miễn phí</a>
        </div>
    </div>

    <section class="features">
        <h2>Tại sao chọn BizNews?</h2>
        <div class="cards">
            <div class="card">
                <h3>🔥 Tin tức nóng hổi</h3>
                <p>Liên tục cập nhật các sự kiện trong nước và quốc tế mỗi giờ.</p>
            </div>
            <div class="card">
                <h3>🧠 Phân tích chuyên sâu</h3>
                <p>Đội ngũ chuyên gia bình luận giúp bạn hiểu rõ bản chất sự kiện.</p>
            </div>
            <div class="card">
                <h3>📱 Giao diện tối ưu</h3>
                <p>Thiết kế hiện đại, hiển thị mượt mà trên mọi thiết bị.</p>
            </div>
        </div>
    </section>
</div>
   


@endsection
