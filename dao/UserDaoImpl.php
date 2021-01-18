<?php


class UserDaoImpl
{
    public static function login($username,$password){
        $link=createConnection();
        $query="SELECT * FROM user WHERE username=? AND password=?";
        $stmt=$link->prepare($query);
        $stmt->bindParam(1,$username);
        $stmt->bindParam(2,$password);
        $stmt->execute();
        $result=$stmt->fetch();
        closeConnection($link);
        return $result;
    }



    public static function fetchUser($name)
    {
        $link=createConnection();
        $query="SELECT * FROM user WHERE name=?";
        $stmt=$link->prepare($query);
        $stmt->bindParam(1,$name);
        $stmt->execute();
        closeConnection($link);
        return $stmt->fetch();
    }

    public static function addUserDataPegawai(User $user)
    {
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = "INSERT INTO user (name,username,password,role_id) VALUES (?,?,?,?)";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $user->getName());
        $stmt->bindValue(2, $user->getUsername());
        $stmt->bindValue(3, $user->getPassword());
        $stmt->bindValue(4, 2);
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

    public static function addUserDataMember(User $user)
    {
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = "INSERT INTO user (name,username,password,role_id) VALUES (?,?,?,?)";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $user->getName());
        $stmt->bindValue(2, $user->getUsername());
        $stmt->bindValue(3, $user->getPassword());
        $stmt->bindValue(4, 3);
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