<div class="p-2 bg-white border border-slate-200">
    <table class="table-auto w-full">
        <tbody>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Id </td>
                <td class="border px-4 py-2">{{ $row->id }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold"> Nama Anggota TAPM</td>
                <td class="border px-4 py-2">{{ $row->nama }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold"> No HP Anggota TAPM</td>
                <td class="border px-4 py-2">{{ $row->no_hp }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold"> Perihal </td>
                <td class="border px-4 py-2">{{ $row->perihal }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold"> Tanggal Kegiatan </td>
                <td class="border px-4 py-2">{{ $row->tanggal_kegiatan }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold"> Waktu Kegiatan </td>
                <td class="border px-4 py-2">{{ $row->waktu_kegiatan }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold"> Lokasi Kegiatan </td>
                <td class="border px-4 py-2">{{ $row->lokasi_kegiatan }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold"> Nama Desa </td>
                <td class="border px-4 py-2">{{ $row->desa }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold"> Nama Sekretaris Desa </td>
                <td class="border px-4 py-2">{{ $row->sekretaris_desa }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold"> No HP Sekretaris Desa </td>
                <td class="border px-4 py-2">{{ $row->no_hp_sekdes }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold"> File Surat </td>
                <td class="border px-4 py-2"><a href="{{ asset('storage/surat/' . $row->file_surat) }}" target="_blank"
                        download class="text-blue-500">Download File</a></td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold"> Tanggal Dibuat </td>
                <td class="border px-4 py-2">{{ $row->created_at_formatted }}</td>
            </tr>
        </tbody>
    </table>
</div>
