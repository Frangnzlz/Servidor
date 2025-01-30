 <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    require "conexion_pdo.php";
    
    $metodo = $_SERVER["REQUEST_METHOD"];
    $metodo = $_SERVER["REQUEST_METHOD"];
    //lee el cuerpo de la solicitud
    $entrada = file_get_contents("php://input");
    
    $entrada = json_decode($entrada, true);

    switch ($metodo) {
        case 'GET':
            controlGET($_conexion, $entrada);
            break;
        case 'POST':
            controlPOST($_conexion, $entrada);
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
                <table>
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

        }else{
            $consulta = "SELECT * FROM videojuegos";
            $stmt = $_conexion -> prepare($consulta);
            $stmt -> execute();
            while($registro = $stmt -> fetch()){
                foreach($registro as $campo => $valor ){
                    if($campo == "horas de duracion"){
                        ?><td><?= $valor < 0 ? "Juego como servicio" : $valor?></td><?php
                    }else{
                        ?><td><?= $valor?></td> <?php
                    }
                }
            }

        }
    }
 ?>