-- Akses table
CREATE TABLE akses (
  id SERIAL PRIMARY KEY,
  nama VARCHAR(255) NOT NULL,
  keterangan TEXT
);

-- Pengguna table
CREATE TABLE pengguna (
  id SERIAL PRIMARY KEY,
  username UNIQUE VARCHAR(255) NOT NULL,
  nama VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  phone VARCHAR(20),
  alamat TEXT,
  idAkses INT,
  FOREIGN KEY (idAkses) REFERENCES akses(id)
);

-- Barang table
CREATE TABLE barang (
  id SERIAL PRIMARY KEY,
  nama VARCHAR(255) NOT NULL,
  keterangan TEXT,
  satuan VARCHAR(50),
  stok INT,
  idSuplier INT,
  FOREIGN KEY (idSuplier) REFERENCES suplier(id)
);

-- Suplier table
CREATE TABLE suplier (
  id SERIAL PRIMARY KEY,
  nama VARCHAR(255) NOT NULL,
  phone VARCHAR(20),
  alamat TEXT
);

-- Transaksi table
CREATE TABLE transaksi (
  id SERIAL PRIMARY KEY,
  jenisTransaksi SMALLINT NOT NULL,
  jumlah INT,
  harga NUMERIC(10, 2),
  tanggal DATE,
  idBarang INT,
  idPengguna INT,
  FOREIGN KEY (idBarang) REFERENCES barang(id),
  FOREIGN KEY (idPengguna) REFERENCES pengguna(id),
  CONSTRAINT jenisTransaksi_check CHECK (jenisTransaksi IN (0, 1))
);

COMMENT ON COLUMN transaksi.jenisTransaksi IS '0: pembelian, 1: penjualan';