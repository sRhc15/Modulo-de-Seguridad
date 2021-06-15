<?php

    require "conexion.php";

    $message='';
    //Funcion Insertar
    function insertar($usuario, $password, $rol){
        global $mysqli;

        $stmt = $mysqli->prepare("INSERT INTO usuario (Usuario, Contrasena, Rol) VALUES (?,?,?)");
        $stmt->bind_param('sss', $usuario, $password, $rol);

        if ($stmt->execute()){
            return $mysqli->insert_id;
        } else{
            return 0;
        }
    }

    if(!empty($_POST)){
        $user = $_POST['user']; 
        $pass = $_POST['pass']; 
        $rol = "cliente";

        $activo =0;
        
        if(!empty($user) && !empty($pass)){
            $pass_c = sha1($pass);
            $registro = insertar($user, $pass_c, $rol);

            if($registro >0){
                echo"Usuario registrado con exito!";
            }
            else{
                echo"Hubo un error al registrar";
            }
            
        }
        else{

        }       
        
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Signup</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div class="bg-image" style="background-image: url('assets/img/Howling Cliffs.jpeg'); height: 100vh;">
        <div id="layoutAuthentication">
                <div id="layoutAuthentication_content">
                    <main>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                                        <?php if(!empty($message)): ?>
                                        <p><?php $message ?></p>
                                        <?php endif; ?>
                                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Crear una Cuenta</h3></div>
                                        <div class="card-body">
                                            <form method="POST" action=<?php echo $_SERVER['PHP_SELF']; ?>>
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="small mb-1" for="inputFirstName">Usuario</label>
                                                            <input class="form-control py-4" id="inputFirstName" name="user" type="text" placeholder="Ingrese Usuario" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputEmailAddress">Contrasena</label>
                                                    <input class="form-control py-4" id="inputEmailAddress" type="password" name="pass"  placeholder="Ingrese Contrasena" />
                                                </div>
                                                
                                                <div class="form-group mt-4 mb-0"><button type="submit" class="btn btn-primary">Crear Usuario</button></div>
                                            </form>
                                        </div>
                                        <div class="card-footer text-center">
                                            <div class="small"><a href="index.php">Ya tienes una cuenta? Inicia Sesion</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
                <div id="layoutAuthentication_footer">
                    <footer class="py-4 bg-dark mt-auto">
                        <div class="container-fluid">
                            <div class="d-flex align-items-center justify-content-between small">
                                <div class="text-muted">Copyright &copy; Meykos 2021</div>
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
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
