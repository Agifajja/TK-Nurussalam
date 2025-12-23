<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbsensiLog extends Model
{
    protected $table = 'absensi_log';
    protected $primaryKey = 'id_absensi';
    public $incrementing = true;
    protected $keyType = 'int';

    

    protected $fillable = [
        'tanggal',
        'jenis_user',
        'id_siswa',
        'id_guru',
        'id_status',
        'jam_masuk',
        'jam_pulang',
        'keterangan'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id_siswa');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru', 'id_guru');
    }

    public function status()
    {
        return $this->belongsTo(StatusKehadiran::class, 'id_status', 'id_status');
    }
}
