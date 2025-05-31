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
    // file: 2025_05_11_204000_create_siswas_table.php
Schema::create('siswas', function (Blueprint $table) {
    $table->id();
    $table->string('nama');
    $table->string('nis');
    $table->enum('gender', ['L', 'P']);
    $table->text('alamat');
    $table->string('kontak');
    $table->string('email')->unique();
    $table->enum('status_pkl', ['belum', 'sedang', 'selesai'])->default('belum'); // ✅ langsung enum
    $table->timestamps();
});

}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
