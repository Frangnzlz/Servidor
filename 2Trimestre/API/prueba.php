<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="jquery-3.7.1.min.js"></script>
    <script src="formulario.js"></script>
</head>


<body>

    <div class="container m-4">
        <h1>test</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">Seleccionar el metodo</label>
                <select name="metodo" id="metodo" class="form-select">
                    <option value="GET">GET(Recuperar datos)</option>
                    <option value="POST">POST(Insertar datos)</option>
                    <option value="PUT">PUT(Modificar Datos)</option>
                    <option value="DELETE">DELETE(borrar datos)</option>
                </select>
            </div>
            <!-- <div id="datosPost" class="mb-3">
                <label class="form-label">Datos para POST:</label>
                <input type="text" name="id_videojuego" class="form-control" placeholder="id_videojuego">
                <input type="text" name="titulo" class="form-control" placeholder="titulo">
                <input type="number" name="anno_fundacion" class="form-control" placeholder="Ano fundacion">
            </div> -->
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>

    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $metodo = $_POST["metodo"];
        $datos = [];
        $url = "http://localhost/API/nucleoAPI.php";
        if ($metodo == "GET") {
            //mandamos un get, contruimos URL dependiendo de si da ciudad o no
            // $ciudad = isset($_POST["ciudad"]) && !empty($_POST["ciudad"]) ? "?ciudad=" . urlencode($_POST["ciudad"]) : "";
            // $url .= $ciudad;
            $datos = [
                "titulo" => $_POST["titulo"]
            ];
            // echo "url generada: " . htmlspecialchars($url) . "<br>";
            // try {
            //     $res = file_get_contents($url);
            //     echo "<pre>" . htmlspecialchars($res) . "</pre>";
            // } catch (Exception $e) {
            //     echo "Error al realizar la solicitud " . $e->getMessage();
            // }
        } else if ($metodo == "POST" || $metodo == "DELETE") {
            //mandamos un post, contruimos URL
            $nombre_desarrolladora = isset($_POST["nombre_desarrolladora"]) && !empty($_POST["nombre_desarrolladora"]) ? $_POST["nombre_desarrolladora"] : "";
            if($metodo == "POST" ){
                $datos = [
                    "nombre_desarrolladora" => $_POST["nombre_desarrolladora"],
                    "ciudad" => $_POST["ciudad"],
                    "anno_fundacion" => $_POST["anno_fundacion"]
                ];
            }else{
                $datos = [
                    "id_videojuego" => $_POST["id_videojuego"],
                ];
            }

        }
        //   else if ($metodo == "PUT") {
                //buscar que exista el nombre empresa
        //      $nombre_desarrolladora = isset($_POST["nombre_desarrolladora"]) && !empty($_POST["nombre_desarrolladora"]) ? $_POST["nombre_desarrolladora"] : "";

        //     $datos = [
        //         "nombre_desarrolladora" => $_POST["nombre_desarrolladora"],
        //         "ciudad" => $_POST["ciudad"],
        //         "anno_fundacion" => $_POST["anno_fundacion"]
        //     ];
        // } elseif ($metodo === "DELETE") {
        //     $nombre_desarrolladora = isset($_POST["nombre_desarrolladora"]) && !empty($_POST["nombre_desarrolladora"]) ? $_POST["nombre_desarrolladora"] : "";

        //     $datos = [
        //         "nombre_desarrolladora" => $_POST["nombre_desarrolladora"],
        //         "ciudad" => $_POST["ciudad"],
        //         "anno_fundacion" => $_POST["anno_fundacion"]
        //     ];
        // }
        //controlar todo para que esten bien los datos
        $opciones = [
            "http" => [
                "header" => "Content-Type: application/jason",
                "method" => $metodo,
                "content" => json_encode($datos)
            ]
        ];

        //contexto PHP
        $contexto = stream_context_create($opciones);

        try {
            $respuesta = file_get_contents($url, false, $contexto);
            //construye una conexion HTTP usando el contexto de stream context
        } catch (Exception $e) {
            echo "Error al realizar la solicitud " . $e->getMessage();
        }

        echo htmlspecialchars_decode($respuesta) ;

    }
    ?>


</body>

</html>