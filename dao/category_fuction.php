<?php
function fetchCategoryData(){
    $link=createConnection();
    $query="SELECT * FROM categories";
    $result=$link->query($query);
    closeConnection($link);
    return $result;
}

function addCategoryData($category){
    $result=0;
    $link=createConnection();
    $query="INSERT INTO categories (category) VALUES (?)";
    $stmt=$link->prepare($query);
    $stmt->bindParam(1,$category);
    $link->beginTransaction();
    if($stmt->execute()){
        $link->commit();
        $result=1;
    }else{
        $link->rollBack();
    }
    closeConnection($link);
    return $result;
}

function updateCategoryData($category,$id){
    $result=0;
    $link=createConnection();
    $query="UPDATE categories SET category=? WHERE id=?";
    $stmt=$link->prepare($query);
    $stmt->bindParam(1,$category);
    $stmt->bindParam(2,$id);
    $link->beginTransaction();
    if($stmt->execute()){
        $link->commit();
        $result=1;
    }else{
        $link->rollBack();
    }
    closeConnection($link);
    return $result;
}

function deleteCategoryData($id){
    $result=0;
    $link=createConnection();
    $query="DELETE FROM categories WHERE id=?";
    $stmt=$link->prepare($query);
    $stmt->bindParam(1,$id);
    $link->beginTransaction();
    if($stmt->execute()){
        $link->commit();
        $result=1;
    }else{
        $link->rollBack();
    }
    closeConnection($link);
    return $result;
}


