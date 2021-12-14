<?php
require_once('Conexion.php');

class Ejercicio {
    private $id;
    private $nombre;
    private $musculo;

    function __construct() {
    }

    function __construct1($id = null, $nombre = null, $musculo = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->musculo = $musculo;
    }

    function listaEjercicios() {
        $link = Conexion::conectar();
        $sql = "CALL sp_listaEjercicios()";
        $stmt = $link->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function listaEjercicioPorId($id) {
        $link = Conexion::conectar();
        $sql = "CALL sp_listaEjercicioPorId(:pIdEjercicio)";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':pIdEjercicio', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function listaEjerciciosPorMusculo() {
    }

    function agregarEjercicio($nombre, $musculo) {
        $link = Conexion::conectar();
        $sql = "CALL sp_agregarEjercicio(:pNombre, :pMusculo)";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':pNombre', $nombre);
        $stmt->bindParam(':pMusculo', $musculo);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function borrarEjercicio($nombre) {
        $link = Conexion::conectar();
        $sql = "CALL sp_borrarEjercicio(:pNombre)";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':pNombre', $nombre);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }


    function modificarEjercicio($nombre) {
        $link = Conexion::conectar();
        $sql = "CALL sp_modificarEjercicio(:pNombre)";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':pNombre', $nombre);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
