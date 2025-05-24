@extends('layouts.dashboard')
@section('script')
    <script>
        // Show File Name
        $('#banner_image').change(function() {
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        });
    </script>
@endsection
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
                    <div class="mb-4 text-center text-md-right">
                        <h5 class="font-weight-bold">ویرایش بنر : {{ $banner->image }}</h5>
                    </div>
                    <hr>
                    @include('admin.sections.errors')
                    <form action="{{ route('admin.banners.update', ['banner' => $banner]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row justify-content-center mb-3">
                            <div class="col-md-4">
                                <div class="card">
                                    <img class="card-img-top"
                                        src="{{ url(env('BANNER_IMAGES_UPLOAD_PATH') . $banner->image) }}" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-3">
                                <label for="primary_image"> انتخاب تصویر </label>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="banner_image">
                                    <label class="custom-file-label" for="banner_image"> انتخاب فایل </label>
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="title">عنوان</label>
                                <input class="form-control" id="title" name="title" type="text"
                                    value="{{ $banner->title }}">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="text">متن</label>
                                <input class="form-control" id="text" name="text" type="text"
                                    value="{{ $banner->text }}">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="priority">الویت</label>
                                <input class="form-control" id="priority" name="priority" type="number"
                                    value="{{ $banner->priority }}">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="is_active">وضعیت</label>
                                <select class="form-control" id="is_active" name="is_active">
                                    <option value="1" {{ $banner->getRawOriginal('status') == 1 ? 'selected' : '' }}>
                                        فعال</option>
                                    <option value="0" {{ $banner->getRawOriginal('status') == 0 ? 'selected' : '' }}>
                                        غیرفعال</option>
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="type">نوع بنر</label>
                                <input class="form-control" id="type" name="type" type="text"
                                    value="{{ $banner->type }}">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="button_text">متن دکمه</label>
                                <input class="form-control" id="button_text" name="button_text" type="text"
                                    value="{{ $banner->button_text }}">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="button_link">لینک دکمه</label>
                                <input class="form-control" id="button_link" name="button_link" type="text"
                                    value="{{ $banner->button_link }}">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="button_icon">آیکون دکمه</label>
                                <input class="form-control" id="button_icon" name="button_icon" type="text"
                                    value="{{ $banner->button_icon }}">
                            </div>


                        </div>

                        <button class="btn btn-outline-primary mt-5" type="submit">ثبت</button>
                        <a href="{{ route('admin.banners.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
                    </form>
                </div>

            </div>
        </div>

    </div>
@endsection
