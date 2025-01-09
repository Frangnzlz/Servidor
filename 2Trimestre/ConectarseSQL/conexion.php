<?php
    error_reporting(E_ALL);
    ini_set("display_errors",1);

    $serverName = "localhost";
    $usuario = "Admi";
    $contra = "F12345.";
    $dataBase = "videojuegos_bd";
    //crear conexión
    $conn = new mysqli($serverName, $usuario, $contra, $dataBase);

    if($conn -> connect_error){
        die("Error de conexión:" . $conn -> connect_error);
    }
    

    // $conn -> close();
?>