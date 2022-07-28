<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>ViVogue|Login</title>

    <link rel="canonical" href="pages-sign-in.html" />
    <link rel="shortcut icon" href="img/favicon.ico">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&amp;display=swap" rel="stylesheet">

    <!-- Remove this after purchasing -->
    <link class="js-stylesheet" href="{{ asset('assets/css/light.css') }}" rel="stylesheet">

    @livewireStyles
</head>


<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
    <div class="main d-flex justify-content-center w-100">

        @livewire('login-component')
        @include('scripts.sweet-alert')

    </div>

    <script src="{{ asset('assets/js/app.js') }}"></script>

    @livewireScripts
</body>


</html>
