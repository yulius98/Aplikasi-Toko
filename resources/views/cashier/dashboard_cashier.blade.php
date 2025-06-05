<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard Cashier</title>
  <link rel="stylesheet" href="css/global_cashier.css" />
  <link rel="stylesheet" href="css/cashier.css" />
</head>
<body>
  <div class="container">
    <header class="header">
      <div class="search-bar">
        <input type="text" placeholder="Search" aria-label="Search" />
      </div>
      <div class="logout">
        <button>Logout</button>
      </div>
    </header>
    <main class="main-content">
      <section class="items-section">
        <h2>BARANG</h2>
        
        <!-- Content for items can be added here -->
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
        </div>
      </section>
    </main>
  </div>
</body>
</html>
