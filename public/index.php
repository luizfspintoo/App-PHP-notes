<?php

use Core\Session;
use Dotenv\Dotenv;

const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . "vendor/autoload.php";

// Carregar variáveis do .env
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

session_start();

require BASE_PATH . "Core/functions.php";

require base_path("bootstrap.php");

$router = new Core\Router;

$routes = require base_path("routes.php");

$uri = parse_url($_SERVER["REQUEST_URI"])["path"];
$method = isset($_POST["_method"]) ? $_POST["_method"] : $_SERVER["REQUEST_METHOD"];


$router->route($uri, $method);

//terminado a sessão de erros formulario
Session::unflash();

