<?php
    include_once("./../POO/Circulo.php");
    include_once("./../POO/Cuadrado.php");
    include_once("./../POO/Triangulo.php");

    $Nombreclase = "Triangulo";
    $figura = new $Nombreclase(4,4);
    echo $figura->identificate();
?>