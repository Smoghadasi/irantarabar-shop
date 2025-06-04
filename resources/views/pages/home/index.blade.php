@extends('layouts.app')
@section('content')
    <!-- start main slider -->

    <div class="main-slider">
        <div class="container-fluid">
            <div class="row gy-3">
                <div class="col-xl-3 col-lg-4 orderlgl-1 order-2">
                    <div class="slider-parent-two">
                        <div class="suggest-moment-parent">

                            <div class="swiper suggetMoment">
                                <div class="swiper-wrapper position-relative">
                                    @foreach ($instantOffers as $product)
                                        <div class="swiper-slide">
                                            <div class="product-box-suggest">
                                                <div class="product-box-suggest-image">
                                                    <img src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH') . $product->primary_image) }}"
                                                        alt="">
                                                </div>
                                                <div class="product-box-suggest-title">
                                                    <a href="{{ route('home.products.show', ['product' => $product->slug]) }}">
                                                        <h6 class="text-overflow-1">{{ $product->name }}</h6>
                                                    </a>
                                                </div>
                                                <div class="product-box-suggest-price">
                                                    @if ($product->quantity_check)
                                                        @if ($product->sale_check)
                                                            <ins class="font-25">
                                                                {{ number_format($product->sale_check->sale_price) }}
                                                                تومان

                                                            </ins>
                                                            <del class="font-16">
                                                                {{ number_format($product->sale_check->price) }}
                                                                تومان
                                                            </del>
                                                        @else
                                                            <ins class="new">
                                                                {{ number_format($product->price_check->price) }}
                                                                تومان
                                                            </ins>
                                                        @endif
                                                    @else
                                                        <div class="not-in-stock">
                                                            <p class="text-white">ناموجود</p>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                </div>
                                <div class="swiper-progress-bar">
                                    <span class="slide_progress-bar"></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 order-lg-2 order-1">
                    <div class="slider slider-parent">
                        <div class="swiper homeSlider" id="">
                            <div class="swiper-wrapper">
                                @foreach ($indexTopBanners as $slider)
                                    <div class="swiper-slide">
                                        {{-- <a href=""> --}}
                                        <img src="{{ asset(env('BANNER_IMAGES_UPLOAD_PATH') . $slider->image) }}"
                                            loading="lazy" class="img-fluid" alt="">
                                        {{-- </a> --}}
                                    </div>
                                @endforeach


                            </div>
                            <div class="swiper-button-next d-lg-flex d-none"></div>
                            <div class="swiper-button-prev d-lg-flex d-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- end main slider -->


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
                                <a href="" class="mt-2 btn btn-light rounded-pill btn-sm btn-amazing-sw"> مشاهده همه
                                    <i class="bi bi-arrow-left-short"></i></a>
                            </div>
                        </div>

                        @foreach ($newProducts as $product)
                            <div class="swiper-slide">`
                                <div class="product-box">
                                    <div class="product-box-image">

                                        <img src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH') . $product->primary_image) }}"
                                            loading="lazy" alt="" class="img-fluid one-image">
                                        <img src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH') . $product->primary_image) }}"
                                            loading="lazy" alt="" class="img-fluid two-image">

                                        @php
                                            if ($product->sale_check) {
                                                $originalPrice = $product->sale_check->price;
                                                $salePrice = $product->sale_check->sale_price;
                                                $discountPercentage =
                                                    (($originalPrice - $salePrice) / $originalPrice) * 100;
                                            } else {
                                                $discountPercentage = 0; // or handle the case gracefully
                                            }
                                        @endphp

                                        <div class="product-box-price-discount">
                                            <span
                                                class="d-block badge main-color-two-bg text-white font-14">{{ $discountPercentage }}%</span>
                                        </div>
                                        <span class="product-box-image-overlay"></span>
                                    </div>
                                    <div class="product-box-title">
                                        <a href="#">
                                            <h5 class="text-overflow-2">{{ $product->name }}
                                            </h5>
                                        </a>
                                    </div>
                                    <div
                                        class="product-box-suggest-price d-flex align-items-center justify-content-between">
                                        @if ($product->quantity_check)
                                            @if ($product->sale_check)
                                                <ins class="font-25">
                                                    {{ number_format($product->sale_check->sale_price) }}
                                                    تومان

                                                </ins>
                                                <del class="font-16">
                                                    {{ number_format($product->sale_check->price) }}
                                                    تومان
                                                </del>
                                            @else
                                                <ins class="new">
                                                    {{ number_format($product->price_check->price) }}
                                                    تومان
                                                </ins>
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
                                                    <a href="{{ route('home.products.show', ['product' => $product->slug]) }}"
                                                        class="nav-item product-box-hover-item me-3">مشاهده محصول</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href=""
                                                        class="nav-item product-box-hover-item product-box-hover-item-btn me-1"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="افزودن به سبد خرید"><i class="bi bi-basket"></i></a>
                                                </li>
                                                <li class="nav-item">
                                                    @auth
                                                        @if ($product->checkUserWishlist(auth()->id()))
                                                            <a href="{{ route('home.wishlist.remove', ['product' => $product->id]) }}"
                                                                class="nav-item product-box-hover-item product-box-hover-item-btn"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                data-bs-title="حذف علاقه مندی"><i
                                                                    class="bi bi-heart-fill text-danger"></i></a>
                                                        @else
                                                            <a href="{{ route('home.wishlist.add', ['product' => $product->id]) }}"
                                                                class="nav-item product-box-hover-item product-box-hover-item-btn"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                data-bs-title="افزودن به علاقه ها"><i
                                                                    class="bi bi-heart"></i></a>
                                                        @endif
                                                    @else
                                                        <a href="{{ route('home.wishlist.add', ['product' => $product->id]) }}"
                                                            class="nav-item product-box-hover-item product-box-hover-item-btn"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="افزودن به علاقه ها"><i class="bi bi-heart"></i></a>

                                                    @endauth
                                                </li>
                                                {{-- <li class="nav-item">
                                                    @auth
                                                        @if ($product->checkUserWishlist(auth()->id()))
                                                            <a href="{{ route('home.wishlist.remove', ['product' => $product->id]) }}"
                                                                class="nav-item product-box-hover-item product-box-hover-item-btn"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                data-bs-title="افزودن به علاقه ها"><i class="bi bi-heart"></i>
                                                            </a>
                                                        @else
                                                            <a
                                                                href="{{ route('home.wishlist.add', ['product' => $product->id]) }}"><i
                                                                    class="sli sli-heart"></i><span
                                                                    class="ht-product-action-tooltip">
                                                                    افزودن به علاقه مندی ها
                                                                </span>
                                                            </a>
                                                        @endif
                                                    @else
                                                        <a href="{{ route('home.wishlist.add', ['product' => $product->id]) }}"
                                                            class="nav-item product-box-hover-item product-box-hover-item-btn"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="افزودن به علاقه ها"><i class="bi bi-heart"></i>
                                                        </a>
                                                    @endauth

                                                </li> --}}
                                            </ul>
                                        </nav>

                                    </div>
                                </div>
                            </div>
                        @endforeach


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
                @foreach ($indexCenterBanners as $banner)
                    <div class="col-lg-6">
                        <a href="">
                            <img src="{{ asset(env('BANNER_IMAGES_UPLOAD_PATH') . $banner->image) }}" class="w-100"
                                alt="">
                        </a>
                    </div>
                @endforeach


            </div>
        </div>
    </div>

    <!-- end advert -->



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
                <div class="tab-pane fade show active" id="laptop-tab-pane" role="tabpanel" aria-labelledby="laptop-tab"
                    tabindex="0">
                    <div class="swiper pro-slider">
                        <div class="swiper-wrapper align-items-center">
                            @foreach ($newProducts as $product)
                                <div class="swiper-slide">
                                    <div class="product-box">
                                        <div class="product-box-image">

                                            <img src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH') . $product->primary_image) }}"
                                                loading="lazy" alt="" class="img-fluid one-image">
                                            <img src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH') . $product->primary_image) }}"
                                                loading="lazy" alt="" class="img-fluid two-image">

                                            @php
                                                if ($product->sale_check) {
                                                    $originalPrice = $product->sale_check->price;
                                                    $salePrice = $product->sale_check->sale_price;
                                                    $discountPercentage =
                                                        (($originalPrice - $salePrice) / $originalPrice) * 100;
                                                } else {
                                                    $discountPercentage = 0; // or handle the case gracefully
                                                }
                                            @endphp

                                            <div class="product-box-price-discount">
                                                <span
                                                    class="d-block badge main-color-two-bg text-white font-14">{{ $discountPercentage }}%</span>
                                            </div>
                                            <span class="product-box-image-overlay"></span>
                                        </div>
                                        <div class="product-box-title">
                                            <a href="">
                                                <h5 class="text-overflow-2">{{ $product->name }}
                                                </h5>
                                            </a>
                                        </div>
                                        <div
                                            class="product-box-suggest-price d-flex align-items-center justify-content-between">
                                            @if ($product->quantity_check)
                                                @if ($product->sale_check)
                                                    <ins class="font-25">
                                                        {{ number_format($product->sale_check->sale_price) }}
                                                        تومان

                                                    </ins>
                                                    <del class="font-16">
                                                        {{ number_format($product->sale_check->price) }}
                                                        تومان
                                                    </del>
                                                @else
                                                    <ins class="new">
                                                        {{ number_format($product->price_check->price) }}
                                                        تومان
                                                    </ins>
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
                                                        <a href="{{ route('home.products.show', ['product' => $product->slug]) }}"
                                                            class="nav-item product-box-hover-item me-3">مشاهده محصول</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href=""
                                                            class="nav-item product-box-hover-item product-box-hover-item-btn me-1"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="افزودن به سبد خرید"><i
                                                                class="bi bi-basket"></i></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        @auth
                                                            @if ($product->checkUserWishlist(auth()->id()))
                                                                <a href="{{ route('home.wishlist.remove', ['product' => $product->id]) }}"
                                                                    class="nav-item product-box-hover-item product-box-hover-item-btn"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    data-bs-title="افزودن به علاقه ها"><i
                                                                        class="bi bi-heart"></i>
                                                                </a>
                                                            @else
                                                                <a
                                                                    href="{{ route('home.wishlist.add', ['product' => $product->id]) }}"><i
                                                                        class="sli sli-heart"></i><span
                                                                        class="ht-product-action-tooltip">
                                                                        افزودن به علاقه مندی ها
                                                                    </span>
                                                                </a>
                                                            @endif
                                                        @else
                                                            <a href="{{ route('home.wishlist.add', ['product' => $product->id]) }}"
                                                                class="nav-item product-box-hover-item product-box-hover-item-btn"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                data-bs-title="افزودن به علاقه ها"><i class="bi bi-heart"></i>
                                                            </a>
                                                        @endauth
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
