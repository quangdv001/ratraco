<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin Free Bootstrap Admin Dashboard Template</title>
    <!-- plugins:css -->
    <link rel="stylesheet"
          href="{{ asset('assets/admin/themes/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/themes/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/themes/vendors/css/vendor.bundle.addons.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/themes/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets/admin/themes/images/favicon.png') }}"/>
</head>

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
            <div class="row w-100">
                <div class="col-lg-4 mx-auto">
                    <div class="auto-form-wrapper">
                        <form action="" method="post">
                            @csrf
                            @if(session()->has('error'))
                                <div class="form-group">
                                    <p class="text-danger">{{ session('error') }}</p>
                                </div>
                            @endif
                            <div class="form-group">
                                <label class="label">Tài khoản</label>
                                <div class="input-group">
                                    <input type="text" name="username" required class="form-control" placeholder="Tài khoản">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="mdi mdi-check-circle-outline"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="label">Mật khẩu</label>
                                <div class="input-group">
                                    <input type="password" name="password" required class="form-control" placeholder="*********">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="mdi mdi-check-circle-outline"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary submit-btn btn-block">Đăng nhập</button>
                            </div>
                            <div class="form-group d-flex justify-content-between">
                                <div class="form-check form-check-flat mt-0">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" checked> Giữ tôi đăng nhập
                                    </label>
                                </div>
                                <a href="#" class="text-small forgot-password text-black">Quên mật khẩu</a>
                            </div>
                            {{--<div class="form-group">--}}
                            {{--<button class="btn btn-block g-login">--}}
                            {{--<img class="mr-3" src="../../images/file-icons/icon-google.svg" alt="">Log in with Google</button>--}}
                            {{--</div>--}}
                            {{--<div class="text-block text-center my-3">--}}
                            {{--<span class="text-small font-weight-semibold">Not a member ?</span>--}}
                            {{--<a href="register.html" class="text-black text-small">Create new account</a>--}}
                            {{--</div>--}}
                        </form>
                    </div>
                    <ul class="auth-footer">
                        <li>
                            <a href="#">Conditions</a>
                        </li>
                        <li>
                            <a href="#">Help</a>
                        </li>
                        <li>
                            <a href="#">Terms</a>
                        </li>
                    </ul>
                    <p class="footer-text text-center">copyright © 2018 Bootstrapdash. All rights reserved.</p>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{ asset('assets/admin/themes/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('assets/admin/themes/vendors/js/vendor.bundle.addons.js') }}"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="{{ asset('assets/admin/themes/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/admin/themes/js/misc.js') }}"></script>
<!-- endinject -->
</body>

</html>