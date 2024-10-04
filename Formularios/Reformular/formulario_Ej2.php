<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $radio = $_POST['radio'];
        $area = M_PI * pow($radio, 2);

        echo "El area de un circulo de radio $radio es $area";
    }

?>