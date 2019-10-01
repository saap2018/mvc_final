<?php
/*session_start();
if(isset($_SESSION["usuario"])){
		if($_SESSION["privilegio"] == 'Superusuario'){

		} else if($_SESSION["privilegio"] == 'Administrador'){
			header("Location: administrador.php");
		}
		else if($_SESSION["privilegio"] == 'Supervisor'){
			header("Location: supervisor.php");
		}
		else{
			header("Location: user.php");	
		}
}else{
    header("Location: index.php");
}*/	
require_once 'model/database.php';

$controller = 'usuario';

// Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['c']))
{
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->Index();    
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
    
    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    
    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}