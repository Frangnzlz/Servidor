<?php
    //Comentario una linea
    /**Comentario
    * Varias lineas
    */

    //echo "Esto es un comentario string <br>";
    //echo 3;
    $cadena  = "Hola me encanta php";
    echo $cadena . "<br>";
    echo gettype($cadena) . "<br>";

    $cadena = 11;
    echo gettype($cadena) . "<br>";

    $numero1 = 1;
    $numero2 = 1.1;
    echo gettype($numero2) . "<br>";
    $numero3 = $numero1 + $numero2;
    echo gettype($numero3) . "<br>";
    echo $numero3 -0.5 . "<br>";
    
    $booleano = 0;
    $cadena2 = "PHP";

    echo "Estamos aprendiendo $cadena2 y el  booleano es $booleano" . "<br>";

    //Constantes
    const MI_CONSTANTE = "El valor  de la constante es esta";
    echo MI_CONSTANTE . "<br>";

    //Lista
    $numero = 25;
    $cadena ="Hola";
    $bool = true;
    $mi_array = [$numero1, $cadena, $bool];
    echo gettype($mi_array). "<br>";
    
    array_push($mi_array,"jeje", 25, 0, "adios");
    echo $mi_array[3]. "<br>";

    print_r($mi_array);
    echo "<br>";

    $mi_dict = array("string" => $cadena, "int" => $numero, "bool" => $bool);
    print_r($mi_dict);
    echo "<br>";

    echo $mi_dict["string"] . "<br>";
    echo $mi_dict["int"] . "<br>";
    echo $mi_dict["bool"] . "<br>";

    $mi_dict["apellido"]= "Rodriguez";
    $mi_dict["string"] = "Rodriguez";
    print_r($mi_dict);
    echo "<br>";

    //SET
    array_push($mi_array, "medac");
    array_push($mi_array, "medac");
    print_r($mi_array);
    echo "<br>";
    print_r(array_unique($mi_array));
    echo "<br>";
    $mi_array = array_unique($mi_array);
    print_r($mi_array);
    echo "<br>";



    
?>