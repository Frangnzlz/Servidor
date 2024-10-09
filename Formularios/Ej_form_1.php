<?php 

    if($_SERVER["REQUEST_METHOD"] == "GET"){
        $nombre = $_GET["nombre"];
        $edad = $_GET["edad"];

        echo "Nombre: $nombre, edad: $edad";

    }



?>