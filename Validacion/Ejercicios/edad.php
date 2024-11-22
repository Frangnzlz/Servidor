<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors",1);
        require "funciones.php";
    ?>
</head>
<body>
    <form action="" method="get">
        <input type="text" name="nombre">
        <input type="text" name="edad">
        <input type="submit" value="Enviar">
        </form>
        <?php
            if($_SERVER["REQUEST_METHOD"] == "GET"){
                $nombre =  isset($_GET["nombre"]) ? sanear($_GET["nombre"]) : "";
                $edad = isset($_GET["edad"]) ? validar($_GET["edad"]) : "";

                echo "<pre>$nombre<br> $edad</pre>";
            }
        ?>
</body>
</html>
<?php



?>