<x-guest-layout>
    <form method="POST" action="{{ route('register')  }} " enctype="multipart/form-data">
        @csrf
                        @if (session()->has('message'))
                            <div class="text-green-700 bg-green-500 rounded-lg text-xl">
                                <div>
                                    <span class="text-sm font-sm">Your application has been received and is currently under review by the administrator.</span>
                                </div>
                                    <span class="font-bold underline flex justify-center">{{ session('message') }}</span>
                                <div class="text-red-700">
                                    <span class="text-sm font-sm">Note: <strong>Remember your ID.</strong> You need it to time-in and time-out.</span>
                                </div>
                            </div>
                            
                        @endif  

        <!-- Profile Picture -->
        <div class="mt-4">
            <x-input-label for="profile_picture" :value="__('Profile Picture')" />
            <input type="file" name="profile_picture" class="block mt-1 w-full" accept="image/*" />
            <x-input-error :messages="$errors->get('profile_picture')" class="mt-2" />
        </div>
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input name="name" class="block mt-1 w-full" type="text"  :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input name="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="Year" :value="__('Year')" />
            <x-text-input name="year" :value="old('year')" class="block mt-1 w-full"  required autocomplete="year" />
            <x-input-error :messages="$errors->get('year')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="section" :value="__('Section')" />
            <x-text-input name="section" :value="old('section')" class="block mt-1 w-full" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('section')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
