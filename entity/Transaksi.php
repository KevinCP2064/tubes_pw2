<?php


class Transaksi
{
    private $id;
    private $member;
    private $pegawai;
    private $bahanBakar;
    private $liter;
    private $totalBiaya;

    /**
     * @return mixed
     */
    public function getTotalBiaya()
    {
        return $this->totalBiaya;
    }

    /**
     * @param mixed $totalBiaya
     */
    public function setTotalBiaya($totalBiaya)
    {
        $this->totalBiaya = $totalBiaya;
    }



    /**
     * @return mixed
     */
    public function getLiter()
    {
        return $this->liter;
    }

    /**
     * @param mixed $liter
     */
    public function setLiter($liter)
    {
        $this->liter = $liter;
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
    public function getMember()
    {
        return $this->member;
    }

    /**
     * @param mixed $member
     */
    public function setMember($member)
    {
        $this->member = $member;
    }

    /**
     * @return mixed
     */
    public function getPegawai()
    {
        return $this->pegawai;
    }

    /**
     * @param mixed $pegawai
     */
    public function setPegawai($pegawai)
    {
        $this->pegawai = $pegawai;
    }

    /**
     * @return mixed
     */
    public function getBahanBakar()
    {
        return $this->bahanBakar;
    }

    /**
     * @param mixed $bahanBakar
     */
    public function setBahanBakar($bahanBakar)
    {
        $this->bahanBakar = $bahanBakar;
    }


}