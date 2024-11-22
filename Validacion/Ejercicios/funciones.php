<?php
     define("GENERAL", 1.21);
     define("REDUCIDO", 1.1);
     define("SUPERREDUCIDO", 1.04);

     define("SEDENTARIO", 1.2);
     define("LIGERO", 1.375);
     define("MODERADO", 1.55);
     define("ACTIVO", 1.725);

    function calcularDescuento(float $precio, int $descuento) : float{
        $precio -= ($precio *$descuento/100);
    
        return $precio;
    }

    function calcularIVA(float $precio, string $iva) : float{
       
        return match ($iva) {
             "general"=> $precio * GENERAL,
             "reducido" =>  $precio * REDUCIDO,
             "superreducido" => $precio * SUPERREDUCIDO
        };   
    }

    function calcularIRPF (float $salario) : float{
        $tramos = [
            ["limite_inferior" => 0, "limite_superior" => 12450, "porcentaje" => 0.19],
            ["limite_inferior" => 12450, "limite_superior" => 20200, "porcentaje" => 0.24],
            ["limite_inferior" => 20200, "limite_superior" => 35200, "porcentaje" => 0.30],
            ["limite_inferior" => 35200, "limite_superior" => 60000, "porcentaje" => 0.37],
            ["limite_inferior" => 60000, "limite_superior" => 300000, "porcentaje" => 0.45],
            ["limite_inferior" => 300000, "limite_superior" => INF, "porcentaje" => 0.47]
            ];
        
        $acumulador_impuesto = 0;

        foreach($tramos as $tramo){
            if($salario > $tramo["limite_inferior"]){
                $rango_imponible = min($salario, $tramo["limite_superior"]) - $tramo["limite_inferior"];
                $acumulador_impuesto += $rango_imponible * $tramo["porcentaje"];
            }else{
                break;
            }
        }
        return $salario - $acumulador_impuesto;
    }

    function sanear($nombre): string{
        $nombre = htmlspecialchars($nombre, ENT_NOQUOTES, "UTF-8");
        $nombre = trim($nombre);
        $nombre = preg_replace("/\s+/"," ", $nombre);
        
        return $nombre;
    }

    function validar($edad){
        if($edad == ""){
            return false;
        }else if($edad <0){
            return "No puede ser negativo";
        }else if(!filter_var($edad, FILTER_VALIDATE_INT)){
            return "No has introducido un numero entero";
        }else{
            return $edad;
        }
    }

    function calcularCalorias($peso, $altura, $edad, $genero, $actividad){
        $calorias = ($genero == "masculino" ? 88.36 : 44.76);
        $calorias += (($genero == "masculino" ? 13.4 : 9.2) * $peso);
        $calorias += (($genero == "masculino" ? 4.8 : 3.1) * $altura);
        $calorias -= (($genero == "masculino" ? 5.7 : 4.3) * $edad);


        $calorias = match($actividad){
            "sedentario" => $calorias * SEDENTARIO,
            "ligero" => $calorias * LIGERO,
            "moderado" => $calorias * MODERADO,
            "activo" => $calorias * ACTIVO
        };

        return $calorias;
    }
    
?>