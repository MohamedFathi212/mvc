<?php 

namespace Dev\Mo\core;


class route 
{
    public static $routes;

    public static function get($url ,$method)
    {
        self::$routes[$url]=$method;
    }

}



