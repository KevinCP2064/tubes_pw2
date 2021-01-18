<?php
function login($username,$password){
    $link=createConnection();
    $query="SELECT u.name,u.username,u.password,r.role FROM user u JOIN role r ON r.id = u.role_id WHERE username=? AND password=? ";
    $stmt=$link->prepare($query);
    $stmt->bindParam(1,$username);
    $stmt->bindParam(2,$password);
    $stmt->execute();
    $result=$stmt->fetch();
    closeConnection($link);
    return $result;
}

function fetchPegawai($id){
    $link=createConnection();
    $query="SELECT nama,alamat,jenis_kelamin FROM pegawai WHERE user_id=? ";
    $stmt=$link->prepare($query);
    $stmt->bindParam(1,$id);
    $stmt->execute();
    $result=$stmt->fetch();
    closeConnection($link);
    return $result;
}





