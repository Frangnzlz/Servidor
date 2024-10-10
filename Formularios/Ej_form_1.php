<?php

use function PHPSTORM_META\type;

    if($_SERVER["REQUEST_METHOD"] == "GET"){
        $nombre = $_GET["nombre"];
        $edad = $_GET["edad"];

        echo "Nombre: $nombre, edad: $edad";

    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $elec = $_POST["form"];

        if($elec == "ej2"){
            $nombre = $_POST["nombre"];
            $edad = $_POST["edad"];
            $email = $_POST["email"];
            
            echo ($edad > 0 ?"Nombre: $nombre, edad: $edad, email: $email": "No puede tener una edad negativa");
        }

        if($elec == "ej3"){
            $text = $_POST["text"];
            echo "Texto introducido<br> $text";
        }

    }


?>