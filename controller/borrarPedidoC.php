<?php
$idpedido = $_POST['id'];
if ($idpedido) {
  require_once('../dao/PedidoDAOC.php');
  $pedDAOC = new PedidoDAOC();
  $eliminadoOK = $pedDAOC->eliminarPedido($idpedido);
  var_dump($eliminadoOK);
  if ($eliminadoOK) {
    echo json_encode('OK');
  } else {
    echo json_encode('error');
  }
}
