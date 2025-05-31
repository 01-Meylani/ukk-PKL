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
    Schema::create('gurus', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('nip')->unique(); // NIP biasanya unik untuk setiap guru
        $table->enum('gender', ['L', 'P']); // Laki-laki / Perempuan
        $table->text('alamat');
        $table->string('kontak', 20);
        $table->string('email')->unique();
        $table->timestamps(); // created_at dan updated_at
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guruses');
    }
};
