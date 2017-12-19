<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/Procedimiento.php');
class ControladorProcedimiento extends ControladorBase
{
   function crear(Procedimiento $procedimiento)
   {
      $sql = "INSERT INTO Procedimiento (descripcion,idServicio,documento) VALUES (?,?,?);";
      $parametros = array($procedimiento->descripcion,$procedimiento->idServicio,$procedimiento->documento);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(Procedimiento $procedimiento)
   {
      $parametros = array($procedimiento->descripcion,$procedimiento->idServicio,$procedimiento->documento,$procedimiento->id);
      $sql = "UPDATE Procedimiento SET descripcion = ?,idServicio = ?,documento = ? WHERE id = ?;";
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
      $sql = "DELETE FROM Procedimiento WHERE id = ?;";
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
         $sql = "SELECT * FROM Procedimiento;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM Procedimiento WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM Procedimiento LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM Procedimiento;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM Procedimiento WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM Procedimiento WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM Procedimiento WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM Procedimiento WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}