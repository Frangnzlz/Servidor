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
        $nombre = ($_GET["name"]);
        echo "<h1>".ucfirst($nombre)."</h1>";
        $url = "https://pokeapi.co/api/v2/pokemon/$nombre/";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($curl);
        curl_close($curl);
        $datos = json_decode($res, true);

        echo "<p> Altura:". $datos["height"] ." cm</p>";
        echo "<p> Peso:". $datos["weight"] ."g</p>";
        echo "<p> ID:". $datos["id"] ."</p>";
    ?>

    <ul>
        <li><?= $datos["types"][0]["type"]["name"] ?></li>
        <?php if(isset($datos["types"][1]["type"]["name"])){?>
            <li><?=$datos["types"][1]["type"]["name"] ?></li>    
            
        <?php }?>
    </ul>
</body>
</html>