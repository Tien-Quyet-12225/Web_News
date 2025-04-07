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
