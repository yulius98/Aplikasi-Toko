<?php

namespace App\Livewire;

use App\Models\tbldisplay_barang;
use Livewire\Component;

class Cashier extends Component
{
    
    public function addToCart($id){
        dd($id);
    }
    public function render()
    {
        $dtdisplay = tbldisplay_barang::all();
            
        //dd($dtdisplay);    
        return view('livewire.cashier',['dtdisplay' => $dtdisplay]);
    }
}