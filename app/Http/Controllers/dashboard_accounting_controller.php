<?php

namespace App\Http\Controllers;

use App\Models\tblstock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dashboard_accounting_controller extends Controller
{
    

    public function show()
    {
        //Show cart jumlah barang berdasarkan kategori
        $dtjmlbarangkategori = tblstock::join('tblbarangs as b', 'b.id', '=', 'tblstocks.id_barang')
                            ->join('tblkategoris as k', 'k.id', '=', 'b.id_kategori')
                            ->select('k.nama_kategori','k.id as id_kategori',
                                    DB::raw('SUM(tblstocks.jumlah_produk_beli) as jml_beli'),
                                    DB::raw('SUM(tblstocks.jumlah_produk_jual) as jml_jual'))
                            ->groupBy('k.id', 'k.nama_kategori') // group by semua field non-agregat yang di-select
                            ->get();
             
 

        return view('dashboard_accounting', ['dtjmlbarangkategori' => $dtjmlbarangkategori]);
    }

    
}