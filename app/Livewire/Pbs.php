<?php

namespace App\Livewire;

use App\Models\tblbarang;
use App\Models\tblpembeliandarisupplier;
use App\Models\tblsupplier;
use App\Models\tblstock;
use App\Models\tblkategori;
use Livewire\Component;
use Livewire\WithPagination;

class Pbs extends Component
{
    use WithPagination;
    public $nama_supplier, $nama_barang,$nama_kategori, $name, $id_user, $id_barang, $id_supplier, $no_faktur,$jumlah, $tanggal_pembelian, $harga_beli, $harga_jual;
    protected $paginationTheme = 'bootstrap';
    public $updatedata = false;
    public $PBS_id;
    public $selectedSupplierId;
    public $selectectBarangId;
    public $cari;
    public $sortcolom ='nama_supplier';
    public $sortdirection = 'asc';


    public function show_detail($id)
    {
        $PBS = tblpembeliandarisupplier::with(['suppliers', 'barangs', 'kategoris'])
            ->select('tblpembeliandarisuppliers.*')
            ->join('tblsuppliers as s', 's.id', '=', 'tblpembeliandarisuppliers.id_supplier')
            ->join('tblbarangs as b', 'b.id', '=', 'tblpembeliandarisuppliers.id_barang')
            ->join('tblkategoris as k', 'k.id', '=', 'b.id_kategori')
            ->select('tblpembeliandarisuppliers.*', 'b.nama_barang', 'k.nama_kategori', 's.nama_supplier')
            ->where('id', $id)-> first();
            
        $this->id_supplier = $PBS->id_supplier;
        $this->nama_supplier = $PBS->nama_supplier;
        $this->id_barang = $PBS->id_barang;
        $this->nama_kategori = $PBS->nama_kategori;
        $this->nama_barang = $PBS->nama_barang;
        $this->no_faktur = $PBS->no_faktur;
        $this->jumlah = $PBS->jumlah;
        $this->tanggal_pembelian = $PBS->tanggal_pembelian;
        $this->harga_beli = $PBS->harga_beli;
        $this->harga_jual = $PBS->harga_jual;

        $this->updatedata = true;
        $this->id_supplier = $id;
    }

    public function simpan()
    {
        $rules = [
            'nama_supplier' => 'required',
            'nama_barang' => 'required',
            'no_faktur' => 'required',
            'jumlah' => 'required',
            'tanggal_pembelian' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
        ];
        $messages = [
            'nama_supplier.required' => 'Supplier tidak boleh kosong',
            'nama_barang.required' => 'Barang tidak boleh kosong',
            'no_faktur.required' => 'No Faktur tidak boleh kosong',
            'jumlah.required' => 'Jumlah tidak boleh kosong',
            'tanggal_pembelian.required' => 'Tanggal Pembelian tidak boleh kosong',
            'harga_beli.required' => 'Harga Beli tidak boleh kosong',
            'harga_jual.required' => 'Harga Jual tidak boleh kosong',
        ];

        $validate = $this->validate($rules, $messages);

        //Simpan data ke tblpembeliandarisupplier
        tblpembeliandarisupplier::create([
                
                'id_supplier' => $this->id_supplier,
                'id_barang' => $this->id_barang,
                'no_faktur' => $this->no_faktur,
                'jumlah' => $this->jumlah,
                'tanggal_pembelian' => $this->tanggal_pembelian,
                'harga_beli' => $this->harga_beli,
                'harga_jual' => $this->harga_jual,
        ]);
        $dtPBS = tblpembeliandarisupplier::latest()->first();
        $PBS_id = $dtPBS->id;
        

        //Simpan data ke table stock
        tblstock::create([
            'id_barang' => $this->id_barang,
            'id_PBS' => $PBS_id,
            'nama_barang' => $this->nama_barang,
            'harga_jual' => $this->harga_jual,
            'jumlah_produk_beli' => $this->jumlah,
            'jumlah_produk_jual' => 0,
        ]);

        session()->flash('message', "Data Pembelian berhasil disimpan.");
        $this->clear();
    }

    public function edit($id)
    {
        $PBS = tblpembeliandarisupplier::with(['suppliers', 'barangs', 'kategoris'])
            ->where('id', $id)->first();

        $this->id_supplier = $PBS->id_supplier ?? null;
        $this->nama_supplier = $PBS->suppliers->nama_supplier ?? null;
        $this->id_barang = $PBS->id_barang ?? null;
        $this->nama_barang = $PBS->barangs->nama_barang ?? null;
        $this->nama_kategori = $PBS->barangs->kategoris->nama_kategori ?? null;
        $this->no_faktur = $PBS->no_faktur ?? null;
        $this->jumlah = $PBS->jumlah ?? null;
        $this->tanggal_pembelian = $PBS->tanggal_pembelian ?? null;
        $this->harga_beli = $PBS->harga_beli ?? null;
        $this->harga_jual = $PBS->harga_jual ?? null;

        $this->updatedata = true;
        $this->PBS_id = $id;
    }
    public function update()
    {
        $rules = [
            'nama_supplier' => 'required',
            'nama_barang' => 'required',
            'no_faktur' => 'required',
            'jumlah' => 'required',
            'tanggal_pembelian' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
        ];
        $messages = [
            'nama_supplier.required' => 'Supplier tidak boleh kosong',
            'nama_barang.required' => 'Barang tidak boleh kosong',
            'no_faktur.required' => 'No Faktur tidak boleh kosong',
            'jumlah.required' => 'Jumlah tidak boleh kosong',
            'tanggal_pembelian.required' => 'Tanggal Pembelian tidak boleh kosong',
            'harga_beli.required' => 'Harga Beli tidak boleh kosong',
            'harga_jual.required' => 'Harga Jual tidak boleh kosong',
        ];

        $validate = $this->validate($rules, $messages);

        //Update data ke tblpembeliandarisupplier
        tblpembeliandarisupplier::find($this->PBS_id)->update([
                'id_supplier' => $this->id_supplier,
                'id_barang' => $this->id_barang,
                'no_faktur' => $this->no_faktur,
                'jumlah' => $this->jumlah,
                'tanggal_pembelian' => $this->tanggal_pembelian,
                'harga_beli' => $this->harga_beli,
                'harga_jual' => $this->harga_jual,
        ]);

        session()->flash('message', "Data Pembelian berhasil diupdate.");
        $this->clear();
    }

    public function hapus()
    {
        $id = $this->PBS_id;

        $PBS = tblpembeliandarisupplier::find($id);
        if($PBS){
            $PBS->delete();
            session()->flash('message', "Data Pembelian berhasil dihapus.");
        }else{
            session()->flash('message', "Data Pembelian tidak ditemukan.");
        }
        $this->clear();
    }
    public function konfimasihapus($id)
    {
        $this->PBS_id = $id;
    }
    public function sort($colomname)
    {
        if ($this->sortcolom == $colomname) {
            $this->sortdirection = $this->sortdirection == 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortcolom = $colomname;
            $this->sortdirection = 'asc';
        }
    }

    public function clear()
    {
        $this->nama_supplier = '';
        $this->id_barang = '';
        $this->nama_barang = '';
        $this->no_faktur = '';
        $this->jumlah = '';
        $this->tanggal_pembelian = '';
        $this->harga_beli = '';
        $this->harga_jual = '';

        $this->updatedata = false;
    }

    public function selectSupplier($id)
    {
        $supplier = tblsupplier::find($id);

        if ($supplier) {
            $this->id_supplier = $supplier->id;
            $this->nama_supplier  = $supplier->nama_supplier ;
        }
    }

    public function selectBarang($id)
    {
        $barang = tblbarang::find($id);

        if ($barang) {
            $this->id_barang = $barang->id;
            $this->nama_barang = $barang->nama_barang;
        }
    }

    public function render()
    {
        if($this->cari != null){
            $PBS = tblpembeliandarisupplier::with(['suppliers', 'barangs', 'kategoris'])
                ->whereHas('suppliers', function($query) {
                    $query->where('nama_supplier', 'like', '%'.$this->cari.'%');
                })
                ->orWhereHas('barangs', function($query) {
                    $query->where('nama_barang', 'like', '%'.$this->cari.'%');
                })
                ->orWhereHas('barangs.kategoris', function($query) {
                    $query->where('nama_kategori', 'like', '%'.$this->cari.'%');
                })
                ->orWhere('no_faktur', 'like', '%'.$this->cari.'%')
                ->orderBy($this->sortcolom, $this->sortdirection)
                ->paginate(5)
                ->map(function ($itemPBS) {
                    return (object)[
                        'id' => $itemPBS->id,
                        'id_supplier' => $itemPBS->id_supplier,
                        'nama_supplier' => $itemPBS->suppliers->nama_supplier,
                        'id_barang' => $itemPBS->id_barang,
                        'nama_barang' => $itemPBS->barangs->nama_barang,
                        'nama_kategori' => $itemPBS->barangs->kategoris->nama_kategori,
                        'no_faktur' => $itemPBS->no_faktur,
                        'jumlah' => $itemPBS->jumlah,
                        'tanggal_pembelian' => $itemPBS->tanggal_pembelian,
                        'harga_beli' => $itemPBS->harga_beli,
                        'harga_jual' => $itemPBS->harga_jual,
                    ];
                });
        } else {
            $PBS = tblpembeliandarisupplier::with(['suppliers', 'barangs', 'kategoris'])
                ->select('tblpembeliandarisuppliers.*')
                ->join('tblsuppliers as s', 's.id', '=', 'tblpembeliandarisuppliers.id_supplier')
                ->join('tblbarangs as b', 'b.id', '=', 'tblpembeliandarisuppliers.id_barang')
                ->join('tblkategoris as k', 'k.id', '=', 'b.id_kategori')
                ->select('tblpembeliandarisuppliers.*', 'b.nama_barang', 'k.nama_kategori', 's.nama_supplier')
                ->orderBy($this->sortcolom, $this->sortdirection)
                ->paginate(5);
                
        }

        //dump($PBS);
        $dtbarang = tblbarang::all();
        $dtsupplier = tblsupplier::all();

        return view('livewire.pbs', [
            'dtsupplier' => $dtsupplier,
            'dtbarang' => $dtbarang,
            'PBS' => $PBS
        ]);
    }
}