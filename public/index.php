<?php

// require "../vendor/autoload.php";

// use Dev\Mo\core;
// use Dev\Mo\core\app;
// // use Dev\Mo\core\db;
// $bo = new app;
// (new Dev\Mo\core\app );

require "../vendor/autoload.php";
use Dev\Mo\core\route;

use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;


use Dev\Mo\core;
use Dev\Mo\core\app;


$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$whoops = new Run();
$whoops->pushHandler(new PrettyPageHandler());
$whoops->register();



$bo = new app;


