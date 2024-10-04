<?php
    // <!--<li>Contando con tres números, mostrarlos ordenados de mayor a menor.</li> -->
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    
    // echo match (true) {
    //     $a < $b => match (true) {
    //             $b < $c=> "$c > $b < $a", 
    //             $c < $b=> match (true) {
    //                         $c < $a => "$b < $a < $c",
    //                         $c > $a=>"$b < $c < $a" ,
    //                         default => "$b < $c = $a"
    //                         },
    //             default => "$c = $b < $a"
    //             },

    //     $a > $b => "$a es el mayor de los dos",
    //     default => "son iguales"
    // };
    
    $array = [$a, $b, $c];
    arsort($array);
    foreach ($array as $i) {
        echo "$i ";
    }

?>