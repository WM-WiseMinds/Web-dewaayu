<div>
    <form>
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="">
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Nama
                        Pengirim</label>
                    <input wire:model="pengirim_id" type="hidden" readonly
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="exampleFormControlInput1">
                    <input wire:model="pengirim_name" type="text" readonly
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="exampleFormControlInput1" placeholder="Masukkan Nama Pengirim">
                    @error('user_id')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Nama
                        Desa</label>
                    <input wire:model="desa_id" type="hidden" readonly
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="exampleFormControlInput1">
                    <input wire:model="desa_name" type="text" readonly
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="exampleFormControlInput1" placeholder="Masukkan Nama Desa">
                    @error('desa_id')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="jenis_surat" class="block text-gray-700 text-sm font-bold mb-2">Jenis Surat</label>
                    <select wire:model="jenis_surat"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="jenis_surat">
                        <option value="">Pilih Jenis Surat</option>
                        <option value="Surat Masuk">Surat Masuk</option>
                        <option value="Surat Keluar">Surat Keluar</option>
                    </select>
                    @error('jenis_surat')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="pengirim" class="block text-gray-700 text-sm font-bold mb-2">Pengirim</label>
                    <input wire:model="pengirim" type="text"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="pengirim" placeholder="Masukkan Nama Pengirim">
                    @error('pengirim')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="perihal" class="block text-gray-700 text-sm font-bold mb-2">Perihal</label>
                    <input wire:model="perihal" type="text"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="perihal" placeholder="Masukkan Perihal">
                    @error('perihal')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="tanggal_kegiatan" class="block text-gray-700 text-sm font-bold mb-2">Tanggal
                        Kegiatan</label>
                    <input wire:model="tanggal_kegiatan" type="date"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="tanggal_kegiatan" placeholder="Masukkan Tanggal Kegiatan">
                    @error('tanggal_kegiatan')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="hari" class="block text-gray-700 text-sm font-bold mb-2">Hari</label>
                    <input wire:model="hari" type="text"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="hari" placeholder="Masukkan Hari">
                    @error('hari')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="waktu" class="block text-gray-700 text-sm font-bold mb-2">Waktu</label>
                    <input wire:model="waktu" type="time"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="waktu" placeholder="Masukkan Waktu">
                    @error('waktu')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="lokasi_kegiatan" class="block text-gray-700 text-sm font-bold mb-2">Lokasi
                        Kegiatan</label>
                    <input wire:model="lokasi_kegiatan" type="text"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="lokasi_kegiatan" placeholder="Masukkan Lokasi Kegiatan">
                    @error('lokasi_kegiatan')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                {{-- form input status --}}
                <div class="mb-4">
                    <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                    <select wire:model="status"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="status">
                        <option value="">Pilih Status</option>
                        <option value="Dikirim">Dikirim</option>
                        <option value="Dikonfirmasi">Dikonfirmasi</option>
                    </select>
                    @error('status')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                {{-- form file surat --}}
                <div class="mb-4">
                    <label for="exampleFormControlInput3" class="block text-gray-700 text-sm font-bold mb-2">File
                        Surat</label>

                    <input type="file" id="file_surat" wire:model.live="file_surat" x-ref="file_surat"
                        class="w-full"
                        x-on:change="
                            photoName = $refs.file_surat.files[0].name;
                            const reader = new FileReader();
                            reader.onload = (e) => {
                                photoPreview = e.target.result;
                            };
                            reader.readAsDataURL($refs.file_surat.files[0]);
                        " />
                    @error('file_surat')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    @if ($surat->exists && $surat->file_surat)
                        <x-button emerald class="mt-2">
                            <a href="{{ $file_surat_url }}" download>Download</a>
                        </x-button>
                    @endif
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click.prevent="store()" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-bold text-white shadow-sm hover:bg-red-700 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Submit
                        </button>
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <button wire:click="closeModal()" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-bold text-gray-700 shadow-sm hover:text-gray-700 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Close
                        </button>
                    </span>
                </div>
            </div>
    </form>
</div>
