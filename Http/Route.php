<?php

namespace Http;


class Route
{
    static public $routes;
    static private $pageLanguage;

    static public function getRoutes()
    {
        return self::$routes;
    }
    static public function getPageLanguage()
    {
        return self::$pageLanguage;
    }

    static public function get($route, $action)
    {
        if ($route == '/')
            $route = 'ROOT';
        self::$routes[] = [
            $route,
            'action' => $action,
            'method' => 'GET'
        ];
    }

    static public function group($prefix, $function)
    {

        $firstCount = count(self::$routes);

        call_user_func($function);
        for ($i=0;$i<count(self::$routes);$i++) {
            if ($i >= $firstCount) {
                self::$routes[$i][0] = $prefix['prefix'].'/'.self::$routes[$i][0];
            }
        }
    }

    static public function isAvailable($request)
    {
        $requestComponents = explode('/', $request);

        // Where? Read from init??
//        $lang = [
//            'fa',
//            'en'
//        ];
//        if (in_array($requestComponents[0], $lang)) {
//            self::$pageLanguage = $requestComponents[0];
//            array_shift($requestComponents);
//        }

        $requestComponentsCount = count($requestComponents);

        foreach (self::$routes as $route) {
            $routeComponents = explode('/', $route[0]);
            $routeCount = count($routeComponents);

            if ($requestComponentsCount == $routeCount) {
                $route['parameters'] = '';
                $state = true;
                for ($i=0; $i<$routeCount; $i++) {
                    if (self::is_parameter($routeComponents[$i])) {
                        $route['parameters'][] = $requestComponents[$i];
                        continue;
                    }
                    if ($routeComponents[$i] != $requestComponents[$i]) {
                        $state = false;
                    }
                }
                if ($state == true) {
                    return $route;
                }
            }
        }
        return false;
    }

    static public function is_parameter($component)
    {
        if (strpos($component, '{') !== false) {
            return true;
        }
        return false;
    }

    static public function getRequest()
    {
        $request = REQUEST_URL;

        if (empty($request)) {
            return 'root';
        }
        return REQUEST_URL;
    }

}