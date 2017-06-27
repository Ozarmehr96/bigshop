<?php
/**
 * Description of Cart
 *
 * @author Озармехр
 */
class Cart {
    public static function AddToCart($userid,$productid,$name,$count)
    {
       $pdo = Db::getConnection();
        
       $sql = "INSERT INTO cart (userid,productid,name,count) VALUES(:userid, :productid,:name,:count)";
       $result = $pdo->prepare($sql);
       $result->bindParam(":userid", $userid, PDO::PARAM_STR);
       $result->bindParam(":productid", $productid, PDO::PARAM_STR);
       $result->bindParam(":name", $name, PDO::PARAM_STR);
       $result->bindParam(":count", $count, PDO::PARAM_STR);
       
       return $result->execute();
    }
    
    public static function UpdateCartIfExists($userid, $productid, $count)
    {
        $count = intval($count);
        $pdo = Db::getConnection();
        
        $sql = "UPDATE cart SET count = :count WHERE userid = :userid and productid = :productid";
        $result= $pdo->prepare($sql);
        $result->bindParam(":count", $count, PDO::PARAM_STR);
        $result->bindParam(":userid", $userid, PDO::PARAM_STR);
        $result->bindParam(":productid", $productid, PDO::PARAM_STR);
        
        return $result->execute();
    }

    public static function CheckCount($userid,$productid)
    {
        $pdo = Db::getConnection();
        
       $sql = "SELECT count FROM  cart where userid = :userid and  productid = :productid";
       $result = $pdo->prepare($sql);
       $result->bindParam(":userid", $userid, PDO::PARAM_STR);
       $result->bindParam(":productid", $productid, PDO::PARAM_STR);
       $result->execute();
       $row = $result->fetch();
        if ($row)
        {
            return $row['count'];
        }
        else return false;
    }
    
    public static function getCartList($userid)
    {
        $pdo = Db::getConnection();
        $cartList = array();
        $sql = "Select name,userid,productid, product.newprice,count FROM cart "
                . "Join product On cart.productid = product.id Where userid = :userid";
        
        $result = $pdo->prepare($sql);
        $result->bindParam(":userid", $userid, PDO::PARAM_STR);
        $result->execute();
        $i = 0;
        while ( $row = $result->fetch())
        {
            $cartList[$i]['name']   = $row['name'];
            $cartList[$i]['userid']   = $row['userid'];
            $cartList[$i]['productid']   = $row['productid'];
            $cartList[$i]['newprice']   = $row['newprice'];
            $cartList[$i]['count']   = $row['count'];
           
            $i++;
        }
        return $cartList;
    }
    
    public static function EditCart($userid, $productid, $count)
    {
        $pdo = Db::getConnection();
        $count = intval($count);
        $sql = "Update cart SET count  = :count WHERE userid = :userid and productid = :productid";
        
        $result = $pdo->prepare($sql);
        $result->bindParam(":count", $count, PDO::PARAM_STR);
        $result->bindParam(":productid", $productid, PDO::PARAM_STR);
        $result->bindParam(":userid", $userid, PDO::PARAM_STR);
        $result->execute();
         return $result->rowCount();
        
    }
    
    public static function DeleteSelectedCart($userid, $productid)
    {
        $pdo = Db::getConnection();
        $userid = intval($userid);
        $productid = intval($productid);
        
        $sql = "DELETE FROM cart  Where userid = :userid and productid = :productid";
        $result = $pdo->prepare($sql);
        $result->bindParam(":userid", $userid, PDO::PARAM_STR);
        $result->bindParam(":productid", $productid, PDO::PARAM_STR);
        return $result->execute();
    }
    
    public static function get_TotalProductInCart($userid)
    {
        $pdo = Db::getConnection();
        
        $sql = "SELECT sum(count) as sum From cart where userid = :userid";
        $result = $pdo->prepare($sql);
        $result->bindParam(":userid",$userid, PDO::PARAM_STR);
        $result->execute();
        $row = $result->fetch();
        if ($row)
        {
            return $row['sum'];
        }
    }
    
    /**
     * Список продукт в массиве сессиии
     * @param array $productincart
     * @return array
     *  Возвращает список продукт корзины, которые хранятся в массиве
     */
    public static function SessionProductList($productincart)
    {
        $_SESSION['products'] = $productincart;
        return $_SESSION['products'];
    } 
    
    /**
     * Возвращаем список продуктов из сессии
     * @return type
     */
    public static function get_ProductsListFromSession()
    {
        if (isset($_SESSION['products']))
        {
             return $_SESSION['products'];
        }
    }
    
    /**
     * Удаление спикок продуктов из корзины, после оформления заказа
     * @param type $userid
     * @return bool
     */
    public static function DeleteUserCartProductList($userid)
    {
        $id = intval($userid);
        $pdo = Db::getConnection();
        $sql = "DELETE FROM cart where userid = :userid";
        $resul = $pdo->prepare($sql);
        $resul->bindParam(":userid", $id, PDO::PARAM_STR);
        return $resul->execute();
    }
}
