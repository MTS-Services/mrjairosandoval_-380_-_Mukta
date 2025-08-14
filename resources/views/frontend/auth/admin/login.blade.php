<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('admin.login') }}" >
        @csrf
        <h1 class="text-2xl font-bold text-[#caa36b] mb-6">{{ __('Admin Login') }}</h1>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-gray-300" />
            <x-text-input id="email"
                class="block mt-1 w-full bg-gray-800 border-gray-700 text-gray-200 focus:border-[#caa36b] focus:ring-[#caa36b]"
                type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-gray-300" />
            <x-text-input id="password"
                class="block mt-1 w-full bg-gray-800 border-gray-700 text-gray-200 focus:border-[#caa36b] focus:ring-[#caa36b]"
                type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center text-gray-300">
                <input id="remember_me" type="checkbox"
                    class="rounded-sm border-gray-600 bg-gray-800 text-[#caa36b] focus:ring-[#caa36b]"
                    name="remember">
                <span class="ms-2 text-sm">{{ __('Remember me') }}</span>
            </label>
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-between mt-6">
            @if (Route::has('admin.password.request'))
                <a class="text-sm text-[#caa36b] hover:text-[#e0b97a]" href="{{ route('admin.password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button
                class="bg-[#caa36b] hover:bg-[#b08e59] text-black font-semibold px-4 py-2 rounded-lg">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
