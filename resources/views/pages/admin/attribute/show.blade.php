@extends('layouts.dashboard')
@section('content')
<section class="content">
    <div class="card">
        <div class="card-header heading-color">
            <div class="d-flex flex-column text-center flex-md-row justify-content-md-between mb-4">
                <h5 class="font-weight-bold"> گروه ویژگی: {{ $attribute->name }} </h5>
                <div>
                    <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasEnd" aria-controls="offcanvasEnd">
                        ایجاد مقدار ویژگی
                    </button>
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd"
                        aria-labelledby="offcanvasEndLabel">
                        <div class="offcanvas-header">
                            <h5 id="offcanvasEndLabel" class="offcanvas-title">ایجاد ویژگی</h5>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                            <form action="{{ route('admin.attributeValue.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="name">مقدار</label>
                                    <input type="text" name="title" class="form-control" id="title" required
                                        placeholder="مقدار">
                                </div>
                                <input type="hidden" value="{{ $attribute->id }}" name="attribute_id">
                                <button type="submit" class="btn btn-primary">ارسال</button>
                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">
                                    بستن
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">عنوان</label>
                        <input disabled type="text" name="title" class="form-control"
                            value="{{ $attribute->name }}" placeholder="عنوان گروه بندی ویژگی را وارد کنید...">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="meta_title">نوع</label>
                        <select disabled name="type" id="" class="form-control">
                            <option value="select" @if ($attribute->type == 'select') selected @endif>لیست تکی
                            </option>
                            <option value="multiple" @if ($attribute->type == 'multiple') selected @endif>لیست چندتایی
                            </option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>عنوان</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($attributeValues as $key => $attributeValue)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $attributeValue->title }}
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-outline-info mr-2" type="button"
                                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasEnd-{{ $key }}"
                                        aria-controls="offcanvasEnd">
                                        ویرایش
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-danger mr-2"
                                        data-bs-toggle="modal" data-bs-target="#modalCenter-{{ $key }}">
                                        حذف
                                    </button>

                                    <div class="offcanvas offcanvas-end" tabindex="-1"
                                        id="offcanvasEnd-{{ $key }}" aria-labelledby="offcanvasEndLabel">
                                        <div class="offcanvas-header">
                                            <h5 id="offcanvasEndLabel" class="offcanvas-title">ویرایش ویژگی</h5>
                                            <button type="button" class="btn-close text-reset"
                                                data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                        </div>
                                        <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                                            <form action="{{ route('admin.attributeValue.update', $attributeValue) }}"
                                                method="POST">
                                                @method('PUT')
                                                @csrf
                                                <div class="mb-3">
                                                    <label class="form-label" for="title">نام</label>
                                                    <input type="text" name="title"
                                                        value="{{ $attributeValue->title }}" class="form-control"
                                                        id="title" required placeholder="مقدار">
                                                </div>

                                                <button type="submit" class="btn btn-primary">ویرایش</button>
                                                <button type="button" class="btn btn-label-secondary"
                                                    data-bs-dismiss="offcanvas">
                                                    بستن
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- delete item -->
                                    <div class="modal fade" id="modalCenter-{{ $key }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title secondary-font" id="modalCenterTitle">
                                                        حذف ویژگی
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body lh-2">آیا
                                                    <span class="fw-bold">{{ $attributeValue->title }}</span>
                                                    مورد نظر حذف شود؟
                                                </div>
                                                <div class="modal-footer">
                                                    <form
                                                        action="{{ route('admin.attributeValue.destroy', $attributeValue) }}"
                                                        method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">حذف</button>
                                                    </form>
                                                    <button type="button" class="btn btn-label-secondary"
                                                        data-bs-dismiss="modal">
                                                        بستن
                                                    </button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">
                                    فیلد وجود ندارد.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>

        </div>
    </div>
</section>
@endsection