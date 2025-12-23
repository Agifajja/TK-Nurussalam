@extends('layouts.main')

@section('content')

{{-- =========================
   HEADER
========================= --}}
<div class="dashboard-header d-flex justify-content-between align-items-center">
    <h2>Dashboard Guru</h2>

    <a href="{{ route('profile.show') }}" class="profile d-flex align-items-center text-decoration-none">
        <div class="me-3 text-end">
            <strong>{{ $guru->nama_guru }}</strong><br>
            <small>Guru</small>
        </div>
        <div class="avatar">
            <i class="bi bi-person-circle"></i>
        </div>
    </a>
</div>

{{-- =========================
   INFO CARD
========================= --}}
<div class="info-grid">

    {{-- SISWA BINAAN --}}
    <div class="info-card">
        <span>Siswa Binaan</span>
        <h3>{{ $jumlahSiswa }} Anak</h3>

        @if($kelas)
            <small>Kelas {{ $kelas->nama_kelas }}</small>
        @else
            <small class="text-danger">Belum ada kelas</small>
        @endif
    </div>

    {{-- JURNAL --}}
    <a href="{{ route('jurnal.index') }}" class="info-card">
        <span>Jurnal Hari Ini</span>

        @if($sudahJurnal)
            <div class="status status-success">Sudah Diisi</div>
        @else
            <div class="status status-warning">
                <strong class="text-danger">Belum Diisi</strong><br>
                <span class="text-danger d-flex align-items-center gap-1 mt-1">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    Klik Untuk Disini
                </span>
            </div>
        @endif
    </a>

    {{-- ABSENSI --}}
    <a href="{{ route('absensi.index') }}" class="info-card">
        <span>Absensi</span>

        @if($sudahAbsen)
            <div class="status status-success">Sudah Diisi</div>
        @else
            <div class="status status-warning">
                <strong class="text-danger">Belum Diisi</strong><br>
                <span class="text-danger d-flex align-items-center gap-1 mt-1">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    Klik Untuk Disini
                </span>
            </div>
        @endif
    </a>

</div>

{{-- =========================
   TABLE SISWA
========================= --}}
<div class="table-card">
    <h5>
        Daftar Siswa Kelas
        {{ $kelas ? $kelas->nama_kelas : '-' }}
    </h5>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Nama Orang Tua</th>
                <th>Kontak</th>
            </tr>
        </thead>

       <tbody>
@forelse ($siswas as $index => $siswa)
    <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $siswa->nis }}</td>
        <td>{{ $siswa->nama_siswa }}</td>
        <td>{{ $siswa->nama_orang_tua }}</td>
        <td>{{ $siswa->kontak_orang_tua }}</td>
    </tr>
@empty
    <tr>
        <td colspan="5" class="text-center text-muted">
            Belum ada siswa di kelas ini
        </td>
    </tr>
@endforelse
</tbody>

    </table>
</div>

@endsection
