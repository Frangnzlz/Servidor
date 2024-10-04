<?php
// <!--<li>Contando con dos números, decir si uno es múltiplo del otro o no lo es.</li>-->

    $a = $_POST['a'];
    $b = $_POST['b'];
    echo $a % $b === 0 ? "$a es multiplo de $b" : "$a no es multiplo de $b"; 
?>