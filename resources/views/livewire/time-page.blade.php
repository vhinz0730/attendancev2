<div>

<x-guest-layout>
    <div class="flex justify-center mb-36 text-blue-800 animate-bounce">
    <a href="{{ route ('register')}}"><i class="fa-solid fa-user-plus">Enroll</a></i>
    </div>
                            @if (session()->has('message'))
                                <div class="text-green-700 w-full bg-transparent rounded-lg text-xl flex justify-center mr-72 p-3 mb-3">
                                    <div class="fixed inset-0 flex items-center justify-center">
                                        <div class="relative max-w-xl rounded-lg bg-gray-100 p-6 shadow-sm transition-opacity duration-500 ease-in-out">
                                            <button wire:click="closeModal" class="absolute top-0 right-0  rounded-full bg-gray-200 hover:bg-gray-300 focus:outline-none focus:bg-gray-300">
                                                <svg class="h-5 w-5 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                                    <div style="width: 200px; height: 200px;">
                                                        <img src="{{ asset('storage/' . session('message.picture')) }}" style="width: 100%; height: 100%; object-fit: cover;">
                                                    </div>
                                                <div>
                                                    <h2 class="text-lg font-medium text-black">{{ session('message.name') }}</h2>
                                                    <p class="mt-4 text-sm text-gray-500">Year: {{ session('message.year') }}</p>
                                                    <p class="mt-2 text-sm text-gray-500">Section: {{ session('message.section') }}</p>
                                                    <p class="mt-2 text-sm text-green-500">{{ session('message.action') }} at {{ session('message.time') }} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if (session()->has('error'))
                            <div class="text-black w-full bg-transparent rounded-lg text-xl flex justify-center mr-72 p-3 mb-3">
                            <div class="fixed inset-0 flex items-center justify-center">
                                        <div class="relative max-w-xl rounded-lg bg-gray-100 p-6 shadow-sm transition-opacity duration-500 ease-in-out">
                                            <button wire:click="closeModal" class="absolute top-0 right-0  rounded-full bg-gray-200 hover:bg-gray-300 focus:outline-none focus:bg-gray-300">
                                                <svg class="h-5 w-5 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                            <div class="text-red-700 flex justify-center items-center ">
                                            <span class="font-bold text-lg font-xl">{{ session('error') }} </span>
                                            </div>
                                            <p  class="text-sm font-sm">Note: Enroll first.</p>
                                            <p  class="text-sm font-sm">If you done enroll and see this error again, wait for the approval of your application.</p>
                                            </div>
                                        </div>
                                    </div>
                            @endif
        <div class="md:container md:mx-auto bg-transparent mt-20">
            <div class="inline-flex mr-20">
                <img src="{{ asset('clock.gif') }}" alt="Logo" width="50" height="50">
                <span class="mt-3 ml-2 text-black">{{ $currentTime }}</span> <!-- Bind to Livewire property -->
            </div>
            <div class="inline-flex">
                <img src="{{ asset('calendar.gif') }}" alt="Logo" width="50" height="50">
                <span class="mt-3 ml-2 text-black">{{ $currentDate }}</span> <!-- Bind to Livewire property -->
            </div>
    
            <div class="mt-10">
                <x-input-label for="student_id" :value="__('Student ID')" />
                <x-text-input class="block mt-1 bg-transparent border-2 border-white w-full text-black" type="text" wire:model="student_id" required autofocus autocomplete="student_id" />
                <x-input-error :messages="$errors->get('student_id')" class="mt-2" />
            </div>
    
            <div class="inline-flex mt-5 ml-28">
                <div x-data="{ hover: false }">
                    <button x-on:mouseover="hover = true" x-on:mouseout="hover = false" type="submit" wire:click="timein" wire:confirm="Time in?"
                        class="btn min-w-[5rem] min-h-[2rem] mr-3 bg-green-300 font-medium text-black hover:bg-green-500 active:bg-primary-focus/90 rounded-full">
                        <i class="fa-solid fa-user-clock"></i>
                        <span x-show="hover">TIME IN</span>
                    </button>
                </div>  
                <div x-data="{ hover: false }">
                    <button x-on:mouseover="hover = true" x-on:mouseout="hover = false" type="submit" wire:click="timeout" wire:confirm="Time out?"
                        class="btn min-w-[5rem] min-h-[2rem] bg-red-300 font-medium text-black hover:bg-red-500 active:bg-primary-focus/90 rounded-full">
                        <i class="fa-solid fa-power-off"></i>
                        <span x-show="hover">TIME OUT</span>
                    </button>
                </div>
            </div>
        </div>

</x-guest-layout>
</div>