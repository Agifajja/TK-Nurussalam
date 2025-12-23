@extends('layouts.kepsek')

@section('content')

{{-- HEADER --}}
<div class="dashboard-header d-flex justify-content-between align-items-center">
    <h2>Dashboard Kepala Sekolah</h2>

    {{-- PROFILE (KLIK KE PROFILE) --}}
    <div class="profile d-flex align-items-center"
     style="cursor:pointer"
     onclick="window.location='{{ route('kepsek.profile') }}'">


        <div class="me-3 text-end">
            <strong>{{ auth()->user()->nama_guru }}</strong><br>
            <small>Kepala Sekolah</small>
        </div>

        <div class="avatar">
            <i class="bi bi-person-circle"></i>
        </div>
    </div>
</div>

{{-- INFO CARD --}}
<div class="info-grid">

    <div class="info-card">
        <span>Total Siswa</span>
        <h3>{{ $totalSiswa }} Anak</h3>
    </div>

    <div class="info-card">
        <span>Rata-rata Kehadiran</span>
        <h3>{{ $persenKehadiran }}%</h3>
        <small>Hari ini</small>
    </div>

    <div class="info-card">
        <span>Kehadiran Guru</span>
        <h3>{{ $guruHadir }}/{{ $totalGuru }}</h3>
        <small>Hadir</small>
    </div>

</div>

{{-- AKTIVITAS TERKINI --}}
<div class="table-card aktivitas-card">

    <h5 class="d-flex align-items-center gap-2">
        <i class="bi bi-bell"></i>
        Aktivitas Terkini
    </h5>

    <ul class="aktivitas-list">
        @forelse($aktivitas as $item)
            <li>
                <span class="time">
                    {{ \Carbon\Carbon::parse($item['waktu'])->format('H:i') }}
                </span>

                <strong>
                    {{ $item['nama'] }}
                    @if($item['kelas'] !== '-')
                        ({{ $item['kelas'] }})
                    @endif
                </strong>

                {{ $item['aksi'] }}
            </li>
        @empty
            <li class="text-muted">
                Belum ada aktivitas hari ini
            </li>
        @endforelse
    </ul>

</div>

@endsection
