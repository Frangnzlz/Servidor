<?php
    $variable = rand(1,4);
    //igual que en java
    switch ($variable) {
        case 1:

            echo "uno<br>";
            break;
        case 2:

            echo "dos<br>";
            break;
        case 3:

            echo "tres<br>";
            break;        
        default:
            echo "Otro numero<br>";
            break;
    }
    $dia = rand(1,7);
    //Sirve para asignar un valor a una variable
    $nombreDia = match ($dia) {
        1 => "Lunes<br>",
        2 => "Martes<br>" , 
        3 => "Miercoles<br>",
        4 => "Jueves<br>",
        5 => "Viernes<br>",
        default => "Finde<br>"
    };
    echo $nombreDia;
    $bool = rand(1,2);
    echo $bool==1 ? "verdadero" : "falso";

?>