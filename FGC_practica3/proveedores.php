<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de proveedores</title>
    <link href="bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>      
    <?php
        require "conexion.php";
        session_start();
        if(!isset($_SESSION["usuario"])){
            header("location: usuario/login.php");
            exit;
        }

    ?>
</head>
<body>
    <div class="container mt-4">
        <h1>Listado de proveedores</h1>


        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>nombre_proveedor</th>
                    <th>ciudad</th>
                    <th>telefono</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $consulta = "SELECT * FROM proveedores";
                    $res = $_conexion->query($consulta);
                    while ($fila = $res->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$fila['nombre_proveedor']}</td>";
                        echo "<td>{$fila['ciudad']}</td>";
                        echo "<td>{$fila['telefono']}</td>";
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
