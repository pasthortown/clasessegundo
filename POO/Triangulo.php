<?php
include_once('FiguraGeometrica.php');
include_once('Figura.php');

class Triangulo extends Figura implements FiguraGeometrica{
    public $base;
    public $altura;

    function __construct ($base, $altura){
        parent::__construct();
        $this->base = $base;
        $this->altura = $altura;
    }

    function Area(){
        $area = $base*$altura*(0.5);
    }

    function Identificate(){
        return "Soy un Triángulo, mi área es Base por Altura Sobre 2";
    }
}