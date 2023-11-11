@extends('admin.layouts.admin')

@section('title', 'نمایش ویژگی')

@section('content')
    {{--  <!-- head-conten -->  --}}
    <div class="head-content">
        <div class="title-content">نمایش ویژگی: {{ $attribute->name }}</div>
    </div>

    {{--  <!-- horizontal line -->  --}}
    <hr>

    {{--  <!-- show attribute -->  --}}
    <div class="full-width">

        <div class="parent-flex-4">
            <div class="flex-column child-flex-4">
                <label for="name">نام</label>
                <input id="name" type="text" value="{{ $attribute->name }}" disabled>
            </div>
            <div class="flex-column child-flex-4">
                <label for="create_at_date">تاریخ ایجاد</label>
                <input id="create_at_date" type="text" value="{{ verta($attribute->created_at)->format('H:i:s %d %B %Y') }}" disabled>
            </div>
        </div>

        <div class="flex-row mt-10">
            <a class="form-btn" href="{{ route('admin.attributes.index') }}">بازگشت</a>
        </div>
    </div>
@endsection
