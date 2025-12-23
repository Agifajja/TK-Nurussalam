@extends('layouts.main')

@section('content')

<h4 class="fw-bold mb-4">Pengaturan Akun</h4>

<div class="row g-4">

    {{-- KARTU KIRI --}}
    <div class="col-md-4">
        <div class="card border-0 shadow-sm text-center p-4">

            <div class="profile-avatar mx-auto mb-3">
    <i class="bi bi-person-circle"></i>
</div>


            <h5 class="fw-bold mb-1">
                {{ auth()->user()->nama_guru }}
            </h5>

            <span class="role-badge">
    Guru
</span>


        </div>
    </div>

    {{-- KARTU KANAN --}}
    <div class="col-md-8">
        <div class="card border-0 shadow-sm p-4">

            <div class="mb-3">
                <label class="form-label text-muted">Nama Lengkap</label>
                <input class="form-control"
                       value="{{ auth()->user()->nama_guru }}"
                       readonly>
            </div>

            <div class="mb-3">
                <label class="form-label text-muted">Username</label>
                <input class="form-control"
                       value="{{ auth()->user()->username }}"
                       readonly>
            </div>

            <div class="mb-3">
                <label class="form-label text-muted">Jabatan</label>
                <input class="form-control"
                       value="Guru"
                       readonly>
            </div>

        

        </div>
    </div>

</div>

@endsection
