<x-frontend::layout>
    <x-slot name="title">Register</x-slot>
    <x-slot name="page_slug">register</x-slot>

    <div class="min-h-screen flex items-center bg-black justify-center p-4">
        <div class="w-au max-w-8xl">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-[#caa36b] mb-2 ">Create Account</h1>
                <p class="text-[#caa36b]">Join us today and get started</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf
                <!-- Name Fields -->
                    <div>
                        <label for="Name" class="block text-sm font-medium text-[#caa36b] mb-2 text-left mt-4">
                            First Name
                        </label>
                        <input type="text" id="Name" name="name" :value="old('name')" required autofocus autocomplete="name" 
                            class="w-full px-4 py-3 border border-gray-500 rounded-lg bg-black text-[#caa36b]  placeholder-gray-400"
                            placeholder="John">
                            <p class="" :messages="$errors->get('name')" class="mt-2" ></p>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-[#caa36b] mb-2 text-left">
                            Email Address
                        </label>
                        <input type="email" id="email" name="email" :value="old('email')" required autocomplete="username"
                            class="w-full px-4 py-3 border border-gray-500 rounded-lg bg-black text-[#caa36b]   placeholder-gray-400"
                            placeholder="john@example.com">
                            <p class="" :messages="$errors->get('email')" class="mt-2" ></p>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-[#caa36b] mb-2 text-left">
                            Password
                        </label>
                        <input type="password" id="password" name="password"  required autocomplete="new-password"  minlength="8"
                            class="w-full px-4 py-3 border border-gray-500 rounded-lg bg-black text-[#caa36b]  placeholder-gray-400"
                            placeholder="••••••••">
                            <p class="" :messages="$errors->get('password')" class="mt-2" ></p>
                    </div>


                    <div>
                        <label for="confirm_password" class="block text-sm font-medium text-[#caa36b] mb-2 text-left">
                            Confirm Password
                        </label>
                        <input type="password" id="confirmPassword" name="confirm_password"  required autocomplete="new-password"  minlength="8"
                            class="w-full px-4 py-3 border border-gray-500 rounded-lg bg-black text-[#caa36b]  placeholder-gray-400"
                            placeholder="••••••••">
                            <p class="" :messages="$errors->get('confirm_password')" class="mt-2" ></p>
                    </div>

                    <div class="flex items-start space-x-3">
                        <input type="checkbox" id="terms" name="terms" required
                            class="mt-1 h-4 w-4 text-[#caa36b] border-gray-300 rounded focus:ring-[#caa36b]">
                        <label for="terms" class="text-sm text-[#caa36b] leading-relaxed">
                            I agree to the
                            <a href="#" class="text-[#caa36b] hover:text-[#b8935a] underline">Terms of
                                Service</a>
                            and
                            <a href="#" class="text-[#caa36b] hover:text-[#b8935a] underline">Privacy
                                Policy</a>
                        </label>
                    </div>

                    <button type="submit"
                        class="w-full text-[#7D0A0A] font-semibold py-3 px-4 rounded-lg bg-[#caa36b] transition-colors duration-200 focus:ring-2 focus:ring-[#caa36b] focus:ring-offset-2">
                        Create Account
                    </button>
                </form>

            

            <!-- Divider -->
            <div class="mt-8 mb-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-500"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-black text-[#caa36b]">Or continue with</span>
                    </div>
                </div>
            </div>

            <!-- Social Login Buttons -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <button type="button"
                    class="flex items-center justify-center px-4 py-3 border border-gray-500 rounded-lg bg-[#caa36b]  transition-colors duration-200 focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                    <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24">
                        <path fill="#4285F4"
                            d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                        <path fill="#34A853"
                            d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                        <path fill="#FBBC05"
                            d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
                        <path fill="#EA4335"
                            d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
                    </svg>
                    <span class="text-sm font-medium text-[#7D0A0A]">Google</span>
                </button>
                <button type="button"
                    class="flex items-center justify-center px-4 py-3 border border-gray-500 rounded-lg bg-[#caa36b] transition-colors duration-200 focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                    <svg class="w-5 h-5 mr-2" fill="#1877F2" viewBox="0 0 24 24">
                        <path
                            d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                    </svg>
                    <span class="text-sm font-medium text-[#7D0A0A]">Facebook</span>
                </button>
            </div>

            <!-- Sign In Link -->
            <div class="mt-8 text-center">
                <p class="text-sm text-[#caa36b]">
                    Already have an account?
                    <a href="#" class="text-[#caa36b] hover:text-[#b8935a] font-medium underline">
                        Sign in here
                    </a>
                </p>
            </div>
        </div>


        <!-- Name -->
        {{-- <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
</form> --}}
    </div>
    </div>
    </x-frontend::-layout>
