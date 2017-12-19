<?php
class AsignacionOrdenInspeccionInspectores
{
   public $id;
   public $idInspector;
   public $idOrdenInspeccion;

   function __construct($id,$idInspector,$idOrdenInspeccion){
      $this->id = $id;
      $this->idInspector = $idInspector;
      $this->idOrdenInspeccion = $idOrdenInspeccion;
   }
}
?>