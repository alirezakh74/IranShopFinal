@extends('admin.layouts.admin')

@section('title', 'ایجاد ویژگی')

@section('content')
    {{--  <!-- head-conten -->  --}}
    <div class="head-content">
        <div class="title-content">ایجاد ویژگی</div>
    </div>

    {{--  <!-- horizontal line -->  --}}
    <hr>

    {{--  show errors if exist  --}}
    @include('admin.sections.errors')

    {{--  <!-- form for create brands -->  --}}
    <form class="item-create-form full-width" action="{{ route('admin.attributes.store') }}" method="POST">
        @csrf
        <div class="parent-flex-4 width-25">
            <div class="flex-column child-flex-4">
                <label for="name">نام</label>
                <input id="name" name="name" type="text">
            </div>
        </div>

        <div class="flex-row mt-10">
            <button class="form-submit-btn" type="submit">ثبت</button>
            <a class="form-btn" href="{{ route('admin.attributes.index') }}">بازگشت</a>
        </div>
    </form>
@endsection
