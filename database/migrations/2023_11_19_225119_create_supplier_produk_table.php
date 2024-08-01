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
        Schema::create('supplier_produk', function (Blueprint $table) {
            $table->id();
            $table->integer('harga_beli')->default(0)->nullable();
            $table->datetime('harga_last_update')->nullable();
            $table->enum('is_active', ['Y', 'N'])->nullable()->default('Y');
            $table->foreignId('produk_id')->constrained('produk')->onDelete('cascade');
            $table->foreignId('supplier_id')->constrained('supplier')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier_produk');
    }
};
