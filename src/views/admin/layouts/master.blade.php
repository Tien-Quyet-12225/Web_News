<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ BASE_URL_ADMIN }}assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="{{ BASE_URL_ADMIN }}assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="{{ BASE_URL_ADMIN }}assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="{{ BASE_URL_ADMIN }}assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css"
        rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{ BASE_URL_ADMIN }}dist/css/style.min.css" rel="stylesheet">
    <link href="{{ BASE_URL_ADMIN }}dist/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ BASE_URL_ADMIN }}dist/css/style.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        
    <title>@yield('title')</title>
    @yield('styles')
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @include('admin.component.header')
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @include('admin.component.sidebar')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            @yield('content')
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            @include('admin.component.footer')
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ BASE_URL_ADMIN }}assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="{{ BASE_URL_ADMIN }}assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="{{ BASE_URL_ADMIN }}assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="{{ BASE_URL_ADMIN }}dist/js/app-style-switcher.js"></script>
    <script src="{{ BASE_URL_ADMIN }}dist/js/feather.min.js"></script>
    <script src="{{ BASE_URL_ADMIN }}assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js">
    </script>
    <script src="{{ BASE_URL_ADMIN }}dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="{{ BASE_URL_ADMIN }}dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ BASE_URL_ADMIN }}assets/extra-libs/c3/d3.min.js"></script>
    <script src="{{ BASE_URL_ADMIN }}assets/extra-libs/c3/c3.min.js"></script>
    <script src="{{ BASE_URL_ADMIN }}assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="{{ BASE_URL_ADMIN }}assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js">
    </script>
    <script src="{{ BASE_URL_ADMIN }}assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="{{ BASE_URL_ADMIN }}assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{ BASE_URL_ADMIN }}dist/js/pages/dashboards/dashboard1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    
    @php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    @endphp
    @if (isset($_SESSION['toastr']))
        <script type="text/javascript">
            toastr.options = {
                "closeButton": false, // Hiển thị nút đóng
                "debug": false, // Hiển thị debug messages
                "newestOnTop": true, // Thông báo mới nhất hiển thị trên cùng
                "progressBar": true, // Hiển thị thanh tiến trình
                "positionClass": "toast-top-right", // Vị trí của thông báo
                "preventDuplicates": false, // Ngăn chặn thông báo trùng lặp
                "onclick": null, // Hàm gọi khi nhấp vào thông báo
                "showDuration": "300", // Thời gian hiển thị thông báo
                "hideDuration": "1000", // Thời gian ẩn thông báo
                "timeOut": "5000", // Thời gian tự động đóng thông báo
                "extendedTimeOut": "1000", // Thời gian tự động đóng thông báo khi di chuột qua
                "showEasing": "swing", // Hiệu ứng hiển thị
                "hideEasing": "linear", // Hiệu ứng ẩn
                "showMethod": "slideDown", // Phương pháp hiển thị
                "hideMethod": "slideUp", // Phương pháp ẩn
            }

            toastr.{{ $_SESSION['toastr']['type'] }}('{{ $_SESSION['toastr']['message'] }}');
        </script>
        @php unset($_SESSION['toastr']); @endphp
    @endif


    <script>
        function showAlert(notifyStatus, message) {
            // Thiết lập biểu tượng dựa trên notifyStatus
            let icon;
            switch (notifyStatus) {
                case 'success':
                    icon = 'success';
                    break;
                case 'error':
                    icon = 'error';
                    break;
                case 'warning':
                    icon = 'warning';
                    break;
                case 'info':
                    icon = 'info';
                    break;
                default:
                    icon = 'info';
                    break;
            }

            Swal.fire({
                title: 'Thông báo',
                text: message,
                icon: icon,
                confirmButtonText: 'OK',
                timer: 2000,
                timerProgressBar: true,
                showConfirmButton: false // Ẩn nút xác nhận vì chúng ta có timer
            });
        }
        $(document).ready(function() {
            $('.delete').click(function(e) {
                e.preventDefault();

                // var id = $(this).data('id');

                var deleteLink = $(this).attr('href');

                var deleteButton = $(this);

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: deleteLink,
                            type: 'GET',
                            // data: {
                            //     id: id
                            // },
                            success: function(response) {
                                console.log(response);
                                response = JSON.parse(response);
                                if (response.status === 'success') {

                                    deleteButton.closest('tr').remove();

                                    showAlert('success', response.message);

                                } else if (response.status === 'error') {

                                    showAlert('error', response.message);
                                }
                            },
                            error: function() {
                                showAlert('error', response.message);
                            }
                        })
                    }
                });

            });
        });
    </script>
    @yield('scripts')
</body>

</html>
