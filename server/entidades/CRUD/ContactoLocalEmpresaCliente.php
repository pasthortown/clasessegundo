<?php
class ContactoLocalEmpresaCliente
{
   public $id;
   public $idPersona;
   public $cargo;
   public $direccion;
   public $idLocalEmpresaCliente;

   function __construct($id,$idPersona,$cargo,$direccion,$idLocalEmpresaCliente){
      $this->id = $id;
      $this->idPersona = $idPersona;
      $this->cargo = $cargo;
      $this->direccion = $direccion;
      $this->idLocalEmpresaCliente = $idLocalEmpresaCliente;
   }
}
?>