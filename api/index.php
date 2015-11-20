<?php

ini_set("display_errors", 1);
error_reporting(E_ALL);

define("WWW_ROOT", dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR);

/* --- DAO Classes ---------------------- */
require_once WWW_ROOT. "dao" .DIRECTORY_SEPARATOR. 'InfoDAO.php';
require_once WWW_ROOT. "api" .DIRECTORY_SEPARATOR. 'Slim'. DIRECTORY_SEPARATOR .'Slim.php';

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();
$app -> config('debug', true);

/* --- API Classes ---------------------- */
require_once WWW_ROOT. "api" .DIRECTORY_SEPARATOR. 'routes' .DIRECTORY_SEPARATOR. 'campaigninfo.php';

$app->run();

