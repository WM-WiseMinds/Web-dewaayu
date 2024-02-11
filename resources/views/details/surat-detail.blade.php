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
                <td class="border px-4 py-2 text-sm font-semibold">Tanggal Kegiatan</td>
                <td class="border px-4 py-2">{{ $row->tanggal_kegiatan }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold"> Hari </td>
                <td class="border px-4 py-2">{{ $row->hari }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Perihal</td>
                <td class="border px-4 py-2">{{ $row->perihal }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold"> Jam Kegiatan</td>
                <td class="border px-4 py-2">{{ $row->jam_kegiatan }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold"> Tempat Kegiatan</td>
                <td class="border px-4 py-2">{{ $row->lokasi_kegiatan }}</td>
            </tr>
        </tbody>
    </table>
</div>