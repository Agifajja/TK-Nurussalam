@extends('layouts.kepsek')

@section('content')

<div class="dashboard-header d-flex justify-content-between align-items-center">
    <h2>Rekap Data</h2>
</div>

<div class="jurnal-form">
<a href="{{ url()->previous() }}" class="btn-close-jurnal">
    <i class="bi bi-x-lg"></i>
</a>

    {{-- TANGGAL + TEMA --}}
    <div class="jurnal-grid">

        <div class="jurnal-field">
            <label class="jurnal-label">Tanggal</label>
            <input type="date"
                   value="{{ $jurnal->tanggal }}"
                   class="jurnal-box"
                   readonly>
        </div>

        <div class="jurnal-field">
            <label class="jurnal-label">Tema Jurnal</label>
            <input type="text"
                   value="{{ $jurnal->tema }}"
                   class="jurnal-box tema"
                   readonly>
        </div>

    </div>

    {{-- DESKRIPSI --}}
    <div class="jurnal-field mb-4">
        <label class="jurnal-label">Deskripsi</label>
        <textarea rows="4"
                  class="jurnal-box"
                  readonly>{{ $jurnal->deskripsi_kegiatan }}</textarea>
    </div>

    {{-- DOKUMENTASI (PREVIEW FILE) --}}
    <div class="jurnal-field">
        <label class="jurnal-label">File</label>

        @if($jurnal->file_dokumentasi)
            <div class="file-preview">
                <i class="bi bi-file-earmark-text"></i>
                <a href="{{ asset('storage/'.$jurnal->file_dokumentasi) }}"
                   target="_blank">
                   Lihat File Dokumentasi
                </a>
            </div>
        @else
            <span class="text-muted">Tidak ada file</span>
        @endif
    </div>

</div>

@endsection
