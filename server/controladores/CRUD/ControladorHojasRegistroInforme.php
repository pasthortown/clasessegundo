<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/HojasRegistroInforme.php');
class ControladorHojasRegistroInforme extends ControladorBase
{
   function crear(HojasRegistroInforme $hojasregistroinforme)
   {
      $sql = "INSERT INTO HojasRegistroInforme (idInforme,idHojaRegistro) VALUES (?,?);";
      $parametros = array($hojasregistroinforme->idInforme,$hojasregistroinforme->idHojaRegistro);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(HojasRegistroInforme $hojasregistroinforme)
   {
      $parametros = array($hojasregistroinforme->idInforme,$hojasregistroinforme->idHojaRegistro,$hojasregistroinforme->id);
      $sql = "UPDATE HojasRegistroInforme SET idInforme = ?,idHojaRegistro = ? WHERE id = ?;";
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
      $sql = "DELETE FROM HojasRegistroInforme WHERE id = ?;";
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
         $sql = "SELECT * FROM HojasRegistroInforme;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM HojasRegistroInforme WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM HojasRegistroInforme LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM HojasRegistroInforme;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM HojasRegistroInforme WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM HojasRegistroInforme WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM HojasRegistroInforme WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM HojasRegistroInforme WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}