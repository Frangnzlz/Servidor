<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container m-4">
        <h1>Testiiiing </h1>
        <form action="" method="post">
            <div class="mb-3">
                <label for="" class="form-label">Selecciona el método</label>
                <select name="metodo" id="" class="form-select">
                <option value="GET">GET(RECUPERAR DATOS)</option>
                <option value="POST">POST(INSERTAR DATOS)</option>
                </select>
            </div>
            <div class="mb-3" id="datosPost">
            <label for="" class="form-label">DATOS PARA POST:</label>
            <input type="text" name="nombre_desarrolladora" class="form-control" placeholder="Nombre:" id="">
            <input type="text" name="ciudad" class="form-control" placeholder="Ciudad:" id="">
            <input type="number" name="anno_fundacion" class="form-control" placeholder="Año:" id="">
            </div>
            <button type="submit" class="btn btn-primary">INSERTAR DATITO</button>
        </form>
    </div>

    <?php
        error_reporting(E_ALL);
        ini_set("display_errors",1);     
        $datos = "";
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            require "nucleo_api.php";
            require "conexion_pdo.php";
        $metodo=$_POST["metodo"];
        $url="http://localhost/API/prueba_API.php";
        if($metodo=="GET"){
            $ciudad=isset($_POST["ciudad"])&&!empty($_POST["ciudad"])? "?ciudad=".urlencode($_POST["ciudad"]):"";
            header($url . $ciudad);
            controlGet($_conexion);

        }
        elseif ($metodo == "POST"){
            echo "<h3>Hemos lanzado un post</h3>";
            $datos = [
                "nombre_desarrolladora" => $_POST["nombre_desarrolladora"],
                "ciudad" => $_POST["ciudad"],
                "anno_fundacion" => $_POST["anno_fundacion"]
            ];

        }
        // $opciones = [
        //     "http" =>[
        //         "header" => "Content-type : application/json",
        //         "method" => "POST",
        //         "content" => json_encode($datos)
        //         ]
        //     ];
        // $contexto = stream_context_create($opciones);

        // try{
        //     $respuesta = file_get_contents($url, false, $contexto);
        //     /**
        //      * Construye una conexión http usando el contexto creado por stream_context_create()
        //      * y envia la solicitud POST al server con los datos, devuelve la respuesta del server
        //      * si todo va bien o lanza un fallo en caso de que algo vaya mal. El false es del
        //      * atributo $use_include_path. si lo ponemos a false PHP no buscará el archivo en las rutas
        //      * especificadas en el include-path
        //      */
        // }catch(Exception $e){
        //     echo "error al realizar la solicitud" . $e->getMessage();
        // }
        // echo "<pre>" . htmlspecialchars($respuesta) . "</pre>";
    
    }
    ?>
</body>
</html>

