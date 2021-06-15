<?php
    session_start();
    require 'conexion.php';
    if(!isset($_SESSION['id'])){
        header("Location: index.php");
    }
    $nombre = $_SESSION['nombre'];
    $usuario_rol = $_SESSION['rol'];
    
    $id = $_GET['idUsuario'];
    $sql = "SELECT * FROM usuario WHERE idUsuario = '$id'";
    $resultado = $mysqli->query($sql);
    $row = $resultado->fetch_array();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Modulo de Seguridad</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
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
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Asignar Roles</h1>
                        <form method="POST" action="update.php">
                            <div class="form-group">
                                <label class="small mb-1" for="inputRol">Rol</label>
                                <input class="form-control py-4" id="inputRol" name="rol" type="text" placeholder="Rol" value="<?php echo $row['Rol']; ?>"/>
                                <input type="hidden" id="id" name="id" value="<?php echo $row['idUsuario'] ?>" />
                            </div>
                            <div class="form-group mt-4 mb-0">
                                <button type="submit" class="btn btn-secondary">Asignar Rol</button>
                                <a href="gestion_usuarios.php" class="btn btn-primary">Regresar</a>
                            </div>    
                        </form>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
