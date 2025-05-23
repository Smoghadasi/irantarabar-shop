@extends('layouts.app')
@section('content')
    <!-- start main content -->

    <div class="content">
        <div class="container-fluid">
            @if (\Cart::isEmpty())
                <div class="content-box">
                    <div class="container-fluid">
                        <div class="order-list--empty">
                            <img src="assets/img/empty-cart.svg" width="500" alt="">
                            <p class="order-list__empty-text">سبد خرید شما خالی است!</p>
                            <a href="/" class="btn main-color-one-outline border-2 mt-3 px-4 py-2">رفتن به فروشگاه</a>
                        </div>
                    </div>
                </div>
            @else
                <div class="line-step-container d-sm-block d-none">
                    <div class="line-step">
                        <div class="line-step-boxs">
                            <div class="line-step-box complete">
                                <a href="">
                                    <p>سبد خرید</p>
                                    <div class="icon">
                                        1
                                    </div>
                                </a>
                            </div>
                            <div class="line-step-box disabled">
                                <a href="">
                                    <p>جزییات پرداخت</p>
                                    <div class="icon">
                                        2
                                    </div>
                                </a>
                            </div>
                            <div class="line-step-box disabled">
                                <a href="">
                                    <p>تکمیل سفارش</p>
                                    <div class="icon">
                                        3
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row gy-3">
                    <div class="col-lg-9">
                        <div class="cart-product-item">
                            <div class="container-fluid">

                                @foreach (\Cart::getContent() as $item)
                                    <form action="{{ route('home.cart.update') }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="cart-items mb-3">
                                            <div class="content-box">
                                                <div class="container-fluid">
                                                    <div class="item">
                                                        <div class="row gy-2">
                                                            <div class="col-md-2 w-100-in-400">
                                                                <div class="image">
                                                                    <img src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH') . $item->associatedModel->primary_image) }}"
                                                                        alt="" class="img-fluid">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-10 w-100-in-400">
                                                                <div
                                                                    class="d-flex justify-content-between align-items-md-start align-items-end flex-wrap">
                                                                    <div class="d-flex align-items-start flex-column me-2">
                                                                        <div
                                                                            class="title d-flex align-items-center flex-wrap">
                                                                            <h6 class="font-16">
                                                                                {{ $item->name }}
                                                                                @if ($item->attributes->is_sale)
                                                                                    <span class="badge ms-2 danger-label rounded-pill">{{ $item->attributes->percent_sale }}%</span>
                                                                                @endif
                                                                            </h6>

                                                                        </div>
                                                                        <p class="mb-0" style="font-size: 12px; color:red">
                                                                            {{ \App\Models\Attribute::find($item->attributes->attribute_id)->name }}
                                                                            :
                                                                            {{ $item->attributes->value }}
                                                                        </p>
                                                                        <div
                                                                            class="cart-item-feature d-flex align-items-center flex-wrap mt-3">
                                                                            <div class="item d-flex align-items-center">
                                                                                <div class="icon"><i
                                                                                        class="bi bi-shop"></i></div>
                                                                                <div class="saller-name mx-2">فروشنده:</div>
                                                                                <div class="saller-name text-muted">ایران ترابر</div>
                                                                            </div>
                                                                            {{-- <div
                                                                                class="item d-flex align-items-center ms-2">
                                                                                <div class="icon"><i
                                                                                        class="bi bi-shield-check"></i>
                                                                                </div>
                                                                                <div class="saller-name mx-2">گارانتی:</div>
                                                                                <div class="saller-name text-muted">ایران
                                                                                    موبایل</div>
                                                                            </div> --}}
                                                                        </div>

                                                                    </div>
                                                                    <div
                                                                        class="action d-flex flex-wrap flex-column justify-content-sm-end justify-content-center align-items-center">
                                                                        <div
                                                                            class="product-box-price flex-column w-100 justify-content-end align-items-end">

                                                                            <div class="product-box-price-price d-flex">
                                                                                <h5
                                                                                    class="f-800 main-color-green-color h2 mb-2">
                                                                                    {{ number_format($item->price) }}</h5>
                                                                                <p class="mb-0 font-12 ms-1 ">تومان</p>

                                                                                <div class="remove ms-3">
                                                                                    <a href="{{ route('home.cart.remove' , ['rowId' => $item->id]) }}" class="text-danger">
                                                                                        <i class="bi bi-trash-fill"></i>
                                                                                    </a>
                                                                                </div>
                                                                            </div>

                                                                            <div class="counter mb-2">
                                                                                <input type="text"
                                                                                    class="counter" name="qtybutton[{{ $item->id }}]" value="{{ $item->quantity }}" data-max="{{ $item->attributes->quantity }}">
                                                                            </div>
                                                                            <button type="submit" class="btn btn-primary">بروز رسانی</button>

                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endforeach

                            </div>
                        </div>
                        {{-- <div class="show-discount-modal pointer py-3 mb-3" data-bs-toggle="modal"
                            data-bs-target="#discountModal">
                            <i class="bi bi-patch-exclamation main-color-one-color me-2" style="font-size: 40px;"></i>
                            کوپن تخفیف دارید برای نوشتن کد اینجا کلیک
                            کنید
                        </div> --}}
                    </div>
                    <div class="col-lg-3">
                        <div class="cart__order-total">
                            <div class="box__shaped-title">
                                <svg width="230" height="75" viewBox="0 0 230 75" fill="none">
                                    <path
                                        d="M230 0H0V10C26.2258 10.6605 43.6909 20.4901 52.0499 27.9356C60.4088 35.3811 84.5186 61.9259 84.5186 61.9259C101.038 79.219 128.627 79.219 145.146 61.9259C145.146 61.9259 169.146 35.4578 177.549 28.0042C185.953 20.5506 203.675 10.6625 230 10V0Z"
                                        fill="#f4f4f4"></path>
                                    <defs>
                                        <linearGradient id="paint0_linear" x1="115" y1="0" x2="115"
                                            y2="74.8957" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#FAFBFB"></stop>
                                            <stop offset="1" stop-color="#F4F6F8"></stop>
                                        </linearGradient>
                                    </defs>
                                </svg>
                                <div class="box__shaped-title__icon"></div>
                            </div>
                            <div class="cart__order-total-row">
                                <label class="order-total-row__col-right">جمع مبلغ کالاها:</label>
                                <div class="order-total-row__col-left"><span>{{ number_format( \Cart::getTotal() + cartTotalSaleAmount() ) }}</span><span
                                        class="font-12 ms-1">تومان</span></div>
                            </div>
                            <div class="cart__order-total-row cart__order-total-row--benefit">
                                <div class="order-total-row__col-right">سود شما از خرید :</div>
                                <div class="order-total-row__col-left">
                                    <span>{{ number_format( cartTotalSaleAmount() ) }}</span><span class="font-12 ms-1">تومان</span>
                                </div>
                            </div>
                            <div class="cart__order-total-row cart__order-total-row--benefit">
                                <div class="order-total-row__col-right">هزینه ارسال :</div>
                                <div class="order-total-row__col-left">
                                    @if(cartTotalDeliveryAmount() == 0)
                                        <span style="color: red">
                                            رایگان
                                        </span>
                                    @else
                                        <span>
                                            {{ number_format( cartTotalDeliveryAmount() ) }}

                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="cart__order-total-box">
                                <div class="cart__order-total-row cart__order-total-row--text">هزینه ارسال در ادامه بر اساس
                                    آدرس
                                    و نحوه‌ی ارسال محاسبه و اضافه خواهد شد
                                </div>
                                <div class="cart__order-total-row cart__order-total-row--total"><label
                                        class="order-total-row__col-right">جمع سبد خرید :</label>
                                    <div class="order-total-row__col-left">
                                        <span>{{ number_format( cartTotalAmount() ) }}</span><span class="font-12 ms-1">تومان</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('home.orders.checkout') }}" class="btn w-100 d-block main-color-green py-3">تکمیل فرایند خرید</a>
                    </div>
                </div>
            @endif



        </div>
    </div>

    <!-- end main content -->
@endsection
