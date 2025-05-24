<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tblpembayaran_cicilan extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $table = 'tblpembayaran_cicilans';
    protected $fillable = [
        'nama_customer',
        'nama_barang',
        'jumlah_cicilan',
        'tanggal_bayar_cicilan',
        'pembayaran_cicilan_ke'
        
    ];
    
    
}