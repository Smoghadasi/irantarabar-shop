@extends('layouts.app')
@section('script')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script>
    $('#province').on('change', function () {
        var provinceId = $(this).val();
        $('#city').html('<option value="">در حال بارگذاری...</option>');

        if (provinceId) {
            $.ajax({
                url: '/profile/get-cities/' + provinceId,
                type: 'GET',
                success: function (data) {
                    var cityOptions = '<option value="">انتخاب شهر</option>';
                    data.forEach(function (city) {
                        cityOptions += '<option value="' + city.id + '">' + city.name + '</option>';
                    });
                    $('#city').html(cityOptions);
                }
            });
        } else {
            $('#city').html('<option value="">ابتدا استان را انتخاب کنید</option>');
        }
    });
</script>

@endsection
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
                        <div class="section-title-title">
                            <h2 class="title-font main-color-two-color h1">ثبت <span class="text-dark">آدرس</span>
                            </h2>
                            <div class="Dottedsquare"></div>
                        </div>
                    </div>

                    <div class="slider-parent content-box rounded-3">
                        <div class="container-fluid">
                            <form method="post" action="{{ route('home.panel.address.store') }}">
                                @csrf
                                <div class="row g-4">
                                    <div class="col-12">
                                        <div class="comment-item mb-3">
                                            <input name="address" type="text" class="form-control" id="floatingInputStreet1"
                                                placeholder="آدرس خود را وارد کنید ...">
                                            <label for="floatingInputStreet1" class="form-label label-float fw-bold">آدرس</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="comment-item">
                                            <label class="label-float fw-bold">استان <span class="text-danger">*</span></label>
                                            <select name="province_id" id="province" class="form-select">
                                                <option value="">انتخاب استان</option>
                                                @foreach($provinces as $province)
                                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="comment-item">
                                            <label class="label-float fw-bold">شهر <span class="text-danger">*</span></label>
                                            <select name="city_id" id="city" class="form-select">
                                                <option value="">ابتدا استان را انتخاب کنید</option>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="col-12">
                                        <button type="submit" class="btn main-color-one-bg px-3 py-2">ثبت آدرس</button>
                                    </div>

                                </div>
                            </form>
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
                                <input type="text" class="form-control" id="floatingInputName" placeholder="نام خود را وارد کنید...">
                                <label for="floatingInputName" class="form-label label-float fw-bold font-16">نام
                                    <span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="comment-item">
                                <input type="text" class="form-control" id="floatingInputLName" placeholder="نام خانوادگی خود را وارد کنید ...">
                                <label for="floatingInputLName" class="form-label label-float fw-bold">نام خانوادگی
                                    <span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="comment-item">
                                <input type="text" class="form-control" id="floatingInputStreet" placeholder="نام خانوادگی خود را وارد کنید ...">
                                <label for="floatingInputStreet" class="form-label label-float fw-bold">آدرس
                                    خیابان</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="comment-item">
                                <label for="floatingInputOstan" class="label-float fw-bold">استان <span class="text-danger">*</span></label>

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
                                <label class="label-float fw-bold" for="floatingInputCity">شهر <span class="text-danger">*</span></label>

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
                                <input type="text" class="form-control" id="floatingInputTel" placeholder="شماره تلفن خود را وارد کنید ...">
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
