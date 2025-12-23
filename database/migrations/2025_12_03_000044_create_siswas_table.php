<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id('id_siswa');
            $table->string('nis',20)->unique();
            $table->string('nama_siswa',100);
            $table->string('kelas',20)->nullable(); 
            $table->text('alamat')->nullable();
            $table->string('nama_orang_tua',100)->nullable();
            $table->string('kontak_orang_tua',20)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('siswas');
    }
};
