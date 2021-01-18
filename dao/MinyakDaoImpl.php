<?php


class MinyakDaoImpl
{
    public static function fetchMinyakData()
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT * FROM bahan_bakar";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'BahanBakar');
        PDOUtil::closeConnection($link);
        return $result;
    }

    public static function fetchMinyak($id)
    {
        $link=createConnection();
        $query="SELECT * FROM bahan_bakar WHERE id=?";
        $stmt=$link->prepare($query);
        $stmt->bindParam(1,$id);
        $stmt->execute();
        closeConnection($link);
        return $stmt->fetch();
    }

    public static function updateMinyakData(BahanBakar $bahanBakar)
    {
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = "UPDATE bahan_bakar SET harga=? WHERE id=?";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $bahanBakar->getHarga());
        $stmt->bindValue(2, $bahanBakar->getId());
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