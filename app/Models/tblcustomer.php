<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tblcustomer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tblcustomers';

    protected $fillable = [
        'nama_customer',
        'alamat',
        'telepon',
        'email',
        'kota',
        'kodepos'
    ];

    protected $dates = ['deleted_at'];

    
}