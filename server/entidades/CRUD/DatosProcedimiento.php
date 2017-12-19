<?php
class DatosProcedimiento
{
   public $id;
   public $idProcedimiento;
   public $descripcion;
   public $idUnidad;

   function __construct($id,$idProcedimiento,$descripcion,$idUnidad){
      $this->id = $id;
      $this->idProcedimiento = $idProcedimiento;
      $this->descripcion = $descripcion;
      $this->idUnidad = $idUnidad;
   }
}
?>