<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>form+while</title>

</head>

<body>
    <?php

use function PHPSTORM_META\type;

    ?>
    <h2>Ejercicio 1</h2>
    Pide al usuario que introduzca números enteros uno a uno y suma todos los números introducidos.
    El proceso termina cuando el usuario introduce un 0. Muestra la suma total al finalizar.<br>
    CONSEJITOS: 1) Es mas sencillo si hacéis la etiqueta php en el mismo documento del formulario. 2) Dejad este ejercicio para el final<br>
    
    IMPORTANTE: Debeis de controlar el caso de introducir un 0 en primera instancia<br>


    <?php
        $suma = 0;
        $numGuardado = "";

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $elec = $_POST["form"];
            if($elec == "1"){
                $arraySum = [];
                $numGuardado = $_POST["guard"];
                $numero = $_POST["numero"];
                echo ($numero);
                if($numero != 0){
                    $numGuardado .= "$numero,";
                }else{
                    if((int)$numero !== 0){
                        echo "No has introducido un numero";
                    }else{
                        $arraySum = explode(",", $numGuardado);
                        foreach($arraySum as $num){
                            $suma += (int)($num);
                        }


                        echo "El resultado de la suma de $numGuardado es:<br>
                            $suma";

                        $suma = 0;
                        $numGuardado = "";

                    }
                }
            }
        }
        
    
    ?>
    <form action="form+while.php" method="post">
        <input type="hidden" name="form" value="1">
        <input type="hidden" name="guard" value = "<?php echo $numGuardado?>">
        Introduce un numero  para la suma, acabara cuando introduzcas un cero
        <input type="number" name="numero" id="" required>
        <input type="submit" value="Enviar">

    </form>




    <h2>Ejercicio 2</h2>
    Crea un array de 10 números aleatorios entre 1 y 100. Usando un bucle while,
    recorre el array para encontrar y mostrar el número máximo y el número mínimo.
    
    <?php
        $array = [];
        $cont = 10;
        $max = 1;
        $min = 100;
        for($i = 0; $i < $cont ; $i++){
            array_push($array, rand(1,100));
        }


        while(($cont)>0){
            if($array[$cont-1] > $max){
               $max = $array[$cont-1]; 
            }
            if($array[$cont-1] < $min){
               $min = $array[$cont-1]; 
            }
            $cont--;
        }
        echo "El mayor es $max y el menor es $min"
    
    ?>





     <h2>Ejercicio 3</h2>
    Crea un array con 5 números aleatorios entre 1 y 50. Usando un bucle while,
    invierte el orden de los elementos del array y muestra el array invertido.
    
    <?php
        $array = [];
        $rarray = [];
        $cont = 5;

        for($i = 0; $i < $cont ; $i++){
            array_push($array, rand(1,50));
        }
        
        
        while(($cont)>0){
            array_push($rarray, $array[$cont-1]);
            $cont--;
        }
        echo "<br>";
        print_r($array);
        echo "<br>";
        print_r($rarray);
        echo "<br>";
    ?>


     <h2>Ejercicio 4</h2>
    Pide al usuario que introduzca una palabra.
    Usando un bucle while, recorre la palabra y cuenta cuántas vocales tiene. Muestra el número total de vocales al final.
    RECOMENDACIÓN: Usar "strtolower()" para pasar la palabra a minúsucula entera y "strlen()" para contar la longitud de un string
    



    <form action="form+while.php" method="post">
        <input type="hidden" name="form" value="4">
        Introduce una palabra 
        <input type="text" name="text" id="" required>
        <input type="submit" value="Enviar">

    </form>
    <?php

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $elec = $_POST["form"];
            if($elec == "4"){
                $palabra = strtolower($_POST["text"]);
                $i = 0;
                $vocales = 0;
                $consonantes = 0;
                while($i < strlen($palabra) ){
                    switch ($palabra[$i]) {
                        case ' ':break;
                        case 'a':                        
                        case 'e':                        
                        case 'i':                        
                        case 'o':                        
                        case 'u':
                            $vocales++;
                            break;                        
                        default:
                            $consonantes++;
                            break;
                    }
                    $i++;
                }
                echo "La palabra $palabra tiene $vocales vocales y $consonantes consonantes";
            }
        }
        
    
    ?>

     <h2>Ejercicio 5</h2>
    Pide al usuario que introduzca un número entero positivo.
    Usando un bucle while, calcula y muestra la suma de los dígitos de ese número.
    Por ejemplo, si el número es 123, la suma será 6 (1 + 2 + 3).
    

    <form action="form+while.php" method="post">
        <input type="hidden" name="form" value="5">
        Introduce un numero 
        <input type="number" name="numero" id="" required>
        <input type="submit" value="Enviar">

    </form>
    <?php

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $elec = $_POST["form"];
            if($elec == "5"){
                $suma = 0;
                $num = $_POST["numero"];
                $aux = $num;
                while($num > 0){
                    $suma += ($num%10);
                    $num /=10; 
                }
                echo "La suma de los digitos de $aux es $suma";
            }
        }
        
    
    ?>


     <h2>Ejercicio 6</h2>
    Crea un array vacío. Usando un bucle while, llena el array con los 10 primeros números pares (empezando desde el 2).
    Muestra el array al final. <br>
    
    <?php

        $array = [];
        $i = 1;
        while($i <= 10){
            array_push($array, $i*2);
            $i++;
        }
        print_r($array);
    ?>
     <h2>Ejercicio 7</h2>
    Pide al usuario que introduzca un número N (menor o igual a 20).
    Usando un bucle while, genera y muestra los primeros N números de la serie de Fibonacci.
    Si no sabéis qué es esta serie, buscad por internet o preguntar a Ale.
    
    
    <form action="form+while.php" method="post">
        <input type="hidden" name="form" value="7">
        Introduce un numero menor o igual 20;
        <input type="number" name="numero" id="" required>
        <input type="submit" value="Enviar">

    </form>
    <?php
        $primer = 0;
        $segun = 1;
        $actual = 0;
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $elec = $_POST["form"];
            if($elec == "7"){
                $num = $_POST["numero"];
                if($num > 20){
                    echo "No es un numero valido";
                }else{
                    $i = 0;
                    while($i < $num){
                        echo $actual ." ";
                        $primer = $segun;
                        $segun = $actual;
                        $actual = $primer + $segun;
                        $i++;
                    }    
                }
            }
        }
    ?>

    

     <h2>Ejercicio 8</h2>
    Pide al usuario que introduzca dos números enteros que representen un rango.
    Usando un bucle while, muestra todos los números dentro de ese rango que sean divisibles entre 5.
    
    <form action="form+while.php" method="post">
        <input type="hidden" name="form" value="8">
        Introduce el primer numero del rango;
        <input type="number" name="numero1" id="" required>
        <br>Introduce el segundo numero rango(Tiene que ser mayor que el primero)
        <input type="number" name="numero2" id="" required>
        <input type="submit" value="Enviar">

    </form>
    <?php

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $elec = $_POST["form"];
            if($elec == "8"){
                $num = $_POST["numero1"];
                $num2 = $_POST["numero2"];
                if($num > $num2){
                    echo "No es un rango valido";
                }else{
                    $i = 0;
                    while($num <= $num2){
                        if($num % 5  == 0){
                            echo $num ." ";
                        }   
                        $num++;
                    }    
                }
            }
        }
    ?>


     <h2>Ejercicio 9</h2>
    Pide al usuario que introduzca dos números enteros que representen un rango.
    Usando un bucle while y la función esPrimo(), suma y muestra todos los números primos que se encuentren en ese rango.
    
    <form action="form+while.php" method="post">
        <input type="hidden" name="form" value="9">
        Introduce el primer numero del rango;
        <input type="number" name="numero1" id="" required>
        <br>Introduce el segundo numero rango(Tiene que ser mayor que el primero)
        <input type="number" name="numero2" id="" required>
        <input type="submit" value="Enviar">

    </form>
    <?php

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $elec = $_POST["form"];
            if($elec == "9"){
                $num = $_POST["numero1"];
                $num2 = $_POST["numero2"];
                if($num > $num2){
                    echo "No es un rango valido";
                }else{
                    $i = 0;
                    echo "Los primos en el rango $num, $num2 son:<br>";
                    while($num <= $num2){
                        if(esPrimo($num)){
                            echo $num ." ";
                        }   
                        $num++;
                    }    
                }
            }
        }
        function esPrimo(int $num): bool{
            $i = 2;

            if($num == 1){
                return false;
            }
            while($i < $num){
                if($num % $i == 0){
                    return false;
                }
                $i++;
            }
            return true;
        }


    ?>
     <h2>Ejercicio 10</h2>
    Pide al usuario que introduzca una palabra. Usando un bucle while, verifica si la palabra es un palíndromo (se lee igual al derecho que al revés).
    Muestra un mensaje indicando si es o no un palíndromo.
    
    <form action="form+while.php" method="post">
        <input type="hidden" name="form" value="10">
        Introduce una palabra 
        <input type="text" name="text" id="" required>
        <input type="submit" value="Enviar">

    </form>
    <?php

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $elec = $_POST["form"];
            if($elec == "10"){
                $palabra = strtolower($_POST["text"]);
                if(esPalindromo($palabra)){
                    echo "La palabra '$palabra' es un palindromo";
                }else {
                    echo "La palabra '$palabra' no es un palindromo";
                }
            }
        }
        function esPalindromo(string $palabra): bool{
            $i = 0;

            while($i < (strlen($palabra))/2 ){
                if($palabra[$i] == $palabra[strlen($palabra) -1 -$i]){
                    
                }else{
                    return false;
                }

                $i++;
            }
            return true;

        }
    
    ?>


</body>

</html>