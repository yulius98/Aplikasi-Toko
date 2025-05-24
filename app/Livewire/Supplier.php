<?php

namespace App\Livewire;

use App\Models\tblsupplier;
use Livewire\Component;
use Livewire\WithPagination;

class Supplier extends Component
{

    use WithPagination; 
    public $nama_supplier, $alamat, $telepon, $email, $kota, $kodepos, $bank, $norek, $atasnama, $npwp;
    protected $paginationTheme = 'bootstrap';
    public $updatedata = false;
    public $supplier_id;
    public $cari; 
    public $sortcolom ='nama_supplier'; 
    public $sortdirection = 'asc';


    public function show_detail($id)
    {
        $supplier = tblsupplier::find($id);
       
            $this->nama_supplier = $supplier->nama_supplier;
            $this->email = $supplier->email;
            $this->alamat = $supplier->alamat;
            $this->telepon = $supplier->telepon;
            $this->kota = $supplier->kota;
            $this->kodepos = $supplier->kodepos;
            $this->bank = $supplier->bank;
            $this->norek = $supplier->norek;
            $this->atasnama = $supplier->atasnama;
            $this->npwp = $supplier->npwp;
            $this->updatedata = true;
       
    }
    
    public function simpan()
    {
        $rules = [
            'nama_supplier' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'telepon' => 'required',
            
        ];
        $messages = [
            'nama_supplier.required' => 'Nama Supplier tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Format email tidak valid',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'telepon.required' => 'Telepon tidak boleh kosong',
        ];
        $validated = $this->validate($rules, $messages);
        
        // Simpan data ke database
        tblsupplier::create([
            'nama_supplier' => $this->nama_supplier,
            'email' => $this->email,
            'alamat' => $this->alamat,
            'telepon' => $this->telepon,
            'kota' => $this->kota,
            'kodepos' => $this->kodepos,
            'bank' => $this->bank,
            'norek' => $this->norek,
            'atasnama' => $this->atasnama,
            'npwp' => $this->npwp,
        ]);
        session()->flash('message', 'Data Supplier berhasil disimpan.');
        $this->clear();
        // Initialization code can go here
    }

    public function edit($id)
    {
        $supplier = tblsupplier::find($id);
        
        $this->nama_supplier = $supplier->nama_supplier;
        $this->email = $supplier->email;
        $this->alamat = $supplier->alamat;
        $this->telepon = $supplier->telepon;
        $this->kota = $supplier->kota;
        $this->kodepos = $supplier->kodepos;
        $this->bank = $supplier->bank;
        $this->norek = $supplier->norek;
        $this->atasnama = $supplier->atasnama;
        $this->npwp = $supplier->npwp;

        $this->updatedata = true;
        $this->supplier_id = $id;
    }

    public function update()
    {
        $rules = [
            'nama_supplier' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'telepon' => 'required',
        ];
        $messages = [
            'nama_supplier.required' => 'Nama Supplier tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Format email tidak valid',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'telepon.required' => 'Telepon tidak boleh kosong',
        ];
        $validated = $this->validate($rules, $messages);
        
        // Update data ke database
        tblsupplier::find($this->supplier_id)->update([
            'nama_supplier' => $this->nama_supplier,
            'email' => $this->email,
            'alamat' => $this->alamat,
            'telepon' => $this->telepon,
            'kota' => $this->kota,
            'kodepos' => $this->kodepos,
            'bank' => $this->bank,
            'norek' => $this->norek,
            'atasnama' => $this->atasnama,
            'npwp' => $this->npwp,
        ]);
        session()->flash('message', 'Data Supplier berhasil diupdate.');
        $this->clear();
    }

    public function clear()
    {
        $this->nama_supplier = '';
        $this->email = '';
        $this->alamat = '';
        $this->telepon = '';
        $this->kota = '';
        $this->kodepos = '';
        $this->bank = '';
        $this->norek = '';
        $this->atasnama = '';
        $this->npwp = '';
        $this->supplier_id = '';

        $this->updatedata = false;
    }

    public function hapus()
    {
        $id = $this->supplier_id;
        $supplier = tblsupplier::find($id);
        if ($supplier) {
            $supplier->delete();
            session()->flash('message', 'Data Supplier berhasil dihapus.');
        } else {
            session()->flash('message', 'Data Supplier tidak ditemukan.');
        }

        $this->clear();
    }

    public function konfimasihapus($id)
    {
        $this->supplier_id = $id;
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
            $dtsupplier = tblsupplier::where('nama_supplier', 'like', '%' . $this->cari . '%')
            ->orWhere('email', 'like', '%' . $this->cari . '%')
            ->orWhere('alamat', 'like', '%' . $this->cari . '%')
            ->orWhere('telepon', 'like', '%' . $this->cari . '%')
            ->orWhere('kota', 'like', '%' . $this->cari . '%')
            ->orderBy($this->sortcolom,$this->sortdirection)->paginate(5);
        } else {
            $dtsupplier = tblsupplier::orderBy($this->sortcolom,$this->sortdirection)->paginate(5);
        }
        
        
        
        return view('livewire.supplier',['dtsupplier' => $dtsupplier]);
    }
}