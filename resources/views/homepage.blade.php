@extends('layouts.app')
   
@section('title', 'Home Page')

@section('content_videos')
<div class="cp-root">
   
    {{-- Video Cards --}}
    <x-video-card />

    {{-- You can add more components --}}
    {{-- <x-contact-form /> --}}
    {{-- <x-email-verification-code /> --}}
</div>
@endsection


