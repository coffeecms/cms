<script src="<?php echo SITE_URL; ?>public/ckeditor/ckeditor.js"></script>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit email template</h1>
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
          <div class="col-lg-12 col-sm-12 col-md-12">


            <div class="panel panel-default">
         
              <div class="panel-body">
                <div class="row">
                
                  <div class="col-lg-12 ">
                   <?php echo $alert;?>
                        <p>
                            <label><strong>Title</strong></label>
                            <input type="text" class="form-control post-title input-size-medium" name="send[title]" placeholder="Title" />
                        </p>
                        <p>
                            <label><strong>Subject</strong></label>
                            <input type="text" class="form-control post-subject input-size-medium" name="send[title]" placeholder="Subject" />
                        </p>
                        <p>
                            <label><strong>Content</strong> </label>
                            
                            <textarea id="editor" rows="25" name="send[content]" class="form-control post-content ckeditor"></textarea>
                        </p>
                       

                  </div>

                </div>
                        <p>
                            <button type="button" class="btn btn-primary btn-save" ><i class='fas fa-save'></i> Save changes</button>
                        </p>  
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
    pageData['thePost']=<?php echo $thePost;?>;
    pageData['template_id']=<?php echo $template_id;?>;

  // Replace the <textarea id="editor1"> with a CKEditor
  // instance, using default configuration.
  // CKEDITOR.replace( 'editor' );  extraPlugins: 'wordcount,notification',
  

CKEDITOR.replace( 'editor' ,{
  extraPlugins: 'wordcount,notification,texttransform,justify',
  height: 300,
  filebrowserBrowseUrl : '<?php echo SITE_URL;?>public/ckeditor/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
  filebrowserImageBrowseUrl : '<?php echo SITE_URL;?>public/ckeditor/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
});   

// CKEDITOR.instances.editor.insertHtml('<p><strong>sdfsdfsdf</strong></p>')

masterDB['media_selected_callback']=function(theMediaUrl){
    console.log('Added...'+theMediaUrl);
    // $('.txtThumbnail').val(theMediaUrl);
    // $('.txtThumbnailSrc').attr('src',theMediaUrl+'?v='+moment().format('HHmm'));

    CKEDITOR.instances.editor.insertHtml('<p><img src="'+theMediaUrl+'?v='+moment().format('HHmm')+'" style="width:100%;" /></p>');
};

</script>


  <script type="text/javascript">
  var root_url='<?php echo SITE_URL;?>';

  function prepareShowData()
  {
    $('.post-title').val(pageData['thePost']['title']);
    $('.post-subject').val(pageData['thePost']['subject']);

    CKEDITOR.instances.editor.insertHtml(pageData['thePost']['content']);
  }

  $(document).ready(function(){
    $('.pushmenu').trigger('click');

    setTimeout(function(){ 

        prepareShowData();

    },500);
  
  });

  $(document).on('click','.btn-save',function(){
    var sendData={};

    sendData['template_id']=pageData['template_id'];
    sendData['title']=$('.post-title').val();
    sendData['subject']=$('.post-subject').val();
    sendData['content']=CKEDITOR.instances.editor.getData();
    sendData['type']='1';
    postData(API_URL+'update_email_template', sendData).then(data => {
      console.log(data); // JSON data parsed by `data.json()` call
      console.log(data['error']);
      showAlertOK('','Done!!');
    });  
  });

    
  </script>