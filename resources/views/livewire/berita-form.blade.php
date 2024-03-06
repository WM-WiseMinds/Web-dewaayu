<div>
    <form>
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="">
                <div class="mb-4">
                    <label for="judul" class="block text-gray-700 text-sm font-bold mb-2">Judul</label>
                    <input wire:model="judul" type="text" class="form-input w-full">
                    @error('judul')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="deskripsi" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
                    <textarea wire:model="deskripsi" class="form-textarea w-full" rows="3"></textarea>
                    @error('deskripsi')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="exampleFormControlInput1"
                        class="block text-gray-700 text-sm font-bold mb-2">Penulis</label>
                    <input wire:model="user_id" type="hidden" readonly
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="exampleFormControlInput1">
                    <input wire:model="user_name" type="text" readonly
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="exampleFormControlInput1" placeholder="Masukkan Nama Pengirim">
                    @error('user_id')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="exampleFormControlInput3"
                        class="block text-gray-700 text-sm font-bold mb-2">Foto</label>

                    <input type="file" id="foto" wire:model.live="foto" x-ref="foto" class="w-full"
                        x-on:change="
                            photoName = $refs.foto.files[0].name;
                            const reader = new FileReader();
                            reader.onload = (e) => {
                                photoPreview = e.target.result;
                            };
                            reader.readAsDataURL($refs.foto.files[0]);
                        " />
                    @error('foto')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    @if ($berita->exists && $berita->foto)
                        <x-button emerald class="mt-2">
                            <a href="{{ $foto_url }}" download>Download</a>
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
