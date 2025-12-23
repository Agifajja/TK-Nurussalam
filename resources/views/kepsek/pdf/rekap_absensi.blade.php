<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rekap Absensi Siswa</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            color: #000;
        }

        /* HEADER */
        .header-table {
            width: 100%;
            margin-bottom: 10px;
        }

        .header-table td {
            border: none;
            vertical-align: middle;
        }

        .logo {
            width: 70px;
        }

        .school-name {
            font-size: 14px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .school-sub {
            font-size: 11px;
        }

        hr {
            border: 0;
            border-top: 1px solid #000;
            margin: 8px 0;
        }

        /* INFO */
        .info {
            margin-bottom: 10px;
            font-size: 11px;
        }

        .info div {
            margin-bottom: 3px;
        }

        /* TABLE */
        table.data {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
        }

        table.data th,
        table.data td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
        }

        table.data th {
            background: #f0f0f0;
            font-weight: bold;
        }

        .text-left {
            text-align: left;
        }

        /* FOOTER */
        .footer {
            margin-top: 15px;
            font-size: 10px;
            text-align: right;
        }
    </style>
</head>
<body>

{{-- ================= HEADER ================= --}}
<table class="header-table">
    <tr>
        <td width="15%">
            <img src="{{ public_path('logo.png') }}" class="logo">
        </td>
        <td width="85%" align="center">
            <div class="school-name">TK NURUSALAM</div>
            <div class="school-sub">Rekap Absensi Siswa</div>
        </td>
    </tr>
</table>

<hr>

{{-- ================= INFO ================= --}}
<div class="info">


    @if($waliKelas)
        <div><strong>Wali Kelas</strong> : {{ $waliKelas }}</div>
    @endif

     @if($kelas)
        <div><strong>Kelas</strong> : {{ $kelas->nama_kelas }}</div>
    @endif
    
    <div><strong>Tanggal</strong> : {{ $dari }} s/d {{ $sampai }}</div>
</div>

{{-- ================= TABLE ================= --}}
<table class="data">
    <thead>
        <tr>
            <th width="5%">No</th>
            <th width="30%">Nama Siswa</th>
            <th width="15%">Kelas</th>
            <th width="10%">Hadir</th>
            <th width="10%">Izin</th>
            <th width="10%">Sakit</th>
            <th width="10%">Alfa</th>
        </tr>
    </thead>
    <tbody>
        @forelse($absensi->groupBy('id_siswa') as $i => $items)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td class="text-left">{{ $items->first()->siswa->nama_siswa ?? '-' }}</td>
                <td>{{ $items->first()->siswa->kelas->nama_kelas ?? '-' }}</td>
                <td>{{ $items->where('id_status', 1)->count() }}</td>
                <td>{{ $items->where('id_status', 3)->count() }}</td>
                <td>{{ $items->where('id_status', 2)->count() }}</td>
                <td>{{ $items->where('id_status', 4)->count() }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="7">Tidak ada data absensi</td>
            </tr>
        @endforelse
    </tbody>
</table>



</body>
</html>
