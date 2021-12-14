<?php
require_once('modelo/Rutina.php');

class RutinaController {
    private $rutina;

    function __construct() {
        $this->rutina = new Rutina();
    }

    function listaRutinaPorIdUsuario() {
        $obj = new Rutina($_SESSION['usuario']);
        // $id = base64_decode(urldecode($id));
        $ejercicios = $obj->listaRutinaPorIdUsuario();
        require_once('vista/Rutinas/rutinausuario.php');
    }

    function listaRutinaPorIdUsuarioYDia() {
        if (!isset($_POST['dia'])) {
            header('location: index.php?controlador=rutina&accion=listaRutinaPorIdUsuario');
        }
        $obj = new Rutina($_SESSION['usuario']);
        // $id = base64_decode(urldecode($id));
        $dia = $_POST['dia'];
        if ($dia === '0') {
            $ejercicios = $obj->listaRutinaPorIdUsuario();
        } else {
            $ejercicios = $obj->listaRutinaPorIdUsuarioYDia($dia);
        }
        require_once('vista/Rutinas/rutinausuario.php');
    }

    function agregarEjercicioARutina() {
        $obj = new Rutina($_SESSION['usuario']);
        // $id = base64_decode(urldecode($id));
        $musculos = $obj->listaMusculos();
        if (isset($_POST['musculo']) && $_POST['musculo'] !== '0') {
            $musculo = $_POST['musculo'];
            $ejercicios = $obj->listaEjerciciosPorMusculo($musculo);
        } else {
            $ejercicios = $obj->listaEjercicios();
        }
        if (isset($_POST['idejercicio'])) {
            $obj->setIdEjercicio($_POST['idejercicio']);
            $obj->setDia($_POST['dia']);
            $obj->setSeries($_POST['series']);
            $obj->setRepeticiones($_POST['repeticiones']);
            $obj->setDescanso($_POST['descanso']);
            if ($obj->agregarEjercicioARutina()) {
                $a = "Ejercicio agregado";
            } else {
                $a = "Ejercicio no agregado";
            }
        }
        require_once('vista/Rutinas/agregarejercicio.php');
    }

    function modificarEjercicio() {
        $obj = new Rutina($_SESSION['usuario']);
        // $id = base64_decode(urldecode($id));
        $obj->setIdEjercicio($_GET['ejercicio']);
        $ejercicios = $obj->ejercicioRutina();
        if (isset($_POST['series'])) {
            $obj->setSeries($_POST['series']);
            $obj->setRepeticiones($_POST['repeticiones']);
            $obj->setDescanso($_POST['descanso']);
            if ($obj->modificarEjercicioUsuario()) {
                header('location: index.php?controlador=rutina&accion=listaRutinaPorIdUsuario');
            } else {
                $a = "Ejercicio no modificado";
            }
        }
        require_once('vista/Rutinas/modificarejercicio.php');
    }

    function borrarEjercicio() {
        $obj = new Rutina;
        $obj->setIdEjercicio($_GET['ejercicio']);
        $borrar = $obj->borrarEjercicioUsuario();
        if ($borrar) {
            header('location: index.php?controlador=rutina&accion=listaRutinaPorIdUsuario');
        } else {
            header('location: index.php?controlador=rutina&accion=listaRutinaPorIdUsuario');
        }
    }
}
