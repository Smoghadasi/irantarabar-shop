<header class="header">
    <div class="container-fluid">
        <div class="top-header">
            <div class="row gy-3 align-items-center">
                <div class="col-lg-2 col-6 order-lg-1 order-1">
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center me-2">
                            <div class="responsive-menu d-lg-none d-block">
                                <button class="btn border-0 p-0 btn-responsive-menu" type="button"
                                    data-bs-toggle="offcanvas" data-bs-target="#responsiveMenu"
                                    aria-controls="responsive menu">
                                    <i class="bi bi-list font-30"></i>
                                </button>
                                <div class="offcanvas offcanvas-start" tabindex="-1" id="responsiveMenu"
                                    aria-labelledby="responsive menu">
                                    <div class="offcanvas-header">
                                        <h5 class="offcanvas-title" id="offcanvasRightLabel">فروشگاه بهرخ</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <a href="" class="text-center d-block mb-3">
                                            <img src="{{ asset('assets/img/logo.png') }}" alt=""
                                                class="img-fluid" width="200">
                                        </a>
                                        <div class="header-bottom-form mb-4 w-100">
                                            <div class="search-form">
                                                <form action="">
                                                    <div class="search-filed">
                                                        <input type="text" placeholder="جستجوی محصولات ..."
                                                            class="form-control search-input">
                                                        <button type="submit"
                                                            class="btn search-btn main-color-one-bg rounded-3"><i
                                                                class="bi bi-search"></i></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <ul class="rm-item-menu navbar-nav">
                                            @foreach (App\helper\ShowModels::categoryHeaderMegaMenu() as $category)
                                                <li class="nav-item bg-ul-f7">
                                                    <a href="#" class="nav-link">
                                                        {{ $category->name }}
                                                    </a>
                                                    @if ($category->children->count())
                                                        <span class="showSubMenu"><i class="bi bi-chevron-left"></i></span>
                                                        <ul class="navbar-nav h-0">
                                                            @foreach ($category->children as $subCategory)
                                                                <li class="nav-item">
                                                                    <a class="nav-link" href="{{ route('home.categories.show', ['category' => $subCategory->slug]) }}">
                                                                        {{ $subCategory->name }}
                                                                    </a>
                                                                    @if ($subCategory->children->count())
                                                                        <span class="showSubMenu"><i class="bi bi-chevron-left"></i></span>
                                                                        <ul class="navbar-nav h-0 bg-ul-f7">
                                                                            @foreach ($subCategory->children as $thirdCategory)
                                                                                <li class="nav-item">
                                                                                    <a class="nav-link" href="{{ route('home.categories.show', ['category' => $thirdCategory->slug]) }}">
                                                                                        {{ $thirdCategory->name }}
                                                                                    </a>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    @endif
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">صفحه اصلی</a></li>
                                            <li class="nav-item"><a class="nav-link" href="{{ url('/product') }}">صفحه محصول</a></li>
                                            <li class="nav-item"><a class="nav-link" href="{{ url('/category') }}">صفحه دسته‌بندی</a></li>
                                            <li class="nav-item"><a class="nav-link" href="{{ url('/cart') }}">سبد خرید</a></li>
                                            <!-- سایر صفحات... -->
                                            @guest
                                                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">ورود</a></li>
                                                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">ثبت‌نام</a></li>
                                            @endguest
                                            @auth
                                                <li class="nav-item"><a class="nav-link" href="{{ url('/dashboard') }}">داشبورد</a></li>
                                            @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="top-header-logo">
                            <a href="/">
                                <img src="{{ asset('assets/img/iran.png') }}" width="200" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 order-lg-2 order-3">
                    <div class="search-form">
                        <form action="">
                            <div class="search-filed">
                                <input type="text" placeholder="جستجوی محصولات ..."
                                    class="form-control search-input">
                                <button type="submit" class="btn search-btn main-color-one-bg rounded-3"><i
                                        class="bi bi-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-6 order-lg-3 order-2">



                    <div class="top-header-link d-lg-flex d-none">
                        @auth
                            <div class="dropdown text-end d-lg-none d-block">
                                <a href="#register" data-bs-toggle="dropdown" aria-expanded="false" role="button"
                                    class="btn btn-white header-register border-0 rounded-pill">
                                    <figure class="avatar">
                                        <img src="assets/img/user.png" alt="amirRezae">
                                    </figure>
                                </a>
                                <ul class="dropdown-menu flex-column" style="">
                                    <li><a href="{{ route('home.panel.dashboard') }}" class="dropdown-item"><i
                                                class="bi bi-house-door me-2"></i>پروفایل</a>
                                    </li>
                                    <li><a href="" class="dropdown-item"><i
                                                class="bi bi-cart-check me-2"></i>سفارش
                                            های
                                            من</a></li>
                                    <li><a href="" class="dropdown-item"><i class="bi bi-pin-map me-2"></i>آدرس
                                            های
                                            من</a></li>
                                    <li><a href="" class="dropdown-item"><i class="bi bi-bell me-2"></i>پیام ها و
                                            اطلاعیه ها</a></li>
                                    <li><a href="" class="dropdown-item"><i class="bi bi-chat-dots me-2"></i>نظرات
                                            من</a></li>
                                    <li><a href="" class="dropdown-item"><i
                                                class="bi bi-question-circle me-2"></i>درخواست
                                            پشتیبانی</a></li>
                                    <li><a href="" class="dropdown-item"><i class="bi bi-heart me-2"></i>محصولات
                                            مورد
                                            علاقه</a></li>
                                    <li><a href="" class="dropdown-item"><i class="bi bi-gift me-2"></i>کد های
                                            تخفیف
                                            من</a></li>
                                    <li><a href="" class="dropdown-item mct-hover"><i
                                                class="bi bi-arrow-right-square me-2"></i>خروج از حساب کاربری</a></li>
                                </ul>
                            </div>

                            <div class="top-header-link d-lg-flex d-none">
                                <div class="dropdown text-end">
                                    <a href="#register" data-bs-toggle="dropdown" aria-expanded="true" role="button"
                                        class="btn btn-white auth-dropdown header-register border-0">
                                        <div class="d-flex align-items-center">
                                            <figure class="avatar">
                                                <img src="{{ asset('assets/img/user.png') }}" alt="amirRezae">
                                            </figure>
                                            <span class="ms-3 font-18">{{ Auth::user()->name }} <i
                                                    class="bi bi-chevron-down arrow-auth font-12 ms-2"></i></span>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu flex-column" style="min-width: 250px"
                                        data-popper-placement="bottom-start">
                                        <li class="w-100"><a href="{{ route('home.panel.dashboard') }}"
                                                class="dropdown-item fs-6"><i
                                                    class="bi bi-house-door me-2"></i>پروفایل</a>
                                        </li>
                                        <li class="w-100"><a href="{{ route('orders.index') }}"
                                                class="dropdown-item fs-6 py-2"><i class="bi bi-cart-check me-2"></i>سفارش
                                                های
                                                من</a></li>
                                        <li class="w-100"><a href="{{ route('home.panel.address.index') }}"
                                                class="dropdown-item fs-6 py-2"><i class="bi bi-pin-map me-2"></i>آدرس های
                                                من</a></li>
                                        {{-- <li class="w-100"><a href="" class="dropdown-item fs-6 py-2"><i
                                                    class="bi bi-bell me-2"></i>پیام ها و
                                                اطلاعیه ها</a></li>
                                        <li class="w-100"><a href="" class="dropdown-item fs-6 py-2"><i
                                                    class="bi bi-chat-dots me-2"></i>نظرات
                                                من</a></li>
                                        <li class="w-100"><a href="" class="dropdown-item fs-6 py-2"><i
                                                    class="bi bi-question-circle me-2"></i>درخواست
                                                پشتیبانی</a></li> --}}
                                        <li class="w-100"><a href="{{ route('wishlist.users_profile.index') }}"
                                                class="dropdown-item fs-6 py-2"><i class="bi bi-heart me-2"></i>محصولات
                                                مورد
                                                علاقه</a></li>
                                        {{-- <li class="w-100"><a href="" class="dropdown-item fs-6 py-2"><i
                                                    class="bi bi-gift me-2"></i>کد های تخفیف
                                                من</a></li> --}}
                                        <li class="w-100"><a href="{{ route('logout') }}" role="button"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                                class="dropdown-item fs-6 py-2 mct-hover"><i
                                                    class="bi bi-arrow-right-square me-2"></i>خروج از حساب کاربری</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="top-header-link-login rounded-pill me-2"><i
                                    class="bi bi-person-lock d-sm-none fs-2 d-sm-block"></i> <span
                                    class="d-sm-block d-none">ورود</span></a>
                            <a href="{{ route('register') }}"
                                class="top-header-link-register border-0 btn main-color-one-bg rounded-pill"><i
                                    class="bi bi-person-add fs-2 d-sm-none d-sm-block"></i> <span
                                    class="d-sm-block d-none">عضویت</span> </a>
                        @endauth

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<div class="mega-menu menu mega-menu-top d-lg-block d-none">
    <div class="container-fluid">
        <div class="top-menu-parent">
            <div class="row align-items-center">
                <div class="col-lg-9 col-xl-8">
                    <div class="top-menu-menu">
                        <ul class="navbar-nav align-items-center">
                            <li class="position-relative m-0"></li>
                            <li class="nav-item main-menu-head"><a href=""
                                    class="nav-link border-animate main-color-one-bg fromCenter btn nav-active fw-bold">
                                    <i class="bi bi-list"></i>
                                    مگا تب منو
                                </a>
                                <ul class="main-menu mega-container">
                                    @foreach (App\helper\ShowModels::categoryHeaderMegaMenu() as $category)
                                        <li class="">
                                            <a href="#">
                                                <i class="bi bi-phone"></i> {{ $category->name }}
                                            </a>

                                            @if ($category->children->count())
                                                <ul class="main-menu-sub back-menu"
                                                    style="background: #fff url('assets/img/mobiles.png') no-repeat;">

                                                    @foreach ($category->children as $subCategory)
                                                        @if ($subCategory->children->count())
                                                            <li><a class="title my-flex-baseline"
                                                                    href="{{ route('home.categories.show', ['category' => $subCategory->slug]) }}">{{ $subCategory->name }}</a>
                                                            </li>

                                                            @foreach ($subCategory->children as $thirdCategory)
                                                                <li><a
                                                                        href="{{ route('home.categories.show', ['category' => $thirdCategory->slug]) }}">{{ $thirdCategory->name }}</a>
                                                                </li>
                                                            @endforeach
                                                        @else
                                                            <li><a
                                                                    href="{{ route('home.categories.show', ['category' => $subCategory->slug]) }}">{{ $subCategory->name }}</a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>

                            </li>



                            <li class="nav-item"><a href="{{ route('home.contactUs') }}" class="nav-link border-animate fromCenter">
                                    درباره ما
                                    </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-xl-4">
                    <div class="d-flex align-items-center justify-content-end">
                        <div class="d-flex align-items-center top-header-call d-xl-flex d-none">
                            <div class="top-header-call-title me-3">
                                <h6 class="text-center h5">021-12345678</h6>
                                <p class="text-muted">پشتیبانی 24 ساعته</p>
                            </div>
                            <div class="top-header-call-icon">
                                <i class="bi bi-telephone-forward fs-3"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-end ms-5">

                            <a class="btn-cart-counter ms-2" data-bs-toggle="offcanvas" href="#offcanvasCart"
                                role="button" aria-controls="offcanvasCart">
                                @if (!\Cart::isEmpty())
                                    <span class="text-white me-3">{{ \Cart::getContent()->count() }}</span>
                                @else
                                    <span class="text-white me-3">0</span>
                                @endif
                                <i class="bi bi-basket"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--start cart canvas-->

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCart" aria-labelledby="offcanvasCartLabel">
    <div class="offcanvas-header shadow-md">
        <h5 class="offcanvas-title title-font" id="offcanvasCartLabel">سبد خرید <small
                class="text-muted fw-bold font-14 ms-1">({{ \Cart::getContent()->count() }}
                مورد)</small></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        @if (\Cart::isEmpty())
            <img src="{{ asset('assets/img/empty-cart.svg') }}" width="500" alt="">
            <p class="text-center mt-4 f-800">سبد خرید شما خالی است!</p>
        @else
            <ul class="navbar-nav cart-canvas-parent">
                @foreach (\Cart::getContent() as $item)
                    <li class="nav-item">
                        <div class="cart-canvas">
                            <div class="row align-items-center">
                                <div class="col-4 ps-0">
                                    <img src="{{ asset(env('PRODUCT_IMAGES_UPLOAD_PATH') . $item->associatedModel->primary_image) }}"
                                        alt="">
                                </div>
                                <div class="col-8">
                                    <h3 class="text-overflow-2 font-16">
                                        {{ $item->name }}
                                    </h3>
                                    <div
                                        class="product-box-suggest-price my-2  d-flex align-items-center justify-content-between">
                                        {{-- <del class="font-16">5,000,000</del> --}}
                                        <ins class="font-25">{{ number_format($item->price) }}
                                            <span>تومان</span></ins>
                                    </div>
                                    <div class="cart-canvas-foot d-flex align-items-center justify-content-between">
                                        <div class="cart-canvas-count">
                                            <span>تعداد:</span>
                                            <span class="fw-bold">{{ $item->quantity }}</span>
                                        </div>
                                        <div class="cart-canvas-delete">
                                            <a href="{{ route('home.cart.remove', ['rowId' => $item->id]) }}"
                                                class="btn"><i class="bi bi-x"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach

            </ul>

            <div class="cart-canvas-foots bg-white shadow-md">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="cart-canvas-foot-sum">
                            <p class="text-muted mb-2">جمع کل</p>
                            <h5>{{ number_format(\Cart::getTotal()) }} تومان</h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="cart-canvas-foot-link text-end">
                            <a href="{{ route('home.cart.index') }}"
                                class="btn border-0 main-color-green text-white"><i class="bi bi-arrow-left me-1"></i>
                                تکمیل خرید</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>

</div>

<!--end cart canvas-->
