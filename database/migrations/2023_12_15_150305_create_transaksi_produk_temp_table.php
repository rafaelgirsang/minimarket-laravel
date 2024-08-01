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
        Schema::create('transaksi_produk_temp', function (Blueprint $table) {
            $table->id();
            $table->string('barcode')->nullable();
            $table->string('produk')->nullable();
            $table->integer('harga')->default(0)->nullable();
            $table->integer('jumlah')->default(0)->nullable();
            $table->foreignId('produk_id')->constrained('produk')->onDelete('cascade');
            $table->integer('metode_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_produk_temp');
    }
};
