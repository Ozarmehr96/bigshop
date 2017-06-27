<?php

/**
 * Description of Site
 *
 * @author Озармехр
 */
class Site {
    
    public $categoryid;
    public function __construct() {
        return TRUE;
    }

    public static function get_RecomendedProductList()
    {
        $pdo = Db::getConnection();
        $categoryid = "";
        $recomendedList = array();
        
        $sql = "SELECT id,title,newprice,lastprise,status,image, is_new FROM product "
                . "WHERE status = 1 and is_recom = 1 LIMIT 3";
        $result = $pdo->query($sql);
        
        $i = 0;
        while ($row = $result->fetch())
        {
            $recomendedList[$i]['id'] = $row['id'];
            $recomendedList[$i]['title'] = $row['title'];
            $recomendedList[$i]['newprice'] = $row['newprice'];
            $recomendedList[$i]['lastprise'] = $row['lastprise'];
            $recomendedList[$i]['is_new'] = $row['is_new'];
            $recomendedList[$i]['status'] = $row['status'];
            $recomendedList[$i]['image'] = $row['image'];
            $i++;
        }
        return $recomendedList;
    }
    
    public static function get_Category_List()
    {
        $pdo = Db::getConnection();
        
        $categoryList = array();
        
        $sql = "SELECT id, category_title, category_status"
                            . " FROM category WHERE category_status = 1 ORDER BY category_title ASC";
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
    
    /**
     * Выбор товаров для главного меню 3 штуки
     * @param int $ids
     * @return array
     */
    public static function get_ProductsForAdd($ids)
    {
        $article = array();
        $pdo = Db::getConnection();
        $massim = implode(",", $ids);
       // print_r($massim);
        $sql = "Select id,title from product where  id IN ($massim) and isforbanner = 1 and status = 1 LIMIT 3";
        $result = $pdo->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
        while ($row = $result->fetch())
        {
            $article[$i]['id'] = $row['id'];
            $article[$i]['title'] = $row['title'];
            $i++;
        }
        return $article;
    }
}
