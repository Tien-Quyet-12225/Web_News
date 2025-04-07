@extends('admin.layouts.master')

@section('title', 'All User')

@section('content')
    <div class="m-2">
        <a href="#" id="add" class="btn btn-outline-orange">Add User</a>
    </div>

    <table class="table table-hover table-primary my-2 mx-2">
        <thead class="bg-primary text-white">
            <th>ID</th>
            <th>User Name</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Avatar</th>
            <th>Function</th>
        </thead>
        <tbody>
            @foreach ($users as $value)
                <tr>
                    <td class="id" data-id="{{ $value['id'] }}">{{ $value['id'] }}</td>
                    <td class="u-name" data-u="{{ $value['username'] }}">{{ $value['username'] }}</td>
                    <td class="f-name" data-f="{{ $value['full_name'] }}">{{ $value['full_name'] }}</td>
                    <td class="email" data-email="{{ $value['email'] }}">{{ $value['email'] }}</td>
                    <td class="role" data-role="{{ $value['role'] }}"></td>
                    <td class="avatar" data-avatar="{{ $value['avatar'] }}">
                        <img width="100" src="./../uploads/image/{{ $value['avatar'] }}"
                            class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"
                            alt="">
                    </td>
                    <td>
                        <a href="#" class="edit btn btn-danger">Edit</a>
                        <a href="{{ BASE_URL_ADMIN }}user-del/{{ $value['id'] }}" data-id="{{ $value['id'] }}"
                            class="delete btn btn-secondary">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
