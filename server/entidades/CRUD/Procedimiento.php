<?php
class Procedimiento
{
   public $id;
   public $descripcion;
   public $idServicio;
   public $documento;

   function __construct($id,$descripcion,$idServicio,$documento){
      $this->id = $id;
      $this->descripcion = $descripcion;
      $this->idServicio = $idServicio;
      $this->documento = $documento;
   }
}
?>