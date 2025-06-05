@php use Illuminate\Support\Facades\Storage; @endphp


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
            <div id="flash-message"  class="alert alert-success">
                {{ session('message') }}
            </div>
        </div>
        
    @endif


        <!-- START FORM -->
        <div class="my-3 p-3 bg-body rounded ">
            
            <form>
                <div class="row">
                    <!-- Kolom Pertama -->
                    <div class="col-md-6">
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-3 col-form-label">Nama Barang*</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama_barang" wire:model="nama_barang">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-3 col-form-label">Kategori*</label>
                            <div class="col-sm-9">
                                <div class="d-flex gap-2">
                                    
                                    <!-- Dropdown Kategori -->
                                    <div class="dropdown flex-grow-1">
                                        <button class="btn btn-outline-primary w-100 d-flex justify-between align-items-center" type="button"
                                            id="dropdownKategori" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="me-auto">{{ $nama_kategori ?? 'Pilih Kategori' }}</span>
                                            <span class="dropdown-toggle ps-2"></span>
                                        </button>

                                        <ul class="dropdown-menu w-100" aria-labelledby="dropdownKategori">
                                            @foreach ($dtkategori as $item)
                                                <li>
                                                    <a class="dropdown-item"
                                                    href="#"
                                                    wire:click.prevent="selectKategori({{ $item->id }})">
                                                        {{ $item->nama_kategori }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    
                                    </div>
                                    <button onclick="location.reload()" class=" btn btn-secondary ">Refresh</button>
                                </div>
                                <!-- Menampilkan ID kategori yang dipilih -->
                                <input type="hidden" class="form-control mt-2" id="id_kategori" wire:model="id_kategori" readonly>

                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="alamat" class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="keterangan" wire:model="keterangan">
                            </div>
                        </div>
                        <div>
                            <div class="form-group row">
                                <label for="gambar" class="col-sm-3 col-form-label">Gambar</label>
                                <div class="col-sm-9">
                                    <input 
                                        type="file" 
                                        class="form-control @error('gambar') is-invalid @enderror" 
                                        id="gambar" 
                                        wire:model="gambar" 
                                        accept=".jpg,.jpeg,.png"
                                        onchange="document.getElementById('label-gambar').innerText = this.files[0]?.name || 'Pilih gambar';"
                                    >
                                    <small id="label-gambar" class="form-text text-muted">Pilih gambar</small>
                                    @error('gambar') 
                                        <span class="invalid-feedback d-block">{{ $message }}</span> 
                                    @enderror
                                    
                                    {{-- Preview Gambar --}}
                                    @if ($gambar instanceof \Illuminate\Http\UploadedFile)
                                        <div class="mt-3">
                                            <img src="{{ $gambar->temporaryUrl() }}" alt="Preview Gambar" class="img-thumbnail object-contain rounded" style="max-height: 100px;">
                                        </div>
                                    @endif
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
            <h4 class="font-medium">Data Barang</h4>
            <div class="pb-3 pt-3">
                <input type="text" class="form-control mb-3 w-25" placeholder="Search..." wire:model.live="cari">
            </div>
            
            <table class="table table-striped table-sortable ">
                <thead>
                    <tr>
                        <th class="col-md-1">No</th>
                        <th class="col-md-4 sort" @if ($sortcolom == 'nama_barang') {{ $sortdirection }} @endif wire:click="sort('nama_barang')">Nama Barang</th>
                        <th class="col-md-3 sort" @if ($sortcolom == 'nama_kategori') {{ $sortdirection }} @endif wire:click="sort('nama_kategori')" >Kategori</th>
                        <th class="col-md-2 sort" >Keterangan</th>
                        <th class="col-md-2 sort" >Gambar</th>
                        <th class="col-md-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    
                    
                    @foreach ($dtbarang as $key => $value)
                    <tr>
                        <td>{{ $dtbarang->firstItem() + $key }}</td>
                        <td>{{ $value->nama_barang  }}</td>
                        <td>{{ $value->nama_kategori }}</td>
                        <td>{{ $value->keterangan }}</td>
                        <td><img src="{{ asset($value->gambar) }}" alt="Gambar Barang" class="p-0.5 object-contain rounded" 
                                    style="width: 60px; height: 60px;"></td>
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


