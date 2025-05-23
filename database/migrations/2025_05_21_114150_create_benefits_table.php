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
        Schema::create('benefits', function (Blueprint $table) {
            $table->id('benefit_id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('lowongan_benefit', function (Blueprint $table) {
            $table->id('mbenefit_id'); // ✅ AUTO INCREMENT juga

            // Foreign key ke lowongan_magangs
            $table->unsignedBigInteger('lowongan_id');
            $table->foreign('lowongan_id')
                ->references('lowongan_id')
                ->on('lowongan_magangs')
                ->onDelete('cascade');

            // Foreign key ke benefits
            $table->unsignedBigInteger('benefit_id');
            $table->foreign('benefit_id')
                ->references('benefit_id')
                ->on('benefits')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('benefits');
        Schema::dropIfExists('lowongan_benefit');
    }
};
