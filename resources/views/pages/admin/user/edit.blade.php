@extends('layouts.dashboard')

@section('title')
    edit users
@endsection

@section('content')
    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
            <div class="mb-4 text-center text-md-right">
                <h5 class="font-weight-bold">ویرایش کاربر {{ $user->name }}</h5>
            </div>
            <hr>

            @include('partials.error')

            <form action="{{ route('admin.user.update', ['user' => $user->id]) }}" method="POST">
                @csrf
                @method('put')
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="name">نام</label>
                        <input class="form-control" name="name" type="text" value="{{ $user->name }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="name">شماره تلفن همراه</label>
                        <input class="form-control" name="mobileNumber" type="text" value="{{ $user->mobileNumber }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="role">نقش کاربر</label>
                        <select class="form-control" name="roles[]" id="role" multiple>
                            <option disabled>لطفا انتخاب کنید</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}"
                                    {{ in_array($role->id, $user->roles->pluck('id')->toArray()) ? 'selected' : '' }}>
                                    {{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button class="btn btn-outline-primary mt-5" type="submit">ویرایش</button>
                <a href="{{ route('admin.user.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>

    </div>
@endsection
