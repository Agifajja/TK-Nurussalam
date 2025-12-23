<?php

namespace App\Http\Controllers;

use App\Models\AbsensiLog;
use App\Models\StatusKehadiran;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    /**
     * =========================
     * HALAMAN ABSENSI HARIAN
     * =========================
     */
    public function index()
    {
        $guru  = Auth::user();
        $kelas = $guru->kelas;

        if (!$kelas) {
            return view('absensi.index', [
                'kelas'   => null,
                'siswas'  => collect(),
                'status'  => collect(),
                'message' => 'Anda belum memiliki kelas'
            ]);
        }

        return view('absensi.index', [
            'kelas'  => $kelas,
            'siswas' => $kelas->siswas,
            'status' => StatusKehadiran::all(),
        ]);
    }

    /**
     * =========================
     * SIMPAN ABSENSI
     * =========================
     */
    public function store(Request $request)
    {
        $guru = Auth::user();

        $request->validate([
            'jam_masuk'   => 'required',
            'status_guru' => 'required',
            'id_siswa'    => 'required|array',
        ]);

        // ======================
        // ABSENSI GURU
        // ======================
        AbsensiLog::updateOrCreate(
            [
                'tanggal'    => now()->toDateString(),
                'jenis_user' => 'GURU',
                'id_guru'    => $guru->id_guru,
            ],
            [
                'id_status' => $request->status_guru,
                'jam_masuk' => $request->jam_masuk,
            ]
        );

        // ======================
        // ABSENSI SISWA
        // ======================
        foreach ($request->id_siswa as $id_siswa) {
            AbsensiLog::updateOrCreate(
                [
                    'tanggal'    => now()->toDateString(),
                    'jenis_user' => 'SISWA',
                    'id_siswa'   => $id_siswa,
                ],
                [
                    'id_guru'   => $guru->id_guru,
                    'id_status' => $request->status[$id_siswa] ?? null,
                    'jam_masuk' => $request->jam_masuk,
                ]
            );
        }

        return redirect()
            ->route('absensi.index')
            ->with('success', 'Absensi berhasil disimpan');
    }

    /**
     * =========================
     * REKAP ABSENSI
     * =========================
     */
    public function rekap(Request $request)
    {
        $kelasList = Kelas::orderBy('nama_kelas')->get();

        // ======================
        // REKAP ABSENSI GURU
        // ======================
        $absensiGuru = AbsensiLog::with('guru')
            ->where('jenis_user', 'GURU')
            ->whereMonth('tanggal', now()->month)
            ->whereYear('tanggal', now()->year)
            ->get();

        // ======================
        // REKAP ABSENSI SISWA (FILTER KELAS)
        // ======================
        $absensiSiswa = AbsensiLog::with('siswa.kelas')
            ->where('jenis_user', 'SISWA')
            ->when($request->kelas_id, function ($q) use ($request) {
                $q->whereHas('siswa', function ($s) use ($request) {
                    $s->where('kelas_id', $request->kelas_id);
                });
            })
            ->whereMonth('tanggal', now()->month)
            ->whereYear('tanggal', now()->year)
            ->get();

        return view('absensi.rekap', compact(
            'absensiGuru',
            'absensiSiswa',
            'kelasList'
        ));
    }

    /**
     * =========================
     * DOWNLOAD PDF
     * =========================
     */
    public function downloadPdf(Request $request)
    {
        $data = $this->getDataDownload($request);

        // contoh (sesuaikan lib PDF kamu)
        // return Pdf::loadView('absensi.pdf', $data)->download('rekap-absensi.pdf');

        return view('absensi.pdf', $data);
    }

    /**
     * =========================
     * DOWNLOAD EXCEL
     * =========================
     */
    public function downloadExcel(Request $request)
    {
        $data = $this->getDataDownload($request);

        // contoh (Maatwebsite Excel)
        // return Excel::download(new RekapAbsensiExport($data), 'rekap-absensi.xlsx');

        return response()->json($data);
    }

    /**
     * =========================
     * DATA BERSAMA DOWNLOAD
     * =========================
     */
    private function getDataDownload(Request $request)
    {
        return [
            'absensiSiswa' => AbsensiLog::with('siswa.kelas')
                ->where('jenis_user', 'SISWA')
                ->when($request->kelas_id, function ($q) use ($request) {
                    $q->whereHas('siswa', function ($s) use ($request) {
                        $s->where('kelas_id', $request->kelas_id);
                    });
                })
                ->whereMonth('tanggal', now()->month)
                ->whereYear('tanggal', now()->year)
                ->get(),

            'kelas' => Kelas::find($request->kelas_id),
            'bulan' => now()->translatedFormat('F Y'),
        ];
    }
}
