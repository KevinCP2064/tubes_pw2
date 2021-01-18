<?php


class PegawaiDaoImpl
{
    public static function fetchPegawaiData()
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT * FROM pegawai";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'Pegawai');
        PDOUtil::closeConnection($link);
        return $result;
    }

    public static function addPegawaiData(Pegawai $pegawai)
    {
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = "INSERT INTO pegawai (nama,alamat,jenis_kelamin,user_id) VALUES (?,?,?,?)";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $pegawai->getNama());
        $stmt->bindValue(2, $pegawai->getAlamat());
        $stmt->bindValue(3, $pegawai->getJenisKelamin());
        $stmt->bindValue(4, $pegawai->getUser());
        $link->beginTransaction();
        if ($stmt->execute()) {
            $link->commit();
            $result = 1;
        } else {
            $link->rollBack();
        }
        PDOUtil::closeConnection($link);
        return $result;
    }
}