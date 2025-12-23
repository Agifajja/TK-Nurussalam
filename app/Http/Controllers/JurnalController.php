<?php

namespace App\Http\Controllers;

use App\Models\JurnalHarian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JurnalController extends Controller
{
    public function index()
    {
        $guru = Auth::user();
        $kelas = $guru->kelas;

        if (!$kelas) {
            return back()->with('error', 'Anda belum memiliki kelas.');
        }

        // Ambil jurnal hari ini
        $jurnal = JurnalHarian::where('id_guru', $guru->id_guru)
                    ->whereDate('tanggal', date('Y-m-d'))
                    ->get();

        return view('jurnal.index', compact('kelas', 'jurnal', 'guru'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tema' => 'required',
            'deskripsi_kegiatan' => 'required',
            'file_dokumentasi' => 'nullable|file|mimes:jpg,jpeg,png,pdf'
        ]);

        $guru = Auth::user();
        $kelas = $guru->kelas;

        if (!$kelas) {
            return back()->with('error', 'Anda belum memiliki kelas.');
        }

        $filename = null;
        if ($request->hasFile('file_dokumentasi')) {
            $filename = $request->file('file_dokumentasi')->store('jurnal', 'public');
        }

        JurnalHarian::create([
            'tanggal' => date('Y-m-d'),
            'tema' => $request->tema,
            'deskripsi_kegiatan' => $request->deskripsi_kegiatan,
            'file_dokumentasi' => $filename,
            'id_guru' => $guru->id_guru,
            'id_kelas' => $kelas->id_kelas,
        ]);

        return redirect()
    ->route('jurnal.index')
    ->with('success', 'Jurnal harian berhasil disimpan');

    }

    public function create()
{
    $guru = Auth::user();
    $kelas = $guru->kelas;

    return view('jurnal.create', compact('kelas', 'guru'));
}


    public function edit($id)
    {
        $guru = Auth::user();
        $kelas = $guru->kelas;

        $jurnal = JurnalHarian::findOrFail($id);

        return view('jurnal.edit', compact('jurnal', 'kelas', 'guru'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tema' => 'required',
            'deskripsi_kegiatan' => 'required',
            'file_dokumentasi' => 'nullable|file|mimes:jpg,jpeg,png,pdf'
        ]);

        $jurnal = JurnalHarian::findOrFail($id);

        // Jika upload baru → ganti file
        if ($request->hasFile('file_dokumentasi')) {
            $filename = $request->file('file_dokumentasi')->store('jurnal', 'public');
            $jurnal->file_dokumentasi = $filename;
        }

        $jurnal->tema = $request->tema;
        $jurnal->deskripsi_kegiatan = $request->deskripsi_kegiatan;
        $jurnal->save();

        return redirect()->route('jurnal.index')->with('success', 'Jurnal berhasil diperbarui');
    }

    public function destroy($id)
    {
        JurnalHarian::destroy($id);

        return back()->with('success', 'Jurnal berhasil dihapus');
    }

    // JurnalController.php
public function showKepsek($id)
{
   $jurnal = JurnalHarian::with(['guru','kelas'])->findOrFail($id);

    return view('kepsek.jurnal_show', compact('jurnal'));
}

}
