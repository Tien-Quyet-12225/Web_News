@extends('admin.layouts.master')

@section('title', 'All Article')

@section('content')
    <table class="table table-hover table-primary my-2 mx-2">
        <thead class="bg-primary text-white">
            <th>ID</th>
            <th>Title</th>
            <th>Image</th>
            <th>Author</th>
            <th>Category</th>
            <th>Function</th>
        </thead>
        <tbody>
            @foreach ($articles as $value)
                <tr>
                    <td>{{ $value['id'] }}</td>
                    <td class="char-limit">{{ $value['title'] }}</td>
                    <td>
                        <img src="./../uploads/image/{{ $value['image'] }}" width="100" class="img-fluid"
                            alt="">
                    </td>
                    <td>{{ $value['username'] }}</td>
                    <td>{{ $value['category'] }}</td>
                    <td>
                        <a href="{{ BASE_URL_ADMIN }}article-edit/{{ $value['id'] }}" class="btn btn-danger">Edit</a>
                        <a href="{{ BASE_URL_ADMIN }}article-del/{{ $value['id'] }}"
                            class="delete btn btn-secondary">Delete</a>
                        <a href="view.php?id={{ $value['id'] }}" class="btn btn-primary">View</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const maxLength = 30; // Số ký tự tối đa
            const elements = document.querySelectorAll('.char-limit');

            elements.forEach(element => {
                let text = element.innerText;
                if (text.length > maxLength) {
                    element.innerText = text.substring(0, maxLength) + '...';
                }
            });
        });
    </script>
@endsection
