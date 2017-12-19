<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/SolicitudServicioLocalCliente.php');
class ControladorSolicitudServicioLocalCliente extends ControladorBase
{
   function crear(SolicitudServicioLocalCliente $solicitudserviciolocalcliente)
   {
      $sql = "INSERT INTO SolicitudServicioLocalCliente (idSolicitud,idLocalCliente) VALUES (?,?);";
      $parametros = array($solicitudserviciolocalcliente->idSolicitud,$solicitudserviciolocalcliente->idLocalCliente);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(SolicitudServicioLocalCliente $solicitudserviciolocalcliente)
   {
      $parametros = array($solicitudserviciolocalcliente->idSolicitud,$solicitudserviciolocalcliente->idLocalCliente,$solicitudserviciolocalcliente->id);
      $sql = "UPDATE SolicitudServicioLocalCliente SET idSolicitud = ?,idLocalCliente = ? WHERE id = ?;";
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
      $sql = "DELETE FROM SolicitudServicioLocalCliente WHERE id = ?;";
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
         $sql = "SELECT * FROM SolicitudServicioLocalCliente;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM SolicitudServicioLocalCliente WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM SolicitudServicioLocalCliente LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM SolicitudServicioLocalCliente;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM SolicitudServicioLocalCliente WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM SolicitudServicioLocalCliente WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM SolicitudServicioLocalCliente WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM SolicitudServicioLocalCliente WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}