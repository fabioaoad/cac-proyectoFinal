<?php 
class UsuarioDAOC {

    public function validarUsuYPass($usu, $pass) {
        require_once("../dataBase/ConexionDB.php");

        $conexionDB = new ConexionDB("localhost","root", "", "cacproyecto");
        $conexionDB->conectar();

        $sql ="SELECT * FROM usuarios WHERE usuario = '$usu' AND clave='$pass'";
        $conexionDB->ejecutar($sql);

        $existeUsuYPass = $conexionDB->cantFilas() > 0;

        if ($existeUsuYPass) {
            return true;
        } else {
            return false;
        }
        
    }

    public function validarUsu($usu) {
        require_once("../dataBase/ConexionDB.php");

        $conexionDB = new ConexionDB();
        $conexionDB->conectar();

        $sql ="SELECT * FROM usuarios WHERE usuario = '$usu'";
        $conexionDB->ejecutar($sql);

        $existeUsu = $conexionDB->cantFilas() > 0;
        if ($existeUsu) {
            return true;
        } else {
            return false;
        }
        
    }

    /**
     * Da alta un usuario en la tabla Usuarios.
     * realiza un insert en la tabla de usuarios
     * @param string $usu nombre de usuario, es un email válido
     * @param string $pass una contraseña que debe tener mayúscula, minúscula y números.
     * @return true si guardo ok, false si no guardo
     */
    public function guardarUsuario($usu, $pass) {

        require_once("../dataBase/ConexionDB.php");
    
        $conexionDB = new ConexionDB("localhost","root","","cacproyecto");
        $conexionDB->conectar();
    
        $sql="INSERT INTO usuarios (`usuario`, `clave`) VALUES ('$usu', '$pass')";
        $conexionDB->ejecutar($sql);
    
        return $conexionDB->cantFilas() > 0;
   
    }

    public function listarUsuarios(){
        require_once("../model/Usuario.php");
        require_once("../dataBase/ConexionDB.php");
    
        $conexionDB = new ConexionDB("localhost","root","","cacproyecto");
        $conexionDB->conectar();
    
        $sql="SELECT * FROM usuarios";
        
        $result = $conexionDB->ejecutar($sql);

        while($usu = $result->fetch_assoc()) {
            $usuObj = new Usuario($usu["idusuario"],$usu["usuario"],$usu["clave"]);
            $listaUsu[] = $usuObj;
        }
            
        return $listaUsu;
    }

    public function getUsuarioID($id) {
        require_once("../dataBase/ConexionDB.php");
        require_once("../model/Usuario.php");        

        $con = new ConexionDB();
        $con->conectar();
        $result = $con->ejecutar("SELECT * FROM usuarios WHERE idusuario = $id");

        while ($usuario = $result->fetch_assoc()) {                        
            $usuObj = new Usuario(  $usuario["usuario"]       , 
                                    $usuario['clave']           ,
                                    $usuario["nombreyapellido"]
                                );
            $usuObj->setIdUsuario($id);
        }

        return $usuObj;

    }

    public function getUsuarioNombre($usuario) {
        require_once("../dataBase/ConexionDB.php");
        require_once("../model/Usuario.php");        

        $con = new ConexionDB();
        $con->conectar();
        $result = $con->ejecutar("SELECT * FROM usuarios WHERE usuario = '$usuario'");

        while ($usuario = $result->fetch_assoc()) {                        
            $usuObj = new Usuario(  $usuario["usuario"]         , 
                                    $usuario['clave']           ,
                                    $usuario["nombreyapellido"]
                                );

            $usuObj->setIdUsuario($usuario['idusuario']);
        }

        return $usuObj;

    }
}

?>