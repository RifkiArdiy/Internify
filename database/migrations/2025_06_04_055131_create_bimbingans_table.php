<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bimbingans', function (Blueprint $table) {
            $table->id('bimbingan_id');
            $table->unsignedBigInteger('magang_id')->index();
            $table->unsignedBigInteger('dosen_id')->index();
            $table->string('dokumen_bimbingan');
            $table->string('dokumen_perusahaan');
            $table->enum('status', ['Pending', 'Disetujui', 'Ditolak'])->default('Pending');

            $table->timestamp('tanggal_disetujui')->nullable();

            $table->timestamps();

            // Foreign key relationships
            $table->foreign('magang_id')->references('magang_id')->on('magang_applications')->onDelete('cascade');
            $table->foreign('dosen_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimbingans');
    }
};
