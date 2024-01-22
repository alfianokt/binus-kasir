<?php
if (!defined('app')) exit;

class Transaksi
{
    private $id;
    private $jenisTransaksi;
    private $jumlah;
    private $harga;
    private $tanggal;
    private $idBarang;
    private $barang;
    private $idPengguna;

    public function __construct($id, $jenisTransaksi, $jumlah, $harga, $tanggal, $idBarang, $idPengguna)
    {
        $this->id = $id;
        $this->jenisTransaksi = $jenisTransaksi;
        $this->jumlah = $jumlah;
        $this->harga = $harga;
        $this->tanggal = $tanggal;
        $this->idBarang = $idBarang;
        $this->idPengguna = $idPengguna;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setJenisTransaksi($jenisTransaksi)
    {
        $this->jenisTransaksi = $jenisTransaksi;
    }

    public function getJenisTransaksi()
    {
        return $this->jenisTransaksi;
    }

    public function setJumlah($jumlah)
    {
        $this->jumlah = $jumlah;
    }

    public function getJumlah()
    {
        return $this->jumlah;
    }

    public function setHarga($harga)
    {
        $this->harga = $harga;
    }

    public function getHarga()
    {
        return $this->harga;
    }

    public function setTanggal($tanggal)
    {
        $this->tanggal = $tanggal;
    }

    public function getTanggal()
    {
        return $this->tanggal;
    }

    public function setIdBarang($idBarang)
    {
        $this->idBarang = $idBarang;
    }

    public function getIdBarang()
    {
        return $this->idBarang;
    }

    public function setIdPengguna($idPengguna)
    {
        $this->idPengguna = $idPengguna;
    }

    public function getIdPengguna()
    {
        return $this->idPengguna;
    }

    public function setBarang(Barang $barang)
    {
        $this->barang = $barang;
    }

    public function getBarang()
    {
        return $this->barang;
    }
}
