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
        Schema::create('lowongan_magangs', function (Blueprint $table) {
            $table->id('lowongan_id');
            $table->unsignedBigInteger('company_id')->index();
            $table->unsignedBigInteger('period_id')->index();
            $table->string('title');
            $table->text('description');
            $table->text('requirements');
            $table->string('location');
            $table->timestamps();

            $table->foreign('company_id')->references('company_id')->on('companies')->onDelete('cascade');
            $table->foreign('period_id')->references('period_id')->on('periode_magangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lowongan_magangs');
    }
};
