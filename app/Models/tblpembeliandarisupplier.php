<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tblpembeliandarisupplier extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $table = 'tblpembeliandarisuppliers';
    protected $fillable = [
        'id_barang',
        'id_supplier',
        'no_faktur',
        'jumlah',
        'tanggal_pembelian',
        'harga_beli',
        'harga_jual'
    ];
    protected $dates = ['deleted_at'];
    public function suppliers()
    {
        return $this->belongsTo(tblsupplier::class,'id_supplier');
    }
    public function barangs()
    {
        return $this->belongsTo(tblbarang::class,'id_barang');
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function kategoris()
    {
        return $this->belongsTo(tblkategori::class,'id_kategori');
    }
    public function stock()
    {
        return $this->hasMany(tblstock::class);
        
    }

    
}