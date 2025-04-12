@extends('layouts.master')

@section('title', 'Biznews')

@section('content')

<!-- Form đẹp hơn với bootstrap -->
<div class="container mt-5">
    <div class="card shadow p-4">
        <h3 class="mb-4 text-center">Thông tin liên hệ</h3>
        <form id="test-form" method="POST">
            <div class="mb-3">
                <label class="form-label">Họ tên</label>
                <input type="text" class="form-control" name="hoten" placeholder="Nhập họ tên">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Nhập email">
            </div>
            <div class="mb-3">
                <label class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" name="sodt" placeholder="Nhập số điện thoại">
            </div>
            <div class="mb-3">
                <label class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" name="diachi" placeholder="Nhập địa chỉ">
            </div>
            <div class="d-grid">
                <button type="submit" id="submit-form" class="btn btn-primary">Gửi</button>
            </div>
        </form>
    </div>
</div>

<!-- Nếu bạn chưa link bootstrap thì thêm vào master layout hoặc ở đây: -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->

<style>
    .card {
        border-radius: 15px;
        background-color: #f8f9fa;
    }

    .btn-primary {
        background-color: #c3ce4a;
        border: none;
    }

    .btn-primary:hover {
        background-color: #f7ef62;
    }
</style>

<script>
    var $form = $('form#test-form'),
        url = 'https://script.google.com/macros/s/AKfycbwKbNlVZB4nW9PodjqFVn-wO-8F0m6lyg8nLJub5b1Ds3E0SzBJqZNeW2rKP42e-Lfo/exec';

    $('#submit-form').on('click', function(e) {
        e.preventDefault();

        $.ajax({
            url: url,
            method: "POST",
            dataType: "json",
            data: $form.serialize()
        })
        .done(function(response) {
            alert("Gửi form thành công");
            $form[0].reset();
        })
        .fail(function(error) {
            alert("Gửi thất bại");
            console.error(error);
        });
    });
</script>

@endsection
