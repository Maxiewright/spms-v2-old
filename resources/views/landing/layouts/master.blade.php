<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content="@yield('meta_description', config('app.name'))">

    <meta name="author" content="@yield('meta_author', config('app.name'))">

    <title>@yield('title') - {{ config('app.name') }}</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
          rel="stylesheet" type="text/css"/>
    <!-- Third party plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css"
          rel="stylesheet"/>
    <!-- Core theme CSS (includes Bootstrap)-->

    <link href="{{asset('css/styles.css')}}" rel="stylesheet"/>
{{--    <link href="{{asset('css/landing.css')}}" rel="stylesheet"/>--}}
</head>

<body id="page-top">
<!-- Navigation-->
@include('landing.layouts.top-nav')

@yield('content')

@include('landing.layouts.footer')
<!-- Bootstrap core JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
<!-- Third party plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

<script src="{{asset('js/landing.js')}}"></script>
</body>
</html>
