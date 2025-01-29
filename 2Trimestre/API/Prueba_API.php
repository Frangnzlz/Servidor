<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $metodo = $_POST["metodo"];
        if($metodo == "POST"){
            echo "<h3>Hemos lanzado un post</h3>";
            $datos = [
                "nombre_desarrolladora" => $_POST["nombre_desarrolladora"],
                "ciudad" => $_POST["ciudad"],
                "anno_fundacion" => $_POST["anno_fundacion"]
            ];

        }
        $opciones = [
            "http" =>[
                "header" => "Content-type : application/json",
                "method" => "POST",
                "content" => json_encode($datos)
                ]
            ];
        $contexto = stream_context_create($opciones);

        try{
            $respuesta = file_get_contents($url, false, $contexto);
            /**
             * Construye una conexión http usando el contexto creado por stream_context_create()
             * y envia la solicitud POST al server con los datos, devuelve la respuesta del server
             * si todo va bien o lanza un fallo en caso de que algo vaya mal. El false es del
             * atributo $use_include_path. si lo ponemos a false PHP no buscará el archivo en las rutas
             * especificadas en el include-path
             */
        }catch(Exception $e){
            echo "error al realizar la solicitud" . $e->getMessage();
        }
        echo "<pre>" . htmlspecialchars($respuesta) . "</pre>";
    }



?>






