<x-guest-layout>
    <div class="flex flex-col min-h-screen">
        @livewire('navbar')
        <div class="flex-grow">

            <h1 class="text-center text-2xl font-bold mt-10">Struktur Organisasi</h1>

            <div class="flex justify-center mt-5 carousel carousel-center rounded-box">
                <img src="{{ asset('storage/source/struktur.png') }}" alt="Struktur Organisasi">
            </div>
        </div>
        @livewire('footer')
    </div>
</x-guest-layout>
