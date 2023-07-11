<?php

require_once "ConexionBD.php";
 
class UsuariosM extends ConexionBD{
    static public function IniciarSesionM($tablaBD,$datosC){

        $pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE CorreoElectronico = :CorreoElectronico");

        $pdo -> bindParam(":CorreoElectronico",$datosC["CorreoElectronico"], PDO::PARAM_STR);

        $pdo -> execute();

        return $pdo -> fetch();

        $pdo -> close();

        $pdo = null;

    }

}