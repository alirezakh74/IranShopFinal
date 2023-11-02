@extends('admin.layouts.admin')

@section('title', 'داشبورد')

@section('content')
    {{--  <!-- head-content -->  --}}
    <div class="head-content">
        <div class="title-content">داشبورد</div>
        <div class="report-btn">
            <a href="#">
                <span class="material-symbols-outlined">
                    download
                </span>
                گزارش
            </a>
        </div>
    </div>

    {{--  <!-- horizontal line -->  --}}
    <hr>

    {{--  <!-- cards -->  --}}
    <div class="cards-wrapper">

        {{--  <!-- card 1 -->  --}}
        <div class="card">
            <div class="card-right-part">
                <div class="card-title">پرداخت ها</div>
                <div class="card-value">40,000 تومان</div>
            </div>
            <div class="card-left-part">
                <span class="material-symbols-outlined">
                    calendar_today
                </span>
            </div>
        </div>

        {{--  <!-- card 2 -->  --}}
        <div class="card">
            <div class="card-right-part">
                <div class="card-title">سود خالص</div>
                <div class="card-value">20,000 تومان</div>
            </div>
            <div class="card-left-part">
                <span class="material-symbols-outlined">
                    attach_money
                </span>
            </div>
        </div>

        {{--  <!-- card 3 -->  --}}
        <div class="card">
            <div class="card-right-part">
                <div class="card-title">برندها</div>
                <div class="card-value">{{ $brandNums }}</div>
            </div>
            <div class="card-left-part">
                <span class="material-symbols-outlined">
                    assignment
                </span>
            </div>
        </div>

        {{--  <!-- card 4 -->  --}}
        <div class="card">
            <div class="card-right-part">
                <div class="card-title">کامنت ها</div>
                <div class="card-value">15</div>
            </div>
            <div class="card-left-part">
                <span class="material-symbols-outlined">
                    comment
                </span>
            </div>
        </div>

    </div>
@endsection
