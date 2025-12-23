@extends('layouts.main')

@section('content')
<style>
body{
    background:#f5f5f5;
    font-family:'Poppins',sans-serif;
}

.absensi-wrap{
    padding:30px;
}

/* HEADER */
.absensi-header{
    background:#D8F1CD;
    border-radius:32px;
    padding:20px 28px;
    margin-bottom:16px;
}

.absensi-header h4{
    margin:0;
    font-weight:800;
}

/* INFO MANUAL */
.info-manual-wrap{
    display:flex;
    gap:16px;
    margin-bottom:24px;
}

.info-manual{
    background:#fff;
    border-radius:16px;
    padding:12px 16px;
    min-width:220px;
    display:flex;
    flex-direction:column;
    gap:6px;

    /* 🔥 GARIS KOTAK HITAM */
    border:2px solid #000;
}

.info-manual input{
    border:none;
    outline:none;
    font-size:14px;
    font-weight:600;
    color:#000;
    background:transparent;
}

/* SAAT DI KLIK */
.info-manual:focus-within{
    border-color:#375B45;
}


.info-label{
    font-size:13px;
    font-weight:700;
    color:#375B45;
}
/* ABSENSI GURU */
.absensi-guru{
    background:#D8F1CD;
    border-radius:20px;
    padding:18px 24px;
    margin-bottom:22px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.status-row{
    display:flex;
    gap:10px;
}

.status-pill{
    background:#fff;
    padding:8px 18px;
    border-radius:30px;
    font-weight:700;
}

/* TABEL */
.absensi-list-head{
    background:#375B45;
    color:#fff;
    font-weight:700;
    display:grid;
    grid-template-columns:3fr repeat(4,1fr);
    padding:14px 18px;
    border-radius:18px 18px 0 0;
}

.absensi-row{
    display:grid;
    grid-template-columns:3fr repeat(4,1fr);
    padding:14px 18px;
    background:#fff;
    font-weight:700;
    border-bottom:1px solid #ddd;
}

.absensi-row input[type=radio]{
    transform:scale(1.2);
}

/* SIMPAN */
.simpan-wrap{
    display:flex;
    justify-content:flex-end;
    margin-top:24px;
}

.btn-simpan{
    background:#375B45;
    color:#fff;
    padding:12px 34px;
    border-radius:22px;
    font-weight:800;
    border:none;
}
</style>

<div class="absensi-wrap">
    @yield('absensi-content')
</div>
@endsection
