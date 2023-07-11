<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="Vistas/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENÚ</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Licencias</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <?php if ($_SESSION["rol"]=='ADMIN') { ?>
          <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-circle-o"></i> Pendientes</a></li>
            <li><a href="inicio/activas"><i class="fa fa-circle-o"></i> Activas</a></li>
            </ul>
          <?php }
          else {?>
           <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-circle-o"></i> Solicitar</a></li>
            <li><a href="inicio/historial"><i class="fa fa-circle-o"></i> Ver Historial</a></li>
          </ul>
          <?php }?>
        </li>
         
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <?php
  
  ?>