<x-guest-layout>
        <div class="md:container md:mx-auto">
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
                <x-text-input class="block mt-1 w-full text-black" type="text" wire:model="student_id" required autofocus autocomplete="student_id" />
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

