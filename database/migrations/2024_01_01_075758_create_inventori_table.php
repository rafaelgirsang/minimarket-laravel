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
        Schema::create('inventori', function (Blueprint $table) {
            $table->id();
            $table->integer('stok_in')->default(0)->nullable();
            $table->integer('stok_out')->default(0)->nullable();
            $table->integer('total_stok')->default(0)->nullable();
            $table->enum('type', ['IN', 'OUT', 'MIN']);
            $table->integer('produk_id')->nullable();
            $table->integer('supplier_id')->nullable();
            $table->integer('transaksi_id')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventori');
    }
};
