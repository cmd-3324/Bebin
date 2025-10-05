<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: false }" x-bind:class="darkMode ? 'dark' : ''">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Guest Access') | {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/alpinejs" defer></script>
</head>
<body class="font-sans text-gray-900 antialiased bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-900 dark:to-gray-800 dark:text-gray-100">
    <div class="min-h-screen flex flex-col items-center justify-center px-4">

        {{-- Dark Mode Toggle --}}
        <div class="absolute top-4 right-4">
            <button 
                @click="darkMode = !darkMode" 
                class="w-12 h-6 flex items-center bg-gray-300 dark:bg-gray-600 rounded-full p-1 transition duration-300">
                <div class="bg-white dark:bg-yellow-400 w-4 h-4 rounded-full shadow-md transform transition duration-300"
                     :class="darkMode ? 'translate-x-6' : ''"></div>
            </button>
        </div>

        {{-- Logo / Branding --}}
        <div class="mb-6">
            <a href="/">
                <x-application-logo class="w-20 h-20 text-indigo-600 dark:text-indigo-400" />
            </a>
        </div>

        {{-- Page Heading --}}
        <main class="text-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-100">
                Signup <span class="text-indigo-600 dark:text-indigo-400">|</span> Login
            </h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Access exclusive videos and content</p>
        </main>

        {{-- Auth Card Slot --}}
        <div class="w-full sm:max-w-md px-6 py-8 bg-white dark:bg-gray-900 shadow-lg rounded-2xl">
            {{ $slot }}
        </div>

        {{-- Auth Illustration --}}
        <div class="mt-6">
            <img src="https://illustrations.popsy.co/videographer.svg" 
                 alt="Video Illustration" 
                 class="h-48 mx-auto">
        </div>

        {{-- Footer Icons --}}
        <div class="mt-6 flex space-x-6 text-gray-500 dark:text-gray-400">
            <a href="https://youtube.com" target="_blank" class="hover:text-red-600">
                <!-- YouTube -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M19.615 3.184c-1.018-.797-4.944-.797-4.944-.797h-5.342s-3.926 0-4.944.797C3.44 3.985 3.5 8.5 3.5 8.5s-.06 4.515.885 5.316c1.018.797 4.944.797 4.944.797h5.342s3.926 0 4.944-.797c.945-.801.885-5.316.885-5.316s.06-4.515-.885-5.316zM9.75 12.5v-4l3.75 2-3.75 2z"/>
                </svg>
            </a>
            <a href="https://twitter.com" target="_blank" class="hover:text-sky-500">
                <!-- Twitter -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53A4.48 4.48 0 0 0 22.4.36a9.18 9.18 0 0 1-2.88 1.1A4.52 4.52 0 0 0 16.11 0c-2.63 0-4.76 2.12-4.76 4.74 0 .37.04.73.12 1.08A12.9 12.9 0 0 1 3.15.84a4.7 4.7 0 0 0-.64 2.38c0 1.64.84 3.09 2.12 3.94A4.48 4.48 0 0 1 .9 6.1v.06c0 2.3 1.67 4.22 3.88 4.66a4.61 4.61 0 0 1-2.14.08c.6 1.87 2.34 3.24 4.41 3.28A9.06 9.06 0 0 1 0 19.54a12.8 12.8 0 0 0 6.94 2.02c8.32 0 12.87-6.84 12.87-12.77 0-.2 0-.39-.01-.59A9.04 9.04 0 0 0 23 3z"/>
                </svg>
            </a>
            <a href="https://facebook.com" target="_blank" class="hover:text-blue-600">
                <!-- Facebook -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M22 12a10 10 0 1 0-11.6 9.9v-7h-2v-2.9h2v-2.2c0-2 1.2-3.2 3-3.2.9 0 1.8.16 1.8.16v2h-1c-1 0-1.4.63-1.4 1.3v1.9h2.4L15 15h-2.1v7A10 10 0 0 0 22 12z"/>
                </svg>
            </a>
            <a href="https://instagram.com" target="_blank" class="hover:text-pink-500">
                <!-- Instagram -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M7 2C4.24 2 2 4.24 2 7v10c0 2.76 2.24 5 5 5h10c2.76 0 5-2.24 5-5V7c0-2.76-2.24-5-5-5H7zm0 2h10c1.66 0 3 1.34 3 3v10c0 1.66-1.34 3-3 3H7c-1.66 0-3-1.34-3-3V7c0-1.66 1.34-3 3-3zm5 3.3a4.7 4.7 0 1 0 0 9.4 4.7 4.7 0 0 0 0-9.4zm0 2a2.7 2.7 0 1 1 0 5.4 2.7 2.7 0 0 1 0-5.4zm4.8-.9a1.1 1.1 0 1 0 0 2.2 1.1 1.1 0 0 0 0-2.2z"/>
                </svg>
            </a>
        </div>

        {{-- Footer Text --}}
        <footer class="mt-8 text-xs text-gray-500 dark:text-gray-400">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </footer>
    </div>
</body>
</html>
