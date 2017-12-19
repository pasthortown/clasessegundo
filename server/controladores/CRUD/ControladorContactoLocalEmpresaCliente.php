<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/ContactoLocalEmpresaCliente.php');
class ControladorContactoLocalEmpresaCliente extends ControladorBase
{
   function crear(ContactoLocalEmpresaCliente $contactolocalempresacliente)
   {
      $sql = "INSERT INTO ContactoLocalEmpresaCliente (idPersona,cargo,direccion,idLocalEmpresaCliente) VALUES (?,?,?,?);";
      $parametros = array($contactolocalempresacliente->idPersona,$contactolocalempresacliente->cargo,$contactolocalempresacliente->direccion,$contactolocalempresacliente->idLocalEmpresaCliente);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(ContactoLocalEmpresaCliente $contactolocalempresacliente)
   {
      $parametros = array($contactolocalempresacliente->idPersona,$contactolocalempresacliente->cargo,$contactolocalempresacliente->direccion,$contactolocalempresacliente->idLocalEmpresaCliente,$contactolocalempresacliente->id);
      $sql = "UPDATE ContactoLocalEmpresaCliente SET idPersona = ?,cargo = ?,direccion = ?,idLocalEmpresaCliente = ? WHERE id = ?;";
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
      $sql = "DELETE FROM ContactoLocalEmpresaCliente WHERE id = ?;";
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
         $sql = "SELECT * FROM ContactoLocalEmpresaCliente;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM ContactoLocalEmpresaCliente WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM ContactoLocalEmpresaCliente LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM ContactoLocalEmpresaCliente;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM ContactoLocalEmpresaCliente WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM ContactoLocalEmpresaCliente WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM ContactoLocalEmpresaCliente WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM ContactoLocalEmpresaCliente WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}