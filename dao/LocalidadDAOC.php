<?php

class LocalidadDAOC {

    public function getLocalidadXID($id){
       require_once("../dataBase/ConexionDB.php");
       require_once("../model/Localidad.php");
       require_once("../dao/ProvinciaDAOC.php");
    
        $conexionDB = new ConexionDB("localhost","id19023603_root","","id19023603_cacproyecto");
        $conexionDB->conectar();
    
        $sql="SELECT * FROM localidades WHERE idlocalidad=$id";
        
        $result = $conexionDB->ejecutar($sql);
        $provDAO = new ProvinciaDAOC();

        while($loc = $result->fetch_assoc()) {
            $provincia = $provDAO->getProvinciadXID($loc["idProvincia"]);
            $locObj = new Localidad($loc["idlocalidad"],$loc["nombre"], $provincia);
        }
            
        return $locObj;
    }

    public function listarLocalidades(){
        require_once("../model/Localidad.php");
        require_once("../dao/ProvinciaDAOC.php");
        require_once("../dataBase/ConexionDB.php");
    
        $conexionDB = new ConexionDB("localhost","id19023603_root","","id19023603_cacproyecto");
        $conexionDB->conectar();
    
        $sql="SELECT * FROM localidades";
        
        $result = $conexionDB->ejecutar($sql);
        $provDAO = new ProvinciaDAOC();

        while($loc = $result->fetch_assoc()) {
            $provincia = $provDAO->getProvinciadXID($loc["idProvincia"]);
            $locObj = new Localidad($loc["idlocalidad"],$loc["nombre"],$provincia);
            $listaLoc[] = $locObj;
            
        }
            
        return $listaLoc;
    }



}

?>