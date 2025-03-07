<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear producto</title>
    <link href="bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script> 
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    session_start();
    if (!isset($_SESSION["usuario"]) || !$_SESSION["admi"]) {
        header("location: index.php");
        exit;
    }
    require "conexion.php";
    ?>
    <style>
        .cagada {
            color: red;
        }

        .tabien {
            color: green;
        }
    </style>
</head>

<body>
    <?php

    $consulta = "SELECT * FROM proveedores ORDER BY nombre_proveedor";
    $resultado = $_conexion->query($consulta);
    $proveedoras = [];
    if(!isset($_GET["id_producto"])){
        header("location: productos.php");
    }else{
        $consulta = "SELECT * FROM productos WHERE id_producto = " . $_GET["id_producto"];
        $producto = $_conexion -> query($consulta);
        $id_pro = $_GET["id_producto"];
    
        $producto = $producto -> fetch_assoc();
    }



    while ($fila = $resultado->fetch_assoc()) {
        array_push($proveedoras, $fila["nombre_proveedor"]);
    }

    // Inicializar variables y errores
    $nombre_producto = $nombre_proveedor = $categoria_producto = $precio = $stock = "";
    $errores = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
            $err_categoria_producto = "<p class='cagada'>El título debe tener entre 3 y 80 caracteres.</p>";
            $errores = true;
        }

        if (!is_numeric($precio) || $precio < 0) {
            $err_precio = "<p class='cagada'>Las reseñas deben ser un número entre 0 y 100.</p>";
            $errores = true;
        }

        if (!is_numeric($stock) || ($stock < 0)) {
            $err_stock = "<p class='cagada'>La duración debe ser un número positivo o -1.</p>";
            $errores = true;
        }

        if (!$errores) {
            $consulta = "UPDATE productos  SET
                                        nombre_producto = '$nombre_producto',
                                        nombre_proveedor = '$nombre_proveedor',
                                        categoria_producto = '$categoria_producto',
                                        precio = $precio,
                                        stock = $stock
                                        WHERE id_producto = $id_pro";

            if ($_conexion->query($consulta)) {
                echo "<p class='tabien'>El juego se ha modificado correctamente.</p>";
            } else {
                echo "<p class='cagada'>Error al insertar el juego: " . $_conexion->error . "</p>";
            }
        }
    }
    ?>


    <form action="" method="post">
        <div class="mb-3">
        <label class="form-label" for="nombre_producto">nombre_producto:</label>
                <input class="form-control" type="text" name="nombre_producto" value = "<?= $producto["nombre_producto"] ?>">
                <?= $err_nombre_producto ?? "" ?>
        </div>

        <div class="mb-3">
            <label class="form-label" for="nombre_proveedor">nombre_proveedor:</label>
            <select class="form-select" name="nombre_proveedor">
                <?php foreach ($proveedoras as $proveedora) { ?>
                    <option value="<?= $proveedora ?>" <?php if($producto["nombre_proveedor"] == $proveedora ) echo "selected"?>>
                        <?= $proveedora ?>
                    </option>
                <?php } ?>
            </select>
            <?= $err_proveedora ?? "" ?>
        </div>

        <div class="mb-3">
            <label class="form-label" for="categoria_producto">categoria_producto:</label>
            <input class="form-control" type="text" name="categoria_producto" value = "<?= $producto["categoria_producto"] ?>">
            <?= $err_categoria_producto ?? "" ?>
        </div>

        <div class="mb-3">
            <label class="form-label" for="precio">precio:</label>
            <input class="form-control" type="text" name="precio" value = "<?= $producto["precio"] ?>">
            <?= $err_precio ?? "" ?>
        </div>


        <div class="mb-3">
            <label class="form-label" for="stock">stock</label>
            <input class="form-control" type="text" name="stock" value = "<?= $producto["stock"] ?>">
            <?= $err_stock ?? "" ?>
        </div>

        <div class="mb-3">
            <input class="btn btn-primary" type="submit" value="CONFIRMAR CAMBIOS">
            <a class="btn btn-secondary" href="productos.php">Volver</a>
        </div>
    </form>
</body>

</html>