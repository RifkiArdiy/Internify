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
        Schema::create('manajemen_bimbingans', function (Blueprint $table) {
            $table->id('manajemen_bimbingan_id');
            $table->unsignedBigInteger('magang_id')->index();
            $table->unsignedBigInteger('dosen_id');
            $table->timestamps();
            $table->foreign('magang_id')->references('magang_id')->on('magang_applications')->onDelete('cascade');
            $table->foreign('dosen_id')->references('dosen_id')->on('dosens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manajemen_bimbingans');
    }
};
