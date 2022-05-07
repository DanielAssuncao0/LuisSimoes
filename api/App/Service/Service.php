<?php

namespace App;

class Service 
{
    private $_services = [];
    private static $_instance = null;

    public function __construct()
    {
        self::$_instance = $this;
    }

    public function addService($name,$service)
    {
        $this->_services[$name] = $service;
    }

    public function getService($name) 
    {
        return $this->_services[$name] ?? null;
    }

    public static function instance() : Service
    {
        if(is_null(self::$_instance))
            self::init();

        return self::$_instance;
    }

    public static function add($name, $service) 
    {
        self::instance()->addService($name, $service);
    }

    public static function get(string $name) 
    {
        return self::instance()->getService($name);
    }

    public static function init() 
    {
        self::$_instance = new Service;
    }
}