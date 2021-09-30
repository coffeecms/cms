<script src="<?php echo SITE_URL; ?>public/ckeditor/ckeditor.js"></script>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo get_text_by_lang('Add new post','admin');?></h1>
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
                
                  <div class="col-lg-8 col-md-8 col-sm-12 ">
                   <?php echo $alert;?>
                   <?php coffee_content_hook('admin_panel_start_new_post_left');?>
 
                        <p>
                            <label><strong><?php echo get_text_by_lang('Title','admin');?></strong> (<span class="system_count_char" data-target=".post-title">0</span> <?php echo get_text_by_lang('characters','admin');?>)</label>
                            <input type="text" class="form-control post-title input-size-medium" name="send[title]" placeholder="Title" />
                        </p>
             
                        <p>
                            <label><strong><?php echo get_text_by_lang('Content','admin');?></strong> </label>
                            
                            <textarea id="editor" rows="15" name="send[content]" class="form-control post-content ckeditor"></textarea>
                        </p>
                  
                        <p>
                            <label><strong><?php echo get_text_by_lang('Descriptions','admin');?></strong> (<span class="system_count_char" data-target=".post-descriptions">0</span> <?php echo get_text_by_lang('characters','admin');?>)</label>
                            <input type="text" class="form-control post-descriptions input-size-medium" name="send[descriptions]" placeholder="Descriptions" />
                        </p> 
                        <p>
                            <label><strong><?php echo get_text_by_lang('Keywords','admin');?></strong> (<span class="system_count_char" data-target=".post-keywords">0</span> <?php echo get_text_by_lang('characters','admin');?>)</label>
                            <input type="text" class="form-control post-keywords input-size-medium" name="send[keywords]" placeholder="Keywords" />
                        </p> 
                        <p>
                            <label><strong><?php echo get_text_by_lang('Tags','admin');?> (<?php echo get_text_by_lang('separate by commas','admin');?>)</strong></label>
                            <input type="text" class="form-control post-tags input-size-medium" name="tags" placeholder="Tags" />
                        </p>

                        <?php coffee_content_hook('admin_panel_end_new_post_left');?>
 
                  </div>

                    <!-- right -->
                    <div class="col-lg-4 col-md-4 col-sm-12 ">

                 
                            <p class="pChosen">
                            <div class="row">
                            <div class="col-lg-12">

                            <?php coffee_content_hook('admin_panel_start_new_post_right');?>
 
                            <label><strong><?php echo get_text_by_lang('Category','admin');?></strong></label>
                            <select name="send[catid]" class="form-control category_c select2js ">
                                <?php if(isset($listCat[0]['id'])){ ?>
                                <?php
                                $total=count($listCat);

                                $li='';

                                for ($i=0; $i < $total; $i++) { 

                                    $li.='<option value="'.$listCat[$i]['id'].'">'.$listCat[$i]['title'].'</option>';
                                }

                                echo $li;
                                ?>
                                <?php } ?>
                            </select>
                            </div>
                            </div>

                            </p> 
                            <p>
                            <label><strong><?php echo get_text_by_lang('Post type','admin');?>:</strong></label>
                            <select class="form-control post-type select2js" name="send[type]">
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
                            <!-- <p>
                            <label><strong>Allow Comment:</strong></label>
                            <select class="form-control post-allow-comment select2js" name="send[allowcomment]">
                            <option value="1">Yes</option>
                              <option value="0">No</option>

                            </select>
                            </p> -->
                            <p>
                            <label><strong><?php echo get_text_by_lang('Publish','admin');?>:</strong></label>
                            <select class="form-control post-status select2js" name="send[status]">
                            <option value="1">Yes</option>
                              <option value="0" <?php if(!isset(Configs::$_['user_permissions']['post01'])){ echo 'selected';};?>>No</option>

                            </select>
                            </p>

                           
                           <p>
                             <button type="button" class="btn btn-primary btn-select-thumbnail" ><i class='fas fa-images'></i> <?php echo get_text_by_lang('Choose a thumbnail','admin');?>...</button>
                             <input type="hidden" class="form-control input-size-medium txtThumbnail"  />

                             <div><img src="" class='img-thumbnail txtThumbnailSrc' /></div>
                           </p>
                           <p>
                             <button type="button" class="btn btn-primary btn-create-shortcode" ><i class='fas fa-code-branch'></i> <?php echo get_text_by_lang('Widgets','admin');?></button>
                           </p>

                           <?php coffee_content_hook('admin_panel_end_new_post_right');?>
                 
                    </div>
                    <!-- right -->
                
                </div>
                                        <p>
                            <button type="button" class="btn btn-primary btn-addnew" <?php if(!isset(Configs::$_['user_permissions']['post05'])){ echo 'disabled';};?> ><i class='fas fa-thumbs-up'></i> <?php echo get_text_by_lang('Add new','admin');?></button>
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
    pageData['listCat']=<?php echo $listCat;?>;
    pageData['listPostType']=<?php echo json_encode($listPostType);?>;

  // Replace the <textarea id="editor1"> with a CKEditor
  // instance, using default configuration.
  // CKEDITOR.replace( 'editor' );  extraPlugins: 'wordcount,notification',
CKEDITOR.replace( 'editor' ,{
  extraPlugins: 'wordcount,notification,texttransform,justify',
  // filebrowserBrowseUrl : '<?php echo SITE_URL;?>public/ckeditor/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
  // filebrowserImageBrowseUrl : '<?php echo SITE_URL;?>public/ckeditor/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
});   

// CKEDITOR.instances.editor.insertHtml('<p><strong>sdfsdfsdf</strong></p>')
// CKEDITOR.instances.editor.insertHtml('<strong>asdsadsadsd</strong>')

masterDB['media_selected_callback']=function(theMediaUrl){
    console.log('Added...'+theMediaUrl);
    $('.txtThumbnail').val(theMediaUrl);

    $('.txtThumbnailSrc').attr('src',theMediaUrl+'?v='+moment().format('HHmm'));
};

function prepareShowCategories()
{
  var total=pageData['listCat'].length;

  var li='';

  var td='';

  li+='<option value="">Choose a category</option>';


  for (var i = 0; i < total; i++) {
    li+='<option value="'+pageData['listCat'][i]['category_c']+'">'+pageData['listCat'][i]['title']+'</option>';

  }

  $('.category_c').html(li).trigger('change');


  //post-type
  total=pageData['listPostType'].length;

  li='<option value="">Choose a post type</option>';


  for (var i = 0; i < total; i++) {
    li+='<option value="'+pageData['listPostType'][i]['type_c']+'">'+pageData['listPostType'][i]['title']+'</option>';

  }

  $('.post-type').html(li).trigger('change');

}
</script>
<script>
  $(function() {
    $('.select2js').select2();
  });
</script>

  <script type="text/javascript">
  var root_url='<?php echo SITE_URL;?>';


  $(document).ready(function(){
    $('.pushmenu').trigger('click');
    prepareShowCategories();
    $('.select2js').select2();

  });

  $(document).on('click','.btn-addnew',function(){
    var sendData={};

    sendData['title']=$('.post-title').val();
    sendData['descriptions']=$('.post-descriptions').val().trim();
    sendData['keywords']=$('.post-keywords').val().trim();
    sendData['tags']=$('.post-tags').val().trim();
    sendData['category_c']=$('.category_c > option:selected').val().trim();
    sendData['post_type']=$('.post-type > option:selected').val().trim();
    sendData['content']=CKEDITOR.instances.editor.getData();

    if(sendData['title'].length==0)
    {
      showAlert('','Title not allow is blank');return false;
    }

    if(sendData['content'].length==0)
    {
      showAlert('','Content not allow is blank');return false;
    }

    if(sendData['category_c'].length==0)
    {
      showAlert('','Select a category');return false;
    }

    if(sendData['post_type'].length==0)
    {
      showAlert('','Select a post type');return false;
    }

    // sendData['allow_comment']=$('.post-allow-comment > option:selected').val().trim();
    sendData['status']=$('.post-status > option:selected').val().trim();
    sendData['thumbnail']=$('.txtThumbnail').val();
    sendData['type']='1';

    sendData['thumbnail']=sendData['thumbnail'].replace(SITE_URL,'');

    postData(API_URL+'insert_new_post', sendData).then(data => {
      // console.log(data); // JSON data parsed by `data.json()` call
      // console.log(data['error']);

      if(data['error']=='yes')
      {
        showAlertOK('',data['data']);
      }
      else
      {
        $('.txtThumbnail').val('');
      showAlertOK('','Done!');
      }

    });  
  });

  $(document).on('click','.btn-select-thumbnail',function(){
      showListMedia();  
        
    });
    
  </script>