@extends('layouts.dashboard')
@section('content')
<div class="card">
    <div class="card-header heading-color">
        <div class="d-flex flex-column text-center flex-md-row justify-content-md-between mb-4">
            <h5 class="font-weight-bold"> لیست ویژگی ها ({{ $attributes->total() }})</h5>
            <div>
                <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasEnd" aria-controls="offcanvasEnd">
                    ایجاد ویژگی
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd"
                    aria-labelledby="offcanvasEndLabel">
                    <div class="offcanvas-header">
                        <h5 id="offcanvasEndLabel" class="offcanvas-title">ایجاد ویژگی</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                        <form action="{{ route('admin.attribute.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="name">نام</label>
                                <input type="text" name="name" class="form-control" id="name" required
                                    placeholder="نام">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="type">نوع</label>
                                <select name="type" id="" class="form-control">
                                    <option value="select">لیست تکی</option>
                                    <option value="multiple">لیست چندتایی</option>
                                </select>
                            </div>
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
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>عنوان</th>
                    <th>نوع</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @forelse ($attributes as $key => $attribute)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            <a href="{{ route('admin.attribute.show', $attribute) }}">{{ $attribute->name }} {{ '(' . $attribute->attribute_values_count . ')' }}</a>
                        </td>
                        <td>{{ $attribute->type }}</td>
                        <td>
                            <button class="btn btn-sm btn-outline-info mr-2" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasEnd-{{ $key }}" aria-controls="offcanvasEnd">
                                ویرایش
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-danger mr-2" data-bs-toggle="modal"
                                data-bs-target="#modalCenter-{{ $key }}">
                                حذف
                            </button>
                            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd-{{ $key }}"
                                aria-labelledby="offcanvasEndLabel">
                                <div class="offcanvas-header">
                                    <h5 id="offcanvasEndLabel" class="offcanvas-title">ویرایش ویژگی</h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                                    <form action="{{ route('admin.attribute.update', $attribute) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label" for="name">نام</label>
                                            <input type="text" name="name" value="{{ $attribute->name }}"
                                                class="form-control" id="name" required placeholder="نام">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="type">نوع</label>
                                            <select name="type" id="" class="form-control">
                                                <option value="select"
                                                    @if ($attribute->type == 'select') selected @endif>لیست تکی
                                                </option>
                                                <option value="multiple"
                                                    @if ($attribute->type == 'multiple') selected @endif>لیست چندتایی
                                                </option>
                                            </select>
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
                                            <span class="fw-bold">{{ $attribute->name }}</span>
                                            مورد نظر حذف شود؟
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('admin.attribute.destroy', $attribute) }}"
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
        <div class="d-flex justify-content-center mt-5">
            {{ $attributes->render() }}
        </div>
    </div>
</div>
@endsection