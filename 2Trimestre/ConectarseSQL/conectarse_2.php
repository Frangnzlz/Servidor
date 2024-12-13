<?php
    error_reporting(E_ALL);
    ini_set("display_errors",1);

    $serverName = "localhost";
    $dataBase = "videojuegos_bd";
    $usuario = "Admi";
    $contra = "F12345.";
    //crear conexión
    $conn = new mysqli($serverName, $usuario, $contra, $dataBase);

    if($conn -> connect_error){
        die("Error de conexión:" . $conn -> connect_error);
    }
    $_tabla = $conn -> query("SELECT * FROM videojuegos");

    if($_tabla -> num_rows > 0){
        echo "<table border='1' style='border-collapse: collapse;'> 
        <tr>
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