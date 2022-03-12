<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Styles -->
    {{-- <link rel="stylesheet" href="https://assets.website-files.com/61eb2514f01c7b377af34831/css/posh-tech.webflow.8fc9d99d4.css"> --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/animate/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/ionicons/css/ionicons.min.css') }}">


    @livewireStyles

    <!-- Scripts -->

    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body id="page-top">

    <main>
        {{$slot}}
    </main>

    @livewireScripts

    <script type="text/javascript" src="{{asset('assets/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('assets/counterup/jquery.waypoints.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('assets/counterup/jquery.counterup.js') }}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}

    @stack('modals')


    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false" data-turbo-eval="false"></script>


    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            showCloseButton: true,
            timer: 5000,
            timerProgressBar:true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        window.addEventListener('alert',({detail:{type,message}})=>{
            Toast.fire({
                icon:type,
                title:message
            })
        })
    </script>


    {{-- <script>
    window.addEventListener('alert', event => {
        toastr[event.detail.type](event.detail.message,
        event.detail.title ?? ''),
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
        }
    });
    </script> --}}

    @stack('scripts')

</body>

</html>
