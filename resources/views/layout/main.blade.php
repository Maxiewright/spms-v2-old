@extends('layout.base')

@section('body')
    <body class="app">
        @yield('content')
{{--        @include('../layout/components/dark-mode-switcher')--}}

        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBG7gNHAhDzgYmq4-EHvM4bqW1DNj2UCuk&libraries=places"></script>
        <script src="{{ asset('dist/js/app.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <!-- END: JS Assets-->

        @yield('script')
        @stack('modals')

        @livewireScripts

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            const SwalModal = (icon, title, html) => {
                Swal.fire({
                    icon,
                    title,
                    html
                })
            }

            const SwalConfirm = (icon, title, html, confirmButtonText, method, params, callback) => {
                Swal.fire({
                    icon,
                    title,
                    html,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText,
                    reverseButtons: true,
                }).then(result => {
                    if (result.value) {
                        return livewire.emit(method, params)
                    }

                    if (callback) {
                        return livewire.emit(callback)
                    }
                })
            }

            const SwalAlert = (icon, title, timeout = 7000) => {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: timeout,
                    onOpen: toast => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon,
                    title
                })
            }

            document.addEventListener('DOMContentLoaded', () => {
                this.livewire.on('swal:modal', data => {
                    SwalModal(data.icon, data.title, data.text)
                })

                this.livewire.on('swal:confirm', data => {
                    SwalConfirm(data.icon, data.title, data.text, data.confirmText, data.method, data.params, data.callback)
                })

                this.livewire.on('swal:alert', data => {
                    SwalAlert(data.icon, data.title, data.timeout)
                })
            })
        </script>
    </body>
@endsection
