<?php


class BookDaoImpl
{

    public static function fetchBookData()
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT books.ISBN,books.cover, books.title,books.author,books.publisher,books.publish_year,categories.category
FROM books
LEFT JOIN categories ON books.category_id = categories.id";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'Book');
        PDOUtil::closeConnection($link);
        return $result;
    }

    public static function fetchBook(Book $book)
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT * FROM books WHERE isbn=?";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $book->getIsbn());
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        PDOUtil::closeConnection($link);
        return $stmt->fetchObject('Book');
    }

    public static function addBookData(Book $book)
    {
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = "INSERT INTO books (ISBN, title, author,publisher,publish_year,category_id,cover) VALUES (?,?,?,?,?,?,?)";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $book->getIsbn());
        $stmt->bindValue(2, $book->getTitle());
        $stmt->bindValue(3, $book->getAuthor());
        $stmt->bindValue(4, $book->getPublisher());
        $stmt->bindValue(5, $book->getPublishYear());
        $stmt->bindValue(6, $book->getCategory());
        $stmt->bindValue(7, $book->getCover());
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

    public static function updateBookData(Book $book)
    {
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = "UPDATE books SET title=?, author=?,publisher=?,publish_year=?,category_id=? WHERE ISBN=?";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $book->getTitle());
        $stmt->bindValue(2, $book->getAuthor());
        $stmt->bindValue(3, $book->getPublisher());
        $stmt->bindValue(4, $book->getPublishYear());
        $stmt->bindValue(5, $book->getCategory());
        $stmt->bindValue(6, $book->getIsbn());
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

    public static function deleteBookData(Book $book)
    {
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = "DELETE FROM books WHERE ISBN=?";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $book->getIsbn());
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