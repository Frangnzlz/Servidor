<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <ul>
        <h2>Ejerccicio 1</h2>
        <li> Crea un script que utilice una variable con un número del 1 al 7 generado de forma aleatoria para representar los días de la semana (1 para el lunes, 2 para el martes..)</li>


        <?php
        $var = rand(1, 7);
        switch ($var) {
            case 1:
                echo "lunes<br>";
                break;
            case 2:
                echo "martes<br>";
                break;
            case 3:
                echo "miercoles<br>";
                break;
            case 4:
                echo "jueves<br>";
                break;
            case 5:
                echo "viernes<br>";
                break;
            case 6:
                echo "sabado<br>";
                break;
            case 7:
                echo "domingo<br>";
                break;
        }


        ?>
        <h2>Ejerccicio 2</h2>

        <li> Crea un script donde una variable contenga una calificación de un examen generada de forma aleatoria. Mostrar un "Sobresaliente" si la nota es 10; si es 8 o 9, "Notable"; si es 6 o 7, "Bien"; si es 5, "Aprobao"; si es menor a 5, "Suspenso"</li>

        <?php
        $var = rand(1, 10);
        echo match (true) {
            $var == 10 => "Sobresaliente<br>",
            $var >= 8 => "Notable<br>",
            $var >= 6 => "Bien<br>",
            $var == 5 => "Suficiente<br>",
            $var < 5 => "Suspenso<br>"
        };
        ?>
        <h2>Ejerccicio 3</h2>

        <li> Crea un script donde se elija una operación matemática básica (suma, resta, multiplicación o división). Realiza la opción matemática indicada a través de una variable.
            NOTA: Debe de haber una variable para elegir la operación matemática y dos variables numéricas para saber con qué dos números vamos a trabajar</li>

        <?php
        $signo = "/";
        $num1 = 10;
        $num2 = 0;

        switch ($signo) {
            case "+":
                echo $num1 + $num2 . "<br>";
                break;
            case "-":
                echo $num1 - $num2 . "<br>";
                break;
            case "*":
                echo $num1 * $num2 . "<br>";
                break;
            case "/":
                echo $num2 != 0 ? $num1 / $num2 . "<br>" : "No se puede dividir por cero<br>";
                break;
        }

        ?>
        <h2>Ejerccicio 4</h2>

        <li> Crea un script donde una variable contenga un número del 1 al 7 (puedes usar rand para que este numero se genere aleatoriamente) que represente un día de la semana (1 para lunes, 2 para martes, etc.). Usa match para devolver el nombre del día correspondiente.</li>

        <?php

        $var = rand(1, 7);
        echo match ($var) {
            1 => "lunes",
            2 => "martes",
            3 => "miercoles",
            4 => "jueves",
            5 => "viernes",
            6 => "Sabado",
            7 => "Domingo"
        };
        ?>

        <h2>Ejerccicio 5</h2>

        <li> Crea un script donde una variable contenga el número del mes (del 1 al 12). Usa match para determinar la estación del año correspondiente según el mes y muestra el resultado. Las estaciones son:

            Invierno: Diciembre (12), Enero (1), Febrero (2)
            Primavera: Marzo (3), Abril (4), Mayo (5)
            Verano: Junio (6), Julio (7), Agosto (8)
            Otoño: Septiembre (9), Octubre (10), Noviembre (11)</li>

        <?php

        $var = rand(1, 12);
        echo match ($var) {
            1, 2, 12 => "Invierno",
            3, 4, 5 => "Primavera",
            6, 7, 8 => "Verano",
            9, 10, 11 => "Otoño",
        };
        ?>

        <h2>Ejerccicio 6</h2>

        <li> Crea un script que realice una operación matemática básica (suma, resta, multiplicación o división) entre dos números. Usa match para determinar qué operación realizar según la variable que indique el tipo de operación</li>

        <?php
        $signo = "/";
        $num1 = 10;
        $num2 = 0;
        echo match (true) {
            $signo == "+" => $num1 + $num2 . "<br>",
            $signo == "-" => $num1 - $num2 . "<br>",
            $signo == "/" => $num2 != 0 ? $num1 / $num2 . "<br>" : "No se puede dividir por cero<br>",
            $signo == "*" => $num1 * $num2 . "<br>",
        };

        ?>

    </ul>
</body>

</html>