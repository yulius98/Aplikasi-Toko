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
        Schema::create('tbldiskons', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->decimal('diskon', 5, 2);
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbldiskons');
    }
};