<?php
     define("GENERAL", 1.21);
     define("REDUCIDO", 1.1);
     define("SUPERREDUCIDO", 1.04);

    function calcularDescuento(float $precio, int $descuento) : float{
        $precio -= ($precio *$descuento/100);
    
        return $precio;
    }

    function calcularIVA(float $precio, string $iva) : float{
       
        return match ($iva) {
             "general"=> $precio * GENERAL,
             "reducido" =>  $precio * REDUCIDO,
             "superreducido" => $precio * SUPERREDUCIDO
        };   
    }
?>