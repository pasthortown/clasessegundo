<?php
include_once ('./Figura.php');
include_once ('./FiguraGeometrica.php');
include_once ('./Cuadrado.php');
include_once ('./Triangulo.php');
include_once ('./Circulo.php');

$figurasGeometricas = array();

$triangulo = new Triangulo(4,2);
$cuadrado = new Cuadrado(5);
$circulo = new Circulo(3);

array_push($figurasGeometricas,$triangulo);
array_push($figurasGeometricas,$cuadrado);
array_push($figurasGeometricas,$circulo);

foreach ($figurasGeometricas as $figura){
    echo $figura->identificate()."<br/>";
}