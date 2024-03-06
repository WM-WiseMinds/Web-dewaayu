<x-guest-layout>
    <div class="flex flex-col min-h-screen">
        @livewire('navbar')
        <div class="flex-grow">

            <h1 class="text-center text-2xl font-bold mt-10">Berita</h1>

            @foreach ($beritas as $item)
                <div class="flex justify-center mt-5 rounded-box mx-10">
                    <div class="card card-side w-full bg-base-100 shadow-xl m-10">
                        <figure>
                            <img src="{{ asset('storage/berita/' . $item->foto) }}"
                                style="width: 300px; height: 200px; object-fit: cover;" alt="Movie" />
                        </figure>
                        <div class="card-body">
                            <h1 class="card-title">{{ $item->judul }}</h1>
                            <p>{{ $item->deskripsi }}</p>
                            <div class="card-actions justify-between">
                                <div class="italic text-sm">
                                    <p>Penulis: {{ $item->user->name }}</p>
                                </div>
                                <p class="text-end text-sm">{{ $item->created_at }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @livewire('footer')
    </div>
</x-guest-layout>
