<?php
include_once('../controladores/ControladorBase.php');
include_once('../entidades/especificos/LoginResult.php');
include_once('../entidades/CRUD/Persona.php');
class ControladorLogin extends ControladorBase
{
   function login(String $email, String $clave)
   { 
        $sql = "SELECT Persona.id as 'idPersona', Cuenta.idRol as 'idRol' FROM Persona INNER JOIN Cuenta ON Cuenta.idPersona = Persona.id WHERE Persona.correoElectronico = ? AND Cuenta.clave = AES_ENCRYPT(?,?);";
        $parametros = array($email, $clave, 'CLAVE DE CIFRADO');
        $respuesta = $this->conexion->ejecutarConsulta($sql,$parametros);
        if(is_null($respuesta[0])||$respuesta[0]==0){
           return false;
        }else{
            return $respuesta;
        }   
   }
}