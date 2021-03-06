<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/OrdenInspeccion.php');
class ControladorOrdenInspeccion extends ControladorBase
{
   function crear(OrdenInspeccion $ordeninspeccion)
   {
      $sql = "INSERT INTO OrdenInspeccion (idSolicitud,fecha,idLiderDepartamento) VALUES (?,?,?);";
      $parametros = array($ordeninspeccion->idSolicitud,$ordeninspeccion->fecha,$ordeninspeccion->idLiderDepartamento);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(OrdenInspeccion $ordeninspeccion)
   {
      $parametros = array($ordeninspeccion->idSolicitud,$ordeninspeccion->fecha,$ordeninspeccion->idLiderDepartamento,$ordeninspeccion->id);
      $sql = "UPDATE OrdenInspeccion SET idSolicitud = ?,fecha = ?,idLiderDepartamento = ? WHERE id = ?;";
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
      $sql = "DELETE FROM OrdenInspeccion WHERE id = ?;";
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
         $sql = "SELECT * FROM OrdenInspeccion;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM OrdenInspeccion WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM OrdenInspeccion LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM OrdenInspeccion;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM OrdenInspeccion WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM OrdenInspeccion WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM OrdenInspeccion WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM OrdenInspeccion WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}