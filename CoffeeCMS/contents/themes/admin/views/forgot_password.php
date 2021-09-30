<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>CoffeeCMS</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg txtalert">Forgot Password ?</p>

      <form action="#" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control txtUsername" placeholder="Email or Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
       
        <div class="row">
          <div class="col-6">
            <a href="<?php echo SITE_URL;?>admin/login" class='btn btn-primary'>Back to login</a>
          </div>
          <!-- /.col -->
          <div class="col-6">
            <button type="submit" class="btn btn-primary btnSubmit btn-block"><i class='fas fa-paper-plane'></i> Send email</button>
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

      if(sendData['username'].length < 3)
      {
        $('.txtalert').html('Check your username again,pls!').addClass('text-danger');
        return false;
      }

      postData(API_URL+'request_forgot_password', sendData).then(data => {
        // console.log(data); // JSON data parsed by `data.json()` call
        if(data['error']=='yes')
        {
          $('.txtalert').html('Check your username again,pls!').addClass('text-danger');
        }
        else
        {
          $('.txtalert').html('Check your email then click to verify url').addClass('text-success');
        }
      }); 
       
    }
}
$(document).on('click','.btnLogin',function(){
  

  var sendData={};

  sendData['username']=$('.txtUsername').val().trim();

  if(sendData['username'].length < 3)
  {
    $('.txtalert').html('Check your username again,pls!').addClass('text-danger');
    return false;
  }
  
  postData(API_URL+'request_forgot_password', sendData).then(data => {
    // console.log(data); // JSON data parsed by `data.json()` call
    if(data['error']=='yes')
    {
      $('.txtalert').html('Check your username again,pls!').addClass('text-danger');
    }
    else
    {
      $('.txtalert').html('Check your email then click to verify url').addClass('text-success');
    }
  }); 


});
</script>