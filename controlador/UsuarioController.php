<?php
require_once('modelo/Usuario.php');

class UsuarioController {
    private $usuario;

    function __construct() {
        $this->usuario = new Usuario;
    }

    function listaUsuarios() {
        $obj = new Usuario;
        $usuarios = $obj->listaUsuarios();
        require_once('vista/Usuario/listaUsuarios.php');
    }

    function listaUsuarioPorId() {
        $id = $_GET['idusuario'];
        $id = base64_decode(urldecode($id));
        $obj = new Usuario;
        $obj->validarSesion();
        $usuarios = $obj->listaUsuarioPorId($id);
        require_once('vista/Usuario/detalleusuario.php');
    }

    function mostrarLogin() {
        if (!isset($_SESSION['usuario'])) {
            require_once('vista/Login/login.php');
        }
    }

    // function login1() {
    //     if (isset($_POST['username']) && isset($_POST['password'])) {
    //         $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
    //         $obj = new Usuario($_POST['username'], $_POST['password']);
    //         if (password_verify($obj->getPassword(), $hashedPassword)) {
    //             session_start();
    //             $_SESSION['usuario'] = $_POST['username'];
    //             header('location: index.php?controlador=rutina&accion=listaRutinaPorIdUsuario&login=1');
    //         } else {
    //             header('location: index.php?controlador=usuario&accion=mostrarlogin&login=0');
    //         }
    //     }
    // }

    function login() {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $obj = new Usuario($_POST['username'], $_POST['password']);
            if (password_verify($obj->getPassword(), $obj->buscarPassword())) {
                session_start();
                $_SESSION['usuario'] = $_POST['username'];
                header('location: index.php?controlador=rutina&accion=listaRutinaPorIdUsuario&login=1');
            } else {
                header('location: index.php?controlador=usuario&accion=mostrarlogin&login=0');
            }
        }
    }

    function mostrarRegistro() {
        if (!isset($_SESSION['usuario'])) {
            require_once('vista/Registro/registro.php');
        }
    }

    function registro() {
        if (isset($_POST['usuario']) && isset($_POST['password'])) {
            $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $obj = new Usuario($_POST['usuario'], $hashedPassword, $_POST['nombre'], $_POST['apellido']);
            if ($obj->registro()) {
                session_start();
                $_SESSION['usuario'] = $_POST['usuario'];
                header('location: index.php?controlador=rutina&accion=listaRutinaPorIdUsuario');
            }
        }
    }

    function validarSesion() {
        if (!isset($_SESSION['usuario'])) {
            header('location: index.php?controlador=usuario&accion=mostrarLogin');
        }
    }

    function cerrarSesion() {
        session_start();
        session_destroy();
        header('location: index.php?controlador=usuario&accion=mostrarLogin');
    }
}
