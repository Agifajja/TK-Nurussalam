<div class="table-card">

    <h5>
        <i class="bi bi-journal-text"></i>
        Rekap Jurnal Harian
    </h5>

    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Guru</th>
                <th>Kelas</th>
                <th>Tema</th>
                <th style="width:80px;text-align:center">Detail</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jurnal as $j)
            <tr>
                <td>{{ $j->tanggal }}</td>
                <td>{{ $j->guru->nama_guru }}</td>
                <td>{{ $j->kelas->nama_kelas }}</td>
                <td>{{ $j->tema }}</td>
                <td style="text-align:center">
    <a href="{{ route('kepsek.jurnal.show', $j->id_jurnal) }}"
       class="btn btn-sm"
       style="background:#345443;color:#fff">
        <i class="bi bi-eye"></i>
    </a>
</td>

            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align:center;color:#666">
                    Tidak ada data jurnal
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
