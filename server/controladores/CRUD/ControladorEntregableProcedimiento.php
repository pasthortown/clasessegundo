<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/EntregableProcedimiento.php');
class ControladorEntregableProcedimiento extends ControladorBase
{
   function crear(EntregableProcedimiento $entregableprocedimiento)
   {
      $sql = "INSERT INTO EntregableProcedimiento (idProcedimiento,descripcion,documento) VALUES (?,?,?);";
      $parametros = array($entregableprocedimiento->idProcedimiento,$entregableprocedimiento->descripcion,$entregableprocedimiento->documento);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(EntregableProcedimiento $entregableprocedimiento)
   {
      $parametros = array($entregableprocedimiento->idProcedimiento,$entregableprocedimiento->descripcion,$entregableprocedimiento->documento,$entregableprocedimiento->id);
      $sql = "UPDATE EntregableProcedimiento SET idProcedimiento = ?,descripcion = ?,documento = ? WHERE id = ?;";
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
      $sql = "DELETE FROM EntregableProcedimiento WHERE id = ?;";
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
         $sql = "SELECT * FROM EntregableProcedimiento;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM EntregableProcedimiento WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM EntregableProcedimiento LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM EntregableProcedimiento;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM EntregableProcedimiento WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM EntregableProcedimiento WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM EntregableProcedimiento WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM EntregableProcedimiento WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}