<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear juego</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors",1);
        require "conexion.php";
        
        if(!isset($_SESSION["usuario"]) && $_SESSION["admi"]){
            header("location: usuario/login.php");
            exit;
        }
    ?>
    <style>
        .cagada { color: red; }
        .tabien { color: green; }
    </style>
</head>
<body>
    <?php

        $consulta = "SELECT * FROM proveedores ORDER BY nombre_proveedor";
        $resultado = $_conexion -> query($consulta);
        $proveedoras = [];
        while($fila = $resultado -> fetch_assoc()){
            array_push($proveedoras, $fila["nombre_proveedor"]);
        }

        // Inicializar variables y errores
        $nombre_producto = $nombre_proveedor = $categoria_producto = $precio = $stock = "";
        $errores = false;

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            //Sanitizar y recoger
            $nombre_producto = htmlspecialchars(trim($_POST["nombre_producto"] ?? ""));
            $nombre_proveedor = $_POST["nombre_proveedor"] ?? "";
            $categoria_producto = $_POST["categoria_producto"] ?? "";
            $precio = $_POST["precio"] ?? "";
            $stock = $_POST["stock"] ?? "";

            //Validar
            if ($nombre_producto === "" || strlen($nombre_producto) < 3 || strlen($nombre_producto) > 80) {
                $err_nombre_producto = "<p class='cagada'>El título debe tener entre 3 y 80 caracteres.</p>";
                $errores = true;
            }

            if (!in_array($nombre_proveedor, $proveedoras)) {
                $err_proveedora = "<p class='cagada'>Seleccione una proveedora válida.</p>";
                $errores = true;
            }

            if ($categoria_producto === "" || strlen($categoria_producto) < 3 || strlen($categoria_producto) > 50) {
                $err_nombre_producto = "<p class='cagada'>El título debe tener entre 3 y 80 caracteres.</p>";
                $errores = true;
            }

            if (!is_numeric($precio) || $precio < 0 || $precio > 100) {
                $err_precio = "<p class='cagada'>Las reseñas deben ser un número entre 0 y 100.</p>";
                $errores = true;
            }

            if (!is_numeric($stock) || ($stock != -1 && $stock < 0)) {
                $err_duracion = "<p class='cagada'>La duración debe ser un número positivo o -1.</p>";
                $errores = true;
            }

            if (!$errores) {
                //1. preparación
                $consulta = "INSERT INTO videojuegos(titulo
                                        nombre_desarrolladora,
                                        anno_lanzamiento_
                                        reseñas,
                                        horas_duracion) VALUES (?, ?, ?, ?, ?)";
                $stmt = $_conexion -> prepare($consulta);

                //2. Bind (Enlazamiento)
                $stmt -> bind_param("ssidi", $titulo, $nombre_desarrolladora, $anno_lanzamiento, $reseñas, $horas_duracion);

                //3. Ejecución
                if($stmt -> execute()){
                    echo "correcto";
                }else{
                    echo "mal";
                }

                $consulta = "INSERT INTO videojuegos (
                                        nombre_producto,
                                        nombre_proveedor,
                                        categoria_producto,
                                        precio,
                                        stock) VALUES 
                                        ('$nombre_producto',
                                        '$nombre_proveedor',
                                        $categoria_producto,
                                        $precio,
                                        $stock)";
                
                if ($_conexion->query($consulta)) {
                    echo "<p class='tabien'>El juego se ha añadido correctamente.</p>";
                } else {
                    echo "<p class='cagada'>Error al insertar el juego: " . $_conexion->error . "</p>";
                }
            }
        }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="nombre_producto">nombre_producto:</label>
        <input type="text" name="nombre_producto" value="<?= $nombre_producto ?>">
        <?= $err_nombre_producto ?? "" ?>
        <br><br>

        <label for="nombre_proveedor">nombre_proveedor:</label>
        <select name="nombre_proveedor">
            <option value="" selected disabled>--ELIJA SU DESARROLLADORA--</option>
            <?php foreach($proveedoras as $proveedora){ ?>
                <option value="<?= $proveedora ?>">
                    <?= $proveedora ?>
                </option>
            <?php } ?>
        </select>
        <?= $err_proveedora ?? "" ?>
        <br><br>

        <label for="categoria_producto">Año de categoria_producto:</label>
        <input type="text" name="categoria_producto" value="<?= $categoria_producto ?>">
        <?= $err_anno ?? "" ?>
        <br><br>

        <label for="precio">precio de Steam (%):</label>
        <input type="text" name="precio" value="<?= $precio ?>">
        <?= $err_precio ?? "" ?>
        <br><br>

        <label for="stock">stock</label>
        <input type="text" name="stock" value="<?= $stock ?>">
        <?= $err_duracion ?? "" ?>
        <br><br>

        <input type="submit" value="CREAR">
        <a href="index.php">Volver</a>
    </form>
</body>
</html>
