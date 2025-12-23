<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('gurus', function (Blueprint $table) {
            $table->id('id_guru');
            $table->string('username')->unique();
            $table->string('kelas',20)->nullable(); 
            $table->string('password');
            $table->string('nama_guru');
            $table->enum('role', ['Guru','Kepala Sekolah'])->default('Guru');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gurus');
    }
};
