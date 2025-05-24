<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tbldiskon extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $table = 'tbldiskons';
    protected $fillable = [
        'nama_barang',
        'diskon',
        'tanggal_mulai',
        'tanggal_selesai'
    ];
    
}