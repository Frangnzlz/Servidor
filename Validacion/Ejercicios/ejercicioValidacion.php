<!-- EJECICIO :d
            Crear un formulario para ingresar un correo, 
            sanitizar el correo entrante y validarlo más adelante
            Probar como ejemplo correos con:
            1) una estructura incorrecta y con caracteres no válidos
            2) estructura correcta y caracteres no válidos
            3) estructura incorrecta y caracteres válidos
            4) estructura correcta y caracteres válidos -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="email">Introduce un email</label>
        <input type="text" name="email" id="email">
        <input type="submit" value="Enviar">
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $email = $_POST["email"];

            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            echo $email."<br>";
            if(filter_var(filter_var($email, FILTER_SANITIZE_EMAIL), FILTER_VALIDATE_EMAIL)){
                echo "$email correcto";
            }else{
                echo "$email incorrecto";
            }
        }
    ?>
</body>
</html>