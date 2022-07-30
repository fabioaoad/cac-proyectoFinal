<?php
function menu_bs($origen='') {
    $menuEspecial = '';
    $ruta1 = '../';  
    $ruta2 = '';
    $menuOrigen = '';    

    if($origen=='p') {
        $ruta1 = '';
        $ruta2 = 'view/';
        $menuOrigen = ' <li class="nav-item dropdown multi-level-dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Servicios</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown01">
                                <li><a class="dropdown-item" href="#">Venta</a></li>
                                <li><a class="dropdown-item" href="#">Colocación</a></li>
                                <li><a class="dropdown-item" navbar href="#">Reparación</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown multi-level-dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" id="dropdown02" data-bs-toggle="dropdown" aria-expanded="false">Acerca de</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown02">
                                <li><a class="dropdown-item" href="#">Nosotros</a></li>
                                <li><a class="dropdown-item" href="#historia">Historia</a></li>
                                <li><a class="dropdown-item" navbar href="#mision">Misión</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#">Contacto</a></li>';
    }    
                    
    $opcion = '';
    $menuLogin = '  <form class="d-flex flex-column flex-md-row align-items-center" action="'.$ruta1.'controller/checklogin.php" method="POST">
                        <div class="field me-2 mb-2 mb-md-0">
                            <i class="icon-sm fas fa-user"></i>
                            <input name="inputEmail" class="form-control form-control-sm" type="text" placeholder="Usuario" aria-label="Username" required>
                        </div>
                        <div class="field me-2 mb-2 mb-md-0">
                            <i class="icon-sm fas fa-key"></i>
                            <input name="inputPassword" class="form-control form-control-sm" type="password" placeholder="Contraseña" aria-label="Password" required>
                        </div>
                        <div class="d-flex align-items-center align-self-start">
                            <button class="btn btn-outline-dark btn-sm me-2 mb-2 mb-md-0" type="submit">Ingresar</button>
                            <a class="small text-decoration-none text-dark" href="'.$ruta2.'altaUsuario.php">Registrate</a></li></ul>
                        </div>
                    </form>';

    if (isset($_SESSION['user']) && $_SESSION['user']) {
        $nombre = $_SESSION['name']?$_SESSION['name']:$_SESSION['user'];
        $menuLogin = '<div class="d-flex flex-column flex-md-row align-items-center">'.$nombre.'</div>';
        $opcion = '<a class="nav-link" href="'.$ruta2.'logout.php">Salir</a>';
        $menuEspecial = '<li class="nav-item dropdown multi-level-dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" id="dropdown04" data-bs-toggle="dropdown" aria-expanded="false">Usuarios</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown04">
                                <li><a class="dropdown-item" navbar href="'.$ruta2.'altaUsuario.php">Crear Usuario</a></li>
                                <li><a class="dropdown-item" href="'.$ruta2.'listadoUsuarios.php">Lista de Usuarios</a></li>                                        
                            </ul>
                        </li>
                        <li class="nav-item dropdown multi-level-dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" id="dropdown03" data-bs-toggle="dropdown" aria-expanded="false">Pedidos</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown03">
                                <li><a class="dropdown-item" navbar href="'.$ruta2.'pedido.php">Cargar Pedido</a></li>
                                <li><a class="dropdown-item" href="'.$ruta2.'listadoPedidos.php">Lista de Pedidos</a></li>
                            </ul>
                        </li>';
    }

    $html = '<nav class="navbar navbar-expand-md navbar-light bg-warning fixed-top" aria-label="navBar">
                <div class="container-fluid">
                    <a class="navbar-brand" href="'.$ruta1.'index.php">PHP</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarsExample04">
                        <ul class="navbar-nav me-auto mb-2 mb-md-0">
                            '.$menuOrigen.$menuEspecial.'
                            <li class="nav-item">
                            '.$opcion.'
                            </li>
                        </ul>
                        '.$menuLogin.'
                    </div>
                </div>
            </nav>';

    return $html;
}
