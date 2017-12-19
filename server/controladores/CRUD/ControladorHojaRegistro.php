<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/HojaRegistro.php');
class ControladorHojaRegistro extends ControladorBase
{
   function crear(HojaRegistro $hojaregistro)
   {
      $sql = "INSERT INTO HojaRegistro (fecha,idLocalCliente,idOrdenInspeccion,idInspector) VALUES (?,?,?,?);";
      $parametros = array($hojaregistro->fecha,$hojaregistro->idLocalCliente,$hojaregistro->idOrdenInspeccion,$hojaregistro->idInspector);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(HojaRegistro $hojaregistro)
   {
      $parametros = array($hojaregistro->fecha,$hojaregistro->idLocalCliente,$hojaregistro->idOrdenInspeccion,$hojaregistro->idInspector,$hojaregistro->id);
      $sql = "UPDATE HojaRegistro SET fecha = ?,idLocalCliente = ?,idOrdenInspeccion = ?,idInspector = ? WHERE id = ?;";
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
      $sql = "DELETE FROM HojaRegistro WHERE id = ?;";
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
         $sql = "SELECT * FROM HojaRegistro;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM HojaRegistro WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM HojaRegistro LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM HojaRegistro;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM HojaRegistro WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM HojaRegistro WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM HojaRegistro WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM HojaRegistro WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}