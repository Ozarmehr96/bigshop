<?php
/**
 * Управление страничкой админа
 *
 * @author Озармехр
 */
class AdminController extends AdminBase 
{
    /**
     * Страница админа
     * @return boolean
     */
    public static function actionIndex()
    {
        $productcount = AdminProduct::get_ProductsCount();
        require_once ROOT.'/views/admin/index.php';
        return TRUE;
    }
}
