<?php
class Certificado
{
   public $id;
   public $idInforme;

   function __construct($id,$idInforme){
      $this->id = $id;
      $this->idInforme = $idInforme;
   }
}
?>