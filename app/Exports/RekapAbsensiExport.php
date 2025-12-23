<?php

namespace App\Exports;

use App\Models\AbsensiLog;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class RekapAbsensiExport implements
    FromCollection,
    WithHeadings,
    WithMapping,
    ShouldAutoSize
{
    protected $dari;
    protected $sampai;
    protected $kelasId;
    protected $rows;

    public function __construct($dari, $sampai, $kelasId = null)
    {
        $this->dari    = $dari;
        $this->sampai  = $sampai;
        $this->kelasId = $kelasId;
    }

    /**
     * QUERY DI SINI (BUKAN CONSTRUCTOR)
     */
   public function collection(): Collection
{
    $data = AbsensiLog::with(['siswa.kelas'])
        ->where('jenis_user', 'SISWA')
        ->whereBetween('tanggal', [$this->dari, $this->sampai])
        ->when($this->kelasId, function ($q) {
            $q->whereHas('siswa', function ($qs) {
                $qs->where('id_kelas', $this->kelasId);
            });
        })
        ->get()
        ->groupBy('id_siswa');

    return $data;
}


    public function headings(): array
    {
        return [
            'No',
            'Nama Siswa',
            'Kelas',
            'Hadir',
            'Izin',
            'Sakit',
            'Alfa',
        ];
    }

    public function map($items): array
    {
        static $no = 1;

        return [
            $no++,
            optional($items->first()->siswa)->nama_siswa ?? '-',
            optional(optional($items->first()->siswa)->kelas)->nama_kelas ?? '-',
            $items->where('id_status', 1)->count(), // Hadir
            $items->where('id_status', 3)->count(), // Izin
            $items->where('id_status', 2)->count(), // Sakit
            $items->where('id_status', 4)->count(), // Alfa
        ];
    }
}
