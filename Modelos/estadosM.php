<?php

require_once "ConexionBD.php";

class Estado {

    public $IdEstado;
    public $Estado;

      
    public function __construct(  $IdEstado=null, $Estado=null) {
    $this->IdEstado = $IdEstado; 
    $this->Estado = $Estado;
       
    }

    public static function obtenerEstado($id) {
        $sql="SELECT Estado FROM licencia_estado where IdEstado = :IdEstado";
        $stmt = ConexionBD::cBD()->prepare($sql);
        $stmt->bindParam(":IdEstado", $id, PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public static function recuperarTodos() {
        $sql="SELECT IdEstado, Estado FROM licencia_estado";
        $stmt = ConexionBD::cBD()->prepare($sql);
        $stmt->execute();
        $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $registros;
    }

}
