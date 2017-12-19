<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/EntregableServicio.php');
class ControladorEntregableServicio extends ControladorBase
{
   function crear(EntregableServicio $entregableservicio)
   {
      $sql = "INSERT INTO EntregableServicio (idServicio,descripcion,documento) VALUES (?,?,?);";
      $parametros = array($entregableservicio->idServicio,$entregableservicio->descripcion,$entregableservicio->documento);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(EntregableServicio $entregableservicio)
   {
      $parametros = array($entregableservicio->idServicio,$entregableservicio->descripcion,$entregableservicio->documento,$entregableservicio->id);
      $sql = "UPDATE EntregableServicio SET idServicio = ?,descripcion = ?,documento = ? WHERE id = ?;";
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
      $sql = "DELETE FROM EntregableServicio WHERE id = ?;";
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
         $sql = "SELECT * FROM EntregableServicio;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM EntregableServicio WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM EntregableServicio LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM EntregableServicio;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM EntregableServicio WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM EntregableServicio WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM EntregableServicio WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM EntregableServicio WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}