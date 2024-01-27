

<x-dropdown align="right" width="48">
    <x-slot name="trigger">
            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"> 
                <div class="ms-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m10.5 21 5.25-11.25L21 21m-9-3h7.5M3 5.621a48.474 48.474 0 0 1 6-.371m0 0c1.12 0 2.233.038 3.334.114M9 5.25V3m3.334 2.364C11.176 10.658 7.69 15.08 3 17.502m9.334-12.138c.896.061 1.785.147 2.666.257m-4.589 8.495a18.023 18.023 0 0 1-3.827-5.802" />
                    </svg>
                </div>
            </button>
    </x-slot>
    <x-slot name="content">
        <x-dropdown-link :href="route('changeLang', ['lang'=>'en'])" :active="session()->get('locale') == 'en'">
            {{ __('English') }}
        </x-dropdown-link>
        <x-dropdown-link :href="route('changeLang', ['lang'=>'pt'])" :active="session()->get('locale') == 'pt'">
            {{ __('Portugues') }}
        </x-dropdown-link>
    </x-slot>
</x-dropdown>




