<?php
$cursos = [
    "curso1" => ["Clase1" => 15,"Clase2" => 15,"Clase3" => 15],
    "curso2" => ["Clase1" => 15,"Clase2" => 15,"Clase3" => 15],
    "curso3" => ["Clase1" => 15,"Clase2" => 15,"Clase3" => 15]
];

echo "<pre>";
print_r($cursos);
echo "</pre>";

$mayorMedia = 0;
$cursoConMayorMedia = 0;


foreach($cursos as $curso => $clases){
    $totalAlumnos = 0;
    $numClase = 0;

    foreach($clases as $clase => $alumno){
        $totalAlumnos += $alumno;
        $numClase++;
    }

    $media = $totalAlumnos/$numClase;
    echo "la media del curso $curso es: $media";

    if($mayorMedia< $media){
        $mayorMedia = $media;
        $cursoConMayorMedia = $curso;
    }

}
echo "<br>La media del curso $cursoConMayorMedia es la mayor media y su resultado es: $mayorMedia";




?>