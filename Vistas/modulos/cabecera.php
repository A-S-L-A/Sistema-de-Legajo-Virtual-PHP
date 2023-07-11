<header class="main-header">
    <!-- Logo -->
    <a href="inicio" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b class="fa fa-balance-scale" style="font-size:25px; color:black;"></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="Vistas/img/logoLargo.png" class="img-responsive"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php
            if (isset($_SESSION["Apellido"]) && isset($_SESSION["Nombre"])) {
              echo '<span class="hidden-xs">' . $_SESSION["Apellido"] . ' ' . $_SESSION["Nombre"] .'</span>';
            }
            ?>
            </a>
            <ul class="dropdown-menu" >
              <!-- User image -->
              <li class="user-header" style="height: 100px;">
               <?php
               if($_SESSION["rol"] == "ADMIN"){
                echo '<p>'.$_SESSION["Apellido"]." ".$_SESSION["Nombre"].'-Administrador</p>';
               }
               ?>
              </li>
              <!-- Menu Body -->
             
              <li class="user-footer">
                <div class="pull-left">
                  <a href="Licencias/mis-datos" class="btn btn-primary btn-flat">Mi Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="Licencias/Salir" class="btn btn-danger btn-flat">Salir</a>
                </div>
              </li>
            </ul>
          </li>
          
        </ul>
      </div>
    </nav>
  </header>