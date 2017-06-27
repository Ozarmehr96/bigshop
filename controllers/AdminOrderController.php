<?php

/**
 * Управление заказами
 *
 * @author Озармехр
 */
class AdminOrderController {
    
    /**
     * Просмотр 
     * @return boolean
     * @author Озармехр
     */
    public function actionRead()
    {
        $orders = array();
        $orders = AdminOrder::Read();
        
        require_once ROOT.'/views/admin/adminOrder/adminRead.php';
        return TRUE;
    }
    
    /**
     * Просмотр заказа (ПОДРОБНЕЕ)
     * @param type $order_id
     * @return boolean
     */
    public static function actionView($order_id)
    {
        $order = AdminOrder::get_OrderById($order_id);
        $products = json_decode($order['products'], TRUE); // декодируем вот это {"productid":"8","count":"1"}]
        // массив лоя хранение id полученные из json формат
        $productids= array();
        // массив лоя хранение count полученные из json формат
        $productcount = array();
        foreach ($products as $product_part)
        {
            // сохраняем сount в наш массив
            $productcount[]= $product_part['count'];
             // сохраняем ids в наш массив
            $productids[] = $product_part['productid'];
        }
       
        
        $getOrder = AdminOrder::get_OrderByIds($productids);
        $i = 0;
        // Добавляем новый ключ с идентификатором на массив полученнный из базы данных
       foreach ($getOrder as $newkey=>$newVal)
       {
           $getOrder[$newkey]['count'] = $productcount[$i]; 
           $i++;
       }
        $userid = $order['userid'];
        $username  = User::get_UserNameById($userid);
        
        require_once ROOT.'/views/admin/adminOrder/adminOrderView.php';
        return TRUE;
    }
    
    /**
     * Удаление выбранного заказа админом
     * @param int $id id заказа
     * @return boolean
     */
    public static function actionDelete($id)
    {
        $delte = AdminOrder::Delete($id);
        if ($delte == TRUE)
        {
            header("Location: /admin/order/list");
        }
        return TRUE;
    }
    
    public static function actionUpdate($id)
    {
        $singleoreder = array();
        $singleoreder = AdminOrder::get_OrderById($id);
        
        if (isset($_POST['submit']))
        {
            $username  = htmlspecialchars($_POST['name']);
            $phone  = htmlspecialchars($_POST['phone']);
            $comment  = htmlspecialchars($_POST['comment']);
            $date  = htmlspecialchars($_POST['date']);
            $status  = htmlspecialchars($_POST['status']);
            echo $status;
            $resultUpdate = AdminOrder::Update($id, $username, $phone, $comment, $date, $status);
            if ($resultUpdate == true)
            {
                 header("Location: /admin/order/list");
            }
        }
        require_once ROOT.'/views/admin/adminOrder/adminOrderUpdate.php';
        return TRUE;
    }
}