<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('status_kehadiran', function (Blueprint $table) {
            $table->id('id_status');  // <-- HARUS ADA INI!
            $table->string('nama_status', 20); // Hadir, Sakit, Izin, Alfa
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('status_kehadiran');
    }
};
