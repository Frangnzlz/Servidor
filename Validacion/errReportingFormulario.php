<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <strong>form inseguro</strong>
    <form action="" method="post">
        <input type="text" name="comentario">
        <input type="submit" value="Enviar">
    </form>
    <strong>Form seguro</strong>    
    <form action="" method="get">
        <input type="text" name="comentario">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>

<?php
    error_reporting(E_ALL);
    ini_set("display_errors",1);
    
    // <script>
    //     alert('Has sido hackeado');
    //     document.body.innerHTML = "<h1>sitio hackeado</h1>";
    // </script>

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $comentario = $_POST["comentario"];
        echo $comentario;
    }

    if($_SERVER["REQUEST_METHOD"] == "GET"){
        $comentario = htmlspecialchars($_GET["comentario"], ENT_QUOTES, 'UTF-8');
        echo $comentario;
    }
?>