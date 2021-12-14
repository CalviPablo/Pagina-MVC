<?php
require_once('vista/header.php');

require_once('autoload.php');

if ((!isset($_SESSION['usuario']) && ($_GET['accion']) !== 'mostrarlogin' && ($_GET['accion']) !== 'mostrarregistro')) {
    header('location: index.php?controlador=usuario&accion=mostrarlogin');
}

if (isset($_GET['controlador'])) {
    $controllername = $_GET['controlador'] . 'Controller';
    if (class_exists($controllername)) {
        $controller = new $controllername();
        if (isset($_GET['accion']) && method_exists($controllername, $_GET['accion'])) {
            $action = $_GET['accion'];
            $controller->$action();
        }
    }
} else {
    require_once('vista/index.php');
}

require_once('vista/footer.php');
