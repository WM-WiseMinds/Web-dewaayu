<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Surat') }}
        </h2>
    </x-slot>

    <div class="pt-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <h3 class="font-semibold text-xl pb-3 text-center text-black leading-tight">Surat Keluar</h3>
                @livewire('surat-table')
            </div>
        </div>
    </div>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <h3 class="font-semibold text-xl pb-3 text-center text-black leading-tight">Surat Masuk</h3>
                @livewire('surat-masuk-table')
            </div>
        </div>
    </div>
</x-app-layout>
