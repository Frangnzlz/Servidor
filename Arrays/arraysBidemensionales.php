<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    /**
     * [
     *      [1,2,3],
     *      [4,5,6],
     *      [7,8,9]
     * ]
     */

    //Creación array de fomra manual 
     $array0 = array(
        array(1,2,3),
        array(4,5,6),
        array(7,8,9),
     );
    //creación mediante indices
    $array1[0][0] = 1;
    $array1[0][1] = 2;
    $array1[0][2] = 3;

    $arrayIrregular = array(
        array(1),
        array(4,6),
        array(7,8,9)
    );
     
    $arrayBi = array();

    for($i = 1; $i <=10; $i++){
        for($j = 1; $j <=10;$j++){
            $arrayBi[$i][$j] = $i +$j;
        }
    }
    echo "<pre>";
    print_r($arrayBi);
    echo "/<pre>";

    for($i = 1; $i <=10; $i++){
        for($j = 1; $j <=10;$j++){
            echo "|| ". $arrayBi[$i][$j] . "||" ;
            echo  $j==10 ? "" : "----";
        }
        echo "<br>";
    }


?>    

<h1>Suma elementos</h1>
    Crea un array bidimensional de 4x4 que contenga números enteros. Escribe un programa que muestre el array con el separador "-" entre cada elemento del array y calcule la suma de todos sus elementos.
    
<?php
        $array4x4 = array();
        $total = 0;
        for($i = 1; $i <=4; $i++){
            for($j = 1; $j <=4;$j++){
                $array4x4[$i][$j] = rand(1,20);
                $total += $array4x4[$i][$j];
            }
        }

        for($i = 1; $i <= 4; $i++){
            for($j = 1; $j <= 4; $j++){
                echo $array4x4[$i][$j];
                echo $j == 4? "<br>" : "-"; 
            }
        }

    
?>


       
 <h1>Matriz identidad</h1>
    Crea una matriz identidad de 4x4. Una matriz identidad tiene 1 en la diagonal principal y 0 en el resto de puestos de la matriz. Muestra la matriz resultante con bucles.

<?php
        $array4x4 = array();
        $total = 0;
        for($i = 1; $i <=4; $i++){
            for($j = 1; $j <=4;$j++){
                $array4x4[$i][$j] = $i == $j ? 1 : 0;
                echo $array4x4[$i][$j];
            }
            echo "<br>";
        }

?>

       
<h1>Transpuesta de una matriz</h1>
    Dada una matriz 3x3, escribe un programa que calcule y muestre su respuesta. La transpuesta de una matriz es otra matriz en la que las filas son las columnas y viceversa.
        
<h1>Multiplicación de matrices</h1>
    Crea dos matrices bidimensionales de 2x2 con números enteros. Escribe un programa que calcule el producto de dos matrices y muestre el resultado.
    En una multiplicación de matrices, el número de columnas de la primera matriz debe coincidir con el número de filas de la segunda matriz.
    Para multiplicar dos matrices de 2x2, el resultado también será una matriz de 2x2.
    <pre>
    Ejemplo:
    Dadas dos matrices A y B:  A: a11 a12  y  B: b11 b12
                                  a21 a22        b21 b22
    
    La multiplicación de A x B se calcularía tal que así:

    Resultado = [ (a11*b11 + a12*b21) (a11*b12 + a12*b22) ]
                [ (a21*b11 + a22*b21) (a21*b12 + a22*b22) ]

    Ejemplo con números:
    Matriz A:
                1 2
                3 4

    Matriz B:
                5 6
                7 8

    Resultado de A x B:
                19 22
                43 50
    </pre>

    <h1>Media de una matriz</h1>
    Escribe un programa que calcule la media de todos los valores de una matriz bidimensional de 4x3 (4 filas y 3 columnas). Después muestra la media.
    

</body>
</html>