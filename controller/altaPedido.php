<?php
$accion = $_POST['accion'];
$idPedido = isset($_POST['idpedido']) ? $_POST['idpedido'] : null;
$nombre = $_POST['firstName'];
$apellido = $_POST['lastName'];
$usuario = $_POST['username'];
$mail = $_POST['email'];
$lugarentrega = $_POST['address'];
$idLocalidad = $_POST['country'];
$idProvincia = $_POST['lista1'];
$codpostal = $_POST['zip'];
$formadepago = $_POST['paymentMethod'];
$tarjtitular = $_POST['cc-name'];
$tarjnumero = $_POST['cc-number'];
$tarjvto = $_POST['cc-expiration'];
$tarjclave = $_POST['cc-cvv'];
//populate poo
require_once("../model/Pedido.php");
require_once("../model/Localidad.php");
require_once("../model/Provincia.php");
require_once("../dao/PedidoDAOC.php");

$provincia = new Provincia($idProvincia, null);
$localidad = new Localidad($idLocalidad, null, $provincia);

$pedido = new Pedido(null, $nombre, $apellido, $usuario, $mail, $lugarentrega, $localidad, $codpostal, $formadepago, $tarjtitular, $tarjnumero, $tarjvto, $tarjclave);

$dao = new PedidoDAOC();
$insertOk = false;

if ($accion == 'Editar') {
  $pedido = new Pedido($idPedido, $nombre, $apellido, $usuario, $mail, $lugarentrega, $localidad, $codpostal, $formadepago, $tarjtitular, $tarjnumero, $tarjvto, $tarjclave);

  $insertOk = $dao->editarPedido($pedido);
} elseif ($accion == 'Alta') {
  $insertOk = $dao->altaPedido($pedido);
  //var_dump($insertOk);
}

if ($insertOk) {
  if ($accion == 'Alta') {
    header("Location: ../view/mensajeOk.php");
  } elseif ($accion == 'Editar') {
    echo '1';
  }
  exit;
} 
// else {
//   header("Location: ../view/mensajeError.php");
//   exit;
// }
