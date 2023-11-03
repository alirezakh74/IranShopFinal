@extends('admin.layouts.admin')

@section('title', 'نمایش برند')

@section('content')
    {{--  <!-- head-conten -->  --}}
    <div class="head-content">
        <div class="title-content">نمایش برند: {{ $brand->name }}</div>
    </div>

    {{--  <!-- horizontal line -->  --}}
    <hr>

    {{--  show errors if exist  --}}
    @include('admin.sections.errors')

    {{--  <!-- show brand -->  --}}
    <div class="full-width">

        <div class="parent-flex-4">
            <div class="flex-column child-flex-4">
                <label for="brand_name">نام</label>
                <input id="brand_name" type="text" value="{{ $brand->name }}" disabled>
            </div>
            <div class="flex-column child-flex-4">
                <label for="is_active">وضعیت</label>
                <input id="is_active" type="text" value="{{ $brand->is_active }}" disabled></input>
            </div>
            <div class="flex-column child-flex-4">
                <label for="create_at_date">تاریخ ایجاد</label>
                <input id="create_at_date" type="text" value="{{ implode(' ',array_reverse(explode(' ',verta($brand->created_at)->formatJalaliDatetime()))) }}" disabled>
            </div>
        </div>

        <div class="flex-row mt-10">
            <a class="form-btn" href="{{ route('admin.brands.index') }}">بازگشت</a>
        </div>
    </div>
@endsection
