@extends('layouts.dashboard')

@section('title')
    ایجاد مرکز
@endsection
@section('script')
    <script src="{{ asset('assets-sneat/js/jquery.czMore-latest.js') }}"></script>
    <script>
        // show file name

        $('#primary_image').change(function() {
            // get the file name
            var fileName = $(this).val();
            // replace the "choose a file" label
            $(this).next('.custom-file-label').html(fileName);

        });

        // show file name
        $('#images').change(function() {
            // get the file name
            var fileName = $(this).val();
            // replace the "choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        });

        $('#attributesContainer').hide();

        $('#categorySelect').on('change', function() {
            let categoryId = $(this).val();

            $.get(`{{ url('/admin/category-attributes/${categoryId}') }}`, function(response,
                status) {
                if (status == 'success') {

                    $('#attributesContainer').fadeIn();

                    // Empty Attribute Container
                    $('#attributes').find('div').remove();
                    console.log(response);
                    // Create and Append Attributes Input
                    response.attributes.forEach(attribute => {
                        let attributeFormGroup = $('<div/>', {
                            class: 'form-group col-md-3'
                        });
                        attributeFormGroup.append($('<label/>', {
                            for: attribute.name,
                            text: attribute.name
                        }));

                        attributeFormGroup.append($('<input/>', {
                            type: 'text',
                            class: 'form-control',
                            id: attribute.name,
                            name: `attribute_ids[${attribute.id}]`
                        }));

                        $('#attributes').append(attributeFormGroup);

                    });

                    $('#variationName').text(response.variation.name);

                } else {
                    alert('مشکل در دریافت لیست ویژگی ها');
                }
            }).fail(function() {
                alert('مشکل در دریافت لیست ویژگی ها');
            })

            // console.log(categoryId);
        });

        $("#czContainer").czMore();
    </script>
@endsection

@section('content')
    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-5 bg-white">
            <div class="mb-4 text-center text-md-right">
                <h5 class="font-weight-bold"> ایجاد محصول </h5>
            </div>
            <hr>
            @include('partials.error')
            <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-3">
                        <label class="form-label" for="name">نام</label>
                        <input class="form-control" id="name" name="name" type="text"
                            value="{{ old('name') }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="brand_id">برند</label>
                        <select id="brandSelect" name="brand_id" class="form-control form-select" data-live-search="true">
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-3 ">
                        <label class="form-label" for="is_active">وضعیت</label>
                        <select class="form-control form-select" id="is_active" name="is_active">
                            <option value="1" selected>فعال</option>
                            <option value="0">غیر فعال</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="tag_ids">تگ</label>
                        <select id="tagSelect" name="tag_ids[]" class="form-control" multiple data-live-search="true">
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="fleet_ids">ناوگان</label>
                        <select id="fleetSelect" name="fleet_ids[]" class="form-control" multiple data-live-search="true">
                            @foreach ($fleets as $fleet)
                                <option value="{{ $fleet->id }}">{{ $fleet->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- <div class="form-group col-md-3 ">
                        <label class="form-label" for="owner_id">مالک</label>
                        <select id="owner_id" name="owner_id" class="form-control form-select">
                            @foreach ($owners as $owner)
                                <option value="{{ $owner->id }}">{{ $owner->name }} {{ $owner->lastName }}</option>
                            @endforeach
                        </select>
                    </div> --}}

                    <div class="form-group col-md-12">
                        <label class="form-label" for="description">توضیحات</label>
                        <textarea class="form-control" id="description" name="description" value="{{ old('description') }}"></textarea>
                    </div>

                    {{-- Product Image section --}}
                    <section id="pictures">
                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                                <p>تصاویر محصول : </p>
                            </div>

                            <div class="form-group col-md-3">
                                <label class="form-label" for="primary_image"> انتخاب تصویر اصلی</label>
                                <div class="custom-file">
                                    <input type="file" name="primary_image" class="custom-file-input" id="primary_image">
                                    <label class="custom-file-label" for="primary_image"> انتخاب فایل </label>

                                </div>

                            </div>

                            <div class="form-group col-md-3">
                                <label class="form-label" for="images"> انتخاب تصاویر </label>
                                <div class="custom-file">
                                    <input type="file" name="images[]" multiple class="custom-file-input" id="images">
                                    <label class="custom-file-label" for="images"> انتخاب فایل ها</label>

                                </div>
                            </div>
                        </div>

                    </section>

                    {{-- Category&Attribute Section --}}

                    <div class="col-md-12">
                        <hr>
                        <p> دسته بندی و خصوصیت ها : </p>
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label class="form-label" for="category_id"> دسته بندی </label>
                                <select id="categorySelect" name="category_id" class="form-control form-select"
                                    data-live-search="true">
                                    <option selected disabled>انتخاب کنید...</option>
                                    @foreach ($categories as $category)
                                        {{-- @if ($category->numOfSubcategories > 0) --}}
                                        <option value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>
                                        {{-- @endif --}}
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div id="attributesContainer" class="col-md-12">
                        <div id="attributes" class="row"></div>
                        <div class="col-md-12">
                            <hr>
                            <p>افزودن قیمت و موجودی برای متغیر <span class="font-weight-bold" id="variationName"></span> :
                            </p>
                        </div>

                        <div id="czContainer">
                            <div id="first">
                                <div class="recordset mb-3">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>نام</label>
                                            <input class="form-control" name="variation_values[value][]" type="text">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>قیمت</label>
                                            <input class="form-control" name="variation_values[price][]" type="text">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>تعداد</label>
                                            <input class="form-control" name="variation_values[quantity][]" type="text">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>شناسه انبار</label>
                                            <input class="form-control" name="variation_values[sku][]" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="delivery_amount">هزینه ارسال</label>
                        <input class="form-control" id="delivery_amount" name="delivery_amount" type="text"
                            value="{{ old('delivery_amount') }}">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="delivery_amount_per_product">هزینه ارسال به ازای محصول اضافی</label>
                        <input class="form-control" id="delivery_amount_per_product" name="delivery_amount_per_product"
                            type="text" value="{{ old('delivery_amount_per_product') }}">
                    </div>
                </div>
                <button class="btn btn-outline-primary mt-5" type="submit">ثبت</button>
                <a href="{{ route('admin.product.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
            </form>
        </div>
    </div>
@endsection
