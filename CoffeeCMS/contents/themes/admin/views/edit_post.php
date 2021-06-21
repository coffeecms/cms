<script src="<?php echo SITE_URL; ?>public/ckeditor/ckeditor.js"></script>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo get_text_by_lang('Edit post','admin');?></h1>
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
                            <input type="text" class="form-control post-tags input-size-medium" name="tags" placeholder="<?php echo get_text_by_lang('Alert','admin');?>Tags" />
                        </p>


                  </div>

                    <!-- right -->
                    <div class="col-lg-4 col-md-4 col-sm-12 ">

                 
                            <p class="pChosen">
                            <div class="row">
                            <div class="col-lg-12">
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
                            <option value="1"><?php echo get_text_by_lang('Yes','admin');?></option>
                              <option value="0"><?php echo get_text_by_lang('No','admin');?></option>

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

                                        
                    </div>
                    <!-- right -->
                
                </div>
                                        <p>
                            <button type="button" class="btn btn-primary btn-save" ><i class='fas fa-thumbs-up'></i> <?php echo get_text_by_lang('Save changes','admin');?></button>
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
    pageData['thePost']=<?php echo $thePost;?>;
    pageData['listPostType']=<?php echo json_encode($listPostType);?>;

  // Replace the <textarea id="editor1"> with a CKEditor
  // instance, using default configuration.
  // CKEDITOR.replace( 'editor' );  extraPlugins: 'wordcount,notification',
CKEDITOR.replace( 'editor' ,{
  extraPlugins: 'wordcount,notification,texttransform,justify',
  filebrowserBrowseUrl : '<?php echo SITE_URL;?>public/ckeditor/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
  filebrowserImageBrowseUrl : '<?php echo SITE_URL;?>public/ckeditor/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
});   

// CKEDITOR.instances.editor.insertHtml('<p><strong>sdfsdfsdf</strong></p>')

masterDB['media_selected_callback']=function(theMediaUrl){
    console.log('Added...'+theMediaUrl);
    $('.txtThumbnail').val(theMediaUrl);
        $('.txtThumbnailSrc').attr('src',theMediaUrl+'?v='+moment().format('HHmm'));
};

function prepareShowCategories(callback)
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
    if(pageData['thePost']['post_type']==pageData['listPostType'][i]['type_c'])
    {
    li+='<option value="'+pageData['listPostType'][i]['type_c']+'" selected>'+pageData['listPostType'][i]['title']+'</option>';

    }
    else
    {
    li+='<option value="'+pageData['listPostType'][i]['type_c']+'">'+pageData['listPostType'][i]['title']+'</option>';

    }


  }

  $('.post-type').html(li).trigger('change');

  callback();
}

function preparePostData()
{
  $('.post-title').val(pageData['thePost']['title']);
  $('.post-descriptions').val(pageData['thePost']['descriptions']);
  $('.post-keywords').val(pageData['thePost']['keywords']);
  $('.post-tags').val(pageData['thePost']['tags']);

  $('.category_c').val(pageData['thePost']['category_c']).trigger('change');
  $('.post_type').val(pageData['thePost']['post_type']).trigger('change');
  $('.status').val(pageData['thePost']['status']).trigger('change');

  if(pageData['thePost']['thumbnail']!=null || pageData['thePost']['thumbnail'].length > 5)
  {
    $('.txtThumbnail').val(pageData['thePost']['thumbnail']);
     $('.txtThumbnailSrc').attr('src',SITE_URL+ pageData['thePost']['thumbnail']+'?v='+moment().format('HHmm'));
  }
 
  setTimeout(function(){ 

   CKEDITOR.instances.editor.insertHtml(pageData['thePost']['content']);



  $('.system_count_char').each(function(index, el) {

  var theEl=$(this);

  var target=$(this).data('target');

  system_count_char(theEl,target);
  
  system_listen_count_char(theEl,target);

  });
  },500);  
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

       $('.select2js').select2();

    prepareShowCategories(function(){
      preparePostData();      
    });

 

  });

  $(document).on('click','.btn-save',function(){
    var sendData={};

    sendData['post_c']=pageData['thePost']['post_c'];

    sendData['title']=$('.post-title').val();
    sendData['descriptions']=$('.post-descriptions').val().trim();
    sendData['keywords']=$('.post-keywords').val().trim();
    sendData['tags']=$('.post-tags').val().trim();
    sendData['category_c']=$('.category_c > option:selected').val().trim();
    sendData['post_type']=$('.post-type > option:selected').val().trim();
    sendData['content']=CKEDITOR.instances.editor.getData();

    // sendData['allow_comment']=$('.post-allow-comment > option:selected').val().trim();
    sendData['status']=$('.post-status > option:selected').val().trim();
    sendData['thumbnail']=$('.txtThumbnail').val();
    sendData['type']='1';
    sendData['thumbnail']=sendData['thumbnail'].replace(SITE_URL,'');

    
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
    
    postData(API_URL+'update_post_by_id', sendData).then(data => {
      // console.log(data); // JSON data parsed by `data.json()` call

      if(data['error']=='yes')
      {
      showAlertOK('',data['data']);
      }
      else
      {
        showAlertOK('','Done!');
      }
      // console.log(data['error']);

    });  
  });

  $(document).on('click','.btn-select-thumbnail',function(){
      showListMedia();  
        
    });
    
  </script>