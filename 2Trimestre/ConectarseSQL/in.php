<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
        require "conexion.php";
    ?>
    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $consulta = "DELETE FROM videojuegos
                        WHERE id_videojuego = " . $_POST["id_videojuego"];

            $conn -> query($consulta);
        }
    ?>
</head>
<body>
    <?php
        $_tabla = $conn -> query("SELECT * FROM videojuegos");

        if($_tabla -> num_rows > 0){
            echo "<table class='table table-hover'> 
            <tr class='table-primary'>
                <th>ID</th>
                <th>Titulo</th>
                <th>Desarroladora</th>
                <th>Año de lanzamiento</th>
                <th>Reseña</th>
                <th>Duración</th>
                <th>Editar</th>
                <th>Borrar</th>
            </tr>";
            while($fila = $_tabla ->fetch_assoc()){
                echo "<tr>";
                foreach ($fila as $campo => $valor) {
                    if($campo == "horas_duracion")
                    echo "<td>" . ($valor == -1 ? "Juego como servicio" : $valor) . "</td>";
                    elseif($campo == "porcentaje_reseñas"){
                        echo "<td>";
                        switch(true){
                            case is_null($valor):
                                echo "No hay suficientes reseñas";
                                break;
                            case $valor < 50:
                                echo "Negativa: $valor";
                                break;
                            case $valor < 70:
                                echo "Mediocre: $valor";
                                break;
                            case $valor < 90:
                                echo "Buena: $valor";
                                break;
                            default:
                                echo "Excelente $valor";

                        }
                        echo "</td>";

                    }
                    else{
                        echo "<td> $valor </td>";
                    }
                }
                ?>
                <td>
                    <a class="btn btn-primary" href="editarVideojuego.php?id_videojuego=<?php echo $fila['id_videojuego']?>">EDITAR</a>
                </td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id_videojuego" value = "<?php echo $fila['id_videojuego']?>">
                        <input type="submit" value="BORRAR" class="btn btn-danger">
                    </form>
                </td>
                <?php
                echo "</tr>";
            }
            echo "</table>";
        }else{
            echo "No se han encontrado datos <br>";
        }
        $conn -> close();
    ?>
</body>
</html>