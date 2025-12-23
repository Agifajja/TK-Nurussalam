@extends('layouts.datasiswa')

@section('title', 'Data Siswa – ' . $kelas->nama_kelas)


@section('datasiswa-content')

<a href="{{ route('siswa.create') }}" class="btn-add">
    + Tambah Siswa
</a>

<table class="data-table">
    <thead>
        <tr>
            <th width="60">No</th>
            <th>Nama</th>
            <th width="120"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($siswas as $i => $s)
        <tr class="row-shadow">
            <td>{{ $i + 1 }}</td>
            <td>{{ $s->nama_siswa }}</td>
            <td class="aksi">
    <!-- EDIT -->
    <a href="{{ route('siswa.edit',$s->id_siswa) }}" class="btn-icon edit">
        <i class="bi bi-pencil-fill"></i>
    </a>

    <!-- HAPUS -->
    <form action="{{ route('siswa.destroy',$s->id_siswa) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="button" class="btn-icon delete"
        onclick="openDeleteModal('{{ route('siswa.destroy', $s->id_siswa) }}')">
    <i class="bi bi-trash-fill"></i>
</button>

    </form>
</td>

        </tr>
        @endforeach
    </tbody>
</table>


{{-- MODAL KONFIRMASI HAPUS --}}
<div id="deleteModal" class="modal-overlay">
    <div class="modal-box">
        <p class="modal-text">
    Apakah anda yakin ingin menghapus?
</p>

        <div class="modal-actions">
            <button class="btn-ok" onclick="submitDelete()">OK</button>
            <button class="btn-cancel" onclick="closeDeleteModal()">Batal</button>
        </div>

        <form id="deleteForm" method="POST" style="display:none;">
            @csrf
            @method('DELETE')
        </form>
    </div>
</div>

@if(session('success'))
<div class="modal fade" id="modalSuccess" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4">

      <div class="modal-header border-0">
        <button type="button"
                class="btn-close"
                data-bs-dismiss="modal"></button>
      </div>

      <!-- PERBAIKAN DI SINI -->
      <div class="modal-body d-flex align-items-center justify-content-center"
           style="min-height:180px;">
        <h3 class="fw-bold text-center m-0" style="color:#375B45">
            {{ session('success') }}
        </h3>
      </div>

    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    new bootstrap.Modal(
        document.getElementById('modalSuccess')
    ).show();
});
</script>
@endif

<script>
    let deleteUrl = '';

    function openDeleteModal(url) {
        deleteUrl = url;
        document.getElementById('deleteModal').style.display = 'flex';
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').style.display = 'none';
        deleteUrl = '';
    }

    function submitDelete() {
        const form = document.getElementById('deleteForm');
        form.action = deleteUrl;
        form.submit();
    }
</script>

@endsection
