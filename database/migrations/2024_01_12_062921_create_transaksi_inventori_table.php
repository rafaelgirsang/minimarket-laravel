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
        Schema::create('transaksi_inventori', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah')->default(0)->nullable();
            $table->integer('harga')->default(0)->nullable();
            $table->integer('produkInventori_id')->nullable();
            $table->integer('produk_id')->nullable();
            $table->integer('transaksi_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_inventori');
    }
};
