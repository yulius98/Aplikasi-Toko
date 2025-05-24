<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tblsupplier extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tblsuppliers';

    protected $fillable = [
        'nama_supplier',
        'alamat',
        'telepon',
        'email',
        'kota',
        'kodepos',
        'bank',
        'norek',
        'atasnama',
        'npwp'
    ];

    protected $dates = ['deleted_at'];

    public function pembeliandarisuppliers()
    {
        return $this->hasMany(tblpembeliandarisupplier::class, 'id_supplier');
    }
    
}