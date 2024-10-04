<?php 
    if($_SERVER["REQUEST_METHOD"] = 'POST'){
        // Ejercicio1
        if($_POST['form'] == "ej1"){
        $nombre = $_POST["nombre"];
        $apell = $_POST["edad"];
        $corr = $_POST["correo"];

        echo "nombre: $nombre  edad: $apell  correo: $$corr";
        } 
    }

?>