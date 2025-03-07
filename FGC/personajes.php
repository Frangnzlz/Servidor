<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personajes</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
        $apiURL = "https://api.attackontitanapi.com/characters";
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $apiURL);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($curl);
        curl_close($curl);
        $datos = json_decode($res, true);

        
        $datos = $datos["results"];
        ?>
</head>
<body>
    <ul>
        <?php
            for($i = 0; $i < count($datos); $i++){?>
            <li><?= $datos[$i]["id"] ?></li>
            <li><?= $datos[$i]["name"] ?></li>
            <li>
                <ul>
                    <?php
                        foreach($datos[$i]["species"] as $valor => $especie){?>
                                <li><?= $especie ?></li>
                        <?php }
                    ?>
                </ul>
            </li>
            <li><?= $datos[$i]["age"] ?></li>
            <li><?= $datos[$i]["gender"] ?></li>
            <li><?= $datos[$i]["height"] ?></li>
            <li><?= $datos[$i]["residence"] ?></li>
            <li>
                <?php
                    if(isset($datos[$i]["img"])){
                        ?>
                        <ul>
                            <li>
                            <img src="<?= $datos[$i]["img"] ?>" alt="">
                            </li>
                            <li>
                                <a href="<?= $datos[$i]["img"]?>">Enlace imagen</a>
                            </li>
                        </ul>
                        <?php
                    }else{
                        echo "No tiene foto asociada";
                    }                
                ?>
            </li>
            <li>
                <ul>
                    <?php
                        if(count($datos[$i]["roles"]) == 0){
                            echo "<li><h3>No tiene roles asignados</h3></li>";
                        }else{
                            foreach($datos[$i]["roles"] as $valor => $roles){?>
                                <li><?= $roles ?></li>
                        <?php }
                        }
                    ?>
                </ul>
            </li>

            
            <?php };
        
        ?>
    </ul>
</body>
</html>