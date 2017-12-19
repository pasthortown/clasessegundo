<?php
class LiderDepartamento
{
   public $id;
   public $idPersona;

   function __construct($id,$idPersona){
      $this->id = $id;
      $this->idPersona = $idPersona;
   }
}
?>