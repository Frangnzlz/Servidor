<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NuevoVideojuego</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors" , 1);
        require "conexion.php";
    ?>
</head>
<body>
    <?php
        $consulta = "SELECT * FROM desarrolladoras ORDER BY nombre_desarrolladora";
        $resultado = $conn -> query($consulta);
        $desarrolladora = [];
        // var_dump($resultado);

        while($fila = $resultado -> fetch_assoc()){
            array_push($desarrolladora, $fila["nombre_desarrolladora"]);
        
        }
    
    ?>
    <form action="" method="post">
        <label for="titulo">Titulo</label>
        <input type="text" name="titulo">
        <select name="desarrolladoras" id="">
            <option value="" disabled selected>--ELIJA LA DESARROLLADORA</option>
            <?php foreach($desarrolladora as $nombre){ ?>
                <option value="<?php echo $nombre ?>"><?php echo $nombre ?></option>
            <?php }?>
        </select>
    </form>
</body>
</html>