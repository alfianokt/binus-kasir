<?php
if (!defined('app')) exit;

class Pengguna
{
    private $id;
    private $username;
    private $nama;
    private $password;
    private $phone;
    private $alamat;
    private $idAkses;

    public function __construct($id, $username, $nama, $phone, $alamat, $idAkses)
    {
        $this->id = $id;
        $this->username = $username;
        $this->nama = $nama;
        $this->phone = $phone;
        $this->alamat = $alamat;
        $this->idAkses = $idAkses;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setusername($username)
    {
        $this->username = $username;
    }

    public function getusername()
    {
        return $this->username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setNama($nama)
    {
        $this->nama = $nama;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function getphone()
    {
        return $this->phone;
    }

    public function setphone($phone)
    {
        $this->phone = $phone;
    }

    public function getAlamat()
    {
        return $this->alamat;
    }

    public function setAlamat($alamat)
    {
        $this->alamat = $alamat;
    }

    public function getIdAkses()
    {
        return $this->idAkses;
    }

    public function setIdAkses($idAkses)
    {
        $this->idAkses = $idAkses;
    }
}
