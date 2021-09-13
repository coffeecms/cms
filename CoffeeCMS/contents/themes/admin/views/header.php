<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo Configs::$_['site_title'];?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url();?>/public/admin_theme/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/public/admin_theme/dist/css/icons/bootstrap-icons.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url();?>/public/admin_theme/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/public/admin_theme/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/public/admin_theme/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/public/datepicker/css/datepicker.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/public/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>/public/admin_theme/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/public/dropzone570/dropzone.css">
  
  <link rel="stylesheet" href="<?php echo base_url();?>/public/admin_theme/dist/css/custom.css?v=<?php echo date('Hms');?>">

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
<!-- <script src="<?php echo base_url();?>/public/admin_theme/plugins/chart.js/Chart.min.js"></script> -->
<script src="<?php echo base_url();?>/public/admin_theme/plugins/chartjs3.1/chart.min.js"></script>
<!-- <script src="<?php echo base_url();?>/public/admin_theme/plugins/chartjs3.1/chartjs-plugin-datalabels.min.js"></script> -->
<script src="<?php echo base_url();?>/public/admin_theme/plugins/select2/js/select2.full.min.js"></script>
<script src="<?php echo base_url();?>/public/admin_theme/plugins/numeraljs/min/numeral.min.js"></script>
<script src="<?php echo base_url();?>/public/datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();?>/public/toastr/toastr.min.js"></script>
<style>

</style>
<script>
var SITE_URL='<?php echo SITE_URL;?>';
var API_URL='<?php echo SITE_URL;?>api/';
</script>

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

<?php  coffee_admin_head();?>


<!-- Modal -->
<div class="modal fade" id="modalLoading" style='z-index:99999999;' data-backdrop="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title modal-loading" id="exampleModalLabel"><?php echo get_text_by_lang('Loading data','admin');?>...</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
      <span class='fas fa-mug-hot' style='display:block;margin-bottom:10px;font-size:48pt;'></span>
      <div class="modal-loading-content margin-bottom-30"><?php echo get_text_by_lang('Wait a second','admin');?>...</div>

      <div class="lds-roller style1"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
      </div>

    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalCreateShortUrl" style='z-index:99999999;' data-backdrop="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title modal-loading" id="exampleModalLabel"><?php echo get_text_by_lang('Create short url','admin');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"><?php echo get_text_by_lang('Target Url','admin');?></span>
        <input type="text" class="form-control short-url-target" aria-label="Username" aria-describedby="basic-addon1">
        <button type='button' class='btn btn-primary btnCreateShortUrl'><i class='fas fa-share'></i> <?php echo get_text_by_lang('Create','admin');?></button>
        </div>

        <hr>
        <div class='row'>
          <div class='col-lg-12 text-center'>
            <h5 class=''>Result:</h5>
            <input type="text" class="form-control text-center text-success short-url-result" style='    font-size: 18px;' >
          </div>
        </div>

      </div>

    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalAlert" style='z-index:99999999;' data-backdrop="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

<!-- Modal -->
<div class="modal fade" id="modalMedia"  style='z-index:99999;' data-backdrop="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel"><?php echo get_text_by_lang('Media Management','admin');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="modal-media-content">

        <div class="tscroll " style="width: 100%;height: 500px;max-height: 500px;overflow: scroll;">
          <table  class="table table-hover tableFixed"  style="border:1px solid #dfdfdf;font-size:9pt;">
              <thead>
                <tr style="background-color:#F0EEEE;border:1px solid #dfdfdf;">
                    <th style="border:1px solid #dfdfdf;width: 70px;">&nbsp;</th>
                    <th style="border:1px solid #dfdfdf;"><?php echo get_text_by_lang('Name','admin');?></th>
                    <!-- <th style="border:1px solid #dfdfdf;width: 110px;">Size</th> -->
                    <th style="border:1px solid #dfdfdf;width: 150px;">&nbsp;</th>
                </tr>
              </thead>

              <tbody class='list-media'>
               

              </tbody>
            </table>        
        </div>

        </div>
      </div>
      <div class="modal-footer">
     
      <input type='file' class='fileMedias hide' multiple style='display:hide;' />
        <button type="button" class="btn btn-primary btnShowUploadMedia"><i class="fas fa-file-upload"></i> <?php echo get_text_by_lang('Upload new file','admin');?></button>
        <button type="button" class="btn btn-danger btnCloseAlert" data-dismiss="modal"><i class="fas fa-times"></i> <?php echo get_text_by_lang('Close','admin');?></button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalListPluginSupportSetting"  style='z-index:99999999;' data-backdrop="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel"><?php echo get_text_by_lang('Widgets','admin');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal-plugins-live-settings">
          <div class="tscroll " style="width: 100%;height: 500px;max-height: 500px;overflow: scroll;">
            <div class='row row-list-plugin-shortcode-js-widgets' style='    padding-left: 10px;' >
             
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btnCloseAlert" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
      </div>
    </div>
  </div>
</div>


<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link pushmenu" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

      <?php coffee_content_hook('admin_panel_start_menu_top');?>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo SITE_URL;?>" target="_blank" title='View your site' class="nav-link"><i class="fas fa-link"></i></a>
      </li>      

      <?php if(!isset(Configs::$_['hide_admin_menu']['11011012'])){ ?>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo SITE_URL;?>admin/new_post" title='Write a new post' class="nav-link"><i class="fas fa-file"></i></a>
      </li>
      <?php } ?>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link showModalMediaManagement" title='Upload a media'><i class="fas fa-file-upload"></i></a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link showModalShortUrl" title='Create a short url'><i class="fas fa-tag"></i></a>
      </li>

      <?php coffee_content_hook('admin_panel_end_menu_top');?>
<!-- 
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?php echo SITE_URL;?>admin/new_email" title='New email' class="nav-link showModalMediaManagement"><i class="fas fa-paper-plane"></i></a>
      </li> -->
    <!--   <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

   

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
            <i class="fas fa-user"></i>
            <?php echo Configs::$_['user_data']['username'];?> (<?php echo Configs::$_['user_data']['group_title'];?>)
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
            <span class="dropdown-item dropdown-header"><?php echo Configs::$_['user_data']['level_title'];?></span>

            <?php coffee_content_hook('admin_panel_start_user_menu_top');?>
                
            <div class="dropdown-divider"></div>
            <a href="<?php echo SITE_URL;?>admin/users?user_c=<?php echo Configs::$_['user_data']['user_id'];?>" class="dropdown-item">
              <?php echo get_text_by_lang('Profile','admin');?>
            </a>
            
            <div class="dropdown-divider"></div>
              <a href="<?php echo SITE_URL;?>admin/quick_maintain" class="dropdown-item">
              <?php echo get_text_by_lang('Maintain Caches','admin');?>
              </a>
            
            <div class="dropdown-divider"></div>
            <a href="<?php echo SITE_URL;?>admin/user_logout" class="dropdown-item">
              <?php echo get_text_by_lang('Logout','admin');?>
            </a>

            <?php coffee_content_hook('admin_panel_end_user_menu_top');?>
          
          </div>
        </li>
    
    </ul>
  </nav>
  <!-- /.navbar -->

  <script>

pageData['user_data']=<?php echo json_encode(Configs::$_['user_data']);?>;
pageData['user_permissions']=<?php echo json_encode(Configs::$_['user_permissions']);?>;


// masterDB['media_selected_callback']=function(theMediaUrl){
//     console.log('Added...'+theMediaUrl);
// };



$(document).on("click", ".btnShowUploadMedia", function () {
    // $('.dz-clickable').trigger('click');

  $('.fileMedias').trigger('click');

});



$(document).on("click", ".showModalMediaManagement", function () {
  masterDB['media_list']=[];

  showListMedia();
});

$(document).on("click", ".btn-select-media", function () {

  $('.btn-select-media').removeClass('btn-default').removeClass('btn-success').addClass('btn-default').html('<i class="fas fa-minus"></i>');

  $(this).removeClass('btn-default').removeClass('btn-success').addClass('btn-success').html('<i class="fas fa-check"></i>');

  masterDB['media_list'].push($(this).attr('data-url'));
  masterDB['media_upload_status']=2;

  
});


$(document).on("click", ".showModalShortUrl", function () {
  $('#modalCreateShortUrl').modal('show');
});

$(document).on("click", ".btnCreateShortUrl", function () {
    var sendData={};

    sendData['target_url']=$('.short-url-target').val().trim();

    if(sendData['target_url'].length < 5)
    {
      showAlert('','Target url not allow blank');return false;
    }

    sendData['type']='1';

    postData(API_URL+'insert_new_short_url', sendData).then(data => {
      // console.log(data); // JSON data parsed by `data.json()` call
      // console.log(data['error']);

      if(data['error']=='yes')
      {
        showAlertOK('',data['data']);
      }
      else
      {
        $('.short-url-result').val(SITE_URL+'go/'+data['data']);
      }

    });    
});



  </script>

