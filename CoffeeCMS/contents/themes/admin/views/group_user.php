

<!-- Modal -->
<div class="modal fade" id="modalAdd"  style='z-index:99999;' data-backdrop="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel"><?php echo get_text_by_lang('Add group','admin');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">

      <p>
        <label><strong><?php echo get_text_by_lang('Title','admin');?></strong></label>
        <input type="text" class="form-control add-title input-size-medium" name="send[keywords]" placeholder="<?php echo get_text_by_lang('Title','admin');?>" />
      </p> 
      <p>
        <label><strong><?php echo get_text_by_lang('Left String','admin');?></strong></label>
        <textarea type="text" class="form-control add-leftstr input-size-medium" name="send[keywords]" placeholder="<?php echo get_text_by_lang('Left String','admin');?>" style='height:90px;'></textarea>
      </p> 
      <p>
        <label><strong><?php echo get_text_by_lang('Right String','admin');?></strong></label>
        <textarea type="text" class="form-control add-rightstr input-size-medium" name="send[keywords]" placeholder="<?php echo get_text_by_lang('Right String','admin');?>"  style='height:90px;'></textarea>
      </p> 
    
      <p>
        <label><strong><?php echo get_text_by_lang('Permissions','admin');?></strong></label> <button type='button' class='btn btn-primary btnSetAllPer btn-xs'><?php echo get_text_by_lang('All','admin');?></button><button type='button' class='btn btn-primary btnUnSetAllPer btn-xs' style="margin-left:10px;"><?php echo get_text_by_lang('Unset all','admin');?></button>
          <select class="form-control add-permissions add-select2js" multiple="multiple" name="send[type]">
          
          </select>
      </p> 
    
      <p>
        <label><strong><?php echo get_text_by_lang('Allow Access Menu','admin');?></strong></label> <button type='button' class='btn btn-primary btnSetAllMenu btn-xs'><?php echo get_text_by_lang('All','admin');?></button><button type='button' class='btn btn-primary btnUnSetAllMenu btn-xs' style="margin-left:10px;"><?php echo get_text_by_lang('Unset all','admin');?></button>
          <select class="form-control add-menu add-select2js" multiple="multiple" name="send[type]">
          
          </select>
      </p> 

      <p>
        <label><strong><?php echo get_text_by_lang('Priority','admin');?></strong></label>
        <input type="text" class="form-control add-priority input-size-medium" name="send[keywords]" placeholder="<?php echo get_text_by_lang('Priority','admin');?>" value="0" />
      </p>       
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info btnAddGroup" ><i class="fas fa-save"></i> <?php echo get_text_by_lang('Add new','admin');?></button>
        <button type="button" class="btn btn-danger btnCloseAlert" data-dismiss="modal"><i class="fas fa-times"></i> <?php echo get_text_by_lang('Close','admin');?></button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalEdit"  style='z-index:99999;' data-backdrop="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel"><?php echo get_text_by_lang('Edit group','admin');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">

      <p>
        <label><strong><?php echo get_text_by_lang('Title','admin');?></strong></label>
        <input type="text" class="form-control edit-title input-size-medium" name="send[keywords]" placeholder="<?php echo get_text_by_lang('Title','admin');?>" />
      </p> 

      <p>
        <label><strong><?php echo get_text_by_lang('Left String','admin');?></strong></label>
        <textarea type="text" class="form-control edit-leftstr input-size-medium" name="send[keywords]" placeholder="<?php echo get_text_by_lang('Left String','admin');?>" style='height:90px;'></textarea>
      </p> 
      <p>
        <label><strong><?php echo get_text_by_lang('Right String','admin');?></strong></label>
        <textarea type="text" class="form-control edit-rightstr input-size-medium" name="send[keywords]" placeholder="<?php echo get_text_by_lang('Right String','admin');?>"  style='height:90px;'></textarea>
      </p> 
    

      <p>
        <label><strong><?php echo get_text_by_lang('Permissions','admin');?></strong></label> <button type='button' class='btn btn-primary btnSetAllPerEdit btn-xs'><?php echo get_text_by_lang('All','admin');?></button><button type='button' class='btn btn-primary btnUnSetAllPerEdit btn-xs' style="margin-left:10px;"><?php echo get_text_by_lang('Unset all','admin');?></button>
          <select class="form-control edit-permissions edit-select2js" multiple="multiple" name="send[type]">
          
          </select>
      </p> 

          
      <p>
        <label><strong><?php echo get_text_by_lang('Allow Access Menu','admin');?></strong></label> <button type='button' class='btn btn-primary btnSetAllMenuEdit btn-xs'><?php echo get_text_by_lang('Set all','admin');?></button><button type='button' class='btn btn-primary btnUnSetAllMenuEdit btn-xs' style="margin-left:10px;"><?php echo get_text_by_lang('Unset all','admin');?></button>
          <select class="form-control edit-menu add-select2js"  multiple="multiple" name="send[type]">
          
          </select>
      </p> 

      <p>
        <label><strong><?php echo get_text_by_lang('Priority','admin');?></strong></label>
        <input type="text" class="form-control edit-priority input-size-medium" name="send[keywords]" placeholder="<?php echo get_text_by_lang('Priority','admin');?>" value="0" />
      </p>       


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info btnSaveGroup" ><i class="fas fa-save"></i> <?php echo get_text_by_lang('Save changes','admin');?></button>
        <button type="button" class="btn btn-danger btnCloseAlert" data-dismiss="modal"><i class="fas fa-times"></i> <?php echo get_text_by_lang('Close','admin');?></button>
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
                <h3 class="card-title"><?php echo get_text_by_lang('Groups','admin');?></h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm btn-add-group" title="Add new" style='font-size:18pt;'>
                    <i class="fas fa-plus-square"></i>
                  </a>
                 
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-hover table-striped table-valign-middle">
                  <thead>
                  <tr>
                  <th><button type="button" class="btn btn-default btn-xs btn-checkall" data-checked="no"><i class="fas fa-square"></i></button></th>
                    <th><?php echo get_text_by_lang('Code','admin');?></th>
                    <th><?php echo get_text_by_lang('Title','admin');?></th>
                    <th class="text-right"><?php echo get_text_by_lang('Priority','admin');?></th>
                    <th class="text-right"><?php echo get_text_by_lang('Total Permissions','admin');?></th>
                    <th class="text-right"><?php echo get_text_by_lang('Total Users','admin');?></th>
                    <th class='text-right'><?php echo get_text_by_lang('Actions','admin');?></th>
                  </tr>
                  </thead>
                  <tbody class='the-list'>
                  
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
    pageData['theList']=<?php echo json_encode($theList);?>;
    pageData['listPermissions']=<?php echo json_encode($listPermissions);?>;
    pageData['listGroupPermissions']=<?php echo json_encode($listGroupPermissions);?>;
    pageData['listMenuPermissions']=<?php echo json_encode($listMenuPermissions);?>;
    pageData['listMenu']=<?php echo json_encode($listMenu);?>;

</script>

<script type="text/javascript">


   // postData('http://localhost/coffeecms/api/index', { answer: 42 })
 // .then(data => {
  //  console.log(data); // JSON data parsed by `data.json()` call
  //  console.log(data['error']);
  // });

function prepareMenuData()
{
  var total=pageData['listMenu'].length;

  var li='';

  for (var i = 0; i < total; i++) {
    li+='<option value="'+pageData['listMenu'][i]['menu_id']+'">'+pageData['listMenu'][i]['title']+'</option>';
  }

  $('.add-menu').html(li).trigger('change');
  $('.edit-menu').html(li).trigger('change');
}
function preparePermissionsData()
{
  var total=pageData['listPermissions'].length;

  var li='';

  for (var i = 0; i < total; i++) {
    li+='<option value="'+pageData['listPermissions'][i]['permission_c']+'">'+pageData['listPermissions'][i]['title']+'</option>';
  }

  $('.add-permissions').html(li).trigger('change');
  $('.edit-permissions').html(li).trigger('change');
}

function prepareShowData()
{
  var total=pageData['theList'].length;

  var li='';

  var td='';
  $('.the-list').html('');

  for (var i = 0; i < total; i++) {
    li+='<tr class="tr-id-'+pageData['theList'][i]['group_c']+'">';
    li+='<td><button type="button" class="btn btn-default btn-xs btn-checkbox" data-checked="no" data-id="'+pageData['theList'][i]['group_c']+'"><i class="fas fa-square"></i></button></td>';
    li+='<td>'+pageData['theList'][i]['group_c']+'</td>';
    li+='<td>'+pageData['theList'][i]['title']+'</td>';
    li+='<td class="text-right">'+pageData['theList'][i]['priority']+'</td>';
    li+='<td class="text-right">'+pageData['theList'][i]['Total']+'</td>';
    li+='<td class="text-right">'+pageData['theList'][i]['Total_Users']+'</td>';
    li+='<td class="text-right">';
    li+='<span class="edit-group" data-id="'+pageData['theList'][i]['group_c']+'" style="cursor:pointer;margin-right:10px;"><i class="fas fa-edit"></i></span>';
    li+='</td>';
    li+='</tr> ';
  }

  $('.the-list').html(li);
}

    $(document).ready(function(){

        prepareShowData();
        preparePermissionsData();
        prepareMenuData();
      $('.select2js').select2();
      $('.add-permissions').select2({
            dropdownParent: $("#modalAdd")
      });
      $('.edit-permissions').select2({
            dropdownParent: $("#modalEdit")
      });
      $('.add-menu').select2({
            dropdownParent: $("#modalAdd")
      });
      $('.edit-menu').select2({
            dropdownParent: $("#modalEdit")
      });

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
  pageData['list_group_c']='';

  $('.btn-checkbox').each(function(){
    var id=$(this).attr('data-id');
    var checked=$(this).attr('data-checked');

    if(checked=='yes')
    {
      pageData['list_group_c']+=id+',';
    }
    
  });

  var sendData={};

  sendData['type']='1';
 
  sendData['list_group_c']=pageData['list_group_c'];
  pageData['action']=$('.post-action > option:selected').val().trim();
  sendData['action']=pageData['action'];

  postData(API_URL+'groupuser_action_apply', sendData).then(data => {
    // console.log(data); // JSON data parsed by `data.json()` call
    $('#modalSearch').modal('hide');

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


$(document).on('click','.edit-group',function(){
  //modalAdd
  var id=$(this).attr('data-id');

  var total=pageData['theList'].length;

  var totalGPer=pageData['listGroupPermissions'].length;
  var totalMenuPer=pageData['listMenuPermissions'].length;

  $('.edit-permissions > option:selected').each(function(){
    $(this).attr('selected',false);
  });

  $('.edit-menu > option:selected').each(function(){
    $(this).attr('selected',false);
  });

  for (var i = 0; i < total; i++) {
      if(pageData['theList'][i]['group_c']==id)
      {
        pageData['edit_c']=id;
        $('.edit-title').val(pageData['theList'][i]['title']);
        $('.edit-leftstr').val(pageData['theList'][i]['left_str']);
        $('.edit-rightstr').val(pageData['theList'][i]['right_str']);
        $('.edit-priority').val(pageData['theList'][i]['priority']);

        for (var j = 0; j < totalGPer; j++) {
            if(pageData['listGroupPermissions'][j]['group_c']==id)
            {
              // console.log(pageData['listGroupPermissions'][j]['permission_c']);
              $('.edit-permissions > option[value="'+pageData['listGroupPermissions'][j]['permission_c']+'"]').attr('selected',true);
            }
        }

        $('.edit-permissions').trigger('change');

        break;
      }
  }

  for (var i = 0; i < total; i++) {
      if(pageData['theList'][i]['group_c']==id)
      {
        for (var j = 0; j < totalMenuPer; j++) {
            if(pageData['listMenuPermissions'][j]['group_c']==id)
            {
              // console.log(pageData['listMenuPermissions'][j]['permission_c']);
              $('.edit-menu > option[value="'+pageData['listMenuPermissions'][j]['menu_id']+'"]').attr('selected',true);
            }
        }

        $('.edit-menu').trigger('change');

        break;
      }
  }

  $('#modalEdit').modal({backdrop:'static',keyboard:false});

});


$(document).on('click','.btnSetAllPer',function(){
  $('.add-permissions > option').each(function(){
    $(this).attr('selected',true);
  });  
  
  $('.add-permissions').trigger('change');
});

$(document).on('click','.btnUnSetAllPer',function(){
  $('.add-permissions > option:selected').each(function(){
    $(this).attr('selected',false);
  });  
  
  $('.add-permissions').trigger('change');
});


$(document).on('click','.btnSetAllMenu',function(){
  $('.add-menu > option').each(function(){
    $(this).attr('selected',true);
  });  

  $('.add-menu').trigger('change');
});

$(document).on('click','.btnUnSetAllMenu',function(){
  $('.add-menu > option:selected').each(function(){
    $(this).attr('selected',false);
  });  

  $('.add-menu').trigger('change');
});

$(document).on('click','.btnSetAllPerEdit',function(){
  $('.edit-permissions > option').each(function(){
    $(this).attr('selected',true);
  });  
  
  $('.edit-permissions').trigger('change');
});

$(document).on('click','.btnUnSetAllPerEdit',function(){
  $('.edit-permissions > option:selected').each(function(){
    $(this).attr('selected',false);
  });  
  
  $('.edit-permissions').trigger('change');
});


$(document).on('click','.btnSetAllMenuEdit',function(){
  $('.edit-menu > option').each(function(){
    $(this).attr('selected',true);
  });  

  $('.edit-menu').trigger('change');
});

$(document).on('click','.btnUnSetAllMenuEdit',function(){
  $('.edit-menu > option:selected').each(function(){
    $(this).attr('selected',false);
  });  

  $('.edit-menu').trigger('change');
});

$(document).on('click','.btn-add-group',function(){
  //modalAdd
    $('#modalAdd').modal({backdrop:'static',keyboard:false});

});

$(document).on('click','.btnAddGroup',function(){

  var sendData={};

  sendData['type']='1';
 
  sendData['title']=$('.add-title').val().trim();
  sendData['priority']=$('.add-priority').val().trim();

  pageData['add_per']='';
  pageData['add_menu']='';
  pageData['left_str']=$('.add-leftstr').val().trim();
  pageData['right_str']=$('.add-rightstr').val().trim();

  $('.add-permissions > option:selected').each(function(){
    pageData['add_per']+=$(this).val()+',';
  });

  $('.add-menu > option:selected').each(function(){
    pageData['add_menu']+=$(this).val()+',';
  });

  sendData['permission_list']=pageData['add_per'];
  sendData['menu_list']=pageData['add_menu'];
  sendData['left_str']=pageData['left_str'];
  sendData['right_str']=pageData['right_str'];
 
            
  if(sendData['title'].length==0)
  {
    showAlert('','Title not allow is blank');return false;
  }

  
  // console.log(pageData['add_per']);return false;

  postData(API_URL+'add_new_groupuser', sendData).then(data => {
    // console.log(data); // JSON data parsed by `data.json()` call

    location.reload();

  });  
});

$(document).on('click','.btnSaveGroup',function(){

  var sendData={};

  sendData['type']='1';
 
  sendData['title']=$('.edit-title').val().trim();
  sendData['group_c']=pageData['edit_c'];

  pageData['add_per']='';
  pageData['edit_menu']='';

  pageData['left_str']=$('.edit-leftstr').val().trim();
  pageData['right_str']=$('.edit-rightstr').val().trim();
  pageData['priority']=$('.edit-priority').val().trim();


  $('.edit-permissions > option:selected').each(function(){
    pageData['add_per']+=$(this).val()+',';
  });

  $('.edit-menu > option:selected').each(function(){
    pageData['edit_menu']+=$(this).val()+',';
  });

  sendData['permission_list']=pageData['add_per'];
  sendData['menu_list']=pageData['edit_menu'];
  sendData['left_str']=pageData['left_str'];
  sendData['right_str']=pageData['right_str'];
  sendData['priority']=pageData['priority'];

        
  if(sendData['title'].length==0)
  {
    showAlert('','Title not allow is blank');return false;
  }

  postData(API_URL+'edit_groupuser', sendData).then(data => {
    // console.log(data); // JSON data parsed by `data.json()` call

    location.reload();

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