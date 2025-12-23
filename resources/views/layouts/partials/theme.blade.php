<style>
/* =========================
   ROOT (FIGMA COLOR)
========================= */
:root {
    --sidebar: #375B45;
    --sidebar-hover: rgba(255,255,255,0.3);
    --card: #D8F1CD;
    --text: #0B2D21;
}

/* =========================
   GLOBAL
========================= */
body {
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
    color: var(--text);
    background: #ffffff;
    margin: 0;
}

.app {
    display: flex;
    min-height: 100vh;
}

/* =========================
   SIDEBAR
========================= */
.sidebar {
    width: 500px;
    background: var(--sidebar);
    padding: 36px 0;
    color: white;
}

.sidebar-inner {
    max-width: 380px;
    margin-left: 56px;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.sidebar-header {
    text-align: center;
    margin-bottom: 48px;
}

.sidebar-header img {
    width: 120px;
    margin-bottom: 16px;
}

.school-name {
    color: #ffffff;
    font-size: 20px;
    font-weight: 400;
    white-space: nowrap;
}

/* =========================
   MENU SIDEBAR
========================= */
.sidebar-menu {
    display: flex;
    flex-direction: column;
    gap: 14px;
}

.sidebar-menu a {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 16px 22px;
    font-size: 18px;
    font-weight: 400;
    color: white;
    text-decoration: none;
    border-radius: 21px;
    transition: 0.2s ease;
}

.sidebar-menu a.active,
.sidebar-menu a:hover {
    background: var(--sidebar-hover);
}

/* LOGOUT */
.logout {
    margin-top: auto;
}

.logout button {
    width: 100%;
    background: transparent;
    border: none;
    color: white;
    padding: 16px 22px;
    font-size: 18px;
    font-weight: 400;
    border-radius: 21px;
    display: flex;
    align-items: center;
    gap: 16px;
    cursor: pointer;
}

.logout button:hover {
    background: var(--sidebar-hover);
}

/* =========================
   CONTENT
========================= */
.content {
    flex: 1;
    padding: 36px;
    background: #ffffff;
}

/* =========================
   DASHBOARD HEADER
========================= */
.dashboard-header {
    background: var(--card);
    border-radius: 42px;
    padding: 28px 32px;
    margin-bottom: 30px;
}

.dashboard-header h2 {
    font-weight: 700;
    color: rgba(11,45,33,0.8);
}

/* PROFILE */
.profile strong {
    font-weight: 700;
    color: rgba(11,45,33,0.8);
}

.profile small {
    display: inline-block;
    background: var(--card);
    color: rgba(127,169,113,0.8);
    padding: 6px 16px;
    border-radius: 42px;
    font-weight: 600;
}

/* =========================
   INFO CARD (3 KOTAK – FIX RADIUS AMAN)
========================= */
.info-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 22px;
    margin-bottom: 32px;
}

.info-card {
    background: var(--card);
    padding: 28px 28px 28px 44px;
    border-radius: 24px;
    position: relative;
    overflow: hidden; /* 🔥 PENTING: POTONG STRIP SESUAI RADIUS */
    text-decoration: none;
    color: rgba(74,117,60,0.8);
    display: flex;
    flex-direction: column;
    justify-content: center;
}

/* STRIP KIRI */
.info-card::before {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 24px;              /* tebal strip */
    background: #375B45;

    /* radius SAMA dengan card */
    border-top-left-radius: 24px;
    border-bottom-left-radius: 24px;
}

.info-card span {
    font-weight: 400;
}

.info-card h3,
.info-card h4 {
    font-weight: 700;
    color: #0B2D21;
    margin: 8px 0;
}

/* STATUS */
.status-warning {
    color: #E6350C;
}

.status-success {
    color: #375B45;
}


/* =========================
   TABLE
========================= */
.table-card {
    background: #D8F1CD;
    border-radius: 21px;
    padding: 24px;

    box-shadow:
        0 8px 20px rgba(0, 0, 0, 0.12),
        0 2px 6px rgba(0, 0, 0, 0.08);
}

.table-card h5 {
    font-weight: 700;
    color: #0B2D21;
    margin-bottom: 16px;
}

.table-card table {
    width: 100%;
    border-collapse: collapse;
}

.table-card thead tr {
    background: rgba(55, 91, 69, 0.25);
}

.table-card thead th {
    padding: 12px 14px;
    font-weight: 600;
    border-radius: 0;
    border-bottom: 1px solid rgba(0,0,0,0.4);
}

.table-card tbody td {
    padding: 14px;
    border-bottom: 1px solid rgba(0,0,0,0.35);
}

.table-card tbody tr:last-child td {
    border-bottom: none;
}
/* =========================
   AKTIVITAS TERKINI (KEPSEK)
========================= */
.aktivitas-card {
    background: #D8F1CD;
    border-radius: 27px;
}

.aktivitas-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.aktivitas-list li {
    padding: 14px 0;
    border-bottom: 1px solid rgba(0,0,0,0.25);
    font-size: 15px;
}

.aktivitas-list li:last-child {
    border-bottom: none;
}

.aktivitas-list .time {
    display: inline-block;
    width: 60px;
    font-weight: 600;
    color: rgba(11,45,33,0.7);
}
.aktivitas-card {
    background: #D8F1CD;
    border-radius: 27px;
}

.aktivitas-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.aktivitas-list li {
    padding: 10px 0;
    border-bottom: 1px solid rgba(0,0,0,0.15);
    font-size: 14px;
}

.aktivitas-list li:last-child {
    border-bottom: none;
}

.aktivitas-list .time {
    display: inline-block;
    width: 50px;
    font-weight: 700;
    color: #375B45;
}

/* =========================
   FILTER REKAP DATA
========================= */
.rekap-filter {
    background: #D8F1CD;
    border-radius: 21px;
    padding: 20px;
    margin-bottom: 24px;
}

.rekap-filter label {
    font-weight: 600;
    color: #0B2D21;
}

.rekap-filter input[type="date"] {
    border: none;
    border-bottom: 2px solid #000;
    border-radius: 0;
    background: transparent;
}

.btn-tampilkan {
    background: #345443;
    color: #fff;
    border: none;
    padding: 10px 22px;
    border-radius: 14px;
    font-weight: 600;
}

.btn-tampilkan:hover {
    background: #2c4738;
}

/* =========================
   FILTER REKAP NYATU
========================= */
.rekap-filter-box {
    background: #D8F1CD;
    border-radius: 24px;
    padding: 24px;
    margin-bottom: 28px;
}

.rekap-filter-form {
    background: #D8F1CD;
    display: grid;
    grid-template-columns: 2fr 1fr 1fr auto;
    gap: 18px;
    align-items: end;
}

.rekap-filter-box label {
    font-weight: 500;
    margin-bottom: 6px;
}

/* TOMBOL TAMPILKAN */
.btn-tampilkan {
    background: #345443;
    color: white;
    border: none;
    padding: 10px 22px;
    border-radius: 12px;
    font-weight: 600;
}

.btn-tampilkan:hover {
    background: #2c4a3a;
}

/* =========================
   REKAP BOX
========================= */
.rekap-box {
    background: #D8F1CD;
    border-radius: 24px;
    padding: 24px;
    margin-bottom: 28px;
}

/* GARIS PEMISAH */
.divider {
    border-top: 2px solid #000;
    opacity: 0.5;
    margin: 12px 0 18px;
}

/* PDF BUTTON */
.btn-pdf {
    position: absolute;
    right: 20px;
    bottom: 20px;
    background: #345443;
    color: white;
    padding: 8px 14px;
    border-radius: 10px;
    font-size: 13px;
    text-decoration: none;
}

.btn-pdf:hover {
    background: #2c4a3a;
}

.avatar {
    width: 60px;
    height: 60px;
    background: #000;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.avatar i {
    font-size: 60px;
    color: #fff;
}

/* =========================
   PROFILE PAGE
========================= */

/* AVATAR */
.profile-avatar {
    width: 140px;
    height: 140px;
    background: #B8D4AD;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.profile-avatar i {
    font-size: 150px;
    color: #ffffff;
}

/* ROLE BADGE */
.role-badge {
    display: inline-block;
    background: #B8D4AD;
    color: #0B2D21;
    padding: 8px 20px;
    border-radius: 42px;
    font-weight: 600;
    font-size: 14px;
}

/* =========================
   AKSI ICON SISWA
========================= */
.aksi {
    display: flex;
    justify-content: center;
    gap: 14px;
}

.btn-icon {
    background: transparent;
    border: none;
    padding: 6px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.btn-icon i {
    font-size: 18px;
    color: #375B45;
    transition: transform 0.2s ease, opacity 0.2s ease;
}

/* hover effect */
.btn-icon:hover i {
    transform: scale(1.15);
    opacity: 0.8;
}
/* =========================
   DIALOG KONFIRMASI HAPUS
========================= */
.modal-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.15); /* 🔥 TIPIS */
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 9999;
}

.modal-box {
    background: #ffffff;
    border-radius: 16px;
    padding: 18px 24px;
    min-width: 280px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    animation: scaleIn .15s ease;
}

@keyframes scaleIn {
    from {
        transform: scale(0.9);
        opacity: 0;
    }
    to {
        transform: scale(1);
        opacity: 1;
    }
}

.modal-text {
    font-size: 14px;
    font-weight: 500;
    color: #222;
    margin-bottom: 14px;
    text-align: center;
}

.modal-actions {
    display: flex;
    justify-content: center;
    gap: 16px;
}

/* OK */
.btn-ok {
    background: transparent;
    border: none;
    color: #333;
    font-size: 13px;
    font-weight: 700;
    cursor: pointer;
}

/* BATAL */
.btn-cancel {
    background: transparent;
    border: none;
    color: #5F1A1B;
    font-size: 13px;
    font-weight: 700; /* 🔥 BOLD */
    cursor: pointer;
}
/* ===== SUCCESS MODAL ===== */
.success-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.45);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.success-modal {
    background: white;
    width: 420px;
    padding: 40px 30px;
    border-radius: 20px;
    text-align: center;
    position: relative;
    box-shadow: 0 20px 40px rgba(0,0,0,0.2);
}

.success-modal h3 {
    color: #375B45;
    font-weight: 700;
    font-size: 22px;
}

/* CLOSE */
.close-modal {
    position: absolute;
    top: 16px;
    right: 16px;
    font-size: 20px;
    color: #375B45;
    text-decoration: none;
}

.close-modal:hover {
    color: #1e3b2a;
}
.rekap-filter-form select,
.rekap-filter-form input[type="date"] {
    background-color: #D8F1CD;
    border: 1px solid #9FCF9B;
    color: #000;
    font-weight: 500;
}

.rekap-filter-form select:focus,
.rekap-filter-form input[type="date"]:focus {
    background-color: #D8F1CD;
    border-color: #375B45;
    box-shadow: none;
}
/* HEADER */
.jurnal-header h4{
    font-weight: 600;
    color:#1E3A2F;
}

/* FORM CARD */
.jurnal-form{
    background:#FFFFFF;
    padding:24px;
    border-radius:14px;
    box-shadow:0 6px 18px rgba(0,0,0,.08);
}

/* GRID */
.jurnal-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:16px;
}

/* FIELD */
.jurnal-field{
    display:flex;
    flex-direction:column;
}

.jurnal-label{
    font-size:13px;
    font-weight:500;
    color:#6B8F7B;
    margin-bottom:6px;
}

/* INPUT / TEXTAREA (EDIT & SHOW SAMA) */
.jurnal-box{
    background:#D8F1CD;
    border:1px solid #375B45;
    border-radius:10px;
    padding:10px 12px;
    font-size:14px;
    color:#1E3A2F;
}

/* READONLY TIDAK TERLIHAT DISABLE */
.jurnal-box[readonly]{
    background:#D8F1CD;
    color:#1E3A2F;
    cursor:default;
}

/* TEXTAREA */
.jurnal-box textarea{
    resize:none;
}

/* FILE PREVIEW & UPLOAD */
.file-preview,
.jurnal-upload{
    display:flex;
    align-items:center;
    gap:10px;
    background:#D8F1CD;
    border:1px dashed #375B45;
    border-radius:10px;
    padding:12px;
    cursor:pointer;
    font-size:14px;
    color:#1E3A2F;
}

.jurnal-upload.has-file{
    border-style:solid;
}

/* FLOAT BUTTON */
.btn-save-float{
    position:fixed;
    bottom:24px;
    right:24px;
    width:52px;
    height:52px;
    border-radius:50%;
    background:#2F6F4E;
    color:#fff;
    border:none;
    font-size:20px;
    box-shadow:0 8px 20px rgba(0,0,0,.25);
}
/* OVERRIDE WARNA SAJA */
.jurnal-box,
.jurnal-upload,
.file-preview{
    background-color:#FFFFFF !important;
}
.jurnal-form{
    position:relative; /* WAJIB */
}

.btn-close-jurnal{
    position:absolute;
    top:14px;
    right:14px;
    width:32px;
    height:32px;
    border-radius:50%;
    border:1px solid #000;
    background:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
    color:#000;
    text-decoration:none;
    transition:.2s;
}

.btn-close-jurnal:hover{
    background:#000;
    color:#fff;
}

</style>
