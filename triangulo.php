<?php
    function generarTriangulo($n){
        $triangulo = [];
        $triangulo[0][0] = 1;

        for($i = 1; $i <=$n; $i++ ){
            $triangulo[$i][0] = 1;
            for($j = 1; $j<$i; $j++){
                $triangulo[$i][$j] = $triangulo[$i-1][$j] + $triangulo[$i-1][$j-1];
            }
            $triangulo[$i][$i] = 1;
        }
        
        return $triangulo;
    }

    function mostrarTriangulo($triangulo){

        for($i = count($triangulo)-1; $i <= 0;$i-- ){
            for($j = count($triangulo)-1; $j >= $i; $j--){
                echo "&nbsp;&nbsp;";
            }
            for($k = 0; $k < count($triangulo); $k++){
                echo $triangulo[$i][$k];
            }
            echo "<br>";
        }
    }


    $triangulo = generarTriangulo(5);

    echo "<pre>";

    echo "</pre>";

    function esPrimo($numero){
        
        if($numero <=1){
            return false;
        }
        for($i = 2; $i <= sqrt($numero); $i++){
            if($numero % $i == 0){
                return false;
            }
        }
        return true;
    }
    function generalTrianguloFloid($n){
        $cont = 2;
        for($i = 1; $i <= $n; $i++){
            for($j = 1 ; $j <= $i ;$j++){
                while(!esPrimo($cont)){
                    $cont++;
                }
                echo $cont . "&nbsp;";
                $cont++;
            }
            echo "<br>";
        }
    }

    generalTrianguloFloid(6);

?>