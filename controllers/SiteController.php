<?php

/**
 * Description of SiteController
 *
 * @author Озармехр
 */
class SiteController {
    
    
    public function __construct() {
        // Проверяем, есть куки на компютере пользователя
        User::CheckIsHaveCookieUserOnPC();
        return true;
    }
    /**
     * Главная страница
     * @return boolean
     */
    public function actionIndex()
    {
        $singleLeftProduct = Product::get_SingleProduct(89);
        $categoryList = array();
        $categoryList = Site::get_Category_List();
        
        $is_recomendedList = array();
        $is_recomendedList = Site::get_RecomendedProductList();
        $myprodforadd = [66,71,72];
        $resForAdd = Site::get_ProductsForAdd($myprodforadd);
        
        require_once ROOT.'/views/site/index.php';
        return true;
    }
    
    public static function actionContact()
    {
        $singleLeftProduct = Product::get_SingleProduct(89);
         $getUser="";
        if (isset($_SESSION['user']))
        {
            $getUser = User::get_UserById($_SESSION['user']);
        }
        
        $name = "";
        $email = "";
        $message = "";
        if(isset($_POST['submit']))
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];
           //mail("odilov090996@mail.ru", $subject, $message, "Новый отзыв");
        }
        $categoryList = array();
        $categoryList = Site::get_Category_List();
        
        require_once ROOT.'/views/site/contactUs.php';
        return true;
    }
}
