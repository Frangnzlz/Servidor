<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="number" name="pisos" min="1">
        <input type="submit" value="K">
    </form>    



    <?php


        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $triangulo = [[]];
            $pisos = $_POST["pisos"];
            for($i = 0; $i < $pisos; $i++){
                for($j = 0; $j <= $i; $j++){
                    if($j == 0 || $j == $i){
                        $triangulo[$i][$j] = 1;
                    }else{
                        $triangulo[$i][$j] = $triangulo[$i-1][$j] + $triangulo[$i-1][$j-1];
                    }
                }
            }
            echo "<pre>";
            print_r($triangulo);
            echo "<pre>";

        }
    
    
    ?>



</body>
</html>