{{-- =====================================================
   REKAP ABSENSI GURU
===================================================== --}}
<div class="table-card mb-4">

    <div class="d-flex align-items-center gap-2 mb-3">
        <i class="bi bi-person-check fs-5"></i>
        <h5 class="mb-0">Rekap Absensi Guru</h5>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nama Guru</th>
                <th class="text-center">Hadir</th>
                <th class="text-center">Sakit</th>
                <th class="text-center">Izin</th>
                <th class="text-center">Alfa</th>
            </tr>
        </thead>
        <tbody>
            @forelse($absensiGuru->groupBy('id_guru') as $g)
                <tr>
                    <td>{{ $g->first()->guru->nama_guru ?? '-' }}</td>
                    <td class="text-center">{{ $g->where('id_status',1)->count() }}</td>
                    <td class="text-center">{{ $g->where('id_status',2)->count() }}</td>
                    <td class="text-center">{{ $g->where('id_status',3)->count() }}</td>
                    <td class="text-center">{{ $g->where('id_status',4)->count() }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        Tidak ada data absensi guru
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>


{{-- =====================================================
   REKAP ABSENSI SISWA
===================================================== --}}
<div class="table-card position-relative">

    {{-- HEADER + FILTER KELAS --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="d-flex align-items-center gap-2">
            <i class="bi bi-people fs-5"></i>
            <h5 class="mb-0">Rekap Absensi Siswa</h5>
        </div>

        <form method="GET" action="{{ route('rekap.index') }}">
    <select name="kelas_id"
            class="form-select form-select-sm"
            style="width: 180px"
            onchange="this.form.submit()">
        <option value="">Semua Kelas</option>

        @foreach($kelasList as $kelas)
            <option value="{{ $kelas->id_kelas }}"
                {{ request('kelas_id') == $kelas->id_kelas ? 'selected' : '' }}>
                {{ $kelas->nama_kelas }}
            </option>
        @endforeach
    </select>
</form>

    </div>

    {{-- TABLE --}}
    <table>
        <thead>
            <tr>
                <th>Nama Siswa</th>
                <th class="text-center">Hadir</th>
                <th class="text-center">Sakit</th>
                <th class="text-center">Izin</th>
                <th class="text-center">Alfa</th>
            </tr>
        </thead>
        <tbody>
            @forelse($absensiSiswa->groupBy('id_siswa') as $s)
                <tr>
                    <td>{{ $s->first()->siswa->nama_siswa ?? '-' }}</td>
                    <td class="text-center">{{ $s->where('id_status',1)->count() }}</td>
                    <td class="text-center">{{ $s->where('id_status',2)->count() }}</td>
                    <td class="text-center">{{ $s->where('id_status',3)->count() }}</td>
                    <td class="text-center">{{ $s->where('id_status',4)->count() }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        Tidak ada data absensi siswa
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- TOMBOL UNDUH DI BAWAH --}}
    <div class="d-flex justify-content-end mt-3">
        <button type="button"
                class="btn btn-sm btn-outline-dark"
                data-bs-toggle="modal"
                data-bs-target="#modalDownload">
            <i class="bi bi-download"></i> Unduh Rekap
        </button>
    </div>

</div>


{{-- =====================================================
   MODAL DOWNLOAD (PDF / EXCEL)
===================================================== --}}
<div class="modal fade" id="modalDownload" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4">

            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold">Unduh File</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">
                <p class="fw-semibold mb-1">Laporan Kehadiran Bulanan</p>
                <p class="text-muted mb-4">Rekap Absensi Siswa</p>

                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('rekap.download.pdf', request()->all()) }}"
                       class="btn btn-outline-danger px-4">
                        <i class="bi bi-file-earmark-pdf"></i> PDF
                    </a>

                    <a href="{{ route('rekap.download.excel', request()->all()) }}"
                       class="btn btn-outline-success px-4">
                        <i class="bi bi-file-earmark-excel"></i> Excel
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
