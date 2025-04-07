@extends('admin.layouts.master')

@section('title', 'All Category')

@section('content')
    <div class="m-2">
        <a href="#" id="add" class="btn btn-outline-orange">Add Category</a>
    </div>

    <table class="table table-hover table-primary my-2 mx-2">
        <thead class="bg-primary text-white">
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Function</th>
        </thead>
        <tbody>
            @foreach ($categories as $value)
                <tr>
                    <td class="id" data-id="{{ $value['id'] }}">{{ $value['id'] }}</td>
                    <td class="name" data-name="{{ $value['name'] }}">{{ $value['name'] }}</td>
                    <td class="des" data-des="{{ $value['description'] }}">{{ $value['description'] }}</td>
                    <td>
                        <a href="#" class="edit btn btn-danger">Edit</a>
                        <a href="{{ BASE_URL_ADMIN }}category-del/{{ $value['id'] }}" data-id="{{ $value['id'] }}"
                            class="delete btn btn-secondary">Delete</a>
                    </td>
                </tr>
            @endforeach    
        </tbody>
    </table>

    <div id="dim-background" class="dim-background"></div>

    <div id="edit-form" class='form-category'>
        <form action="<?php echo BASE_URL_ADMIN; ?>category-update" method="post">
            @csrf
            <input type="hidden" name="id" id="category_id">
            <div class="form-group">
                <label for="nameUser">Name:</label>
                <input type="text" name="name" id="category_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="emailUser">Description:</label>
                <input type="text" name="description" id="category_description" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" name="btn-edit" class="btn btn-outline-success">Edit</button>
                <button type="button" id="cancel-edit" class="btn btn-secondary">Cancel</button>
            </div>
        </form>
    </div>

    <div id="add-form" class="form-category">
        <form action="<?php echo BASE_URL_ADMIN; ?>category-add" method="post">
            @csrf
            <input type="hidden" name="id" id="user_id">
            <div class="form-group">
                <label for="nameUser">Name:</label>
                <input type="text" name="name" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="emailUser">Description:</label>
                <input type="text" name="description" id="" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" name="btn-add" class="btn btn-outline-success">Add</button>
                <button type="button" id="cancel-add" class="btn btn-secondary">Cancel</button>
            </div>
        </form>
    </div>
@endsection    

