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

