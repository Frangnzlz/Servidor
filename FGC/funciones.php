<?php
    function calcularArea(string $figura,float $lado , float $radio, float $base, float $altura ): float{
        if($figura == "cuadrado"){
            return $lado * $lado;
        }else if($figura == "circurlo"){
            return M_PI * $radio * $radio;
        }else if($figura == "triangulo"){
            return ($base*$altura)/2;
        }
        return 0;
    }

?>