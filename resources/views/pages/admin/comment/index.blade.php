@extends('layouts.dashboard')

@section('title')
    index comments
@endsection

@section('content')

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-md-12 mb-4 p-4 bg-white">
            <div class="d-flex flex-column text-center flex-md-row justify-content-md-between mb-4">
                <h5 class="font-weight-bold mb-3 mb-md-0">لیست برند ها ({{ $comments->total() }})</h5>
                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.comments.create') }}">
                    <i class="fa fa-plus"></i>
                    ایجاد برند
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>کاربر</th>
                            <th>محصول</th>
                            <th>متن</th>
                            <th>وضعیت</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $key => $comment)
                            <tr>
                                <th>
                                    {{ $comments->firstItem() + $key }}
                                </th>
                                <th>
                                    {{ $comment->user->name }} {{ $comment->user->lastName }}
                                </th>
                                <th>
                                    <a href="{{ route('admin.product.show', $comment->product_id) }}">{{ $comment->product->name }}</a>
                                </th>
                                <th>
                                    {{ $comment->text }}
                                </th>
                                <th>
                                    {{ $comment->approved }}
                                </th>
                                <th>
                                    <a class="btn btn-sm btn-outline-success"
                                        href="{{ route('admin.comments.change-approve', ['comment' => $comment->id]) }}">تغییر وضعیت</a>
                                    {{-- <a class="btn btn-sm btn-outline-info mr-3"
                                        href="{{ route('admin.comments.edit', ['comment' => $comment->id]) }}">ویرایش</a> --}}
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $comments->render() }}
            </div>
        </div>
    </div>
@endsection
