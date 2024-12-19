<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors" , 1);
        require "conexion.php";

    ?>
</head>
<body>
    <?php
        echo "<h1>".  $_GET['id_videojuego'] . "</h1><br>";
        $id = $_GET['id_videojuego'];
        
        $consulta = "SELECT * FROM desarrolladoras ORDER BY nombre_desarrolladora";
        $resultado = $conn -> query($consulta);
        $desarrolladora = [];
        // var_dump($resultado);
        $consulta = "Select * FROM videojuegos where id_videojuego = $id ";
        $juego = ($conn -> query(($consulta))) -> fetch_assoc();

        while($fila = $resultado -> fetch_assoc()){
            array_push($desarrolladora, $fila["nombre_desarrolladora"]);
        
        }
    ?>
    <form action="" method="POST">
    <label for="titulo">Titulo</label>
        <input type="text" name="titulo"  value="<?php echo $juego['titulo']?>"><br>
        <select name="nombre_desarrolladora">
            <option value="" disabled selected>--ELIJA LA DESARROLLADORA--</option>
            <?php foreach($desarrolladora as $nombre){ ?>
                <option value="<?php echo $nombre ?>"><?php echo $nombre ?></option>
            <?php }?>
        </select><br>
        <label for="anno_lanzamiento">anno_lanzamiento:</label>
        <input type="text" name="anno_lanzamiento"  value="<?php echo $juego['anno_lanzamiento']?>"><br>
        <label for="porcentaje_reseñas">Porcentaje reseñas</label>
        <input type="text" name="porcentaje_reseñas"  value="<?php echo $juego['porcentaje_reseñas']?>"><br>
        <label for="horas_duracion">Duracion</label>
        <input type="text" name = "horas_duracion"  value="<?php echo $juego['horas_duracion']?>"><br>
        <input type="submit" value="Enviar">


    </form>

</body>
</html>