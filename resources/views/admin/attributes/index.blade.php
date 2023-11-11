@extends('admin.layouts.admin')

@section('title', 'مدیریت ویژگی')

@section('content')
    {{--  <!-- head-conten -->  --}}
    <div class="head-content">
        <div class="title-content">فهرست ویژگی ها ({{ $attributes->total() }})</div>
        <div class="create-btn">
            <a href="{{ route('admin.attributes.create') }}">
                <span class="material-symbols-outlined">
                    add
                </span>
                ایجاد ویژگی
            </a>
        </div>
    </div>

    {{--  <!-- horizontal line -->  --}}
    <hr>

    {{--  <!-- attributes table -->  --}}
    <div class="table-wrapper">
        @if ($attributes->isEmpty())
            <p>ویژگی ای وجود ندارد</p>
        @else
            <table class="list-items-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>نام</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($attributes as $key => $attribute)
                        <tr>
                            <td data-title="#">{{ $attributes->firstItem() + $key }}</td>
                            <td data-title="نام">{{ $attribute->name }}</td>
                            <td data-title="عملیات">
                                <div class="item-operation">

                                    <a href="{{ route('admin.attributes.show', $attribute) }}">
                                        نمایش
                                    </a>

                                    <form action="{{ route('admin.attributes.edit', $attribute) }}" method="GET">
                                        <button type="submit" style="background:transparent;border:none; font-size: 1rem;">
                                            ویرایش
                                        </button>
                                    </form>

                                    {{--  <form action="{{ route('admin.attributes.destroy', $attribute->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button title="حذف" style="background:transparent;border:none;">
                                            <span class="material-symbols-outlined">
                                                delete
                                            </span>
                                        </button>
                                    </form>  --}}

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    {{--  paginate section  --}}
    {{ $attributes->onEachSide(1)->links() }}

@endsection
