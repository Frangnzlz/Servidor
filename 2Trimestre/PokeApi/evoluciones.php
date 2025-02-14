<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    <?php
        $apiURL = "https://pokeapi.co/api/v2/evolution-chain?limit=50";
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $apiURL);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($curl);
        curl_close($curl);


        $datos = json_decode($res, true);
    
        foreach($datos["results"] as $evolucion){
            $url = $evolucion["url"];
            $curl = curl_init();

            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $res = curl_exec($curl);
            curl_close($curl);

            $datosEvolucion = json_decode($res, true);

            echo "<h1>Evoluciones</h1>";
            echo "<p>Primera Evolucion: ". $datosEvolucion["chain"]["species"]["name"]."</p>";
            if(isset($datosEvolucion["chain"]["evolves_to"][0]["species"]["name"])){
                echo "<p>Segunda Evolucion: " . $datosEvolucion["chain"]["evolves_to"][0]["species"]["name"] . "</p>";
            }
            if(isset($datosEvolucion["chain"]["evolves_to"][0]["evolves_to"][0]["species"]["name"])){
                echo "<p>Tercera Evolucion: " . $datosEvolucion["chain"]["evolves_to"][0]["evolves_to"][0]["species"]["name"] . "</p>";
            }
            
            echo "<hr><hr>";

        }
        
    ?>
</body>
</html>