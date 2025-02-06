<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</head>
<body>
    <?php
        $apiURL = "https://api.jikan.moe/v4/top/anime"; //URL a la que realizaremos http

        $curl = curl_init(); //Iniciar sesion cURL, porque cURL requiere de una estructura en memoria para almacenar la info de la solicitud y la respuesta

        curl_setopt($curl, CURLOPT_URL, $apiURL);//Establece la URL a consultar
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);//Devolver el resultado en lugar de imprimirlo en pantalla 

        $res = curl_exec($curl); //Ejecutar la sesión
        curl_close($curl);
        var_dump($res);//mostrarlo primero para ver el formatin de json

        json_decode($res, true) //
    ?>
    <table>
        <thead>
            <tr>
                <td>posicion</td>
                <td>titulo</td>
                <td>Nota</td>
                <td>Imagen</td>
            </tr>
        </thead>
    </table>
</body>
</html>