<?php
class OrdenInspeccion
{
   public $id;
   public $idSolicitud;
   public $fecha;
   public $idLiderDepartamento;

   function __construct($id,$idSolicitud,$fecha,$idLiderDepartamento){
      $this->id = $id;
      $this->idSolicitud = $idSolicitud;
      $this->fecha = $fecha;
      $this->idLiderDepartamento = $idLiderDepartamento;
   }
}
?>