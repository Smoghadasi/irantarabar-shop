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
                        <input class="form-control" name="cellphone" type="text" value="{{ $user->cellphone }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="role">نقش کاربر</label>
                        <select class="form-control" name="role" id="role">
                            <option></option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}" {{ in_array($role->id , $user->roles->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $role->display_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="accordion col-md-12 mt-3" id="accordionPermission">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed text-right" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapsePermission"
                                    aria-expanded="false" aria-controls="collapsePermission">
                                    مجوزهای دسترسی
                                </button>
                            </h2>
                            <div id="collapsePermission" class="accordion-collapse collapse"
                                aria-labelledby="headingOne" data-bs-parent="#accordionPermission">
                                <div class="accordion-body row">
                                    @foreach ($permissions as $permission)
                                        <div class="form-group form-check col-md-3">
                                            <input type="checkbox" class="form-check-input"
                                                id="permission_{{ $permission->id }}" name="{{ $permission->name }}"
                                                value="{{ $permission->name }}"
                                                {{ in_array($permission->id, $user->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                            <label class="form-check-label mr-3"
                                                for="permission_{{ $permission->id }}">{{ $permission->display_name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <button class="btn btn-outline-primary mt-5" type="submit">ویرایش</button>
                <a href="{{ route('admin.user.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>

    </div>

@endsection
