@extends('layouts.app')
@section('content')
<!-- start main content -->

<div class="content">
    <div class="container-fluid">
        <div class="row gy-4">
            <div class="col-12">
                <div class="row gy-2">
                    <div class="col-lg-6">
                        <div class="single_address alert alert-light shadow-box">
                            <div class="d-flex align-items-center">
                                <div class="panel-meta-item-icon bg-success">
                                    <i class="bi bi-envelope"></i>
                                </div>
                                <div class="ms-3">
                                    <h4 class="title-line-bottom mb-3">ایمیل شرکت</h4>
                                    <a href="mailto:" class="fs-5">Info@example.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single_address alert alert-light shadow-box">
                           <div class="d-flex align-items-center">
                               <div class="panel-meta-item-icon bg-danger">
                                     <i class="bi bi-telephone"></i>
                               </div>
                               <div class="ms-3">
                                   <h4 class="title-line-bottom mb-3">شماره شرکت</h4>
                                   <a href="tel:" class="fs-5">02112345678</a>
                               </div>
                           </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single_address alert alert-light shadow-box">
                            <div class="d-flex align-items-center">
                                <div class="panel-meta-item-icon bg-info">
                                    <i class="bi bi-clock-history"></i>
                                </div>
                                <div class="ms-3">
                                    <h4 class="title-line-bottom mb-3">ساعت کاری</h4>
                                    <p>شنبه تا چهارشنبه 8 صبح تا 17 بعد از ظهر <br>پنج شنبه ها 8 صبح تا 2 بعد از ظهر</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single_address alert alert-light shadow-box">
                            <div class="d-flex align-items-center">
                                <div class="panel-meta-item-icon bg-dark">
                                    <i class="bi bi-pin-map"></i>
                                </div>
                                <div class="ms-3">
                                    <h4 class="title-line-bottom mb-3">آدرس شرکت</h4>
                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row gy-4">
                    <div class="col-lg-3">
                        <div class="contact-map h-100">
                            <iframe class="w-100 h-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d207344.50843900483!2d51.347655249999995!3d35.707573749999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f8e00491ff3dcd9%3A0xf0b3697c567024bc!2sTehran%2C%20Tehran%20Province!5e0!3m2!1sen!2s!4v1665401721614!5m2!1sen!2s" title="نقشه"></iframe>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="contact-title text-center">
                            <h1 class="title-font title-line-bottom-center mb-3">تماس با ما</h1>
                            <p class="text-muted mb-4">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است</p>
                        </div>
                        <div class="content-box">
                            <div class="container-fluid">
                                <form action="">
                                    <div class="row gy-4">
                                        <div class="col-sm-6">
                                            <div class="comment-item">
                                                <input type="email" class="form-control" id="floatingInputEmail1">
                                                <label for="floatingInputEmail1" class="form-label label-float">ایمیل خود را وارد
                                                    کنید</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="comment-item">
                                                <input type="text" class="form-control" id="floatingInputName">
                                                <label for="floatingInputName" class="form-label label-float">نام خود را وارد
                                                    کنید</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="comment-item">
                                                <textarea class="form-control" id="floatingTextarea2" style="height: 157px;"></textarea>
                                                <label for="floatingTextarea2" class="form-label label-float">متن پیام!</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn main-color-one-bg px-5 py-2">ارسال</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end main content -->
@endsection
