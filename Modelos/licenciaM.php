<?php
require_once "ConexionBD.php";
class Licencia
{
	//atributos
	public $IdLicencia;
    public $IdEmpleado;
    public $IdTipoLicencia;
	public $Desde;
	public $Hasta;
    public $IdEstado;
	
       
	//constructor de la clase
	// function __construct($IdLicencia,$IdEmpleado,$IdTipoLicencia,$Desde,$Hasta,$IdEstado)
	// {
	// 	$this->IdLicencia=$IdLicencia;
    //     $this->IdEmpleado=$IdEmpleado;
    //     $this->IdTipoLicencia=$IdTipoLicencia;
	// 	$this->Desde=$Desde;
	// 	$this->Hasta=$Hasta;
	// 	$this->IdEstado=$IdEstado;
           
	// }

	function __construct($IdEmpleado,$IdTipoLicencia,$Desde,$Hasta,$IdEstado)
	{
		
	    $this->IdEmpleado=$IdEmpleado;
        $this->IdTipoLicencia=$IdTipoLicencia;
		$this->Desde=$Desde;
		$this->Hasta=$Hasta;
		$this->IdEstado=$IdEstado;
           
	}

	

	public static function all(){
		
		$sql="SELECT * FROM licencias l where l.IdEstado=1";
		$db=ConexionBD::cBD()->prepare($sql);
		$db->execute();
        foreach ($db->fetchAll() as $licencia) {
			$listaLicencias[]= new Licencia($licencia['IdEmpleado'], $licencia['IdTipoLicencia'], $licencia['Desde'],$licencia['Hasta'],$licencia['IdEstado']);
			
		}

		return $listaLicencias;
	}

	public static function obtenerActivas(){
		$sql = "SELECT * FROM licencias l WHERE l.IdEstado <> 1";
		$db = ConexionBD::cBD()->prepare($sql);
		$db->execute();
	
		$listaLicencias = array(); // Declara y asigna la variable $listaLicencias antes del bucle
	
		foreach ($db->fetchAll() as $licencia) {
			$listaLicencias[] = new Licencia($licencia['IdLicencia'], $licencia['IdEmpleado'], $licencia['IdTipoLicencia'], $licencia['Desde'], $licencia['Hasta'], $licencia['IdEstado']);
		}
		
		return $listaLicencias;
	}
	
	public static function obtenerHistorial($id){
		
		$sql="SELECT * FROM licencias l where l.IdEmpleado=:IdLicencia";
		$db=ConexionBD::cBD()->prepare($sql);
		$db->bindParam(":IdLicencia", $id, PDO::PARAM_INT);
		$db->execute();
        foreach ($db->fetchAll() as $licencia) {
			$listaLicencias[]= new Licencia($licencia['IdLicencia'],$licencia['IdEmpleado'], $licencia['IdTipoLicencia'], $licencia['Desde'],$licencia['Hasta'],$licencia['IdEstado']);
		}
		return $listaLicencias;
	}

	public static function UpdateLicencia($licencia){
		$db=ConexionBD::getConnect();
        $update=$db->prepare("UPDATE licencia SET IdTipoLicencia='$licencia->IdTipoLicencia', Desde='$licencia->Desde', Hasta='$licencia->Hasta', IdEstado='$licencia->IdEstado' WHERE IdLicencia='$licencia->IdLicencia'");
        $update->execute();
	}
	
    public static function SaveLicencia($licencia){
		    
			$sql="INSERT INTO licencias VALUES(:IdLicencia, :IdEmpleado, :IdTipoLicencia, :Desde, :Hasta, :IdEstado)";
			$insert=ConexionBD::cBD()->prepare($sql);
			$insert->bindParam(":IdLicencia", $licencia->IdLicencia, PDO::PARAM_INT);
			$insert->bindParam(":IdEmpleado", $licencia->IdEmpleado, PDO::PARAM_INT);
			$insert->bindParam(":IdTipoLicencia", $licencia->IdTipoLicencia, PDO::PARAM_INT);
			$insert->bindParam(":Desde", $licencia->Desde, PDO::PARAM_STR);
			$insert->bindParam(":Hasta", $licencia->Hasta, PDO::PARAM_STR);
			$insert->bindParam(":IdEstado", $licencia->IdEstado, PDO::PARAM_INT);
        	$insert->execute();
       		
		}
   
    
     
}




    
       	    
   

