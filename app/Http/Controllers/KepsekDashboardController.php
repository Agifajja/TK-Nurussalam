<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\AbsensiLog;
use App\Models\StatusKehadiran;
use App\Models\JurnalHarian;
use Carbon\Carbon;

class KepsekDashboardController extends Controller
{
    public function index()
    {
        // ======================
        // VALIDASI ROLE
        // ======================
        if (auth()->user()->role !== 'Kepala Sekolah') {
            abort(403);
        }

        // ======================
        // TOTAL SISWA & GURU
        // ======================
        $totalSiswa = Siswa::count();

        // HANYA guru (bukan kepsek)
        $totalGuru = Guru::where('role', 'Guru')->count();

        // ======================
        // STATUS HADIR
        // ======================
        $idHadir = StatusKehadiran::where('nama_status', 'Hadir')
            ->value('id_status');

        // ======================
        // GURU HADIR HARI INI (UNIK)
        // ======================
        $guruHadir = AbsensiLog::whereDate('tanggal', Carbon::today())
            ->whereNotNull('id_guru')
            ->where('id_status', $idHadir)
            ->distinct('id_guru')   // 🔥 INI KUNCI UTAMA
            ->count('id_guru');

        // ======================
        // PERSENTASE KEHADIRAN (MAX 100%)
        // ======================
        $persenKehadiran = $totalGuru > 0
            ? round(($guruHadir / $totalGuru) * 100)
            : 0;

        // ======================
        // AKTIVITAS ABSEN (LOG)
        // ======================
        $aktivitasAbsen = AbsensiLog::with(['guru.kelas'])
    ->whereNotNull('id_guru')
    ->whereDate('tanggal', Carbon::today())
    ->select('id_guru')
    ->selectRaw('MAX(created_at) as waktu')
    ->groupBy('id_guru')
    ->orderByDesc('waktu')
    ->limit(5)
    ->get()
    ->map(function ($item) {
        $absen = AbsensiLog::with(['guru.kelas'])
            ->where('id_guru', $item->id_guru)
            ->latest()
            ->first();

        return [
            'waktu' => $absen->created_at,
            'nama'  => $absen->guru->nama_guru ?? '-',
            'kelas' => $absen->guru->kelas->nama_kelas ?? '-',
            'aksi'  => 'Mengisi Absen',
        ];
    });


        // ======================
        // AKTIVITAS JURNAL
        // ======================
        $aktivitasJurnal = JurnalHarian::with(['guru.kelas'])
            ->latest()
            ->limit(5)
            ->get()
            ->map(function ($item) {
                return [
                    'waktu' => $item->created_at,
                    'nama'  => $item->guru->nama_guru ?? '-',
                    'kelas' => $item->kelas->nama_kelas ?? '-',
                    'aksi'  => 'Mengisi Jurnal Harian',
                ];
            });

        // ======================
        // GABUNG & SORT
        // ======================
        $aktivitas = $aktivitasAbsen
            ->merge($aktivitasJurnal)
            ->sortByDesc('waktu')
            ->take(5)
            ->values();

        return view('kepsek.dashboard', compact(
            'totalSiswa',
            'totalGuru',
            'guruHadir',
            'persenKehadiran',
            'aktivitas'
        ));
    }
}
