<?php
    $_servidor = "localhost"; // Servidor de la base de datos
    $_usuario = "root"; // Usuario que configuraste
    $_contrasena = ""; // Contraseña del usuario
    $_base_de_datos = "tienda_bd"; // Nombre de la base de datos

    $_conexion = new Mysqli( $_servidor, $_usuario, $_contrasena, $_base_de_datos)
    or die("Error de conexión");
?>