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
        Schema::create('tblbarangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang')->unique();
            $table->foreignId('id_kategori')->constrained('tblkategoris')->onDelete('cascade');
            $table->text('keterangan')->nullable();
            $table->string('gambar')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblbarangs');
    }
};