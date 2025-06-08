<!doctype html>
<html class="no-js" dir="rtl" lang="Fa_IR">

<head>
    <meta charset="utf-8">
    <title>قالب ایران ترابر</title>
    <meta content="" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">

    <meta content="" property="og:title">
    <meta content="" property="og:type">
    <meta content="" property="og:url">
    <meta content="" property="og:image">

    <!-- Place favicon.ico in the root directory -->

    <link href="{{ asset('assets/css/normalize.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/font/bootstrap-icon/bootstrap-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">

    <meta content="#f4f5f9" name="theme-color">
</head>

<body class="bg-auth">

    <!-- start content -->

    <div class="content vh-100">
        <div class="container-fluid h-100">

            <div class="auth h-100 d-flex align-items-center">
                <div class="container-fluid">
                    <div class="auth-items">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="row align-items-center bg-white rounded-3 g-0 shadow-2xl">
                                    <div class="col-lg-6">
                                        <div class="login-vector bg-white text-center">
                                            <img src="{{ asset('assets/img/login-vector.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="rounded-3 auth-parent py-3 bg-white">
                                            <div class="auth-logo text-center">
                                                <a href="">
                                                    <img src="{{ asset('assets/img/logo.png') }}" width="200"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="auth-form">
                                                <div class="auth-form-title mb-4 slider-title-desc-center">
                                                    <h2
                                                        class="text-center h4 title-line-bottom-center text-muted title-font">
                                                        ورود | ثبت ‌نام</h2>
                                                </div>
                                                <form method="POST" action="{{ route('login') }}" id="form-auth">
                                                    @csrf

                                                    <div class="comment-item mt-4 step-username">
                                                        <input type="email" class="form-control" id="email" name="email">
                                                        <label for="email" class="form-label label-float">لطفا شماره
                                                            موبایل یا ایمیل خود را وارد کنید</label>
                                                    </div>

                                                    <div class="comment-item mt-4 position-relative step-passwd">
                                                        <input type="password" class="form-control" id="password" name="password">
                                                        <label for="password" class="form-label label-float">رمز عبور
                                                            خود را وارد کنید</label>
                                                        {{-- <div class="inline-btn-text">
                                                            <a href="otp-sms.html"
                                                                class="btn border-0 main-color-one-bg">ورود با پیامک</a>
                                                        </div> --}}
                                                    </div>

                                                    <div class="form-group step-one mt-4">
                                                        <button type="button"
                                                            class="btn main-color-one-bg border-0 w-100 d-block py-3">ورود
                                                            / ثبت نام</button>
                                                    </div>
                                                    <div class="form-group step-two mt-4">
                                                        <button type="button"
                                                            class="btn btnForm main-color-one-bg border-0 w-100 d-block py-3">تایید</button>
                                                    </div>

                                                </form>

                                                {{-- <p class="loginTermsDesc mt-4">
                                                    ورود شما به معنای پذیرش
                                                    <a class="mx-1 inline-block main-color-one-color"
                                                        href="/page/terms/">شرایط راستچین</a>
                                                    و
                                                    <a class="mx-1 inline-block main-color-one-color"
                                                        href="/page/privacy/">قوانین حریم‌خصوصی</a>
                                                    است
                                                </p> --}}

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- end content -->

    <script src="{{ asset('assets/js/vendor/modernizr-3.11.2.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.bundle-5.3.2.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/rasta-contact/script.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
