<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('jurnal_harian', function (Blueprint $table) {
            $table->id('id_jurnal');
            $table->date('tanggal');
            $table->string('tema',100)->nullable();
            $table->text('deskripsi_kegiatan');
            $table->string('file_dokumentasi')->nullable();
            $table->unsignedBigInteger('id_guru');
            $table->string('kelas',20)->nullable(); 
            $table->timestamps();

            $table->foreign('id_guru')
                  ->references('id_guru')->on('gurus')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('jurnal_harian');
    }
};
