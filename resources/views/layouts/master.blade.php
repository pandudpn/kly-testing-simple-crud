<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href={{ URL::asset('dataTables/datatables.min.css') }}>
    <link rel="stylesheet" href={{ URL::asset("vendors/iconfonts/mdi/css/materialdesignicons.min.css") }}>
    <link rel="stylesheet" href={{ URL::asset("vendors/css/vendor.bundle.base.css") }}>
    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href={{ URL::asset("css/style.css") }}>
    <!-- endinject -->
    <link rel="shortcut icon" href={{ URL::asset("images/favicon.png") }} />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css" />
</head>
<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="{{ url('/') }}">KLY</a>
                <a class="navbar-brand brand-logo-mini" href="{{ url('/') }}">KLY</a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                            <div class="nav-profile-img">
                                <img src={{ URL::asset("images/faces/face1.jpg") }} alt="image">
                                <span class="availability-status online"></span>             
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black">{{ session('name') }}</p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="{{ url('/login/logout') }}">
                                <i class="mdi mdi-logout mr-2 text-primary"></i>
                                Signout
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <a href="#" class="nav-link">
                        <div class="nav-profile-image">
                                <img src={{ URL::asset("images/faces/face1.jpg") }} alt="profile">
                                <span class="login-status online"></span> <!--change to offline or busy as needed-->              
                            </div>
                            <div class="nav-profile-text d-flex flex-column">
                                <span class="font-weight-bold mb-2">{{ session('name') }}</span>
                                <span class="text-secondary text-small">{{ session('role_name') }}</span>
                            </div>
                            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">
                            <span class="menu-title">Home</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#master" aria-expanded="false" aria-controls="master">
                            <span class="menu-title">Master</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                        </a>
                        <div class="collapse" id="master">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{ url('/account') }}">Account</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{ url('/crud') }}">CRUD Simple</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">

                @yield('content')
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2019 <a href="http://pandudpn.id/" target="_blank">Pandu</a>. All rights reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
        <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src={{ URL::asset("vendors/js/vendor.bundle.base.js") }}></script>
    <script src={{ URL::asset("vendors/js/vendor.bundle.addons.js") }}></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src={{ URL::asset("js/off-canvas.js") }}></script>
    <script src={{ URL::asset("js/misc.js") }}></script>
    <script src={{ URL::asset('dataTables/datatables.min.js') }}></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src={{ URL::asset("js/dashboard.js") }}></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> --}}
    <!-- End custom js for this page-->
    @yield('script')
</body>

</html>
