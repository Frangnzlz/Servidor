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
        $apiURL ="https://pokeapi.co/api/v2/pokemon?limit=50";

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $apiURL);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($curl);
        curl_close($curl);


        $datos = json_decode($res, true);
    
        $pokemons = $datos["results"];

        foreach($pokemons as $pokemon){
            $url = $pokemon["url"];
            $curl = curl_init();

            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $res = curl_exec($curl);
            curl_close($curl);
            $datos = json_decode($res, true);


            echo "<p>" . ucfirst($pokemon["name"]) . "</p>";
            echo "<img src='{$datos["sprites"]["front_shiny"]}'>";
            echo "<a href='infoPokemon.php?name={$pokemon["name"]}'> Más información sobre {$pokemon["name"]} </a>";
            
        }
    
    
    
    ?>    

    

</body>
</html>