@extends('layouts.app')
@section("content-videos")

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
       <div id="main">
    {{-- @auth --}}
        <x-video-card />
    {{-- @else --}}
        {{-- <p class="auth-warning">Please log in to view videos.</p> --}}
    {{-- @endauth --}}
 <x-contact-form />
    <x-email-verficiation-code />
</div>
</body>
</html>
@endsection