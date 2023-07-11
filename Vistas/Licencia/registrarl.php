<html>
<body>

<div class="box-body" >
    <div class="col-lg-12">
    <div class="row">
    <form method='post' class="form-horizontal" enctype="multipart/form-data" id="formlicencia">
    <div class="card-body">
    <input type='hidden' name='action' value='register'>         
    <h4>DATOS DE LICENCIA</h4>
    <p>La siguiente información tiene caracter de Declaración Jurada</p>


        <div class="form-group">
            <label for="EmpleadoID" class="control-label col-lg-3">IdEmpleado:</label>
            <div class="col-lg-5">
            <input class="form-control" type="text" name="IdEmpleado" id="IdEmpleado" value="<?php echo $_SESSION['IdEmpleado'] ?>" readonly="true"/>                   
            </div>
    </div> 
    <div class="form-group">
            <label for="legajo" class="control-label col-lg-3">Nombre Completo:</label>
            <div class="col-lg-5">
            <input class="form-control" type="text" name="apeynom" id="apeynom" value="<?php echo $_SESSION['Apellido'].', '. $_SESSION['Nombre']?>" readonly="true"/>
            </div>
    </div> 
    <div class="form-group">
            <label for="tipo_licencia" class="control-label col-lg-3">Tipo de Licencia:</label>
            <div class="col-lg-5">
            <?php 
            require_once 'Modelos/tipolicenciaM.php';
            $tipos = TipoLicencia::recuperarTodos();
            ?> 
            <select class="form-control" id="IdTipoLicencia" name="IdTipoLicencia" required>
                <option value="0" selected="selected">Seleccione Tipo de Licencia...</option>
                <?php foreach ($tipos as $item): ?>
                    <option value="<?php echo $item['IdTipoLicencia'] ?>"> <?php echo $item['Nombre']; ?></option>
                <?php endforeach; ?>
            </select>
            </div>
    </div>
    <div class="form-group">
            <label for="desde" class="control-label col-lg-3">Desde:</label>
            <div class="col-lg-5">
                <input class="form-control" type="date" name="Desde" id="Desde" required />
            </div>
    </div> 
    <div class="form-group">
            <label for="hasta" class="control-label col-lg-3">Hasta:</label>
            <div class="col-lg-5">
                <input class="form-control" type="date" name="Hasta" id="Hasta" required />
            </div>
    </div> 
         
    </div>
    <div class="card-footer">
        <div class="col-lg-2">	
            <input type='submit' name="solicitar" value='Solicitar' class="solicitar" > 
        </div>
        <div class="col-lg-2">	
             <input type='submit' value='Cancelar' class="cancelar">
        </div>
    </div>
    
    </form>   
    </div>
</div>
</div>

</body></html>

<script type="text/javascript" >
 $(document).ready(function() {
     $('.solicitar').on('click', function() {
         $('.solicitar').attr('href', '?op=licencia&controller=licencia&action=register');
         document.getElementById('solicitar').click();
    });  

    /** REDIRECCIONAR AL HOME - TO DO */
    $('.cancelar').on('click', function() {
        $dec=confirm('Está seguro de cancelar la solicitud');
        if($dec==true)
        {
        $('.cancelar').prop('href', '?op=licencia&controller=licencia&action=index');  
        document.getElementById('cancelar').click();
        }                               
    }); 

})
 </script>
 


