<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Panel')</title>
    <link rel="stylesheet" href="{{ asset('home/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/responsive.css') }}">
</head>
<body class="sub_page">

    <!-- Header admin -->
    @include('admin.header')

    <!-- Contenu dynamique -->
    <main class="py-4">
        @yield('content')
    </main>

    <!-- Footer admin -->
    @include('admin.footer')

    <!-- Scripts -->
    @include('admin.script')
</body>
</html>
