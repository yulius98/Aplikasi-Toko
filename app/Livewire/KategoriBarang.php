<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\tblkategori;

class KategoriBarang extends Component
{
    
    public $nama_kategori;

    protected $paginationTheme = 'bootstrap';
    public $sortcolom = 'nama_kategori';
    public $sortdirection = 'asc';
    public $updatedata = false;
    public $kategori_id;

    public function clear()
    {
        $this->nama_kategori = '';
        $this->kategori_id = '';
        $this->updatedata = false;
    }

    public function show_detail($id)
    {
        $kategori = tblkategori::find($id);
        $this->nama_kategori = $kategori->nama_kategori;
        $this->updatedata = true;
    }
    public function update()
    {
        $this->validate([
            'nama_kategori' => 'required',
        ], [
            'nama_kategori.required' => 'Nama Kategori tidak boleh kosong',
        ]);

        $kategori = tblkategori::find($this->kategori_id);
        $kategori->update([
            'nama_kategori' => $this->nama_kategori,
        ]);

        session()->flash('message', 'Data berhasil diupdate');
        $this->reset();
    }

    public function simpan()
    {
        $this->validate([
            'nama_kategori' => 'required',
        ], [
            'nama_kategori.required' => 'Nama Kategori tidak boleh kosong',
        ]);

        tblkategori::create([
            'nama_kategori' => $this->nama_kategori,
        ]);

        session()->flash('message', 'Data berhasil disimpan');
        $this->reset();
    }

    public function edit($id)
    {
        $kategori = tblkategori::find($id);
        $this->nama_kategori = $kategori->nama_kategori;
        $this->updatedata = true;
        $this->kategori_id = $id;
    }
    public function hapus()
    {
        $id = $this->kategori_id;
        $kategori = tblkategori::find($id);
        
        if ($kategori) {
            $kategori->delete();
            session()->flash('message', 'Data berhasil dihapus');
        } else {
            session()->flash('message', 'Data tidak ditemukan');
        }
        $this->clear();
        
    }
    
    public function konfimasihapus($id)
    {
        $this->kategori_id = $id;
        
    }

    public function sort($colomname)
    {
        $this->sortcolom = $colomname;
        $this->sortdirection = $this->sortdirection === 'asc' ? 'desc' : 'asc';
    }

    public function render()
    {
        $dtkategoribarang = tblkategori::orderBy($this->sortcolom,$this->sortdirection)->paginate(5);
        return view('livewire.kategori-barang',[
            'dtkategoribarang' => $dtkategoribarang,
        ]);
    }
}