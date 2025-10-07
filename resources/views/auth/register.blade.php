<x-guest-layout>
    
    <form method="POST" action="{{ route('verification.verify') }}">
        @csrf

        {{-- USERNAME --}}
        <div>
            <x-input-label for="UserName" :value="__('UserName')" />
            <x-text-input id="UserName" class="block mt-1 w-full"
                          type="text" name="UserName"
                          :value="old('UserName')" required autofocus />
            <x-input-error :messages="$errors->get('UserName')" class="mt-2" />
        </div>

        {{-- EMAIL --}}
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full"
                          type="email" name="email"
                          :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        {{-- VERIFICATION COMPONENT --}}
        <x-verification-form :emailValue="old('email')" />

        {{-- PASSWORD --}}
        <div class="mt-4">
            <x-input-label for="password" :value="__('password')" />
            <x-text-input id="password" class="block mt-1 w-full" value="{{ old('password') }}"
                          type="password" name="password" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        {{-- CONFIRM PASSWORD --}}
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                          type="password" name="password_confirmation" required />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        
        {{-- REGISTER BUTTON --}}
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
