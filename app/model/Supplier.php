<?php
if (!defined('app')) exit;

class Supplier
{
    private $id;
    private $nama;
    private $phone;
    private $alamat;

    public function __construct($id, $nama, $phone, $alamat)
    {
        $this->id = $id;
        $this->nama = $nama;
        $this->phone = $phone;
        $this->alamat = $alamat;
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

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setAlamat($alamat)
    {
        $this->alamat = $alamat;
    }

    public function getAlamat()
    {
        return $this->alamat;
    }
}
