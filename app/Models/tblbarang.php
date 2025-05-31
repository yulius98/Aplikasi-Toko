<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class tblbarang extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $table = 'tblbarangs';
    protected $fillable = [
        'nama_barang',
        'id_kategori',
        'keterangan',
        'gambar'
    ];
    protected $dates = ['deleted_at'];
    
    public function kategoris()
    {
        return $this->belongsTo(tblkategori::class,'id_kategori');
    }

    public function getGambarAttribute($value)
    {
        return asset('storage/' . $value);
    }
    public function pembeliandarisuppliers(): HasMany
    {
        return $this->hasMany(tblpembeliandarisupplier::class, 'id_barang');
    }

    public function stocks(): HasMany
    {
        return $this->hasMany(tblstock::class, 'id_barang');
    }
    
    public function displayBarangs(): HasMany
    {
        return $this->hasMany(tbldisplay_barang::class, 'id_barang');
    }

}