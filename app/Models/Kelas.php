<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama_kelas',
        'wali_kelas'
    ];

    public function guru()
{
    return $this->belongsTo(Guru::class, 'id_guru');
}

public function siswas()
{
    return $this->hasMany(Siswa::class, 'id_kelas');
}

}
