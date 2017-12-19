<?php
class Solicitud
{
   public $id;
   public $idContactoSolicitante;
   public $idServicioSolicitado;
   public $fecha;
   public $documento;

   function __construct($id,$idContactoSolicitante,$idServicioSolicitado,$fecha,$documento){
      $this->id = $id;
      $this->idContactoSolicitante = $idContactoSolicitante;
      $this->idServicioSolicitado = $idServicioSolicitado;
      $this->fecha = $fecha;
      $this->documento = $documento;
   }
}
?>