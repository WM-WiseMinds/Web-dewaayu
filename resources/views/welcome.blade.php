<x-guest-layout>
    <div class="flex flex-col min-h-screen">
        @livewire('navbar')
        <div class="flex-grow">

            <div class="hero h-[75vh]" style="background-image: url({{ asset('storage/source/background.jpg') }});">
                <div class="hero-overlay bg-opacity-60"></div>
                <div class="hero-content text-center text-neutral-content">
                    <div class="max-w-md">
                        <h1 class="mb-5 text-5xl font-bold">
                            Meningkatkan Kapasitas Pemerintahan Desa dan Pemberdayaan Masyarakat
                        </h1>
                        <p class="mb-5">
                            Sekretariat Tenaga Ahli Pemberdayaan Masyarakat Desa, bersinergi untuk pembangunan dan
                            kemajuan desa.
                        </p>
                    </div>
                </div>
            </div>

            <div class="hero min-h-fit bg-gray-300 py-10">
                <div class="hero-content flex-col lg:flex-row-reverse">
                    <div>
                        <h1 class="text-5xl font-bold text-center">Sekretariat TAPM</h1>
                        <p class="py-6 text-center">
                            Kami adalah jembatan antara pemerintah dan masyarakat desa untuk memfasilitasi pembangunan
                            desa,
                            pembinaan masyarakat, dan pemberdayaan masyarakat desa sesuai dengan Permendesa Nomor 18
                            Tahun 2019.
                        </p>
                    </div>
                </div>
            </div>

            <div class="hero min-h-fit py-10 bg-base-200">
                <div class="hero-content flex-col lg:flex-row">
                    <div>
                        <h1 class="text-5xl font-bold">Tugas dan Fungsi Sekretariat TAPM</h1>
                        <ul class="list-none p-0 mt-4 text-gray-700">
                            <li class="border-b border-gray-200 py-2">
                                <span class="text-xl font-bold">Pembinaan dan Supervisi</span>
                                <p>Menjalankan pengendalian, supervisi, dan monitoring tugas pendamping desa.</p>
                            </li>
                            <li class="border-b border-gray-200 py-2">
                                <span class="text-xl font-bold">Kebijakan Pembangunan Desa</span>
                                <p>Membantu penyusunan kebijakan yang terkait dengan pengembangan dan pemberdayaan desa.
                                </p>
                            </li>
                            <li class="border-b border-gray-200 py-2">
                                <span class="text-xl font-bold">Koordinasi Program Desa</span>
                                <p>Mengkoordinasikan program dan kegiatan pendampingan masyarakat desa.</p>
                            </li>
                            <li class="border-b border-gray-200 py-2">
                                <span class="text-xl font-bold">Kompilasi dan Operasional Data</span>
                                <p>Operator P3MD melakukan kompilasi data SIPEDE dan Siskeudes serta membantu
                                    operasional TAPM.</p>
                            </li>
                            <li class="py-2">
                                <span class="text-xl font-bold">Laporan Berkala</span>
                                <p>Melaporkan perkembangan program dan kegiatan kepada pihak terkait.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @livewire('footer')
    </div>
</x-guest-layout>
