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
        Schema::create('tblcustomers', function (Blueprint $table) {
            $table->id();
            $table->string('nama_customer')->unique();
            $table->string('alamat');
            $table->string('telepon');
            $table->string('email')->unique();
            $table->string('kota')->nullable();
            $table->string('kodepos')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblcustomers');
    }
};