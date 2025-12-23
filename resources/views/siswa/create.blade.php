@extends('layouts.datasiswa')

@section('title', 'Data Siswa – ' . $kelas->nama_kelas)
@section('datasiswa-content')
@if ($errors->any())
    <div class="error-box">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('siswa.store') }}" class="form-card">
@csrf

<div class="form-row">
    <label>Nama :</label>
    <input name="nama_siswa">
</div>

<div class="form-row">
    <label>NIS :</label>
    <input name="nis">
</div>

<div class="form-row">
    <label>Alamat :</label>
    <input name="alamat">
</div>

<div class="form-row">
    <label>Tgl Lahir :</label>
    <input type="date" name="tanggal_lahir">
</div>

<div class="form-row">
    <label>Nama Orang Tua :</label>
    <input name="nama_orang_tua">
</div>

<div class="form-row">
    <label>Kontak Orang Tua :</label>
    <input name="kontak_orang_tua">
</div>

<div class="form-action">
    <button class="btn-save">
        <i class="bi bi-save"></i>
    </button>
</div>
</form>
@endsection
