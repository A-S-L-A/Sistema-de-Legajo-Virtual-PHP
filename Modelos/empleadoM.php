<?php
require_once "ConexionBD.php";
 
class empleadoM {
    public static function obtenerEmpleadoPorIdM($tablaEmpleado, $datosEmpleado) {
        // Realizar la consulta SQL JOIN para obtener los datos del empleado por su ID
        $sql = "SELECT empleados.Nombre, empleados.Apellido FROM $tablaEmpleado
                INNER JOIN usuarios ON empleados.IdEmpleado = usuarios.IdEmpleado
                WHERE empleados.IdEmpleado = :IdEmpleado";
        
        // Ejecutar la consulta preparada
        $stmt = ConexionBD::cBD()->prepare($sql);
        $stmt->bindParam(":IdEmpleado", $datosEmpleado["IdEmpleado"], PDO::PARAM_INT);
        $stmt->execute();
        
        // Obtener el resultado de la consulta
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $resultado;
    }

    public static function obtenerApellido($id) {
        $sql = "SELECT concat(empleados.Nombre,', ', empleados.Apellido) as apellido FROM empleados
                INNER JOIN usuarios ON empleados.IdEmpleado = usuarios.IdEmpleado
                WHERE empleados.IdEmpleado = :IdEmpleado";
        $stmt = ConexionBD::cBD()->prepare($sql);
        $stmt->bindParam(":IdEmpleado", $id, PDO::PARAM_INT);
        $stmt->execute();
        $apellido = $stmt->fetch(PDO::FETCH_ASSOC);
        return $apellido;
    }
    //ver mis datos
    static public function VerMisDatosM($tablaEmpleado,$datosEmpleado){
        // Realizar la consulta SQL para obtener los datos del empleado
        $sql = "SELECT empleados.IdEmpleado,empleados.Nombre, empleados.Apellido,empleados.DNI,empleados.Domicilio FROM $tablaEmpleado
                INNER JOIN usuarios ON empleados.IdEmpleado = usuarios.IdEmpleado
                WHERE empleados.IdEmpleado = :IdEmpleado";
        
        // Ejecutar la consulta preparada
        $stmt = ConexionBD::cBD()->prepare($sql);
        $stmt->bindParam(":IdEmpleado", $datosEmpleado["IdEmpleado"], PDO::PARAM_INT);
        $stmt->execute();
        
        // Obtener el resultado de la consulta
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $resultado;
    }
}