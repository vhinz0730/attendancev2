<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <div class="w-full h-20 bg-gray-300">
                    <img src="{{ asset('storage/profile_pictures/hhiQ16BsZjdccRhFVxERvsT0sXEZdyP8hRm8v9LX.jpg') }}" alt="Profile Picture">
                    </div>
                </div>
            </div>
        </div>
       
    </div>
</x-app-layout>
