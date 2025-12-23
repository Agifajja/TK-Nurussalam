<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('absensi_log', function (Blueprint $table) {
            $table->id('id_absensi');
            $table->date('tanggal');
            $table->enum('jenis_user',['GURU','SISWA']);
            $table->unsignedBigInteger('id_siswa')->nullable();
            $table->unsignedBigInteger('id_guru')->nullable();

            // STATUS LANGSUNG (HAPUS TABEL status_kehadiran)
            $table->enum('status',['Hadir','Sakit','Izin','Alfa']);

            $table->time('jam_masuk')->nullable();
            $table->time('jam_pulang')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('id_siswa')
                  ->references('id_siswa')->on('siswas')
                  ->onDelete('cascade');

            $table->foreign('id_guru')
                  ->references('id_guru')->on('gurus')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('absensi_log');
    }
};
