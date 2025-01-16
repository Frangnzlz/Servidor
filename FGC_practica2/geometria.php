<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors",1);
    require "funciones.php";
    ?>
</head>
<body>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nombre = $_POST["nombre"];
            $figuras = ["cuadrado", "circulo", "triangulo"];
            $tmp_figura = isset($_POST["figura"]) ? $_POST["figura"] : "";
            $tmp_lado = isset($_POST["lado"]) ? $_POST["lado"] : 0;
            $tmp_radio = isset($_POST["radio"]) ? $_POST["radio"] : 0;
            $tmp_base = isset($_POST["altura"]) ? $_POST["base"] : 0;
            $tmp_altura = isset($_POST["radio"]) ? $_POST["radio"] : 0;

            
            $nombre = trim($nombre);
            if(empty($nombre)){
                $err_nombre = "<p style='color:red;'>Tienes que inicializar un nombre</p>" ;
            }else{
                $nombre = htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8');
            }

            if($tmp_figura == ""){
                $err_figura = "<p style='color: red;'> Tienes que elegir una opción</p>"; 
            }else if(!in_array($tmp_figura, $figuras)){
                $err_figura = "<p style='color: red;'>No has escogido una opción valida</p>"; 
            }else{
                $figura = $tmp_figura;
            }

            if(isset($figura)){
                if($figura == "cuadrado"){
                    if($tmp_lado == ""){
                        $err_lado =  "<p style='color: red;'> Tienes que introducir un valor</p>";
                    }else if($tmp_lado <= 0){
                        $err_lado = "<p style='color: red;'>No puede ser negativo o cero</p>";
                    }else if(!filter_var($tmp_lado, FILTER_VALIDATE_FLOAT)){
                        $err_lado = "<p style='color: red;'>No has introducido un numero entero<?p>";
                    }else{
                        $lado = $tmp_lado;
                        $radio = $tmp_radio;
                    }
                    if(isset($lado)){
                         $result = calcularArea($figura, $lado, 0, 0, 0);
                    }
                }else if($figura == "circulo"){
                    if($tmp_base == ""){
                        $err_radio =  "<p style='color: red;'> Tienes que introducir un valor</p>";
                    }else if($tmp_radio <= 0){
                        $err_radio = "<p style='color: red;'>No puede ser negativo o cero</p>";
                    }else if(!filter_var($tmp_radio, FILTER_VALIDATE_FLOAT)){
                        $err_lado = "<p style='color: red;'>No has introducido un numero entero<?p>";
                    }else{
                        $radio = $tmp_radio;
                    }
                    if(isset($radio)){
                        $result = calcularArea($figura, 0, $radio, 0, 0);
                    }
                }else if($figura == "triangulo"){
                    if($tmp_base == ""){
                        $err_base =  "<p style='color: red;'> Tienes que introducir un valor</p>";
                    }else if($tmp_base <= 0){
                        $err_base = "<p style='color: red;'>No puede ser negativo o cero</p>";
                    }else if(!filter_var($tmp_base, FILTER_VALIDATE_FLOAT)){
                        $err_base = "<p style='color: red;'>No has introducido un numero entero<?p>";
                    }else{
                        $base = $tmp_base;
                    }
                    
                    if($tmp_altura == ""){
                        $err_altura =  "<p style='color: red;'> Tienes que introducir un valor</p>";
                    }else if($tmp_altura <= 0){
                        $err_altura = "<p style='color: red;'>No puede ser negativo o cero</p>";
                    }else if(!filter_var($tmp_altura, FILTER_VALIDATE_FLOAT)){
                        $err_altura = "<p style='color: red;'>No has introducido un numero entero<?p>";
                    }else{
                        $base = $tmp_altura;
                    }

                    if(isset($base) && isset($altura)){
                        $result = calcularArea($figura, 0, 0, $base, $altura);
                    }

                }
            }


        }
    ?>
    <form action="" method="post">
        Nombre :<input type="text" name="nombre">
        <br>
        <?php if(isset($err_nombre)) echo $err_nombre?>
        Figura: <select name="figura">
            <option disabled selected></option>
            <option value="cuadrado">Cuadrado</option>
            <option value="circulo">Circulo</option>
            <option value="triangulo">Triangulo</option>
        </select>
        <?php if(isset($err_figura)) echo $err_figura?>
        <br>
        Lado del cuadrado: <input type="text" name="lado">
        <?php if(isset($err_lado)) echo $err_lado?>
        <br>
        Radio del circulo:<input type="text" name="radio">
        <?php if(isset($err_radio)) echo $err_radio?>
        <br>
        Base del triangulo:<input type="text" name="base">
        <?php if(isset($err_base)) echo $err_base?>
        <br>
        Altura del triangulo:<input type="text" name="altura" >
        <?php if(isset($err_base)) echo $err_base?>
        <br>
        <input type="submit" value="Enviar">

    </form>
    <?php
        if(isset($result)){
            echo "<h3 style='color: green;'> <pre>$nombre</pre> el area calculada es de $result";
        }

    ?>
</body>
</html>
