<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
        require "conexion.php";

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $tmp_usuario = $_POST["usuario"];
            $contrasenia = $_POST["contrasena"];

            $consulta_usuario = "SELECT usuario FROM usuarios WHERE usuario = '$tmp_usuario'";
            $comprobacion_usurio = $conn -> query($consulta_usuario);

            if($comprobacion_usurio -> num_rows != 0) $err_usuario = "El nombre de usuario ya esta siendo usado";
            else $nuevoUsuario = $tmp_usuario;

            if(isset($nuevoUsuario)){
                $contrasena_cifrada = password_hash($contrasenia, PASSWORD_DEFAULT);

                $consulta = "INSERT INTO usuarios VALUES ('$nuevoUsuario', '$contrasena_cifrada')";
                $conn -> query($consulta);
            }
        }
    ?>
</head>
<body>

    <div class="container">
        <h1>Formulario de registro :D</h1>
        <form action="" method="post" enctype="multipart/form-data" class="col-4">
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input type="text" name="usuario" class="form-control" placeholder="<?php echo $err = $err_usuario ?? ""?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" name="contrasena" class="form-control">
            </div>
            <div class="mb-3">
                <input type="submit" value="Registrarse" class="btn btn-primary">
            </div>
        </form>
        <h3>Si ya tienes cuenta, inicia sesión</h3>
        <a href="iniciar_sesion.php" class="btn btn-secondary">Iniciar sesión</a>
    </div>
</body>
</html>