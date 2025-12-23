<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function index()
    {
        $guru = Auth::user();
    $kelas = $guru->kelas; // 🔥 INI YANG KURANG

    $siswas = Siswa::where('id_kelas', $kelas->id_kelas)
        ->with('kelas')
        ->get();

            return view('siswa.index', [
        'siswas' => $siswas,
        'kelas'  => $kelas, // 🔥 WAJIB DIKIRIM
    ]);
    }

    public function create()
    {
        $guru = Auth::user();
        $kelas = $guru->kelas;

        return view('siswa.create', compact('kelas'));
    }

    public function store(Request $request)
{
    $guru = Auth::user(); // 🔥 PINDAH KE ATAS

    $request->validate([
        'nis' => 'required|digits_between:1,20|unique:siswas,nis',
        'nama_siswa' => 'required|string|max:100',
        'nama_orang_tua' => 'nullable|string|max:100',
        'kontak_orang_tua' => 'nullable|string|max:20',
        'alamat' => 'nullable|string',
        'tanggal_lahir' => 'nullable|date',
    ]);

    Siswa::create([
        'nis' => (string) $request->nis,
        'nama_siswa' => $request->nama_siswa,
        'nama_orang_tua' => $request->nama_orang_tua,
        'kontak_orang_tua' => $request->kontak_orang_tua,
        'alamat' => $request->alamat,
        'tanggal_lahir' => $request->tanggal_lahir,
        'id_kelas' => $guru->kelas->id_kelas,
    ]);

    return redirect()
    ->route('siswa.index')
    ->with('success', 'Data Berhasil Disimpan');
}



 public function edit($id)
{
    $siswa = Siswa::findOrFail($id);
    $guru  = Auth::user();
    $kelas = $guru->kelas; // 🔥 TAMBAHKAN

    if ($siswa->id_kelas !== $kelas->id_kelas) {
        return back()->with('error', 'Anda tidak boleh mengedit siswa dari kelas lain.');
    }

    return view('siswa.edit', [
        'siswa' => $siswa,
        'kelas' => $kelas, // 🔥 KIRIM KE VIEW
    ]);
}

 public function update(Request $request, $id)
{
    $siswa = Siswa::findOrFail($id);

    $request->validate([
        'nis' => 'required|digits_between:1,20|unique:siswas,nis,' . $siswa->id_siswa . ',id_siswa',
        'nama_siswa' => 'required|string|max:100',
        'nama_orang_tua' => 'nullable|string|max:100',
        'kontak_orang_tua' => 'nullable|string|max:20',
        'alamat' => 'nullable|string',
        'tanggal_lahir' => 'nullable|date',
    ]);

    $siswa->update([
        'nis' => (string) $request->nis,
        'nama_siswa' => $request->nama_siswa,
        'nama_orang_tua' => $request->nama_orang_tua,
        'kontak_orang_tua' => $request->kontak_orang_tua,
        'alamat' => $request->alamat,
        'tanggal_lahir' => $request->tanggal_lahir, // 🔥 FIX
    ]);

    return redirect()
    ->route('siswa.index')
    ->with('success', 'Data Berhasil Disimpan');

}


    public function destroy($id)
    {
        Siswa::destroy($id);

        return redirect()->route('siswa.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
