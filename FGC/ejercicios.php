<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = $_POST["form"];

        if($id == "ej1"){
            $alumnos = [
                "Juanito" => ["Sist.Informaticos" => 9, "LenguajeDeMarcas" => 5, "BBDD" => 7],
                "Rosa" => ["Sist.Informaticos" => 6, "LenguajeDeMarcas" => 9, "BBDD" => 9],
                "Hector" => ["Sist.Informaticos" => 4, "LenguajeDeMarcas" => 8, "BBDD" => 7],
                "Florencia" => ["Sist.Informaticos" => 6, "LenguajeDeMarcas" => 10, "BBDD" => 8],
                "Eugenio" => ["Sist.Informaticos" => 9, "LenguajeDeMarcas" => 5, "BBDD" => 6]
            ];
            //foreach que guarda la clave y el valor para poder mostrar el nombre del alumno
            foreach($alumnos as $alumno => $asignaturas){
                $cantAsignaturas = 0;
                $sumaNotas = 0;
                foreach($asignaturas as $asignatura => $notas){
                    $sumaNotas += $notas;
                    $cantAsignaturas++;
                }
                $media = $sumaNotas/$cantAsignaturas;
                echo "La nota media de $alumno sería: $media";    
            }
        }
        if($id = "ej2"){
            //Metodo para comrpobar si un numero es perfecto
            function esPerfecto($numero){
                $suma = 0;
                for($i = 1; $i < $numero; $i++){
                    if($numero % $i == 0){
                        $suma+= $i;
                    }
                }
                //Condicional para comprobar si la suma de los divisores es igual al numero
                //y si el numero es distinto de cero 
                if($suma == $numero && $numero !=0){
                    return true;
                }
                return false;

            }

            $minimo = $_POST["minimo"];
            $maximo = $_POST["maximo"];
            //Condicional para comprobar que el rango es valido
            if($minimo > $maximo){
                echo "No has introducido un rango valido";
            }else{
                $index = $minimo;
                while($index <= $maximo){
                    if(esPerfecto($index)){
                        echo "$index es un numero perfecto<br>";
                    }
                    $index++;
                }
            }
        }  
    }
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        //Función para llenar un array bidimensional con numeros aleatorios
        function rellenarArrayAleatorio($filas, $columnas){
            $array = [[]];
            for($i = 0; $i < $filas; $i++){
                for($j = 0; $j < $columnas; $j++){
                    $array[$i][$j] = rand(1,10);
                }
            }
            return $array;
        }
        //Funcion para sumar dos arrays bidimensionales, se asumen que del mismo tamaño
        function suma($array1, $array2){
            $resultado = [[]];
            for($i = 0; $i < count($array1); $i++){
                for($j = 0; $j < count($array1[$i]); $j++){
                    $resultado[$i][$j] = $array1[$i][$j] + $array2[$i][$j];
                }
            }
            return $resultado;
        }
        //Funcion para restar dos arrays bidimensionales, se asumen que del mismo tamaño
        function resta($array1, $array2){
            $resultado = [[]];
            for($i = 0; $i < count($array1); $i++){
                for($j = 0; $j < count($array1[$i]); $j++){
                    $resultado[$i][$j] = $array1[$i][$j] - $array2[$i][$j];
                }
            }
            return $resultado;
        }
        //Metodo para mostrar una tabla por pantalla
        function generarTabla($array){
            echo "<table border='1'>";
            for($i = 0; $i < count($array); $i++){
                echo "<tr>";
                for($j = 0; $j < count($array[$i]); $j++){
                    $valor =$array[$i][$j];
                    echo "<td> $valor </td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
        $metodo = $_GET["funcion"];
        //comprobación de que hayamos introducido la palabra correctamente
        if($metodo != "suma" && $metodo != "resta"){
            echo "No has introducido correctamente la petición";
        }else{
            $array1 = rellenarArrayAleatorio(3,3);
            $array2 = rellenarArrayAleatorio(3,3);

            echo "Array 1";
            generarTabla($array1);
            echo "Array 2";
            generarTabla($array2);
            echo "<h2>resultado de la $metodo</h2>";
            if($metodo == "suma"){
                $suma = suma($array1, $array2);
                generarTabla($suma);
            }else{
                $resta= resta($array1, $array2);
                generarTabla($resta);
            }

        }

    }

?>