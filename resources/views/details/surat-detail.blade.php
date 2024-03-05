<div class="p-2 bg-white border border-slate-200">
    <table class="table-auto w-full">
        <tbody>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Id</td>
                <td class="border px-4 py-2">{{ $row->id }}</td>
            </tr>
            @if ($row->pengirim)
                <tr>
                    <td class="border px-4 py-2 text-sm font-semibold">Nama Pengirim</td>
                    <td class="border px-4 py-2">{{ $row->pengirim }}</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2 text-sm font-semibold">No Telp</td>
                    <td class="border px-4 py-2">{{ $row->no_hp_pengirim }}</td>
                </tr>
                <tr>
                @else
                <tr>
                    <td class="border px-4 py-2 text-sm font-semibold">Nama Pengirim</td>
                    <td class="border px-4 py-2">{{ $row->pengirim_eksternal }}</td>
                </tr>
            @endif

            @if ($row->nama_desa)
                <tr>
                    <td class="border px-4 py-2 text-sm font-semibold">Desa</td>
                    <td class="border px-4 py-2">{{ $row->nama_desa }}</td>
                </tr>
            @endif

            @if ($row->penerima)
                <tr>
                    <td class="border px-4 py-2 text-sm font-semibold">Nama Penerima</td>
                    <td class="border px-4 py-2">{{ $row->penerima }}</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2 text-sm font-semibold">No Telp</td>
                    <td class="border px-4 py-2">{{ $row->no_hp_penerima }}</td>
                </tr>
                <tr>
                @else
                <tr>
                    <td class="border px-4 py-2 text-sm font-semibold">Nama Penerima</td>
                    <td class="border px-4 py-2">{{ $row->penerima_eksternal }}</td>
                </tr>
            @endif
            @if ($row->rekomendasi_id)
                <tr>
                    <td class="border px-4 py-2 text-sm font-semibold">Rekomendasi Anggota TAPM</td>
                    <td class="border px-4 py-2">{{ $row->rekomendasi }}</td>
                </tr>
            @endif
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Jenis Surat</td>
                <td class="border px-4 py-2">{{ $row->jenis_surat }}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Perihal</td>
                <td class="border px-4 py-2">{{ $row->perihal }}</td>
            </tr>
            @if ($row->tanggal_kegiatan)
                <tr>
                    <td class="border px-4 py-2 text-sm font-semibold">Tanggal Kegiatan</td>
                    <td class="border px-4 py-2">{{ $row->tanggal_kegiatan }}</td>
                </tr>
            @endif
            @if ($row->hari)
                <tr>
                    <td class="border px-4 py-2 text-sm font-semibold"> Hari </td>
                    <td class="border px-4 py-2">{{ $row->hari }}</td>
                </tr>
            @endif
            @if ($row->waktu)
                <tr>
                    <td class="border px-4 py-2 text-sm font-semibold"> Jam Kegiatan</td>
                    <td class="border px-4 py-2">{{ $row->waktu }}</td>
                </tr>
            @endif
            @if ($row->lokasi_kegiatan)
                <tr>
                    <td class="border px-4 py-2 text-sm font-semibold"> Tempat Kegiatan</td>
                    <td class="border px-4 py-2">{{ $row->lokasi_kegiatan }}</td>
                </tr>
            @endif
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">Status</td>
                <td class="border px-4 py-2">
                    @if ($row->status == 'Dikirim')
                        <div class="badge badge-warning">{{ $row->status }}</div>
                    @elseif ($row->status == 'Dikonfirmasi')
                        <div class="badge badge-success">{{ $row->status }}</div>
                    @else
                        <span class="text-red-500">{{ $row->status }}</span>
                    @endif
                </td>
            </tr>
            <tr>
                <td class="border px-4 py-2 text-sm font-semibold">File Surat</td>
                <td class="border px-4 py-2">
                    <a href="{{ asset('storage/surat/' . $row->file_surat) }}" target="_blank" download
                        class="text-blue-500">Download File</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
