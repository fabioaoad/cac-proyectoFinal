<!doctype html>
<html lang="en">

<head>
    <title>Listado de Pedidos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <link href="css/estilo.css" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/e547f827f8.js" crossorigin="anonymous"></script>
    <script src="../js/jquery/jquery-3.3.1.min.js"></script>

    <script src="../js/pedido.js"></script>

</head>

<body class="text-center bg-light">
    <header>
        <nav>
            <div id="header">
                <ul class="nav">
                    <li><a href="inicio.html">Inicio</a></li>
                    <li><a href="">Usuarios</a>
                        <ul>
                            <li><a href="altaUsuarioC.html">Crear Usuario</a></li>
                            <li><a href="listadoUsuariosC.php">Listado de Usuarios</a></li>
                        </ul>
                    </li>
                    </li>
                    <li><a href="">Pedidos</a>
                        <ul>
                            <li><a href="listadoPedidosC.php">Listado de Pedidos</a></li>
                            <li><a href="pedidoC.php">Cargar Pedido</a></li>
                        </ul>
                    </li>
                    </li>

                    <li><a href="">Acerca de</a>
                        <ul>
                            <li><a href="">Nosotros</a></li>
                            <li><a href="">Nuestra Misión</a></li>
                            <li><a href="http://www.facebook.com">Historia</a></li>
                        </ul>
                    </li>
                    <li><a href="">Contacto</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="d-flex justify-content-center align-items-center my-7">
        <div class="container text-center bg-light rounded-3 shadow">
            <div class="py-4 text-center">
                <img class="d-block mx-auto mb-4" src="./images/logo.jpg" alt="Logo caba" width="72" height="72">
                <h2>Pedidos</h2>
                <p class="lead">Listado de Pedidos</p>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-sm bg-light">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Email</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Localidad</th>
                            <th scope="col">Provincia</th>
                            <th scope="col">Código Postal</th>
                            <th scope="col">Forma de Pago</th>
                            <th scope="col">Titular Tarjeta</th>
                            <th scope="col">Número Tarjeta</th>
                            <th scope="col">Vencimiemto Tarjeta</th>
                            <th scope="col">Clave Tarjeta</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once("../dao/PedidoDAOC.php");
                        $dao = new PedidoDAOC();
                        $listaPed = $dao->listarPedidos();
                        //var_dump($listaPed);

                        foreach ($listaPed as $pedido) {
                            $html = "<tr>";
                            $html .= "<td data-idpedido=" . $pedido->getIdPedido() . " data-usuario=" . $pedido->getUsuario() . ">" . $pedido->getIdPedido()      . "</td>";
                            $html .= "<td>" . $pedido->getNombre() . "</td>";
                            $html .= "<td>" . $pedido->getApellido() . "</td>";
                            $html .= "<td>" . $pedido->getMail()          . "</td>";
                            $html .= "<td>" . $pedido->getLugarEntrega()  . "</td>";
                            $html .= "<td data-idlocalidad=" . $pedido->getLocalidad()->getIdLocalidad() . ">" . $pedido->getLocalidad()->getNombre() . "</td>";
                            $html .= "<td data-idprovincia=" . $pedido->getLocalidad()->getProvincia()->getIdProvincia() . ">" . $pedido->getLocalidad()->getProvincia()->getNombre() . "</td>";
                            $html .= "<td>" . $pedido->getCodPostal()     . "</td>";
                            $html .= "<td>" . $pedido->getFormaDePago()     . "</td>";
                            $html .= "<td>" . $pedido->getTarjTitular()     . "</td>";
                            $html .= "<td>" . $pedido->getTarjNumero()     . "</td>";
                            $html .= "<td>" . $pedido->getTarjVto()     . "</td>";
                            $html .= "<td>" . $pedido->getTarjClave()     . "</td>";
                            $html .= "<td>";
                            $html .= "  <button class='btn btn-sm btn-warning text-white btnEditar' title='Modificar' data-id='" . $pedido->getIdPedido() . "' data-bs-toggle='modal' data-bs-target='#pedido'><i class='fas fa-pencil-alt'></i></button>";
                            $html .= "  <button class='btn btn-sm btn-danger btnBorrar' name='btnBorrar' title='Borrar' data-id='" . $pedido->getIdPedido() . "' data-bs-toggle='modal' data-bs-target='#confirma'><i class='fas fa-trash-alt'></i></button>";
                            $html .= "</td>";
                            $html .= "</tr>";
                            echo $html;
                        }

                        ?>

                    </tbody>

                </table>
            </div>
        </div>
    </div>


    <div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="mensajeLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div id="modal-header" class="modal-header bg-warning">
                    <h5 id="modal-title" class="modal-title" id="mensajeLabel">Atención!!!</h5>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="texto-confirma"></p>
                </div>
                <div class="modal-footer">
                    <button id="btnNo" type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                    <button type="button" data-bs-dismiss="modal" class="btn btn-success btnSi">Sí</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="mensaje" tabindex="-1" aria-labelledby="mensajeLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div id="mensaje-header" class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="mensajeLabel">Información!</h5>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="texto-mensaje"></p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="pedido" tabindex="-1" aria-labelledby="mensajeLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div id="modal-header" class="modal-header bg-primary">
                    <h5 id="modal-title" class="modal-title text-white" id="mensajeLabel"><i class="fa fa-edit"></i> ModificarRR</h5>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" name="update_pedido" id="update_pedido" novalidate action="" method="POST">
                        <input type="hidden" id="accion" name="accion" value="Editar">
                        <input type="hidden" id="idpedido" name="idpedido" value="">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">Nombre</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Tu nombre" value="" required>
                                <div class="invalid-feedback">
                                    Debe ingresar su nombre.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName">Apellido</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Tu apellido" value="" required>
                                <div class="invalid-feedback">
                                    Faltó ingresar el apellido.
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="username">Nombre de Usuario</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                    </div>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Usuario" disabled>
                                    <div class="invalid-feedback" style="width: 100%;">
                                        No se puede modificar
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="email">Email <span class="text-muted">(Optional)</span></label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="tumail@gmail.com">
                                <div class="invalid-feedback">
                                    El e-mail es inválido.
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="address">Lugar de Entrega</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Calle, n°, localidad..." required>
                                <div class="invalid-feedback">
                                    Faltó ingresar el domicilio de entrega.
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="lista1">Provincia</label>
                                <select id="lista1" name="lista1" class="custom-select d-block w-100" name="lista1" required>
                                    <option value="0">Seleccioná...</option>
                                    <?php
                                    require_once("../dao/ProvinciaDAOC.php");
                                    $dao = new ProvinciaDAOC();
                                    $listaProv = $dao->listarProvincias();
                                    foreach ($listaProv as $key => $prov) {
                                    ?>
                                        <option value="<?= $prov->getIdProvincia(); ?>"> <?= $prov->getNombre(); ?> </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    Seleccioná una provincia válida.
                                </div>
                            </div>
                            <div class="col-md-5 mb-3">
                                <label for="country">Localidad</label>
                                <select id="country" class="custom-select d-block w-100" name="country" required>
                                    <option value="">Seleccioná...</option>
                                </select>
                                <div class="invalid-feedback">
                                    Seleccioná una localidad válida.
                                </div>
                            </div>




                            <script type="text/javascript">
                                $(document).ready(function() {
                                    $('#lista1').val(0);
                                    recargarLista();

                                    $('#lista1').change(function() {
                                        recargarLista();
                                    });
                                })
                            </script>
                            <script type="text/javascript">
                                function recargarLista() {
                                    $.ajax({
                                        type: "POST",
                                        url: "datos.php",
                                        data: "continente=" + $('#lista1').val(),
                                        success: function(r) {
                                            $('#country').html(r);
                                        }
                                    });
                                }
                            </script>






                            <div class="col-md-3 mb-3">
                                <label for="zip">Cod.Postal</label>
                                <input type="text" class="form-control" id="zip" name="zip" placeholder="" required>
                                <div class="invalid-feedback">
                                    Faltó ingresar el Código Postal.
                                </div>
                            </div>
                        </div>


                        <hr class="mb-6">

                        <h4 class="mb-3">Forma de Pago</h4>

                        <div class="d-block my-3">
                            <div class="custom-control custom-radio">
                                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                                <label class="custom-control-label" for="credit">Tarjeta de Crédito</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" value="on" required>
                                <label class="custom-control-label" for="debit">Mercado Pago</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="cc-name">Nombre del Titular de la Tarjeta</label>
                                <input type="text" class="form-control" id="cc-name" name="cc-name" placeholder="" required>
                                <small class="text-muted">Nombre como se muestra en la tarjeta</small>
                                <div class="invalid-feedback">
                                    El nombre debe ser ingresado.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="cc-number">Número de la tarjeta</label>
                                <input type="text" class="form-control" id="cc-number" name="cc-number" placeholder="" required>
                                <div class="invalid-feedback">
                                    El n° es obligatorio.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mb-3"></div>
                            <div class="col-md-3 mb-3">
                                <label for="cc-expiration">Fecha de Vto.</label>
                                <input type="text" class="form-control" id="cc-expiration" name="cc-expiration" placeholder="" required>
                                <div class="invalid-feedback">
                                    Falta ingresar la fecha de Vto.
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="cc-cvv">Código</label>
                                <input type="text" class="form-control" id="cc-cvv" name="cc-cvv" placeholder="" required>
                                <div class="invalid-feedback">
                                    N° de seguridad obligatorio.
                                </div>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">
                                <button class="btn btn-primary btn-lg btn-block btn-update" type="button">Ingresar la Solicitud</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>






    <?php include('templates/scripts.php'); ?>
    <!-- <script src="../js/form-validation.js"></script> -->
    <script src="../js/popper/popper.min.js"></script>
    <script type="text/javascript" src="../js/datatables/datatables.min.js"></script>
    <script src="../js/pedido.js"></script>
</body>

</html>