@extends('layouts.app')
@section('content')
    <!-- start main content -->

    <div class="content">
        <div class="container-fluid">

            <style>
                .line-step-box.complete:nth-child(1)::before {
                    width: 100%;
                }
            </style>


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
                        <div class="line-step-box complete">
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

                            <div
                                class="alert bg-white shadow-box d-flex align-items-center justify-content-between rounded-4">
                                <div class="d-flex align-items-center font-18 fw-bold">
                                    <i class="bi bi-clock me-2"></i>
                                    تامین و ارسال سفارش: 3 روز کاری دیگر
                                </div>
                            </div>

                            {{-- <div class="row gy-3">
                                <div class="col-md-6">
                                    <div class="alert bg-white shadow-box rounded-4 pointer py-3 mb-3"
                                        data-bs-toggle="modal" data-bs-target="#discountModal">
                                        <i class="bi bi-patch-exclamation main-color-one-color me-2 font-25"></i>
                                        کوپن تخفیف دارید برای نوشتن کد اینجا کلیک
                                        کنید
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="alert bg-white shadow-box rounded-4 pointer py-3 mb-3"
                                        data-bs-toggle="modal" data-bs-target="#giftModal">
                                        <i class="bi bi-gift main-color-one-color me-2 font-25"></i>
                                        کارت هدیه دارید برای نوشتن کد اینجا کلیک
                                        کنید
                                    </div>
                                </div>
                            </div> --}}

                            <div class="alert bg-white shadow-box">
                                <h5 class="font-18 border-bottom pb-3">
                                    انتخاب درگاه بانکی برای پرداخت
                                </h5>

                                <div class="delivary-payment-bank mt-3 flex-wrap d-flex align-items-center">

                                    <div class="row g-3 justify-content-center">
                                        <div class="col-md-3 col-sm-6">
                                            <div class="delivary-payment-bank-item active">
                                                <img src="{{ asset('assets/img/zarinpal.png') }}" alt="">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <p class="text-muted font-14">
                                                با "هر کارت بانکی" که عضو شبکه شتاب باشد می توانید پرداخت خود را انجام دهید.
                                                ضمناً پرداخت مبالغ بالای 100هزارتومان، نیاز به داشتن رمز پویا می باشد.
                                            </p>
                                            <p class="main-color-one-color fw-bold font-14">قبل از پرداخت آنلاین و اتصال به
                                                درگاه بانک، حتما از فیلترشکن خود خارج شوید.</p>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="alert bg-white shadow-box">
                                <h5 class="font-18 border-bottom pb-3">
                                    جزئیات سفارش
                                </h5>

                                @if ($addresses->isNotEmpty())
                                    @foreach ($addresses as $address)
                                        <div class="detail-order mt-3">
                                            <div class="detail-order-item d-flex align-items-center">
                                                <h6><i class="bi bi-pin-map-fill me-1"></i> آدرس تحویل:</h6>
                                                <span class="ms-2 text-muted">{{ $address->full_address }}</span>
                                            </div>
                                            <div class="detail-order-item mt-3 d-flex align-items-center">
                                                <h6><i class="bi bi-person-fill me-1"></i>تحویل گیرنده:</h6>
                                                <span class="ms-2 text-muted">{{ $address->recipient_name }}</span>
                                            </div>
                                            <div class="detail-order-item mt-3 d-flex align-items-center">
                                                <h6><i class="bi bi-telephone-fill me-1"></i>شماره تماس:</h6>
                                                <span class="ms-2 text-muted">{{ $address->phone }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <a href="#" class="btn btn-primary my-2"> ایجاد آدرس جدید </a>
                                @endif


                                <ul class="row gy-3 ps-0 mt-4">
                                    @foreach (\Cart::getContent() as $item)
                                        <div class="col-sm-6">
                                            <div class="cart-canvas border rounded-3 p-3">
                                                <div class="row align-items-center">
                                                    <div class="col-4 ps-0">
                                                        <img src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH') . $item->associatedModel->primary_image) }}" width="200" alt="">
                                                    </div>
                                                    <div class="col-8">
                                                        <h3 class="text-overflow-2 font-16">
                                                            {{ $item->name }}
                                                        </h3>
                                                        <p class="mb-0" style="font-size: 14px; color:red">
                                                            {{ \App\Models\Attribute::find($item->attributes->attribute_id)->name }}
                                                            :
                                                            {{ $item->attributes->value }}
                                                        </p>
                                                        <div
                                                            class="product-box-suggest-price my-2  d-flex align-items-center justify-content-between">
                                                            <ins class="font-25 ms-0">{{ number_format($item->price) }} <span>تومان</span></ins>
                                                        </div>
                                                        <div
                                                            class="cart-canvas-foot d-flex align-items-center justify-content-between">
                                                            <div class="cart-canvas-count">
                                                                <span>تعداد:</span>
                                                                <span class="fw-bold">{{ $item->quantity }}</span>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </ul>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="position-sticky top-0">
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
                        <a href="" class="btn w-100 d-block main-color-green py-3">تکمیل فرایند خرید</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end main content --
@endsection
