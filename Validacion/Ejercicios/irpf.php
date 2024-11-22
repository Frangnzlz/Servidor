<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IRPF</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="salario">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>




<?php

    error_reporting(E_ALL);
    ini_set("display_error",1);

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $tmp_salario = $_POST["salario"];

        if($tmp_salario== ""){
            $err_salario = "Introduce un salario";
        }else if(!filter_var($tmp_salario, FILTER_VALIDATE_FLOAT)){
            $err_salario = "Introduzca un número decimal";
        }else if($tmp_salario <= 0){
            $err_salario = "Introduzca un numero decimal positivo";
        }else{
            $salario = $tmp_salario;
        }


        $salario_final = null;

        $tramo1 = (12450 * 0.19);
        $tramo2 = ((20200 - 12450 ) * 0.24);
        $tramo3 = ((35200 - 20200) * 0.3);
        $tramo4 = ((60000 - 35200) * 0.37);
        $tramo5 = ((300000 - 60000) * 0.45);

        if(isset($salario)){
            if($salario < 12450){
            $salario_final = $salario - ($salario * 0.19);
            }else if($salario >= 12450 && $salario < 20200){
                $salario_final = $salario - $tramo1 - 
                                (($salario - 12450) *0.24);
            }else if($salario < 35200){
                $salario_final = $salario - $tramo1 - $tramo2 -
                                (($salario -20200) *0.3); 
            }else if($salario < 60000){
                $salario_final = $salario - $tramo1 - $tramo2 - $tramo3 -
                                (($salario - 35200) *0.37);
            }else if($salario < 300000){
                $salario_final = $salario - $tramo1 - $tramo2 - $tramo3 - $tramo4 -
                                (($salario - 60000) *0.45);
            }else{
                $salario_final = $salario - $tramo1 - $tramo2 - $tramo3 - $tramo4 - $tramo5 -
                                (($salario - 300000)*0.47);
            }
        }

        echo isset($err_salario) ? $err_salario : "El Salario final de $salario es $salario_final"; 
    }
/*
--Formulario de Entrada

        El formulario pide al usuario que ingrese su salario bruto en el campo salario.
        Al presionar el botón se debe de procesar el salario bruto en neto
        
        --Inicialización de Variables y Tramos de Impuesto

        El salario bruto ingresado se almacena en $salario.
        Se inicializa $salario_final como null, ya que esta variable contendrá el resultado del cálculo de salario neto.
        Los tramos de IRPF son porcentajes aplicados sobre rangos específicos de ingresos. Cada tramo se calcula como:
        Tramo 1: El 19% de los primeros 12,450 euros.
        Tramo 2: El 24% sobre los ingresos entre 12,450 y 20,200 euros.
        Tramo 3: El 30% sobre los ingresos entre 20,200 y 35,200 euros.
        Tramo 4: El 37% sobre los ingresos entre 35,200 y 60,000 euros.
        Tramo 5: El 45% sobre los ingresos entre 60,000 y 300,000 euros.
*/

?>