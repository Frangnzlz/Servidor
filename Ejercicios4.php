<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>

<body>
    <ol start="1">
        <li>Usar un número entero y positivo y di si el número introducido es primo o no</li>

        <?php
            $num = rand(2, 500);
            // $num = 3;

            if (esPrimo($num)) {
                echo "$num es un numero primo <br>";
            } else {
                echo "$num no es un numero primo <br>";
            }




            function esPrimo(int $comp)
            {
                if ($comp <= 1) {
                    return false;
                }
                $i = 2;

                while ($i <= $comp / 2) {
                    if ($comp % $i == 0) {
                        return false;
                    }
                    $i++;
                }
                // for ($i = 2; $i <= $comp / 2; $i++) {
                //     if ($comp % $i == 0) {
                //         return false;
                //     }
                // }
                return true;
            }
        ?>


        <li>Buscar primos hermanos</li>
        <?php
            $i = 2;
            $primHerm = 0;

            while ($i <= 500) {
                $primHerm = 0;

                if (esPrimo($i)) {
                    $primHerm = match (true) {
                        esPrimo($i + 1) => $i + 1,
                        esPrimo($i + 2) => $i + 2,
                        default => 0
                    };

                    if ($primHerm != 0) {
                        echo "$i y $primHerm son primos hermanos <br>";
                    }
                }

                $i++;
            }

        ?>


        <li>Dado un número N random, mostrar dicho número por pantalla y todos los números del 1 al N</li>
        <?php
            $num = rand(1, 10);
            $i = 1;

            echo $num . "<br>";

            while ($i <= $num) {
                echo "$i <br>";

                $i++;
            }


        ?>


        <li>Escribir todos los números del 100 al 0 de 7 en 7 dentro de una tabla, en la cabecera aparecerá "Numeros" y en la última fila aparecerá el número de iteraciones que ha hecho el bucle while</li>
        <?php
            $i = 100;
            $count = 0;
            echo "<table border='1'>
                    <caption>Numeros</caption>";
            while ($i >= 0) {
                echo "<tr> 
                            <td>$i </td>
                            </tr>";

                $i -= 7;
                $count++;
            }
            echo "<tr> <td>$count</td></td> </tr></table>";

        ?>


        <li>Mostrar el producto de los 10 primeros números impares</li>
        <?php

            $i = 1;
            $total = 1;
            $cant = 10;
            while ($i <= $cant*2) {
                $total *= $i;

                $i += 2;
            }
            echo $total . "<br>";
        ?>


        <li>Dado un número entero random,muestra el número y calcula su factorial usando un bucle while o do-while</li>
        <?php
            $num = rand(2, 10);
            $total = 1;

            echo "$num <br>";
            while ($num > 0) {
                $total *= $num;
                $num--;
            }
            echo "$total <br>";

        ?>
        <li>Dado un número random (que debe estar entre 0 y 10), mostrar el número por pantalla y la tabla de multiplicar de dicho número</li>

        <?php
            $num = rand(0, 10);
            $i = 1;
            echo $num;
            while ($i <= 10) {
                echo "<br>$i * $num = " . $i * $num;
                $i++;
        }
        ?>
        <li>Crear 5 números random, mostrarlos por pantalla e indicar si alguno es múltiplo de 3</li>
        <?php
            $num1 = rand(1, 100);
            $num2 = rand(1, 100);
            $num3 = rand(1, 100);
            $num4 = rand(1, 100);
            $num5 = rand(1, 100);

            echo $num1 . ($num1 % 3 == 0 ? " Es multiplo de 3 <br>" : " No es multiplo de 3 <br>");
            echo $num2 . ($num2 % 3 == 0 ? " Es multiplo de 3 <br>" : " No es multiplo de 3 <br>");
            echo $num3 . ($num3 % 3 == 0 ? " Es multiplo de 3 <br>" : " No es multiplo de 3 <br>");
            echo $num4 . ($num4 % 3 == 0 ? " Es multiplo de 3 <br>" : " No es multiplo de 3 <br>");
            echo $num5 . ($num5 % 3 == 0 ? " Es multiplo de 3 <br>" : " No es multiplo de 3 <br>");
        ?>

        <li>Pedir los coeficientes de una ecuación de 2º grado, y muestre sus soluciones reales. Si no existen, debe indicarlo.</li>
        <?php
            $a = rand(1,10);
            $b = rand(1,10);
            $c = rand(1,10);
            $real = (($b*$b) - 4*$a*$c);
            if( $real < 0){
                echo "No tiene solución real<br>";
            }else{
                echo (-$b + $real)/(2*$a) . " es la respuesta en los positivos<br>";
                echo (-$b - $real)/(2*$a) . " es la respuesta en los negativos<br>"; 

            }

        ?>
        <li>Con el radio de un círculo, calcular su área. A=PI*r2.</li>
        <?php
            $radio = rand(1,10);
            $area = M_PI * pow($radio, 2);

            echo "El area de un circulo de radio $radio es $area"
        ?>
        <li>Con el radio de una circunferencia, calcular su longitud.</li>
        <?php 
            $circunferencia = M_PI * 2 * $radio;

            echo "la circunferencia de un circulo de radio $radio es $circunferencia";
        ?>

        <li>Crear dos variables con dos números y decir si son iguales o no.</li>
        <?php
            echo ($a === $b ? "los numeros son iguales" :  "los numeros no son iguales");
        ?>
        <li>Crear una variable con un número e indicar si es positivo o negativo.</li>
        <?php
            $a = rand(-10, 10);
            // $a = 0;
            echo ($a < 0 ? "El numero es negativo" :( $a > 0 ? "El numero es positivo" : "El numero es 0"));
        ?>
    </ol>
</body>

</html>