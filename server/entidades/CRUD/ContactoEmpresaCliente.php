<?php
class ContactoEmpresaCliente
{
   public $id;
   public $idPersona;
   public $cargo;
   public $direccion;
   public $idEmpresaCliente;

   function __construct($id,$idPersona,$cargo,$direccion,$idEmpresaCliente){
      $this->id = $id;
      $this->idPersona = $idPersona;
      $this->cargo = $cargo;
      $this->direccion = $direccion;
      $this->idEmpresaCliente = $idEmpresaCliente;
   }
}
?>