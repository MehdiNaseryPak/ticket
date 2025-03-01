<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    @include('admin.layouts.head-tag')
    @yield('head-tag')
</head>
<body class="small-navigation">
@include('admin.layouts.navigation')
@include('admin.layouts.header')
<main class="main-content">
@yield('content')
</main>
@include('admin.layouts.script')
@yield('script')
</body>
</html>
