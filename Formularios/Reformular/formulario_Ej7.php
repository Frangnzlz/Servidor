<?php
    // <!--<li>Contando con dos números, mostrarlos ordenados de mayor a menor.</li>-->
    $a = $_POST['a'];
    $b = $_POST['b'];
    echo match (true) {
        $a < $b => "$b > $a",
        $a > $b => "$a > $b",
        default => "son iguales"
    };
    
?>