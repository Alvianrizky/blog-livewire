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
    <script type="text/javascript" src="{{asset('assets/jquery/jquery.min.js') }}"></script>
    @stack('styles')
</head>

<body id="page-top">

    @include('livewire.components.header')
    @include('livewire.components.toast')

    <main class="d-flex flex-column" style="min-height: 70vh !important">
        {{$slot}}
    </main>

    @include('livewire.components.footer')

    @livewireScripts


    <script type="text/javascript" src="{{asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('assets/counterup/jquery.waypoints.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('assets/counterup/jquery.counterup.js') }}"></script>

    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script> --}}

    @stack('modals')


    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false" data-turbo-eval="false"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(5000, function(){
                    $(this).remove();
                });
            }, 5000);

            $('select').select2({
                theme: "bootstrap-5",
            });
        });
    </script>

    @stack('scripts')

</body>

</html>
