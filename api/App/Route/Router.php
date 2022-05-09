<?php 

namespace App\Route;

class Router
{
    private $_routes = [];
    private static $_instance = null;
    
    public function add(string $path, string $class, string $method)
    {
        if(!class_exists($class))
            throw new \Exception('Invalid class route');
        
        $instance = new $class;
        if(!method_exists($instance, $method))
            throw new \Exception('Invalid class method');

        $this->_routes[$path] = function() use ($instance, $method) {
            return $instance->$method();
        };
    }

    //NOTE needs improvement
    public function getPath():string 
    {
        return $_SERVER['PATH_INFO'];
    }

    public function getParams(string $name, $default = null)
    {
        $queryString = $_SERVER['QUERY_STRING'];
        if(!empty($queryString))
        {
            $queryString = explode('&', $queryString);
            if(count($queryString) > 0)
            {
                $params = [];
                foreach ($queryString as $string) 
                {
                    $extract = explode('=', $string);
                    $key = $extract[0];
                    $value = $extract[1];

                    if($key === $name)
                        return $value ?? $default;

                    $params[$key] = $value;
                }
            }
        }

        return $params;
    }

    public function hasRoute(string $path) : bool
    {
        return array_key_exists($path, $this->_routes);
    }

    public function call()
    {
        $path = $this->getPath();
        if(!$this->hasRoute($path))
            throw new \Exception("No route found for $path");

        echo is_callable($this->_routes[$path]) ? $this->_routes[$path]() : null;
    }

    public static function instance()
    {
        if(is_null(self::$_instance))
            self::init();

        return self::$_instance;
    }

    public static function addRoute(string $path, string $class, string $method)
    {
        self::instance()->add($path, $class, $method);
    }

    public static function execute()
    {
        self::instance()->call();
    }

    public static function init()
    {
        self::$_instance = new Router;
    }

    public static function params(string $name, $default = null)
    {
        return self::instance()->getParams($name, $default);
    }
}

include 'routes.php';