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
                   <div class="row gy-3 align-items-center">
                       <div class="col-sm-8">
                           <div class="section-title-title">
                               <h2 class="title-font main-color-two-color h1">پروفایل <span class="text-dark">کاربری </span>
                               </h2>
                               <div class="Dottedsquare"></div>
                           </div>
                       </div>
                       <div class="col-sm-4">
                           <div class="section-title-link text-sm-end text-start">
                               <a class="btn main-color-one-bg" href="">ویرایش پروفایل</a>
                           </div>
                       </div>
                   </div>
               </div>

               <div class="table-custom slider-parent p-0">
                   <div class="table-responsive shadow-box roundedTable p-0">
                       <table class="table main-table rounded-0">
                           <tbody>
                           <tr>
                               <td colspan="2">
                                   <h6 class="fw-bold font-18  text-muted ">نام و نام خانوادگی:</h6>
                                   <p class=" mt-2 font-16">{{ Auth::user()->name }} {{ Auth::user()->lastName }}</p>
                               </td>
                               <td colspan="2">
                                   <h6 class="text-muted fw-bold font-18 ">شماره تلفن:</h6>
                                   <p class=" mt-2 font-16">{{ Auth::user()->mobileNumber ?? '-' }}</p>
                               </td>
                               <td colspan="2">
                                   <h6 class="fw-bold font-18 text-muted">پست الکترونیک:</h6>
                                   <p class=" mt-2 font-16">{{ Auth::user()->email ?? '-' }}</p>
                               </td>
                               <td colspan="2" class="no-border">
                                   <h6 class="fw-bold font-18 text-muted">کد ملی:</h6>
                                   <p class=" mt-2 font-16">{{ Auth::user()->nationalCode ?? '-' }}</p>
                               </td>
                           </tr>
                           {{-- <tr>
                               <td colspan="8" class="no-border">
                                   <h6 class="fw-bold font-18  text-muted">آدرس: </h6>
                                   <p class=" mt-2 font-16">خرم آباد شهریار انتهای کوچه</p>
                               </td>
                           </tr> --}}
                           </tbody>
                       </table>
                   </div>
               </div>

           </div>
       </div>
    </div>
</div>

<!-- end main content -->
@endsection
