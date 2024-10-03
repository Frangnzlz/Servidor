<?php
$array = [1, 34, 65, 94, 55, 53, 15, 8643, 97];
$buscamos = 55;
$bool = false;
$i = 0;


while ($i < count($array) && !$bool) {
    if ($buscamos == $array[$i]) {
        $bool = true;
    }

    $i++;
    
}

if ($bool) {
    echo "Se ha encontrado el numero $buscamos dentro del array y se ha iterado el bucle " . $i . " veces <br>";
} else {
    echo "No se ha encontrado el numero $buscamos dentro del array y se ha iterado el bucle " . $i . " veces <br>";
}

$bool = false;

for ($i = 0; $i < count($array) && !$bool; $i++) {
    if ($buscamos == $array[$i]) {
        $bool = true;
    }
}


if ($bool) {
    echo "Se ha encontrado el numero $buscamos dentro del array y se ha iterado el bucle $i veces <br>";
} else {
    echo "No se ha encontrado el numero $buscamos dentro del array y se ha iterado el bucle $i veces <br>";
}

foreach ($array as $aux) {
    echo "$aux ";
}
echo "<br>";;
$contador = 1;

while($contador <= 5){
    echo "el valor del constador es: $contador Primer bucle <br>";
    $contador++;
}

while($contador <= 10 ? true : false){
    echo "el valor del constador es: $contador Segundo bucle <br>";
    $contador++;
}

do {
    echo "el valor del constador es: $contador Tercer bucle <br>";

} while ($contador <= 10);



function FunctionName() : int {
    return 0;
}


?>