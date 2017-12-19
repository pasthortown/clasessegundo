<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/LocalEmpresaCliente.php');
class ControladorLocalEmpresaCliente extends ControladorBase
{
   function crear(LocalEmpresaCliente $localempresacliente)
   {
      $sql = "INSERT INTO LocalEmpresaCliente (idEmpresaCliente,RUC,nombreComercial,razonSocial,actividadComercial,paginaWEB,telefono1,telefono2,direccion,idTipo) VALUES (?,?,?,?,?,?,?,?,?,?);";
      $parametros = array($localempresacliente->idEmpresaCliente,$localempresacliente->RUC,$localempresacliente->nombreComercial,$localempresacliente->razonSocial,$localempresacliente->actividadComercial,$localempresacliente->paginaWEB,$localempresacliente->telefono1,$localempresacliente->telefono2,$localempresacliente->direccion,$localempresacliente->idTipo);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(LocalEmpresaCliente $localempresacliente)
   {
      $parametros = array($localempresacliente->idEmpresaCliente,$localempresacliente->RUC,$localempresacliente->nombreComercial,$localempresacliente->razonSocial,$localempresacliente->actividadComercial,$localempresacliente->paginaWEB,$localempresacliente->telefono1,$localempresacliente->telefono2,$localempresacliente->direccion,$localempresacliente->idTipo,$localempresacliente->id);
      $sql = "UPDATE LocalEmpresaCliente SET idEmpresaCliente = ?,RUC = ?,nombreComercial = ?,razonSocial = ?,actividadComercial = ?,paginaWEB = ?,telefono1 = ?,telefono2 = ?,direccion = ?,idTipo = ? WHERE id = ?;";
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
      $sql = "DELETE FROM LocalEmpresaCliente WHERE id = ?;";
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
         $sql = "SELECT * FROM LocalEmpresaCliente;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM LocalEmpresaCliente WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM LocalEmpresaCliente LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM LocalEmpresaCliente;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM LocalEmpresaCliente WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM LocalEmpresaCliente WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM LocalEmpresaCliente WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM LocalEmpresaCliente WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}