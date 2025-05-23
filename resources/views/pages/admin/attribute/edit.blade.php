@extends('layouts.dashboard')
@section('content')
<section class="content">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title pull-right">ویرایش گروه ویژگی {{ $attribute->title }}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <form method="post" action="{{ route('admin.attribute.update', $attribute) }}">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="name">عنوان</label>
                            <input type="text" name="title" class="form-control" value="{{ $attribute->title }}"
                                placeholder="عنوان گروه بندی ویژگی را وارد کنید...">
                        </div>
                        <div class="form-group">
                            <label for="meta_title">نوع</label>
                            <select name="type" id="" class="form-control">
                                <option value="select" @if ($attribute->type == 'select') selected @endif>لیست تکی
                                </option>
                                <option value="multiple" @if ($attribute->type == 'multiple') selected @endif>لیست چندتایی
                                </option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success pull-left">ذخیره</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection