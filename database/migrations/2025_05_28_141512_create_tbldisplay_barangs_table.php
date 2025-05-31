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
        Schema::create('tbldisplay_barangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_barang')->constrained('tblbarangs')->onDelete('cascade');
            $table->string('nama_barang');
            $table->foreignId('id_kategori')->constrained('tblkategoris')->onDelete('cascade');
            $table->string('nama_kategori');
            $table->text('keterangan')->nullable();
            $table->string('gambar')->nullable();
            $table->decimal('harga_jual', 50, 2)->comment('Harga jual per unit');
            $table->integer('sisa_stock')->default(0)->comment('Jumlah Stock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbldisplay_barangs');
    }
};