<style>
.absensi-wrap{
    background:#fff;
    border-radius:12px;
    padding:20px;
}

/* HEADER */
.absensi-header{
    background:#e6f6ea;
    border-radius:10px;
    padding:14px;
    display:flex;
    gap:12px;
    align-items:center;
}
.absensi-header img{width:42px}
.absensi-header h4{margin:0;font-weight:600}
.absensi-header span{font-size:13px;color:#555}

/* BOX */
.absensi-box{
    margin:15px 0;
}
.absensi-box input{
    width:200px;
    padding:6px 10px;
}

/* GURU */
.absensi-guru{
    background:#ecfbf1;
    border-radius:10px;
    padding:14px;
    margin-bottom:15px;
}
.status-row{
    display:flex;
    gap:20px;
    margin-top:8px;
}
.status-pill{
    display:flex;
    align-items:center;
    gap:6px;
}

/* LIST */
.absensi-list{
    border:1px solid #e5e7eb;
    border-radius:10px;
}
.absensi-list-head,
.absensi-row{
    display:grid;
    grid-template-columns:2fr repeat(4,1fr);
    padding:10px;
    align-items:center;
}
.absensi-list-head{
    background:#f5f7f8;
    font-weight:600;
}
.absensi-row{
    border-top:1px solid #eee;
}

/* RADIO DOT */
.dot-radio input{display:none}
.dot-radio span{
    width:14px;
    height:14px;
    border:2px solid #999;
    border-radius:50%;
    display:inline-block;
}
.dot-radio input:checked + span{
    background:#198754;
    border-color:#198754;
}

/* BUTTON */
.btn-simpan{
    background:#198754;
    color:white;
    padding:10px 22px;
    border:none;
    border-radius:8px;
    margin-top:15px;
}
</style>
