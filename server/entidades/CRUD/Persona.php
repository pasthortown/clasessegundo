<?php
class Persona
{
   public $id;
   public $identificacion;
   public $nombre1;
   public $nombre2;
   public $apellido1;
   public $apellido2;
   public $fechaNacimiento;
   public $telefono1;
   public $telefono2;
   public $correoElectronico;
   public $idGenero;

   function __construct($id,$identificacion,$nombre1,$nombre2,$apellido1,$apellido2,$fechaNacimiento,$telefono1,$telefono2,$correoElectronico,$idGenero){
      $this->id = $id;
      $this->identificacion = $identificacion;
      $this->nombre1 = $nombre1;
      $this->nombre2 = $nombre2;
      $this->apellido1 = $apellido1;
      $this->apellido2 = $apellido2;
      $this->fechaNacimiento = $fechaNacimiento;
      $this->telefono1 = $telefono1;
      $this->telefono2 = $telefono2;
      $this->correoElectronico = $correoElectronico;
      $this->idGenero = $idGenero;
   }
}
?>