<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header("Location: index.php");
    }
    $nombre = $_SESSION['nombre'];
    $usuario_rol = $_SESSION['rol'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Meykos - Historia</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="principal.php">Farmacia Meykos</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#!" role="button" data-toggle="dropdown" 
                    aria-haspopup="true" aria-expanded="false"><?php echo $nombre; ?><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#!">Configuracion</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Salir</a>
                    </div>
                </li>  
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="principal.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-walking"></i></div>
                                Inicio
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-info-circle"></i></div>
                                Acerca de Meykos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="mision_vision.php">Mision y Vision</a>
                                    <a class="nav-link" href="historia.php">Historia</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOtros" aria-expanded="false" aria-controls="collapseOtros">
                                <div class="sb-nav-link-icon"><i class="far fa-address-book"></i></div>
                                Otros
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseOtros" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="aseguradoras.php">Aseguradoras</a>
                                    <a class="nav-link" href="contacto.php">Contacto</a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Aplicaciones</div>
                            <?php if ($usuario_rol == "admin") { ?>
                                <a class="nav-link" href="gestion_usuarios.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                    Gestion de usuarios
                                </a>
                            <?php } ?>  
                            <?php if ($usuario_rol == "admin" || $usuario_rol == "empleado") { ?>  
                                <a class="nav-link" href="reportes.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                    Reportes
                                </a>
                            <?php } ?>
                            <?php if ($usuario_rol == "admin" || $usuario_rol == "cliente") { ?>
                                <a class="nav-link" href="compras.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                    Comprar Productos
                                </a>
                            <?php } ?>    
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content" class="bg-primary">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Meykos - Historia</h1>
                        <div class="card col p-0 mr-3">
                            <img src="assets/img/Historia.png" alt="Historia" class="card-img-top img-fluid">
                            <div class="card-body">
                                <h3 class="card-title">Historia</h3>
                                <p class="card-text">
                                    Meykos fue fundada en 1995 con el objetivo de revolucionar el concepto de farmacia que 
                                    prevalecía en ese tiempo, ofreciendo al público una experiencia de compra superior, 
                                    instalaciones con seguridad, iluminación, limpieza, estacionamiento, etc. 
                                    La visión de su fundador fue inyectarle a la compañía una cultura permanente por el servicio. 
                                    En pocos años se consolidó como la cadena líder en el país.
                                    En el 2014 con el objetivo de ofrecer todo lo necesario para satisfacer las necesidades de salud
                                    y bienestar de los guatemaltecos, Meykos dio a conocer su nuevo concepto de negocio, que consiste 
                                    principalmente en amplio surtido de productos para la prevención y cuidado de la salud. 
                                    Entre las nuevas categorías que se implementaron, se encuentran: equipo médico, óptica, vitaminas, hipodermia, entre otros artículos relacionados al bienestar general.
                                    Se reforzaron con más variedad el área de medicamentos, bebés, cuidado personal, cosmética y dermo cosméticos con una amplia selección de marcas internacionales para satisfacer las necesidades de toda la familia.
                                    El nuevo concepto abarcó el cambio de imagen, refrescamos nuestro logo, se remodelaron y ampliaron las tiendas para mayor comodidad.
                                    En Meykos ahora somos especialistas en salud y bienestar y lanzamos un supermercado de la salud, único en Guatemala. Visítanos y descubre la mejor experiencia en salud y bienestar
                                </p>
                                <button type="button" class="btn btn-success" onclick="location.href='https://meykos.com/'">Ver mas...</button>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-dark mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-light">Copyright &copy; Meykos 2021</div>
                            <div>
                                <a href="#">Politica de Privacidad</a>
                                &middot;
                                <a href="#">Terminos &amp; Condiciones</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
