<?php

/**
 * Управление категориями для админ панельки
 *
 * @author Озармехр
 */
class AdminCatalogController extends AdminBase {
    
    /**
     * Вывод список категории для панель админки
     * @return boolean
     */
    public static function actionRead()
    {
        $categoryList = AdminCatalog::Read();
        require_once ROOT.'/views/admin/adminCatalog/adminRead.php';
        return true;
    }
    
    /**
     * Добавление категории админом
     * @return boolean
     */
    public static function actionCreate()
    {
        if (isset($_POST['submit']))
        {
            $title = htmlspecialchars($_POST['title']);
            $status = htmlspecialchars($_POST['status']);
            $insertResult = AdminCatalog::Create($title, $status);
            if($insertResult == true){
                header("Location: /admin/catalog/list");
            }
        }
        require_once ROOT.'/views/admin/adminCatalog/adminCreate.php';
        return true;
    }
    
    /**
     * Модифицирование каталога
     * @param int $categoryid
     * @return boolean
     */
    public static function actionUpdate($categoryid)
    {
        $categoryid = intval($categoryid);
        $category = AdminCatalog::get_CategoryById($categoryid);
        if(isset($_POST['submit']))
        {
            $title = htmlspecialchars($_POST['title']);
            $status = htmlspecialchars($_POST['status']);
            $updateResult = AdminCatalog::Update($title, $status, $categoryid);
            if($updateResult == true){
                header("Location: /admin/catalog/list");
            }
        }
        require_once ROOT.'/views/admin/adminCatalog/adminUpdate.php';
        return true;
    }
    
    /**
     * Удаление категории админом
     * @param int $categoryid
     * @return boolean
     */
    public static function actionDelete($categoryid)
    {
            $deleteResult = AdminCatalog::Delete($categoryid);
            if($deleteResult == true){
                header("Location: /admin/catalog/list");
            }
        return true;
    }

}
