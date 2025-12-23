<?php

namespace App\Http\Controllers;

use App\Models\AbsensiLog;
use App\Models\JurnalHarian;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Exports\RekapAbsensiExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class RekapController extends Controller
{
    // ================= HALAMAN REKAP =================
    public function index(Request $request)
    {
        $jenis    = $request->get('jenis', 'absensi');
        $dari     = $request->get('dari', now()->startOfMonth()->toDateString());
        $sampai   = $request->get('sampai', now()->endOfMonth()->toDateString());
        $kelasId  = $request->get('kelas_id');

        // ================= ABSENSI GURU =================
        $absensiGuru = AbsensiLog::with(['guru', 'status'])
            ->where('jenis_user', 'GURU')
            ->whereBetween('tanggal', [$dari, $sampai])
            ->get();

        // ================= ABSENSI SISWA =================
        $absensiSiswa = AbsensiLog::with(['siswa.kelas', 'status'])
            ->where('jenis_user', 'SISWA')
            ->whereBetween('tanggal', [$dari, $sampai])
            ->when($kelasId, function ($q) use ($kelasId) {
                $q->whereHas('siswa', function ($qs) use ($kelasId) {
                    $qs->where('id_kelas', $kelasId);
                });
            })
            ->get();

        // ================= JURNAL =================
        $jurnal = JurnalHarian::with(['guru', 'kelas'])
            ->whereBetween('tanggal', [$dari, $sampai])
            ->get();

        $kelasList = Kelas::orderBy('nama_kelas')->get();

        return view('kepsek.rekap_index', compact(
            'jenis',
            'dari',
            'sampai',
            'kelasId',
            'absensiGuru',
            'absensiSiswa',
            'jurnal',
            'kelasList'
        ));
    }

    // ================= DOWNLOAD PDF =================
    public function downloadPdf(Request $request)
{
    $dari    = $request->dari ?? now()->startOfMonth()->toDateString();
    $sampai  = $request->sampai ?? now()->endOfMonth()->toDateString();
    $kelasId = $request->kelas_id;

    // ================= ABSENSI SISWA =================
    $absensi = AbsensiLog::with(['siswa.kelas', 'status'])
        ->where('jenis_user', 'SISWA')
        ->whereBetween('tanggal', [$dari, $sampai])
        ->when($kelasId, function ($q) use ($kelasId) {
            $q->whereHas('siswa', function ($qs) use ($kelasId) {
                $qs->where('id_kelas', $kelasId);
            });
        })
        ->orderBy('tanggal')
        ->get();

    // ================= KELAS & WALI =================
    $kelas = null;
    $waliKelas = null;

    if ($kelasId) {
        $kelas = Kelas::with('guru')->where('id_kelas', $kelasId)->first();
        $waliKelas = $kelas?->guru?->nama_guru;
    }

    return Pdf::loadView('kepsek.pdf.rekap_absensi', [
        'absensi'   => $absensi,
        'dari'      => $dari,
        'sampai'    => $sampai,
        'kelas'     => $kelas,
        'waliKelas' => $waliKelas,
    ])
    ->setPaper('A4', 'landscape')
    ->download('rekap-absensi.pdf');
}

    // ================= DOWNLOAD EXCEL =================
    public function download(Request $request)
{
    return Excel::download(
        new RekapAbsensiExport(
            $request->dari,
            $request->sampai,
            $request->kelas_id // ⬅️ HARUS kelas_id
        ),
        'rekap-absensi-siswa.xlsx'
    );
}

}
