<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CartController
 *
 * @author Озармехр
 */
class CartController {
    
    public static function actionAdd($id)
    {
        $singleLeftProduct = Product::get_SingleProduct(89);
        $userid = User::checkLoggedUser();
        $countProduct = Cart::CheckCount($userid, $id);
         $check  = 1;
        if (isset($_POST['name']))
        {
            $name =  $_POST['name'];
            if($countProduct == 0 || $countProduct == null)
            {
                $countProduct = 1;
                $result = Cart::AddToCart($userid, $id, $name,$countProduct);
                echo $check;
            }
            else 
            {
               $countProduct += 1;
                $result = Cart::UpdateCartIfExists($userid, $id, $countProduct);
                echo  $check;
            }
        }
        return true;
    }
}
