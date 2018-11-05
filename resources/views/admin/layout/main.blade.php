<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title','Ratraco')</title>
    <link rel="shortcut icon" href="{{ asset('assets/admin/themes/images/favicon.png') }}" />
    @include('admin.layout.css')
</head>

<body>
<div class="container-scroller">
    @include('admin.layout.header')
    <div class="container-fluid page-body-wrapper">
        @include('admin.layout.sidebar')
        <div class="main-panel">
            <div class="content-wrapper">
                @yield('content')
            </div>
            @include('admin.layout.footer')
        </div>
    </div>
</div>
@include('admin.layout.js')
</body>

</html>