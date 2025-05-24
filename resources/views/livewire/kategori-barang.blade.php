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
    <div class="row my-3">
        <!-- Kolom Kiri: Form Kategori -->
        <div class="col-md-6">
            <div class="rounded shadow-sm shadow-black ">
                <form>
                    <div class="mb-3 row">
                        <label for="nama_kategori" class="col-sm-4 col-form-label">Kategori Barang</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama_kategori" wire:model="nama_kategori">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-12 text-end">
                            @if ($updatedata == false)
                                <button type="button" class="btn btn-primary" wire:click="simpan()">SIMPAN</button>
                            @else
                                <button type="button" class="btn btn-primary" wire:click="update()">UPDATE</button>    
                            @endif
                            <button type="button" class="btn btn-secondary" wire:click="clear()">Clear</button>    
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Kolom Kanan: Data Tabel -->
        <div class="col-md-6">
            <div class="p-3 bg-body rounded shadow-sm">
                <h4 class="font-medium">Data Kategori Barang</h4>
                {{ $dtkategoribarang->links() }}
                <table class="table table-striped table-sortable">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-6 sort" @if ($sortcolom == 'nama_kategori') {{ $sortdirection }} @endif wire:click="sort('nama_kategori')">Kategori Barang</th>
                            <th class="col-md-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dtkategoribarang as $key => $value)
                            <tr>
                                <td>{{ $dtkategoribarang->firstitem() + $key }}</td>
                                <td>{{ $value->nama_kategori }}</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a wire:click="edit({{ $value->id }})" class="btn btn-warning btn-sm">Edit</a>
                                        <a wire:click="konfimasihapus({{ $value->id }})" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Del</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $dtkategoribarang->links() }}
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus -->
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


