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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal')->nullable();
            $table->integer('jumlah_item')->default(0)->nullable();
            $table->integer('total_harga')->default(0)->nullable();
            $table->string('invoice')->nullable();
            $table->integer('administrasi')->nullable();
            $table->integer('diskon')->nullable();
            $table->foreignId('user_id')->constrained('user')->onDelete('cascade');
            $table->foreignId('metode_id')->constrained('metode_pembayaran')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
