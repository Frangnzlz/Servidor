<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
                session_start();
                if(!isset($_SESSION["usuario"])){
                    header("location: usuario/iniciar_sesion.php");
                    exit;
                }
    ?>
</head>
<body>
    <div class="container text-center mt-5">
        <h1>Bienvenido a nuestro catálogo de juegos, <?php echo $_SESSION["usuario"] ?></h1>
        <p class="mt-3">Elige una opción:</p>
        <div class="d-grid gap-3 col-6 mx-auto mt-4">
            <a href="nuevo2.php" class="btn btn-primary btn-lg">Crear un nuevo videojuego</a>
            <a href="videojuegos.php" class="btn btn-secondary btn-lg">Listado de videojuegos</a>
            <a href="desarrolladoras2.php" class="btn btn-info btn-lg">Listado de desarrolladoras</a>
            <a href="usuario/cerrar_sesion.php" class="btn btn-danger">CERRAR SESIÓN</a>
        </div>
    </div>
</body>
</html>
