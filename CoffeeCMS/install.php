<?php
ob_start();
//session_start();
error_reporting(0);

require_once('system/configs.php');
require_once('system/Database.php');
require_once('system/core.php');

$defaultPass=randText('12');

if(!file_exists('db.sql'))
{
  die('db.sql not found!');
}

$db=new Database();

$db->db[$db->dbGroup]['DBPrefix']='';

$conn = new mysqli($db->db[$db->dbGroup]['hostname'], $db->db[$db->dbGroup]['username'], $db->db[$db->dbGroup]['password'], $db->db[$db->dbGroup]['database'], $db->db[$db->dbGroup]['port']);

if(!$conn->connect_error)
{
    // die("Your site working!");
}

$add=isset($_POST['add'])?$_POST['add']:'';

$step=1;

$alert='';

if(isset($add['dbhost']))
{
  $step=1;

  $alert='<p><span class="text-danger">Your data not valid!</span></p>';
  if(isset($add['dbhost'][2]) && isset($add['dbname'][2]) && isset($add['dbusername'][1]) && isset($add['dbprefix'][2]) && isset($add['title'][2]) && isset($add['fullname'][2]) && isset($add['username'][2]) && isset($add['email'][2]))
  {
    if(isset($add['password'][1]) && $add['password']==$add['repassword'])
    {
        $step=3;

        $dbFileContent=file_get_contents('system/Database.php');

        $replaces=array(
          '/\'hostname\' \=\> \'.*?\'/i'=>'\'hostname\' => \''.$add['dbhost'].'\'',
          '/\'username\' \=\> \'.*?\'/i'=>'\'username\' => \''.$add['dbusername'].'\'',
          '/\'password\' \=\> \'.*?\'/i'=>'\'password\' => \''.$add['dbpassword'].'\'',
          '/\'database\' \=\> \'.*?\'/i'=>'\'database\' => \''.$add['dbname'].'\'',
          '/\'DBPrefix\' \=\> \'.*?\'/i'=>'\'DBPrefix\' => \''.$add['dbprefix'].'\'',
        );

        $dbFileContent=preg_replace(array_keys($replaces), array_values($replaces), $dbFileContent);


        create_file('system/Database.php',$dbFileContent);

        $dbContent=file_get_contents('db.sql');

        $dbContent=str_replace('{{prefix}}', $add['dbprefix'], $dbContent);
        $dbContent=str_replace('{{admin_username}}', addslashes($add['username']), $dbContent);
        $dbContent=str_replace('{{admin_password}}', md5($add['password']), $dbContent);
        $dbContent=str_replace('{{admin_email}}', addslashes($add['email']), $dbContent);

        $db=new Database();

        $db->db[$db->dbGroup]['hostname']=$add['dbhost'];
        $db->db[$db->dbGroup]['username']=$add['dbusername'];
        $db->db[$db->dbGroup]['password']=$add['dbpassword'];
        $db->db[$db->dbGroup]['database']=$add['dbname'];
        $db->db[$db->dbGroup]['DBPrefix']=$add['dbprefix'];

        // die($dbContent);
        $db->nonquery($dbContent);
        $db->db[$db->dbGroup]['DBPrefix']='';

    }
    else
    {
      $alert='<p><span class="text-danger">Your password not valid!</span></p>';
    }
  }



	
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Install CoffeeCMS <?php echo Configs::$_['version'];?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url();?>/public/admin_theme/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/public/admin_theme/dist/css/icons/bootstrap-icons.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url();?>/public/admin_theme/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/public/admin_theme/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/public/admin_theme/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/public/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>/public/admin_theme/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/public/dropzone570/dropzone.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/public/admin_theme/dist/css/custom.css">

  <!-- jQuery -->
<script src="<?php echo base_url();?>/public/admin_theme/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>/public/js/system.js?v=<?php echo date('Hms');?>"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url();?>/public/admin_theme/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url();?>/public/admin_theme/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/public/admin_theme/dist/js/adminlte.js"></script>
<script src="<?php echo base_url();?>/public/dropzone570/dropzone.js"></script>

<!-- ChartJS -->
<script src="<?php echo base_url();?>/public/admin_theme/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url();?>/public/admin_theme/plugins/chart.js/Chart.min.js"></script>
<script src="<?php echo base_url();?>/public/admin_theme/plugins/select2/js/select2.full.min.js"></script>
<script src="<?php echo base_url();?>/public/toastr/toastr.min.js"></script>
<style>

</style>
<script>
var SITE_URL='<?php echo SITE_URL;?>';
var API_URL='<?php echo SITE_URL;?>api/';
</script>

</head>
<body class="hold-transition login-page">

<!-- Modal -->
<div class="modal fade" id="modalLoading" data-backdrop="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title modal-loading" id="exampleModalLabel">Loading data...</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
      <span class='fas fa-mug-hot' style='display:block;margin-bottom:10px;font-size:48pt;'></span>
      <div class="modal-loading-content margin-bottom-30">Wait a second...</div>

      <div class="lds-roller style1"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
      </div>

    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalAlert" data-backdrop="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title modal-alert-title" id="exampleModalLabel">Notify!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="modal-alert-content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btnCloseAlert" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Close</button>
      </div>
    </div>
  </div>
</div>


<form action="" method="post">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Install CoffeeCMS <?php echo Configs::$_['version'];?></a>
  </div>

  <div class="card card-step1 <?php if((int)$step!=1){echo 'hide';};?> ">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Step 1</p>
      <?php echo $alert;?>
      
        <div class="input-group mb-3">
          <input type="text" class="form-control add-db-host" name="add[dbhost]" value="localhost" placeholder="Database Host">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-file"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control add-db-dbname" name="add[dbname]" value="coffeecms" placeholder="Database Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-file"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control add-db-username" name="add[dbusername]" value="root" placeholder="UserName">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-file"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control add-db-password" name="add[dbpassword]" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-file"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control add-prefix" value="cup_" name="add[dbprefix]" placeholder="Table Prefix">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-file"></span>
            </div>
          </div>
        </div>

        <div class="row">
  
          <!-- /.col -->
          <div class="col-12">
            <button type="button" class="btn btn-primary btnStep1 btn-block"><i class='fas fa-coffee'></i> Next step</button>
          </div>
          <!-- /.col -->
        </div>

    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->

  <div class="card card-step2 <?php if((int)$step!=2){echo 'hide';};?>">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Step 2</p>

        <div class="input-group mb-3">
          <input type="text" class="form-control add-title" name="add[title]" value="Coffee Site" placeholder="Site title">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-file"></span>
            </div>
          </div>
        </div>        
        <div class="input-group mb-3">
          <input type="text" class="form-control add-fullname" name="add[fullname]" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-file"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control add-username" name="add[username]" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-file"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="email" class="form-control add-email" name="add[email]" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control add-password"  name="add[password]" value="<?php echo $defaultPass;?>" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control add-repassword" name="add[repassword]" value="<?php echo $defaultPass;?>" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-6">
            <button type="button" class="btn btn-primary btn-back-step1 btn-block"><i class='fas fa-backward'></i> Back</button>
          </div>
          <div class="col-6">
            <button type="submit" class="btn btn-primary btnStep2 btn-block"><i class='fas fa-coffee'></i> Apply</button>
          </div>
          <!-- /.col -->
        </div>

    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->

  <div class="card card-step3 <?php if((int)$step!=3){echo 'hide';};?>">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Done!</p>

        <div class="input-group mb-3">
          <input type="text" class="form-control done-title" value="<?php echo $add['username'];?>" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-file"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control done-password" value="<?php echo $add['password'];?>" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-file"></span>
            </div>
          </div>
        </div>

        
        <div class="row">
          
          <!-- /.col -->
          <!-- <div class="col-6">
            <button type="button" class="btn btn-primary btn-back-step2 btn-block"><i class='fas fa-backward'></i> Back</button>
          </div> -->
          <div class="col-12">
            <a href="admin/login" class="btn btn-primary btnStep3 btn-block"><i class='fas fa-coffee'></i> Login to admin</a>
          </div>
          <!-- /.col -->
        </div>
      

    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->



</div>
<!-- /.register-box -->
</form>

<script>
  $(document).on('click','.btn-back-step1',function(){
      $('.card-step2').removeClass('hide').addClass('hide');
      $('.card-step3').removeClass('hide').addClass('hide');
      $('.card-step1').removeClass('hide');
        
    });
  // $(document).on('click','.btn-back-step2',function(){
  //     $('.card-step2').removeClass('hide').addClass('hide');
  //     $('.card-step1').removeClass('hide').addClass('hide');
  //     $('.card-step2').removeClass('hide');
        
  //   });
  $(document).on('click','.btnStep1',function(){
      $('.card-step1').addClass('hide');
      $('.card-step2').removeClass('hide');
        
    });
  $(document).on('click','.btnStep2',function(){
      $('.card-step2').addClass('hide');
      $('.card-step3').removeClass('hide');
        
    });
    
  $(document).on('click','.btnStep3',function(){
      var url=location.href;

      location.href=url.replace('admin/install','')+'admin/';
    });
</script>



<!-- REQUIRED SCRIPTS -->

</body>
</html>
