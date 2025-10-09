<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>

        {{-- ✅ Success or error feedback --}}
        <div class="mt-4 text-center">
            @if (session('status'))
                <div class="inline-flex items-center justify-center space-x-2">
                    {{-- Small tick --}}
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                    <span class="text-sm text-green-700 font-medium">
                        {{ session('status') ?? 'Password reset link sent!' }}
                    </span>
                </div>

                {{-- Make sure this is OUTSIDE the inline-flex div --}}
                <div class="mt-2">
                    <a href="{{ route('login') }}" style="color:red;"
 class="text-sm font-medium text-blue-600 hover:underline">
                        Get Back to Login →
                    </a>
                </div>

            @elseif ($errors->any())
                <div class="inline-flex items-center justify-center space-x-2">
                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span class="text-sm text-red-700 font-medium">
                        Can't, something went wrong.
                    </span>
                </div>
            @endif
        </div>
    </form>
</x-guest-layout>
