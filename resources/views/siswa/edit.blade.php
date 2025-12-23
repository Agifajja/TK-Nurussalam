@extends('layouts.datasiswa')
@section('title', 'Data Siswa – ' . $kelas->nama_kelas)

@section('datasiswa-content')

<h2>Edit Siswa</h2>

<form method="POST" action="{{ route('siswa.update',$siswa->id_siswa) }}" class="form-card">
@csrf
@method('PUT')

<div class="form-row">
    <label>Nama</label>
    <input name="nama_siswa" value="{{ $siswa->nama_siswa }}">
</div>

<div class="form-row">
    <label>NIS</label>
    <input name="nis" value="{{ $siswa->nis }}">
</div>

<div class="form-row">
    <label>Alamat</label>
    <input name="alamat" value="{{ $siswa->alamat }}">
</div>

<div class="form-row">
    <label>Tgl Lahir</label>
    <input type="date" name="tanggal_lahir" value="{{ $siswa->tanggal_lahir }}">
</div>

<div class="form-row">
    <label>Nama Orang Tua</label>
    <input name="nama_orang_tua" value="{{ $siswa->nama_orang_tua }}">
</div>

<div class="form-row">
    <label>Kontak Orang Tua</label>
    <input name="kontak_orang_tua" value="{{ $siswa->kontak_orang_tua }}">
</div>

<div class="form-action text-end">
    <button class="btn btn-success px-4" style="background:#375B45;border:none">
        <i class="bi bi-save"></i> Update
    </button>
</div>

</form>

{{-- MODAL SUCCESS --}}
@if(session('success'))
<div class="modal fade" id="modalSuccess" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4">

      <div class="modal-header border-0">
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body text-center pb-4">
        <i class="bi bi-check-circle-fill fs-1 mb-3" style="color:#375B45"></i>
        <h5 class="fw-bold" style="color:#375B45">
            Data Berhasil Disimpan
        </h5>
      </div>

    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    new bootstrap.Modal(
        document.getElementById('modalSuccess')
    ).show();
});
</script>
@endif

@endsection
