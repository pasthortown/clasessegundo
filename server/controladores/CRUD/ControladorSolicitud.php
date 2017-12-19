<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/Solicitud.php');
class ControladorSolicitud extends ControladorBase
{
   function crear(Solicitud $solicitud)
   {
      $sql = "INSERT INTO Solicitud (idContactoSolicitante,idServicioSolicitado,fecha,documento) VALUES (?,?,?,?);";
      $parametros = array($solicitud->idContactoSolicitante,$solicitud->idServicioSolicitado,$solicitud->fecha,$solicitud->documento);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(Solicitud $solicitud)
   {
      $parametros = array($solicitud->idContactoSolicitante,$solicitud->idServicioSolicitado,$solicitud->fecha,$solicitud->documento,$solicitud->id);
      $sql = "UPDATE Solicitud SET idContactoSolicitante = ?,idServicioSolicitado = ?,fecha = ?,documento = ? WHERE id = ?;";
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
      $sql = "DELETE FROM Solicitud WHERE id = ?;";
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
         $sql = "SELECT * FROM Solicitud;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM Solicitud WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM Solicitud LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM Solicitud;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM Solicitud WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM Solicitud WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM Solicitud WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM Solicitud WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}