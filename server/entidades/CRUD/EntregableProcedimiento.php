<?php
class EntregableProcedimiento
{
   public $id;
   public $idProcedimiento;
   public $descripcion;
   public $documento;

   function __construct($id,$idProcedimiento,$descripcion,$documento){
      $this->id = $id;
      $this->idProcedimiento = $idProcedimiento;
      $this->descripcion = $descripcion;
      $this->documento = $documento;
   }
}
?>