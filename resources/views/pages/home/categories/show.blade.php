@extends('layouts.app')
@section('script')
    <script>
        function filter() {
            console.log('log');

            let attributes = @json($attributes);
            attributes.map(attribute => {

                let valueAttribute = $(`.attribute-${attribute.id}:checked`).map(function() {
                    return this.value;
                }).get().join('-');

                if (valueAttribute == "") {
                    $(`#filter-attribute-${attribute.id}`).prop('disabled', true);
                } else {
                    $(`#filter-attribute-${attribute.id}`).val(valueAttribute);
                }

            });

            let variation = $('.variation:checked').map(function() {
                return this.value;
            }).get().join('-');
            if (variation == "") {
                $('#filter-variation').prop('disabled', true);
            } else {
                $('#filter-variation').val(variation);
            }

            let sortBy = $('#sort-by').val();
            if (sortBy == "default") {
                $('#filter-sort-by').prop('disabled', true);
            } else {
                $('#filter-sort-by').val(sortBy);
            }

            let search = $('#search-input').val();
            if (search == "") {
                $('#filter-search').prop('disabled', true);
            } else {
                $('#filter-search').val(search);
            }

            $('#filter-form').submit();
        }

        $('#filter-form').on('submit', function(event) {
            event.preventDefault();
            let currentUrl = '{{ url()->current() }}';
            let url = currentUrl + '?' + decodeURIComponent($(this).serialize())
            $(location).attr('href', url);
        });

        $('.variation-select').on('change', function() {
            let variation = JSON.parse(this.value);
            let variationPriceDiv = $('.variation-price');
            variationPriceDiv.empty();

            if (variation.is_sale) {
                let spanSale = $('<span />', {
                    class: 'new',
                    text: number_format(variation.sale_price) + ' تومان'
                });
                let spanPrice = $('<span />', {
                    class: 'old',
                    text: number_format(variation.price) + ' تومان'
                });

                variationPriceDiv.append(spanSale);
                variationPriceDiv.append(spanPrice);
            } else {
                let spanPrice = $('<span />', {
                    class: 'new',
                    text: toPersianNum(number_format(variation.price)) + ' تومان'
                });
                variationPriceDiv.append(spanPrice);
            }

            $('.quantity-input').attr('data-max', variation.quantity);
            $('.quantity-input').val(1);

        });

        $('#pagination li a').map(function() {
            let decodeUrl = decodeURIComponent($(this).attr('href'));
            if ($(this).attr('href') !== undefined) {
                $(this).attr('href', decodeUrl);
            }
        });
    </script>
@endsection
@section('content')
    <!-- start main content -->

    <div class="content">
        <div class="container-fluid">

            <!-- start filter in mobile -->
            <div class="custom-filter d-lg-none d-block">
                <button class="btn btn-filter-float border-0 main-color-two-bg shadow-box px-3 rounded-3 position-fixed"
                    style="z-index: 999;bottom:96px;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                    aria-controls="offcanvasRight">
                    <i class="bi bi-funnel font-20 fw-bold text-white"></i>
                    <span class="d-block font-14 text-white">فیلتر</span>
                </button>

                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasRight"
                    aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasRightLabel1">فیلتر ها</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div class="item-boxs position-sticky top-0">


                            <div class="item-box">
                                <div class="title">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h6 class="font-14">فیلتر براساس دسته</h6>
                                        <a class="btn border-0" data-bs-toggle="collapse" href="#collapseItemBoxColor1"
                                            role="button" aria-expanded="false">
                                            <i class="bi bi-chevron-down"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="desc collapse show" id="collapseItemBoxColor1">
                                    <div class="filter-item-content">
                                        <form action="">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap mb-3">
                                                <div class="form-check">
                                                    <label for="colorCheck1" class="form-check-label">موبایل <i
                                                            class="bi bi-phone ms-1"></i></label>
                                                    <input type="checkbox" name="" id="colorCheck1"
                                                        class="form-check-input">
                                                </div>
                                                <div>
                                                    <span class="fw-bold font-14">(27)</span>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between flex-wrap mb-3">
                                                <div class="form-check">
                                                    <label for="colorCheck5" class="form-check-label">ایرپاد <i
                                                            class="bi bi-earbuds ms-1"></i></label>
                                                    <input type="checkbox" name="" id="colorCheck5"
                                                        class="form-check-input">
                                                </div>
                                                <div>
                                                    <span class="fw-bold font-14">(32)</span>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between flex-wrap mb-3">
                                                <div class="form-check">
                                                    <label for="colorCheck4" class="form-check-label">تبلت <i
                                                            class="bi bi-tablet ms-1"></i></label>
                                                    <input type="checkbox" name="" id="colorCheck4"
                                                        class="form-check-input">
                                                </div>
                                                <div>
                                                    <span class="fw-bold font-14">(14)</span>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between flex-wrap mb-3">
                                                <div class="form-check">
                                                    <label for="colorCheck3" class="form-check-label">هدست <i
                                                            class="bi bi-headset ms-1"></i></label>
                                                    <input type="checkbox" name="" id="colorCheck3"
                                                        class="form-check-input">
                                                </div>
                                                <div>
                                                    <span class="fw-bold font-14">(8)</span>
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

            <!-- end filter mobile -->

            <div class="row gy-3">
                <div class="col-lg-3 d-lg-block d-none">
                    <form id="filter-form">
                        @foreach ($attributes as $attribute)
                            <input id="filter-attribute-{{ $attribute->id }}" type="hidden"
                                name="attribute[{{ $attribute->id }}]">
                        @endforeach
                        <input id="filter-variation" type="hidden" name="variation">
                        <input id="filter-sort-by" type="hidden" name="sortBy">
                        <input id="filter-search" type="hidden" name="search">
                    </form>
                    <div class="item-boxs position-sticky top-0">

                        <div class="item-box">
                            @foreach ($attributes as $attribute)
                                <div class="title">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h6 class="font-14">{{ $attribute->name }}</h6>
                                        <a class="btn border-0" data-bs-toggle="collapse" href="#collapseItemBoxExist1"
                                            role="button" aria-expanded="false">
                                            <i class="bi bi-chevron-down"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="desc collapse show" id="collapseItemBoxExist1">
                                    <div class="filter-item-content">
                                        <form action="">
                                            <div class="product-meta-color-items mt-4">
                                                <ul>
                                                    @foreach ($attribute->values as $value)
                                                        <li>
                                                            <div class="sidebar-widget-list-left">
                                                                <input type="checkbox"
                                                                    class="attribute-{{ $attribute->id }}"
                                                                    value="{{ $value->value }}" onchange="filter()"
                                                                    {{ request()->has('attribute.' . $attribute->id) && in_array($value->value, explode('-', request()->attribute[$attribute->id])) ? 'checked' : '' }}>
                                                                <a href="#"> {{ $value->value }} </a>
                                                                <span class="checkmark"></span>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="item-box">
                            <div class="title">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6 class="font-14">{{ $variation->name }}</h6>
                                    <a class="btn border-0" data-bs-toggle="collapse" href="#collapseItemBoxColor"
                                        role="button" aria-expanded="false">
                                        <i class="bi bi-chevron-down"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="desc collapse show" id="collapseItemBoxColor">
                                <div class="filter-item-content">
                                    <form action="">
                                        @foreach ($variation->variationValues as $value)
                                            <div class="d-flex align-items-center justify-content-between flex-wrap mb-3">
                                                <div class="form-check">
                                                    <input type="checkbox" class="variation" value="{{ $value->value }}"
                                                        onchange="filter()"
                                                        {{ request()->has('variation') && in_array($value->value, explode('-', request()->variation)) ? 'checked' : '' }}>
                                                    <a href="#"> {{ $value->value }} </a>
                                                    <span class="checkmark"></span>
                                                </div>
                                                <div>
                                                    <span class="fw-bold font-14">(27)</span>
                                                </div>
                                            </div>
                                        @endforeach

                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>



                </div>
                <div class="col-lg-9">

                    <div class="category-sort mb-3">
                        <div class="content-box">
                            <div class="container-fluid">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="box_filter d-lg-block d-none">
                                        <ul class="list-inline text-start mb-0 d-none" onchange="filter()">
                                            <li class="list-inline-item title-font ms-0">مرتب سازی بر اساس :</li>
                                            <li class="list-inline-item"><a href="#">گران ترین</a></li>
                                            <li class="list-inline-item"><a class="active_custom" href="#">ارزان
                                                    ترین</a>
                                            </li>
                                            <li class="list-inline-item"><a href="#">پروفروش ترین</a></li>
                                            <li class="list-inline-item"><a href="#">داغ ترین</a></li>
                                            <li class="list-inline-item"><a href="#">محبوب ترین</a></li>
                                        </ul>
                                        <select class="form-control form-select" id="sort-by" onchange="filter()">
                                            <option value="default"> مرتب سازی </option>
                                            <option value="max"
                                                {{ request()->has('sortBy') && request()->sortBy == 'max' ? 'selected' : '' }}>
                                                بیشترین قیمت </option>
                                            <option value="min"
                                                {{ request()->has('sortBy') && request()->sortBy == 'min' ? 'selected' : '' }}>
                                                کم
                                                ترین قیمت </option>
                                            <option value="latest"
                                                {{ request()->has('sortBy') && request()->sortBy == 'latest' ? 'selected' : '' }}>
                                                جدیدترین </option>
                                            <option value="oldest"
                                                {{ request()->has('sortBy') && request()->sortBy == 'oldest' ? 'selected' : '' }}>
                                                قدیمی ترین </option>
                                        </select>
                                    </div>
                                    <div class="box_filter_counter fs-6"><i class="bi bi-card-list me-2"></i> 123 کالا
                                    </div>
                                </div>
                                <div class="d-lg-none d-block">
                                    <form action="">
                                        <h5 class="mb-3">مرتب سازی بر اساس</h5>
                                        <select name="" id="" class="form-select">
                                            <option value="">گران ترین</option>
                                            <option value="">ارزان ترین</option>
                                            <option value="">پرفروش ترین</option>
                                            <option value="">داغ ترین</option>
                                            <option value="">محبوب ترین</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="category-pro">
                        <div class="row g-3">
                            @foreach ($products as $product)
                                <div class="col-md-6 col-xl-4 col-xxl-3">
                                    <div class="product-box">
                                        <div class="product-box-image">

                                            <img src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH') . $product->primary_image) }}"
                                                loading="lazy" alt="" class="img-fluid one-image">



                                            <div class="product-box-price-discount">
                                                <span class="d-block badge main-color-two-bg text-white font-14">25%</span>
                                            </div>
                                            <span class="product-box-image-overlay"></span>
                                        </div>
                                        <div class="product-box-title">
                                            <a href="{{ route('home.products.show' , ['product' => $product->slug]) }}">
                                                <h5 class="text-overflow-2">{{ $product->name }}
                                                </h5>
                                            </a>
                                        </div>
                                        <div
                                            class="product-box-suggest-price d-flex align-items-center justify-content-between">
                                            @if ($product->quantity_check)
                                                @if ($product->sale_check)
                                                    <span class="new">
                                                        {{ number_format($product->sale_check->sale_price) }}
                                                        تومان
                                                    </span>
                                                    <span class="old">
                                                        {{ number_format($product->sale_check->price) }}
                                                        تومان
                                                    </span>
                                                @else
                                                    <ins class="font-25">
                                                        {{ number_format($product->price_check->price) }}
                                                        تومان
                                                        {{-- <ins class="font-25">2,500,000 <span>تومان</span></ins> --}}

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
                                                        <a href="{{ route('home.products.show' , ['product' => $product->slug]) }}"
                                                            class="nav-item product-box-hover-item me-3">مشاهده محصول</a>
                                                    </li>
                                                    {{-- <li class="nav-item">
                                                        <a href=""
                                                            class="nav-item product-box-hover-item product-box-hover-item-btn me-1"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="افزودن به سبد خرید"><i
                                                                class="bi bi-basket"></i></a>
                                                    </li> --}}
                                                    {{-- <li class="nav-item">
                                                        <a href=""
                                                            class="nav-item product-box-hover-item product-box-hover-item-btn"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="افزودن به علاقه ها"><i
                                                                class="bi bi-heart"></i></a>
                                                    </li> --}}
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="col-12">
                                <div class="content-box">
                                    <div class="container-fluid">
                                        {{ $products->withQueryString()->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="content-box">
                        <div class="container-fluid">
                            <div class="product-desc-content">
                                <input class="read-more-state" id="readMore3" type="checkbox">
                                <!-- والد بیشتر ، کمتر ، تمام متن توضیحات باید داخل این تگ قرار بگیرند -->
                                <div class="read-more-wrap">
                                    <h6 class="font-22 mb-2 title-font title-line-bottom">{{ $category->name }}</h6>

                                    {{ $category->description ?? '-' }}


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
