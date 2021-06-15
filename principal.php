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
        <title>Farmacia Meykos</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Farmacia Meykos</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <!--
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            -->
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
                        <h1 class="mt-4">Meykos S.A - Salud y Bienestar</h1>
                        <div id="slider" class="carousel slider mb-3" data-ride="carousel">
                            <div class="carousel-inner">
                                <ol class="carousel-indicators">
                                    <li data-target="#slider" data-slide-to="0" class="active"></li>
                                    <li data-target="#slider" data-slide-to="1"></li>
                                    <li data-target="#slider" data-slide-to="2"></li>
                                    <li data-target="#slider" data-slide-to="3"></li>
                                    <li data-target="#slider" data-slide-to="4"></li>
                                </ol>
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="assets/img/Logo_Meykos.jpg?text=primera" alt="Logo">
                                <div class="carousel-caption d-one d-md-block">
                                </div>
                            </div>
                            <div class="carousel-item ">
                                <img class="d-block w-100" src="assets/img/Local1.jpg?text=segunda" alt="Local">
                                <div class="carousel-caption d-one d-md-block">
                                    <h5>Locales</h5>
                                </div>
                            </div>
                            <div class="carousel-item ">
                                <img class="d-block w-100" src="assets/img/Valores.png?text=tercera" alt="Valores">
                                <div class="carousel-caption d-one d-md-block">
                                </div>
                            </div>
                            <div class="carousel-item ">
                                <img class="d-block w-100" src="assets/img/Medicinas.jpg?text=cuarta" alt="Med1">
                                <div class="carousel-caption d-one d-md-block">
                                    <h5>Medicinas</h5>
                                </div>
                            </div>
                            <div class="carousel-item ">
                                <img class="d-block w-100" src="assets/img/Medicinas2.jpg?text=quinta" alt="Med2">
                                <div class="carousel-caption d-one d-md-block">
                                    <h5>Medicinas</h5>
                                </div>
                            </div>
                           
                            <a href="#slider" class="carousel-control-prev" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                                <span class="sr-only">Anterior</span>
                            </a>
                            <a href="#slider" class="carousel-control-next" role="button" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                                <span class="sr-only">Siguiente</span>
                            </a>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="jumbotron my-3">
                                <h1 class="display-6">Farmacias Meykos</h1>
                                <p class="lead">
                                    Somos una empresa que brinda soluciones para la salud y bienestar de nuestros clientes, 
                                    con productos y servicios de calidad, a traves de una experiencia de compra superior.
                                </p>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
