@extends('layouts.kepsek')

@section('content')
<div class="bg-white p-4 shadow rounded">

    <h4 class="mb-3">Rekap Data</h4>

    <form method="GET" action="{{ route('rekap.absensi') }}" class="row mb-4">
        <div class="col-md-4">
            <select name="data" class="form-select" onchange="this.form.action=this.value">
                <option value="{{ route('rekap.absensi') }}">Rekap Absensi</option>
                <option value="{{ route('rekap.jurnal') }}">Rekap Jurnal</option>
            </select>
        </div>

        <div class="col-md-3">
            <input type="date" name="tanggal_awal" class="form-control" required>
        </div>

        <div class="col-md-3">
            <input type="date" name="tanggal_akhir" class="form-control" required>
        </div>

        <div class="col-md-2">
            <button class="btn btn-success w-100">Tampilkan</button>
        </div>
    </form>

</div>
@endsection
