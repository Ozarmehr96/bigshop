<?php

/**
 * Description of Order
 *
 * @author Озармехр
 */
class Order {
    public static function OrderUserSelectedProducts($userid, $user_name, $user_phone, $user_comment, $products)
    {
        $pdo = Db::getConnection();
        $status = 1;
        $sql = "Insert Into product_order (userid,username,userphone, usercomment, products, status)"
                . "VALUES (:userid, :username, :userphone,:usercomment, :products, :status)";
        $result = $pdo->prepare($sql);
        $result->bindParam(":userid", $userid, PDO::PARAM_STR);
        $result->bindParam(":username", $user_name, PDO::PARAM_STR);
        $result->bindParam(":userphone", $user_phone, PDO::PARAM_STR);
        $result->bindParam(":usercomment", $user_comment, PDO::PARAM_STR);
        $result->bindParam(":products", $products, PDO::PARAM_STR);
        $result->bindParam(":status", $status, PDO::PARAM_STR);
        return $result->execute();
    }
}
