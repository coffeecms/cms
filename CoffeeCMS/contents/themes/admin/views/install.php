<?php 

$defaultPass=randText('12');

?>

<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>Install CoffeeCMS</a>
  </div>

  <div class="card card-step1 <?php if((int)$step!=1){echo 'hide';};?>">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Step 1</p>

      <form action="../../index.html" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control add-db-host" value="localhost" placeholder="Database Host">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-file"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control add-db-dbname" value="coffeecms" placeholder="Database Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-file"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control add-db-username" value="root" placeholder="UserName">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-file"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control add-db-password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-file"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control add-prefix" value="cup_" placeholder="Table Prefix">
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
      </form>

    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->

  <div class="card card-step2 <?php if((int)$step!=2){echo 'hide';};?>">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Step 2</p>

      <form action="../../index.html" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control add-title" value="Coffee Site" placeholder="Site title">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-file"></span>
            </div>
          </div>
        </div>        
        <div class="input-group mb-3">
          <input type="text" class="form-control add-fullname" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-file"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control add-username" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-file"></span>
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
          <input type="text" class="form-control add-password" value="<?php echo $defaultPass;?>" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control add-repassword" value="<?php echo $defaultPass;?>" placeholder="Retype password">
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
            <button type="button" class="btn btn-primary btnStep2 btn-block"><i class='fas fa-coffee'></i> Apply</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->

  <div class="card card-step3 <?php if((int)$step!=3){echo 'hide';};?>">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Done!</p>

      <form action="../../index.html" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control done-title" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-file"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control done-password" placeholder="Password">
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
            <button type="button" class="btn btn-primary btnStep3 btn-block"><i class='fas fa-coffee'></i> Login to admin</button>
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

      location.href=url.replace('admin/install','admin/');
    });
</script>