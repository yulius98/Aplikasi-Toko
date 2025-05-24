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
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-3 col-form-label">Nama*</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama_supplier" wire:model="nama_supplier">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-3 col-form-label">Email*</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" wire:model="email">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="alamat" class="col-sm-3 col-form-label">Alamat*</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="alamat" wire:model="alamat">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="kota" class="col-sm-3 col-form-label">Kota</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="kota" wire:model="kota">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="kodepos" class="col-sm-3 col-form-label">Kodepos</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="kodepos" wire:model="kodepos">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="telepon" class="col-sm-3 col-form-label">Telepon*</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="telepon" wire:model="telepon">
                            </div>
                        </div>
                    </div>
        
                    <!-- Kolom Kedua -->
                    <div class="col-md-6">
                        <div class="mb-3 row">
                            <label for="bank" class="col-sm-3 col-form-label">Bank</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="bank" wire:model="bank">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="norek" class="col-sm-3 col-form-label">No. Rekening</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="norek" wire:model="norek">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="namarek" class="col-sm-3 col-form-label">Nama Rekening</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="namarek" wire:model="atasnama">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="npwp" class="col-sm-3 col-form-label">NPWP</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="npwp" wire:model="npwp">
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
            <h4 class="font-medium">Data Supplier</h4>
            <div class="pb-3 pt-3">
                <input type="text" class="form-control mb-3 w-25" placeholder="Search..." wire:model.live="cari">
            </div>
            {{ $dtsupplier->links() }}
            <table class="table table-striped table-sortable ">
                <thead>
                    <tr>
                        <th class="col-md-1">No</th>
                        <th class="col-md-4 sort" @if ($sortcolom == 'nama_supplier') {{ $sortdirection }} @endif wire:click="sort('nama_supplier')">Nama</th>
                        <th class="col-md-3 sort" @if ($sortcolom == 'email') {{ $sortdirection }} @endif wire:click="sort('email')" >Email</th>
                        <th class="col-md-2 sort" @if ($sortcolom == 'alamat') {{ $sortdirection }} @endif wire:click="sort('alamat')">Alamat</th>
                        <th class="col-md-2 sort" @if ($sortcolom == 'kota') {{ $sortdirection }} @endif wire:click="sort('kota')">Kota</th>
                        <th class="col-md-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dtsupplier as $key => $value)
                    <tr>
                        <td>{{ $dtsupplier->firstitem() + $key }}</td>
                        <td>{{ $value->nama_supplier  }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->alamat }}</td>
                        <td>{{ $value->kota }}</td>
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
            {{ $dtsupplier->links() }}
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

