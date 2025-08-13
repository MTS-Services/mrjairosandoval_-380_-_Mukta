<x-frontend::layout>
    <x-slot name="title">Login</x-slot>
    <x-slot name="page_slug">login</x-slot>

    <div class="min-h-screen flex items-center bg-black justify-center p-4">
            <div class="w-full max-w-md">
                <!-- Header -->
                <div class="text-center mb-8">
                    <h1
                        class="text-3xl font-bold text-[#caa36b] mb-2 ">User Login</h1>

                </div>

                <!-- Registration Form -->
                <div class="bg-black rounded-2xl shadow-xl p-8">
                   <form method="POST" action="{{ route('login') }}" class="space-y-4">
                  @csrf

                        <!-- Email -->
                        <div>
                            <label for="email"
                                class="block text-sm font-medium text-[#caa36b] mb-2 text-left">
                               {{__('Email Address')}}
                            </label>
                            <input
                                type="email" name="email" required class="w-full px-4 py-3 border border-gray-500 rounded-lg bg-black text-[#caa36b]  focus:border-transparent transition-all duration-200 placeholder-gray-400" :value="old('email')" required autofocus autocomplete="username" placeholder="john@example.com">
                                <p class="" :messages="$errors->get('email')" class="mt-2"></p>
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password"
                                class="block text-sm font-medium text-[#caa36b] mb-2 text-left">
                               {{__('Password')}}
                            </label>
                            <input
                                type="password"  name="password"  required  minlength="8" class="w-full px-4 py-3 border border-gray-500 rounded-lg bg-black text-[#caa36b] focus:border-transparent transition-all duration-200 placeholder-gray-400" required autocomplete="current-password"  placeholder="••••••••">
                                <p :messages="$errors->get('password')" class="mt-2" ></p>

                        </div>

                        <!-- Terms and Conditions -->
                        <div class="flex items-start space-x-3">
                            <input
                                type="checkbox"  name="terms"  required  class="mt-1 h-4 w-4 text-[#caa36b] border-gray-300 rounded focus:ring-[#caa36b]">
                            <label for="terms"
                                class="text-sm text-[#caa36b] leading-relaxed">
                                I agree to the

                            </label>
                        </div>

                        <!-- Submit Button -->
                        <button
                            type="submit"
                            class="w-full   text-[#7D0A0A] font-semibold py-3 px-4 rounded-lg bg-[#caa36b]  transition-colors duration-200 focus:ring-2 focus:ring-[#caa36b] focus:ring-offset-2">
                            Login
                        </button>
                    </form>
                    <div class="mt-8 text-center">
                        <p class="text-sm text-[#caa36b]">
                            Already have an account?
                            <a href="#"
                                class="text-[#caa36b] hover:text-[#b8935a] font-medium underline">
                                Sign in here
                            </a>
                        </p>
                    </div>

                </div>
            </div>
        </div>

    <!-- Session Status -->
    {{-- <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
        {{ __('User Login') }}
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded-sm border-gray-300 text-indigo-600 shadow-xs focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form> --}}
</x-frontend::-layout>
