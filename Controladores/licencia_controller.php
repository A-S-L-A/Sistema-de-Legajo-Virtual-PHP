<?php 

	class LicenciaController
	{	
		public function __construct(){}

		public function index(){
		
          require_once 'Modelos/licenciaM.php';
		  $licencias=Licencia::all();
		  include "Vistas/Licencia/pendientes.php";
		}
		public function news(){
			require_once('Modelos/licenciaM.php');
			$licencias=Licencia::obtenerActivas();
			include "Vistas/Licencia/activas.php";
		}
		public function register(){
			require_once('Vistas/Licencia/registrarl.php');
		}
   
		public function save($licencia){
			Licencia::SaveLicencia($licencia);
			$mensaje="Solicitud enviada exitosamente";
		}

		public function update($licencia){
			Licencia::update($licencia);
			header('Location: ../inicio_licenciaM.php');
		}

		public function delete($licencia){
			require_once('Modelos/licenciaM.php');
			Licencia::delete($id);
		    header('Location: ../inicio_licencia.php');
		}
		public function history(){
			require_once('Modelos/licenciaM.php');
			$licencias=Licencia::obtenerHistorial($_SESSION['IdEmpleado']);
			include "Vistas/Licencia/historial_empleado.php";
		}
				
		public function error(){
			require_once('Vistas/Licencia/error.php');
		} 
	}


	if (isset($_POST['action'])) {
		$licenciaController= new LicenciaController();
		require_once('Modelos/licenciaM.php');
		
		if ($_POST['action']=='register') {
            
			define('CONTROLADOR', TRUE);
                       
            if (isset($_POST['Desde'])) {
                $Fecha1 = $_POST['Desde'];
                $timestamp = strtotime(str_replace('/', '-', $Fecha1));
                if ($timestamp !== false) {
                    $desde = date("Y-m-d", $timestamp);
                } else {
                     $desde = 'ERROR EN FECHA';
                }
              } else {
                $desde = "";
              } 
			  if (isset($_POST['Hasta'])) {
                $Fecha1 = $_POST['Hasta'];
                $timestamp = strtotime(str_replace('/', '-', $Fecha1));
                if ($timestamp !== false) {
                    $hasta = date("Y-m-d", $timestamp);
                } else {
                     $hasta = 'ERROR EN FECHA';
                }
              } else {
                $hasta = "";
              } 

			
			  
            $licencia= new Licencia( $_POST['IdEmpleado'],$_POST['IdTipoLicencia'], $desde, $hasta,1);
            $licenciaController->save($licencia);
                  
		}elseif ($_POST['action']=='update') {
			if (isset($_POST['desde'])) {
                $Fecha1 = $_POST['desde'];
                $timestamp = strtotime(str_replace('/', '-', $Fecha1));
                if ($timestamp !== false) {
                    $desde = date("Y-m-d", $timestamp);
                } else {
                     $desde = 'ERROR EN FECHA';
                }
              } else {
                $desde = "";
              } 
			  if (isset($_POST['hasta'])) {
                $Fecha1 = $_POST['hasta'];
                $timestamp = strtotime(str_replace('/', '-', $Fecha1));
                if ($timestamp !== false) {
                    $hasta = date("Y-m-d", $timestamp);
                } else {
                     $hasta = 'ERROR EN FECHA';
                }
              } else {
                $hasta = "";
              } 
			  $licencia= new Licencia($_POST['IdLicencia'],$_POST['IdEmpleado'],$_POST['IdTipoLicencia'], $desde, $hasta,'Pendiente');
			  $licenciaController->update($licencia);
		}		
	}

	//se verifica que action esté definida
	if (isset($_GET['action'])) {
		if ($_GET['action']!='register'& $_GET['action']!='index' ) {
			$licenciaController=new LicenciaController();
			//para eliminar
			if ($_GET['action']=='delete') {		
				$licenciaController->delete($_GET['IdLicencia']);
			}else if ($_GET['action']=='update') {//mostrar la vista update con los datos del registro actualizar
				require_once('Modelos/licenciaM.php');				
				$licencia=Licencia::getById($_GET['IdLicencia']);		
				require_once('Vistas/Licencia/modificarl.php');
			}	
		}	
	}
?>