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

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $titulo = $_POST["titulo"];
            $nombre_desarrolladora = $_POST["nombre_desarrolladora"];
            $anno_lanzamiento = $_POST["anno_lanzamiento"];
            $porcentaje_reseñas = $_POST["porcentaje_reseñas"];
            $horas_duración = $_POST["horas_duracion"];

            $consulta = "INSERT INTO VIDEOJUEGOS (titulo, 
                                    nombre_desarrolladora, 
                                    anno_lanzamiento, 
                                    porcentaje_reseñas,
                                    horas_duracion)
                                    VALUES
                                    ('$titulo',
                                    '$nombre_desarrolladora',
                                    $anno_lanzamiento,
                                    $porcentaje_reseñas,
                                    $horas_duración)
                                    ";


            $conn -> query($consulta);
        }

    
    ?>
    <form action="" method="post">
        <label for="titulo">Titulo</label>
        <input type="text" name="titulo"><br>
        <select name="nombre_desarrolladora" id="">
            <option value="" disabled selected>--ELIJA LA DESARROLLADORA</option>
            <?php foreach($desarrolladora as $nombre){ ?>
                <option value="<?php echo $nombre ?>"><?php echo $nombre ?></option>
            <?php }?>
        </select><br>
        <label for="anno_lanzamiento">anno_lanzamiento:</label>
        <input type="text" name="anno_lanzamiento"><br>
        <label for="porcentaje_reseñas">Porcentaje reseñas</label>
        <input type="text" name="porcentaje_reseñas" id=""><br>
        <label for="horas_duracion">Duracion</label>
        <input type="text" name = "horas_duracion"><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>