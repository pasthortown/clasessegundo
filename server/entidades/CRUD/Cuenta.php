<?php
class Cuenta
{
   public $id;
   public $nickname;
   public $idPersona;
   public $idRol;
   public $clave;

   function __construct($id,$nickname,$idPersona,$idRol,$clave){
      $this->id = $id;
      $this->nickname = $nickname;
      $this->idPersona = $idPersona;
      $this->idRol = $idRol;
      $this->clave = $clave;
   }
}
?>