<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    
    require "conexion_pdo.php";
    
    
    $metodo = $_SERVER["REQUEST_METHOD"];
    //lee el cuerpo de la solicitud
    $entrada = file_get_contents("php://input");
    
    $entrada = json_decode($entrada, true);
    
    switch ($metodo) {
        case 'GET':
            controlGET($_conexion, $entrada);
            break;
        case 'POST':
            // controlPOST($_conexion, $entrada);
            break;
        case 'DELETE':
            controlDelete($_conexion, $entrada);
            break; 
        default:
            echo "No se encuentra el método";
            break;
    }
    
    function controlGET($_conexion, $entrada) {
            ?>
                <table border="1" class="table">
                    <tr>
                        <th>id_videojuego</th>
                        <th>titulo</th>
                        <th>Nombre Desarrolladora</th>
                        <th>Año lanzamiento</th>
                        <th>Porcentaje Reseñas</th>
                        <th>Horas duración</th>
                    </tr>
            <?php
        if(isset($entrada["titulo"]) && $entrada["titulo"] != ""){
            $consulta = "SELECT * FROM videojuegos WHERE titulo = :t";
            $stmt = $_conexion -> prepare($consulta);
            $stmt -> execute([
                "t" => $entrada["titulo"]
            ]);
            foreach($stmt -> fetch(PDO::FETCH_ASSOC) as $campo => $valor ){
                if($campo == "horas_duracion"){
                    ?><td><?= $valor < 0 ? "Juego como servicio" : $valor?></td><?php
                }else{
                    ?><td> </td><?php
                }
            }
            $consulta = "SELECT id_videojuego FROM videojuegos WHERE titulo <> :t";
            $stmt = $_conexion -> prepare($consulta);
            $stmt -> execute([
                "t" => $entrada["titulo"]
            ]);
            while($registro = $stmt -> fetch(PDO::FETCH_ASSOC)){
                ?><tr><td><?= $registro["id_videojuego"] ?></td></tr><?php
            }
        }else{
            $consulta = "SELECT * FROM videojuegos";
            $stmt = $_conexion -> prepare($consulta);
            $stmt -> execute();
            while($registro = $stmt -> fetch(PDO::FETCH_ASSOC)){
                ?><tr><?php
                foreach($registro as $campo => $valor ){
                    if($campo == "horas_duracion"){
                        ?><td><?= $valor < 0 ? "Juego como servicio" : $valor?></td><?php
                    }else{
                        ?><td><?= $valor?></td><?php
                    }
                }
                ?></tr><?php
            }

        }
    }
    
    function controlDelete($_conexion, $entrada){
        if($entrada["id_videojuego"] == "ADMIN"){
            $consulta = "DELETE FROM videojuegos";
            $stmt = $_conexion -> prepare($consulta);
            $stmt = $stmt -> execute();

            echo "Tabla borrada";
        }else{
            $consulta = "SELECT * FROM videojuegos WHERE id_videojuego = :id";
            $stmt = $_conexion -> prepare($consulta);
            $stmt -> execute([
               "id" => $entrada["id_videojuego"]
            ]);
            $stmt = $stmt -> fetch();
            if($stmt){
                $consulta = "DELETE FROM videojuegos WHERE id_videojuego = :id";
                $stmt = $_conexion -> prepare($consulta);
                $stmt = $stmt -> execute([
                   "id" => $entrada["id_videojuego"]
                ]);

                echo "Video juego " . $entrada["id_videojuego"]. " borrado";
            }else{

                echo "No existe ese juego";
            }
        }
            
    }
 ?>