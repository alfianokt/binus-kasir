#

##
- Akses
  - id, nama, keterangan
- Pengguna
  - id, username, nama, password, phone, alamat, idAkses
- Barang
  - id, nama, keterangan, satuan, stok, idSuplier
- Suplier
  - id, nama, phone, alamat
- Transaksi
  - id, jenisTransaksi, jumlah, harga, tanggal, idBarang, idPengguna


-- Akses table
CREATE TABLE shop.akses (
  id SERIAL PRIMARY KEY,
  nama VARCHAR(255) NOT NULL,
  keterangan TEXT
);

-- Pengguna table
CREATE TABLE shop.pengguna (
  id SERIAL PRIMARY KEY,
  username VARCHAR(255) NOT NULL,
  nama VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  phone VARCHAR(20),
  alamat TEXT,
  idAkses INT,
  FOREIGN KEY (idAkses) REFERENCES Akses(id)
);

-- Barang table
CREATE TABLE shop.barang (
  id SERIAL PRIMARY KEY,
  nama VARCHAR(255) NOT NULL,
  keterangan TEXT,
  satuan VARCHAR(50),
  stok INT,
  idSuplier INT,
  FOREIGN KEY (idSuplier) REFERENCES Suplier(id)
);

-- Suplier table
CREATE TABLE shop.suplier (
  id SERIAL PRIMARY KEY,
  nama VARCHAR(255) NOT NULL,
  phone VARCHAR(20),
  alamat TEXT
);

-- Transaksi table
CREATE TABLE shop.transaksi (
  id SERIAL PRIMARY KEY,
  jenisTransaksi ENUM ('0', '1') NOT NULL,
  jumlah INT,
  harga NUMERIC(10, 2),
  tanggal DATE,
  idBarang INT,
  idPengguna INT,
  FOREIGN KEY (idBarang) REFERENCES Barang(id),
  FOREIGN KEY (idPengguna) REFERENCES Pengguna(id)
);

COMMENT ON COLUMN Transaksi.jenisTransaksi IS '0: pembelian, 1: penjualan';