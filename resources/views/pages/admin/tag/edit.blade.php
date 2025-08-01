@extends('layouts.dashboard')

@section('title')
    edit tag
@endsection

@section('content')

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
            <div class="mb-4 text-center text-md-right">
            <h5 class="font-weight-bold">ویرایش تگ {{ $tag->name }}</h5>
            </div>
            <hr>

            @include('partials.dashboard.errors')

            <form action="{{ route('admin.tag.update' , ['tag' => $tag->id]) }}" method="POST">
                @csrf
                @method('put')
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="name">نام</label>
                        <input class="form-control" id="name" name="name" type="text" value="{{ $tag->name }}">
                    </div>
                </div>

                <button class="btn btn-outline-primary mt-5" type="submit">ویرایش</button>
                <a href="{{ route('admin.tag.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>

    </div>

@endsection
