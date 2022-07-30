<?php 
       require_once("../dataBase/ConexionDB.php");
       require_once("../model/Localidad.php");

       $conexionDB = new ConexionDB("localhost","id19023603_root","","id19023603_cacproyecto");
       $conexionDB->conectar();

       $continente=$_POST['continente'];
      // var_dump($continente);

        $sql="SELECT * FROM localidades WHERE idProvincia=$continente";

       // var_dump($sql);

        $result = $conexionDB->ejecutar($sql);
        //var_dump($result);

        $cadena="<label>SELECT 2 (paises)</label> 
                <select id='lista2' name='lista2'>";

        while ($ver=mysqli_fetch_row($result)) {
            $cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[1]).'</option>';
        }

        echo  $cadena."</select>";
        

?>