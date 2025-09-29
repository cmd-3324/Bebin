<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', "This is My title") || {{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        
        @stack('styles')
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
<body>
    @include('layouts.navigation')

    <!-- Main Content -->
    <div id="main">
    @auth
        <x-video-card />
    @else
        <p class="auth-warning">Please log in to view videos.</p>
    @endauth
</div>


    @stack('scripts')
<style>.auth-warning {
  max-width: 480px; /* YouTube video card width approx */
  margin-left: 500px;
  padding: 20px;
  background-color: #fff;
  border-radius: 8px;
/
  font-family: 'Roboto', Arial, sans-serif;
  font-size: 16px;
  color: #333;
  text-align: center;
}
</style>
</body>
</html>