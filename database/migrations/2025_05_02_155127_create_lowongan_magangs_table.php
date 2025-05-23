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
        Schema::create('provinces', function (Blueprint $table) {
            $table->id(); // ID provinsi (auto or from file)
            $table->string('name');
        });

        // kabupaten
        Schema::create('regencies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('province_id')->constrained('provinces')->onDelete('cascade');
            $table->string('name');
        });

        // kecamatan
        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('regency_id')->constrained('regencies')->onDelete('cascade');
            $table->string('name');
        });

        // kelurahan
        Schema::create('villages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('district_id')->constrained('districts')->onDelete('cascade');
            $table->string('name');
        });

        Schema::create('kategoris', function (Blueprint $table) {
            $table->id('kategori_id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('lowongan_magangs', function (Blueprint $table) {
            $table->id('lowongan_id');
            $table->unsignedBigInteger('company_id')->index();
            $table->unsignedBigInteger('period_id')->index();
            $table->unsignedBigInteger('kategori_id')->index();
            $table->string('title');
            $table->text('description');
            $table->text('requirements');
            $table->foreignId('province_id')->constrained('provinces');
            $table->foreignId('regency_id')->constrained('regencies');
            $table->foreignId('district_id')->constrained('districts');
            $table->foreignId('village_id')->constrained('villages');
            $table->timestamps();

            $table->foreign('company_id')->references('company_id')->on('companies')->onDelete('cascade');
            $table->foreign('period_id')->references('period_id')->on('periode_magangs')->onDelete('cascade');
            $table->foreign('kategori_id')->references('kategori_id')->on('kategoris')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provinces');
        Schema::dropIfExists('regencies');
        Schema::dropIfExists('districts');
        Schema::dropIfExists('villages');
        Schema::dropIfExists('kategoris');
        Schema::dropIfExists('lowongan_magangs');
    }
};
