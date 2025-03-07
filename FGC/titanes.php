<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Titanes</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
        $apiURL = "https://api.attackontitanapi.com/titans";
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
            <li><?= $datos[$i]["name"] ?></li>
            <li><?= $datos[$i]["height"] ?></li>
            <li>
                <ul>
                <?php
                foreach($datos[$i]["abilities"] as $campo => $habilidad){?>
                    <li><?= $habilidad?></li>
                <?php }
                ?>
                </ul>
            </li>
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
                    <li>
                        Actual
                        <a href="<?= $datos[$i]["current_inheritor"]?>"><?= $datos[$i]["current_inheritor"]?></a>
                    </li>
            </li>
            <li>
                Anteriores
                <ul>
                
                    <?php
                        foreach($datos[$i]["former_inheritors"] as $campo => $anterior ){?>
                            <li>
                                <a href="<?= $anterior?>"><?= $anterior?></a>
                            </li>
                        <?php }
                    
                    ?>
                </ul>
            </li>
            <br><br><br>
            <?php };
        
        ?>
    </ul>
</body>
</html>