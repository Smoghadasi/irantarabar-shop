@extends('layouts.dashboard')

@section('title')
    show roles
@endsection

@section('content')

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
            <div class="mb-4 text-center text-md-right">
                <h5 class="font-weight-bold"> نمایش نقش {{ $role->display_name }}</h5>
            </div>
            <hr>

            @include('partials.error')

            <form action="{{ route('admin.roles.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="name">نام نمایشی</label>
                        <input class="form-control" disabled name="display_name" type="text" value="{{ $role->display_name }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="name">نام</label>
                        <input class="form-control" name="name" disabled type="text" value="{{ $role->name }}">
                    </div>

                    <div class="accordion col-md-12 mt-3" id="accordionPermission">
                        <div class="accordion-item">
                            <h2 class="accordion-header p-1" id="headingOne">
                                <button class="accordion-button text-right" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapsePermission" aria-expanded="true" aria-controls="collapsePermission">
                                    مجوز های دسترسی
                                </button>
                            </h2>
                            <div id="collapsePermission" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionPermission">
                                <div class="accordion-body row">
                                    @foreach ($role->permissions as $permission)
                                        <div class="col-md-3">
                                            <span>{{ $permission->display_name }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <button class="btn btn-outline-primary mt-5" type="submit">ثبت</button>
                <a href="{{ route('admin.roles.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>

    </div>

@endsection
