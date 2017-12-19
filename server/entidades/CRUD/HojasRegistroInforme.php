<?php
class HojasRegistroInforme
{
   public $id;
   public $idInforme;
   public $idHojaRegistro;

   function __construct($id,$idInforme,$idHojaRegistro){
      $this->id = $id;
      $this->idInforme = $idInforme;
      $this->idHojaRegistro = $idHojaRegistro;
   }
}
?>