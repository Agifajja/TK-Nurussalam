@extends('layouts.jurnal')

@section('jurnal-content')
<div class="jurnal-header">
    <h4>Jurnal Harian</h4>
</div>

@forelse($jurnal as $j)
<div class="jurnal-item">

    {{-- KIRI : TEMA --}}
    <div class="jurnal-title">
        {{ $j->tema }}
    </div>

    {{-- KANAN : AKSI --}}
    <div class="d-flex gap-2">

        <a href="{{ route('jurnal.edit', $j->id_jurnal) }}"
           class="btn-icon edit">
        <i class="bi bi-pencil-fill"></i>
        </a>

        <form action="{{ route('jurnal.destroy', $j->id_jurnal) }}"
              method="POST">
            @csrf
            @method('DELETE')

            <button type="button"
        class="btn-icon delete"
        onclick="openDeleteModal('{{ route('jurnal.destroy', $j->id_jurnal) }}')">
    <i class="bi bi-trash-fill"></i>
</button>

        </form>

    </div>
</div>
@empty
<p class="text-muted">Belum ada jurnal.</p>
@endforelse

<a href="{{ route('jurnal.create') }}" class="btn-jurnal-float">
    <i class="bi bi-plus-lg"></i>
</a>


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
