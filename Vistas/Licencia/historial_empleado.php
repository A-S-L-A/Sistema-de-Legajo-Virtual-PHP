<!DOCTYPE html>

</style>
<div class="box-body">
<table id="grilla_historial_empleado" class="table table-bordered table-hover">
<thead>
	<tr>
		<th>Orden</th>
		<th>Tipo de Licencia</th>
    	<th>Estado</th>
	</tr>
</thead>
<tbody>
<?php
	$i=1;
	foreach ($licencias as $licencia) { ?>
		  	<tr>
				<td><?php echo $i; ?></td>
				<?php
				 require_once 'Modelos/tipolicenciaM.php';
				 $tipo = TipoLicencia::obtenerNombre($licencia->IdTipoLicencia);
				 require_once 'Modelos/estadosM.php';
				 $estado = Estado::obtenerEstado($licencia->IdEstado);
				?>
				<td><?php echo $tipo['Nombre'];?></td>
				<td><?php echo $estado['Estado'];?></td>
			</tr>		
	<?php } $i++;?>
</tbody>
</table>
 </div>
</body>

</html>

 

