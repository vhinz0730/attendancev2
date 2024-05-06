<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link :href="route('timein')" class="hover:animate-bounce" :active="request()->routeIs('timein')" wire:navigate>
            <i class="fa-solid fa-users"></i>{{ __('Time In') }}
            </x-nav-link>
            <x-nav-link :href="route('timeout')" class="hover:animate-bounce" :active="request()->routeIs('timeout')" wire:navigate>
            <i class="fa-solid fa-users"></i>{{ __('Time Out') }}
            </x-nav-link>
        </div>