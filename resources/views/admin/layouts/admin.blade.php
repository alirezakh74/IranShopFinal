<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="admin panel to manage store">
  <meta name="author" content="Alireza Khodabande">

  <!--  Essential META Tags -->
  <meta property="og:site_name" content="Iran-Shop" />
  <meta property="og:title" content="Dashboard for manage products and orders...">
  <meta property="og:type" content="website" />
  <meta property="og:image" content="https://joinweb.ir/templates/shop/assets/images/dash.png">
  <meta property="og:url" content="https://joinweb.ir/templates/shop/dashboard.html">

  <!--  Non-Essential, But Recommended -->
  <meta property="og:description" content="admin panel to manage store">

  <title>پنل مدیریت - @yield('title')</title>
  <link rel="stylesheet" href="{{ asset('assets/css/dashboard-global.css') }}" />
  <link rel="stylesheet" media="only screen and (min-width: 769px)" href="{{ asset('assets/css/dashboard-desktop.css') }}" />
  <link rel="stylesheet" media="only screen and (min-width: 601px) and (max-width: 768px)"
    href="{{ asset('assets/css/dashboard-tablet.css') }}" />
  <link rel="stylesheet" media="only screen and (max-width: 600px)" href="{{ asset('assets/css/dashboard-mobile.css') }}" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>

<body dir="rtl" lang="fa">
  <div class="container">

    {{--  sidebar section  --}}
    @include('admin.sections.sidebar')

    <div class="header-content-wrapper">

      {{--  topbar header   --}}
      @include('admin.sections.topbar')

      <div class="content">
        @yield('content')
      </div>

    </div>
  </div>

  @include('sweetalert::alert')
  <script src="{{ asset('assets/js/dashboard.js') }}"></script>
</body>

</html>
