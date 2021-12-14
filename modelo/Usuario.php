<?php
require_once('Conexion.php');

class Usuario {
    private $id;
    private $password;
    private $nombre;
    private $apellido;
    private $estado;

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

    function __construct1($id) {
        $this->id = $id;
    }

    function __construct2($id, $pass) {
        $this->id = $id;
        $this->password = $pass;
    }

    function __construct4($id, $pass, $nombre, $apellido) {
        $this->id = $id;
        $this->password = $pass;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    function listaUsuarios() {
        $link = Conexion::conectar();
        $sql = 'CALL sp_listaUsuarios()';
        $stmt = $link->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    function listaUsuarioPorId() {
        $link = Conexion::conectar();
        $sql = 'CALL sp_listaUsuarioPorId(:pIdUsuario)';
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':pIdUsuario', $this->id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    function agregarUsuario() {
        $link = Conexion::conectar();
        $sql = 'CALL sp_agregarUsuario(:pIdUsuario, :pNombre, :pApellido)';
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':pIdUsuario', $this->id);
        $stmt->bindParam(':pNombre', $this->nombre);
        $stmt->bindParam(':pApellido', $this->apellido);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function borrarUsuario() {
        $link = Conexion::conectar();
        $sql = 'CALL sp_cambiarEstadoUsuario(:pIdUsuario)';
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':pIdUsuario', $this->id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function modificarUsuario() {
        $link = Conexion::conectar();
        $sql = 'CALL sp_cambiarNombre(:pIdUsuario, :pNombre)';
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':pIdUsuario', $this->id);
        $stmt->bindParam(':pNombre', $this->nombre);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function validarLogin() {
        $link = Conexion::conectar();
        $sql = "CALL sp_validarLogin(:pIdUsuario, :pPassword)";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':pIdUsuario', $this->id);
        $stmt->bindParam(':pPassword', $this->password);
        $stmt->execute();
        $usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (empty($usuario)) {
            return false;
        } else {
            return true;
        }
    }

    function buscarPassword() {
        $link = Conexion::conectar();
        $sql = "CALL sp_buscarPassword(:pIdUsuario)";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':pIdUsuario', $this->id);
        $stmt->execute();
        return $password = $stmt->fetchColumn();
    }

    function registro() {
        $link = Conexion::conectar();
        $sql = "CALL sp_registroUsuario(:pIdUsuario, :pPassword, :pNombre, :pApellido)";
        $stmt = $link->prepare($sql);
        $stmt->bindParam(':pIdUsuario', $this->id);
        $stmt->bindParam(':pPassword', $this->password);
        $stmt->bindParam(':pNombre', $this->nombre);
        $stmt->bindParam(':pApellido', $this->apellido);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getPassword() {
        return $this->password;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setId($id) {
        $this->id = $id;
    }
    function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function mostrarIDyPassword() {
        return "ID: " . $this->id . ' - Password: ' . $this->password;
    }

    function mostrarDatos() {
        return "ID: " . $this->id . ' - Nombre: ' . $this->nombre . ' - Apellido: ' . $this->apellido;
    }
}





// function getBeneficiario($nro){
//     $link = Conexion::conectar();
//     $sql = 'CALL sp_consulta(:nro)';
//     $stmt = $link->prepare($sql);
//     $stmt->bindParam(':nro', $nro, PDO::PARAM_STR);
//     $stmt->execute();
//     $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
//     return $resultado;
// }
