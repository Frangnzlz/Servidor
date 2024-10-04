<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $a = $_POST['a'];
        $b = $_POST['b'];
        $c = $_POST['c'];
        $real = (($b*$b) - 4*$a*$c);
        if( $real < 0){
            echo "No tiene solución real<br>";
        }else{
            echo (-$b + $real)/(2*$a) . " es la respuesta en los positivos<br>";
            echo (-$b - $real)/(2*$a) . " es la respuesta en los negativos<br>"; 
        }
    }
    


    

?>