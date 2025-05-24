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
        Schema::create('tblcicilans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->string('nama_customer');
            $table->decimal('harga_barang', 15, 2);
            $table->integer('lama_cicilan');
            $table->decimal('uang_muka', 15, 2);
            $table->decimal('sisa_hutang', 15, 2);
            $table->decimal('jumlah_cicilan', 15, 2);
            $table->date('tanggal_cicilan');
            $table->enum('status',['lunas','belum lunas'])->default('belum lunas');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblcicilans');
    }
};