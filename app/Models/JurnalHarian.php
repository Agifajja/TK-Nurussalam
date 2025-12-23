<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JurnalHarian extends Model
{
    protected $table = 'jurnal_harian';
    protected $primaryKey = 'id_jurnal';

    protected $fillable = [
        'tanggal',
        'tema',                 // ✅ TAMBAHKAN INI
        'deskripsi_kegiatan',
        'file_dokumentasi',
        'id_guru',
        'id_kelas'
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru', 'id_guru');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
    }
}
