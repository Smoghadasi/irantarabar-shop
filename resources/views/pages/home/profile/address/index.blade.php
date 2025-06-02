@extends('layouts.app')
@section('content')
    <!-- start bread -->

    <div class="bread-crumb py-4">
        <div class="container-fluid">
            <nav aria-label="breadcrumb" class="my-lg-0 my-2">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="font-14 text-muted-two" href="#">خانه</a></li>
                    <li class="breadcrumb-item"><a class="font-14 text-muted-two" href="#">پروفایل</a></li>
                    <li aria-current="page" class="breadcrumb-item active main-color-one-color font-14 fw-bold">آدرس
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- end bread -->
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
                        <div class="row gy-3 align-items-center">
                            <div class="col-sm-8">
                                <div class="section-title-title">
                                    <h2 class="title-font main-color-two-color h1">آدرس های <span class="text-dark">ثبت شده
                                        </span>
                                    </h2>
                                    <div class="Dottedsquare"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="section-title-link text-sm-end text-start">
                                    <a class="btn main-color-one-bg" href="{{ route('home.panel.address.create') }}">ثبت آدرس جدید <i
                                            class="bi bi-plus-circle ms-2"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content-box slider-parent rounded-3">
                        <div class="container-fluid">
                            <div class="row">
                                @foreach ($addresses as $address)
                                    <div class="col-md-4">
                                        <div class="bg-white card addresses-item mb-4 shadow-sm">
                                            <div class="gold-members p-4">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h6 class="mb-1">{{ $address->title }}</h6>
                                                        <p class="text-overflow-2 address-line">
                                                            {{ $address->title }}
                                                        </p>
                                                        {{-- <p class="mb-0 text-black font-weight-bold">
                                                            <a class="me-3" data-bs-toggle="modal"
                                                                data-bs-target="#addressModal" href="#"><i
                                                                    class="bi bi-pencil"></i> </a>
                                                            <a class="text-danger" data-toggle="modal"
                                                                data-target="#delete-address-modal" href="#"><i
                                                                    class="bi bi-trash"></i> </a>
                                                        </p> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- end main content -->

    <!-- edit profile modal  -->

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">ویرایش پروفایل</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="comment-item">
                                    <input type="text" class="form-control" id="floatingInputName"
                                        placeholder="نام خود را وارد کنید...">
                                    <label for="floatingInputName" class="form-label label-float fw-bold font-16">نام
                                        <span class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="comment-item">
                                    <input type="text" class="form-control" id="floatingInputLName"
                                        placeholder="نام خانوادگی خود را وارد کنید ...">
                                    <label for="floatingInputLName" class="form-label label-float fw-bold">نام خانوادگی
                                        <span class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="comment-item">
                                    <input type="text" class="form-control" id="floatingInputStreet"
                                        placeholder="نام خانوادگی خود را وارد کنید ...">
                                    <label for="floatingInputStreet" class="form-label label-float fw-bold">آدرس
                                        خیابان</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="comment-item">
                                    <label for="floatingInputOstan" class="label-float fw-bold">استان <span
                                            class="text-danger">*</span></label>

                                    <select name="" id="floatingInputOstan" class="form-select">
                                        <option value="">تهران</option>
                                        <option value="">اصفهان</option>
                                        <option value="">مشهد</option>
                                        <option value="">شیراز</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="comment-item">
                                    <label class="label-float fw-bold" for="floatingInputCity">شهر <span
                                            class="text-danger">*</span></label>

                                    <select name="" id="floatingInputCity" class="form-select">
                                        <option value="">کرج</option>
                                        <option value="">خرم آباد</option>
                                        <option value="">نور آباد</option>
                                        <option value="">الشتر</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="comment-item">
                                    <input type="text" class="form-control" id="floatingInputTel"
                                        placeholder="شماره تلفن خود را وارد کنید ...">
                                    <label for="floatingInputTel" class="form-label label-float fw-bold">شماره
                                        تلفن</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <button type="submit" class="btn main-color-one-bg border-0">
                                        ویرایش پروفایل
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                </div>
            </div>
        </div>
    </div>


    <!-- end edit profile modal  -->
@endsection
