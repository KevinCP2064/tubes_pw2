<?php


class Pegawai
{
    private $id;
    private $nama;
    private $alamat;
    private $jenis_kelamin;
    private $user;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNama()
    {
        return $this->nama;
    }

    /**
     * @param mixed $nama
     */
    public function setNama($nama)
    {
        $this->nama = $nama;
    }

    /**
     * @return mixed
     */
    public function getAlamat()
    {
        return $this->alamat;
    }

    /**
     * @param mixed $alamat
     */
    public function setAlamat($alamat)
    {
        $this->alamat = $alamat;
    }

    /**
     * @return mixed
     */
    public function getJenisKelamin()
    {
        return $this->jenis_kelamin;
    }

    /**
     * @param mixed $jenis_kelamin
     */
    public function setJenisKelamin($jenis_kelamin)
    {
        $this->jenis_kelamin = $jenis_kelamin;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }



}