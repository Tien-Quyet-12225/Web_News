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

    </table>

    <div id="dim-background" class="dim-background"></div>

    <div id="edit-form" class='form-category overflow-auto'>
        <form action="<?php echo BASE_URL_ADMIN; ?>user-update" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" id="user_id">
            <div class="form-group">
                <label for="newUserName">User Name:</label>
                <input type="text" id="username" class="form-control form-control-sm" name="userName"
                    placeholder="Nhập tên của bạn..." required>
            </div>

            <div class="form-group">
                <label for="newUserName">Full Name:</label>
                <input type="text" id="fullname" class="form-control form-control-sm" name="userFullName"
                    placeholder="Nhập tên của bạn..." required>
            </div>

            <div class="form-group">
                <label for="newUserEmail">Email:</label>
                <input type="email" id="email" class="form-control form-control-sm" name="userEmail"
                    id="newUserEmail" placeholder="Nhập email..." required>
            </div>

            <div class="form-group">
                <label for="">Role:</label>
                <select name="role" id="role" required>
                    <option value="">---</option>
                    <option value="admin">Admin</option>
                    <option value="editor">Editor</option>
                    <option value="user">User</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Avatar:</label>
                <input type="file" class="form-control-file" name="avatar">
                <label for="">Current Avatar:</label>
                <img id="avatar" width="100" src=""
                    class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"
                    alt="">
            </div>

            <div class="form-group">
                <button type="submit" name="btn-edit" class="btn btn-outline-success">Edit</button>
                <button type="button" id="cancel-edit" class="btn btn-secondary">Cancel</button>
            </div>
        </form>
    </div>

    <div id="add-form" class="form-category">
        <form action="<?php echo BASE_URL_ADMIN; ?>user-add" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="newUserName">User Name:</label>
                <input type="text" class="form-control form-control-sm" name="newUserName" id="newUserName"
                    placeholder="Nhập tên của bạn..." required>
            </div>

            <div class="form-group">
                <label for="newUserName">Full Name:</label>
                <input type="text" class="form-control form-control-sm" name="newUserFullName"
                    placeholder="Nhập tên của bạn..." required>
            </div>

            <div class="form-group">
                <label for="newUserEmail">Email:</label>
                <input type="email" class="form-control form-control-sm" name="newUserEmail" id="newUserEmail"
                    placeholder="Nhập email..." required>
            </div>

            <div class="form-group">
                <label for="newUserPassword">Password:</label>
                <input type="password" class="form-control form-control-sm" name="newUserPassword"
                    placeholder="Nhập mật khẩu..." required>
            </div>

            <div class="form-group">
                <label for="">Role:</label>
                <select name="newUserRole" id="" required>
                    <option value="">---</option>
                    <option value="admin">Admin</option>
                    <option value="editor">Editor</option>
                    <option value="user">User</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Avatar:</label>
                <input type="file" class="form-control-file" name="newUserAvatar" required>
            </div>

            <div class="form-group">
                <button type="submit" name="btn-add" class="btn btn-outline-success">Add</button>
                <button type="button" id="cancel-add" class="btn btn-secondary">Cancel</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            $('.role').each(function() {
                var role = $(this).data('role');
                if (role == 'admin') {
                    $(this).text('Admin').css({
                        'color': 'red',
                        'font-weight': '500',
                        'font-size': '18px'
                    });
                } else if (role == 'editor') {
                    $(this).text('Editor').css({
                        'color': 'blue',
                        'font-weight': '500',
                        'font-size': '18px'
                    });
                } else {
                    $(this).text('User').css({
                        'color': 'green',
                        'font-weight': '500',
                        'font-size': '18px'
                    });
                }
            })





            $('a#add').click(function(e) {
                e.preventDefault();
                $('#dim-background').show();
                $('#add-form').show();
            });
            $('#cancel-add').click(function() {
                $('#add-form').hide();
                $('#dim-background').hide();
            });

            $('a.edit').click(function(e) {
                e.preventDefault();

                var id = $(this).closest('tr').find('.id').data('id');
                var username = $(this).closest('tr').find('.u-name').data('u');
                var fullname = $(this).closest('tr').find('.f-name').data('f');
                var email = $(this).closest('tr').find('.email').data('email');
                var role = $(this).closest('tr').find('.role').data('role');
                var avatar = $(this).closest('tr').find('.avatar').data('avatar');


                $('#user_id').val(id);
                $('#username').val(username);
                $('#fullname').val(fullname);
                $('#email').val(email);

                var roleOp = '<option value="' + role + '" selected>' + role + '</option>'

                $('#role').prepend(roleOp);

                $('#avatar').attr('src', './../uploads/image/' + avatar);


                $('#dim-background').show();
                $('#edit-form').show();
            });
            $('#cancel-edit').click(function() {
                $('#edit-form').hide();
                $('#dim-background').hide();
            });
        });
    </script>
@endsection
