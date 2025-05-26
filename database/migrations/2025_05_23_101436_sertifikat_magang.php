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
        Schema::create('sertifikat_magangs', function (Blueprint $table) {
            $table->id('sertifikat_id');
            $table->unsignedBigInteger('company_id');
            $table->string('judul');
            $table->string('deskripsi')->nullable();
            $table->timestamps();

            $table->foreign('company_id')->references('company_id')->on('companies')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sertifikat_magangs');
    }
};
