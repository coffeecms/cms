<div class="login-box">
  <div class="login-logo">
    <a href="#"><b><?php echo Configs::$_['system_title'];?></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg txtalert"><?php echo get_text_by_lang('Sign in','admin');?></p>

      <form action="#" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control txtUsername" placeholder="<?php echo get_text_by_lang('Email or Username','admin');?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control txtPassword" placeholder="<?php echo get_text_by_lang('Password','admin');?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <a href="<?php echo SITE_URL;?>admin/forgot_password" style='font-weight: 400;'><?php echo get_text_by_lang('I forgot my password','admin');?></a>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="button" class="btn btn-primary btnLogin btn-block"><i class='fas fa-coffee'></i> <?php echo get_text_by_lang('Sign In','admin');?></button>
          </div>
          <!-- /.col -->
        </div>
      </form>

  <!--     <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->
      
      <p class="mb-0">
        <!-- <a href="<?php echo SITE_URL;?>admin/register" class="text-center" style='font-weight: 400;'>Register a new membership</a> -->
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<script>

document.onkeyup = KeyCheck;

function KeyCheck(e) {

    e.key=e.key.toUpperCase();

    if (e.key == "Enter") {

      var sendData={};

      sendData['username']=$('.txtUsername').val().trim();
      sendData['password']=$('.txtPassword').val().trim();

      postData(API_URL+'user_login', sendData).then(data => {
        // console.log(data); // JSON data parsed by `data.json()` call
        if(data['error']=='yes')
        {
          $('.txtalert').html('Check your username/password again,pls!').addClass('text-danger');
        }
        else
        {
          location.href=SITE_URL+'admin/dashboard';
        }
      }); 
       
    }
}
$(document).on('click','.btnLogin',function(){
  

  var sendData={};

  sendData['username']=$('.txtUsername').val().trim();
  sendData['password']=$('.txtPassword').val().trim();

  postData(API_URL+'user_login', sendData).then(data => {
    // console.log(data); // JSON data parsed by `data.json()` call
    if(data['error']=='yes')
    {
      $('.txtalert').html('Check your username/password again,pls!').addClass('text-danger');
    }
    else
    {
      location.href=SITE_URL+'admin/dashboard';
    }
  }); 


});
</script>