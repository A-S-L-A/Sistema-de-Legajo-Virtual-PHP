<!DOCTYPE html>
<div class="box-body">
<div class="card">
<div class="card-header">
<h3 class="card-title">Licencias Activas</h3>
</div>
<div class="card-body">
<table id="grilla_activas" class="table table-bordered table-hover">
<thead>
	<tr>
		<th>EmpleadoID</th>
    	<th>Apellidos y Nombres</th>
    	<th>Tipo de Licencia</th>
		<th>Desde</th>
		<th>Hasta</th>
		<th>Estado de la Licencia</th>
	</tr>
</thead>
<tbody>
<?php
	$licencias = Licencia::all();
	foreach ($licencias as $licencia) {
		require_once 'Modelos/empleadoM.php';
	 	$empleado=empleadoM::obtenerApellido($licencia->IdEmpleado);
		require_once 'Modelos/tipolicenciaM.php';
	 	$tipolicencia=TipoLicencia::obtenerNombre($licencia->IdTipoLicencia);
		require_once 'Modelos/estadosM.php';
		$estado=Estado::obtenerEstado($licencia->IdEstado);
		?>
		<tr>
		<td><?php echo $licencia->IdEmpleado; ?></td>
        <td><?php echo $empleado['apellido']; ?></td>
        <td><?php echo $tipolicencia['Nombre'];?></td>
        <td><?php echo $licencia->Desde; ?></td>
		<td><?php echo $licencia->Hasta; ?></td>
		<td><?php echo $estado['Estado'];?></td>
		</tr>		
	<?php } ?>
</tbody>
</table>
 </div>
</div>
</div>




 

