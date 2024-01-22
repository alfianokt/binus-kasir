<?php
if (!defined('app')) exit;

class Akses
{
    private $id;
    private $nama;
    private $keterangan;

    public function __construct($id, $nama, $keterangan)
    {
        $this->id = $id;
        $this->nama = $nama;
        $this->keterangan = $keterangan;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function getId()
    {
        return $this->id;
    }

    function setNama($nama)
    {
        $this->nama = $nama;
    }

    function getNama()
    {
        return $this->nama;
    }

    function setKeterangan($keterangan)
    {
        $this->keterangan = $keterangan;
    }

    function getKeterangan()
    {
        return $this->keterangan;
    }
}
