<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ $dark_mode ? 'dark' : '' }}">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <link href="" rel="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Serviceperson Management System">
    <meta name="keywords" content="HRIS Military Servicepeople">
    <meta name="author" content="Maxie Wright">

    @yield('head')
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{asset('dist/css/ttr_theme.css')}}">
    <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}" />
    @livewireStyles
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

@yield('body')

</html>
