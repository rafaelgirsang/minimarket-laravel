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
        Schema::create('jurnal_akun', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->nullable();
            $table->string('akun')->nullable();
            $table->enum('saldo_normal', ['DEBIT', 'KREDIT'])->nullable();
            $table->integer('laporan')->nullable();
            $table->foreignId('kategori_id')->constrained('jurnal_kategori')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurnal_akun');
    }
};
