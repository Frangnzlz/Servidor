<?php
    /**
     * preg_match comuprueba si una cadena coincide con un patrón definido por una expresión regular
     * /"patron"/: es el patron de la expresión regular
     * $var: variable que estamos evaluando
     * PATRONES COMUNES:
     * \d: digito (0-9)
     * \s: espacio en blanco
     * \w: caracter alfanumerico
     * +: Uno o más
     * *: cero o más
     * ^: comienza con
     * $: termina con
     */

     $cadena = "abc123";

     if(preg_match("/\d+/", $cadena)){
        echo " la cadena contiene numeros";
     }

     $telf = "669234199";
     if()
?>