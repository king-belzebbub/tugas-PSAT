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
        Schema::create('tindakans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tindakan', 100); // Tambah batas karakter
            $table->decimal('harga', 12, 2)->default(0.00); // Default value
            $table->string('kode_icd', 20)->unique(); // Pastikan kode unik
            $table->timestamps();

            // Tambah index untuk kolom yang sering di-query
            $table->index('kode_icd');
            $table->index('nama_tindakan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tindakans');
    }
};
