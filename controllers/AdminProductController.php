<?php

/**
 * Description of AdminProductController
 *
 * @author Озармехр
 */
class AdminProductController extends AdminBase {

    public static function actionRead() {
        $productList = array();
        $productList = AdminProduct::Read();
        require_once ROOT . '/views/admin/adminProduct/adminRead.php';
        return TRUE;
    }

    public static function actionCreate() {
        $flag = false;
        $inputValue = array();
        if (isset($_POST['submit'])) {
            $inputValue['title'] = $_POST['title'];
            $inputValue['categ'] = $_POST['categ'];
            $inputValue['code'] = $_POST['code'];
            $inputValue['newprice'] = $_POST['newprice'];
            $inputValue['oldprice'] = $_POST['oldprice'];
            $inputValue['status'] = $_POST['status'];
            $inputValue['is_new'] = $_POST['is_new'];
            $inputValue['is_recom'] = $_POST['is_recom'];
            $inputValue['discription'] = $_POST['discription'];
            
            foreach ($inputValue as $key => $g) {
                htmlspecialchars($g);
            }
            $insertResult = AdminProduct::Create($inputValue);
            if ($insertResult == true)
            {
                // Загрузилась ли фотография
                if(is_uploaded_file($_FILES['image']['tmp_name']))
                {
                    // перемеинован и был перемещен файл в папку картинки
                   if(move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER["DOCUMENT_ROOT"]."/uploads/images/products/$insertResult.jpg") === TRUE){
                        header("Location: /admin/product/list");
                   }
                }
                header("Location: /admin/product/list");
            }
        }
        //  Список категории
        $categoryList = array();
        $categoryList = Site::get_Category_List();
        
        require_once ROOT . '/views/admin/adminProduct/adminCreate.php';
        return TRUE;
    }
    
    public static function actionUpdate($product_id)
    {
        // Получаем данные о продуте с помощью id
        $product = Product::get_SingleProduct($product_id);
        $getPostVal= array();
        if (isset($_POST['submit']))
        {
            
            $getPostVal['title'] = $_POST['title'];
            $getPostVal['categ'] = $_POST['categ'];
            $getPostVal['code'] = $_POST['code'];
            $getPostVal['newprice'] = $_POST['newprice'];
            $getPostVal['lastprice'] = $_POST['lastprice'];
            $getPostVal['status'] = $_POST['status'];
            $getPostVal['is_new'] = $_POST['is_new'];
            $getPostVal['is_recom'] = $_POST['is_recom'];
            $getPostVal['discription'] = $_POST['discription'];
            foreach ($getPostVal as $key => $g) {
                htmlspecialchars($g);
            }
            if(is_array($getPostVal))
            {
               $updateResult = AdminProduct::Update($getPostVal,$product_id);
               if($updateResult == true)
                {
                    if (is_uploaded_file($_FILES['image']['tmp_name'])){
                        if(move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER["DOCUMENT_ROOT"]."/uploads/images/products/$product_id.jpg") === TRUE){
                            header("Location: /admin/product/list");
                        }    
                    }
                     header("Location: /admin/product/list");
                }
            }
        }
        
        //Выводим спимок категории в option-х для выбора категории
        $categoryList = array();
        $categoryList = Site::get_Category_List();
        require_once ROOT.'/views/admin/adminProduct/adminUpdate.php';
        return true;
    }
    
    public static function actionDelete($product_id)
    {
        $product = Product::get_SingleProduct($product_id);
        if (isset($_POST['submit']))
        {
             $deleteProduct = AdminProduct::Delete($product_id);
            if ($deleteProduct == true)
            {
                header("Location: /admin/product/list");
            }
        }
      
        require_once ROOT.'/views/admin/adminProduct/adminDelete.php';
        return true;
    }

}
