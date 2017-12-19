<?php
class EntregableServicio
{
   public $id;
   public $idServicio;
   public $descripcion;
   public $documento;

   function __construct($id,$idServicio,$descripcion,$documento){
      $this->id = $id;
      $this->idServicio = $idServicio;
      $this->descripcion = $descripcion;
      $this->documento = $documento;
   }
}
?>