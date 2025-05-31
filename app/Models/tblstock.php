<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tblstock extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $table = 'tblstocks';
    protected $fillable = [
        'id_barang',
        'id_PBS',
        'harga_jual',
        'nama_barang',
        'jumlah_produk_beli',
        'jumlah_produk_jual',
        'status'
    ];
    protected $dates = ['deleted_at'];

    public function pembeliandarisupplier()
    {
        return $this->belongsTo(tblpembeliandarisupplier::class, 'id_PBS');
    }
    public function barangs()
    {
        return $this->belongsTo(tblbarang::class, 'id_barang');
    }
    

}