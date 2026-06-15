<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <?php
        $version = '1993.4.5';
    ?>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

     <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome 6 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;600;700;800;900&amp;family=Inter:wght@400;500;600&amp;family=JetBrains+Mono:wght@600&amp;display=swap" rel="stylesheet" />

    <link href="{{asset('css/styles.css')}}?v=<?php echo $version ?>" rel="stylesheet">
    <link href="{{asset('css/topbar.css')}}?v=<?php echo $version ?>" rel="stylesheet">
    <!-- Scripts -->
    <!-- vite(['resources/sass/app.scss', 'resources/js/app.js']) -->
</head>
<body>
    <div>
        @include('partials.navbar')

        <main>
            @yield('content')
        </main>

        @include('partials.footer')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
