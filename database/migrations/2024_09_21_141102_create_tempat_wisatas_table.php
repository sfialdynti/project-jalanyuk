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
        Schema::create('tempat_wisatas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_wisata');
            $table->string('lokasi');
            $table->decimal('longitude', 10, 7);
            $table->decimal('latitude', 10, 7);
            $table->text('deskripsi');
            $table->unsignedBigInteger('destinasis_id');
            $table->foreign('destinasis_id')->references('id')->on('destinasis')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('kategoris_id');
            $table->foreign('kategoris_id')->references('id')->on('kategoris')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tempat_wisatas');
    }
};
