<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
        require "../conexion.php";

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $tmp_usuario = $_POST["usuario"];
            $tmp_contrasenia = $_POST["contrasena"];
            $admi = isset($_POST["admi"]) == "on" ? 1 : 0;   

            $consulta_usuario = "SELECT usuario FROM usuarios WHERE usuario = '$tmp_usuario'";
            $comprobacion_usurio = $_conexion -> query($consulta_usuario);

            if($tmp_usuario =="") $err_usuario = "No puede estar vacio";
            else if($comprobacion_usurio -> num_rows != 0) $err_usuario = "Ya esta en uso";
            else $nuevoUsuario = $tmp_usuario;
            
            if($tmp_contrasenia == "") $err_contrasenia = "No puede estar vacia";
            else $contrasenia = $tmp_contrasenia;

            if(isset($nuevoUsuario) && isset($contrasenia)){
                $contrasena_cifrada = password_hash($contrasenia, PASSWORD_DEFAULT);

                $consulta = "INSERT INTO usuarios VALUES ('$nuevoUsuario', '$contrasena_cifrada', $admi)";
                $_conexion -> query($consulta);
            }
        }
    ?>
</head>
<body>

    <div class="container">
        <h1>Formulario de registro :D</h1>
        <form action="" method="post"class="col-4">
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input type="text" name="usuario" class="form-control" placeholder="<?= $err_usuario ?? ""?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" name="contrasena" class="form-control" placeholder= "<?= $err_contrasenia ?? "" ?>">
            </div>
            <div class="mb-3">

                <input type="checkbox" name="admi">
                <label for="admi">¿Eres un administrador?</label>
            </div>
            <div class="mb-3">
                <input type="submit" value="Registrarse" class="btn btn-primary">
            </div>
        </form>
        <h3>Si ya tienes cuenta, inicia sesión</h3>
        <a href="login.php" class="btn btn-secondary">Iniciar sesión</a>
    </div>
</body>
</html>