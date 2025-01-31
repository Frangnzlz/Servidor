<?php $usuario = "Fran"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Vamos a salir a las 9:35 A.M</h1>
    <?php 
        echo "<br> $usuario";
    ?>
    <h1> Fundamentos array</h1>
    <?php 
        $mi_array=[1,3,5,7,9];
        print_r($mi_array);
        echo "<br>";
        $mi_array[5] = 11;
        print_r($mi_array);
        echo "<br>";
        $mi_array[7] = 15;
        print_r($mi_array);
        echo "<br>" . sizeof($mi_array). "<br>";//$mi_array[6]

        //Funciones de arrays y diccionarios
        ksort($mi_array); //Ordena de menor a mayor por las claves numericas
        print_r($mi_array);
        echo "<br>";
        asort($mi_array);//Ordena los valores del array manteniendo la asociación
        print_r($mi_array);
        echo "<br>";
        krsort($mi_array);//Ordena las claves de mayor a menor
        print_r($mi_array);
        echo "<br>";
        arsort($mi_array); //Ordena los valores de mayor a menor manteniendo la asociación
        print_r($mi_array);
        echo "<br>";
        echo "<br>" . count($mi_array). "<br>";//$mi_array[6]


    ?>

    <h2>Funciones utiles para arrays</h2>
    <?php
        $pares = [2,4,6,8,10];
        print_r($pares);
        //count() es la funcion para contar
        echo "<br>" . count($pares) . " es el numero de elementos del array de pares<br>";
        $primerValor = reset($pares); // Devuelve el primer valor del array y resetea el iterador interno
        echo "$primerValor<br>";
        $ultima_clave = count($pares)-1;

        echo $pares[$ultima_clave] . " este es el ultimo valor <br>";
    ?> 

    <h2>Mas funciones</h2>

    <?php
        $rellenar = [];

        for($i = 20 ; $i >= 10; $i--){
            array_push($rellenar, $i);
        }
        print_r($rellenar);
        echo "<br>";

        array_pop($rellenar); //Elimina el ultimo valor del array
        print_r($rellenar);
        echo "<br>";

        array_unshift($rellenar, 10); //Añade un valor al inicio del valor
        print_r($rellenar);
        echo "<br>";

        array_shift($rellenar); //Elimina el valor del inicio del array y resetea el iterador interno
        print_r($rellenar);
        echo "<br>";
        
        $arrayCompleto = array_merge($mi_array, $pares);
        print_r($arrayCompleto);
        echo "<br>";
        asort($arrayCompleto);
        print_r($arrayCompleto);
        echo "<br>";

        unset($arrayCompleto[3]);//Borrar una clave en especifico con su valor en especifico
        print_r($arrayCompleto);
        echo "<br>";
    ?>

</body>
</html>