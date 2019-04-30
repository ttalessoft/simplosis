<?php 
session_start();

require_once("vendor/autoload.php");
require_once("functions.php");

use Slim\Slim;

$app = new Slim();

$app->config('debug', true);

// requisições do controller da loja
require_once("site.php");
require_once("site-categories.php");

// requisições do controller do admin
require_once("admin.php");
require_once("admin-categories.php");
require_once("admin-clients.php");
require_once("admin-login.php");
require_once("admin-users.php");
require_once("admin-products.php");
require_once("admin-cities.php");

$app->run();

 ?>