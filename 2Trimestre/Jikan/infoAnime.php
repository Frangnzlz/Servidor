<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        // https://api.jikan.moe/v4/anime/{id}/full
        error_reporting(E_ALL);
        ini_set("display_errors",1);
    ?>
</head>
<body>
    <?php
        $id = $_GET["id"];

        $apiURL = "https://api.jikan.moe/v4/anime/$id/full";

        $curl = curl_init();

        curl_setopt($curl,CURLOPT_URL, $apiURL);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($curl);

        curl_close($curl);
        $datos = json_decode($res, true);
        $anime = $datos["data"];
    ?>
    <h1><?= $anime['title']?></h1>
    <h2><?= $anime['title_japanese']?></h2>
    <h3>score <?=$anime['score']?></h3>
    <h3>position <?=$anime['rank']?></h3>
    <h3>year <?=$anime['year']?></h3>
    <img src="<?=$anime['images']['jpg']['image_url']?>" alt="<?=$anime['title']?>" width="200px">
    <?php
        foreach($anime['studios'] as $studios){?>
            <h4>Studios <?=$studios['name']?></h4>
            <p><?=$studios['url']?></p>
        <?php }
    ?>
    <h3>Genres</h3>
    <ul>
    <?php
        foreach($anime['genres'] as $genre){?>
            <li> <?= $genre['name']?></li>
        <?php }
    ?>
    </ul>

    <h3>Synopsis</h3>
    <p><?=$anime['synopsis']?></p>

     <h3>Trailer</h3>
     <iframe src="<?=$anime['trailer']['embed_url']?>"></iframe>

     <h3>Related</h3>
     <?php
        foreach($anime['relations'] as $relacionados){
            $relacionado = $relacionados["entry"];
            foreach($relacionado as $related){
                if($related["type"] == "anime"){
                    echo $related["name"] . '<br>';
                }
            }

        }     
     ?>

     <h3>producer</h3>

     <?php
        foreach($anime['producers'] as $productor){
            echo $productor["name"] . "<br>";
            echo $productor["type"] . "<br>";
        }
     ?>
</body>
</html>