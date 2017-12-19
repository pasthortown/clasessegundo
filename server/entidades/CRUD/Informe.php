<?php
class Informe
{
   public $id;
   public $idLiderDepartamentoTecnico;
   public $fecha;
   public $documento;

   function __construct($id,$idLiderDepartamentoTecnico,$fecha,$documento){
      $this->id = $id;
      $this->idLiderDepartamentoTecnico = $idLiderDepartamentoTecnico;
      $this->fecha = $fecha;
      $this->documento = $documento;
   }
}
?>