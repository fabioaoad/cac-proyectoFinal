<?php

class PedidoDAOC
{

    public function listarPedidos()
    {
        require_once("../dataBase/ConexionDB.php");
        require_once("../model/Pedido.php");
        require_once("../dao/LocalidadDAOC.php");

        $conexionDB = new ConexionDB("localhost", "root", "", "cacproyecto");
        $conexionDB->conectar();
        $result = $conexionDB->ejecutar("SELECT * FROM pedidos");

        $locDAO = new LocalidadDAOC();

        while ($pedido = $result->fetch_assoc()) {

            $localidad = $locDAO->getLocalidadXID($pedido["localidad"]);


            $pedObj = new Pedido(
                $pedido["idpedido"],
                $pedido["nombre"],
                $pedido["apellido"],
                $pedido["usuario"],
                $pedido["mail"],
                $pedido["lugarentrega"],
                $localidad,
                $pedido["codpostal"],
                $pedido["formadepago"],
                $pedido["tarjtitular"],
                $pedido["tarjnumero"],
                $pedido["tarjvto"],
                $pedido["tarjclave"]
            );

            $listaPedidos[] = $pedObj;
        }
        return $listaPedidos;
    }

    public function altaPedido(Pedido $pedido)
    {
        require_once("../dataBase/ConexionDB.php");
        require_once("../model/Pedido.php");
        require_once("../dao/LocalidadDAOC.php");

        $conexionDB = new ConexionDB("localhost", "root", "", "cacproyecto");
        $conexionDB->conectar();
        $sql = "INSERT INTO pedidos 
        (nombre, apellido, usuario, mail, lugarentrega, localidad, codpostal, formadepago, tarjtitular, tarjnumero, tarjvto, tarjclave) 
        VALUES (
        '{$pedido->getNombre()}', 
        '{$pedido->getApellido()}', 
        '{$pedido->getUsuario()}', 
        '{$pedido->getMail()}', 
        '{$pedido->getLugarentrega()}', 
         {$pedido->getLocalidad()->getIdLocalidad()},
         '{$pedido->getCodpostal()}', 
         '{$pedido->getFormadepago()}', 
         '{$pedido->getTarjtitular()}', 
         {$pedido->getTarjnumero()}, 
         '{$pedido->getTarjvto()}', 
         {$pedido->getTarjclave()})";


        // var_dump($sql);

        $conexionDB->ejecutar($sql);
        return $conexionDB->cantFilas() > 0;
    }



    public function getPedido($id)
    {
        require_once("../dataBase/ConexionDB.php");
        require_once("../model/Pedido.php");
        require_once("../dao/LocalidadDAO.php");

        $con = new ConexionDB("localhost", "root", "", "cacproyecto");
        $con->conectar();
        $result = $con->ejecutar("SELECT * FROM pedidos WHERE idpedido = $id");

        $locDAO = new LocalidadDAOC();


        while ($pedido = $result->fetch_assoc()) {


            $localidad = $locDAO->getLocalidadXID($pedido["localidad"]);


            $pedObj = new Pedido(
                $pedido["idpedido"],
                $pedido["nombre"],
                $pedido["apellido"],
                $pedido["usuario"],
                $pedido["mail"],
                $pedido["lugarentrega"],
                $localidad,
                $pedido["codpostal"],
                $pedido["formadepago"],
                $pedido["tarjtitular"],
                $pedido["tarjnumero"],
                $pedido["tarjvto"],
                $pedido["tarjclave"]
            );
        }

        return $pedObj;
    }

    public function eliminarPedido($id)
    {
        require_once("../dataBase/ConexionDB.php");
        $conexionDB = new ConexionDB("localhost", "root", "", "cacproyecto");
        $conexionDB->conectar();

        $sql = "DELETE FROM `pedidos` WHERE idpedido = $id";

        $conexionDB->ejecutar($sql);

        return $conexionDB->cantFilas() > 0;
    }

    public function editarPedido(Pedido $pedido)
    {
        require_once("../dataBase/ConexionDB.php");
        $conexionDB = new ConexionDB("localhost", "root", "", "cacproyecto");
        $conexionDB->conectar();
        $sql = "UPDATE pedidos SET
                nombre =  '{$pedido->getNombre()}',
                apellido = '{$pedido->getApellido()}',
                usuario = '{$pedido->getUsuario()}', 
                mail = '{$pedido->getMail()}', 
                lugarentrega = '{$pedido->getLugarentrega()}', 
                localidad = {$pedido->getLocalidad()->getIdlocalidad()},         
                codpostal = '{$pedido->getCodpostal()}', 
                formadepago = '{$pedido->getFormadepago()}', 
                tarjtitular = '{$pedido->getTarjtitular()}', 
                tarjnumero = {$pedido->getTarjnumero()}, 
                tarjvto = '{$pedido->getTarjvto()}', 
                tarjclave = {$pedido->getTarjclave()}
                WHERE idpedido = {$pedido->getIdPedido()}";
        return $conexionDB->ejecutar($sql);
    }
}
