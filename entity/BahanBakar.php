<?php


class BahanBakar
{
    private $id;
    private $nama_minyak;
    private $harga;

    /**
     * @return mixed
     */
    public function getNamaMinyak()
    {
        return $this->nama_minyak;
    }

    /**
     * @param mixed $nama_minyak
     */
    public function setNamaMinyak($nama_minyak)
    {
        $this->nama_minyak = $nama_minyak;
    }



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
    public function getHarga()
    {
        return $this->harga;
    }

    /**
     * @param mixed $harga
     */
    public function setHarga($harga)
    {
        $this->harga = $harga;
    }



}