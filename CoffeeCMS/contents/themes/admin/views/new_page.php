<script src="<?php echo SITE_URL; ?>public/ckeditor/ckeditor.js"></script>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo get_text_by_lang('Add new page','admin');?></h1>
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
            
              <div class="col-lg-8 col-md-8 col-sm-8 ">
              <form action="" method="post" enctype="multipart/form-data">
                <?php echo $alert;?>
                <?php coffee_content_hook('admin_panel_start_new_page_left');?>
 
                    <p>
                        <label><strong><?php echo get_text_by_lang('Title','admin');?></strong> (<span class="system_count_char" data-target=".page-title">0</span> <?php echo get_text_by_lang('characters','admin');?>)</label>
                        <input type="text" class="form-control page-title input-size-medium" name="send[title]" placeholder="Title" />
                    </p>
         
                    <p>
                        <label><strong><?php echo get_text_by_lang('Content','admin');?></strong></label>
                        <textarea id="editor" rows="15" name="send[content]" class="form-control page-content ckeditor"></textarea>
                    </p>
                    <p>
                        <label><strong><?php echo get_text_by_lang('Page Title','admin');?></strong> (<span class="system_count_char" data-target=".page-page-title">0</span> <?php echo get_text_by_lang('characters','admin');?>)</label>
                        <input type="text" class="form-control page-page-title input-size-medium" name="send[page_title]" placeholder="Page Title" />
                    </p>
                    <p>
                        <label><strong><?php echo get_text_by_lang('Descriptions','admin');?></strong> (<span class="system_count_char" data-target=".page-descriptions">0</span> <?php echo get_text_by_lang('characters','admin');?>)</label>
                        <input type="text" class="form-control page-descriptions input-size-medium" name="send[descriptions]" placeholder="Descriptions" />
                    </p>
                    <p>
                        <label><strong><?php echo get_text_by_lang('Keywords','admin');?></strong> (<span class="system_count_char" data-target=".page-keywords">0</span> <?php echo get_text_by_lang('characters','admin');?>)</label>
                        <input type="text" class="form-control page-keywords input-size-medium" name="send[keywords]" placeholder="Keywords" />
                    </p>    

                    <?php coffee_content_hook('admin_panel_end_new_page_left');?>
 
                    <p>
                        <button type="button" class="btn btn-primary btn-addnew" name="btnAdd"><?php echo get_text_by_lang('Add new','admin');?></button>
                    </p>  

                    
              </form> 
              </div>

                <!-- right -->
                <div class="col-lg-4 col-md-4 col-sm-4 ">

                <?php coffee_content_hook('admin_panel_start_new_page_right');?>
 
                        <p>
                        <label><strong><?php echo get_text_by_lang('Page type','admin');?>:</strong></label>
                        <select class="form-control select2js page-type" name="send[type]">
                              <option value="normal">Normal</option>
                              <option value="page">Page</option>
                              <option value="image">Image</option>
                               <option value="video">Video</option>
                              <option value="fullwidth">Full Width</option>
                              <option value="news">News</option>
                              <option value="post">Post</option>
                              <option value="thread">Thread</option>
                              <option value="question">Question</option>
                              <option value="notify">Notify</option>
                              <option value="movie">Movie</option>
                              <option value="status">Status</option>
                              <option value="card">Card</option>
                              <option value="product">Product</option>
                              <option value="profile">Profile</option>

                        </select>
                        </p>
                      
                        <p>
                        <label><strong><?php echo get_text_by_lang('Publish','admin');?>:</strong></label>
                        <select class="form-control page-status select2js" name="send[status]">
                        <option value="1"><?php echo get_text_by_lang('Yes','admin');?></option>
                          <option value="0"><?php echo get_text_by_lang('No','admin');?></option>

                        </select>
                        </p>

                        <p>
                             <button type="button" class="btn btn-primary btn-create-shortcode" ><i class='fas fa-code-branch'></i> <?php echo get_text_by_lang('Widgets','admin');?></button>
                           </p>

                           <?php coffee_content_hook('admin_panel_end_new_page_right');?>
 
                </div>
                <!-- right -->
            
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

  // filebrowserBrowseUrl : '<?php echo SITE_URL;?>public/ckeditor/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
  // filebrowserImageBrowseUrl : '<?php echo SITE_URL;?>public/ckeditor/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
});   
</script>


  <script type="text/javascript">
            var root_url='<?php echo SITE_URL;?>';
            pageData['listPostType']=<?php echo json_encode($listPostType);?>;


function prepareShowCategories()
{
  var total=pageData['listPostType'].length;

  li='<option value="">Choose a page type</option>';


  for (var i = 0; i < total; i++) {
    li+='<option value="'+pageData['listPostType'][i]['type_c']+'">'+pageData['listPostType'][i]['title']+'</option>';

  }

  $('.page-type').html(li).trigger('change');


}

$(document).ready(function(){
	$('.select2js').select2();
  $('.pushmenu').trigger('click');

  prepareShowCategories();

});


$(document).on('click','.btn-addnew',function(){
    var sendData={};

    sendData['title']=$('.page-title').val();
    sendData['descriptions']=$('.page-descriptions').val().trim();
    sendData['keywords']=$('.page-keywords').val().trim();
    sendData['page_type']=$('.page-type > option:selected').val().trim();
    sendData['content']=CKEDITOR.instances.editor.getData();
    // sendData['allow_comment']=$('.post-allow-comment > option:selected').val().trim();
    sendData['status']=$('.page-status > option:selected').val().trim();
    sendData['type']='1';

    
    if(sendData['title'].length==0)
    {
      showAlert('','Title not allow is blank');return false;
    }

    if(sendData['content'].length==0)
    {
      showAlert('','Content not allow is blank');return false;
    }
    
    if(sendData['page_type'].length==0)
    {
      showAlert('','Select a page type');return false;
    }

    postData(API_URL+'insert_new_page', sendData).then(data => {
      // console.log(data); // JSON data parsed by `data.json()` call
      // console.log(data['error']);

      if(data['error']=='yes')
      {
      showAlertOK('',data['data']);
      }
      else
      {
        $('.txtThumbnail').val('');
        showAlertOK('','Add new page successfull!');
      }
    });  
  });
  </script>

