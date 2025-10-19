<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- for compoennt title which is not nececcryt : "@"stack('title', 'Default App Title') -->
        <title> @yield('title', "This is My title") || {{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        @stack('styles')
<script>
    localStorage.removeItem('register_email');
    localStorage.removeItem('register_username');
    localStorage.removeItem('register_code');
    localStorage.removeItem('register_password');
    localStorage.removeItem('register_password_confirm');
    localStorage.removeItem('verification_resend_expiry');
</script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
<body>
    @include('layouts.navigation')

    <!-- Main Content -->
  @include("homepage")
   @yield("content-video")
  
 {{-- <div class="layout">
    {{ $slot }}
</div> --}}

    {{-- @stack('scripts') --}}

</body>
</html>