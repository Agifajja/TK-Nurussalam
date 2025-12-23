@extends('layouts.kepsek')

@section('content')

<div class="dashboard-header">
    <h2>Rekap Data</h2>
</div>

{{-- ======================
   FILTER REKAP (NYATU)
====================== --}}
<div class="rekap-filter-box">

    <form method="GET" action="{{ route('rekap.index') }}" class="rekap-filter-form">

        <div>
            <label>Data</label>
            <select name="jenis" class="form-select">
                <option value="absensi" {{ $jenis=='absensi'?'selected':'' }}>
                    Rekap Absensi
                </option>
                <option value="jurnal" {{ $jenis=='jurnal'?'selected':'' }}>
                    Rekap Jurnal Harian
                </option>
                
            </select>
        </div>

        <div>
            <label>Tanggal</label>
            <input type="date" name="dari" value="{{ $dari }}" class="form-control">
        </div>

        <div>
            
            <input type="date" name="sampai" value="{{ $sampai }}" class="form-control">
        </div>

        <div class="btn-wrapper">
            <button class="btn-tampilkan">
                Tampilkan Data
            </button>
        </div>

    </form>

</div>

{{-- HASIL --}}
@if($jenis === 'jurnal')
    @include('kepsek.partials.rekap_jurnal')
@endif

@if($jenis === 'absensi')
    @include('kepsek.partials.rekap_absensi')
@endif

@endsection
