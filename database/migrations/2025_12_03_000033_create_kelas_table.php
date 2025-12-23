<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasTable extends Migration
{
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->id('id_kelas');
            $table->string('nama_kelas', 10);

            // WALI KELAS → harus dihubungkan ke tabel guru
            $table->unsignedBigInteger('id_guru')->nullable();

            $table->timestamps();

            // Relasi ke guru
            $table->foreign('id_guru')
                  ->references('id_guru')
                  ->on('gurus')
                  ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('kelas');
    }
}
