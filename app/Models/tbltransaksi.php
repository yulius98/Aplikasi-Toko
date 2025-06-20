<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tbltransaksi extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $table = 'tbltransaksis';
    protected $fillable = [
        'nama_customer',
        'nama_barang',
        'jumlah_produk',
        'total_harga'
    ];

    public function customers()
    {
        return $this->belongsTo(tblcustomer::class, 'id_customer');
    }
    
    public function barangs()
    {
        return $this->belongsTo(tblbarang::class, 'id_barang');
    }
    
}