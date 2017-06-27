<?php 

//FRONT Controller

// Общие настройки 
ini_set("display_errors", 1);
error_reporting(E_ALL);

// Подключение файлов системы
session_start();
define('ROOT', dirname(__FILE__));
require_once ROOT.'/components/autoLoad.php';

//Подключение к БД

//require_once  ROOT.'/components/Db.php';
$connection = Db::getConnection();
//Вызов роутера
$router = new Router();
$router->run();