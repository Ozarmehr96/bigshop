<?php

/**
 * Description of Router
 *
 * @author Озармехр
 */
class Router {
    
    
    /**
     *  Массив в котором содержится маршруты
     * @var массив в котором хранятся марруты
     * массив в котором хранятся марруты
     */
    private $routes;
    
    public function __construct() {
        $routerPath = ROOT.'/config/routes.php';
        $this->routes = include($routerPath);
    }
    
    
    public function get_URI()
    {
        if (!empty($_SERVER['REQUEST_URI']))
        {
            return trim($_SERVER['REQUEST_URI'],"/");
        }
    }


    public function run()
    { 
        //Получить строку запроса
        $uri = $this->get_URI();
        
        //Проверить наличие такого запроса в $routes ($router.php)
        foreach ($this->routes as $uriPattern => $path)
        {
            //  Проверяем то что название ячейки массива с тем что ввел пользователь
            if (preg_match("~^$uriPattern~", $uri))
            {
                
                $interalRoute = preg_replace("~$uriPattern~", $path, $uri);
               /* print_r($path);
                  echo "<br>";
                print_r($interalRoute);
                echo "<br>";*/
                
                $segment = explode("/", $interalRoute);                         //Разбиваем на частей наш массив 
                //print_r($segment);echo "<br>";
                
                //Получаем название контроллера
                $controllerName = array_shift($segment)."Controller";
                
                //Сделаем заглавными буквами имя контроллера
                $controllerName = ucfirst($controllerName);
                
               //Получаем название action (метода)
                $actionName = "action".ucfirst(array_shift($segment));
                
                //  Получаем параметры
                $parameters = $segment;
                //  Получаем название файла контроллера
                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
                
                //Проверяем, существует ли такой файл
                if (file_exists($controllerFile))
                {
                    // Подключаем файл контроллера
                    include_once $controllerFile;
                }
                
                // Создаем объект контроллера
                $controllerObject = new $controllerName;
                
                // Вызываем нужный нам метод с передачой параметра
                //$result = $controllerObject->$actionName($parameters);
                // Чтобы в методе передать параметр parametres[0] как другое название используем call_user_func_array
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                if ($result != null)
                {
                    break;
                }
            }
        }
        
    }
}