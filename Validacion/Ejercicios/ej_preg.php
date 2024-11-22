
<?php
    error_reporting(E_ALL);
    ini_set("display_errors",1);
    /*
     * preg_match comuprueba si una cadena coincide con un patrón definido por una expresión regular
     * /"patron"/: es el patron de la expresión regular
     * $var: variable que estamos evaluando
     * PATRONES COMUNES:
     * \d: digito (0-9)
     * \s: espacio en blanco
     * \w: caracter alfanumerico
     * +: Uno o más
     * *: cero o más
     * ^: comienza con
     * $: termina con
     *{}: numero de caracteres del mismo
      []: define un conjunto de caracteres aceptables
      (?=...): es una expresion de busqueda anticipada positiva que verifica que la condicion dentro de los parentesis
      este presente en algun lugar de la cadena 
     */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Numero de telefono -->
    <form action="" method="post">
    <input type="hidden" name="form" value="ej1">
    <input type="text" name="num" id="num">
    <input type="submit" value="enviar">
    </form>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id = $_POST["form"];

            if($id == "ej1"){
                $num = $_POST["num"];
                if(preg_match("/^[6-7]\d{9}$/", $num)){
                    echo "$num es un numero de telefono";
                }else{
                    echo "$num no es un numero de telefono";
                }
            }
        
    ?>
    <!-- Correo electronico -->
    <form action="" method="post">
        <input type="hidden" name="form" value="ej2">
        <input type="text" name="correo" id="correo">
        <input type="submit" value="enviar">
    </form>
    <?php
            if($id == "ej2"){
                $correo = $_POST["correo"];
                if(preg_match("/^[\w.-]+@[a-zA-Z\d.-]+\.+[a-zA-Z]{2,6}$/", $correo)){
                    echo "$correo valido";
                }else{
                    echo "$correo no valido";
                }
            }
        
    ?>
    <!-- Ejercicio contraseña -->
    <form action="" method="post">
        <input type="hidden" name="form" value="ej3">
        <input type="text" name="contraseña">
        <input type="submit" value="enviar">
    </form>
    <?php
                    if ($_POST["form"] == "ej3") {
                        $contraseña = $_POST["contraseña"];
                        if (preg_match("/(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!*?&])[a-zA-Z\d@$!*?&]{8,}$/", $contraseña)) {
                            echo "Contraseña Valido <br>";
                        } else {
                            echo "Contraseña NO Valido <br>";
                        }
                    }
        }
    ?>
</body>
</html>