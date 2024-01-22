<?php
if (!defined('app')) exit;

class Barang
{
    private $id;
    private $nama;
    private $keterangan;
    private $satuan;
    private $stok;
    private $idSupplier;

    public function __construct($id, $nama, $keterangan, $satuan, $stok, $idSupplier)
    {
        $this->id = $id;
        $this->nama = $nama;
        $this->keterangan = $keterangan;
        $this->satuan = $satuan;
        $this->stok = $stok;
        $this->idSupplier = $idSupplier;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setNama($nama)
    {
        $this->nama = $nama;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function setKeterangan($keterangan)
    {
        $this->keterangan = $keterangan;
    }

    public function getKeterangan()
    {
        return $this->keterangan;
    }

    public function setSatuan($satuan)
    {
        $this->satuan = $satuan;
    }

    public function getSatuan()
    {
        return $this->satuan;
    }

    public function setStok($stok)
    {
        $this->stok = $stok;
    }

    public function getStok()
    {
        return $this->stok;
    }

    public function setIdSupplier($idSupplier)
    {
        $this->idSupplier = $idSupplier;
    }


    public function getIdSupplier()
    {
        return $this->idSupplier;
    }
}
