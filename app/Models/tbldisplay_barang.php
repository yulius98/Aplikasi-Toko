<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class tbldisplay_barang extends Model
{
    use HasFactory, SoftDeletes, HasFactory;

    protected $table = 'tbldisplay_barangs';

    protected $fillable = [
        'id_barang',
        'nama_barang',
        'id_kategori',
        'nama_kategori',
        'keterangan',
        'gambar',
        'harga_jual',
        'sisa_stock'
    ];
    
    public function barangs()
    {
        return $this->belongsTo(tblbarang::class, 'id_barang');
    }

    public function kategoris()
    {
        return $this->belongsTo(tblkategori::class, 'id_kategori');
    }

    public function getGambarAttribute($value)
    {
        return asset('storage/' . $value);
    }
}