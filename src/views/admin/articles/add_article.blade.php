@extends('admin.layouts.master')

@section('title', 'Add Article')

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
        <h2>Add News</h2>
        <form method="post" action="<?php echo BASE_URL_ADMIN; ?>article-add" enctype="multipart/form-data" id="newsForm">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" required>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category" required>
                    <option value="">Select category</option>
                    @foreach ($categories as $item)
                        <option value="{{ $item['id'] }}">{{ $item['name'] }} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control a4-size" id="editor" name="content" placeholder="Enter content" required></textarea>
            </div>
            <button type="submit" name="btn-add" class="btn btn-primary">Submit</button>
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
            $('#editor').summernote({
                placeholder: 'Type your text here...',
                tabsize: 2,
                height: 297 * 3.77953,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
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
