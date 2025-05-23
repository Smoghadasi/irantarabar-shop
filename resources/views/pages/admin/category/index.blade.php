@extends('layouts.dashboard')
@section('content')
<!-- Content -->

<div class="card">
    <div class="card-header heading-color">
        <div class="d-flex flex-column text-center flex-md-row justify-content-md-between mb-4">
            <h5 class="font-weight-bold"> لیست دسته بندی ها ({{ $categories->total() }})</h5>
            <div>
                <a href="{{ route('admin.category.create') }}" class="btn btn-sm btn-outline-primary">ایجاد دسته بندی</a>
            </div>
        </div>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>نام</th>
                    <th>نام انگلیسی </th>
                    <th>والد</th>
                    <th>وضعیت</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @forelse ($categories as $key => $category)
                    <tr>
                        <td>
                            {{ $categories->firstItem() + $key }}
                        </td>
                        <td>
                            <a href="{{ route('admin.category.show', ['category' => $category->id]) }}">
                                {{ $category->name }} ({{ $category->numOfSubcategories }})
                            </a>

                        </td>
                        <td>
                            {{ $category->slug }}
                        </td>
                        <td>
                            @if ($category->parent_id == 0)
                                بدون والد
                            @else
                                {{ $category->parent->name }}
                            @endif
                        </td>
                        <td>
                            <span
                                class=" {{ $category->getRawOriginal('is_active') ? 'text-success' : 'text-danger' }}">
                                {{ $category->is_active }}
                            </span>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-outline-info mr-2"
                                href="{{ route('admin.category.edit', ['category' => $category->id]) }}">ویرایش</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center">
                            فیلد وجود ندارد.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-5">
            {{ $categories->render() }}
        </div>
    </div>
</div>
@endsection