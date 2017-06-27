<?php

/**
 * Управление заказами
 *
 * @author Озармехр
 */
class AdminOrder extends Db {

    /**
     * Выборка всех заказов
     * @return array массив заказов
     */
    public static function Read() {
        $pdo = Db::getConnection();
        $sql = "SELECT*FROM product_order";
        $result = $pdo->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Выбор заказа с помощью id
     * @param type $order_id id заказа
     * @return массив 
     */
    public static function get_OrderById($order_id) {
        $pdo = Db::getConnection();
        $sql = "SELECT*FROM product_order where id = :id";
        $result = $pdo->prepare($sql);
        $result->bindParam(":id", $order_id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();
    }

    /**
     * Выборка товаров со значениями id json формата, то есть
     * получение данные  для выбранного пользователем id товара 
     * @param array $order_id содержит id продуктов в формате 1,2,4
     * @return массив массив данных о продуктов
     */
    public static function get_OrderByIds($order_id) {
        $order = array();
        $ids_string = implode(",", $order_id);
        // $ids_string = implode(",", $order_id); 
        $pdo = Db::getConnection();
        $sql = "SELECT*FROM product where  id IN ($ids_string) and status = 1";
        $result = $pdo->query($sql);

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
        while ($row = $result->fetch()) {
            $order[$i]['id'] = $row['id'];
            $order[$i]['newprice'] = $row['newprice'];
            $order[$i]['title'] = $row['title'];
            $order[$i]['code'] = $row['code'];
            $i++;
        }

        return $order;
    }

    /**
     * Удаление заказа
     * @param int $id id удаляемого заказа
     * @return bool 
     */
    public static function Delete($id) {
        $id = intval($id);
        $pdo = Db::getConnection();
        $sql = "DELETE FROM product_order where id = :id";
        $result = $pdo->prepare($sql);
        $result->bindParam(":id", $id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Возвращает статус заказа
     * @param int $status id заказа
     * @return текст 
     */
    public static function get_Status($status) {
        $status = intval($status);
        switch ($status) {
            case 1: return 'Новый заказ';
                break;
            case 2: return 'В обработке';
                break;
            case 3: return 'Доставляется';
                break;
            case 4: return 'Закрыт';
                break;
        }
    }
            
    /**
     * Возвращает количество заказов
     * @return int количество заказов
     */
    public static function get_OrdersCount()
    {
        $pdo = Db::getConnection();
        $sql = "SELECT count(id) as count from product_order";
        $result = $pdo->query($sql);
        $row = $result->fetch();
        if ($row)
        {
            return $row['count'];
        }
    }
    
    /**
     * Редактирование заказа
     * @param int $order_id  id заказа
     * @param string $username имя клиента
     * @param string $userphone телефон клиента
     * @param datetime $date дата заказа
     * @return bool количество затронутых строк
     */
    public static function Update($order_id,$username,$userphone,$usercomment,$date,$status)
    {
        $orderid = intval($order_id);
        $pdo = Db::getConnection();
        $sql = "UPDATE product_order SET "
                . " username = :username,"
                . " userphone = :userphone,"
                . " usercomment = :usercomment, "
                . " date = :date, "
                . " status = :status "
                . " WHERE id = :id";
        $result = $pdo->prepare($sql);
        $result->bindParam(":username", $username, PDO::PARAM_STR);
        $result->bindParam(":userphone", $userphone, PDO::PARAM_STR);
        $result->bindParam(":usercomment", $usercomment, PDO::PARAM_STR);
        $result->bindParam(":date", $date, PDO::PARAM_STR);
        $result->bindParam(":status", $status, PDO::PARAM_INT);
        $result->bindParam(":id", $orderid, PDO::PARAM_INT);
        return $result->execute();
    }

}
