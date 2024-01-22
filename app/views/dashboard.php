<?php if (!defined('app')) exit ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="mt-3">
      <div class="container">
        <div class="row">
          <div class="mb-3 col-12">
            <a href="/barang.php" class="btn btn-info">Kelola Barang</a>
            <a href="/transaksi.php" class="btn btn-primary">Kelola Transaksi</a>
          </div>

          <div class="col-3">
            <div class="card">
              <div class="card-body">
                <h3>Total Item Pembelian</h3>
                <span class="badge badge-lg text-bg-primary"><?= $overview['item_pembelian'] ?> item</span>
              </div>
            </div>
          </div>

          <div class="col-3">
            <div class="card">
              <div class="card-body">
                <h3>Total Item Penjualan</h3>
                <span class="badge badge-lg text-bg-primary"><?= $overview['item_penjualan'] ?> item</span>
              </div>
            </div>
          </div>

          <div class="col-3">
            <div class="card">
              <div class="card-body">
                <h3>Total Pembelian</h3>
                <span class="badge badge-lg text-bg-success">Rp <?= number_format($overview['harga_pembelian'], 0, ',', '.') ?></span>
              </div>
            </div>
          </div>

          <div class="col-3">
            <div class="card">
              <div class="card-body">
                <h3>Total Penjualan</h3>
                <span class="badge badge-lg text-bg-success">Rp <?= number_format($overview['harga_penjualan'], 0, ',', '.') ?></span>
              </div>
            </div>
          </div>

          <div class="mt-3 col-6">
            <div class="card">
              <div class="card-body">
                <h3>Laporan Raba Rugi</h3>
                <span class="badge badge-lg <?= $laba_rugi < 0 ? "text-bg-danger" : "text-bg-success" ?>">
                  <?= number_format($laba_rugi, 0, ',', '.') ?>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>