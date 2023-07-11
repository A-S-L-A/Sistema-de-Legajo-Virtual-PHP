<div class="login-box">
  <div class="login-logo">
    <img src="Vistas/img/icono.ico" class="img-responsive">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Inicio de Sesión</p>

    <form  method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="CorreoElectronico" placeholder="CorreoElectronico">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="Contraseña" placeholder="Contraseña">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
        </div>
        <!-- /.col -->
      </div>
      <?php

      $ingreso = new UsuarioC();
      $ingreso -> IniciarSesionC();
      ?>
    </form>

    

  </div>
  <!-- /.login-box-body -->
</div>