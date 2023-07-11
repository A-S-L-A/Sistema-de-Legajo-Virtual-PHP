<!DOCTYPE html>
<div class="box-body">
<div class="card">
<div class="card-header">
<h3 class="card-title">Licencias Pendientes</h3>
</div>
<div class="card-body">
<table id="grilla_licencia" class="table table-bordered table-hover">
<thead>
	<tr>
		<th>EmpleadoID</th>
    	<th>Apellidos y Nombres</th>
    	<th>Tipo de Licencia</th>
		<th>Desde</th>
		<th>Hasta</th>
		<th>Estado de la Licencia</th>
	   <th colspan=2 >Acciones</th>
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

		$Estado=Estado::obtenerEstado($licencia->IdEstado);
		?>
		<tr>
		<td><?php echo $licencia->IdEmpleado; ?></td>
        <td><?php echo $empleado['apellido']; ?></td>
        <td><?php echo $tipolicencia['Nombre'];?></td>
		<td><?php echo $licencia->Desde; ?></td>
		<td><?php echo $licencia->Hasta; ?></td>
		<td><?php echo $Estado['Estado'];?></td>
        <td>
        <a href="#" class="btn btn-tb-accion autorizar" title="Autorizar"><span class="glyphicon glyphicon-check"></span></a> 
        <a href="#" class="btn btn-tb-accion rechazar" title="Rechazar"><span class="glyphicon glyphicon-delete"></span></a> 
		<a href="#" class="btn btn-tb-accion historial" title="Historial"><span class="glyphicon glyphicon-eyes"></span></a>
        </td>
				
		</tr>		
	<?php } ?>
</tbody>
</table>
 </div>
</div>
</div>




 

