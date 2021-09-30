<script src="<?php echo SITE_URL; ?>public/ckeditor/ckeditor.js"></script>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">New email</h1>
          </div><!-- /.col -->
      
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12">

        <div class="panel panel-default">

          <div class="panel-body">
            <div class="row">
            
              <div class="col-lg-12 ">
              <form action="" method="post" enctype="multipart/form-data">
                <?php echo $alert;?>

                    <p>
                        <label><strong>Subject</strong></label>
                        <input type="text" class="form-control page-title input-size-medium" name="send[title]" placeholder="Title" />
                    </p>

                    <p>
                        <label><strong>To</strong></label>
                        <input type="text" class="form-control page-toemail input-size-medium" name="send[title]" placeholder="Email.." />
                    </p>
         
                    <p>
                        <label><strong>Content</strong></label>
                        <textarea id="editor" rows="15" name="send[content]" class="form-control page-content ckeditor"></textarea>
                    </p>
                
                    <p>
                        <button type="button" class="btn btn-primary btn-addnew" name="btnAdd">Add new</button>
                    </p>  
              </form> 
              </div>

               
            
            </div>
          </div>
        </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->


        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script>
  // Replace the <textarea id="editor1"> with a CKEditor
  // instance, using default configuration.
CKEDITOR.replace( 'editor' ,{
  extraPlugins: 'wordcount,notification,texttransform,justify',
  height:'500px',
  filebrowserBrowseUrl : '<?php echo SITE_URL;?>public/ckeditor/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
  filebrowserImageBrowseUrl : '<?php echo SITE_URL;?>public/ckeditor/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
});   
</script>


  <script type="text/javascript">
var root_url='<?php echo SITE_URL;?>';

$(document).ready(function(){
	$('.select2js').select2();

});


$(document).on('click','.btn-addnew',function(){
    var sendData={};

    sendData['subject']=$('.page-title').val();
    sendData['toemail']=$('.page-toemail').val();
 
    sendData['content']=CKEDITOR.instances.editor.getData();
    // sendData['allow_comment']=$('.post-allow-comment > option:selected').val().trim();
    sendData['type']='1';

    postData(API_URL+'insert_new_email', sendData).then(data => {
      console.log(data); // JSON data parsed by `data.json()` call
      console.log(data['error']);
      $('.txtThumbnail').val('');
      showAlertOK('','Done!');
    });  
  });
  </script>

