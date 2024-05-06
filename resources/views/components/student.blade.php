        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
            <x-nav-link :href="route('pending')" class="hover:animate-bounce" :active="request()->routeIs('pending')" wire:navigate>
            <i class="fa-solid fa-users"></i>{{ __('Pending Application') }}
            </x-nav-link>
        </div>