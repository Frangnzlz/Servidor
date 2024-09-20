<html>
    <head>
        <title>
            PHP Ejercicios
        </title>
    </head>
    <body>
        <h1>Bienvenidos al maravilloso mundo de los ejercicios de PHP</h1>

        <ol>
            <li> Crea un array con cinco números. Utiliza un bucle para sumar todos los elementos del array y muestra el resultado de la suma</li>

            <li> Crea un array de números del 1 al 5. Pide al usuario que introduzca un número (cread una variable $num_usuario) y comprueba si el numero esta en el array. Mostrar un mensaje según el resultado</li>
            <li> Crea un array con números del 1 al 10, recorre el array y muestra sólo los impares</li>
            <li> Crea un array de números desordenados y utiliza la función correspondiente para ordenarlos de forma ascendente. Muestra el array antes y después de ordenarlo</li>
            <li> Crea un array con varios elementos y usa la función correspondiente para contar cuántos elementos tiene el array, muestra el resultado</li>
            <li> Crea un array asociativo que contenga la información de una persona (nombre, apellido1 y edad). Muestra los valores USANDO LAS CLAVES</li>
            <li> Crear un array de números desordenados, recorrer el array para encontrar el número más grande y el más pequeño, mostrarlos por pantalla</li>
            <li> Crear un array vacío, llenarlo gracias a un bucle con números del 1 al 10, mostrar el array completo y a continuación crearme otro array con el orden de los valores invertidos, es decir, si el 1 estaba en la posicion 0 del array, ahora que este en la 9</li>
            <li> Crear un array con los nombres de 10 videojuegos (si no se te ocurre pregunta al de al lado), usa un bucle para mostrar cada juego en una línea diferente</li>
            <li> Crea dos arrays, uno con numeros pares y otro con impares, usa la función correspondiente para combinar ambos arrays y después otra función para ordenarlos</li>
        </ol>

        <h2>Nota!!</h2>
        Hacedme el favor de separar cada ejercicio con etiquetas html, quiero una página ordenada y legible, en clase hemos visto cómo se hacía.


        <h2>Ejercicio 1</h2>
        <?php
                $array = [1,2,3,4,5];
                $result = 0;
                for($i = count($array) - 1; $i >= 0 ; $i--){
                    $result += $array[$i];
                }

                echo "$result <br>";
        ?>

        <h2>Ejercicio 2</h2>
        <?php
            $num_usuario = 2;
            if(in_array($num_usuario, $array)){
                echo "El numero se encuentra en el array <br>";
            }else {
                echo "El numero no se encuentra en el array <br>";
            }

        ?>

        <h2>Ejercicio 3</h2>
        <?php
            $array = [1,2,3,4,5,6,7,8,9,10];

            for($i = 0; $i <= count($array) - 1 ; $i++){
                if($array[$i] % 2 != 0){
                    echo "$array[$i] ";
                }
            }
        ?>

        <h2>Ejercicio 4</h2>
        <?php
            $array = [1,22,3,5,66,5,56,5,8,81,3,5,8,8,4,42,21,9,95];
            print_r($array);
            echo "<br>";
            asort($array);
            print_r($array);
            echo "<br>";

        ?>

        <h2>Ejercicio 5</h2>
        <?php
            echo count($array);
        ?>

        <h2>Ejercicio 6</h2>
        <?php
            $array = ["nombre" => "Fran", "apellido1" => "Gonzalez", "edad" => 23 ];
            
            echo "$array[nombre], $array[apellido1], $array[edad]";
        ?>
        <h2>Ejercicio 7</h2>
        <?php
            $array =[5,1,158,8,2,6,4,1,335];
            $max = 0;
            $min = 1000000;

            for($i = 0; $i <= count($array) - 1 ; $i++){
                if($array[$i] < $min){
                    $min = $array[$i];
                }
                if($array[$i] > $max){
                    $max = $array[$i];
                }
            }

            echo "el minimo es $min y el maximo es $max";
        ?>
        <h2>Ejercicio 8</h2>
        <?php
            $array = [];
            for ($i=1; $i <= 10; $i++) { 
                array_push($array, $i);
            }
            print_r($array);
            echo "<br>";
            arsort($array);
            $array_r = [];
            for($i = count($array)-1; $i >=0; $i--){
                array_push($array_r, $array[$i]);
            }

            print_r($array_r);
            echo "<br>";
        ?>
        <h2>Ejercicio 9</h2>
        <?php
            for ($i=0; $i < count($array) ; $i++) { 
                echo "$array[$i] <br>";
            }
        ?>
        <h2>Ejercicio 10</h2>
        <?php
            $pares = [2,4,6,8,10];
            $impares = [1,3,5,7,9];
            $array = array_merge($impares,$pares);
            asort($array);
            print_r($array);

        ?>
        
    </body>
</html>