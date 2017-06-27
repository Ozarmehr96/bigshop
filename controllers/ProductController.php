<?php

/**
 * Description of ProductController
 *
 * @author Озармехр
 */
class ProductController {
    
    public function __construct() {
        return TRUE;
        
    }
    
    /**
     * Просмотр дного товара
     * @param int $id id товара
     * @return boolean
     */
    public static function actionView($id)
    {
        $singleLeftProduct = Product::get_SingleProduct(89);
        $categoryList = array();
        $categoryList = Site::get_Category_List();
        
        $singlePRoduct = array();
        $singlePRoduct = Product::get_SingleProduct($id);
        require_once ROOT.'/views/product/product.php';
        
        return true;
    }
    
    /**
     * Просмотр всех товаров
     * @return boolean
     */
    public static function actionViewAll()
    {
        $singleLeftProduct = Product::get_SingleProduct(89);
        $productList = array();
        $productList = Product::get_AllProducts();
        
        //Подключаем список категории
        $categoryList  = array();
        $categoryList = Site::get_Category_List();
        require_once ROOT.'/views/product/productAll.php';
        return TRUE;
    }
    
    /**
     * Поиск товаров
     * @return boolean
     */
    public static function actionSearch()
    {
        $singleLeftProduct = Product::get_SingleProduct(89);
        $product = "";
        $productList = array();
        if (isset($_POST['searchburtton']))
        {
            $productForSearch = $_POST['textseach'];
            $productList = Product::SearchResult($productForSearch);
        }
        
       /* $g = 0;   //Количество товаров
        foreach ($productList as $pr=>$fd)
        {
            $pr[$g++];
        }*/
        
        //Подключаем список категории
        $categoryList  = array();
        $categoryList = Site::get_Category_List();
        require_once ROOT.'/views/product/productSearch.php';
        return TRUE;
    }
}
