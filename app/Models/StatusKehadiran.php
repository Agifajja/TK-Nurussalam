<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusKehadiran extends Model
{
    protected $table = 'status_kehadiran';
    protected $primaryKey = 'id_status';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama_status'
    ];

    public function absensi()
    {
        return $this->hasMany(AbsensiLog::class, 'id_status', 'id_status');
    }
}
