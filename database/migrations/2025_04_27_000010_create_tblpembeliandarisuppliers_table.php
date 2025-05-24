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
        Schema::create('tblpembeliandarisuppliers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade')->nullable();
            $table->foreignId('id_barang')->constrained('tblbarangs')->onDelete('cascade');
            $table->foreignId('id_supplier')->constrained('tblsuppliers')->onDelete('cascade');
            $table->string('no_faktur');
            $table->integer('jumlah');
            $table->date('tanggal_pembelian');
            $table->decimal('harga_beli', 50, 2)->comment('Harga beli per unit');
            $table->decimal('harga_jual', 50, 2)->comment('Harga jual per unit');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblpembeliandarisuppliers');
    }
};