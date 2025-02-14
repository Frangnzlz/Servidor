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
        // var_dump($res);//mostrarlo primero para ver el formatin de json

        $res = json_decode($res, true); //
        // echo "<pre>";
        // var_dump($res);
        // echo "</pre>";
        $animes = $res["data"];

    ?>
    <table border="1" style="border-collapse:collapse">
        <thead>
            <tr>
                <td>posicion</td>
                <td>titulo</td>
                <td>Nota</td>
                <td>Imagen</td>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($animes as $anime){?>
                    <tr>
                        <td><?= $anime['rank']?></td>
                        <td>
                            <a href="infoAnime.php?id=<?=$anime['mal_id']?>">
                                <?= $anime['title']?>
                            </a>
                        </td>
                        <td><?= $anime['score']?></td>
                        <td>
                            <img src="<?= $anime['images']['jpg']['image_url']?>" alt="Imagen anime" width="100px" >
                        </td>
                    </tr>
                <?php }?>
        </tbody>

    </table>
</body>
</html>