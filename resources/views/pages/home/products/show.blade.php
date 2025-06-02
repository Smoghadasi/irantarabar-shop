@extends('layouts.app')
@section('script')
    <script>
        $('.variation-select').on('click', function() {
            try {
                let variation = JSON.parse(this.value);
                let variationPriceDiv = $('.variation-price');
                variationPriceDiv.empty();

                console.log(variation);

                if (variation.is_sale) {
                    let spanSale = $('<h6 />', {
                        class: 'title-font new-price',
                        text: number_format(variation.sale_price) + ' تومان'
                    });
                    let spanPrice = $('<del />', {
                        class: 'font-14',
                        text: number_format(variation.price) + ' تومان'
                    });

                    variationPriceDiv.append(spanSale);
                    variationPriceDiv.append(spanPrice);
                } else {
                    let spanPrice = $('<span />', {
                        class: 'new',
                        text: number_format(variation.price) + ' تومان'
                    });
                    variationPriceDiv.append(spanPrice);
                }

                // بررسی مقدار quantity قبل از اعمال آن
                let quantity = variation.quantity !== undefined ? variation.quantity : 1;
                $('.quantity-input').attr('data-max', quantity);
                $('.quantity-input').val(1);

            } catch (error) {
                console.error("خطای پردازش JSON:", error);
            }
        });

        function number_format(number, decimals = 0, dec_point = '.', thousands_sep = ',') {
            if (isNaN(number) || number === null || number === undefined) return "0";

            number = parseFloat(number).toFixed(decimals);
            let parts = number.split('.');
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_sep);
            return parts.join(dec_point);
        }
    </script>
@endsection
@section('content')
    <!-- start main content -->

    <div class="content">
        <div class="container-fluid">
            <div class="content-box">
                <div class="container-fluid">
                    <div class="row gy-3">
                        <div class="col-lg-4">

                            <div class="pro_gallery">
                                <div class="swiper product-gallery">
                                    <div class="swiper-wrapper" title="برای بزرگنمایی تصویر دابل کلیک کنید">
                                        <div class="swiper-slide">
                                            <div class="swiper-zoom-container">
                                                <img class="img-fluid"
                                                    src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH') . $product->primary_image) }}" />
                                            </div>
                                        </div>

                                        @foreach ($product->images as $image)
                                            <div class="swiper-slide">
                                                <div class="swiper-zoom-container">
                                                    <img class="img-fluid"
                                                        src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH') . $image->image) }}" />
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-button-next d-none d-lg-flex"></div>
                                    <div class="swiper-button-prev d-none d-lg-flex"></div>
                                    <div class="swiper-pagination d-none d-lg-block"></div>
                                </div>
                                <div class="swiper product-gallery-thumb" thumbsSlider="">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img class="img-fluid"
                                                src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH') . $product->primary_image) }}" />
                                        </div>
                                    </div>
                                    @foreach ($product->images as $image)
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <img class="img-fluid"
                                                    src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH') . $image->image) }}" />
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <div class="icon-product-box mt-3 btn-group w-100">
                                    <div class="icon-product-box-item btn btn-lg bg-secondary-subtle py-4"
                                        data-bs-placement="top" data-bs-target="#shareModal" data-bs-toggle="modal"
                                        title="اشتراک گذاری">
                                        <i class="bi bi-share fs-4"></i>
                                    </div>
                                    <div class="icon-product-box-item btn btn-lg bg-secondary-subtle py-4"
                                        data-bs-placement="top" data-bs-title="افزودن به علاقه مندی"
                                        data-bs-toggle="tooltip">
                                        <i class="bi bi-heart fs-4"></i>
                                    </div>
                                    <div class="icon-product-box-item btn btn-lg bg-secondary-subtle py-4"
                                        data-bs-placement="top" data-bs-title="مقایسه محصول" data-bs-toggle="tooltip">
                                        <i class="bi bi-arrow-left-right fs-4"></i>
                                    </div>
                                    <div class="icon-product-box-item btn btn-lg bg-secondary-subtle py-4"
                                        data-bs-placement="top" data-bs-target="#chartModal" data-bs-toggle="modal"
                                        data-bs-toggle="modal" title="نمودار تغییر قیمت">
                                        <i class="bi bi-bar-chart fs-4"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="product-meta-title mb-0">
                                <div class="row align-items-center gy-3">
                                    <div class="col-lg-10">
                                        <h4 class="mb-0"><a href=""
                                                class="main-color-one-color h6">{{ $product->category->name }}</a></h4>
                                        <h4 class="f-800 my-1">
                                            {{ $product->name }}
                                        </h4>
                                        <p class="text-muted">{{ $product->slug }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="product-meta-feature mt-1">
                                <form action="{{ route('home.cart.add') }}" method="POST">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    @csrf
                                    <div class="row gy-3">

                                        <div class="col-lg-7">
                                            <div class="product-meta-feature-items">
                                                <h5 class="title font-16">ویژگی های کالا</h5>
                                                <div class="se-desc">
                                                    <input type="checkbox" class="read-more-state" id="readMore1">
                                                    <ul class="read-more-wrap navbar-nav">
                                                        @foreach ($product->attributes()->with('attribute')->get() as $attribute)
                                                            <li>
                                                                <span
                                                                    class="title">{{ $attribute->attribute->name }}</span>
                                                                <span class="desc">{{ $attribute->value }}</span>
                                                            </li>
                                                        @endforeach

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-meta-color">
                                                <h5 class="font-16">
                                                    {{ App\Models\Attribute::find($product->variations->first()->attribute_id)->name }}
                                                    :
                                                </h5>
                                                <div class="product-meta-color-items">

                                                    @php
                                                        if ($product->sale_check) {
                                                            $variationProductSelected = $product->sale_check;
                                                        } else {
                                                            $variationProductSelected = $product->price_check;
                                                        }
                                                    @endphp
                                                    <select name="variation" class="form-select variation-select"
                                                        autocomplete="off">
                                                        @foreach ($product->variations()->where('quantity', '>', 0)->get() as $variation)
                                                            <option
                                                                value="{{ json_encode($variation->only(['id', 'quantity', 'is_sale', 'sale_price', 'price'])) }}"
                                                                {{ $variationProductSelected->id == $variation->id ? 'selected' : '' }}>
                                                                {{ $variation->value }}
                                                            </option>
                                                        @endforeach
                                                    </select>


                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-5">
                                            <div class="product-meta-info">
                                                <div
                                                    class="product-meta-info-title border-0 product-meta-info-item d-flex align-items-center justify-content-between">
                                                    <h5>فروشنده</h5>
                                                </div>


                                                <div
                                                    class="product-meta-garanty product-meta-info-item justify-content-start">
                                                    <i class="bi bi-shield-check"></i>
                                                    <span class="text-muted"> گارانتی اصالت و سلامت فیزیکی کالا
                                                    </span>
                                                </div>
                                                <div
                                                    class="product-meta-price product-price d-flex justify-content-between align-items-center">
                                                    <div class="product-box-suggest-price d-flex align-items-center justify-content-between">
                                                        @if ($product->quantity_check)
                                                            @if ($product->sale_check)
                                                                <h6 class="title-font new-price">
                                                                    {{ number_format($product->sale_check->sale_price) }}
                                                                    تومان
                                                                </h6>
                                                                <del class="font-14">
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

                                                <div class="d-flex justify-content-between flex-wrap">
                                                    <div class="product-meta-counter w-100">
                                                        <div class="counter">
                                                            <input class="counter" name="qtybutton" type="text"
                                                                value="1">
                                                        </div>
                                                    </div>
                                                    <div class="product-meta-add mt-3 w-100">
                                                        <div class="d-flex justify-content-center">
                                                            <button class="btn btn-lg w-100 border-0 main-color-three-bg"
                                                                type="submit"><i
                                                                    class="bi bi-basket text-white font-20 me-1"></i>خرید
                                                                کالا
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="product-feature">
                                <nav class="navbar navbar-expand">
                                    <ul class="navbar-nav flex-wrap justify-content-between w-100">
                                        <li class="nav-item">
                                            <a href="" class="nav-link">
                                                <img src="{{ asset('assets/img/delivery.png') }}" alt="">
                                                <p>تحویل اکسپرس</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-link">
                                                <img src="{{ asset('assets/img/1-1.png') }}" alt="">
                                                <p>پشتیبانی 24 ساعته</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-link">
                                                <img src="{{ asset('assets/img/2-4.png') }}" alt="">
                                                <p>پرداخت در محل</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="" class="nav-link">
                                                <img src="{{ asset('assets/img/3-1.png') }}" alt="">
                                                <p>7 روز ضمانت بازگشت کالا</p>
                                            </a>
                                        </li>

                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end main content -->

    <!-- start product desc -->

    <div class="product-desc py-20">
        <div class="container-fluid">
            <div class="row gy-3">
                <div class="col-lg-12">
                    <div class="product-desc-tab">
                        <ul class="nav justify-content-center" id="productTab" role="tablist">
                            <li class="nav-item">
                                <button aria-selected="true" class="active waves-effect waves-light"
                                    data-bs-target="#productDescLess-pane" data-bs-toggle="tab" id="productDescLess"
                                    role="button" type="button">
                                    توضیحات کالا
                                </button>
                            </li>

                            <li class="nav-item">
                                <button aria-selected="false" class=" waves-effect waves-light"
                                    data-bs-target="#productTable-pane" data-bs-toggle="tab" id="productTable"
                                    role="button" type="button">
                                    توضیحات تکمیلی
                                </button>
                            </li>


                        </ul>
                    </div>
                    <div class="content-box">
                        <div class="container-fluid">
                            <div class="product-descs" id="prodesc">
                                <div class="product-desc">
                                    <div class="product-desc-tab-content">
                                        <div class="tab-content" id="productTabContent">
                                            <div class="tab-pane fade show active product-desc-less-contents"
                                                id="productDescLess-pane">
                                                <div class="product-desc-content">
                                                    <h6 class="font-22 mb-2 title-font title-line-bottom">معرفی محصول</h6>

                                                    <p>
                                                        {{ $product->description }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="productTable-pane">
                                                <div aria-labelledby="#productTable" class="tab-pane fade active show"
                                                    role="tabpanel">
                                                    <h6 class="font-26 mb-2 title-font title-line-bottom">مشخصات فنی</h6>
                                                    <div class="box_list mt-4">
                                                        <p class="title"><svg xmlns="http://www.w3.org/2000/svg"
                                                                width="16" height="16" fill="currentColor"
                                                                class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                                                                <path
                                                                    d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z">
                                                                </path>
                                                            </svg>مشخصات کلی</p>
                                                        <div>
                                                            <ul class="param_list list-inline">
                                                                @foreach ($product->attributes()->with('attribute')->get() as $attribute)
                                                                    <li
                                                                        class="list-inline-item col-md-3 pe-md-1 pe-md-3 p-0 m-0">
                                                                        <div class="box_params_list">
                                                                            <p class="block border_right_custom1">
                                                                                {{ $attribute->attribute->name }}
                                                                            </p>
                                                                        </div>
                                                                    </li>
                                                                    <li class="list-inline-item col-md-8 p-0 m-0">
                                                                        <div class="box_params_list">
                                                                            <p class="block border_right_custom2">
                                                                                {{ $attribute->value }}
                                                                            </p>
                                                                        </div>
                                                                    </li>
                                                                @endforeach

                                                            </ul>
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

            </div>
        </div>
    </div>

    <!-- end product desc -->

@endsection
