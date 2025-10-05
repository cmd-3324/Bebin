@props(['action'])

<form method="POST" class="flex gap-2 items-center">
    @csrf

    <!-- Verification code input -->
    <input type="text" name="code" placeholder="Code" required
           class="border rounded px-2 py-1 text-sm w-24">

    <!-- Send button -->
    <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded text-sm hover:bg-blue-700">
        Send
    </button>

    <!-- Resend button -->
    <button type="button" onclick="alert('Resend code')" 
            class="bg-gray-300 text-gray-700 px-3 py-1 rounded text-sm hover:bg-gray-400">
        Resend
    </button>
</form>
