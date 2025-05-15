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
        Schema::create('profil_akademik', function (Blueprint $table) {
            $table->id('profile_id');
            $table->unsignedBigInteger('user_id')->index();
            $table->text('bidang_keahlian');
            $table->text('sertifikasi');
            $table->text('lokasi');
            $table->text('pengalaman');
            $table->text('etika');
            $table->float('ipk');
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_profil_akademik');
    }
};
