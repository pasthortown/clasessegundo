<?php
include_once('FiguraGeometrica.php');
include_once('Figura.php');

class Circulo extends Figura implements FiguraGeometrica {
    public $radio;

    function __construct ($radio){
        parent::__construct();
        $this->radio = $radio;
    }

    function Area(){
        $area = 3.1416*$radio*$radio;
    }

    function Identificate(){
        return "Soy un Círculo, mi área es Pi Radio al Cuadrado";
    }
}