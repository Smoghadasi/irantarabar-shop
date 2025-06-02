@extends('layouts.app')
@section('content')
<!-- start main content -->

<div class="content">
    <div class="container-fluid">

        <!-- start menu side in mobile -->

        @include('partials.profile.sideMenuMobile')

        <!-- end menu side in mobile -->

        <div class="row">
            <div class="col-lg-3 d-lg-block d-none">
                @include('partials.profile.sideMenuDesktop')
            </div>
            <div class="col-lg-9">

                <div class="section-title mb-4">
                    <div class="section-title-title">
                        <h2 class="title-font main-color-two-color h1">آخرین <span class="text-dark">سفارشات </span>
                        </h2>
                        <div class="Dottedsquare"></div>
                    </div>
                </div>

                <div class="alert slider-parent bg-white mt-5 shadow-box rounded-4">
                    <div class="tab-product-nav tab-panel-tbl  p-3 rounded-3">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active btn border-bottom-0" id="latest-order"
                                        data-bs-toggle="tab" data-bs-target="#latest-order-pane" type="button"
                                        role="tab" aria-controls="latest-order-pane" aria-selected="true">سفارشات ارسال
                                    شده <span class="badge main-color-green ms-1">1</span></button>
                            </li>

                        </ul>
                    </div>
                    <div class="tab-content tab-product-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="latest-order-pane" role="tabpanel"
                             aria-labelledby="latest-order" tabindex="0">
                            <div class="panel-latest-order">
                                <div class="table-responsive roundedTable p-0">
                                    <table class="table table-bordered main-table rounded-0">
                                        <tbody>
                                        @foreach ($orders as $order)
                                            <tr>

                                                <td colspan="2" class="align-middle">
                                                    <h5 class="text-overflow-1 mt-2 h6">
                                                        سفارش شماره 427 خرم آباد
                                                    </h5>
                                                </td>
                                                <td colspan="2" class="align-middle">
                                                    <div class="d-flex align-items-center">
                                                        <p class="mb-0 text-muted font-18">کد سفارش</p>
                                                        <p class="mb-0 ms-2 fw-bold">1456321</p>
                                                    </div>
                                                    <p class="mb-0 text-muted mt-2 font-16">4 تیرماه 1403</p>
                                                </td>
                                                <td colspan="2" class="align-middle">
                                                    <div class="d-flex align-items-center">
                                                        <p class="mb-0 text-muted font-18">مبلغ</p>
                                                        <p class="mb-0 ms-2 fw-bold">1,700,000 تومان</p>
                                                    </div>
                                                    <p class="mb-0 fw-bold mt-2 font-16"><i
                                                            class="bi bi-check-circle-fill me-1 main-color-three-color"></i>
                                                        تحویل داده شده</p>
                                                </td>
                                                <td colspan="2" class="align-middle">
                                                    <div class="text-center">
                                                        <a href="" class="btn main-color-one-bg">مشاهده</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="pagination mt-5 pagination-2 justify-content-center">
                                <a href="#" class="pageitem">قبلی</a>
                                <a href="#">1</a>
                                <a href="#" class="active">2</a>
                                <a href="#">3</a>
                                <a href="#">4</a>
                                <a href="#">5</a>
                                <a href="#">6</a>
                                <a href="#">7</a>
                                <a href="#" class="pageitem">بعدی</a>
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
