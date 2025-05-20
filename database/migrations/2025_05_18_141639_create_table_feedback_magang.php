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
        Schema::create('feedback_magang', function (Blueprint $table) {
            $table->id('feedback_id');
            $table->unsignedBigInteger('magang_id');
            $table->unsignedBigInteger('mahasiswa_id');
            $table->integer('rating');
            $table->text('judul_feedback');
            $table->text('feedback');

            $table->foreign('magang_id')->references('magang_id')->on('magang_applications')->onDelete('cascade');
            $table->foreign('mahasiswa_id')->references('mahasiswa_id')->on('mahasiswas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback_magang');
    }
};
