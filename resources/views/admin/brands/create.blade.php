@extends('admin.layouts.admin')

@section('title', 'ایجاد برند')

@section('content')
    {{--  <!-- head-conten -->  --}}
    <div class="head-content">
        <div class="title-content">ایجاد برند</div>
    </div>

    {{--  <!-- horizontal line -->  --}}
    <hr>

    {{--  show errors if exist  --}}
    @include('admin.sections.errors')

    {{--  <!-- form for create brands -->  --}}
    <form class="item-create-form full-width" action="{{ route('admin.brands.store') }}" method="POST">
        @csrf
        <div class="parent-flex-4">
            <div class="flex-column child-flex-4">
                <label for="brand_name">نام</label>
                <input id="brand_name" name="brand_name" type="text">
            </div>
            <div class="flex-column child-flex-4">
                <label for="is_active">وضعیت</label>
                <select name="is_active" id="is_active">
                    <option value="1" selected>فعال</option>
                    <option value="0">غیر فعال</option>
                </select>
            </div>
        </div>

        <div class="flex-row mt-10">
            <button class="form-submit-btn" type="submit">ثبت</button>
            <a class="form-btn" href="{{ route('admin.brands.index') }}">بازگشت</a>
        </div>
    </form>
@endsection
