

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Licencias</h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">


        <?php       

        if ($_SESSION['rol']=='ADMIN')
        {
          $url = array();
          if(isset($_GET["url"])){
              $url = explode("/",$_GET["url"]);
              if(count($url) == 1){
                      if (isset($_GET['controller'])&&isset($_GET['action'])) {
                        $controller=$_GET['controller'];
                        $action=$_GET['action'];    
                        } else {
                            $controller='licencia';
                            $action='index';
                        } 
                }
                else{
                      if (isset($_GET['controller'])&&isset($_GET['action'])) {
                        $controller=$_GET['controller'];
                        $action=$_GET['action'];    
                          } else {
                              $controller='licencia';
                              $action='news';
                          }                       
                      }
          }
        
        }
        else{
          $url = array();
          echo count($url);

          if(isset($_GET["url"])){
              $url = explode("/",$_GET["url"]);
              
          echo count($url);
              if(count($url) == 1) {
                      if (isset($_GET['controller'])&&isset($_GET['action'])) {
                        $controller=$_GET['controller'];
                        $action=$_GET['action'];    
                        } else {
                        $controller='licencia';
                        $action='register';
                        } 
                  }
                  else {
                   
                      if (isset($_GET['controller'])&&isset($_GET['action'])) {
                        $controller=$_GET['controller'];
                        $action=$_GET['action'];    
                        } else {
                        $controller='licencia';
                        $action='history';
                        } 
                      
                  }
              
              
          }
          else{ 
                  $controller='licencia';
                  $action='register';}
          }

        
      ?>
      <?php require_once('routes.php'); ?>
        </div>
        <!-- /.box-body -->
        
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
   <!-- /.content-wrapper -->

  <!-- Main Footer -->
  