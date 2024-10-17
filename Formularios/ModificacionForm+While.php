<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
 <h2>Ejercicio 3</h2>
    Crea un array con 5 números aleatorios entre 1 y 50. Usando un bucle while,
    invierte el orden de los elementos del array y muestra el array invertido.
    
    <?php
        $array = [];
        $rarray = [];
        $cont = 5;

        for($i = 0; $i < $cont ; $i++){
            $array[$i] = rand(1,50);
        }
        
        $aux = $cont;
        while($cont>0){
            $rarray[$aux - $cont] = $array[$cont-1];
            $cont--;
        }
        echo "<br>";
        print_r($array);
        echo "<br>";
        print_r($rarray);
        echo "<br>";
    ?> 




<h2>Ejercicio 4</h2>
    Pide al usuario que introduzca una palabra.
    Usando un bucle while, recorre la palabra y cuenta cuántas vocales tiene. Muestra el número total de vocales al final.
    RECOMENDACIÓN: Usar "strtolower()" para pasar la palabra a minúsucula entera y "strlen()" para contar la longitud de un string
    

    <form action="ModificacionForm+While.php" method="post">
        <input type="hidden" name="form" value="4">
        Introduce una palabra 
        <input type="text" name="text" id="" required>
        <input type="submit" value="Enviar">

    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $elec = $_POST["form"];
            if($elec == "4"){
                $vocales = "aeiou";
                $palabra = strtolower($_POST["text"]);
                $i = 0;
                $j = 0;
                $contVocales = 0; 
                while($i < strlen($palabra)){
                    $j = 0;
                    while($j < strlen($vocales)){
                         if($palabra[$i] == $vocales[$j]){
                            $contVocales++;
                            break;
                         }
                         $j++;
                    }
                    $i++;
                }

                echo "La palabra $palabra tiene $contVocales vocales";

            }
        }
    ?>
     <h2>Ejercicio 8</h2>
    Pide al usuario que introduzca dos números enteros que representen un rango.
    Usando un bucle while, muestra todos los números dentro de ese rango que sean divisibles entre 5.
    
    <form action="ModificacionForm+While.php" method="post">
        <input type="hidden" name="form" value="8">
        Introduce el primer numero del rango;
        <input type="number" name="numero1" id="" required>
        <br>Introduce el segundo numero rango(Tiene que ser mayor que el primero)
        <input type="number" name="numero2" id="" required>
        <input type="submit" value="Enviar">

    </form>
    <?php
        $array2 = [];
        $array3 = [];
        $array5 = [];
        $array235 = [];
        
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $elec = $_POST["form"];
            if($elec == "8"){
                $num = $_POST["numero1"];
                $num2 = $_POST["numero2"];
                if($num > $num2){
                    echo "No es un rango valido";
                }else{

                    while($num <= $num2){
                        if(multiplo2($num)){
                            array_push($array2, $num);
                        }
                        if(multiplo3($num)){
                            array_push($array3, $num);
                        }
                        if(multiplo5($num)){
                            array_push($array5, $num);
                        }
                        if(multiplo2($num) && multiplo3($num) && multiplo5($num)){
                            array_push($array235, $num);
                        }
                        $num++;
                    }    
                }
                echo "los multiplos de 2 son <br>";
                print_r($array2);
                echo "<br>los multiplos de 3 son <br>";
                print_r($array3);
                echo "<br>los multiplos de 5 son <br>";
                print_r($array5);
                echo "<br>los multiplos de 2,3 y 5 son <br>";
                print_r($array235);

            }

        }

        function multiplo2 ($n){
            return $n % 2 == 0;
        }

        function multiplo3 ($n){
            return $n % 3 == 0;
        }

        function multiplo5 ($n){
            return $n % 5 == 0;
        }

    ?>


    <h2>Ejercicio extra caja fuerte</h2>
    <?php
    $valoresIntroducidos = [];
    $clave = [5, 8, 6, 9];
    $acertaste =false;
    $fallaste = false;
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $elec = $_POST["form"];
            if($elec == "10"){
                $valoresIntroducidos= isset($_POST["caja"]) ? convertirArray($_POST["caja"]) : [];
                array_push($valoresIntroducidos, (int)$_POST["clave"]);
                if(compContra($clave, $valoresIntroducidos)){
                    echo "Numero correcto<br>";

                    if(count($clave) == count($valoresIntroducidos)){
                        $acertaste = true;
                        echo "Has accedido a la caja fuerte";
                        $valoresIntroducidos = [];
                     }
                }else{
                    $fallaste = true;
                    echo "Numero Incorrecto. Vuelve a empezar";
                    $valoresIntroducidos = [];
                 }
            }
        }
        

    function convertirArray($valor){
        $convertido = [];
        for($i = 0; $i < strlen($valor) ; $i++){
            array_push($convertido, $valor[$i]);
        }
        return $convertido;

    }

    function compContra($contra, $intro){
        for($i = 0; $i < count($intro); $i++){
            if($contra[$i] != $intro[$i]){
                return false;
            }
        }
        return true;

    }    

    function lista($array){
        $string = "";
        for($i = 0; $i < count($array); $i++){
            $string .= $array[$i];
        }

        return $string;
    }
    ?>
    <form action="ModificacionForm+While.php" method="post">
        <input type="number" name="clave" id="" min="0" max= "9">
        <input type="hidden" name="caja" value="<?php echo (lista($valoresIntroducidos));?>">
        <input type="hidden" name="form" value="10">
        <input type="submit" value="Comprobar">
    </form>
    <?php if($acertaste){?>
        Introduciste la clave correcta  <?php echo lista($clave)?>
    <?php }?>

    <?php if($fallaste){?>
        Introduciste la clave incorrecta 
    <?php }?>

</body>
</html>