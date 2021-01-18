<?php
function fetchBookData(){
    $link=createConnection();
    $query="SELECT books.ISBN,books.cover, books.title,books.author,books.publisher,books.publish_year,categories.category
FROM books
LEFT JOIN categories ON books.category_id = categories.id";
    $result=$link->query($query);
    closeConnection($link);
    return $result;
}

function fetchBook($isbn){
    $link=createConnection();
    $query="SELECT * FROM books WHERE isbn=?";
    $stmt=$link->prepare($query);
    $stmt->bindParam(1,$isbn);
    $stmt->execute();
    closeConnection($link);
    return $stmt->fetch();
}

function addBookData($isbn,$title,$author,$publisher,$publish_year,$category_id,$cover=null){
    $result=0;
    $link=createConnection();
    $query="INSERT INTO books (ISBN, title, author,publisher,publish_year,category_id,cover) VALUES (?,?,?,?,?,?,?)";
    $stmt=$link->prepare($query);
    $stmt->bindParam(1,$isbn);
    $stmt->bindParam(2,$title);
    $stmt->bindParam(3,$author);
    $stmt->bindParam(4,$publisher);
    $stmt->bindParam(5,$publish_year);
    $stmt->bindParam(6,$category_id);
    $stmt->bindParam(7,$cover);
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

function updateBookData($title,$author,$publisher,$publish_year,$category_id,$isbn){
    $result=0;
    $link=createConnection();
    $query="UPDATE books SET title=?, author=?,publisher=?,publish_year=?,category_id=? WHERE ISBN=?";
    $stmt=$link->prepare($query);
    $stmt->bindParam(1,$title);
    $stmt->bindParam(2,$author);
    $stmt->bindParam(3,$publisher);
    $stmt->bindParam(4,$publish_year);
    $stmt->bindParam(5,$category_id);
    $stmt->bindParam(6,$isbn);
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

function deleteBookData($isbn){
    $result=0;
    $link=createConnection();
    $query="DELETE FROM books WHERE ISBN=?";
    $stmt=$link->prepare($query);
    $stmt->bindParam(1,$isbn);
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
