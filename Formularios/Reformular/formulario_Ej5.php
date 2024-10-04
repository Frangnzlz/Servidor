<?php
    $a = $_POST['a'];
    echo ($a < 0 ? "El numero es negativo" :( $a > 0 ? "El numero es positivo" : "El numero es 0"));
?>