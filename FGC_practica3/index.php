<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú principal</title>
    <link href="bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <?php
                session_start();
                if(!isset($_SESSION["usuario"])){
                    header("location: usuario/login.php");
                    exit;
                }

    ?>
</head>
<body>
    <div class="container text-center mt-5">
        <h1>Bienvenido a nuestro catálogo de juegos, <?php echo $_SESSION["usuario"]  ?></h1>
        <p class="mt-3">Elige una opción:</p>
        <div class="d-grid gap-3 col-6 mx-auto mt-4">
            <a href="nuevo.php" class="btn btn-primary btn-lg" <?php echo (!$_SESSION["admi"] ? "hidden" : "")  ?>>Nuevo producto</a>
            <a href="productos.php" class="btn btn-secondary btn-lg">Listado de productos</a>
            <a href="proveedores.php" class="btn btn-info btn-lg">Listado de proveedores</a>
            <a href="usuario/logout.php" class="btn btn-danger">CERRAR SESIÓN</a>
        </div>
    </div>
</body>
</html>