<?php

/**
 * Description of User
 *
 * @author Озармехр
 */
class User {
    
    public static function PasswordEncryption($password)
    {
        $password = md5($password)."1d2dr4gdfg8454dfsf";
        return $password;
    }

    public static function Register($name, $email, $password)
    {
        $pdo = Db::getConnection();
        
        $sql = "INSERT INTO user (name,email,password) VALUES (:name, :email, :password)";
        $result = $pdo->prepare($sql);
        $result->bindParam(":name", $name, PDO::PARAM_STR);
        $result->bindParam(":email", $email, PDO::PARAM_STR);
        $result->bindParam(":password", $password, PDO::PARAM_STR);
        $result->execute();
        
        if ($result)
        {
            return true;
        }
        else return FALSE;
    }
    
    public static function check_Name($name)
    {
        if (strlen($name) < 2) return false;
        else return true;
    }
    
    public static function check_Email($email)
    {
       if (!filter_var($email, FILTER_VALIDATE_EMAIL)) return false;
        else return true;
    }
    
    public static function check_Password($password)
    {
        if (strlen($password) < 6) return false;
        else return true;
    }
    
    public static function check_PasswordwithRepass($password, $repassword)
    {
        if ($repassword != $password) return false;
        else return true;
    }
    
    /**
     * Возвращает пользователья который зашел на сайт как зарегистрированный
     * @param type $id
     * @return type
     */
    public static function ReturnSessionUserID($id)
    {
        setcookie("big_shop_user",$id,time() + (86400 * 365), "/"); //Устанавливаем cokkies
        $_SESSION['user'] = $id;
        return $_SESSION['user'];
    }
    
    public static function CheckEmailExists($email)
    {
        $pdo = Db::getConnection();
        
        $sql = "SELECT * FROM user WHERE email = :email";
        $result = $pdo->prepare($sql);
        $result->bindParam(":email", $email, PDO::PARAM_STR);
        $result->execute();
        if ($result->fetchColumn())
        {
            return true;
        }
        else return false;
    }
    
    public static function SelectUserWithDatas($email, $password)
    {
        $pdo = Db::getConnection();
        
        $sql = "SELECT id FROM user WHERE email = :email and password = :password";
        $result = $pdo->prepare($sql);
        $result->bindParam(":email", $email, PDO::PARAM_STR);
        $result->bindParam(":password", $password, PDO::PARAM_STR);
        $result->execute();
        $row = $result->fetch();
        if ($row)
        {
            return $row['id'];
        }
        else return false;
        
    }
    
    public static function SessionRedirect()
    {
        if (isset($_SESSION['user']))
        {
           header("Location: /user/account");
        }
    }
    
    
    /**
     *  Возвращает массив данных о пользователе by id
     * @param int $id
     * @return массив
     */
    public static function get_UserById($id)
    {
        $id = intval($id);
        $pdo = Db::getConnection();
        
        $sql = "SELECT * FROM user where id = :id";
        $result = $pdo->prepare($sql);
        $result->bindParam(":id", $id, PDO::PARAM_STR);
        $result->execute();

        return $result->fetch();
    }
    
    
    /**
     * Проверяем, вошел ли пользователь, если да, то вернем id пользоваетля
     * если нет, то перенаправляем на страницу авторизации
     */
    public static function checkLoggedUser()
    {
        if (isset($_SESSION['user'])) return $_SESSION['user'];
        else
        {
            header("Location: /user/login");
        }
    }
    public static function LogOut()
    {
        setcookie('big_shop_user', null, -1, '/'); // Удаляем куки
        unset($_SESSION['user']);
        header("Location: /");
    }
    
    public static function EditUSerData($userid, $password, $username)
    {
       // $pdo = Db::getConnection();
        $id = intval($userid);
        $pdo = Db::getConnection();
        $sql = "UPDATE user SET name = :name, password = :password WHERE id = :id";
        $result = $pdo->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':name', $username, PDO::PARAM_STR);
        return $result->execute(); 
    }
    
    public static function get_UserNameById($id)
    {
        $pdo = Db::getConnection();
        
        $sql = "SELECT name from user where id = :id";
        $result = $pdo->prepare($sql);
        $result->bindParam(":id", $id, PDO::PARAM_STR);
        $result->execute();
        $row = $result->fetch();
        if  ($row)
        {
            return $row['name'];
        }
    }
     
    /**
     * Проверяем, есть ли куки на стороне пользователя\n
     * Если есть то перенаправляем на страницу пользователя\n
     * Если нет, то на страницу входа или регистрации
     */
    public static function CheckIsHaveCookieUserOnPC(){
        if (isset($_COOKIE['big_shop_user']))
        {
            $_SESSION['user'] = $_COOKIE['big_shop_user'];
        }
    }
    
    /**
     * Проверяем, существует ли пользователь в сессии
     * @return string если есть пользователь возвращает 'Yes', если нет, то 'No'
     */
    public static function CheckIsThereUserID()
    {
        if (isset($_SESSION['user']))
        {
            return 'Yes';
        }
        else 
        {
            return 'No';
        }
    }
}
