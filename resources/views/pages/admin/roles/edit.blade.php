@extends('layouts.dashboard')

@section('title')
    edit roles
@endsection

@section('content')

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
            <div class="mb-4 text-center text-md-right">
                <h5 class="font-weight-bold">ویرایش نقش {{ $role->name }}</h5>
            </div>
            <hr>

            @include('partials.error')

            <form action="{{ route('admin.roles.update', ['role' => $role->id]) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="name">نام نمایشی</label>
                        <input class="form-control" name="display_name" type="text" value="{{ $role->display_name }}">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="name">نام</label>
                        <input class="form-control" name="name" type="text" value="{{ $role->name }}">
                    </div>

                    <div class="accordion col-md-12 mt-3" id="accordionPermission">
                        <div class="accordion-item">
                            <h2 class="accordion-header p-1" id="headingOne">
                                <button class="accordion-button collapsed text-right" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapsePermission" aria-expanded="false" aria-controls="collapsePermission">
                                    مجوز های دسترسی
                                </button>
                            </h2>

                            <div id="collapsePermission" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionPermission">
                                <div class="accordion-body row">
                                    @foreach ($permissions as $permission)
                                        <div class="form-check col-md-3">
                                            <input type="checkbox" class="form-check-input"
                                                id="permission_{{ $permission->id }}" name="{{ $permission->name }}"
                                                value="{{ $permission->name }}"
                                                {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="permission_{{ $permission->id }}">
                                                {{ $permission->display_name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <button class="btn btn-outline-primary mt-5" type="submit">ویرایش</button>
                <a href="{{ route('admin.roles.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>

    </div>

@endsection
