<form class="needs-validation" novalidate action="../controller/altaPedido.php" method="POST">
    <input type="text" id="idpedido" name="idpedido" hidden />
    <input type="text" id="idusuario" name="idusuario" hidden />
    <input type="text" id="accion" name="accion" value="Alta" hidden />
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="username">Usuario</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Usuario" value="<?= $usuario; ?>" readonly />
        </div>
        <div class="col-md-6 mb-3">
            <label for="firstName">Nombre y Apellido</label>
            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Tu nombre" value="<?= $nombre; ?>" readonly />
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="email">Email <span class="text-muted">(Opcional)</span></label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">@</span>
                </div>
                <input type="email" class="form-control" id="email" name="email" placeholder="tumail@gmail.com" />
            </div>
            <div class="invalid-feedback">El e-mail es inválido.</div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="address">Lugar de Entrega</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="Calle, n°, piso, dpto, ..." required />
            <div class="invalid-feedback">Faltó ingresar el domicilio de entrega.</div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 mb-3">
            <?php include('templates/provincias.php'); ?>
        </div>
        <div class="col-md-5 mb-3">
            <?php include('templates/localidades.php'); ?>
        </div>
        <div class="col-md-3 mb-3">
            <label for="zip">Cod.Postal</label>
            <input type="text" class="form-control" id="zip" name="zip" placeholder="" required />
            <div class="invalid-feedback">Faltó ingresar el Código Postal.</div>
        </div>
    </div>

    <hr class="mb-6" />

    <h4 class="mb-3 text-center">Forma de Pago</h4>

    <div class="row mb-3">
        <div class="col-12 col-sm-6 form-check d-flex justify-content-center">
            <input id="credit" name="paymentMethod" type="radio" class="form-check-input" value="c" checked required />
            <label class="form-check-label" for="credit">Tarjeta de Crédito</label>
        </div>
        <div class="col-12 col-sm-6 form-check d-flex justify-content-center">
            <input id="debit" name="paymentMethod" type="radio" class="form-check-input" value="d" required />
            <label class="form-check-label" for="debit">Mercado Pago</label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="cc-name">Nombre del Titular de la Tarjeta</label>
            <input type="text" class="form-control" id="cc-name" name="cc-name" placeholder="" required />
            <small class="text-muted">Nombre como se muestra en la tarjeta</small>
            <div class="invalid-feedback">El nombre debe ser ingresado.</div>
        </div>
        <div class="col-md-6 mb-3">
            <label for="cc-number">Número de la tarjeta</label>
            <input type="number" class="form-control" id="cc-number" name="cc-number" placeholder="" required />
            <div class="invalid-feedback">El n° es obligatorio.</div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 mb-3"></div>
        <div class="col-md-3 mb-3">
            <label for="cc-expiration">Fecha de Vto.</label>
            <input type="text" class="form-control" id="cc-expiration" name="cc-expiration" placeholder="" required />
            <div class="invalid-feedback">Falta ingresar la fecha de Vto.</div>
        </div>
        <div class="col-md-3 mb-3">
            <label for="cc-cvv">Código</label>
            <input type="number" class="form-control" id="cc-cvv" name="cc-cvv" placeholder="" required />
            <div class="invalid-feedback">N° de seguridad obligatorio.</div>
        </div>
    </div>
    <hr class="mb-4" />
    <div class="row text-center mb-4">
        <div class="col">
            <button id="btnPedido" class="btn btn-primary btn-lg btn-block" type="submit">Ingresar la Solicitud</button>
        </div>
    </div>
</form>