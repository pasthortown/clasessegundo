<?php
include_once('../routers/RouterBase.php');
include_once('../routers/RouterFuncionalidadesEspecificas.php');
function cargarRouters() {
   define("routersPath", "../routers/");
   $files = glob(routersPath."CRUD/*.php");
   foreach ($files as $filename) {
      include_once($filename);
   }
}
cargarRouters();

class RouterPrincipal extends RouterBase
{
   function route(){
      switch(strtolower($this->datosURI->controlador)){
         case "asignacionordeninspeccioninspectores":
            $routerAsignacionOrdenInspeccionInspectores = new RouterAsignacionOrdenInspeccionInspectores();
            return json_encode($routerAsignacionOrdenInspeccionInspectores->route());
            break;
         case "certificado":
            $routerCertificado = new RouterCertificado();
            return json_encode($routerCertificado->route());
            break;
         case "contactoempresacliente":
            $routerContactoEmpresaCliente = new RouterContactoEmpresaCliente();
            return json_encode($routerContactoEmpresaCliente->route());
            break;
         case "contactolocalempresacliente":
            $routerContactoLocalEmpresaCliente = new RouterContactoLocalEmpresaCliente();
            return json_encode($routerContactoLocalEmpresaCliente->route());
            break;
         case "cuenta":
            $routerCuenta = new RouterCuenta();
            return json_encode($routerCuenta->route());
            break;
         case "datosprocedimiento":
            $routerDatosProcedimiento = new RouterDatosProcedimiento();
            return json_encode($routerDatosProcedimiento->route());
            break;
         case "empresacliente":
            $routerEmpresaCliente = new RouterEmpresaCliente();
            return json_encode($routerEmpresaCliente->route());
            break;
         case "entregableprocedimiento":
            $routerEntregableProcedimiento = new RouterEntregableProcedimiento();
            return json_encode($routerEntregableProcedimiento->route());
            break;
         case "entregableservicio":
            $routerEntregableServicio = new RouterEntregableServicio();
            return json_encode($routerEntregableServicio->route());
            break;
         case "genero":
            $routerGenero = new RouterGenero();
            return json_encode($routerGenero->route());
            break;
         case "hojaregistro":
            $routerHojaRegistro = new RouterHojaRegistro();
            return json_encode($routerHojaRegistro->route());
            break;
         case "hojasregistroinforme":
            $routerHojasRegistroInforme = new RouterHojasRegistroInforme();
            return json_encode($routerHojasRegistroInforme->route());
            break;
         case "informe":
            $routerInforme = new RouterInforme();
            return json_encode($routerInforme->route());
            break;
         case "inspector":
            $routerInspector = new RouterInspector();
            return json_encode($routerInspector->route());
            break;
         case "liderdepartamento":
            $routerLiderDepartamento = new RouterLiderDepartamento();
            return json_encode($routerLiderDepartamento->route());
            break;
         case "localempresacliente":
            $routerLocalEmpresaCliente = new RouterLocalEmpresaCliente();
            return json_encode($routerLocalEmpresaCliente->route());
            break;
         case "mediciondatosprocedimiento":
            $routerMedicionDatosProcedimiento = new RouterMedicionDatosProcedimiento();
            return json_encode($routerMedicionDatosProcedimiento->route());
            break;
         case "ordeninspeccion":
            $routerOrdenInspeccion = new RouterOrdenInspeccion();
            return json_encode($routerOrdenInspeccion->route());
            break;
         case "persona":
            $routerPersona = new RouterPersona();
            return json_encode($routerPersona->route());
            break;
         case "procedimiento":
            $routerProcedimiento = new RouterProcedimiento();
            return json_encode($routerProcedimiento->route());
            break;
         case "roles":
            $routerRoles = new RouterRoles();
            return json_encode($routerRoles->route());
            break;
         case "servicio":
            $routerServicio = new RouterServicio();
            return json_encode($routerServicio->route());
            break;
         case "solicitud":
            $routerSolicitud = new RouterSolicitud();
            return json_encode($routerSolicitud->route());
            break;
         case "solicitudserviciolocalcliente":
            $routerSolicitudServicioLocalCliente = new RouterSolicitudServicioLocalCliente();
            return json_encode($routerSolicitudServicioLocalCliente->route());
            break;
         case "tipoempresa":
            $routerTipoEmpresa = new RouterTipoEmpresa();
            return json_encode($routerTipoEmpresa->route());
            break;
         case "tipolocal":
            $routerTipoLocal = new RouterTipoLocal();
            return json_encode($routerTipoLocal->route());
            break;
         case "unidad":
            $routerUnidad = new RouterUnidad();
            return json_encode($routerUnidad->route());
            break;
         case "fotopersona":
            $routerfotoPersona = new RouterfotoPersona();
            return json_encode($routerfotoPersona->route());
            break;
         default:
            $routerEspeficias = new RouterFuncionalidadesEspecificas();
            return $routerEspeficias->route();
            break;
      }
   }
}
