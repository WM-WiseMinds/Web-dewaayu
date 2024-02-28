<div class="p-2 bg-white border border-slate-200">
    <table class="table-auto w-full">
        <tbody>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Id </td>
                <td class="border px-4 py-2">{{ $row->id}}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold"> Nama </td>
                <td class="border px-4 py-2">{{ $row->name }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold"> No Telp </td>
                <td class="border px-4 py-2">{{ $row->no_hp }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold"> alamat </td>
                <td class="border px-4 py-2">{{ $row->alamat }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Foto</td>
                <td class="border px-4 py-2"><img src="{{ $row->foto }}" alt="Foto" style="width: 100px; height: 100px;"></td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Judul Berita</td>
                <td class="border px-4 py-2">{{ $row->judul_berita }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold"> No Berita </td>
                <td class="border px-4 py-2">{{ $row->no_berita }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold"> Deskripsi Berita</td>
                <td class="border px-4 py-2">{{ $row->deskripsi_berita }}</td>
            </tr>
        </tbody>
    </table>
</div>