<?php
class MedicionDatosProcedimiento
{
   public $id;
   public $idHojaRegistro;
   public $idDatosProcedimiento;
   public $valorMedido;

   function __construct($id,$idHojaRegistro,$idDatosProcedimiento,$valorMedido){
      $this->id = $id;
      $this->idHojaRegistro = $idHojaRegistro;
      $this->idDatosProcedimiento = $idDatosProcedimiento;
      $this->valorMedido = $valorMedido;
   }
}
?>