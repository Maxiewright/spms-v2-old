@extends('layout.base')

@section('body')
    <body class="app">
        @yield('content')
{{--        @include('../layout/components/dark-mode-switcher')--}}
        @stack('modals')
        <!-- BEGIN: JS Assets-->
{{--        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>--}}
{{--        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBG7gNHAhDzgYmq4-EHvM4bqW1DNj2UCuk&libraries=places"></script>--}}
        <script src="{{ asset('dist/js/app.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <!-- END: JS Assets-->
        @yield('script')
        @livewireScripts
        @stack('livewire-scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="{{asset('js/livewireSweetAlert.js')}}"></script>
    </body>
@endsection
