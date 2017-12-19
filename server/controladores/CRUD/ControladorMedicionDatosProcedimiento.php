<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/MedicionDatosProcedimiento.php');
class ControladorMedicionDatosProcedimiento extends ControladorBase
{
   function crear(MedicionDatosProcedimiento $mediciondatosprocedimiento)
   {
      $sql = "INSERT INTO MedicionDatosProcedimiento (idHojaRegistro,idDatosProcedimiento,valorMedido) VALUES (?,?,?);";
      $parametros = array($mediciondatosprocedimiento->idHojaRegistro,$mediciondatosprocedimiento->idDatosProcedimiento,$mediciondatosprocedimiento->valorMedido);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(MedicionDatosProcedimiento $mediciondatosprocedimiento)
   {
      $parametros = array($mediciondatosprocedimiento->idHojaRegistro,$mediciondatosprocedimiento->idDatosProcedimiento,$mediciondatosprocedimiento->valorMedido,$mediciondatosprocedimiento->id);
      $sql = "UPDATE MedicionDatosProcedimiento SET idHojaRegistro = ?,idDatosProcedimiento = ?,valorMedido = ? WHERE id = ?;";
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
      $sql = "DELETE FROM MedicionDatosProcedimiento WHERE id = ?;";
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
         $sql = "SELECT * FROM MedicionDatosProcedimiento;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM MedicionDatosProcedimiento WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM MedicionDatosProcedimiento LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM MedicionDatosProcedimiento;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM MedicionDatosProcedimiento WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM MedicionDatosProcedimiento WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM MedicionDatosProcedimiento WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM MedicionDatosProcedimiento WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}