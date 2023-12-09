<!DOCTYPE html>
<html lang="ar" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title> @yield('title', 'LawyerSystem')</title>
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('dashboardAssets/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboardAssets/css/bootstrap.min.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('dashboardAssets/css/fontawesome.min.css') }}" /> --}}
    <link rel="stylesheet" href="{{ asset('dashboardAssets/css/bootstrap-select.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dashboardAssets/main-scss/main.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('dashboardAssets/css/responsive.css') }}" />
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5/dist/sweetalert2.min.css"> -->
    <!-- responsive -->

    @yield('css')


    <!-- ? Favicon -->
    <link rel="icon" href="{{ asset('dashboardAssets/image/logo.png') }}" type="image" />
    <!-- ? Favicon -->
</head>
