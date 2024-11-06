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
        // caso 1: ambas devuelvan true
        $valor = 0;

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
    
    ?>
</body>
</html>