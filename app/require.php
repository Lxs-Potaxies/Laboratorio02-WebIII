<?php
//require libraries
require_once('libraries/Core.php');
require_once('libraries/Controller.php');
require_once('libraries/Database.php');
require_once('libraries/Router.php'); // Asegúrate de incluir el enrutador
require_once('config/config.php');
require_once('helpers/sessions_helper.php');

// Crear una instancia del enrutador
$router = new Router(); 

// Definir las rutas
$router->get('/blog/post/{id}', 'Blog@post'); // Para mostrar un post

// Crear instancia del núcleo
$init = new Core();
?>
