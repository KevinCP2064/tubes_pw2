<?php
function fetchCategoryData(){
    $link=createConnection();
    $query="SELECT * FROM pegawai";
    $result=$link->query($query);
    closeConnection($link);
    return $result;
}