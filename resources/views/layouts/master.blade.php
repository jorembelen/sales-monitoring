<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template">
    <meta name="author" content="Bootlab">

    <title>ViVogue | @yield('title')</title>

    <link rel="canonical" href="pages-blank.html" />
    <link rel="shortcut icon" href="img/favicon.ico">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">

    <link href="{{ asset('assets/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">

    <!-- BEGIN SETTINGS -->
    <!-- Remove this after purchasing -->
    <link class="js-stylesheet" href="{{ asset('assets/css/light.css') }}" rel="stylesheet">

    @livewireStyles
</head>

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
    <div class="wrapper">

        @include('layouts.includes.sidebar')

        <div class="main">

            @include('layouts.includes.navbar')

            <main class="content">
                <div class="container-fluid p-0">

                    <h1 class="h3 mb-3">@yield('title')</h1>

                    @yield('content')


                </div>
            </main>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-left">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#">Support</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#">Help Center</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#">Privacy</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#">Terms of Service</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-6 text-right">
                            <p class="mb-0">
                                &copy; 2020 - <a href="/" class="text-muted">AppStack</a>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>


        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Datatables Responsive
            $("#datatables-reponsive").DataTable({
                responsive: true
            });
        });
    </script>

    <script src="{{ asset('assets/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/flatpickr/custom-flatpickr.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    @include('scripts.sweet-alert')
    @stack('services-js')


    @livewireScripts
</body>


</html>
