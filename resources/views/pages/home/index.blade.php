@extends('layouts.app')
@section('content')
<!-- start main slider -->

@include('partials.home.slider')

<!-- end main slider -->
<!-- start categories -->

<div class="categories free-swiper py-30">
    <div class="container-fluid position-relative">

        <div class="section-title">
            <div class="row gy-3 align-items-center">
                <div class="col-sm-8">
                    <div class="section-title-title">
                        <h2 class="title-font h1">دسته بندی <span class="main-color-two-color">محصولات</span>
                        </h2>
                        <div class="Dottedsquare"></div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="section-title-link text-sm-end text-start">
                        <a class="btn main-color-two-bg border-0" href=""> مشاهده همه</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="swiper cat-slider">
            <div class="swiper-wrapper">

                @foreach ($categories as $category)
                <div class="swiper-slide">
                    <div class="slider-category-item">
                        <div class="slider-category-item-title">
                            <h6>{{ $category->name }}</h6>
                            <span>{{ $category->products_count }} محصول</span>
                        </div>
                        <div class="slider-category-item-image">
                            <img src="{{ asset('assets/img/category/camera.jpg') }}" alt="{{ $category->name }}">
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>

<!-- end categories -->


<!-- start amazing -->

<div class="amazing-slider site-slider">
    <div class="container-fluid">
        <div class="amazing-slider-parent">
            <div class="swiper amazing">
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide sw-title-image">
                        <div class="d-flex justify-content-center mt-5 align-items-center flex-column">
                            <h3 class="text-white">پیشنهاد</h3>
                            <h3 class="text-white">شگفت انگیز</h3>
                            <a href="" class="mt-2 btn btn-light rounded-pill btn-sm btn-amazing-sw"> مشاهده همه <i class="bi bi-arrow-left-short"></i></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-box">
                            <div class="product-box-image">

                                <img src="assets/img/product/product-image1.jpg" loading="lazy" alt="" class="img-fluid one-image">
                                <img src="assets/img/product/product-image2.jpg" loading="lazy" alt="" class="img-fluid two-image">

                                <div class="color-box">
                                    <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                        <span class="color hint--top" style="background-color: #487eb0;"></span>
                                    </div>
                                    <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                        <span class="color hint--top" style="background-color: #353b48;"></span>
                                    </div>
                                    <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                        <span class="color hint--top" style="background-color: #7f8fa6;"></span>
                                    </div>
                                </div>
                                <div class="product-box-price-discount">
                                    <span class="d-block badge main-color-two-bg text-white font-14">25%</span>
                                </div>
                                <span class="product-box-image-overlay"></span>
                            </div>
                            <div class="product-box-title">
                                <a href="">
                                    <h5 class="text-overflow-2">ساعت هوشمند شیائومی مدل Redmi Watch 2 Lite طرح بند
                                        سلیکونی
                                    </h5>
                                </a>
                            </div>
                            <div class="product-box-suggest-price d-flex align-items-center justify-content-between">
                                <del class="font-16">5,000,000</del>
                                <ins class="font-25">2,500,000 <span>تومان</span></ins>
                            </div>
                            <div class="product-box-hover-action">

                                <nav class="navbar navbar-expand justify-content-center">
                                    <ul class="navbar-nav align-items-center">
                                        <li class="nav-item">
                                            <a href="" class="nav-item product-box-hover-item me-3">مشاهده محصول</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-item product-box-hover-item product-box-hover-item-btn me-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="افزودن به سبد خرید"><i class="bi bi-basket"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-item product-box-hover-item product-box-hover-item-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="افزودن به علاقه ها"><i class="bi bi-heart"></i></a>
                                        </li>
                                    </ul>
                                </nav>

                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-box">
                            <div class="product-box-image">

                                <img src="assets/img/product/product-image3.jpg" loading="lazy" alt="" class="img-fluid one-image">
                                <img src="assets/img/product/product-image4.jpg" loading="lazy" alt="" class="img-fluid two-image">

                                <div class="color-box">
                                    <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                        <span class="color hint--top" style="background-color: #f5cd79;"></span>
                                    </div>
                                    <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                        <span class="color hint--top" style="background-color: #f8a5c2;"></span>
                                    </div>
                                    <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                        <span class="color hint--top" style="background-color: #574b90;"></span>
                                    </div>
                                </div>
                                <div class="product-box-price-discount">
                                    <span class="d-block badge main-color-two-bg text-white font-14">25%</span>
                                </div>
                                <span class="product-box-image-overlay"></span>
                            </div>
                            <div class="product-box-title">
                                <a href="">
                                    <h5 class="text-overflow-2">ساعت هوشمند شیائومی مدل Redmi Watch 2 Lite طرح بند
                                        سلیکونی
                                    </h5>
                                </a>
                            </div>
                            <div class="product-box-suggest-price d-flex align-items-center justify-content-between">
                                <del class="font-16">5,000,000</del>
                                <ins class="font-25">2,500,000 <span>تومان</span></ins>
                            </div>
                            <div class="product-box-hover-action">

                                <nav class="navbar navbar-expand justify-content-center">
                                    <ul class="navbar-nav align-items-center">
                                        <li class="nav-item">
                                            <a href="" class="nav-item product-box-hover-item me-3">مشاهده محصول</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-item product-box-hover-item product-box-hover-item-btn me-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="افزودن به سبد خرید"><i class="bi bi-basket"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-item product-box-hover-item product-box-hover-item-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="افزودن به علاقه ها"><i class="bi bi-heart"></i></a>
                                        </li>
                                    </ul>
                                </nav>

                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-box">
                            <div class="product-box-image">

                                <img src="assets/img/product/product-image4.jpg" loading="lazy" alt="" class="img-fluid one-image">
                                <img src="assets/img/product/product-image5.jpg" loading="lazy" alt="" class="img-fluid two-image">

                                <div class="color-box">
                                    <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                        <span class="color hint--top" style="background-color: #8854d0;"></span>
                                    </div>
                                    <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                        <span class="color hint--top" style="background-color: #e15f41;"></span>
                                    </div>
                                    <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                        <span class="color hint--top" style="background-color: #ea8685;"></span>
                                    </div>
                                </div>
                                <div class="product-box-price-discount">
                                    <span class="d-block badge main-color-two-bg text-white font-14">25%</span>
                                </div>
                                <span class="product-box-image-overlay"></span>
                            </div>
                            <div class="product-box-title">
                                <a href="">
                                    <h5 class="text-overflow-2">ساعت هوشمند شیائومی مدل Redmi Watch 2 Lite طرح بند
                                        سلیکونی
                                    </h5>
                                </a>
                            </div>
                            <div class="product-box-suggest-price d-flex align-items-center justify-content-between">
                                <del class="font-16">5,000,000</del>
                                <ins class="font-25">2,500,000 <span>تومان</span></ins>
                            </div>
                            <div class="product-box-hover-action">

                                <nav class="navbar navbar-expand justify-content-center">
                                    <ul class="navbar-nav align-items-center">
                                        <li class="nav-item">
                                            <a href="" class="nav-item product-box-hover-item me-3">مشاهده محصول</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-item product-box-hover-item product-box-hover-item-btn me-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="افزودن به سبد خرید"><i class="bi bi-basket"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-item product-box-hover-item product-box-hover-item-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="افزودن به علاقه ها"><i class="bi bi-heart"></i></a>
                                        </li>
                                    </ul>
                                </nav>

                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-box">
                            <div class="product-box-image">

                                <img src="assets/img/product/wach1.jpg" loading="lazy" alt="" class="img-fluid one-image">
                                <img src="assets/img/product/wach2.jpg" loading="lazy" alt="" class="img-fluid two-image">

                                <div class="color-box">
                                    <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                        <span class="color hint--top" style="background-color: #2bcbba;"></span>
                                    </div>
                                    <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                        <span class="color hint--top" style="background-color: #d1d8e0;"></span>
                                    </div>
                                    <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                        <span class="color hint--top" style="background-color: #8854d0;"></span>
                                    </div>
                                </div>
                                <div class="product-box-price-discount">
                                    <span class="d-block badge main-color-two-bg text-white font-14">25%</span>
                                </div>
                                <span class="product-box-image-overlay"></span>
                            </div>
                            <div class="product-box-title">
                                <a href="">
                                    <h5 class="text-overflow-2">ساعت هوشمند شیائومی مدل Redmi Watch 2 Lite طرح بند
                                        سلیکونی
                                    </h5>
                                </a>
                            </div>
                            <div class="product-box-suggest-price d-flex align-items-center justify-content-between">
                                <del class="font-16">5,000,000</del>
                                <ins class="font-25">2,500,000 <span>تومان</span></ins>
                            </div>
                            <div class="product-box-hover-action">

                                <nav class="navbar navbar-expand justify-content-center">
                                    <ul class="navbar-nav align-items-center">
                                        <li class="nav-item">
                                            <a href="" class="nav-item product-box-hover-item me-3">مشاهده محصول</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-item product-box-hover-item product-box-hover-item-btn me-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="افزودن به سبد خرید"><i class="bi bi-basket"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-item product-box-hover-item product-box-hover-item-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="افزودن به علاقه ها"><i class="bi bi-heart"></i></a>
                                        </li>
                                    </ul>
                                </nav>

                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-box">
                            <div class="product-box-image">

                                <img src="assets/img/product/wach3.jpg" loading="lazy" alt="" class="img-fluid one-image">
                                <img src="assets/img/product/wach4.jpg" loading="lazy" alt="" class="img-fluid two-image">

                                <div class="color-box">
                                    <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                        <span class="color hint--top" style="background-color: #fc5c65;"></span>
                                    </div>
                                    <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                        <span class="color hint--top" style="background-color: #fd9644;"></span>
                                    </div>
                                    <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                        <span class="color hint--top" style="background-color: #fed330;"></span>
                                    </div>
                                </div>
                                <div class="product-box-price-discount">
                                    <span class="d-block badge main-color-two-bg text-white font-14">25%</span>
                                </div>
                                <span class="product-box-image-overlay"></span>
                            </div>
                            <div class="product-box-title">
                                <a href="">
                                    <h5 class="text-overflow-2">ساعت هوشمند شیائومی مدل Redmi Watch 2 Lite طرح بند
                                        سلیکونی
                                    </h5>
                                </a>
                            </div>
                            <div class="product-box-suggest-price d-flex align-items-center justify-content-between">
                                <del class="font-16">5,000,000</del>
                                <ins class="font-25">2,500,000 <span>تومان</span></ins>
                            </div>
                            <div class="product-box-hover-action">

                                <nav class="navbar navbar-expand justify-content-center">
                                    <ul class="navbar-nav align-items-center">
                                        <li class="nav-item">
                                            <a href="" class="nav-item product-box-hover-item me-3">مشاهده محصول</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-item product-box-hover-item product-box-hover-item-btn me-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="افزودن به سبد خرید"><i class="bi bi-basket"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-item product-box-hover-item product-box-hover-item-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="افزودن به علاقه ها"><i class="bi bi-heart"></i></a>
                                        </li>
                                    </ul>
                                </nav>

                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-box">
                            <div class="product-box-image">

                                <img src="assets/img/product/television1.jpg" loading="lazy" alt="" class="img-fluid one-image">
                                <img src="assets/img/product/television2.jpg" loading="lazy" alt="" class="img-fluid two-image">

                                <div class="color-box">
                                    <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                        <span class="color hint--top" style="background-color: #00a8ff;"></span>
                                    </div>
                                    <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                        <span class="color hint--top" style="background-color: #8c7ae6;"></span>
                                    </div>
                                    <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                        <span class="color hint--top" style="background-color: #273c75;"></span>
                                    </div>
                                </div>
                                <div class="product-box-price-discount">
                                    <span class="d-block badge main-color-two-bg text-white font-14">25%</span>
                                </div>
                                <span class="product-box-image-overlay"></span>
                            </div>
                            <div class="product-box-title">
                                <a href="">
                                    <h5 class="text-overflow-2">ساعت هوشمند شیائومی مدل Redmi Watch 2 Lite طرح بند
                                        سلیکونی
                                    </h5>
                                </a>
                            </div>
                            <div class="product-box-suggest-price d-flex align-items-center justify-content-between">
                                <del class="font-16">5,000,000</del>
                                <ins class="font-25">2,500,000 <span>تومان</span></ins>
                            </div>
                            <div class="product-box-hover-action">

                                <nav class="navbar navbar-expand justify-content-center">
                                    <ul class="navbar-nav align-items-center">
                                        <li class="nav-item">
                                            <a href="" class="nav-item product-box-hover-item me-3">مشاهده محصول</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-item product-box-hover-item product-box-hover-item-btn me-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="افزودن به سبد خرید"><i class="bi bi-basket"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-item product-box-hover-item product-box-hover-item-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="افزودن به علاقه ها"><i class="bi bi-heart"></i></a>
                                        </li>
                                    </ul>
                                </nav>

                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="product-box">
                            <div class="product-box-image">

                                <img src="assets/img/product/television3.jpg" loading="lazy" alt="" class="img-fluid one-image">
                                <img src="assets/img/product/television4.jpg" loading="lazy" alt="" class="img-fluid two-image">

                                <div class="color-box">
                                    <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                        <span class="color hint--top" style="background-color: #fbc531;"></span>
                                    </div>
                                    <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                        <span class="color hint--top" style="background-color: #44bd32;"></span>
                                    </div>
                                    <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                        <span class="color hint--top" style="background-color: #e84118;"></span>
                                    </div>
                                </div>
                                <div class="product-box-price-discount">
                                    <span class="d-block badge main-color-two-bg text-white font-14">25%</span>
                                </div>
                                <span class="product-box-image-overlay"></span>
                            </div>
                            <div class="product-box-title">
                                <a href="">
                                    <h5 class="text-overflow-2">ساعت هوشمند شیائومی مدل Redmi Watch 2 Lite طرح بند
                                        سلیکونی
                                    </h5>
                                </a>
                            </div>
                            <div class="product-box-suggest-price d-flex align-items-center justify-content-between">
                                <del class="font-16">5,000,000</del>
                                <ins class="font-25">2,500,000 <span>تومان</span></ins>
                            </div>
                            <div class="product-box-hover-action">

                                <nav class="navbar navbar-expand justify-content-center">
                                    <ul class="navbar-nav align-items-center">
                                        <li class="nav-item">
                                            <a href="" class="nav-item product-box-hover-item me-3">مشاهده محصول</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-item product-box-hover-item product-box-hover-item-btn me-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="افزودن به سبد خرید"><i class="bi bi-basket"></i></a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-item product-box-hover-item product-box-hover-item-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="افزودن به علاقه ها"><i class="bi bi-heart"></i></a>
                                        </li>
                                    </ul>
                                </nav>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next d-lg-flex d-none"></div>
                <div class="swiper-button-prev d-lg-flex d-none"></div>
            </div>
        </div>
    </div>
</div>

<!-- end amazing -->

<!-- start advert -->

<div class="advert py-30">
    <div class="container-fluid">
        <div class="row gy-4">
            <div class="col-lg-6">
                <a href="">
                    <img src="assets/img/advert-1.png" class="w-100" alt="">
                </a>
            </div>
            <div class="col-lg-6">
                <a href="">
                    <img src="assets/img/advert-2.png" class="w-100" alt="">
                </a>
            </div>
        </div>
    </div>
</div>

<!-- end advert -->

<!-- start product slider -->

<div class="product-slider py-30 site-slider">
    <div class="container-fluid">

        <div class="section-title">
            <div class="row gy-3 align-items-center">
                <div class="col-sm-8">
                    <div class="section-title-title">
                        <h2 class="title-font h1">محصولات <span class="main-color-two-color">پر فروش</span>
                        </h2>
                        <div class="Dottedsquare"></div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="section-title-link text-sm-end text-start">
                        <a class="btn main-color-two-bg border-0" href=""> مشاهده همه</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="swiper pro-slider">
            <div class="swiper-wrapper align-items-center">
                <div class="swiper-slide">
                    <div class="product-box">
                        <div class="product-box-image">

                            <img src="assets/img/product/product-image1.jpg" loading="lazy" alt="" class="img-fluid one-image">
                            <img src="assets/img/product/product-image2.jpg" loading="lazy" alt="" class="img-fluid two-image">

                            <div class="color-box">
                                <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                    <span class="color hint--top" style="background-color: #487eb0;"></span>
                                </div>
                                <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                    <span class="color hint--top" style="background-color: #353b48;"></span>
                                </div>
                                <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                    <span class="color hint--top" style="background-color: #7f8fa6;"></span>
                                </div>
                            </div>
                            <div class="product-box-price-discount">
                                <span class="d-block badge main-color-two-bg text-white font-14">25%</span>
                            </div>
                            <span class="product-box-image-overlay"></span>
                        </div>
                        <div class="product-box-title">
                            <a href="">
                                <h5 class="text-overflow-2">ساعت هوشمند شیائومی مدل Redmi Watch 2 Lite طرح بند
                                    سلیکونی
                                </h5>
                            </a>
                        </div>
                        <div class="product-box-suggest-price d-flex align-items-center justify-content-between">
                            <del class="font-16">5,000,000</del>
                            <ins class="font-25">2,500,000 <span>تومان</span></ins>
                        </div>
                        <div class="product-box-hover-action">

                            <nav class="navbar navbar-expand justify-content-center">
                                <ul class="navbar-nav align-items-center">
                                    <li class="nav-item">
                                        <a href="" class="nav-item product-box-hover-item me-3">مشاهده محصول</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-item product-box-hover-item product-box-hover-item-btn me-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="افزودن به سبد خرید"><i class="bi bi-basket"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-item product-box-hover-item product-box-hover-item-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="افزودن به علاقه ها"><i class="bi bi-heart"></i></a>
                                    </li>
                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="product-box">
                        <div class="product-box-image">

                            <img src="assets/img/product/product-image3.jpg" loading="lazy" alt="" class="img-fluid one-image">
                            <img src="assets/img/product/product-image4.jpg" loading="lazy" alt="" class="img-fluid two-image">

                            <div class="color-box">
                                <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                    <span class="color hint--top" style="background-color: #f5cd79;"></span>
                                </div>
                                <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                    <span class="color hint--top" style="background-color: #f8a5c2;"></span>
                                </div>
                                <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                    <span class="color hint--top" style="background-color: #574b90;"></span>
                                </div>
                            </div>
                            <div class="product-box-price-discount">
                                <span class="d-block badge main-color-two-bg text-white font-14">25%</span>
                            </div>
                            <span class="product-box-image-overlay"></span>
                        </div>
                        <div class="product-box-title">
                            <a href="">
                                <h5 class="text-overflow-2">ساعت هوشمند شیائومی مدل Redmi Watch 2 Lite طرح بند
                                    سلیکونی
                                </h5>
                            </a>
                        </div>
                        <div class="product-box-suggest-price d-flex align-items-center justify-content-between">
                            <del class="font-16">5,000,000</del>
                            <ins class="font-25">2,500,000 <span>تومان</span></ins>
                        </div>
                        <div class="product-box-hover-action">

                            <nav class="navbar navbar-expand justify-content-center">
                                <ul class="navbar-nav align-items-center">
                                    <li class="nav-item">
                                        <a href="" class="nav-item product-box-hover-item me-3">مشاهده محصول</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-item product-box-hover-item product-box-hover-item-btn me-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="افزودن به سبد خرید"><i class="bi bi-basket"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-item product-box-hover-item product-box-hover-item-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="افزودن به علاقه ها"><i class="bi bi-heart"></i></a>
                                    </li>
                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="product-box">
                        <div class="product-box-image">

                            <img src="assets/img/product/product-image4.jpg" loading="lazy" alt="" class="img-fluid one-image">
                            <img src="assets/img/product/product-image5.jpg" loading="lazy" alt="" class="img-fluid two-image">

                            <div class="color-box">
                                <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                    <span class="color hint--top" style="background-color: #8854d0;"></span>
                                </div>
                                <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                    <span class="color hint--top" style="background-color: #e15f41;"></span>
                                </div>
                                <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                    <span class="color hint--top" style="background-color: #ea8685;"></span>
                                </div>
                            </div>
                            <div class="product-box-price-discount">
                                <span class="d-block badge main-color-two-bg text-white font-14">25%</span>
                            </div>
                            <span class="product-box-image-overlay"></span>
                        </div>
                        <div class="product-box-title">
                            <a href="">
                                <h5 class="text-overflow-2">ساعت هوشمند شیائومی مدل Redmi Watch 2 Lite طرح بند
                                    سلیکونی
                                </h5>
                            </a>
                        </div>
                        <div class="product-box-suggest-price d-flex align-items-center justify-content-between">
                            <del class="font-16">5,000,000</del>
                            <ins class="font-25">2,500,000 <span>تومان</span></ins>
                        </div>
                        <div class="product-box-hover-action">

                            <nav class="navbar navbar-expand justify-content-center">
                                <ul class="navbar-nav align-items-center">
                                    <li class="nav-item">
                                        <a href="" class="nav-item product-box-hover-item me-3">مشاهده محصول</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-item product-box-hover-item product-box-hover-item-btn me-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="افزودن به سبد خرید"><i class="bi bi-basket"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-item product-box-hover-item product-box-hover-item-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="افزودن به علاقه ها"><i class="bi bi-heart"></i></a>
                                    </li>
                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="product-box">
                        <div class="product-box-image">

                            <img src="assets/img/product/wach1.jpg" loading="lazy" alt="" class="img-fluid one-image">
                            <img src="assets/img/product/wach2.jpg" loading="lazy" alt="" class="img-fluid two-image">

                            <div class="color-box">
                                <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                    <span class="color hint--top" style="background-color: #2bcbba;"></span>
                                </div>
                                <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                    <span class="color hint--top" style="background-color: #d1d8e0;"></span>
                                </div>
                                <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                    <span class="color hint--top" style="background-color: #8854d0;"></span>
                                </div>
                            </div>
                            <div class="product-box-price-discount">
                                <span class="d-block badge main-color-two-bg text-white font-14">25%</span>
                            </div>
                            <span class="product-box-image-overlay"></span>
                        </div>
                        <div class="product-box-title">
                            <a href="">
                                <h5 class="text-overflow-2">ساعت هوشمند شیائومی مدل Redmi Watch 2 Lite طرح بند
                                    سلیکونی
                                </h5>
                            </a>
                        </div>
                        <div class="product-box-suggest-price d-flex align-items-center justify-content-between">
                            <del class="font-16">5,000,000</del>
                            <ins class="font-25">2,500,000 <span>تومان</span></ins>
                        </div>
                        <div class="product-box-hover-action">

                            <nav class="navbar navbar-expand justify-content-center">
                                <ul class="navbar-nav align-items-center">
                                    <li class="nav-item">
                                        <a href="" class="nav-item product-box-hover-item me-3">مشاهده محصول</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-item product-box-hover-item product-box-hover-item-btn me-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="افزودن به سبد خرید"><i class="bi bi-basket"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-item product-box-hover-item product-box-hover-item-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="افزودن به علاقه ها"><i class="bi bi-heart"></i></a>
                                    </li>
                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="product-box">
                        <div class="product-box-image">

                            <img src="assets/img/product/wach3.jpg" loading="lazy" alt="" class="img-fluid one-image">
                            <img src="assets/img/product/wach4.jpg" loading="lazy" alt="" class="img-fluid two-image">

                            <div class="color-box">
                                <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                    <span class="color hint--top" style="background-color: #fc5c65;"></span>
                                </div>
                                <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                    <span class="color hint--top" style="background-color: #fd9644;"></span>
                                </div>
                                <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                    <span class="color hint--top" style="background-color: #fed330;"></span>
                                </div>
                            </div>
                            <div class="product-box-price-discount">
                                <span class="d-block badge main-color-two-bg text-white font-14">25%</span>
                            </div>
                            <span class="product-box-image-overlay"></span>
                        </div>
                        <div class="product-box-title">
                            <a href="">
                                <h5 class="text-overflow-2">ساعت هوشمند شیائومی مدل Redmi Watch 2 Lite طرح بند
                                    سلیکونی
                                </h5>
                            </a>
                        </div>
                        <div class="product-box-suggest-price d-flex align-items-center justify-content-between">
                            <del class="font-16">5,000,000</del>
                            <ins class="font-25">2,500,000 <span>تومان</span></ins>
                        </div>
                        <div class="product-box-hover-action">

                            <nav class="navbar navbar-expand justify-content-center">
                                <ul class="navbar-nav align-items-center">
                                    <li class="nav-item">
                                        <a href="" class="nav-item product-box-hover-item me-3">مشاهده محصول</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-item product-box-hover-item product-box-hover-item-btn me-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="افزودن به سبد خرید"><i class="bi bi-basket"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-item product-box-hover-item product-box-hover-item-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="افزودن به علاقه ها"><i class="bi bi-heart"></i></a>
                                    </li>
                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="product-box">
                        <div class="product-box-image">

                            <img src="assets/img/product/television1.jpg" loading="lazy" alt="" class="img-fluid one-image">
                            <img src="assets/img/product/television2.jpg" loading="lazy" alt="" class="img-fluid two-image">

                            <div class="color-box">
                                <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                    <span class="color hint--top" style="background-color: #00a8ff;"></span>
                                </div>
                                <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                    <span class="color hint--top" style="background-color: #8c7ae6;"></span>
                                </div>
                                <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                    <span class="color hint--top" style="background-color: #273c75;"></span>
                                </div>
                            </div>
                            <div class="product-box-price-discount">
                                <span class="d-block badge main-color-two-bg text-white font-14">25%</span>
                            </div>
                            <span class="product-box-image-overlay"></span>
                        </div>
                        <div class="product-box-title">
                            <a href="">
                                <h5 class="text-overflow-2">ساعت هوشمند شیائومی مدل Redmi Watch 2 Lite طرح بند
                                    سلیکونی
                                </h5>
                            </a>
                        </div>
                        <div class="product-box-suggest-price d-flex align-items-center justify-content-between">
                            <del class="font-16">5,000,000</del>
                            <ins class="font-25">2,500,000 <span>تومان</span></ins>
                        </div>
                        <div class="product-box-hover-action">

                            <nav class="navbar navbar-expand justify-content-center">
                                <ul class="navbar-nav align-items-center">
                                    <li class="nav-item">
                                        <a href="" class="nav-item product-box-hover-item me-3">مشاهده محصول</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-item product-box-hover-item product-box-hover-item-btn me-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="افزودن به سبد خرید"><i class="bi bi-basket"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-item product-box-hover-item product-box-hover-item-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="افزودن به علاقه ها"><i class="bi bi-heart"></i></a>
                                    </li>
                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="product-box">
                        <div class="product-box-image">

                            <img src="assets/img/product/television3.jpg" loading="lazy" alt="" class="img-fluid one-image">
                            <img src="assets/img/product/television4.jpg" loading="lazy" alt="" class="img-fluid two-image">

                            <div class="color-box">
                                <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                    <span class="color hint--top" style="background-color: #fbc531;"></span>
                                </div>
                                <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                    <span class="color hint--top" style="background-color: #44bd32;"></span>
                                </div>
                                <div class="color-box-item" data-hint="نام رنگ مورد نظر" data-toggle="tooltip">
                                    <span class="color hint--top" style="background-color: #e84118;"></span>
                                </div>
                            </div>
                            <div class="product-box-price-discount">
                                <span class="d-block badge main-color-two-bg text-white font-14">25%</span>
                            </div>
                            <span class="product-box-image-overlay"></span>
                        </div>
                        <div class="product-box-title">
                            <a href="">
                                <h5 class="text-overflow-2">ساعت هوشمند شیائومی مدل Redmi Watch 2 Lite طرح بند
                                    سلیکونی
                                </h5>
                            </a>
                        </div>
                        <div class="product-box-suggest-price d-flex align-items-center justify-content-between">
                            <del class="font-16">5,000,000</del>
                            <ins class="font-25">2,500,000 <span>تومان</span></ins>
                        </div>
                        <div class="product-box-hover-action">

                            <nav class="navbar navbar-expand justify-content-center">
                                <ul class="navbar-nav align-items-center">
                                    <li class="nav-item">
                                        <a href="" class="nav-item product-box-hover-item me-3">مشاهده محصول</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-item product-box-hover-item product-box-hover-item-btn me-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="افزودن به سبد خرید"><i class="bi bi-basket"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-item product-box-hover-item product-box-hover-item-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="افزودن به علاقه ها"><i class="bi bi-heart"></i></a>
                                    </li>
                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>

<!-- end product slider -->




<!-- start tab product -->

<div class="tab-product py-30 site-slider">
    <div class="container-fluid">

        <div class="section-title">
            <div class="row gy-3 align-items-center">
                <div class="col-sm-8">
                    <div class="section-title-title">
                        <h2 class="title-font h1">جدید ترین <span class="main-color-two-color">محصولات</span>
                        </h2>
                        <div class="Dottedsquare"></div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="section-title-link text-sm-end text-start">
                        <a class="btn main-color-two-bg border-0" href=""> مشاهده همه</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-content tab-product-content" id="myTabContent">
            <div class="tab-pane fade show active" id="laptop-tab-pane" role="tabpanel" aria-labelledby="laptop-tab" tabindex="0">
                <div class="swiper pro-slider">
                    <div class="swiper-wrapper align-items-center">
                        @foreach ($newProducts as $product)
                        <div class="swiper-slide">
                            <div class="product-box">
                                <div class="product-box-image">

                                    <img src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH') . $product->primary_image) }}" loading="lazy" alt="" class="img-fluid one-image">
                                    <img src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH') . $product->primary_image) }}" loading="lazy" alt="" class="img-fluid two-image">

                                    @php
                                        if ($product->sale_check) {
                                            $originalPrice = $product->sale_check->price;
                                            $salePrice = $product->sale_check->sale_price;
                                            $discountPercentage = ($originalPrice - $salePrice) / $originalPrice * 100;
                                        } else {
                                            $discountPercentage = 0; // or handle the case gracefully
                                        }
                                    @endphp

                                    <div class="product-box-price-discount">
                                        <span class="d-block badge main-color-two-bg text-white font-14">{{ $discountPercentage }}%</span>
                                    </div>
                                    <span class="product-box-image-overlay"></span>
                                </div>
                                <div class="product-box-title">
                                    <a href="">
                                        <h5 class="text-overflow-2">{{ $product->name }}
                                        </h5>
                                    </a>
                                </div>
                                <div class="product-box-suggest-price d-flex align-items-center justify-content-between">
                                    @if($product->quantity_check)
                                        @if($product->sale_check)
                                            <ins class="font-25">
                                                {{ number_format($product->sale_check->sale_price) }}
                                                تومان

                                            </ins>
                                            <del class="font-16">
                                                {{ number_format($product->sale_check->price) }}
                                                تومان
                                            </del>
                                        @else
                                            <span class="new">
                                                {{ number_format($product->price_check->price) }}
                                                تومان
                                            </span>
                                        @endif
                                    @else
                                        <div class="not-in-stock">
                                            <p class="text-white">ناموجود</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="product-box-hover-action">

                                    <nav class="navbar navbar-expand justify-content-center">
                                        <ul class="navbar-nav align-items-center">
                                            <li class="nav-item">
                                                <a href="{{ route('home.products.show' , ['product' => $product->slug]) }}" class="nav-item product-box-hover-item me-3">مشاهده محصول</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="" class="nav-item product-box-hover-item product-box-hover-item-btn me-1" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="افزودن به سبد خرید"><i class="bi bi-basket"></i></a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="" class="nav-item product-box-hover-item product-box-hover-item-btn" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="افزودن به علاقه ها"><i class="bi bi-heart"></i></a>
                                            </li>
                                        </ul>
                                    </nav>

                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>


    </div>
</div>

<!-- end tab product -->

@endsection
