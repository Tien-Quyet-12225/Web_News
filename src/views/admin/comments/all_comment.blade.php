@extends('admin.layouts.master')

@section('content')
    <h1>Danh sách bình luận</h1>

    

    <table class="table table-hover table-primary my-2 mx-2">
        <thead  class="bg-primary text-white">
            <tr>
                <th>ID</th>
                <th>Bài viết</th>
                <th>Nội dung</th>
                <th>Người gửi</th>
                <th>Ngày gửi</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($comments as $comment)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $comment['article_title'] }}</td>
                    <td>{{ $comment['comment_content'] }}</td>
                    <td>{{ $comment['user_name'] }}</td>
                    <td>{{ $comment['created_at'] }}</td>
                    <td>
                        <a href="{{ BASE_URL }}/admin/comments/delete/{{ $comment['id'] }}"
                           onclick="return confirm('Bạn có chắc muốn xoá bình luận này?')"
                           class="btn btn-danger">🗑 Xoá</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
