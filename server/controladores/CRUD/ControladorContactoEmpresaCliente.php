<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/ContactoEmpresaCliente.php');
class ControladorContactoEmpresaCliente extends ControladorBase
{
   function crear(ContactoEmpresaCliente $contactoempresacliente)
   {
      $sql = "INSERT INTO ContactoEmpresaCliente (idPersona,cargo,direccion,idEmpresaCliente) VALUES (?,?,?,?);";
      $parametros = array($contactoempresacliente->idPersona,$contactoempresacliente->cargo,$contactoempresacliente->direccion,$contactoempresacliente->idEmpresaCliente);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(ContactoEmpresaCliente $contactoempresacliente)
   {
      $parametros = array($contactoempresacliente->idPersona,$contactoempresacliente->cargo,$contactoempresacliente->direccion,$contactoempresacliente->idEmpresaCliente,$contactoempresacliente->id);
      $sql = "UPDATE ContactoEmpresaCliente SET idPersona = ?,cargo = ?,direccion = ?,idEmpresaCliente = ? WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function borrar(int $id)
   {
      $parametros = array($id);
      $sql = "DELETE FROM ContactoEmpresaCliente WHERE id = ?;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function leer($id)
   {
      if ($id==""){
         $sql = "SELECT * FROM ContactoEmpresaCliente;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM ContactoEmpresaCliente WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM ContactoEmpresaCliente LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM ContactoEmpresaCliente;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM ContactoEmpresaCliente WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM ContactoEmpresaCliente WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM ContactoEmpresaCliente WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM ContactoEmpresaCliente WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}