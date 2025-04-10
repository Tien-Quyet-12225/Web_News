@extends('admin.layouts.master')

@section('title', 'Edit Article')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <style>
        .a4-size {
            width: 210mm;
            min-height: 297mm;
            padding: 20mm;
            margin: 0 auto;
            border: 1px solid #ccc;
            background-color: white;
        }
    </style>
@endsection

@section('content')

    <div class="container mt-5">
        <h2>Edit Article</h2>
        <form method="post" action="<?php echo BASE_URL_ADMIN; ?>article-update" enctype="multipart/form-data" id="newsForm">
            @csrf
            <input type="hidden" name="articleId" value="{{ $article['id'] }}">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="newTitle" value="{{ $article['title'] }}"
                    placeholder="Enter title" required>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="newCategory" required>
                    <option value="{{ $article['category_id'] }}">{{ $article['category_name'] }}</option>

                    @foreach ($categories as $item)
                        <option value="{{ $item['id'] }}">{{ $item['name'] }} </option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <label for="">Current Image:</label>
                <img width="100" src="../../uploads/image/{{ $article['image'] }}"
                    class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"
                    alt="">
            </div>
            <div class="form-group">
                <label for="image">New Image</label>
                <input type="file" class="form-control-file" id="image" name="newImage">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control a4-size" id="summernote" name="newContent" placeholder="Enter content"
                    required>
                    {{ $article['content'] }}
                </textarea>
            </div>
            <button type="submit" name="btn-edit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/plugin/summernote-ext-image-attributes.js">
    </script>
    <!-- Summernote Initialization -->
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Type your text here...',
                tabsize: 2,
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
            });
        });
    </script>
@endsection
