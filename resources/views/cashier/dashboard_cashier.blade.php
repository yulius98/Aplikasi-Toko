<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Dashboard Cashier</title>
	
	<link href="css/cashier.css" rel="stylesheet" />
</head>
<body>
	<header>
		<div class="search-box">
			<input type="text" placeholder="Search..." />
		</div>
		<button class="logout-button">Logout</button>
	</header>
	<div class="container">
		<div class="sidebar">
			<div class="section-title">BARANG</div>
			<!-- Sidebar content can be added here -->
		</div>
		<div class="main-content">
			<div class="section-title">Barang yang di beli</div>
			<div class="items-list">
				<table>
					<thead>
						<tr>
							<th>Nama Barang</th>
							<th>Jumlah</th>
							<th>Harga</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						<!-- Example row, replace with dynamic content -->
						<tr>
							<td>Contoh Barang 1</td>
							<td>2</td>
							<td>Rp 10.000</td>
							<td>Rp 20.000</td>
						</tr>
						<tr>
							<td>Contoh Barang 2</td>
							<td>1</td>
							<td>Rp 15.000</td>
							<td>Rp 15.000</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="summary">
				<div>Total Harga<br />Rp 35.000</div>
				<div>Pembulatan<br />Rp 0</div>
				<div>Total yang dibayar<br />Rp 35.000</div>
			</div>
			<div class="actions">
				<button class="pay-btn">Bayar</button>
				<button class="cancel-btn">Batal</button>
			</div>
		</div>
	</div>
</body>
</html>
