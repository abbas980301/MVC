<?php

namespace Library;

use Http\Route;

class AppClass
{
    static public $local = 'fa';

    public function run()
    {
        require_once '../controllers/Routes.php';

        $request = Route::getRequest();
        $route = Route::isAvailable($request);

        if ($route) {
            if (is_callable($route['action'])) {
                call_user_func($route['action']);
            } else {
                $this->callController($route);
            }
        } else {
            echo "Not found!";
        }
    }

    private function callController($route)
    {
        $components = explode('@', $route['action']);
        $controller = $components[0];
        $action = $components[1];

        $controllerObject = '\\controllers\\'.$controller;
        $controllerObject = new $controllerObject;

        $controllerObject->$action($route['parameters']);
    }

    static public function setLocal($local)
    {
        self::$local = $local;
    }

    static public function getLocal()
    {
        return self::$local;
    }
}