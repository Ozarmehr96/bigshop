<?php
/**
 * Админ. Управление продуктами
 *
 * @author Озармехр
 */
class AdminProduct extends AdminBase {

    /**
     * Возвращает результат добавления товара админом
     * @param array $inputValue
     * @return bool
     */
    public static function Create($inputValue)
    {
        $pdo = Db::getConnection();
        
        $sql = "INSERT INTO product(title,category_id,code, newprice,lastprise, status,is_new,is_recom,discription) "
                . "VALUES(:title,:category_id,:code,:newprice,:lastprise,:status,:is_new,:is_recom,:discription)";
        $result = $pdo->prepare($sql);
        $result->bindParam(":title", $inputValue['title'], PDO::PARAM_STR);
        $result->bindParam(":category_id", $inputValue['categ'], PDO::PARAM_STR);
        $result->bindParam(":code", $inputValue['code'], PDO::PARAM_STR);
        $result->bindParam(":newprice", $inputValue['newprice'], PDO::PARAM_STR);
        $result->bindParam(":lastprise", $inputValue['oldprice'], PDO::PARAM_STR);
        $result->bindParam(":status", $inputValue['status'], PDO::PARAM_STR);
        $result->bindParam(":is_new", $inputValue['is_new'], PDO::PARAM_STR);
        $result->bindParam(":is_recom", $inputValue['is_recom'], PDO::PARAM_STR);
        $result->bindParam(":discription", $inputValue['discription'], PDO::PARAM_STR);
        if ($result->execute() === TRUE){
           $last_id = $pdo->lastInsertId();
           return $last_id; 
        }
    }
    /**
     * Возвращает список продуктов для админ панельки
     * @return массив
     */
    public static function Read()
    {
        $productList = array();
        $pdo = Db::getConnection();
        
        $sql = "SELECT id, title, code, title, newprice FROM product";
        $result = $pdo->query($sql);
        $result->execute();
        return $result->fetchAll();
    }
    
    /**
     * Модифицирует товар по указанному id
     * @param array $getPostVal массив данных 
     * @param int $product_id   код продукта
     * @return bool
     */
    public static function Update($getPostVal, $product_id)
    {
        $product_id = intval($product_id);
        $pdo = Db::getConnection();
        try {
             $sq  = "Update product SET "
                     . "title = :title,"
                     . "category_id=:category_id,"
                     . "code = :code, "
                     . "newprice = :newprice,"
                     . "lastprise = :lastprise, "
                     . "status = :status,"
                     . "is_new = :is_new,"
                     . "is_recom = :is_recom,"
                     . "discription = :discription "
                     . "WHERE id = :id";
        $result = $pdo->prepare($sq);
        $result->bindParam(":title", $getPostVal['title'], PDO::PARAM_STR);
        $result->bindParam(":category_id", $getPostVal['categ'], PDO::PARAM_STR);
        $result->bindParam(":code", $getPostVal['code'], PDO::PARAM_STR);
        $result->bindParam(":newprice", $getPostVal['newprice'], PDO::PARAM_STR);
        $result->bindParam(":lastprise", $getPostVal['lastprice'], PDO::PARAM_STR);
        $result->bindParam(":status", $getPostVal['status'], PDO::PARAM_STR);
        $result->bindParam(":is_new", $getPostVal['is_new'], PDO::PARAM_STR);
        $result->bindParam(":is_recom", $getPostVal['is_recom'], PDO::PARAM_STR);
        $result->bindParam(":discription", $getPostVal['discription'], PDO::PARAM_STR);
        $result->bindParam(":id", $product_id, PDO::PARAM_STR);
        return $result->execute();
        } catch (Exception $ex) {
            echo "Ошибка".$ex->getMessage();
        }
    }
    
    /**
     * Удаление админом товара
     * @param int $product_id код продукта
     * @return bool
     */
    public static function Delete($product_id)
    {
        $product_id = intval($product_id);
        $pdo = Db::getConnection();
        $sql = "DELETE FROM product WHERE id = :id";
        $result = $pdo->prepare($sql);
        $result->bindParam(":id", $product_id, PDO::PARAM_INT);
        return $result->execute();
    }
    
    public static function get_ProductsCount()
    {
        $pdo = Db::getConnection();
        $sql = "SELECT count(id) as count from product";
        $result = $pdo->query($sql);
        $row = $result->fetch();
        return $row['count'];
    }
}