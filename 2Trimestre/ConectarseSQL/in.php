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
</head>
<body>
    <?php
        $_tabla = $conn -> query("SELECT * FROM videojuegos");

        if($_tabla -> num_rows > 0){
            echo "<table class='table table-hover'> 
            <tr class='table-primary'>
                <td>ID</td>
                <td>Titulo</td>
                <td>Desarroladora</td>
                <td>Año de lanzamiento</td>
                <td>Reseña</td>
                <td>Duración
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