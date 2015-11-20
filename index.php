<?php

session_start();

define('DS', DIRECTORY_SEPARATOR);
define('WWW_ROOT', dirname(__FILE__) . DS);

require_once WWW_ROOT . 'includes'. DS .'functions.php';
require_once WWW_ROOT . 'classes'. DS .'Config.php';
require_once WWW_ROOT . 'classes'. DS .'DatabasePDO.php';
require_once WWW_ROOT . 'includes'. DS .'routes.php';

if(empty($_GET['p'])) {
    header("Location: index.php?p=home");
}
if(empty($routes[$_GET['p']])) {
    header("Location: index.php?p=home");
    exit();
}

$route = $routes[$_GET['p']];
$controllerName = $route['controller'] . 'Controller';

require_once WWW_ROOT . 'controller'. DS . $controllerName . ".php";

$controllerObj = new $controllerName();
$controllerObj->route = $route;
$controllerObj->filter();
$controllerObj->render();