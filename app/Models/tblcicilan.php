<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class tblcicilan extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $table = 'tblcicilans';
    protected $fillable = [
        'nama_barang',
        'nama_customer',
        'harga_barang',
        'lama_cicilan',
        'uang_muka',
        'sisa_hutang',
        'jumlah_cicilan',
        'tanggal_cicilan',
        'status'
        
    ];
       
}