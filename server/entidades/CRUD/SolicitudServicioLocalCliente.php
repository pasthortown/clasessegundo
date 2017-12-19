<?php
class SolicitudServicioLocalCliente
{
   public $id;
   public $idSolicitud;
   public $idLocalCliente;

   function __construct($id,$idSolicitud,$idLocalCliente){
      $this->id = $id;
      $this->idSolicitud = $idSolicitud;
      $this->idLocalCliente = $idLocalCliente;
   }
}
?>