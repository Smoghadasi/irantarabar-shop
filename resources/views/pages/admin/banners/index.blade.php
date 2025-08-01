@extends('layouts.dashboard')
@section('content')
    <!-- Content -->

    <div class="card">
        <div class="card-header heading-color">
            <div class="d-flex flex-column text-center flex-md-row justify-content-md-between mb-4">
                <h5 class="font-weight-bold mb-3 mb-md-0">لیست بنر ها ({{ $banners->total() }})</h5>
                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.banners.create') }}">
                    <i class="fa fa-plus"></i>
                    ایجاد بنر
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">

                <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">


                    <div class="table-responsive">
                        <table class="table table-bordered table-striped text-center">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>تصویر</th>
                                    {{-- <th>عنوان</th> --}}
                                    {{-- <th>متن</th> --}}
                                    <th>الویت</th>
                                    <th>وضعیت</th>
                                    <th>نوع</th>
                                    {{-- <th>متن دکمه</th> --}}
                                    {{-- <th>لینک دکمه</th> --}}
                                    {{-- <th>آیکون دکمه</th> --}}
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banners as $key => $banner)
                                    <tr>
                                        <th>
                                            {{ $banners->firstItem() + $key }}
                                        </th>
                                        <th>
                                            <a target="_blank"
                                                href="{{ url(env('BANNER_IMAGES_UPLOAD_PATH') . $banner->image) }}">
                                                {{ $banner->image }}
                                            </a>
                                        </th>

                                        <th>
                                            {{ $banner->priority }}
                                        </th>
                                        <th>
                                            <span
                                                class="{{ $banner->getRawOriginal('is_active') ? 'text-success' : 'text-danger' }}">
                                                {{ $banner->is_active }}
                                            </span>
                                        </th>
                                        <th>
                                            {{ $banner->type }}
                                        </th>


                                        <th>
                                            <form action="{{ route('admin.banners.destroy', ['banner' => $banner->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-sm btn-outline-danger" type="submit">حذف</button>
                                            </form>
                                            <a class="btn btn-sm btn-outline-info mr-3 mt-2"
                                                href="{{ route('admin.banners.edit', ['banner' => $banner->id]) }}">ویرایش</a>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-5">
                        {{ $banners->render() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
