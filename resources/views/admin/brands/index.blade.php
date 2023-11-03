@extends('admin.layouts.admin')

@section('title', 'مدیریت برند')

@section('content')
    {{--  <!-- head-conten -->  --}}
    <div class="head-content">
        <div class="title-content">فهرست برندها</div>
        <div class="create-btn">
            <a href="{{ route('admin.brands.create') }}">
                <span class="material-symbols-outlined">
                    add
                </span>
                ایجاد برند
            </a>
        </div>
    </div>

    {{--  <!-- horizontal line -->  --}}
    <hr>

    {{--  <!-- brands table -->  --}}
    <div class="table-wrapper">
        @if ($brands->isEmpty())
            <p>برندی وجود ندارد</p>
        @else
            <table class="list-items-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>نام</th>
                        <th>وضعیت</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($brands as $key => $brand)
                        <tr>
                            <td data-title="#">{{ $brands->firstItem() + $key }}</td>
                            <td data-title="نام">{{ $brand->name }}</td>
                            <td data-title="وضعیت" class="{{ $brand->getRawOriginal('is_active') ? 'active-status' : 'non-active-status' }}">{{ $brand->is_active }}</td>
                            <td data-title="عملیات">
                                <div class="item-operation">

                                    <a href="{{ route('admin.brands.show', $brand) }}">
                                        نمایش
                                    </a>

                                    <form action="{{ route('admin.brands.edit', $brand) }}" method="GET">
                                        <button type="submit" style="background:transparent;border:none; font-size: 1rem;">
                                            ویرایش
                                        </button>
                                    </form>

                                    {{--  <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST">
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
    {{ $brands->onEachSide(1)->links() }}

@endsection
