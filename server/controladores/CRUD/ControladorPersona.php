<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/CRUD/Persona.php');
class ControladorPersona extends ControladorBase
{
   function crear(Persona $persona)
   {
      $sql = "INSERT INTO Persona (identificacion,nombre1,nombre2,apellido1,apellido2,fechaNacimiento,telefono1,telefono2,correoElectronico,idGenero) VALUES (?,?,?,?,?,?,?,?,?,?);";
      $parametros = array($persona->identificacion,$persona->nombre1,$persona->nombre2,$persona->apellido1,$persona->apellido2,$persona->fechaNacimiento,$persona->telefono1,$persona->telefono2,$persona->correoElectronico,$persona->idGenero);
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      if(is_null($respuesta[0])){
         return true;
      }else{
         return false;
      }
   }

   function actualizar(Persona $persona)
   {
      $parametros = array($persona->identificacion,$persona->nombre1,$persona->nombre2,$persona->apellido1,$persona->apellido2,$persona->fechaNacimiento,$persona->telefono1,$persona->telefono2,$persona->correoElectronico,$persona->idGenero,$persona->id);
      $sql = "UPDATE Persona SET identificacion = ?,nombre1 = ?,nombre2 = ?,apellido1 = ?,apellido2 = ?,fechaNacimiento = ?,telefono1 = ?,telefono2 = ?,correoElectronico = ?,idGenero = ? WHERE id = ?;";
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
      $sql = "DELETE FROM Persona WHERE id = ?;";
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
         $sql = "SELECT * FROM Persona;";
      }else{
      $parametros = array($id);
         $sql = "SELECT * FROM Persona WHERE id = ?;";
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function leer_paginado($pagina,$registrosPorPagina)
   {
      $desde = (($pagina-1)*$registrosPorPagina);
      $sql ="SELECT * FROM Persona LIMIT $desde,$registrosPorPagina;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }

   function numero_paginas($registrosPorPagina)
   {
      $sql ="SELECT IF(ceil(count(*)/$registrosPorPagina)>0,ceil(count(*)/$registrosPorPagina),1) as 'paginas' FROM Persona;";
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta[0];
   }

   function leer_filtrado(string $nombreColumna, string $tipoFiltro, string $filtro)
   {
      switch ($tipoFiltro){
         case "coincide":
            $parametros = array($filtro);
            $sql = "SELECT * FROM Persona WHERE $nombreColumna = ?;";
            break;
         case "inicia":
            $sql = "SELECT * FROM Persona WHERE $nombreColumna LIKE '$filtro%';";
            break;
         case "termina":
            $sql = "SELECT * FROM Persona WHERE $nombreColumna LIKE '%$filtro';";
            break;
         default:
            $sql = "SELECT * FROM Persona WHERE $nombreColumna LIKE '%$filtro%';";
            break;
      }
      $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
      return $respuesta;
   }
}