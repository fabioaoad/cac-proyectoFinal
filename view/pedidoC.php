<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Registro de Pedido</title>

  <!-- Bootstrap core CSS -->
  <link href="./css/bootstrap.min.css" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <link href="css/estilo.css" rel="stylesheet" type="text/css">
</head>

<body class="bg-light">

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

  <div class="py-4 text-center">
    <img class="d-block mx-auto mb-4" src="./images/logo.jpg" alt="Logo caba" width="72" height="72">
    <h2>Formulario de Pedido</h2>
    <p class="lead">La fecha de entrega será coordinada telefónicamente.</p>
  </div>

  <div class="col-md-12 text-center">
    <h4 class="mb-3">Tu pedido</h4>
    <form class="needs-validation" novalidate action="../controller/altaPedido.php" method="POST">
    <input type="text" id="idpedido" name="idpedido" hidden />
    <input type="text" id="idusuario" name="idusuario" hidden />
    <input type="text" id="accion" name="accion" value="Alta" hidden />
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
            <input type="text" class="form-control" id="username" name="username" placeholder="Usuario" required>
            <div class="invalid-feedback" style="width: 100%;">
              Faltó ingresar el usuario.
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
          <label for="state">Provincia</label>
          <select id="lista1" name="lista1" class="custom-select d-block w-100" id="state" name="state" required>
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
        <div  class="col-md-5 mb-3">
          <label for="country">Localidad</label>
          <select id="select2lista" class="custom-select d-block w-100" id="country" name="country" required>
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
                $('#select2lista').html(r);
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
          <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
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
          <button class="btn btn-primary btn-lg btn-block" type="submit">Ingresar la Solicitud</button>
        </div>
      </div>
    </form>
  </div>
  </div>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017-2020 Codo a Codo</p>
  </footer>
  </div>

  <script src="./js/form-validation.js"></script>
</body>

</html>