<?php

/**
 *  Оформление заказа 
 *
 * @author Озармехр
 */
class OrderController {
    
    /**
     * 
     * @return boolean
     */
    public static function actionIndex()
    {
        $singleLeftProduct = Product::get_SingleProduct(89);
        $id = User::checkLoggedUser();
        $userorderedname = User::get_UserNameById($id);
        
        $phone = "";
        $comment = "";
        $username = "";
        $checkresult = false;
        $productsgettedfromsession = Cart::get_ProductsListFromSession();
        $arrayCountofProducts = count($productsgettedfromsession);
        if ($arrayCountofProducts <= 0)
        {
            header("Location: /");
        }
         $i = 0;
        for ($i = 0; $i < $arrayCountofProducts; $i++)
        {
            unset($productsgettedfromsession[$i]["name"]);
            unset($productsgettedfromsession[$i]["newprice"]);
            unset($productsgettedfromsession[$i]["userid"]);
        }
        $products =  json_encode($productsgettedfromsession);
        $insertResult;
        if (isset($_POST['submit']) && $arrayCountofProducts > 0)
        {
            if (isset($_POST['phone']))         $phone = htmlspecialchars($_POST['phone']);
            if (isset($_POST['comment']))       $comment = htmlspecialchars($_POST['comment']);
            if (isset($_POST['nameorder']))     $username =  htmlspecialchars($_POST['nameorder']);
            if ( $checkresult === FALSE)
            {
                $insertResult = Order::OrderUserSelectedProducts($id, $username, $phone, $comment, $products);
                $deleteProductsFromUSerCart = Cart::DeleteUserCartProductList($id);
                unset($_SESSION['products']);
            }
           
            if ($insertResult == true)
            {
                $checkresult = true;
                echo "<script>setInterval(function() { window.location.href = '/'; }, 2000);</script> ";
            }
        }
        // список категории
        $categoryList = array();
        $categoryList = Site::get_Category_List();
        
        require_once ROOT.'/views/user/order.php';
        return TRUE;
    }
}
