@extends('layouts.main')

@section('content')

<style>
:root {
    --green-dark: #375B45;
    --green-soft: #D8F1CD;
    --green-text: #0B2D21;
    --green-muted: #74977E;
}
/* SHADOW BARIS SISWA */
.row-shadow td {
    box-shadow: 0 4px 8px rgba(0,0,0,0.08);
}

/* PAGE */
.datasiswa-page {
    padding: 24px;
}

/* HEADER */
.datasiswa-header {
    background: var(--green-soft);
    border-radius: 42px;
    padding: 18px 28px;
    font-weight: 700;
    font-size: 20px;
    color: rgba(11,45,33,0.8);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* BODY */
.datasiswa-body {
    margin-top: 24px;
}

/* BUTTON TAMBAH */
.btn-add {
    background: var(--green-dark);
    color: white;
    padding: 14px 26px;
    border-radius: 40px;
    font-weight: 600;
    text-decoration: none;
    display: inline-block;
}

/* TABLE */
.data-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0 12px;
    margin-top: 18px;
}

.data-table th {
    text-align: left;
    padding: 12px;
    font-weight: 700;
    color: var(--green-muted);
}

.data-table td {
    background: var(--green-soft);
    padding: 14px;
    font-weight: 700;
    color: var(--green-dark);
}

.data-table tr td:first-child {
    border-top-left-radius: 27px;
    border-bottom-left-radius: 27px;
}

.data-table tr td:last-child {
    border-top-right-radius: 27px;
    border-bottom-right-radius: 27px;
}

/* AKSI */
.aksi {
    display: flex;
    gap: 10px;
}

.aksi button,
.aksi a {
    background: none;
    border: none;
    cursor: pointer;
    font-size: 16px;
}

/* FORM */
.form-card {
    background: var(--green-soft);
    border-radius: 27px;
    padding: 24px;
}

/* =========================
   FORM HORIZONTAL (Nama : Input)
========================= */
.form-row {
    display: flex;
    align-items: center;
    margin-bottom: 14px;
}

.form-row label {
    width: 180px;
    font-weight: 600;
    color: var(--green-dark);
}

.form-row input,
.form-row textarea {
    flex: 1;
    border: none;
    background: transparent;
    border-bottom: 1px solid rgba(55,91,69,0.4);
    padding: 6px 4px;
    color: var(--green-dark);
    font-size: 14px;
}


/* SAVE */
.form-action {
    display: flex;
    justify-content: flex-end;
    margin-top: 20px;
}

.btn-save {
    background: var(--green-dark);
    color: white;
    border: none;
    border-radius: 27px;
    padding: 12px 32px;
    font-weight: 600;
    cursor: pointer;
}

</style>

<div class="datasiswa-page">

    <div class="datasiswa-header">
        <span>@yield('title')</span>
        @yield('header-action')
    </div>

    <div class="datasiswa-body">
        @yield('datasiswa-content')
    </div>

</div>

@endsection
