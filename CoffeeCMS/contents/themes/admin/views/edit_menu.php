
<!-- Modal -->
<div class="modal fade" id="modalAddnew" data-backdrop="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo get_text_by_lang('Add new menu','admin');?></h5>
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
                        <p>
                            <label><strong><?php echo get_text_by_lang('Page url','admin');?></strong></label>
                            <input type="text" class="form-control input-size-medium page_url" name="send[title]" placeholder="<?php echo get_text_by_lang('Page url','admin');?>" id="txtTitle" />
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
                            <input type="hidden" class="form-control input-size-medium edit-menu_id"  />
                            <input type="text" class="form-control input-size-medium edit-title" name="send[title]" placeholder="<?php echo get_text_by_lang('Title','admin');?>" id="txtTitle" />
                        </p>
                                                <p>
                            <label><strong><?php echo get_text_by_lang('Page url','admin');?></strong></label>
                            <input type="text" class="form-control input-size-medium edit-page_url" name="send[title]" placeholder="<?php echo get_text_by_lang('Page url','admin');?>" id="txtTitle" />
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
                <h3 class="card-title"><?php echo get_text_by_lang('Menu','admin');?></h3>
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
                  <tbody class='list-menu'>
                  
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
    pageData['listMenu']=<?php echo $listMenu;?>;

</script>

<script type="text/javascript">


   // postData('http://localhost/coffeecms/api/index', { answer: 42 })
 // .then(data => {
  //  console.log(data); // JSON data parsed by `data.json()` call
  //  console.log(data['error']);
  // });

function prepareShowCategories()
{
  var total=pageData['listMenu'].length;

  var li='';

  var td='';

  li+='<option value="">Choose parent menu</option>';


  for (var i = 0; i < total; i++) {
    li+='<option value="'+pageData['listMenu'][i]['menu_id']+'">'+pageData['listMenu'][i]['title']+'</option>';

    td+='<tr class="tr-id-'+pageData['listMenu'][i]['menu_id']+'" style="cursor:pointer;">';
    td+='<td style="width:80px;text-align: left;">';
    td+='<button type="button" class="btn btn-default btn-xs btn-checkbox" data-checked="no" data-id="'+pageData['listMenu'][i]['menu_id']+'"><i class="fas fa-square"></i></button>';
    td+='</td>';
    td+='<td class="td-category" data-id="'+pageData['listMenu'][i]['menu_id']+'">'+pageData['listMenu'][i]['title'];
    // td+='<span style="display:block;margin-top:5px;margin-bottom:5px;font-size: 9pt;">Descriptions: '+pageData['listMenu'][i]['descriptions']+'</span>';
    // td+='<span style="display:block;margin-bottom:5px;font-size: 9pt;">Keywords: '+pageData['listMenu'][i]['keywords']+'</span>';
    td+='</td>';
    td+='<td style="width:110px;text-align: right;">';
    td+='<button class="btn btn-info btn-sm btn-sort-up" data-id="'+pageData['listMenu'][i]['menu_id']+'"  type="button"><i class="fas fa-chevron-up"></i></button>&nbsp;';
    td+='<button class="btn btn-info btn-sm btn-sort-down" data-id="'+pageData['listMenu'][i]['menu_id']+'"  type="button"><i class="fas fa-chevron-down"></i></button>';
    td+='</td>';

    
    td+='</tr>';

  }

  $('.parentid').html(li);
  $('.edit-parentid').html(li);
  $('.list-menu').html(td);
}


    $(document).ready(function(){

      prepareShowCategories();
      $('.select2js').select2();

    });

    $(document).on('click','.btnSaveAdd',function(){
      var sendData={};

      sendData['title']=$('.title').val().trim();
      sendData['page_url']=$('.page_url').val().trim();
      sendData['parent_menu_id']=$('.parentid > option:selected').val().trim();
      sendData['type']='1';

      postData(API_URL+'add_new_menu', sendData).then(data => {
        console.log(data); // JSON data parsed by `data.json()` call
        // console.log(data['error']);
        showAlertOK('','Done!');
        $('#modalAddnew').modal('hide');
      });      
        
    });
    $(document).on('click','.btnSaveEdit',function(){
      var sendData={};

      sendData['menu_id']=$('.edit-menu_id').val();
      sendData['edit-page_url']=$('.edit-page_url').val().trim();
      sendData['title']=$('.edit-title').val().trim();
      sendData['parent_menu_id']=$('.edit-parentid > option:selected').val().trim();
      sendData['type']='1';

      postData(API_URL+'update_menu', sendData).then(data => {
        console.log(data); // JSON data parsed by `data.json()` call
        console.log(data['error']);
        showAlertOK('','Done!');
        $('#modalEdit').modal('hide');
      });      
        
    });

    $(document).on('click','.btn-sort-up',function(){
      var sendData={};

      sendData['menu_id']=$(this).attr('data-id');
      sendData['type']='1';

      postData(API_URL+'menu_sort_up', sendData).then(data => {
        console.log(data); // JSON data parsed by `data.json()` call
 showAlertOK('','Done!');
        location.href=location.href;
      });            
        
    });

    $(document).on('click','.btn-sort-down',function(){
      var sendData={};

      sendData['menu_id']=$(this).attr('data-id');
      sendData['type']='1';

      postData(API_URL+'menu_sort_down', sendData).then(data => {
        console.log(data); // JSON data parsed by `data.json()` call
    showAlertOK('','Done!');
        location.href=location.href;
      });            
        
    });
    
    $(document).on('click','.td-category',function(){
      var sendData={};

      sendData['menu_id']=$(this).attr('data-id');
      sendData['type']='1';

      $('.edit-menu_id').val(sendData['menu_id']);

      postData(API_URL+'load_menu_data', sendData).then(data => {
        // console.log(data); // JSON data parsed by `data.json()` call

        $('.edit-title').val(data['data']['title']);
        $('.edit-page_url').val(data['data']['page_url']).trigger('change');
        $('.edit-parentid').val(data['data']['parent_menu_id']).trigger('change');
        
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


$(document).on('click','.btnApply',function(){
  pageData['list_menu_id']='';

  $('.btn-checkbox').each(function(){
    var id=$(this).attr('data-id');
    var checked=$(this).attr('data-checked');

    if(checked=='yes')
    {
      pageData['list_menu_id']+=id+',';
    }
    
  });

  var sendData={};

 

  sendData['type']='1';
 
  sendData['list_menu_id']=pageData['list_menu_id'];
  pageData['action']=$('.post-action > option:selected').val().trim();
  sendData['action']=pageData['action'];

  postData(API_URL+'menu_action_apply', sendData).then(data => {
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

</script>