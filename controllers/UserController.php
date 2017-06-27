<?php

/**
 * Description of UserController
 *
 * @author Озармехр
 */
class UserController {

    /**
     * Решистрация пользователя
     * @return boolean
     */
    public function __construct() {
        // Проверяем, есть куки на компютере пользователя
        User::CheckIsHaveCookieUserOnPC();
    }
    public static function actionCheckin() {
        $singleLeftProduct = Product::get_SingleProduct(89);
        User::SessionRedirect();
        $name = "";
        $email = "";
        $errors = false;
        $result = false;
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $repassword = $_POST['repassword'];

            if (User::check_Name($name) == false)
                $errors[] = "Имя не должно быть меньше 2-х символов.";
            if (User::check_Email($email) == false)
                $errors[] = "Неправильный email адрес";
            if (User::check_Password($password) == false)
                $errors[] = "Пароль не должен быть короче 6 символов";
            if (User::check_PasswordwithRepass($password, $repassword) == false)
                $errors[] = "Пароли не совпадают";
            if (User::CheckEmailExists($email))
                $errors[] = "Такой email уже зарегистрирован";

            if (!is_array($errors) && $errors === false) {
                $password = User::PasswordEncryption($password);
                $result = User::Register($name, $email, $password);
            }
        }



        $categoryList = array();
        $categoryList = Site::get_Category_List();

        require_once ROOT . '/views/user/register.php';

        return TRUE;
    }

    /**
     * Авторизация пользователя
     * @return boolean
     */
    public static function actionLogin() {
        $singleLeftProduct = Product::get_SingleProduct(89);
        User::SessionRedirect();
        $err = false;
        $email = "";
        $result = false;
        if (isset($_POST['submit'])) {
            $password = $_POST['password'];
            $email = $_POST['email'];

            if (User::CheckEmailExists($email) != true)
                $err[] = "Неправильный пароль или логин";
            if (isset($err) && !is_array($err)) {
                $id = User::SelectUserWithDatas($email, $password);
                //$password = User::PasswordEncryption($password);
                if ($id) {
                    User::ReturnSessionUserID($id);
                    $result = User::ReturnSessionUserID($id);
                    if ($result == true) {
                        header("Location: /user/account");
                    }
                }
            }
        }
        echo $result;
        $categoryList = array();
        $categoryList = Site::get_Category_List();
        require_once ROOT . '/views/user/login.php';


        return true;
    }

    /**
     * Кабинет пользователя
     * @return boolean
     */
    public static function actionAccount() {
        $singleLeftProduct = Product::get_SingleProduct(89);
        echo User::CheckIsHaveCookieUserOnPC();
        //id пользователья из сессии
        $userId = User::checkLoggedUser();
        // Выбор пользователья по id
        $user = User::get_UserById($userId);
         $countProducts = Cart::get_TotalProductInCart($userId);
        //Массив для хранения список продуктов в карзине
        $cartList = array();
        $cartList = Cart::getCartList($userId);
        //Список категории
        $categoryList = array();
        $categoryList = Site::get_Category_List();
        require_once ROOT . '/views/user/account.php';

        return true;
    }

    /**
     * Вывод список продуктов корзины пользователя
     * @param type $userId
     * @return boolean
     */
    public static function actionAddtocartlive($userId) {
        header("Content-type: text/javascript");
        $cartList = array();
        if (isset($_POST['view'])) {
            $cartList = Cart::getCartList($userId);
            // Добавляем наши товары в сессию
            Cart::SessionProductList($cartList);
            echo json_encode($cartList);
        }
        return TRUE;
    }

    public static function actionEd($userid, $productid, $count) {

        $edited = Cart::EditCart($userid, $productid, $count);
        echo json_encode($edited);

        return TRUE;
    }

    public static function actionEdituserdata($userid) {
        $name = "";
        $password = "";
        if (isset($_POST['name']) && isset($_POST['password'])) {
            $name = $_POST['name'];
            $password = $_POST['password'];
            $result = User::EditUSerData($userid, $password, $name);
            if ($result == 1) {
                echo $result;
            }
        }
        return TRUE;
    }
    public static function actionDeletecart($userid, $productid)
    {
        $userid = intval($userid);
        $productid = intval($productid);
        
        $result = Cart::DeleteSelectedCart($userid, $productid);
        if ($result == 1)
        {
            echo $result;
        }
        return true;
    }
    
    public static function actionChecktotalproduct($userid)
    {
        $result = Cart::get_TotalProductInCart($userid);
        echo $result;
        return TRUE;
    }
    
    /**
     * Выход из страницы пользователья
     */
    public static function actionOut()
    {
        User::LogOut();
    }
}
