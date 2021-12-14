<?php

class Conexion {
    static function conectar() {
        $DSN = 'localhost';
        $USR = 'root';
        $PWD = 'root';
        $DB  = 'gimnasio';

        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        try {
            $link = new PDO(
                'mysql:host=' . $DSN . ';dbname=' . $DB,
                $USR,
                $PWD,
                $opciones
            );
        } catch (PDOException $link) {
            die($link->getMessage());
        }
        //$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        return $link;
    }

    private function __construct() {
    }

    /* Evita que puedan instanciar la clase. Forzando a que se utilicen los métodos estáticos. */
}
