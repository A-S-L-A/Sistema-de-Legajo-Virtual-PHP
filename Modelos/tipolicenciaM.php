<?php

require_once "ConexionBD.php";

class TipoLicencia {

    public $IdTipoLicencia;
    public $Nombre;

      
    public function __construct(  $IdTipoLicencia=null, $Nombre=null) {
    $this->IdTipoLicencia = $IdTipoLicencia; 
    $this->Nombre = $Nombre;
       
    }

    public static function obtenerNombre($id) {
        $sql="SELECT Nombre FROM tiposlicencia where IdTipoLicencia= :IdTipoLicencia";
        $stmt = ConexionBD::cBD()->prepare($sql);
        $stmt->bindParam(":IdTipoLicencia", $id, PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public static function recuperarTodos() {
        $sql="SELECT IdTipoLicencia, Nombre FROM tiposlicencia";
        $stmt = ConexionBD::cBD()->prepare($sql);
        $stmt->execute();
        $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $registros;
    }

}
