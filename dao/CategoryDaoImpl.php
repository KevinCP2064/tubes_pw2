<?php


class CategoryDaoImpl
{

    public static function fetchCategoryData()
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT * FROM categories";
        $result = $link->query($query);
        $result->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'Category');
        PDOUtil::closeConnection($link);
        return $result;
    }

    public static function fetchCategory(Category $category)
    {
        $link = PDOUtil::createConnection();
        $query = "SELECT * FROM categories WHERE id=?";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $category->getId());
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->execute();
        PDOUtil::closeConnection($link);
        return $stmt->fetchObject('Category');
    }

    public static function addCategoryData(Category $category)
    {
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = "INSERT INTO categories (category) VALUES (?)";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $category->getCategory());
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

    public static function updateCategoryData(Category $category)
    {
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = "UPDATE categories SET category=? WHERE id=?";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $category->getCategory());
        $stmt->bindValue(2, $category->getId());
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

    public static function deleteCategoryData(Category $category)
    {
        $result = 0;
        $link = PDOUtil::createConnection();
        $query = "DELETE FROM categories WHERE id=?";
        $stmt = $link->prepare($query);
        $stmt->bindValue(1, $category->getId());
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