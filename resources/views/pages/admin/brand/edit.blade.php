@extends('layouts.dashboard')

@section('title')
    edit brands
@endsection

@section('content')

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
            <div class="mb-4 text-center text-md-right">
            <h5 class="font-weight-bold">ویرایش برند {{ $brand->name }}</h5>
            </div>
            <hr>
            @include('partials.dashboard.errors')
            <form action="{{ route('admin.brands.update' , ['brand' => $brand->id]) }}" method="POST">
                @csrf
                @method('put')
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="name">نام</label>
                        <input class="form-control" id="name" name="name" type="text" value="{{ $brand->name }}">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="is_active">وضعیت</label>
                        <select class="form-control" id="is_active" name="is_active">
                            <option value="1" {{ $brand->getRawOriginal('is_active') ? 'selected' : '' }}>فعال</option>
                            <option value="0" {{ $brand->getRawOriginal('is_active') ? 'selected' : '' }} >غیرفعال</option>
                        </select>
                    </div>
                </div>

                <button class="btn btn-outline-primary mt-5" type="submit">ویرایش</button>
                <a href="{{ route('admin.brands.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>

    </div>

@endsection
