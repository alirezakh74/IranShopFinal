@extends('admin.layouts.admin')

@section('title', 'ایجاد دسته بندی')

@section('script')
    <script>

        let allAttributes = {!! json_encode($attributes->toArray()) !!};
        let selectedAttributes = [];

        VirtualSelect.init({
            ele: '#attributes_id',
            options: [
                @foreach ($attributes as $attribute)
                    { label: '{{ $attribute->name }}' , value: '{{ $attribute->id }}' },
                @endforeach
            ],
            search: true,
            multiple: true,
            tooltipAlignment: 'right',
            textDirection: 'rtl',
            placeholder: 'انتخاب ویژگی',
            noOptionsText: 'چیزی یافت نشد',
            noSearchResultsText: 'نتیجه ای یافت نشد',
            selectAllText: 'انتخاب همه',
            searchPlaceholderText: 'جستجو',
            optionsSelectedText: 'گزینه انتخاب شده',
            optionSelectedText: 'گزینه انتخاب شده',
            allOptionsSelectedText: 'همه',
            clearButtonText: 'پاک کن',
            moreText: 'بیشتر...',
          });

        VirtualSelect.init({
            ele: '#filterable_attributes_id',
            options: [
            ],
            search: true,
            multiple: true,
            tooltipAlignment: 'right',
            textDirection: 'rtl',
            placeholder: 'انتخاب ویژگی',
            noOptionsText: 'چیزی یافت نشد',
            noSearchResultsText: 'نتیجه ای یافت نشد',
            selectAllText: 'انتخاب همه',
            searchPlaceholderText: 'جستجو',
            optionsSelectedText: 'گزینه انتخاب شده',
            optionSelectedText: 'گزینه انتخاب شده',
            allOptionsSelectedText: 'همه',
            clearButtonText: 'پاک کن',
            moreText: 'بیشتر...',
          });

        VirtualSelect.init({
            ele: '#variation_id',
            options: [
            ],
            search: true,
            multiple: false,
            tooltipAlignment: 'right',
            textDirection: 'rtl',
            placeholder: 'انتخاب ویژگی',
            noOptionsText: 'چیزی یافت نشد',
            noSearchResultsText: 'نتیجه ای یافت نشد',
            selectAllText: 'انتخاب همه',
            searchPlaceholderText: 'جستجو',
            optionsSelectedText: 'گزینه انتخاب شده',
            optionSelectedText: 'گزینه انتخاب شده',
            allOptionsSelectedText: 'همه',
            clearButtonText: 'پاک کن',
            moreText: 'بیشتر...',
          });

          document.querySelector('#attributes_id').addEventListener('change', function() {

            //clear selectedAttributes
            selectedAttributes = [];
            for(var index in allAttributes)
            {
                if(this.value.includes(String(allAttributes[index].id)))
                {
                    let currentAttribute = { label: allAttributes[index].name, value: allAttributes[index].id};
                    selectedAttributes.push(currentAttribute);
                }
            }

            document.querySelector('#filterable_attributes_id').setOptions(selectedAttributes);
            document.querySelector('#variation_id').setOptions(selectedAttributes);
            //console.log(this.value);
          });
    </script>
@endsection

@section('content')
    {{--  <!-- head-conten -->  --}}
    <div class="head-content">
        <div class="title-content">ایجاد دسته بندی</div>
    </div>

    {{--  <!-- horizontal line -->  --}}
    <hr>

    {{--  show errors if exist  --}}
    @include('admin.sections.errors')

    {{--  <!-- form for create brands -->  --}}
    <form class="item-create-form full-width" action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="parent-flex-4">

            <div class="flex-column child-flex-4">
                <label for="name">نام</label>
                <input id="name" name="name" type="text">
            </div>

            <div class="flex-column child-flex-4">
                <label for="slug">نام انگلیسی</label>
                <input id="slug" name="slug" type="text">
            </div>

            <div class="flex-column child-flex-4">
                <label for="parent">والد</label>
                <select name="parent" id="parent">
                    <option value="0" selected>بدون والد</option>
                    <option value="1">والد 1</option>
                </select>
            </div>

            <div class="flex-column child-flex-4">
                <label for="is_active">وضعیت</label>
                <select name="is_active" id="is_active">
                    <option value="1" selected>فعال</option>
                    <option value="0">غیر فعال</option>
                </select>
            </div>

            <div class="flex-column child-flex-4">
                <label for="attributes_id">ویژگی ها</label>
                <div name="attributes_id[]" id="attributes_id" multiple>
                </div>
            </div>

            <div class="flex-column child-flex-4">
                <label for="filterable_attributes_id">انتخاب ویژگی های قابل فیلتر</label>
                <div name="filterable_attributes_id[]" id="filterable_attributes_id" multiple>
                </div>
            </div>

            <div class="flex-column child-flex-4">
                <label for="variation_id">انتخاب ویژگی متغیر</label>
                <div name="variation_id" id="variation_id">
                </div>
            </div>

            <div class="flex-column child-flex-4">
                <label for="icon">آیکون</label>
                <input id="icon" name="icon" type="text" disabled>
            </div>

            <div class="flex-column child-flex-4">
                <label for="comment">توضیحات</label>
                <textarea style="padding: 5px;" name="comment" id="comment" cols="30" rows="5"></textarea>
            </div>

        </div>

        <div class="flex-row mt-10">
            <button class="form-submit-btn" type="submit">ثبت</button>
            <a class="form-btn" href="{{ route('admin.categories.index') }}">بازگشت</a>
        </div>
    </form>
@endsection
