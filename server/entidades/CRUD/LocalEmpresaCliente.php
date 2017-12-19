<?php
class LocalEmpresaCliente
{
   public $id;
   public $idEmpresaCliente;
   public $RUC;
   public $nombreComercial;
   public $razonSocial;
   public $actividadComercial;
   public $paginaWEB;
   public $telefono1;
   public $telefono2;
   public $direccion;
   public $idTipo;

   function __construct($id,$idEmpresaCliente,$RUC,$nombreComercial,$razonSocial,$actividadComercial,$paginaWEB,$telefono1,$telefono2,$direccion,$idTipo){
      $this->id = $id;
      $this->idEmpresaCliente = $idEmpresaCliente;
      $this->RUC = $RUC;
      $this->nombreComercial = $nombreComercial;
      $this->razonSocial = $razonSocial;
      $this->actividadComercial = $actividadComercial;
      $this->paginaWEB = $paginaWEB;
      $this->telefono1 = $telefono1;
      $this->telefono2 = $telefono2;
      $this->direccion = $direccion;
      $this->idTipo = $idTipo;
   }
}
?>