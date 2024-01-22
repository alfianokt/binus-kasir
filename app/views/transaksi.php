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
          <a href="/dashboard.php" class="btn btn-primary">Dashboard</a>
          <?php if(isset($_GET['form'])): ?>
            <a href="/transaksi.php" class="btn btn-danger">Tutup Form</a>
            <?php else: ?>
              <a href="/transaksi.php?form=add" class="btn btn-info">Tambah Transaksi</a>
          <?php endif; ?>
        </div>

        <?php if(isset($_GET['form']) && $_GET['form'] == 'add'): ?>
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <form action="" method="post">
                <div class="row">
                  <div class="col-3">
                    <div class="mb-3">
                      <label for="jenistransaksi" class="form-label">Jenis</label>
                      <select class="form-select" aria-label="Default select example" id="jenistransaksi" name="jenistransaksi">
                        <option value="0" selected>Pembelian</option>
                        <option value="1">Penjualan</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label for="namaBarang" class="form-label">Barang</label>
                      <select class="form-select" aria-label="Default select example" id="namaBarang" required name="idbarang">
                        <option selected>Pilih Barang</option>
                        <?php foreach($barang as $b): ?>
                          <option value="<?= $b->getId() ?>"><?= $b->getNama() ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="mb-3">
                      <label for="namaBarang" class="form-label">Jumlah Barang</label>
                      <input type="number" class="form-control" id="namaBarang" placeholder="" name="jumlah">
                    </div>
                  </div>

                  <div class="col-12">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <?php endif; ?>

        <div class="col-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Jenis</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Harga</th>
                <th scope="col">Tanggal</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($transaksi as $i => $trx): ?>
              <tr>
                <th scope="row"><?= $i+1 ?></th>
                <td>
                  <?php if ($trx->getJenisTransaksi()): ?>
                    <span class="badge badge-sm text-bg-primary">Penjualan</span>
                  <?php else: ?>
                    <span class="badge badge-sm text-bg-danger">Pembelian</span>
                  <?php endif; ?>
                </td>
                <td><?= $trx->getBarang()->getNama() ?></td>
                <td><?= $trx->getJumlah() ?></td>
                <td>Rp <?= number_format($trx->getHarga(), 0, ',', '.') ?></td>
                <td><?= $trx->getTanggal() ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>