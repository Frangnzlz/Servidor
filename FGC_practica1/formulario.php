<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Francisco David González Carrillo</title>
</head>
<body>

    <h1>Ejercicio 1</h1>
    <form action="ejercicios.php" method="post">
    <input type="hidden" name="form" value= "ej1">
    <input type="submit" value="Ejercicio 1">
    </form>
    <br>
    <h1>Ejercicio 2</h1>
    <form action="ejercicios.php" method="post">
    <input type="hidden" name="form" value= "ej2">
    <label for="minimo">minimo</label>
    <input type="number" name="minimo" >
    <br>
    <label for="maximo">maximo</label>
    <input type="number" name="maximo">
    <input type="submit" value="Ejercicio 2">
    </form>
    <br>
    <h1>Ejercicio 3</h1>
    <form action="ejercicios.php" method="get">
    <label for="funcion">Introduce si quieres una suma o una resta</label>
    <br>
    <input type="text" name="funcion">
    <input type="submit" value="Enviar">
    </form>

</body>
</html>