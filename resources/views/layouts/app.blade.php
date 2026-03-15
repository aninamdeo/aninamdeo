<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Aniket Namdeo — AI Developer & IT Manager')</title>
    <meta name="description" content="@yield('meta_description', 'Aniket Namdeo — AI Developer, IT Manager & Full Stack Software Developer with 8+ years experience. Based in India, serving global clients.')">
    <meta name="keywords" content="@yield('meta_keywords', 'AI Developer, Laravel Developer, Full Stack Developer, IT Manager, React Developer, Next.js, India')">
    <meta name="author" content="Aniket Namdeo">

    <!-- Open Graph -->
    <meta property="og:title" content="@yield('og_title', 'Aniket Namdeo — AI Developer & IT Manager')">
    <meta property="og:description" content="@yield('og_description', 'Building AI Solutions and Scalable Software Systems')">
    <meta property="og:image" content="@yield('og_image', asset('images/og-image.jpg'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'Aniket Namdeo')">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="bg-slate-950 text-white antialiased" x-data="{ mobileOpen: false }">

    @yield('content')

    @stack('scripts')
</body>
</html>
