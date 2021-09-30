<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>CoffeeCMS</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a account</p>
      <?php if(Configs::$_['register_user_status']=='no'){ ?> 
        <p class="text-danger">We not allow register new member.</p>
      <?php } ?>
      <form action="#" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control add-fullname" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control add-username" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="email" class="form-control add-email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control add-password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control add-repassword" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <a href="<?php echo SITE_URL;?>admin/login" class="text-center">I already have a membership</a>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="button" class="btn btn-primary btnRegister btn-block"><i class='fas fa-coffee'></i> Submit</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<script>

$(document).on('click','.btnRegister',function(){
  var sendData={};
 
  sendData['type']='1';
 
  sendData['fullname']=$('.add-fullname').val().trim();
  sendData['username']=$('.add-username').val().trim();
  sendData['password']=$('.add-password').val().trim();
  sendData['email']=$('.add-email').val().trim();

  if(sendData['email'].length==0)
  {
    showAlert('','Type a email!');

    return;
  }

  if(sendData['username'].length==0)
  {
    showAlert('','Type a username!');

    return;
  }

  if(sendData['password'].length==0)
  {
    showAlert('','Set a password!');

    return;
  }

  postData(API_URL+'register_new_user', sendData).then(data => {
    // console.log(data); // JSON data parsed by `data.json()` call
    showAlertOK('','Done!');
  });  

});

</script>
