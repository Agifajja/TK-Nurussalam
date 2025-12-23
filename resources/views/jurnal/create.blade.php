@extends('layouts.jurnal')

@section('jurnal-content')
<div class="jurnal-header">
    <h4>Jurnal Harian</h4>
</div>

<div class="jurnal-form">
<form action="{{ route('jurnal.store') }}" method="POST" enctype="multipart/form-data">
@csrf

{{-- TANGGAL + TEMA --}}
<div class="jurnal-grid">

    <div class="jurnal-field">
        <label class="jurnal-label">Tanggal</label>
        <input type="date"
               name="tanggal"
               class="jurnal-box">
    </div>

    <div class="jurnal-field">
        <label class="jurnal-label">Tema Jurnal</label>
        <input type="text"
               name="tema"
               class="jurnal-box tema"
               placeholder="Isi tema jurnal">
    </div>

</div>

{{-- DESKRIPSI --}}
<div class="jurnal-field mb-4">
    <label class="jurnal-label">Deskripsi</label>
    <textarea name="deskripsi_kegiatan"
              rows="4"
              class="jurnal-box"
              placeholder="Deskripsi kegiatan..."></textarea>
</div>

<div class="jurnal-field mb-4">
    <label class="jurnal-label">Dokumentasi</label>

    <label class="jurnal-upload" id="uploadBox">
        <span id="uploadText">Upload File</span>
        <input type="file"
               name="file_dokumentasi"
               id="fileInput"
               hidden>
    </label>

    
</div>

<script>
document.getElementById('fileInput').addEventListener('change', function(){
    const text = document.getElementById('uploadText');
    const box  = document.getElementById('uploadBox');

    if(this.files.length > 0){
        text.textContent = this.files[0].name;
        box.classList.add('has-file');
    }
});
</script>


<button class="btn-save-float" type="submit">
    <i class="bi bi-check-lg"></i>
</button>

</form>
</div>
@endsection
