<?php
//Cargamos las dependencias
include_once('../../vendor/autoload.php');

//Cargamos las variables de entorno
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASS']);
$dotenv->required('DB_HOST')->notEmpty();
$dotenv->required('DB_NAME')->notEmpty();
$dotenv->required('DB_USER')->notEmpty();
define('MIN_PASSWORD_LENGTH', 5) ;

// Start the session
session_start();

//Cargamos la conexión a la base de datos
include_once('../basededatos/connection.php');

//Cargamos los controladores
function includeController($controllerName){
    require_once("../controllers/{$controllerName}.php");
}

//Obtenemos la pagina con GET
$page = $_REQUEST["page"] ?? "/"; //esta es la página predeterminada

//Definimos un array de rutas válidas y sus controladores
$routes = [
    "/" => "homeController",
    "mylibrary" => "mylibraryController",
    "login" => "loginController",
    "register" => "registerController",
    "profile" => "profileController",
    "details" => "detailsController",
    "forgpassw" => "forgpasswController",
    "forgpasswreset" => "forgpasswController"
];

//encontramos el controlador propio de la página
$controllerName = $routes[$page] ?? null;

if ($controllerName){
    //Incluimos el archivo del controlador
    includeController($controllerName);
} else{
    http_response_code(404);
    echo "Página no encontrada 🤷‍♂️...";
}

$_SESSION['success-message'] = '';