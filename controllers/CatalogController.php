<?php

/**
 * Description of CatalogController
 *
 * @author Озармехр
 */
class CatalogController {
    
    /**
     * Простмотр товара определенной категории
     * Просмотр каталога
     * @param int $categoryid
     * @return boolean
     */
    public static function actionView($categoryid)
    {
        $singleLeftProduct = Product::get_SingleProduct(89);
        $categoryList  = array();
        $categoryList = Site::get_Category_List();
        
        $productList = array();
        $productList= Product::get_ProductByCategoryId($categoryid);
        require_once ROOT.'/views/catalog.php';
        
        return TRUE;
    }
}
