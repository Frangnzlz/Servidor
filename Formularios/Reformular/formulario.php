<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $elec = $_POST["form"];

        if($elec == 'ej1'){
            $a = $_POST['a'];
            $b = $_POST['b'];
            $c = $_POST['c'];
            $real = (($b*$b) - 4*$a*$c);
            if( $real < 0){
                echo "No tiene solución real<br>";
            }else{
                echo (-$b + $real)/(2*$a) . " es la respuesta en los positivos<br>";
                echo (-$b - $real)/(2*$a) . " es la respuesta en los negativos<br>"; 
            }
        }
        if($elec == 'ej2'){
            $radio = $_POST['radio'];
            $area = M_PI * pow($radio, 2);
    
            echo "El area de un circulo de radio $radio es $area";
        }
        if($elec == 'ej3'){
            $radio =$_POST['radio'];
            $circunferencia = M_PI * 2 * $radio;
        
            echo "la circunferencia de un circulo de radio $radio es $circunferencia";
        
        }
        if($elec == 'ej4'){
            $a = $_POST['num1'];
            $b = $_POST['num2'];
        
            echo ($a === $b ? "los numeros son iguales" :  "los numeros no son iguales");
        
        }
        if($elec == 'ej5'){
            $a = $_POST['a'];
            echo ($a < 0 ? "El numero es negativo" :( $a > 0 ? "El numero es positivo" : "El numero es 0"));
        
        }
        if($elec == 'ej6'){
            $a = $_POST['a'];
            $b = $_POST['b'];
            echo $a % $b === 0 ? "$a es multiplo de $b" : "$a no es multiplo de $b"; 
        
        }
        if($elec == 'ej7'){
            $a = $_POST['a'];
            $b = $_POST['b'];
            echo match (true) {
                $a < $b => "$b > $a",
                $a > $b => "$a > $b",
                default => "son iguales"
            };
            
        }
        if($elec == 'ej8'){
            $a = $_POST['a'];
            $b = $_POST['b'];
            echo match (true) {
                $a < $b => "$b es el mayor de los dos",
                $a > $b => "$a es el mayor de los dos",
                default => "son iguales"
            };
          
        }
        if($elec == 'ej9'){
            $a = $_POST['a'];
            $b = $_POST['b'];
            $c = $_POST['c'];
            
            // echo match (true) {
            //     $a < $b => match (true) {
            //             $b < $c=> "$c > $b < $a", 
            //             $c < $b=> match (true) {
            //                         $c < $a => "$b < $a < $c",
            //                         $c > $a=>"$b < $c < $a" ,
            //                         default => "$b < $c = $a"
            //                         },
            //             default => "$c = $b < $a"
            //             },
        
            //     $a > $b => "$a es el mayor de los dos",
            //     default => "son iguales"
            // };
            
            $array = [$a, $b, $c];
            arsort($array);
            foreach ($array as $i) {
                echo "$i ";
            }
        }
    }
    


    

?>