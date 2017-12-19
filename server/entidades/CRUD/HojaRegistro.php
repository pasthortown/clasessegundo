<?php
class HojaRegistro
{
   public $id;
   public $fecha;
   public $idLocalCliente;
   public $idOrdenInspeccion;
   public $idInspector;

   function __construct($id,$fecha,$idLocalCliente,$idOrdenInspeccion,$idInspector){
      $this->id = $id;
      $this->fecha = $fecha;
      $this->idLocalCliente = $idLocalCliente;
      $this->idOrdenInspeccion = $idOrdenInspeccion;
      $this->idInspector = $idInspector;
   }
}
?>