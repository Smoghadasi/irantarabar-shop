@extends('layouts.dashboard')
@section('content')

    <div class="card">
        <div class="card-header heading-color">
            <div class="d-flex flex-column text-center flex-md-row justify-content-md-between mb-4">
                <h5 class="font-weight-bold"> لیست برند ها ({{ $brands->total() }})</h5>
                <div>
                    <button class="btn btn-sm btn-outline-primary" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasEnd" aria-controls="offcanvasEnd">
                        ایجاد برند
                    </button>
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd"
                        aria-labelledby="offcanvasEndLabel">
                        <div class="offcanvas-header">
                            <h5 id="offcanvasEndLabel" class="offcanvas-title">ایجاد برند</h5>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                            <form action="{{ route('admin.brand.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="name">نام</label>
                                    <input type="text" name="name" class="form-control" id="name" required
                                        placeholder="نام">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="is_active">وضعیت</label>
                                    <select id="is_active" name="is_active" class="select2 form-select"
                                        data-allow-clear="true">
                                        <option value="1" selected>فعال</option>
                                        <option value="0">غیر فعال</option>
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
                        <th>نام</th>
                        <th>وضعیت</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($brands as $key => $brand)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $brand->name }}
                            </td>
                            <td>
                                <span class=" {{ $brand->getRawOriginal('is_active') ? 'text-success' : 'text-danger' }}">
                                    {{ $brand->is_active }}
                                </span>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-outline-info mr-2" type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasEnd-{{ $key }}" aria-controls="offcanvasEnd">
                                    ویرایش
                                </button>
                                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd-{{ $key }}"
                                    aria-labelledby="offcanvasEndLabel">
                                    <div class="offcanvas-header">
                                        <h5 id="offcanvasEndLabel" class="offcanvas-title">ویرایش برند</h5>
                                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body my-auto mx-0 flex-grow-0">
                                        <form action="{{ route('admin.brand.update', $brand) }}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label" for="name">نام</label>
                                                <input type="text" name="name" value="{{ $brand->name }}"
                                                    class="form-control" id="name" required placeholder="نام">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="is_active">کشور</label>
                                                <select id="is_active" name="is_active" class="select2 form-select"
                                                    data-allow-clear="true">
                                                    <option value="1" {{ $brand->is_active == 1 ? 'selected' : '' }}>
                                                        فعال</option>
                                                    <option value="0" {{ $brand->is_active == 0 ? 'selected' : '' }}>
                                                        غیر فعال</option>
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
                {{ $brands->render() }}
            </div>
        </div>
    </div>
@endsection
