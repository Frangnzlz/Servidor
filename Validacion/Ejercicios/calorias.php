<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
        require "funciones.php";
    ?>
</head>
<body>
    <!-- Crea un formulario que tenga un campo Edad, Peso(Kg), 
     Altura(cm)-- la altura debe de estar entre 0cm y 220cm, Género y nivel de actividad (Sedentario, Ligero, Moderado o activo)
     
     Validar todos los campos mencionados anteriormente. Y controlar sus errores
     Si los campos pasan los distintos tipos de filtros de validación, mostrar debajo del formulario
     usando isset() el resultado

    masculino -> (88.36 + (13.4*peso) + (4.8 * altura) - (5.7 * edad)) * actividad
    femenino -> (44.76 + (9.2 * peso) + (3.1 * altura) - (4.3 * edad)) * actividad
    sedentario = 1.2
    ligero = 1.375
    moderado = 1.55
    activo = 1.725
     -->

     <form action="" method="post">
        edad
        <input type="text" name="edad">
        peso
        <input type="text" name="peso">
        altura
        <input type="text" name="altura">
        genero
        <select name="genero">
            <option value="" disabled selected></option>
            <option value="masculino">Hombre</option>
            <option value="femenino">Mujer</option>
        </select>
        actividad
        <select name="actividad">
            <option value="" disabled selected></option>
            <option value="sedentario">Sedentario</option>
            <option value="ligero">Ligero</option>
            <option value="moderado">Moderado</option>
            <option value="activo">Activo</option>
        </select>
        <input type="submit" value="Enviar">
     </form>


     <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $tmp_edad = $_POST["edad"];
            $tmp_peso = $_POST["peso"];
            $tmp_altura = $_POST["altura"];
            $tmp_genero = isset($_POST["genero"]) ? $_POST["genero"] : "";
            $generos = ["masculino", "femenino"];
            $tmp_actividad = isset($_POST["actividad"]) ? $_POST["actividad"] : "";
            $actividades = ["sedentario", "ligero", "moderado", "activo"]; 

            if($tmp_edad == ""){
                $err_edad = "No puede estar vacio la edad";
            }else if($tmp_edad < 0){
                $err_edad = "No puede ser negativo";
            }else if(!filter_var($tmp_edad, FILTER_VALIDATE_INT)){
                $err_edad = "No has introducido un numero entero";
            }else{
                $edad = $tmp_edad;
            }
            echo isset($err_edad) ? "$err_edad<br>" : "";

            if($tmp_peso == ""){
                $err_peso = "No puede estar vacio el peso";
            }else if($tmp_peso <= 0){
                $err_peso = "No puede ser negativo";
            }else if(!filter_var($tmp_peso, FILTER_VALIDATE_FLOAT)){
                $err_peso = "No has introducido un numero entero";
            }else{
                $peso = $tmp_peso;
            }
            echo isset($err_peso) ? "$err_peso<br>" : "";

            if($tmp_altura == ""){
                $err_altura = "No puede estar vacio la altura";
            }else if($tmp_altura <=0){
                $err_altura = "No puede ser negativo";
            }else if($tmp_altura > 220){
                $err_altura = "No puede ser mayor a 220";
            }else if(!filter_var($tmp_altura, FILTER_VALIDATE_INT)){
                $err_altura = "No has introducido un numero entero ";
            }else{
                $altura = $tmp_altura;
            }
            echo isset($err_altura) ? "$err_altura<br>" : "";

            if($tmp_genero == ""){
                $err_genero = "Tienes que elegir una opción";
            }else if(!in_array($tmp_genero, $generos)){
                $err_genero = "No has elegido un genero  valido";
            }else{
                $genero = $tmp_genero;
            }
            echo isset($err_genero) ? "$err_genero<br>" : "";
            if($tmp_actividad == ""){
                $err_actividad = "Tienes que elegir una opción";
            }else if(!in_array($tmp_actividad, $actividades)){
                $err_actividad = "No has elegido una opción valida";
            }else{
                $actividad = $tmp_actividad;
            }
            echo isset($err_actividad) ? "$err_actividad<br>" : "";

            if (isset($edad, $peso, $altura, $genero, $actividad))  $calorias = calcularCalorias($peso, $altura, $edad, $genero, $actividad);

            echo isset($calorias) ? "Tienes que consumir $calorias calorias" : "";
            
        }
     
     
     ?>
</body>
</html>