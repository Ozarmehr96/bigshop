<?php

/**
 * Description of Product
 *
 * @author Озармехр
 */
class Product {

    /**
     * Возвращает данные только об одно товара
     * @param type $id
     * @return type
     */
    public static function get_SingleProduct($id) {
        $id = intval($id);
        $pdo = Db::getConnection();

        $sql = "SELECT * FROM product WHERE id = :id";
        $result = $pdo->prepare($sql);
        $result->bindParam(":id", $id, PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();
        return $user;
    }

    /**
     * Выборка товаров с помощью id
     * @param int $id id товара
     * @return array массив данных
     */
    public static function get_ProductByCategoryId($id) {
        $pdo = Db::getConnection();

        $productList = array();

        $sql = "SELECT category_id,id,title,newprice,lastprise,status,image, is_new FROM product "
                . "WHERE status = 1 and category_id = $id ";
        $result = $pdo->query($sql);

        $i = 0;
        while ($row = $result->fetch()) {
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['category_id'] = $row['category_id'];
            $productList[$i]['title'] = $row['title'];
            $productList[$i]['newprice'] = $row['newprice'];
            $productList[$i]['lastprise'] = $row['lastprise'];
            $productList[$i]['is_new'] = $row['is_new'];
            $productList[$i]['status'] = $row['status'];
            $productList[$i]['image'] = $row['image'];
            $i++;
        }
        return $productList;
    }

    /**
     * Возвращает путь к изображению
     * @param int $image_id id фотографии
     * @return string путь к изображению
     */
    public static function get_ImageByID($image_id) {
        $noImage = 'no-image.jpg';
        $image_id = intval($image_id);
        $pathFolder = '/uploads/images/products/';
        $imagePath = $pathFolder . $image_id . '.jpg';
        // Если существует такой файл с id
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $imagePath)) {
            // то вернем картинку товара 
            return $imagePath;
        } else {
            // если нет, то вернем no-image
            return $pathFolder . $noImage;
        }
    }

    /**
     *  Возвращает массив данных о продуктах
     * Просмотр всех товаров
     * @return array массвив продуктов
     */
    public static function get_AllProducts() {
        $pdo = Db::getConnection();

        $productList = array();

        $sql = "SELECT category_id,id,title,newprice,lastprise,status,image, is_new FROM product Where status = 1  ORDER BY title ASC";
        $result = $pdo->query($sql);

        $i = 0;
        while ($row = $result->fetch()) {
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['category_id'] = $row['category_id'];
            $productList[$i]['title'] = $row['title'];
            $productList[$i]['newprice'] = $row['newprice'];
            $productList[$i]['lastprise'] = $row['lastprise'];
            $productList[$i]['is_new'] = $row['is_new'];
            $productList[$i]['status'] = $row['status'];
            $productList[$i]['image'] = $row['image'];
            $i++;
        }
        return $productList;
    }

    /**
     * Возвращает товары искаемые пользователем
     * @param string $queryString слово для поиска
     * @return string массив данных
     */
    public static function SearchResult($queryString) 
    {
        $productList = array();
        $pdo = Db::getConnection();
        
        $sql = "SELECT id,title,newprice,lastprise,status,image, is_new FROM product Where status = 1 and title LIKE '%$queryString%' ORDER BY title ASC";
        $result = $pdo->query($sql); 
        $i = 0;
        while ($row = $result->fetch()) {
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['title'] = $row['title'];
            $productList[$i]['newprice'] = $row['newprice'];
            $productList[$i]['lastprise'] = $row['lastprise'];
            $productList[$i]['is_new'] = $row['is_new'];
            $productList[$i]['status'] = $row['status'];
            $productList[$i]['image'] = $row['image'];
            $i++;
        }
        return $productList;
    }
    
    /**
     * Возвращаем определенное количество символов для название товаров
     * @param string $string
     * @return string название товара
     */
    public static function get_StringReturnNormalLength($string)
    {
        mb_internal_encoding("UTF-8");
        if (strlen($string) > 21)
        {
             $newNormalString = mb_substr($string,0,18)."...";
            return $newNormalString;
        }
        else {
            return $string;
        }
    }
}
