<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Guru extends Authenticatable
{
    use Notifiable;

    protected $table = 'gurus';
    protected $primaryKey = 'id_guru';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'username',
        'password',
        'nama_guru',
        'role'
    ];

    protected $hidden = [
        'password',
    ];

    public function kelas()
{
    return $this->hasOne(Kelas::class, 'id_guru');
}


    public function jurnal()
    {
        return $this->hasMany(JurnalHarian::class, 'id_guru', 'id_guru');
    }

    public function absensi()
    {
        return $this->hasMany(AbsensiLog::class, 'id_guru', 'id_guru');
    }
}
