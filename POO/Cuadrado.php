<?php
include_once('FiguraGeometrica.php');
include_once('Figura.php');

class Cuadrado extends Figura implements FiguraGeometrica {
    public $lado;

    function __construct ($lado){
        parent::__construct();
        $this->lado = $lado;
    }

    function Area(){
        $area = $lado*$lado;
    }

    function Identificate(){
        return "Soy un Cuadrado, mi área es Lado por Lado";
    }
}