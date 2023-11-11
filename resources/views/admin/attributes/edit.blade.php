@extends('admin.layouts.admin')

@section('title', 'ویرایش ویژگی')

@section('content')
    {{--  <!-- head-conten -->  --}}
    <div class="head-content">
        <div class="title-content">ویراش ویژگی: {{ $attribute->name }}</div>
    </div>

    {{--  <!-- horizontal line -->  --}}
    <hr>

    {{--  show errors if exist  --}}
    @include('admin.sections.errors')

    {{--  <!-- form for create attributes -->  --}}
    <form class="item-create-form full-width" action="{{ route('admin.attributes.update', ['attribute' => $attribute->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="parent-flex-4 width-25">
            <div class="flex-column child-flex-4">
                <label for="name">نام</label>
                <input id="name" name="name" type="text" value="{{ $attribute->name }}">
            </div>
        </div>

        <div class="flex-row mt-10">
            <button class="form-submit-btn" type="submit">ثبت</button>
            <a class="form-btn" href="{{ route('admin.attributes.index') }}">بازگشت</a>
        </div>
    </form>
@endsection
