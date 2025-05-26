<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('sertifikat_mahasiswa', function (Blueprint $table) {
            $table->id('sertifikat_mahasiswa_id');
            $table->unsignedBigInteger('sertifikat_id');
            $table->unsignedBigInteger('mahasiswa_id');
            $table->string('nama_mahasiswa')->nullable();
            $table->timestamp('downloaded_at')->nullable();
            $table->timestamps();

            $table->foreign('sertifikat_id')->references('sertifikat_id')->on('sertifikat_magangs')->onDelete('cascade');
            $table->foreign('mahasiswa_id')->references('mahasiswa_id')->on('mahasiswas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sertifikat_mahasiswa');
    }
};
