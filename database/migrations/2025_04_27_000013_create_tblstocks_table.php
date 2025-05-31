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
        Schema::create('tblstocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_barang')->constrained('tblbarangs')->onDelete('cascade');
            $table->foreignId('id_PBS')->constrained('tblpembeliandarisuppliers')->onDelete('cascade');
            $table->string('nama_barang');
            $table->decimal('harga_jual', 50, 2)->comment('Harga jual per unit');
            $table->integer('jumlah_produk_beli');
            $table->integer('jumlah_produk_jual');
            $table->enum('status',['tersedia','habis','hold'])->default('tersedia')->comment('Status stok: tersedia, habis');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblstocks');
    }
};