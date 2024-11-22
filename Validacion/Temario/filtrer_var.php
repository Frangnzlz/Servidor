<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>validacion con filtros</title>
    <style>
        .error{
            color: red;
        }
        .acierto{
            color: green;
        }
    </style>
</head>
<body>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors",1);

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id = $_POST["form"];
            if($id == "ej1"){
                $entero = $_POST["numero"];
                if(!filter_var($entero, FILTER_VALIDATE_INT)){
                    $res_int = "<span class='error'>El valor ingresado no es un entero</span>";
                }else{
                    $res_int = "<span class='acierto'>El valor ingresado es un entero</span>";
                }
    
            }

            if($id == "ej2"){                
                $decimal = $_POST["decimal"];
                if(!filter_var($decimal,FILTER_VALIDATE_FLOAT)){
                    $res_decimal = "<span class='error'>El valor ingresado no es un decimal</span>";
                }else{
                    $res_decimal = "<span class='acierto'>El valor ingresado es un decimal</span>";
                }
            }

            if($id == "ej3"){                
                $email = $_POST["email"];
                if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                    $res_email = "<span class='error'>El valor ingresado no es un email</span>";
                }else{
                    $res_email = "<span class='acierto'>El valor ingresado es un email</span>";
                }
            }
            
            if($id == "ej4"){                
                $url = $_POST["url"];
                if(!filter_var($url,FILTER_VALIDATE_URL)){
                    $res_url = "<span class='error'>El valor ingresado no es un url</span>";
                }else{
                    $res_url = "<span class='acierto'>El valor ingresado es un url</span>";
                }
            }

            if($id == "ej5"){                
                $bool = $_POST["bool"];
                if(!filter_var($bool,FILTER_VALIDATE_BOOL)){
                    $res_bool = "<span class='error'>El valor ingresado no es un bool</span>";
                }else{
                    $res_bool = "<span class='acierto'>El valor ingresado es un bool</span>";
                }
            }
            
            if($id == "ej6"){                
                $dom = $_POST["dom"];
                if(!filter_var($dom,FILTER_VALIDATE_DOMAIN)){
                    $res_dom = "<span class='error'>El valor ingresado no es un dominio</span>";
                }else{
                    $res_dom = "<span class='acierto'>El valor ingresado es un dominio</span>";
                }
            }
        }
    
    ?>

    <form action="" method="post">
        <input type="hidden" name="form" value="ej1">
        <label for="numero">Ingrese un número entero:</label>
        <input type="text" name="numero" id="numero">
        <input type="submit" value="Enviar">
        <?php echo isset($res_int) ? $res_int : "";?>
    </form>
    <br><br>
        
    <form action="" method="post">
        <label for="decimal">Ingrese un número decimal:</label>
        <input type="hidden" name="form" value="ej2">
        <input type="text" name="decimal" id="decimal">
        <input type="submit" value="Enviar">
        <?php echo isset($res_decimal) ? $res_decimal : "";?>
    </form>
    <br><br>

    <form action="" method="post">
        <label for="email">Ingrese un email:</label>
        <input type="hidden" name="form" value="ej3">
        <input type="text" name="email" id="email">
        <input type="submit" value="Enviar">
        <?php echo isset($res_email) ? $res_email : "";?>
    </form>
    <br><br>
    
    <form action="" method="post">
        <label for="url">Ingrese un url:</label>
        <input type="hidden" name="form" value="ej4">
        <input type="text" name="url" id="url">
        <input type="submit" value="Enviar">
        <?php echo isset($res_url) ? $res_url : "";?>
    </form>
    <br><br>
    
    <form action="" method="post">
        <label for="bool">Ingrese un boolean:</label>
        <input type="hidden" name="form" value="ej5">
        <input type="text" name="bool" id="bool">
        <input type="submit" value="Enviar">
        <?php echo isset($res_bool) ? $res_bool : "";?>
    </form>
    <br><br>
    
    <form action="" method="post">
        <label for="dom">Ingrese un dominio:</label>
        <input type="hidden" name="form" value="ej6">
        <input type="text" name="dom" id="dom">
        <input type="submit" value="Enviar">
        <?php echo isset($res_dom) ? $res_dom : "";?>
    </form>
    <br><br>

<?php
    $string = "Nose@>asd>.com";
    $saenao = filter_var($string, FILTER_SANITIZE_EMAIL);
    echo $saenao;
    echo "<br>";
        
    $string = "https://assfas<.com";
    $saenao = filter_var($string, FILTER_SANITIZE_URL);
    echo $saenao;
    echo "<br>";

    $string = " alert('saneao')";
    $saenao = filter_var($string, FILTER_SANITIZE_ENCODED);
    echo $saenao;
    echo "<br>";    
    
    $string = "1,asdfa5";
    $saenao = filter_var($string, FILTER_SANITIZE_NUMBER_FLOAT);
    echo $saenao;
    echo "<br>";

    $string = "1,asdfa5";
    $saenao = filter_var($string, FILTER_SANITIZE_NUMBER_INT);
    echo $saenao;
    echo "<br>";    

?>


</body>
</html>