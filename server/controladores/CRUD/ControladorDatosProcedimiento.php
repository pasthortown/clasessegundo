<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/DatosProcedimiento.php');
class ControladorDatosProcedimiento extends ControladorBase
{
   function crear(DatosProcedimiento $datosprocedimiento)
   {
      $sql = "INSERT INTO DatosProcedimiento (idProcedimiento,descripcion,idUnidad) VALUES (?,?,?);";
      $parametros = array($datosprocedimiento->idProcedimiento,$datosprocedimiento->descripcion,$datosprocedimiento->idUnidad);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(DatosProcedimiento $datosprocedimiento)
   {
      $parametros = array($datosprocedimiento->idProcedimiento,$datosprocedimiento->descripcion,$datosprocedimiento->idUnidad,$datosprocedimiento->id);
      $sql = "UPDATE DatosProcedimiento SET idProcedimiento = ?,descripcion = ?,idUnidad = ? WHERE id = ?;";
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
      $sql = "DELETE FROM DatosProcedimiento WHERE id = ?;";
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
         $sql = "SELECT * FROM DatosProcedimiento;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM DatosProcedimiento WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM DatosProcedimiento LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM DatosProcedimiento;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM DatosProcedimiento WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM DatosProcedimiento WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM DatosProcedimiento WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM DatosProcedimiento WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}