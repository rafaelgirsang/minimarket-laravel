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
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('nama_user', 50);   
            $table->enum('gender', ['L', 'P'])->nullable();           
            $table->char('telpon', 20)->nullable();
            $table->string('email');
            $table->string('password');
            $table->string('remember_token')->nullable();
            $table->enum('is_active', ['Y', 'N'])->default('Y');          
            $table->foreignId('role_id')->constrained('user_role')->onDelete('cascade');       
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
