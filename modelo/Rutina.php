<?php
require_once('Conexion.php');

// Tabla ejercicios_usuario en db
class Rutina {
    private $idrutina;
    private $idusuario;
    private $idejercicio;
    private $dia;
    private $series;
    private $repeticiones;
    private $descanso;

    function __construct() {
        //obtengo un array con los parámetros enviados a la función
        $params = func_get_args();
        //saco el número de parámetros que estoy recibiendo
        $num_params = func_num_args();
        //cada constructor de un número dado de parámetros tendrá un nombre de función
        //atendiendo al siguiente modelo __construct1() __construct2()...
        $funcion_constructor = '__construct' . $num_params;
        //compruebo si hay un constructor con ese número de parámetros
        if (method_exists($this, $funcion_constructor)) {
            //si existía esa función, la invoco, reenviando los parámetros que recibí en el constructor original
            call_user_func_array(array($this, $funcion_constructor), $params);
        }
    }

    function __construct0() {
    }

    function __construct1($idusuario) {
        $this->idusuario = $idusuario;
    }

    function __construct6($idusuario, $idejercicio, $dia, $series, $repeticiones, $descanso) {
        $this->idusuario = $idusuario;
        $this->idejercicio = $idejercicio;
        $this->dia = $dia;
        $this->series = $series;
        $this->repeticiones = $repeticiones;
        $this->descanso = $descanso;
    }

    function listaRutinaPorIdUsuario() {
        $link = Conexion::conectar();
        $sql = "CALL sp_rutinaUsuarioCompleta(:pIdUsuario)";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':pIdUsuario', $this->idusuario);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    function listaRutinaPorIdUsuarioYDia($dia) {
        $link = Conexion::conectar();
        $sql = "CALL sp_rutinaUsuarioPorDia(:pIdUsuario, :pDia)";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':pIdUsuario', $this->idusuario);
        $stmt->bindParam(':pDia', $dia);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    function agregarEjercicioARutina() {
        $link = Conexion::conectar();
        $sql = "CALL sp_agregarEjercicioARutina(:pIdUsuario, :pIdEjercicio, :pDia, :pSeries, :pRepeticiones, :pDescanso)";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':pIdUsuario', $this->idusuario);
        $stmt->bindParam(':pIdEjercicio', $this->idejercicio);
        $stmt->bindParam(':pDia', $this->dia);
        $stmt->bindParam(':pSeries', $this->series);
        $stmt->bindParam(':pRepeticiones', $this->repeticiones);
        $stmt->bindParam(':pDescanso', $this->descanso);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function listaMusculos() {
        $link = Conexion::conectar();
        $sql = "CALL sp_listaMusculos()";
        $stmt = $link->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    function listaEjerciciosPorMusculo($musculo) {
        $link = Conexion::conectar();
        $sql = "CALL sp_listaEjercicioPorMusculo(:pMusculo)";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':pMusculo', $musculo);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    function listaEjercicios() {
        $link = Conexion::conectar();
        $sql = "CALL sp_listaEjercicios()";
        $stmt = $link->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    function ejercicioRutina() {
        $link = Conexion::conectar();
        $sql = "CALL sp_listaEjercicioIdRutina(:pIdEjercicioUsuario)";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':pIdEjercicioUsuario', $this->idejercicio);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    function modificarEjercicioUsuario() {
        $link = Conexion::conectar();
        $sql = "CALL sp_modificarEjercicioUsuario(:pIdEjercicioUsuario, :pSeries, :pRepeticiones, :pDescanso)";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':pIdEjercicioUsuario', $this->idejercicio);
        $stmt->bindParam(':pSeries', $this->series);
        $stmt->bindParam(':pRepeticiones', $this->repeticiones);
        $stmt->bindParam(':pDescanso', $this->descanso);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function borrarEjercicioUsuario() {
        $link = Conexion::conectar();
        $sql = "CALL sp_borrarEjercicioUsuario(:pIdEjercicioUsuario)";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':pIdEjercicioUsuario', $this->idejercicio);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function setIdRutina($idrutina) {
        $this->idrutina = $idrutina;
    }

    function getIdRutina() {
        return $this->idrutina;
    }

    function setIdUsuario($sesion) {
        $this->idusuario = $sesion;
    }

    function getIdUsuario() {
        return $this->idusuario;
    }

    function setIdEjercicio($idejercicio) {
        $this->idejercicio = $idejercicio;
    }

    function getIdEjercicio() {
        return $this->idejercicio;
    }

    function setDia($dia) {
        $this->dia = $dia;
    }

    function getDia() {
        return $this->dia;
    }

    function setSeries($series) {
        $this->series = $series;
    }

    function getSeries() {
        return $this->series;
    }

    function setRepeticiones($repeticiones) {
        $this->repeticiones = $repeticiones;
    }

    function getRepeticiones() {
        return $this->repeticiones;
    }

    function setDescanso($descanso) {
        $this->descanso = $descanso;
    }

    function getDescanso() {
        return $this->descanso;
    }
}
