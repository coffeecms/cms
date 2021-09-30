
<!-- Modal -->
<div class="modal fade" id="modalAddnew" data-backdrop="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo get_text_by_lang('Add new category','admin');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class='row'>
        <div class="col-lg-12">
                          
                        <form action="" method="post" enctype="multipart/form-data"> 
       
                        <p>
                            <label><strong><?php echo get_text_by_lang('Title','admin');?></strong></label>
                            <input type="text" class="form-control input-size-medium title" name="send[title]" placeholder="<?php echo get_text_by_lang('Title','admin');?>" id="txtTitle" />
                        </p>
                            <p class="pChosen">
                            <div class="row">
                            <div class="col-lg-12">
                            <label><strong><?php echo get_text_by_lang('Parent','admin');?></strong></label>
                            <select name="send[parentid]" class="form-control select2js parentid parentlist">
                            
                            </select>
                            </div>
                            </div>

                            </p>
                        <p>
                            <button type="button" class="btn btn-primary btn-select-thumbnail" ><i class='fas fa-images'></i> <?php echo get_text_by_lang('Choose a thumbnail','admin');?>...</button>
                            <input type="hidden" class="form-control input-size-medium txtThumbnail"  />
                        </p>     
                        <p>
                            <label><strong><?php echo get_text_by_lang('Descriptions','admin');?></strong> </label>
                            <input type="text" class="form-control descriptions input-size-medium" name="send[descriptions]" placeholder="<?php echo get_text_by_lang('Descriptions','admin');?>" />
                        </p> 
                        <p>
                            <label><strong><?php echo get_text_by_lang('Keywords','admin');?></strong> </label>
                            <input type="text" class="form-control keywords input-size-medium" name="send[keywords]" placeholder="<?php echo get_text_by_lang('Keywords','admin');?>" />
                        </p>  

                        </form>     
            
                    
                    </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btnSaveAdd" ><i class="fas fa-save"></i> <?php echo get_text_by_lang('Add new','admin');?></button>
        <button type="button" class="btn btn-danger " data-dismiss="modal"><i class="fas fa-times"></i> <?php echo get_text_by_lang('Close','admin');?></button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalEdit" data-backdrop="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo get_text_by_lang('Edit','admin');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class='row'>
        <div class="col-lg-12">
                          
                        <form action="" method="post" enctype="multipart/form-data"> 
       
                        <p>
                            <label><strong><?php echo get_text_by_lang('Title','admin');?></strong></label>
                            <input type="hidden" class="form-control input-size-medium edit-category_c"  />
                            <input type="text" class="form-control input-size-medium edit-title" name="send[title]" placeholder="<?php echo get_text_by_lang('Title','admin');?>" id="txtTitle" />
                        </p>
                            <p class="pChosen">
                            <div class="row">
                            <div class="col-lg-12">
                            <label><strong><?php echo get_text_by_lang('Parent','admin');?></strong></label>
                            <select name="send[parentid]" class="form-control select2js edit-parentid parentlist">
                            
                            </select>
                            </div>
                            </div>

                            </p>
                        <p>
                            <button type="button" class="btn btn-primary edit-btn-select-thumbnail" ><i class='fas fa-images'></i> <?php echo get_text_by_lang('Choose a thumbnail','admin');?>...</button>
                            <input type="hidden" class="form-control input-size-medium edit-txtThumbnail"  />
                        </p>     
                        <p>
                            <label><strong><?php echo get_text_by_lang('Descriptions','admin');?></strong> </label>
                            <input type="text" class="form-control edit-descriptions input-size-medium" name="send[descriptions]" placeholder="<?php echo get_text_by_lang('Descriptions','admin');?>" />
                        </p> 
                        <p>
                            <label><strong><?php echo get_text_by_lang('Keywords','admin');?></strong> </label>
                            <input type="text" class="form-control edit-keywords input-size-medium" name="send[keywords]" placeholder="<?php echo get_text_by_lang('Keywords','admin');?>" />
                        </p>  

                        </form>     
            
                    
                    </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btnSaveEdit" ><i class="fas fa-save"></i> <?php echo get_text_by_lang('Save changes','admin');?></button>
        <button type="button" class="btn btn-danger " data-dismiss="modal"><i class="fas fa-times"></i> <?php echo get_text_by_lang('Close','admin');?></button>
      </div>
    </div>
  </div>
</div>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
                    <div class="col-lg-12">
                    <form action="" method="post" enctype="multipart/form-data">

                    <div class="card" style='margin-top:20px;'>
              <div class="card-header border-0">
                <h3 class="card-title"><?php echo get_text_by_lang('Categories','admin');?></h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm btnAddNew" title="Add new" style='font-size:18pt;'>
                    <i class="fas fa-plus-square"></i>
                  </a>
                 
                </div>
              </div>
              <div class="card-body table-responsive p-0">
              <table class="table table-hover table-striped table-valign-middle">
                  <thead>
                    <tr >
                                              <th><button type="button" class="btn btn-default btn-xs btn-checkall" data-checked="no"><i class="fas fa-square"></i></button></th>
                                              <th><?php echo get_text_by_lang('Title','admin');?></th>
                                              <th style="width:110px;text-align: right;"><?php echo get_text_by_lang('Sort order','admin');?></th>
                                          </tr>
                  </thead>
                  <tbody class='list-categories'>
                  
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
                  
                    </form>
                    </div>
 
                    <div class='col-lg-12 ' >
                      <div class="btn-group" style='float:left;' role="group" aria-label="Basic example">
                        <select class="form-control post-action select2js-nomodal" name="send[type]">
                        <option value=""><?php echo get_text_by_lang('Select an action','admin');?></option>
                        <option value="delete"><?php echo get_text_by_lang('Delete','admin');?></option>
                          
                        </select>
                        <button type="button" class="btn btn-info btnApply"><?php echo get_text_by_lang('Apply','admin');?></button>
                    </div>                      
                    


                    </div>                    
                    
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

</script>

<script type="text/javascript">


   // postData('http://localhost/coffeecms/api/index', { answer: 42 })
 // .then(data => {
  //  console.log(data); // JSON data parsed by `data.json()` call
  //  console.log(data['error']);
  // });

function prepareShowCategories()
{
  var total=pageData['listCat'].length;

  var li='';

  var td='';

  li+='<option value="">Choose parent category</option>';


  for (var i = 0; i < total; i++) {
    li+='<option value="'+pageData['listCat'][i]['category_c']+'">'+pageData['listCat'][i]['title']+'</option>';

    td+='<tr class="tr-id-'+pageData['listCat'][i]['category_c']+'" style="cursor:pointer;">';
    td+='<td style="width:80px;text-align: left;">';
    td+='<button type="button" class="btn btn-default btn-xs btn-checkbox" data-checked="no" data-id="'+pageData['listCat'][i]['category_c']+'"><i class="fas fa-square"></i></button>';
    td+='</td>';
    td+='<td class="td-category" data-id="'+pageData['listCat'][i]['category_c']+'">'+pageData['listCat'][i]['title'];
    td+='</td>';
    td+='<td style="width:110px;text-align: right;">';
    td+='<button class="btn btn-info btn-sm btn-sort-up" data-id="'+pageData['listCat'][i]['category_c']+'"  type="button"><i class="fas fa-chevron-up"></i></button>&nbsp;';
    td+='<button class="btn btn-info btn-sm btn-sort-down" data-id="'+pageData['listCat'][i]['category_c']+'"  type="button"><i class="fas fa-chevron-down"></i></button>';
    td+='</td>';

    td+='</tr>';

  }

  $('.parentid').html(li);
  $('.edit-parentid').html(li);
  $('.list-categories').html(td);
}

masterDB['media_selected_callback']=function(theMediaUrl){
    console.log('Added...'+theMediaUrl);
    $('.txtThumbnail').val(theMediaUrl);
};

    $(document).ready(function(){

      prepareShowCategories();
      $('.select2js').select2();

    });

    $(document).on('click','.btnSaveAdd',function(){
      var sendData={};

      sendData['title']=$('.title').val().trim();
      sendData['parentid']=$('.parentid > option:selected').val().trim();
      sendData['descriptions']=$('.descriptions').val().trim();
      sendData['keywords']=$('.keywords').val().trim();
      sendData['thumbnail']=$('.txtThumbnail').val();
      sendData['type']='1';

        
      if(sendData['title'].length==0)
      {
        showAlert('','Title not allow is blank');return false;
      }


      postData(API_URL+'add_new_category', sendData).then(data => {
        console.log(data); // JSON data parsed by `data.json()` call
        // console.log(data['error']);
        $('.txtThumbnail').val('');
        showAlertOK('','Add new category successfull!');
        $('#modalAddnew').modal('hide');
      });      
        
    });
    $(document).on('click','.btnSaveEdit',function(){
      var sendData={};

      sendData['category_c']=$('.edit-category_c').val();
      sendData['title']=$('.edit-title').val().trim();
      sendData['parentid']=$('.edit-parentid > option:selected').val().trim();
      sendData['descriptions']=$('.edit-descriptions').val().trim();
      sendData['keywords']=$('.edit-keywords').val().trim();
      sendData['thumbnail']=$('.txtThumbnail').val();
      sendData['type']='1';

              
      if(sendData['title'].length==0)
      {
        showAlert('','Title not allow is blank');return false;
      }

      
      postData(API_URL+'update_category', sendData).then(data => {
        console.log(data); // JSON data parsed by `data.json()` call
        console.log(data['error']);
        $('.txtThumbnail').val('');
        showAlertOK('','Save changes successfull!');
        $('#modalEdit').modal('hide');
      });      
        
    });

    $(document).on('click','.btn-select-thumbnail',function(){
      showListMedia();  
        
    });

    $(document).on('click','.btn-sort-up',function(){
      var sendData={};

      sendData['category_c']=$(this).attr('data-id');
      sendData['type']='1';

      postData(API_URL+'category_sort_up', sendData).then(data => {
        console.log(data); // JSON data parsed by `data.json()` call

        location.href=location.href;
      });            
        
    });

    $(document).on('click','.btn-sort-down',function(){
      var sendData={};

      sendData['category_c']=$(this).attr('data-id');
      sendData['type']='1';

      postData(API_URL+'category_sort_down', sendData).then(data => {
        console.log(data); // JSON data parsed by `data.json()` call

        location.href=location.href;
      });            
        
    });
    
    $(document).on('click','.td-category',function(){
      var sendData={};

      sendData['category_c']=$(this).attr('data-id');
      sendData['type']='1';

      $('.edit-category_c').val(sendData['category_c']);

      postData(API_URL+'load_category_data', sendData).then(data => {
        console.log(data); // JSON data parsed by `data.json()` call


        $('.edit-title').val(data['data']['title']);
        $('.edit-keywords').val(data['data']['keywords']);
        $('.edit-descriptions').val(data['data']['descriptions']);
        $('.edit-parentid').val(data['data']['parent_category_c']).trigger('change');
        
        //modalEdit
        $('#modalEdit').modal({backdrop:'static',keyboard:false});
      });            
        
    });

    $(document).on('click','.btnAddNew',function(){
      $('#modalAddnew').modal({backdrop:'static',keyboard:false});
    });


//btn-checkbox
$(document).on('click','.btn-checkbox',function(){
  var checked=$(this).attr('data-checked');

  if(checked=='no')
  {
    $(this).attr('data-checked','yes');
    $(this).html('<i class="fas fa-check-square"></i>').addClass('btn-success');
  }
  else
  {
    $(this).attr('data-checked','no');
    $(this).html('<i class="fas fa-square"></i>').removeClass('btn-success');
  }
});

$(document).on('click','.btnApply',function(){
  pageData['list_category_c']='';

  $('.btn-checkbox').each(function(){
    var id=$(this).attr('data-id');
    var checked=$(this).attr('data-checked');

    if(checked=='yes')
    {
      pageData['list_category_c']+=id+',';
    }
    
  });

  var sendData={};

 

  sendData['type']='1';
 
  sendData['list_category_c']=pageData['list_category_c'];
  pageData['action']=$('.post-action > option:selected').val().trim();
  sendData['action']=pageData['action'];

  postData(API_URL+'category_action_apply', sendData).then(data => {
    // console.log(data); // JSON data parsed by `data.json()` call

    if(pageData['action']=='delete')
    {
      $('.btn-checkbox').each(function(){
        var id=$(this).attr('data-id');
        var checked=$(this).attr('data-checked');

        if(checked=='yes')
        {
          $('.tr-id-'+id).remove();
        }
      });
    }

    showAlert('','Done!');
  });  

});



$(document).on('click','.btn-checkall',function(){
  var checked=$(this).attr('data-checked');

  if(checked=='no')
  {
    $(this).attr('data-checked','yes');
    $(this).html('<i class="fas fa-check-square"></i>').addClass('btn-success');

    $('.btn-checkbox').attr('data-checked','yes').html('<i class="fas fa-check-square"></i>').addClass('btn-success');
  }
  else
  {
    $(this).attr('data-checked','no');
    $(this).html('<i class="fas fa-square"></i>').removeClass('btn-success');

    $('.btn-checkbox').attr('data-checked','no').html('<i class="fas fa-square"></i>').removeClass('btn-success');
  }
});

       
</script>