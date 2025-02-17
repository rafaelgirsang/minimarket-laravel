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
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->char('nama_produk', 50);
            $table->char('barcode', 50)->nullable();
            $table->integer('harga_jual')->default(0)->nullable();
            $table->integer('jumlah_stok')->default(0)->nullable();
            $table->enum('is_active', ['Y', 'N'])->nullable()->default('Y');
            $table->foreignId('kategori_id')->constrained('produk_kategori')->onDelete('cascade')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
