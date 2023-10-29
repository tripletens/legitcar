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
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white h-1/3 w-3/6 m-auto my-6 p-6 rounded-lg">
        <livewire:pages.test-key />
        <livewire:pages.live-key />
    </div>

    @livewireScripts

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Livewire.on('clipboard-copied', data => {
                // Handle the event data here
                console.log('Event data:', data);
            });
        });
    </script>

</x-app-layout>
