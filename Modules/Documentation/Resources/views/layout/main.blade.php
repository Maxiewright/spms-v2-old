@extends('documentation::layout/base')

@section('body')
    <body class="app">
        @yield('content')
        @include('documentation::layout.components.dark-mode-switcher')

        <script src="{{ asset('dist/js/app.js') }}"></script>
        <!-- END: JS Assets-->
        @yield('script')
    </body>
@endsection
