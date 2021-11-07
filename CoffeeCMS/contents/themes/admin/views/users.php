

<!-- Modal -->
<div class="modal fade" id="modalSearch"  style='z-index:99999;' data-backdrop="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel"><?php echo get_text_by_lang('Search','admin');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
      <p>
        <label><strong><?php echo get_text_by_lang('From date','admin');?></strong></label>
        <input type="text" class="form-control search-from-date datepicker input-size-medium" name="send[keywords]"  />
    </p> 
      <p>
        <label><strong><?php echo get_text_by_lang('To date','admin');?></strong></label>
        <input type="text" class="form-control search-to-date datepicker input-size-medium" name="send[keywords]"  />
    </p>      
      <p>
        <label><strong><?php echo get_text_by_lang('Username','admin');?></strong></label>
        <input type="text" class="form-control search-username input-size-medium" name="send[keywords]" placeholder="<?php echo get_text_by_lang('Username','admin');?>" />
      </p> 
      <p>
        <label><strong><?php echo get_text_by_lang('Email','admin');?></strong></label>
        <input type="text" class="form-control search-email input-size-medium" name="send[keywords]" placeholder="<?php echo get_text_by_lang('Email','admin');?>" />
      </p> 
      <p>
      <label><strong><?php echo get_text_by_lang('Group','admin');?>:</strong></label>
      <select class="form-control search-group select2js" name="send[type]">
      
      </select>
      </p>
      <p>
      <label><strong><?php echo get_text_by_lang('Level','admin');?>:</strong></label>
      <select class="form-control search-level select2js" name="send[status]">
     
      </select>
      </p>
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info btnSearch" ><i class="fas fa-search"></i> <?php echo get_text_by_lang('Search','admin');?></button>
        <button type="button" class="btn btn-danger btnCloseAlert" data-dismiss="modal"><i class="fas fa-times"></i> <?php echo get_text_by_lang('Close','admin');?></button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalAdd"  style='z-index:99999;' data-backdrop="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel"><?php echo get_text_by_lang('Add new user','admin');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
      <p >
      <p>
        <label><strong><?php echo get_text_by_lang('Fullname','admin');?></strong></label>
        <input type="text" class="form-control add-fullname input-size-medium" name="send[keywords]" placeholder="<?php echo get_text_by_lang('Fullname','admin');?>" />
      </p> 
      <p>
        <label><strong><?php echo get_text_by_lang('Username','admin');?></strong></label>
        <input type="text" class="form-control add-username input-size-medium" name="send[keywords]" placeholder="<?php echo get_text_by_lang('Username','admin');?>" />
      </p> 
      <p>
        <label><strong><?php echo get_text_by_lang('Password','admin');?></strong></label>
        <input type="text" class="form-control add-password input-size-medium" name="send[keywords]" placeholder="<?php echo get_text_by_lang('Password','admin');?>" />
      </p> 
      <p>
        <label><strong><?php echo get_text_by_lang('Email','admin');?></strong></label>
        <input type="text" class="form-control add-email input-size-medium" name="send[keywords]" placeholder="<?php echo get_text_by_lang('Email','admin');?>" />
      </p> 
      <p>
      <label><strong><?php echo get_text_by_lang('Group','admin');?>:</strong></label>
      <select class="form-control add-group select2js-add" name="send[type]">
      
      </select>
      </p>
      <p>
      <label><strong><?php echo get_text_by_lang('Level','admin');?>:</strong></label>
      <select class="form-control add-level select2js-add" name="send[status]">
     
      </select>
      </p>
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info btnAdd" ><i class="fas fa-save"></i> <?php echo get_text_by_lang('Add new','admin');?></button>
        <button type="button" class="btn btn-danger btnCloseAlert" data-dismiss="modal"><i class="fas fa-times"></i> <?php echo get_text_by_lang('Close','admin');?></button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalEdit"  style='z-index:99999;' data-backdrop="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel"><?php echo get_text_by_lang('Edit user','admin');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
      <p >
      <p>
        <label><strong><?php echo get_text_by_lang('Fullname','admin');?></strong></label>
        <input type="text" class="form-control edit-fullname input-size-medium" name="send[keywords]" placeholder="<?php echo get_text_by_lang('Fullname','admin');?>" />
      </p> 
      <p>
        <label><strong><?php echo get_text_by_lang('Username','admin');?></strong></label>
        <input type="text" class="form-control edit-username input-size-medium" disabled name="send[keywords]" placeholder="<?php echo get_text_by_lang('Username','admin');?>" />
      </p> 

      <p>
        <label><strong><?php echo get_text_by_lang('Email','admin');?></strong></label>
        <input type="text" class="form-control edit-email input-size-medium" name="send[keywords]" placeholder="<?php echo get_text_by_lang('Email','admin');?>" />
      </p> 
      <p>
      <label><strong><?php echo get_text_by_lang('Group','admin');?>:</strong></label>
      <select class="form-control edit-group select2js-edit" name="send[type]">
      
      </select>
      </p>
      <p>
      <label><strong><?php echo get_text_by_lang('Level','admin');?>:</strong></label>
      <select class="form-control edit-level select2js-edit" name="send[status]">
     
      </select>
      </p>

      <p>
        <label><strong><?php echo get_text_by_lang('Password','admin');?></strong></label>
        <input type="password" class="form-control edit-password input-size-medium" autocomplete="newpass"  name="send[keywords]" placeholder="<?php echo get_text_by_lang('Password','admin');?>" />
      </p>       

      <p>
        <label><strong><?php echo get_text_by_lang('New Password','admin');?></strong></label>
        <input type="password" class="form-control edit-new-password input-size-medium" autocomplete="newpass" name="send[keywords]" placeholder="<?php echo get_text_by_lang('New Password','admin');?>" />
      </p>       

      <p>
        <label><strong><?php echo get_text_by_lang('Retype Password','admin');?></strong></label>
        <input type="password" class="form-control edit-new-repassword input-size-medium" autocomplete="newpass"  name="send[keywords]" placeholder="<?php echo get_text_by_lang('Retype Password','admin');?>" />
      </p>       
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info btnEdit" ><i class="fas fa-save"></i> <?php echo get_text_by_lang('Save changes','admin');?></button>
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
                <h3 class="card-title">Users</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm btn-modal-search">
                    <i class="fas fa-search"></i>
                  </a>
                  <a href="#" class="btn btn-tool btn-sm btn-add-user" title="Add new" style='font-size:18pt;'>
                    <i class="fas fa-plus-square"></i>
                  </a>               
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th><button type="button" class="btn btn-default btn-xs btn-checkall" data-checked="no"><i class="fas fa-square"></i></button></th>
                    <th><?php echo get_text_by_lang('Group','admin');?></th>
                    <th><?php echo get_text_by_lang('Level','admin');?></th>
                    <th><?php echo get_text_by_lang('Username','admin');?></th>
                    <th><?php echo get_text_by_lang('Email','admin');?></th>
                    <th class='text-right'><?php echo get_text_by_lang('Update Time','admin');?></th>
                  </tr>
                  </thead>
                  <tbody class='body_list_data'>
                  
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
                    <div class="btn-group" style='float:right;' role="group" aria-label="Basic example">
                      <button type="button" class="btn btn-info btnPrev"><?php echo get_text_by_lang('Previous','admin');?></button>
                      <input type='number' class='form-control txtPageNumber' style='margin-left: -5px;width:90px;text-align:center;' value="1" />
                      <button type="button" class="btn btn-info btnNext"><?php echo get_text_by_lang('Next','admin');?></button>
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
    pageData['listGroup']=<?php echo json_encode($listGroup);?>;
    pageData['listLevel']=<?php echo json_encode($listLevel);?>;
    pageData['listUser']=<?php echo json_encode($listUser);?>;
    pageData['user_data']=<?php echo json_encode($user_data);?>;



</script>

<script type="text/javascript">


   // postData('http://localhost/coffeecms/api/index', { answer: 42 })
 // .then(data => {
  //  console.log(data); // JSON data parsed by `data.json()` call
  //  console.log(data['error']);
  // });

function prepareShowEditUserData()
{
  if(typeof pageData['user_data']=='object' && typeof pageData['user_data'][0]=='object')
  {
    $('.edit-fullname').val(pageData['user_data'][0]['fullname']);
    $('.edit-username').val(pageData['user_data'][0]['username']);
    $('.edit-password').val('');
    $('.edit-email').val(pageData['user_data'][0]['email']);
    $('.edit-group').val(pageData['user_data'][0]['group_c']).trigger('change');
    $('.edit-level').val(pageData['user_data'][0]['level_c']).trigger('change');

    pageData['user_c_edit']=pageData['user_data'][0]['user_id'];

    $('#modalEdit').modal({backdrop:'static',keyboard:false});
  }
}
function prepareShowPost()
{
  var total=pageData['listUser'].length;

  var li='';

  var td='';

  $('.body_list_data').html('');

  var postStatus='';

  for (var i = 0; i < total; i++) {

    if(pageData['listUser'][i]['author_username']==null)
    {
      pageData['listUser'][i]['author_username']='';
    }

    postStatus='<span class="text text-default text-sm">Deactivated</span>';
    if(parseInt(pageData['listUser'][i]['status'])==1)
    {
      postStatus='<span class="text text-success text-sm">Activated</span>';
    }

    li+='<tr class="tr-id-'+pageData['listUser'][i]['user_id']+' tr-edit-user pointer" data-id="'+pageData['listUser'][i]['user_id']+'">';
    li+='<td><button type="button" class="btn btn-default btn-xs btn-checkbox" data-checked="no" data-id="'+pageData['listUser'][i]['user_id']+'"><i class="fas fa-square"></i></button></td>';
    li+='<td>'+pageData['listUser'][i]['group_title']+'</td>';
    li+='<td>'+pageData['listUser'][i]['level_title']+'</td>';
    li+='<td>'+pageData['listUser'][i]['username']+'</td>';
    li+='<td>'+pageData['listUser'][i]['email']+'</td>';
    li+='<td class="text-right">'+pageData['listUser'][i]['upd_dt']+'</td>';
    li+='</tr>';
  }

  $('.body_list_data').html(li);
}

function prepareShowCategories()
{
  var total=pageData['listGroup'].length;

  var li='';

  var td='';


  li+='<option value="all">All</option>';

  for (var i = 0; i < total; i++) {
    li+='<option value="'+pageData['listGroup'][i]['group_c']+'">'+pageData['listGroup'][i]['title']+'</option>';
  }

  $('.search-group').html(li).trigger('change');
  $('.add-group').html(li).trigger('change');
  $('.edit-group').html(li).trigger('change');

  total=pageData['listLevel'].length;

  li='<option value="all">All</option>';
  // li='';

  for (var i = 0; i < total; i++) {
    li+='<option value="'+pageData['listLevel'][i]['level_id']+'">'+pageData['listLevel'][i]['title']+'</option>';
  }

  $('.search-level').html(li).trigger('change');
  $('.add-level').html(li).trigger('change');
  $('.edit-level').html(li).trigger('change');

}


$(document).ready(function(){

  prepareShowCategories();
  prepareShowPost();
  prepareShowEditUserData();

  $('.select2js').select2({
    dropdownParent: $("#modalSearch")
  });

  $('.select2js-add').select2({
    dropdownParent: $("#modalAdd")
  });

  $('.select2js-edit').select2({
    dropdownParent: $("#modalEdit")
  });

  $('.post-action').select2({
    'width':'200px'
  });

  
  $('.datepicker').datepicker({
          autoclose: true,
          format: 'mm/dd/yyyy',
        });

      $('.search-from-date').val(moment().add('days',-7).format('MM/DD/YYYY'));
      $('.search-to-date').val(moment().format('MM/DD/YYYY'));

});

//btn-modal-search
$(document).on('click','.btn-add-user',function(){
  $('#modalAdd').modal({backdrop:'static',keyboard:false});

});
$(document).on('click','.tr-edit-user',function(){
  var user_id=$(this).attr('data-id');
  var total=pageData['listUser'].length;

  for (var i = 0; i < total; i++) {
    if(user_id==pageData['listUser'][i]['user_id'])
    {
      $('.edit-fullname').val(pageData['listUser'][i]['fullname']);
      $('.edit-username').val(pageData['listUser'][i]['username']);
      $('.edit-email').val(pageData['listUser'][i]['email']);
      $('.edit-group').val(pageData['listUser'][i]['group_c']).trigger('change');
      $('.edit-level').val(pageData['listUser'][i]['level_c']).trigger('change');

      pageData['user_c_edit']=pageData['listUser'][i]['user_id'];

      $('#modalEdit').modal({backdrop:'static',keyboard:false});   

      break;   
    }
  }

});
$(document).on('click','.btn-modal-search',function(){
  $('#modalSearch').modal({backdrop:'static',keyboard:false});

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
  pageData['list_user_id']='';

  $('.btn-checkbox').each(function(){
    var id=$(this).attr('data-id');
    var checked=$(this).attr('data-checked');

    if(checked=='yes')
    {
      pageData['list_user_id']+=id+',';
    }
    
  });

  var sendData={};

 

  sendData['type']='1';
 
  sendData['list_user_id']=pageData['list_user_id'];
  pageData['action']=$('.post-action > option:selected').val().trim();
  sendData['action']=pageData['action'];

  postData(API_URL+'user_action_apply', sendData).then(data => {
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


$(document).on('click','.btnAdd',function(){
  var sendData={};

 
  sendData['type']='1';
 
  sendData['fullname']=$('.add-fullname').val().trim();
  sendData['username']=$('.add-username').val().trim();
  sendData['password']=$('.add-password').val().trim();
  sendData['email']=$('.add-email').val().trim();
  sendData['group_c']=$('.add-group > option:selected').val().trim();
  sendData['level_c']=$('.add-level > option:selected').val().trim();

  if(sendData['group_c']=='all')
  {
    showAlert('','Select a group!');

    return;
  }

  if(sendData['level_c']=='all')
  {
    showAlert('','Select a level!');

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

  postData(API_URL+'add_new_user', sendData).then(data => {
    // console.log(data); // JSON data parsed by `data.json()` call
    if(data['error']=='yes')
    {
    showAlertOK('',data['data']);
    }
    else
    {
        $('#modalSearch').modal('hide');
      $('#modalAdd').modal('hide');
      $('#modalEdit').modal('hide');

      showAlertOK('','Done!');
    }

  });  

});

$(document).on('click','.btnEdit',function(){
  var sendData={};

 
  sendData['type']='1';
 
  sendData['user_c']=pageData['user_c_edit'];
  sendData['fullname']=$('.edit-fullname').val().trim();
  sendData['password']=$('.edit-password').val().trim();
  sendData['newpassword']=$('.edit-new-password').val().trim();
  sendData['newrepassword']=$('.edit-new-repassword').val().trim();
  sendData['email']=$('.edit-email').val().trim();
  sendData['group_c']=$('.edit-group > option:selected').val().trim();
  sendData['level_c']=$('.edit-level > option:selected').val().trim();

  if(sendData['group_c']=='all')
  {
    showAlert('','Select a group!');

    return;
  }

  if(sendData['level_c']=='all')
  {
    showAlert('','Select a level!');

    return;
  }

  if(sendData['password'].length==0 && sendData['newpassword'].length>0)
  {
    showAlert('','Set a password!');

    return;
  }

  if(sendData['newpassword'].length>0 && sendData['newpassword']!=sendData['newrepassword'])
  {
    showAlert('','New password not valid!');

    return;
  }

  postData(API_URL+'edit_user', sendData).then(data => {
    // console.log(data); // JSON data parsed by `data.json()` call

    if(data['error']=='yes')
    {
    showAlertOK('',data['data']);
    }
    else
    {
        $('#modalSearch').modal('hide');
      $('#modalAdd').modal('hide');
      $('#modalEdit').modal('hide');

      showAlertOK('','Done!');

      $('.btnSearch').trigger('click');
    }

  });  

});

$(document).on('click','.btnSearch',function(){
  var sendData={};

  sendData['page_no']='1';
    $('.txtPageNumber').val(sendData['page_no']);

  sendData['type']='1';
  pageData['group_c']=$('.search-group > option:selected').val().trim();
  pageData['level_c']=$('.search-level > option:selected').val().trim();
  pageData['username']=$('.search-username').val().trim();
  pageData['email']=$('.search-email').val().trim();
  pageData['start_date']=$('.search-from-date').val().trim();
  pageData['end_date']=$('.search-to-date').val().trim();

  sendData['group_c']=pageData['group_c'];
  sendData['level_c']=pageData['level_c'];
  sendData['username']=pageData['username'];
  sendData['email']=pageData['email'];
  sendData['start_date']=moment(pageData['start_date'],'MM/DD/YYYY').format('YYYY-MM-DD');
  sendData['end_date']=moment(pageData['end_date'],'MM/DD/YYYY').format('YYYY-MM-DD');
  if(pageData['start_date'].length==0)
  {
    showAlert('','From date not valid!');
    return false;
  }

  if(pageData['end_date'].length==0)
  {
    showAlert('','From date not valid!');
    return false;
  }


  postData(API_URL+'get_list_user', sendData).then(data => {
    // console.log(data); // JSON data parsed by `data.json()` call

    if(data['error']=='yes')
    {
    showAlertOK('',data['data']);
    }
    else
    {
      $('#modalSearch').modal('hide');

      pageData['listUser']=data['data'];
      prepareShowPost();
    }

  });  

});

$(document).on('click','.btnPrev',function(){

  var no=$('.txtPageNumber').val();

  if(no.length==0)
  {
    showAlert('','Page number not valid.');
    return false;
  }

  pageData['page_no']=no;

  if(parseInt(pageData['page_no'])<=0)
  {
    pageData['page_no']=1;
  }

  var sendData={};

  sendData['page_no']=parseInt(pageData['page_no'])-1;
  $('.txtPageNumber').val(sendData['page_no']);

  sendData['type']='1';
  pageData['group_c']=$('.search-group > option:selected').val().trim();
  pageData['level_c']=$('.search-level > option:selected').val().trim();
  pageData['username']=$('.search-username').val().trim();
  pageData['email']=$('.search-email').val().trim();
  pageData['start_date']=$('.search-from-date').val().trim();
  pageData['end_date']=$('.search-to-date').val().trim();

  sendData['group_c']=pageData['group_c'];
  sendData['level_c']=pageData['level_c'];
  sendData['username']=pageData['username'];
  sendData['email']=pageData['email'];
  sendData['start_date']=moment(pageData['start_date'],'MM/DD/YYYY').format('YYYY-MM-DD');
  sendData['end_date']=moment(pageData['end_date'],'MM/DD/YYYY').format('YYYY-MM-DD');
  if(pageData['start_date'].length==0)
  {
    showAlert('','From date not valid!');
    return false;
  }

  if(pageData['end_date'].length==0)
  {
    showAlert('','From date not valid!');
    return false;
  }

  

  postData(API_URL+'get_list_user', sendData).then(data => {
    // console.log(data); // JSON data parsed by `data.json()` call

    if(data['error']=='yes')
    {
    showAlertOK('',data['data']);
    }
    else
    {
      $('#modalSearch').modal('hide');

      pageData['listUser']=data['data'];
      prepareShowPost();
    }

  });   

});
$(document).on('click','.btnNext',function(){

  var no=$('.txtPageNumber').val();

  if(no.length==0)
  {
    showAlert('','Page number not valid.');
    return false;
  }
  
  pageData['page_no']=no;

  if(parseInt(pageData['page_no'])<=0)
  {
    pageData['page_no']=1;
  }

  var sendData={};

  sendData['page_no']=parseInt(pageData['page_no'])+1;

  $('.txtPageNumber').val(sendData['page_no']);

  sendData['type']='1';
  pageData['group_c']=$('.search-group > option:selected').val().trim();
  pageData['level_c']=$('.search-level > option:selected').val().trim();
  pageData['username']=$('.search-username').val().trim();
  pageData['email']=$('.search-email').val().trim();
  pageData['start_date']=$('.search-from-date').val().trim();
  pageData['end_date']=$('.search-to-date').val().trim();

  sendData['group_c']=pageData['group_c'];
  sendData['level_c']=pageData['level_c'];
  sendData['username']=pageData['username'];
  sendData['email']=pageData['email'];
  sendData['start_date']=moment(pageData['start_date'],'MM/DD/YYYY').format('YYYY-MM-DD');
  sendData['end_date']=moment(pageData['end_date'],'MM/DD/YYYY').format('YYYY-MM-DD');
  if(pageData['start_date'].length==0)
  {
    showAlert('','From date not valid!');
    return false;
  }

  if(pageData['end_date'].length==0)
  {
    showAlert('','From date not valid!');
    return false;
  }

  


  postData(API_URL+'get_list_user', sendData).then(data => {
    // console.log(data); // JSON data parsed by `data.json()` call

    if(data['error']=='yes')
    {
    showAlertOK('',data['data']);
    }
    else
    {
      $('#modalSearch').modal('hide');

      pageData['listUser']=data['data'];
      prepareShowPost();
    }

  });   
});
     
</script>