<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @push('title')
    Contact Us
@endpush


</head>
<body>
@if (session('successmessage'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4">
        {{ session('successmessage') }}
    </div>
@endif

@if (session('errormessage'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">
        {{ session('errormessage') }}
    </div>
@endif

<form action="{{ route('send.email') }}" id="contactForm" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea id="messageContent" name="message" required></textarea>
        </div>
        <button type="submit">Send Message</button>
    </form>
