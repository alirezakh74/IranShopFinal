@extends('admin.layouts.admin')

@section('title', 'مدیریت دسته بندی')

@section('content')
    {{--  <!-- head-conten -->  --}}
    <div class="head-content">
        <div class="title-content">فهرست دسته بندی ها ({{ $categories->total() }})</div>
        <div class="create-btn">
            <a href="{{ route('admin.categories.create') }}">
                <span class="material-symbols-outlined">
                    add
                </span>
                ایجاد دسته بندی
            </a>
        </div>
    </div>

    {{--  <!-- horizontal line -->  --}}
    <hr>

    {{--  <!-- categories table -->  --}}
    <div class="table-wrapper">
        @if ($categories->isEmpty())
            <p>دسته بندی ای وجود ندارد</p>
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

                    @foreach ($categories as $key => $brand)
                        <tr>
                            <td data-title="#">{{ $categories->firstItem() + $key }}</td>
                            <td data-title="نام">{{ $brand->name }}</td>
                            <td data-title="وضعیت" class="{{ $brand->getRawOriginal('is_active') ? 'active-status' : 'non-active-status' }}">{{ $brand->is_active }}</td>
                            <td data-title="عملیات">
                                <div class="item-operation">

                                    <a href="{{ route('admin.categories.show', $brand) }}">
                                        نمایش
                                    </a>

                                    <form action="{{ route('admin.categories.edit', $brand) }}" method="GET">
                                        <button type="submit" style="background:transparent;border:none; font-size: 1rem;">
                                            ویرایش
                                        </button>
                                    </form>

                                    {{--  <form action="{{ route('admin.categories.destroy', $brand->id) }}" method="POST">
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
    {{ $categories->onEachSide(1)->links() }}

@endsection
