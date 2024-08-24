<?php 

namespace Dev\Mo\controllers;

use Jenssegers\Blade\Blade;
use Exception;

class controller 
{
    public function __call($name, $params)
    {
        throw new Exception("method: ".$name." not found");
    }

    protected function view($page, $data=[])
    {
        $blade = new Blade($_ENV['VIEW_FOLDER'], $_ENV['VIEW_CACHE']);
        echo $blade->render($page, $data);
    }

   
}