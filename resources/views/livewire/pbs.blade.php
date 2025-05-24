<div class="container">
    @if ($errors->any())
        <div class="pt-3">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>    
            </div>
        </div>
    @endif
    @if (session()->has('message'))
        <div class="pt-3">
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        </div>
    @endif
    
    <!-- START FORM -->
    <div class="my-3 p-3 bg-body rounded shadow-sm">        
        <form> 
            <div class="row">
                <!-- Kolom Pertama -->
                <div class="col-md-6">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Informasi Faktur</h5>

                            <div class="mb-3 row">
                                <label for="no_faktur" class="col-sm-4 col-form-label">No Faktur*</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="no_faktur" wire:model="no_faktur">
                                </div>
                            </div>

                            <!-- Dropdown Supplier -->
                            <div class="mb-3 row">
                                <label for="nama_supplier" class="col-sm-4 col-form-label">Nama Supplier*</label>
                                <div class="col-sm-8">
                                    <div class="dropdown flex-grow-1">
                                        <button class="btn btn-outline-primary w-100 d-flex justify-between align-items-center" type="button" id="dropdownKategori" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="me-auto">{{ $nama_supplier ?? 'Pilih Supplier' }}</span>
                                            <span class="dropdown-toggle ps-2"></span>
                                        </button>
                                        <ul class="dropdown-menu w-100" aria-labelledby="dropdownKategori">
                                            @foreach ($dtsupplier as $item)
                                                <li>
                                                    <a class="dropdown-item"
                                                    href="#"
                                                    wire:click.prevent="selectSupplier({{ $item->id }})">
                                                        {{ $item->nama_supplier }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Menampilkan ID supplier yang dipilih -->
                            <input type="hidden" class="form-control mt-2" id="id_supplier" wire:model="id_supplier" readonly>
                            
                            <!-- Dropdown Barang -->
                            <div class="mb-3 row">
                                <label for="nama_supplier" class="col-sm-4 col-form-label">Nama Barang*</label>
                                <div class="col-sm-8">
                                    <div class="dropdown flex-grow-1">
                                        <button class="btn btn-outline-primary w-100 d-flex justify-between align-items-center" type="button" id="dropdownKategori" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="me-auto">{{ $nama_barang ?? 'Pilih Barang' }}</span>
                                            <span class="dropdown-toggle ps-2"></span>
                                        </button>
                                        <ul class="dropdown-menu w-100" aria-labelledby="dropdownKategori">
                                            @foreach ($dtbarang as $item)
                                                <li>
                                                    <a class="dropdown-item"
                                                    href="#"
                                                    wire:click.prevent="selectBarang({{ $item->id }})">
                                                        {{ $item->nama_barang }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Menampilkan ID barang yang dipilih -->
                            <input type="hidden" class="form-control mt-2" id="id_barang" wire:model="id_barang" readonly>

                            <div class="mb-3 row">
                                <label for="jumlah" class="col-sm-4 col-form-label">Jumlah Barang</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="jumlah" wire:model="jumlah">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kedua -->
                <div class="col-md-6">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Detail Pembelian</h5>

                            <div class="mb-3 row">
                                <label for="tanggal_pembelian" class="col-sm-4 col-form-label">Tanggal Pembelian</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" id="tanggal_pembelian" wire:model="tanggal_pembelian">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="harga_beli" class="col-sm-4 col-form-label">Harga Pembelian*</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="harga_beli" wire:model="harga_beli">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="harga_jual" class="col-sm-4 col-form-label">Harga Penjualan*</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="harga_jual" wire:model="harga_jual">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <!-- Tombol SIMPAN -->
             
            <div class="mb-3 row">
                <div class="col-12 text-end">
                    @if ($updatedata == false)
                        <button type="button" class="btn btn-primary" name="submit" wire:click="simpan()">SIMPAN</button>
                    @else
                        <button type="button" class="btn btn-primary" name="submit" wire:click="update()">UPDATE</button>    
                    @endif
                    
                    <button type="button" class="btn btn-secondary" name="submit" wire:click="clear()">Clear</button>    
                    
                </div>
            </div> 
        </form>
    </div>
        
    <!-- AKHIR FORM -->

    <!-- START DATA -->    
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h1>Data Pembelian dari Supplier</h1>
        <div class="pb-3 pt-3">
            <input type="text" class="form-control mb-3 w-25" placeholder="Search..." wire:model.live="cari">
        </div>
       {{ $PBS->links() }}
        <table class="table table-striped table-sortable ">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-4 sort" @if ($sortcolom == 'nama_supplier') {{ $sortdirection }} @endif wire:click="sort('nama_supplier')">Supplier</th>
                    <th class="col-md-3 sort" @if ($sortcolom == 'nama_barang') {{ $sortdirection }} @endif wire:click="sort('nama_barang')" >Barang</th>
                    <th class="col-md-2 sort" @if ($sortcolom == 'nama_kategori') {{ $sortdirection }} @endif wire:click="sort('nama_kategori')">Kategori</th>
                    <th class="col-md-2 sort" @if ($sortcolom == 'no_faktur') {{ $sortdirection }} @endif wire:click="sort('no_faktur')">No Faktur</th>
                    <th class="col-md-2 " >Tanggal Pembelian</th>
                    <th class="col-md-2 " >Jumlah</th>
                    <th class="col-md-2 " >Harga Beli</th>
                    <th class="col-md-2 " >Harga Jual</th>
                    <th class="col-md-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($PBS as $key => $value)
                <tr>
                    <td>{{ $PBS->firstitem() + $key }}</td>
                    <td>{{ $value->nama_supplier  }}</td>
                    <td>{{ $value->nama_barang }}</td>
                    <td>{{ $value->nama_kategori }}</td>
                    <td>{{ $value->no_faktur }}</td>
                    <td>{{ $value->tanggal_pembelian }}</td>
                    <td>{{ $value->jumlah }}</td>
                    <td>{{ $value->harga_beli }}</td>
                    <td>{{ $value->harga_jual }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a wire:click="show_detail({{ $value->id }})" class="btn btn-warning btn-sm">Detail</a>
                            <a wire:click="edit({{ $value->id }})" class="btn btn-warning btn-sm">Edit</a>
                            <a wire:click="konfimasihapus({{ $value->id }})" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Del</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      
    </div>
    <!-- AKHIR DATA --> 
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-primary" wire:click="hapus()" data-bs-dismiss="modal">YA</button>
            </div>
            </div>
        </div>
    </div>
</div>

