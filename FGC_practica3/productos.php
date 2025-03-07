<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de productos</title>
    <link href="bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>    
    <?php

        session_start();
        if(!isset($_SESSION["usuario"])){
            header("location: usuario/login.php");
            exit;
        }
            
        require "conexion.php";
        $order_by = $_GET['order_by'] ?? 'id_producto'; // Orden por defecto
        $direction = $_GET['direction'] ?? 'ASC'; // Dirección por defecto

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $consulta = "DELETE FROM productos
                        WHERE id_producto = " . $_POST["id_producto"];

            $_conexion -> query($consulta);
        }
    ?>
</head>
<body>
    <div class="container mt-4">
        <h1>Listado de productos</h1>
        <div class="mb-3">
            <a href="?order_by=precio&direction=ASC" class="btn btn-info">Ordenar por precio (Asc)</a>
            <a href="?order_by=precio&direction=DESC" class="btn btn-info">Ordenar por precio (Desc)</a>
            <a href="?order_by=id_producto&direction=ASC" class="btn btn-warning">Ordenar por ID (Asc)</a>
            <a href="?order_by=id_producto&direction=DESC" class="btn btn-warning">Ordenar por ID (Desc)</a>
        </div>
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>id_producto</th>
                    <th>nombre_producto</th>
                    <th>categoria_producto</th>
                    <th>precio</th>
                    <th>stock</th>
                    <th>nombre_proveedor</th>
                    <?php if($_SESSION["admi"]) { ?>
                    <th>Acciones</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    $consulta = "SELECT * FROM productos ORDER BY $order_by $direction";
                    $res = $_conexion->query($consulta);
                    while ($fila = $res->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$fila['id_producto']}</td>";
                        echo "<td>{$fila['nombre_producto']}</td>";
                        echo "<td>{$fila['categoria_producto']}</td>";
                        echo "<td>{$fila['precio']}</td>";
                        echo "<td>{$fila['stock']}</td>";
                        echo "<td>{$fila['nombre_proveedor']}</td>";
                        if($_SESSION["admi"]){
                            echo "<td>
                            <a class='btn btn-primary btn-sm' href='editar.php?id_producto={$fila['id_producto']}'>Editar</a>
                            <form action='' method='post' style='display:inline;'>
                                <input type='hidden' name='id_producto' value='{$fila['id_producto']}'>
                                <button class='btn btn-danger btn-sm' type='submit'>Borrar</button>
                            </form>
                          </td>";
                        }
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>

        <div class="mb-3">
        <a href="index.php" class="btn btn-secondary">Volver al menú principal</a>

        </div>
    </div>
                
</body>
</html>
