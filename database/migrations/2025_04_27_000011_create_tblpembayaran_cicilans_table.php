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
        Schema::create('tblpembayaran_cicilans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_customer');
            $table->string('nama_barang');
            $table->decimal('jumlah_cicilan', 15, 2);
            $table->date('tanggal_bayar_cicilan');
            $table->integer('pembayaran_cicilan_ke');  
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblpembayaran_cicilans');
    }
};