<?php
    // <!--<li>Contando con dos números, decir cuál es el mayor o si son iguales.</li>-->
    $a = $_POST['a'];
    $b = $_POST['b'];
    echo match (true) {
        $a < $b => "$b es el mayor de los dos",
        $a > $b => "$a es el mayor de los dos",
        default => "son iguales"
    };
    
?>