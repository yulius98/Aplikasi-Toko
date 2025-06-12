<?php

namespace App\Livewire;

use App\Models\tblcustomer;
use Livewire\Component;
use Livewire\WithPagination;

class Customer extends Component
{

    use WithPagination; 
    public $nama_customer, $alamat, $telepon, $email, $kota, $kodepos;
    protected $paginationTheme = 'bootstrap';
    public $updatedata = false;
    public $customer_id;
    public $cari; 
    public $sortcolom ='nama_customer'; 
    public $sortdirection = 'asc';


    public function show_detail($id)
    {
        $customer = tblcustomer::find($id);
       
            $this->nama_customer = $customer->nama_customer;
            $this->email = $customer->email;
            $this->alamat = $customer->alamat;
            $this->telepon = $customer->telepon;
            $this->kota = $customer->kota;
            $this->kodepos = $customer->kodepos;
            
            $this->updatedata = true;
       
    }
    
    public function simpan()
    {
        $rules = [
            'nama_customer' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'telepon' => 'required',
            'kota' => 'required',
        ];
        $messages = [
            'nama_customer.required' => 'Nama Customer tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Format email tidak valid',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'telepon.required' => 'Telepon tidak boleh kosong',
            'kota.required' => 'Kota tidak boleh kosong',
        ];
        $validated = $this->validate($rules, $messages);
        
        // Simpan data ke database
        tblcustomer::create([
            'nama_customer' => $this->nama_customer,
            'email' => $this->email,
            'alamat' => $this->alamat,
            'telepon' => $this->telepon,
            'kota' => $this->kota,
            'kodepos' => $this->kodepos,
            
        ]);
        session()->flash('message', 'Data Customer berhasil disimpan.');
        $this->clear();
        // Initialization code can go here
    }

    public function edit($id)
    {
        $customer = tblcustomer::find($id);
        
        $this->nama_customer = $customer->nama_customer;
        $this->email = $customer->email;
        $this->alamat = $customer->alamat;
        $this->telepon = $customer->telepon;
        $this->kota = $customer->kota;
        $this->kodepos = $customer->kodepos;
        

        $this->updatedata = true;
        $this->customer_id = $id;
    }

    public function update()
    {
        $rules = [
            'nama_customer' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'telepon' => 'required',
            'kota' => 'required',
        ];
        $messages = [
            'nama_customer.required' => 'Nama Customer tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Format email tidak valid',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'telepon.required' => 'Telepon tidak boleh kosong',
            'kota.required' => 'Kota tidak boleh kosong',
        ];
        $validated = $this->validate($rules, $messages);
        
        // Update data ke database
        tblcustomer::find($this->customer_id)->update([
            'nama_customer' => $this->nama_customer,
            'email' => $this->email,
            'alamat' => $this->alamat,
            'telepon' => $this->telepon,
            'kota' => $this->kota,
            'kodepos' => $this->kodepos,
            
        ]);
        session()->flash('message', 'Data Customer berhasil diupdate.');
        $this->clear();
    }

    public function clear()
    {
        $this->nama_customer = '';
        $this->email = '';
        $this->alamat = '';
        $this->telepon = '';
        $this->kota = '';
        $this->kodepos = '';
        $this->customer_id = '';

        $this->updatedata = false;
    }

    public function hapus()
    {
        $id = $this->customer_id;
        $customer = tblcustomer::find($id);
        if ($customer) {
            $customer->delete();
            session()->flash('message', 'Data Customer berhasil dihapus.');
        } else {
            session()->flash('message', 'Data Customer tidak ditemukan.');
        }

        $this->clear();
    }

    public function konfimasihapus($id)
    {
        $this->customer_id = $id;
    }

    public function sort($colomname){
        
        $this->sortcolom = $colomname;
        //dump($this->sortcolom);
        $this->sortdirection = $this->sortdirection == 'asc' ? 'desc' : 'asc';
        //dd($this->sortdirection);
        
    }

    public function render()
    {
        if ($this->cari != null) {
            $dtcustomer = tblcustomer::where('nama_customer', 'like', '%' . $this->cari . '%')
            ->orWhere('email', 'like', '%' . $this->cari . '%')
            ->orWhere('alamat', 'like', '%' . $this->cari . '%')
            ->orWhere('telepon', 'like', '%' . $this->cari . '%')
            ->orWhere('kota', 'like', '%' . $this->cari . '%')
            ->orderBy($this->sortcolom,$this->sortdirection)->paginate(5);
        } else {
            $dtcustomer = tblcustomer::orderBy($this->sortcolom,$this->sortdirection)->paginate(5);
        }
        
        
        
        return view('livewire.customer',['dtcustomer' => $dtcustomer]);
    }
}