<?php 

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $text = $_POST["text"];
        echo "Texto introducido<br> $text";

    }



?>