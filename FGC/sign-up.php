<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors",1);
    ?>
</head>
<body>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            
            $tmp_usuario =  htmlspecialchars(trim($_POST["usuario"]), ENT_QUOTES, 'UTF-8');
            // $email = trim($_POST["email"]);
            $tmp_email=  htmlspecialchars(trim($_POST["email"]), ENT_QUOTES, 'UTF-8');
            $tmp_contrasena = htmlspecialchars(trim($_POST["contrasena"]), ENT_QUOTES, 'UTF-8');
            
            if(empty($tmp_usuario)){
                $err_usuario =  "<p style='color: red;'> Tienes que introducir un nombre de usuario</p>";
            }else if(!preg_match("/(?=.*[A-Z])(?=.*[a-z])[a-zA-Z]{5,15}$/", $tmp_usuario)){
                $err_usuario =  "<p style='color: red;'> el nombre de usuario debe tener entre 5 y 15 caracteres, e incluir al menos una minúscula y una mayúscula</p>";
            }else{
                $usuario = $tmp_usuario;
            }

            if(empty($tmp_email)){
                $err_email = "<p style='color: red;'> Tienes que introducir un email</p>";
            }else if(!filter_var($tmp_email, FILTER_VALIDATE_EMAIL)){
                $err_email = "<p style='color: red;'> No has introducido un email valido</p>";
            }else{
                $email = $tmp_email;
            }

            if(empty($tmp_contrasena)){
                $err_contrasena =  "<p style='color: red;'> Tienes que introducir una contraseña</p>";
            }else if(!preg_match("/(?=.*[@$!%*?&])[\w@$!%*?&]{8,15}$/", $tmp_contrasena)){
                $err_contrasena =  "<p style='color: red;'> La contraseña debe tener entre 8-15 caracteres, ser alfanumérica e incluir al menos un carácter especial (@, $, !, %, *, ?, &) </p>";
            }else{
                $contrasena = $tmp_contrasena;
            }
            
        }
    ?>
    <form action="" method="post">
        Usuario: <input type="text" name="usuario">
        <?php if(isset($err_usuario)) echo $err_usuario;?>
        <br>
        Email: <input type="text" name="email">
        <?php if(isset($err_email)) echo $err_email;?>
        <br>
        Contraseña: <input type="password" name="contrasena">
        <?php if(isset($err_contrasena)) echo $err_contrasena;?>
        <br>
        <input type="submit" value="Enviar">
    </form>


    <?php 
        if(isset($usuario) /*&& isset($email)*/ && isset($contrasena)){
            echo "<h3 style='color:green;'> Te has registrado correctamente: <br> $usuario <br> $email";
        }
    
    ?>
</body>
</html>