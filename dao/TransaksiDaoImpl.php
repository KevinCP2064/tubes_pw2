<?php


class TransaksiDaoImpl
{
    public static function fetchTransaksiData()
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT pegawai.nama,member.name, bahan_bakar.nama_minyak,transaksi.liter,transaksi.total_biaya
FROM transaksi LEFT JOIN pegawai ON transaksi.pegawai_id = pegawai.user_id LEFT JOIN member ON transaksi.member_id = member.user_id LEFT JOIN bahan_bakar ON transaksi.bahan_bakar_id = bahan_bakar.id";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'Transaksi');
        PDOUtil::closeConnection($link);
        return $result;
    }

    public static function addTransaksiData(Transaksi $transaksi)
    {
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = "INSERT INTO transaksi (member_id, pegawai_id, bahan_bakar_id,liter,total_biaya) VALUES (?,?,?,?,?)";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $transaksi->getMember());
        $stmt->bindValue(2, $transaksi->getPegawai());
        $stmt->bindValue(3, $transaksi->getBahanBakar());
        $stmt->bindValue(4, $transaksi->getLiter());
        $stmt->bindValue(5, $transaksi->getTotalBiaya());
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