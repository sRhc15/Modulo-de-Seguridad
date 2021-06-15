<?php
    require 'conexion.php';
    $id = $_POST['id'];
    $rol = $_POST['rol'];
    $sql = "UPDATE usuario SET Rol ='$rol' WHERE idUsuario = '$id'";
    $resultado = $mysqli->query($sql);
?>

<html>
    <head>
    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class ="container">
            <div class ="row" style="text-align: center">
                <?php if($resultado) { ?>
                <h3>Rol Asignado</h3>
                <?php } else { ?>
                <h3>Error al guardar</h3>
                <?php } ?>

                <a href="gestion_usuarios.php" class="btn btn-primary"> Regresar</a>
            </div>
        </div>
    </body>
</html>