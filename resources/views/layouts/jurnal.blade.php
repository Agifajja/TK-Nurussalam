@extends('layouts.main')

@section('content')
<style>
/* =========================
   GLOBAL
   ========================= */
body{
    background:#f5f5f5;
    font-family:'Poppins', sans-serif;
}

/* =========================
   WRAPPER
   ========================= */
.jurnal-wrap{
    padding:30px;
    max-width:1100px;
}

/* =========================
   HEADER
   ========================= */
.jurnal-header{
    background:#D8F1CD;
    border-radius:32px;
    padding:20px 28px;
    margin-bottom:20px;
}

.jurnal-header h4{
    margin:0;
    font-weight:800;
    color:#1f2937;
}

/* =========================
   FORM CARD
   ========================= */
.jurnal-form{
    background:#fff;
    border-radius:24px;
    padding:26px;
}

/* =========================
   GRID ATAS (TANGGAL + TEMA)
   ========================= */
.jurnal-grid{
    display:grid;
    grid-template-columns:1fr 2fr;
    gap:20px;
    margin-bottom:22px;
}

/* =========================
   FIELD
   ========================= */
.jurnal-field{
    display:flex;
    flex-direction:column;
    gap:6px;
}

/* LABEL */
.jurnal-label{
    font-size:13px;
    font-weight:700;
    color:#375B45;
}

/* BOX GARIS HITAM */
.jurnal-box{
    border:2px solid #000;
    border-radius:16px;
    padding:12px 14px;
    font-size:14px;
    font-weight:600;
    background:#fff;
}

.jurnal-box:focus{
    outline:none;
    border-color:#375B45;
}

/* KHUSUS TEMA */
.jurnal-box.tema{
    color:#375B45;
    font-weight:800;
}

/* TEXTAREA */
.jurnal-box.textarea{
    resize:none;
}

/* =========================
   UPLOAD
   ========================= */
.jurnal-upload{
    border:2px dashed #cfd8dc;
    border-radius:16px;
    padding:20px;
    text-align:center;
    font-weight:600;
    cursor:pointer;
    transition:.2s;
}

.jurnal-upload:hover{
    background:#f8f9fa;
}

/* =========================
   BUTTON
   ========================= */
.btn-jurnal{
    background:#375B45;
    color:#fff;
    padding:14px;
    border-radius:22px;
    font-weight:800;
    border:none;
}

.btn-jurnal:hover{
    background:#2f4f3d;
}

/* =========================
   LIST (INDEX)
   ========================= */
.jurnal-item{
    background:#E7F8E7;
    border-radius:20px;
    padding:18px 22px;
    margin-bottom:14px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.jurnal-title{
    font-weight:800;
    color:#1f2937;
}

.jurnal-desc{
    font-size:13px;
    color:#374151;
}

/* =========================
   FLOAT BUTTON
   ========================= */
.btn-jurnal-float{
    position:fixed;
    bottom:30px;
    right:30px;
    width:60px;
    height:60px;
    border-radius:50%;
    background:#375B45;
    color:#fff;
    font-size:32px;
    display:flex;
    align-items:center;
    justify-content:center;
    box-shadow:0 10px 25px rgba(0,0,0,.25);
}

.jurnal-item{
    position:relative;
    z-index:1;
}
/* FLOAT SAVE BUTTON */
.btn-save-float{
    position:fixed;
    bottom:30px;
    right:30px;
    width:60px;
    height:60px;
    border-radius:50%;
    background:#375B45;
    color:#fff;
    font-size:28px;
    display:flex;
    align-items:center;
    justify-content:center;
    border:none;
    box-shadow:0 10px 25px rgba(0,0,0,.25);
    z-index:999;
}

.btn-save-float:hover{
    background:#2f4f3d;
}
/* UPLOAD FILE (SOLID BLACK) */
.jurnal-upload{
    border:2px solid #000;   /* ⬅ ganti dari dashed */
    border-radius:16px;
    padding:16px;
    text-align:center;
    font-weight:700;
    cursor:pointer;
    transition:.2s;
    background:#fff;
}

.jurnal-upload.has-file{
    color:#375B45;
    font-weight:800;
}

</style>

<div class="jurnal-wrap">
    @yield('jurnal-content')
</div>
@endsection
