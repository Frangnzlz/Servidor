<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>isset() y empty()</title>
</head>
<body>
    
    <p><strong>isset()</strong> verifica si una varialle está definida y no es </p>
    <p><strong>empty()</strong> devuelve true si la variable no está definida, 
                                tiene el valor 0, "", NULL, o un array vacío</p>




    <?php
        error_reporting(E_ALL);
        ini_set("display_errors",1);
        // caso 1: ambas devuelvan true
        echo "<strong>ambas devuelvan true</strong><br>";
        $valor = 0;
        echo "<p><strong>Valor:</strong>$valor</p><br>";
        if(isset($valor)){
            echo "el valor de \$valor está definida <br>";
        }else{
            echo "el valor de \$valor no está definida <br>";

        }
        if(empty($valor)){
            echo "el valor de \$valor se considerado vacio<br>";
        }else{
            echo "el valor de \$valor no se considerado vacio<br>";
        }
        
        // caso 2: ambas devuelvan false
        echo "<strong>ambas devuelvan false</strong><br>";
        unset($valor);

        echo "<p><strong>Valor:</strong>$valor</p><br>";
        if(isset($valor)){
            echo "el valor de \$valor está definida <br>";
        }else{
            echo "el valor de \$valor no está definida <br>";

        }
        if(empty($valor)){
            echo "el valor de \$valor se considerado vacio<br>";
        }else{
            echo "el valor de \$valor no se considerado vacio<br>";
        }
        // Caso 3: variable definida y con valor;
        echo "<strong>variable definida y con valor</strong><br>";
        $valor = 15;
        echo "<p><strong>Valor:</strong>$valor</p><br>";
        if(isset($valor)){
            echo "el valor de \$valor está definida <br>";
        }else{
            echo "el valor de \$valor no está definida <br>";

        }
        if(empty($valor)){
            echo "el valor de \$valor se considerado vacio<br>";
        }else{
            echo "el valor de \$valor no se considerado vacio<br>";
        }
        // Caso 4: variable definida como null;
        echo "<strong>variable definida como null</strong><br>";
        $valor = null;

        echo "<p><strong>Valor:</strong>$valor</p><br>";
        if(isset($valor)){
            echo "el valor de \$valor está definida <br>";
        }else{
            echo "el valor de \$valor no está definida <br>";

        }
        if(empty($valor)){
            echo "el valor de \$valor se considerado vacio<br>";
        }else{
            echo "el valor de \$valor no se considerado vacio<br>";
        }
        // Caso 5: Variable vacia con diferentes valores;
        echo "<strong>variable vacia con diferentes valores</strong><br>";
        $valores = [0,"",null, []];

        echo "<p><strong>Valor:</strong> ".var_export($valores,true) . "</p><br>";
        foreach($valores as $valor){
            if(isset($valor)){
                echo "el valor de \$valor está definida <br>";
            }else{
                echo "el valor de \$valor no está definida <br>";
    
            }
            if(empty($valor)){
                echo "el valor de \$valor se considerado vacio<br>";
            }else{
                echo "el valor de \$valor no se considerado vacio<br>";
            }
        }
        // Caso 6:array elementos definidos y no definidos
        echo "<strong>Array elementos definidos y no definidos</strong><br>";
        $valor = [1];

        if(isset($valor[1])){
            echo "el valor de \$valor está definida <br>";
        }else{
            echo "el valor de \$valor no está definida <br>";

        }
        if(empty($valor[1])){
            echo "el valor de \$valor se considerado vacio<br>";
        }else{
            echo "el valor de \$valor no se considerado vacio<br>";
        }
        //trim()
        echo "<pre>" . "       Hola         que        tal         " . "</pre> <br>";

        echo "<pre>" . trim("       Hola         que        tal          ") . "</pre> <br>";
        echo "<pre>" . trim("       Hola que tal          ") . "</pre> <br>";

    ?>
</body>
</html>