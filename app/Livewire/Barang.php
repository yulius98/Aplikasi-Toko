<?php

namespace App\Livewire;

use App\Models\tblbarang;
use App\Models\tblsupplier;
use App\Models\tblkategori;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Barang extends Component
{

    use WithPagination, WithFileUploads; 
    public $nama_barang, $id_kategori, $keterangan, $gambar, $nama_kategori;
    protected $paginationTheme = 'bootstrap';
    public $updatedata = false;
    public $barang_id;
    public $selectedKategoriId;
    public $cari; 
    public $sortcolom ='nama_barang'; 
    public $sortdirection = 'asc';
    public $image;

    

    public function show_detail($id)
    {
        
        $barang = tblbarang::join('tblkategoris as k', 'k.id', '=', 'tblbarangs.id_kategori')
            ->select('tblbarangs.*', 'k.nama_kategori')
            ->where('tblbarangs.id', $id)
            ->first();
        

            $this->nama_barang = $barang->nama_barang;
            $this->nama_kategori = $barang->nama_kategori;
            $this->id_kategori = $barang->id_kategori;
            $this->keterangan = $barang->keterangan;
            $this->gambar = $barang->gambar;
            
            $this->updatedata = true;
            $this->barang_id = $id;
       
    }
    
    public function simpan()
    {
        $rules = [
            'nama_barang' => 'required',
            'id_kategori' => 'required',
            'gambar' => 'nullable|image|max:2048', // 1MB Max
            
        ];
        $messages = [
            'nama_barang.required' => 'Nama Barang tidak boleh kosong',
            'id_kategori.required' => 'Kategori tidak boleh kosong',
            'gambar.image' => 'File harus berupa gambar',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
            
        ];
        $validated = $this->validate($rules, $messages);
        

        // Simpan data ke database
        $data = [
            'nama_barang' => $this->nama_barang,
            'id_kategori' => $this->id_kategori,
            'keterangan'  => $this->keterangan,
        ];

        // Cek apakah ada gambar yang diupload
        if ($this->gambar != null) {
            $data['gambar'] = $this->gambar->store('barang', 'public');
        } else {
            $data['gambar'] = null; // atau bisa dihapus jika tidak ingin menyimpan key 'gambar' sama sekali
        }

        // Simpan ke database
        tblbarang::create($data);
        session()->flash('message', 'Data Barang berhasil disimpan.');
        $this->clear();
        // Initialization code can go here
    }

    public function edit($id)
    {
        
        
        $barang = tblbarang::join('tblkategoris as k', 'k.id', '=', 'tblbarangs.id_kategori')
            ->select('tblbarangs.*', 'k.nama_kategori')
            ->where('tblbarangs.id', $id)
            ->first();
        //dd($barang);

        $this->nama_barang = $barang->nama_barang;
        $this->nama_kategori = $barang->nama_kategori;
        $this->id_kategori = $barang->id_kategori;
        $this->keterangan = $barang->keterangan;
        //if ($barang->gambar != null) {
        //    $this->gambar = $barang->gambar->store('barang');
        //} else {
        //    $this->gambar = null; // Atau bisa diatur sesuai kebutuhan
        //}
        $this->gambar = $barang->gambar;
        $this->updatedata = true;
        $this->barang_id = $id;
        
        
    }

   public function update()
    {
        $rules = [
            'nama_barang' => 'required',
            'id_kategori' => 'required',
            'gambar' => 'nullable|image|max:2048', // 2MB Max
        ];

        $messages = [
            'nama_barang.required' => 'Nama Supplier tidak boleh kosong',
            'id_kategori.required' => 'Kategori tidak boleh kosong',
            'gambar.image' => 'File harus berupa gambar',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2MB',
        ];

        $validated = $this->validate($rules, $messages);

        $barang = tblbarang::find($this->barang_id);

        // Simpan gambar jika ada upload baru
        if ($this->gambar) {
            $path = $this->gambar->store('barang','public'); // Simpan di storage/app/barang
            $barang->gambar = $path;
        }

        // Update field lainnya
        $barang->nama_barang = $this->nama_barang;
        $barang->id_kategori = $this->id_kategori;
        $barang->keterangan = $this->keterangan;
        $barang->save();

        session()->flash('message', 'Data Barang berhasil diupdate.');
        $this->clear();
    }


    public function clear()
    {
        $this->nama_barang = '';
        $this->id_kategori = '';
        $this->keterangan = '';
        $this->gambar = '';
        $this->nama_kategori = '';
        $this->barang_id = '';
        $this->cari = '';
        
        $this->updatedata = false;
    }

    public function hapus()
    {
        
        $id = $this->barang_id;
        $barang = tblbarang::find($id);
        if ($barang) {
            
            // Hapus gambar dari storage
            $gambarPath = storage_path('app/public' . $barang->gambar);
            if (file_exists($gambarPath)) {
                unlink($gambarPath);
            }
            // Hapus data dari database
            $barang->delete();
            session()->flash('message', 'Data Barang berhasil dihapus.');
        } else {
            session()->flash('message', 'Data Barang tidak ditemukan.');
        }

        $this->clear();
    }

    public function konfimasihapus($id)
    {
        
        $this->barang_id = $id;
    }

    public function sort($colomname){
        
        $this->sortcolom = $colomname;
        //dump($this->sortcolom);
        $this->sortdirection = $this->sortdirection == 'asc' ? 'desc' : 'asc';
        //dd($this->sortdirection);
        
    }

    

    public function selectKategori($id)
    {
        $kategori = tblkategori::find($id);

        if ($kategori) {
            $this->id_kategori = $kategori->id;
            $this->nama_kategori = $kategori->nama_kategori;
        }
    }

    

    public function render()
    {
        if ($this->cari != null) {
            $dtbarang = tblbarang::join('tblkategoris as k', 'k.id', '=', 'tblbarangs.id_kategori')
            ->select('tblbarangs.*', 'k.nama_kategori')
            ->where('tblbarangs.nama_barang', 'like', '%' . $this->cari . '%')
            ->orWhere('k.nama_kategori', 'like', '%' . $this->cari . '%')
            ->orderBy($this->sortcolom,$this->sortdirection)->paginate(5);
        } else {
            $dtbarang = tblbarang::join('tblkategoris as k', 'k.id', '=', 'tblbarangs.id_kategori')
            ->select('tblbarangs.*', 'k.nama_kategori')
            ->orderBy($this->sortcolom,$this->sortdirection)
            ->paginate(5);
        }
        
        $dtkategori = tblkategori::all();
       
        return view('livewire.barang',['dtbarang' => $dtbarang,'dtkategori' => $dtkategori]);    
            
        
    }
}