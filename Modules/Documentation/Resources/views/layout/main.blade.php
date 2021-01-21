@extends('documentation::layout/base')

@section('body')
    <body class="app" x-data="{ 'showModal': false }" @keydown.escape="showModal = false" x-cloak>
        @yield('content')
        @include('documentation::layout.components.dark-mode-switcher')

        <script src="{{ asset('dist/js/app.js') }}"></script>
        <!-- END: JS Assets-->
        @yield('script')
    </body>
@endsection
