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
            <a href="/barang.php" class="btn btn-danger">Tutup Form</a>
            <?php else: ?>
              <a href="/barang.php?form=add" class="btn btn-info">Tambah Data</a>
          <?php endif; ?>
        </div>

        <?php if(isset($_GET['form']) && $_GET['form'] == 'edit'): ?>
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <form action="" method="post">
                <div class="row">
                  <div class="col-4">
                    <div class="mb-3">
                      <label for="namaBarang" class="form-label">Nama Barang</label>
                      <input type="text" class="form-control" id="namaBarang" placeholder="" name="nama" value="<?= $barang_edit->getNama() ?>">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="mb-3">
                      <label for="namaBarang" class="form-label">Satuan Barang</label>
                      <input type="number" class="form-control" id="namaBarang" placeholder="" name="satuan" value="<?= $barang_edit->getSatuan() ?>">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="mb-3">
                      <label for="namaBarang" class="form-label">Stok Barang</label>
                      <input type="number" class="form-control" id="namaBarang" placeholder="" name="stok" value="<?= $barang_edit->getStok() ?>">
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

        <?php if(isset($_GET['form']) && $_GET['form'] == 'add'): ?>
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <form action="" method="post">
                <div class="row">
                  <div class="col-4">
                    <div class="mb-3">
                      <label for="namaBarang" class="form-label">Nama Barang</label>
                      <input type="text" class="form-control" id="namaBarang" placeholder="" name="nama">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="mb-3">
                      <label for="namaBarang" class="form-label">Satuan Barang</label>
                      <input type="number" class="form-control" id="namaBarang" placeholder="" name="satuan">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="mb-3">
                      <label for="namaBarang" class="form-label">Stok Barang</label>
                      <input type="number" class="form-control" id="namaBarang" placeholder="" name="stok">
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
                <th scope="col">Nama</th>
                <th scope="col">Satuan</th>
                <th scope="col">Stok</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($barang as $i => $b): ?>
              <tr>
                <th scope="row"><?= $i+1 ?></th>
                <td><?= $b->getNama() ?></td>
                <td>Rp <?= number_format($b->getSatuan(), 0, ',', '.') ?></td>
                <td><?= $b->getStok() ?></td>
                <td>
                  <div class="d-flex">
                    <a class="me-2 btn btn-sm btn-info" href="/barang.php?form=edit&id=<?= $b->getId() ?>">Edit</a>
                    <div>
                      <form action="?form=delete" method="post" class="m-0">
                        <input type="hidden" name="id" value="<?= $b->getId() ?>">
                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Hapus data?')">Hapus</button>
                      </form>
                    </div>
                  </div>
                </td>
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