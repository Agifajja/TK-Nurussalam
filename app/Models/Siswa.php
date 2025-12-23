<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswas';
    protected $primaryKey = 'id_siswa';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nis',
        'nama_siswa',
        'alamat',
        'nama_orang_tua',
        'kontak_orang_tua',
        'tanggal_lahir',
        'id_kelas'
    ];

    public function kelas()
{
    return $this->belongsTo(Kelas::class, 'id_kelas');
}


    public function absensi()
    {
        return $this->hasMany(AbsensiLog::class, 'id_siswa', 'id_siswa');
    }
}
