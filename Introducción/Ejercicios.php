<?php
    echo "<h1>Ejercicio 1</h1><br>";
    //Ejercicio 1
    /**Crea un script en PHP 
     * que muestre dos mensajes diferentes usando echo. */
    $pal = "Hey";
    $pal2 =" oi";
    echo $pal . $pal2 . "<br>";

    echo "<h1>Ejercicio 2</h1><br>";
    //Ejercicio 2
    /**
     * Declara una variable con un valor de texto,
     *  luego cámbiala por un número.
     *  Usa la función correspondiente para mostrar
     *  el tipo de la variable en ambos casos.
     */
    $var = "hola";
    echo gettype($var) . "<br>";
    $var = 2;
    echo gettype($var) . "<br>";

    printf("Este es el tipo de la variable %s", gettype($var));

    echo "<h1>Ejercicio 3</h1><br>";
    //Ejercicio 3
    /**
     * Declara dos variables de tipo entero, 
     * suma ambas y muestra el resultado en pantalla, 
     * el resultado debe tener el siguiente formato: 
     * "La suma de (primer numero) y (segundo numero) es: (resultado).
     */
    $num1 = 2;
    $num2 = 3;

    echo "La suma de $num1 y $num2 es: " . $num1+$num2;


    echo "<h1>Ejercicio 4</h1><br>";
    //Ejercicio 4
    /**
     * Declara una variable de tipo float, realiza una operación de suma con un número entero, 
     * muestra el resultado y qué tipo de variable es el resultado de la suma.
     */
    $int = 2;
    $float = 2.5;
    $resutl = $int + $float;
    echo gettype($resutl);

    echo "<h1>Ejercicio 5</h1><br>";
    //Ejercicio 5
    /**
     * Crea una variable booleana con el valor true y otra con false.
     * Muestra el valor de cada una y muestra el tipo de dato. Una vez hecho,
     * modifica la variable false para que no muestre un espacio en blanco
     * pero la variable siga valiendo false.
     */
    $boolT = true;
    $boolF = false;
    echo "$boolT  " . gettype($boolT) . "<br>";
    echo "$boolF  " . gettype($boolF) . "<br>";

    $boolF = 0;

    echo "$boolF  " . gettype((bool)$boolF) . "<br>";

    echo "<h1>Ejercicio 6</h1><br>";
    //Ejercicio 6
    /**
     * Define una constante y muestra su valor usando echo.´
     */
    const CONSTANTE = "Constante";
    echo CONSTANTE;

    echo "<h1>Ejercicio 7</h1><br>";
    //Ejercicio 7
    /**
     * Crea un array con tres valroes de tipo string, int y boolean. 
     * A continuación mostrar cada valor de manera individual, 
     * el tipo de dato que es y por último mostrar el tipo de la lista al completo.
     */
    $array = ["String" , 5 , true];
    echo $array[0]. " " . gettype($array[0])  . "<br>";
    echo $array[1]. " " . gettype($array[1])  . "<br>";
    echo $array[2]. " " . gettype($array[2])  . "<br>"; 
    echo gettype($array);

    echo "<h1>Ejercicio 8</h1><br>";
    //Ejercicio 8
    /**
     * Crea un array vacío y luego añade tres valores utilizando la función correspondiente,
     * muestra el array COMPLETO, no cada valor de manera individual
     */
    $array2 = [];
    array_push($array2, 1, 2, 3);
    print_r($array2);


    echo "<h1>Ejercicio 9</h1><br>";
    //Ejercicio 9
    /**
     * Crea un array asociativo con tres claves: "nombre", "edad" y "pais". 
     * A continuación muestra los valores haciendo uso de las claves.
     */
    $hash = ["nombre" => "Pepe", "edad" => 25, "pais" => "España"];
    echo $hash["nombre"]   . "<br>";
    echo $hash["edad"]   . "<br>";
    echo $hash["pais"]   . "<br>"; 

    echo "<h1>Ejercicio 10</h1><br>";
    //Ejercicio 10
    /**
     * Crea un array con valores duplicados, 
     * usa la función correspondiente para eliminar los duplicados 
     * y así conseguir un "set". Muestra el set resultante.
     */
    $array3 = [1, 0, 4, 0, 3, 1, 4, 3];
    print_r($array3);
    echo "<br>";
    $array3 = array_unique($array3);
    print_r($array3);
    echo "<br>";

?>