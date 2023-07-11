<?php

class UsuarioC{
    public function IniciarSesionC(){

        if(isset($_POST["CorreoElectronico"])){

            if(preg_match('/^[a-zA-Z0-9.@-]+$/',$_POST["CorreoElectronico"]) && preg_match('/^[a-zA-Z0-9.]+$/',$_POST["Contraseña"])){

                $tablaBD ="usuarios";

                $datosC = array("CorreoElectronico"=>$_POST["CorreoElectronico"],"Contraseña"=>$_POST["Contraseña"]);

                $resultado = UsuariosM::IniciarSesionM($tablaBD,$datosC);

                if (is_array($resultado) && isset($resultado["CorreoElectronico"]) && isset($resultado["Contraseña"])) {
                    if ($resultado["CorreoElectronico"] == $_POST["CorreoElectronico"] && $resultado["Contraseña"] == $_POST["Contraseña"]) {
                        $_SESSION["Ingresar"] = true;
                        $_SESSION["rol"] = $resultado["rol"];
                        $_SESSION["CorreoElectronico"] = $resultado["CorreoElectronico"];
                        $_SESSION["Contraseña"] = $resultado["Contraseña"];
                        $_SESSION["IdUsuario"] = $resultado["IdUsuario"];
                        $_SESSION["IdEmpleado"] = $resultado["IdEmpleado"];

                        // Obtener datos del empleado
                        $tablaEmpleado = "empleados";
                        $datosEmpleado = array("IdEmpleado" => $resultado["IdEmpleado"]);

                        // Realizar la consulta JOIN
                        $resultadoEmpleado = empleadoM::obtenerEmpleadoPorIdM($tablaEmpleado, $datosEmpleado);

                        if (is_array($resultadoEmpleado) && isset($resultadoEmpleado["Nombre"]) && isset($resultadoEmpleado["Apellido"])) {
                            $_SESSION["Nombre"] = $resultadoEmpleado["Nombre"];
                            $_SESSION["Apellido"] = $resultadoEmpleado["Apellido"];
                            $_SESSION["IdEmpleado"] = $resultado["IdEmpleado"];
                            
                            
                        }
                        echo '<script>window.location = "inicio";</script>';
                    } else {
                        echo '<br><div class="alert alert-danger">Error Al Ingresar</div>';
                    }
                } else {
                    echo '<br><div class="alert alert-danger">Error Al Ingresar</div>';
                }
            }
        }
    }
    public function VerMisDatosC(){

        // Obtener datos del empleado
        $tablaEmpleado = "empleados";
        $datosEmpleado = array("IdEmpleado" => $_SESSION["IdEmpleado"]);

        $resultado = empleadoM::VerMisDatosM($tablaEmpleado,$datosEmpleado);

        echo '<form method="post">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <h2>Fecha de Nacimiento:</h2>
                        <input type="text" class="input-lg" name="FechaNacimiento" value="">

                        <input type="text" name="IdEmpleado" value="'.$_SESSION["IdEmpleado"].'">
                        <h2>Dirección:</h2>
                        <input type="text" class="input-lg" name="dirección" value="">
                        <h2>Telefono:</h2>
                        <input type="text" class="input-lg" name="telefono" value="">
                    </div>

                    <div class="col-md-6 col-xs-12">
                        <h2>Correo Electronico:</h2>
                        <input type="email" class="input-lg" name="correo" value="">
                        <h2>Preparatoria:</h2>
                        <input type="text" class="input-lg" name="preparatoria" value="">
                        <h2>País:</h2>
                        <input type="text" class="input-lg" name="país" value="">
                        <br><br>
                        <button type="submit" class="btn btn-success">Guardar Datos</button>
                    </div>
                </div>
            </form>';
    }
}