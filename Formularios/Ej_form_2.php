<?php 
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombre = $_POST["nombre"];
        $edad = $_POST["edad"];
        $email = $_POST["email"];
        
        echo ($edad > 0 ?"Nombre: $nombre, edad: $edad, email: $email": "No puede tener una edad negativa");

    }


?>