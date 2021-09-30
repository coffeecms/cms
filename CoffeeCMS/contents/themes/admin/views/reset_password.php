<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>CoffeeCMS</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <?php if($verify=='failed') { ?>
      <p class="login-box-msg text-danger txtalert">Your forgot password code not valid!</p>
    <?php }else{ ?>
      <p class="login-box-msg txtalert">Your new password</p>
    <?php } ?>
      <form action="#" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control txtUser" value="<?php echo $username;?>" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>        
        <div class="input-group mb-3">
          <input type="text" class="form-control txtNewPassword" value="<?php echo $password;?>" placeholder="New password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
       
        <div class="row">
          <div class="col-12">
            <a href="<?php echo SITE_URL;?>admin/login" class='btn btn-primary' style='width:100%;'>Back to login</a>
          </div>
         
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
          location.href=SITE_URL+'admin';
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
      location.href=SITE_URL+'admin';
    }
  }); 


});
</script>