<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class tblkategori extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $table = 'tblkategoris';
    protected $fillable = [
        'nama_kategori'
    ];

    public function barangs()
    {
        return $this->hasMany(tblbarang::class);
    }
    
    public function displayBarangs()
    {
        return $this->hasMany(tbldisplay_barang::class);
    }
}