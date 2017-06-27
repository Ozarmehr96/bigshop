<?php

/**
 * Description of Db
 *
 * @author Озармехр
 */
class Db {
    
    public function __construct() 
    {
        return TRUE;
    }
    
    /**
     * Подключение  базе данных
     * @return \PDO
     */
    public static function getConnection()
    {
        $paramsFile = ROOT.'/config/db_params.php';
        $params = include ($paramsFile);
        
        try 
        {
            $pdo= new PDO("mysql:host={$params['host']};dbname={$params['dbname']};charset=utf8;",$params['username'],$params['password']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo 'you connected successfuly<br>';
        } 
        catch (Exception $ex) {
            echo 'Ошибка подключения к базе данных: '.$ex->getMessage();
        }
        
        return $pdo;
    }
}
