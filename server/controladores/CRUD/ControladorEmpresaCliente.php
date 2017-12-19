<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/EmpresaCliente.php');
class ControladorEmpresaCliente extends ControladorBase
{
   function crear(EmpresaCliente $empresacliente)
   {
      $sql = "INSERT INTO EmpresaCliente (RUC,nombreComercial,razonSocial,actividadComercial,paginaWEB,telefono1,telefono2,direccion,idTipo) VALUES (?,?,?,?,?,?,?,?,?);";
      $parametros = array($empresacliente->RUC,$empresacliente->nombreComercial,$empresacliente->razonSocial,$empresacliente->actividadComercial,$empresacliente->paginaWEB,$empresacliente->telefono1,$empresacliente->telefono2,$empresacliente->direccion,$empresacliente->idTipo);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(EmpresaCliente $empresacliente)
   {
      $parametros = array($empresacliente->RUC,$empresacliente->nombreComercial,$empresacliente->razonSocial,$empresacliente->actividadComercial,$empresacliente->paginaWEB,$empresacliente->telefono1,$empresacliente->telefono2,$empresacliente->direccion,$empresacliente->idTipo,$empresacliente->id);
      $sql = "UPDATE EmpresaCliente SET RUC = ?,nombreComercial = ?,razonSocial = ?,actividadComercial = ?,paginaWEB = ?,telefono1 = ?,telefono2 = ?,direccion = ?,idTipo = ? WHERE id = ?;";
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
      $sql = "DELETE FROM EmpresaCliente WHERE id = ?;";
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
         $sql = "SELECT * FROM EmpresaCliente;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM EmpresaCliente WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM EmpresaCliente LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM EmpresaCliente;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM EmpresaCliente WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM EmpresaCliente WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM EmpresaCliente WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM EmpresaCliente WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}