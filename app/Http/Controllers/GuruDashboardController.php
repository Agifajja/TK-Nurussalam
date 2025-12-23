<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use App\Models\AbsensiLog;
use App\Models\JurnalHarian;
use Carbon\Carbon;

class GuruDashboardController extends Controller
{
    public function index()
    {
        // =========================
        // DATA GURU LOGIN
        // =========================
        $guru = Auth::user();

        // =========================
        // KELAS YANG DIAMPU GURU
        // (relasi: Guru -> kelas)
        // =========================
        $kelas = $guru->kelas; // pastikan relasi ada di model Guru

        // =========================
        // TANGGAL HARI INI
        // =========================
        $tanggal = Carbon::today();

        // =========================
        // SISWA SESUAI KELAS GURU
        // =========================
        $siswas = $kelas
            ? $kelas->siswas()->orderBy('nama_siswa')->get()
            : collect();

        $jumlahSiswa = $siswas->count();

        // =========================
        // CEK ABSENSI GURU HARI INI
        // =========================
        $sudahAbsen = AbsensiLog::where('jenis_user', 'GURU')
            ->where('id_guru', $guru->id_guru)
            ->whereDate('tanggal', $tanggal)
            ->exists();

        // =========================
        // CEK JURNAL GURU HARI INI
        // =========================
        $sudahJurnal = JurnalHarian::where('id_guru', $guru->id_guru)
            ->whereDate('tanggal', $tanggal)
            ->whereNotNull('tema')
            ->exists();

        // =========================
        // KIRIM KE VIEW
        // =========================
        return view('dashboard', compact(
            'guru',
            'kelas',
            'siswas',
            'jumlahSiswa',
            'sudahAbsen',
            'sudahJurnal'
        ));
    }
}
