<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminCatalog
 *
 * @author Озармехр
 */
class AdminCatalog {
    
    /**
     * Добавление новой категории
     * @param string $title название категории
     * @param int $status статус категории
     * @return type
     */
    public static function Create($title, $status)
    {
        $status = intval($status);
        $pdo = Db::getConnection();
        $sql = "INSERT IGNORE INTO category (category_title, category_status) "
                . "VALUES (:title, :status)";
        $result = $pdo->prepare($sql);
        $result->bindParam(":title", $title, PDO::PARAM_STR);
        $result->bindParam(":status", $status, PDO::PARAM_STR);
        return $result->execute();
    }
    
    
    public static function Read()
    {
        $pdo = Db::getConnection();
        
        $categoryList = array();
        
        $sql = "SELECT id, category_title, category_status"
                            . " FROM category ORDER BY category_title ASC";
        $result = $pdo->query($sql);
        
        $i = 0;
        while ($row = $result->fetch())
        {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['category_title'] = $row['category_title']; 
            $categoryList[$i]['category_status'] = $row['category_status']; 
            $i++;
        }
        return $categoryList;
    }
    
    public static function Update($title, $status, $id)
    {
        $status = intval($status);
        $pdo = Db::getConnection();
        $sql = "UPDATE category SET "
                . " category_title = :title,"
                . " category_status = :status"
                . " WHERE id = :id";
        $result = $pdo->prepare($sql);
        $result->bindParam(":title", $title, PDO::PARAM_STR);
        $result->bindParam(":status", $status, PDO::PARAM_STR);
        $result->bindParam(":id", $id, PDO::PARAM_STR);
        return $result->execute();
    }
    
        
    public static function get_CategoryById($categoryid)
    {
        $pdo = Db::getConnection();
        $sql = "SELECT id, category_title, category_status"
                            . " FROM category Where id = :categoryid";
        $result = $pdo->prepare($sql);
        $result->bindParam(":categoryid", $categoryid, PDO::PARAM_STR);
        $result->execute();
        return $result->fetch();
    }
    
    /**
     * Удаление категории
     * @return bool
     */
    public static function Delete($categoryid)
    {
        $categoryid = intval($categoryid);
        $pdo = Db::getConnection();
        $sql = "DELETE FROM category WHERE id = :id";
        $result = $pdo->prepare($sql);
        $result->bindParam(":id", $categoryid, PDO::PARAM_INT);
        return $result->execute();
    }
    
    /**
     * Возвращает количество категории
     * @return int количество категории
     */
    public static function get_CatalogCount()
    {
        $pdo = Db::getConnection();
        $sql = "SELECT count(id) as count from category";
        $result = $pdo->query($sql);
        $row = $result->fetch();
        if ($row)
        {
            return $row['count'];
        }
    }
}
