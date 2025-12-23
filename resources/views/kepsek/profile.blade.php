@extends('layouts.kepsek')

@section('content')
<h4 class="fw-bold mb-4">Pengaturan Akun</h4>

<div class="row g-4">

    <div class="col-md-4">
        <div class="card border-0 shadow-sm text-center p-4">
            <div class="profile-avatar mx-auto mb-3">
                <i class="bi bi-person-circle"></i>
            </div>

            <h5 class="fw-bold mb-1">
                {{ auth()->user()->nama_guru }}
            </h5>

            <span class="role-badge">
                Kepala Sekolah
            </span>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card border-0 shadow-sm p-4">

            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input class="form-control"
                       value="{{ auth()->user()->nama_guru }}"
                       readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input class="form-control"
                       value="{{ auth()->user()->username }}"
                       readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">Jabatan</label>
                <input class="form-control"
                       value="Kepala Sekolah"
                       readonly>
            </div>

        </div>
    </div>

</div>
@endsection
