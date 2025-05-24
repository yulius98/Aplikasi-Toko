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
        Schema::create('tblsuppliers', function (Blueprint $table) {
            $table->id();
            $table->string('nama_supplier')->unique();
            $table->string('alamat');
            $table->string('telepon');
            $table->string('email')->unique();
            $table->string('kota')->nullable();
            $table->string('kodepos')->nullable();
            $table->string('bank')->nullable();
            $table->string('norek')->nullable();
            $table->string('atasnama')->nullable();
            $table->string('npwp')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblsuppliers');
    }
};