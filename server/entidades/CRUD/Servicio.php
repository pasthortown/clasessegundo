<?php
class Servicio
{
   public $id;
   public $descripcion;
   public $costo;

   function __construct($id,$descripcion,$costo){
      $this->id = $id;
      $this->descripcion = $descripcion;
      $this->costo = $costo;
   }
}
?>