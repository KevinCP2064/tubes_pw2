<?php


class MemberDaoImpl
{
    public static function fetchMemberPoints(Member $member)
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT point FROM member WHERE id=?";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $member->getId());
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        PDOUtil::closeConnection($link);
        return $stmt->fetchObject('Member');
    }

    public static function addMemberData(Member $member)
    {
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = "INSERT INTO member (name,point,user_id) VALUES (?,?,?)";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $member->getName());
        $stmt->bindValue(2, 0);
        $stmt->bindValue(3, $member->getUser());
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