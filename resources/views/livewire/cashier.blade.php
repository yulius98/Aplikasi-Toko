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

    <div class="header">
      <div class="search-bar">
        <input type="text" placeholder="Search" aria-label="Search" />
      </div>
      <div class="logout">
        <button>Logout</button>
      </div>
    </div>

    <!-- Display barang -->
    <main class="main-content">
      <section class="items-section p-4">
        <div class="cards-container">
            <!-- Baris 1 -->
            @foreach ( $dtdisplay as $item )
              <div class="card">
                <div class="mb-3">
                  <img src="{{ asset($item->gambar) }}" 
                    alt="{{ $item->nama_barang }}" 
                    class="item-image object-contain rounded-md" />
                </div>
                <h3 class="font-semibold text-base mb-1">{{ $item->nama_barang }}</h3>
                <p class="text-gray-700 text-sm mb-3">Harga: Rp {{ number_format($item->harga_jual, 0, ',', '.') }}</p>
                <button wire:click="addToCart({{ $item->id }})"
                        class="btn-card">
                  Beli
                </button>
              </div>
            @endforeach
        </div>
      </section>
            
      <section class="payment-section">
        <h2>Barang yang di beli</h2>
        <hr />
        <div class="payment-details">
          <div class="detail-row">
            <span>Total Harga</span>
            <span class="value">Rp 0</span>
          </div>
          <div class="detail-row">
            <span>Pembulatan</span>
            <span class="value">Rp 0</span>
          </div>
          <div class="detail-row total">
            <span>Total yang dibayar</span>
            <span class="value">Rp 0</span>
          </div>
        </div>
        <div class="payment-actions">
          <button class="btn pay-btn">Bayar</button>
          <button class="btn cancel-btn">Batal</button>
          <!-- <a href="https://wa.me/+6281393979120" target="_blank" class="btn contact-btn">
            Hubungi Admin
          </a> -->
        </div>
      </section>
    </main>
</div>