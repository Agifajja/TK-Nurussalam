@extends('layouts.absensi')

@section('title','Absensi')

@section('absensi-content')

{{-- HEADER HIJAU (CUMA JUDUL) --}}
<div class="absensi-header">
    <h4>Absensi Belajar Mengajar</h4>
</div>

{{-- INFO MANUAL (LUAR HEADER) --}}
<div class="info-manual-wrap">

    {{-- KIRI --}}
    <div class="info-manual">
        <label class="info-label">Kelas TK-{{ $kelas->nama_kelas ?? '-' }}</label>
        <input type="date"
               name="tanggal"
               form="absenForm"
               value="{{ date('Y-m-d') }}"
               required>
    </div>

    {{-- KANAN --}}
    <div class="info-manual">
        <label class="info-label">Jam Masuk</label>
        <input type="time"
               name="jam_masuk"
               form="absenForm"
               value="{{ date('H:i') }}"
               required>
    </div>

</div>

<form id="absenForm" method="POST" action="{{ route('absensi.store') }}">
@csrf

{{-- ABSENSI GURU --}}
<div class="absensi-guru">
    <div>
        <span class="guru-title">Kehadiran Guru</span>
        <div class="guru-name">{{ Auth::user()->nama_guru }}</div>
    </div>

    <div class="status-row">
        @foreach(['Hadir','Sakit','Izin','Alfa'] as $i=>$st)
        <label class="status-pill">
            <input type="radio" name="status_guru" value="{{ $i+1 }}" required>
            {{ $st }}
        </label>
        @endforeach
    </div>
</div>

{{-- HEADER TABEL --}}
<div class="absensi-list-head">
    <span>Daftar Siswa</span>
    <div>Hadir</div>
    <div>Sakit</div>
    <div>Izin</div>
    <div>Alfa</div>
</div>

{{-- LIST SISWA --}}
@foreach($siswas as $i => $s)
<div class="absensi-row">
    <div>{{ $i+1 }}. {{ $s->nama_siswa }}</div>

    <input type="hidden" name="id_siswa[]" value="{{ $s->id_siswa }}">

    @for($st=1;$st<=4;$st++)
        <input type="radio"
               name="status[{{ $s->id_siswa }}]"
               value="{{ $st }}"
               required>
    @endfor
</div>
@endforeach

<div class="simpan-wrap">
    <button type="submit" class="btn-simpan">
        Simpan Absensi
    </button>
</div>

</form>

@if(session('success'))
<div class="modal fade" id="modalSuccess" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4">

      <div class="modal-header border-0">
        <button type="button"
                class="btn-close"
                data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body d-flex align-items-center justify-content-center"
           style="min-height:180px;">
        <h3 class="fw-bold text-center m-0" style="color:#375B45">
            {{ session('success') }}
        </h3>
      </div>

    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    new bootstrap.Modal(
        document.getElementById('modalSuccess')
    ).show();
});
</script>
@endif

@endsection
