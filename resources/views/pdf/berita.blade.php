<style>
    .text-center {
        text-align: center;
    }

    .text-right {
        text-align: right;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin: auto;
    }

    .table th,
    .table td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .table th {
        background-color: #f2f2f2;
    }

    .divider {
        border-top: 1px solid #000;
        width: 100%;
        margin-top: 20px;
    }

    .footer {
        margin-top: 40px;
        position: relative;
    }

    .signature-space {
        height: 80px;
    }

    .footer-text {
        display: inline-block;
        width: 100%;
        text-align: center;
    }

    .block {
        display: block;
    }

    .mb-20 {
        margin-bottom: 20px;
    }
</style>

<div class="text-center">
    <h2>Daftar Berita</h2>
</div>
<div class="divider"></div>
<div class="text-right mb-20">
    <p>Tanggal Cetak: {{ now()->format('d F Y') }}</p>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Tanggal Pembuatan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datasource as $berita)
            <tr>
                <td>{{ $berita->id }}</td>
                <td>{{ $berita->judul }}</td>
                <td>{{ $berita->user->name }}</td>
                <td>{{ $berita->created_at->format('d-m-Y') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="signature-space"></div>

<div class="footer">
    <div class="footer-text">
        <div class="block">Gianyar, {{ now()->format('d F Y') }}</div>
        <div class="block">Sekretariat Tenaga Ahli Pemberdayaan Masyarakat Desa</div>
        <div class="signature-space"></div>
        <div class="block">Koordinator TAPM</div>
    </div>
</div>
