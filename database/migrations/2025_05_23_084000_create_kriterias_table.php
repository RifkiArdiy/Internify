<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {   // Membuat kriteria
        Schema::create('kriterias', function (Blueprint $table) {
            $table->id('kriteria_id');
            $table->string('kode'); // Misal: C1, C2, ...
            $table->string('nama'); // Misal: Lokasi, Benefit, ...
            $table->float('weight'); // Optional, jika bobot dari mahasiswa
            $table->enum('jenis', ['benefit', 'cost']); // Harus ditentukan enum-nya
            $table->timestamps();
        });
        // Membuat parameter nilai
        Schema::create('skor_kriteria', function (Blueprint $table) {
            $table->id('skor_id');
            $table->unsignedBigInteger('kriteria_id');
            $table->string('parameter'); // Misalnya: "Sangat Baik", "Baik", dsb.
            $table->float('nilai'); // Nilai numerik, misalnya: 1-5
            $table->timestamps();

            $table->foreign('kriteria_id')->references('kriteria_id')->on('kriterias')->onDelete('cascade');
        });

        Schema::create('alternatif', function (Blueprint $table) {
            $table->id('alternatif_id');
            $table->unsignedBigInteger('mahasiswa_id');
            $table->unsignedBigInteger('lowongan_id');
            $table->timestamps();

            $table->foreign('lowongan_id')->references('lowongan_id')->on('lowongan_magangs')->onDelete('cascade');
            $table->foreign('mahasiswa_id')->references('mahasiswa_id')->on('mahasiswas')->onDelete('cascade');
        });

        Schema::create('nilai_alternatif', function (Blueprint $table) {
            $table->id('nilai_id');
            $table->unsignedBigInteger('alternatif_id');
            $table->unsignedBigInteger('kriteria_id');
            $table->float('nilai'); // Nilai numerik (dari skor_kriteria atau input langsung)
            $table->timestamps();

            $table->foreign('alternatif_id')->references('alternatif_id')->on('alternatif')->onDelete('cascade');
            $table->foreign('kriteria_id')->references('kriteria_id')->on('kriterias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kriterias');
        Schema::dropIfExists('skor_kriteria');
        Schema::dropIfExists('alternatif');
        Schema::dropIfExists('nilai_alternatif');
    }
};
