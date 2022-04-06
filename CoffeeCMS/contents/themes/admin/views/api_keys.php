<?php

$db=new Database();

$listPermissions=$db->query("select * from permissions_mst order by title  asc"); 

?>

<style>
.datepicker-days
{
  z-index: 99999999;
}
</style>

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
        <label><strong><?php echo get_text_by_lang('Username/Email/User ID','admin');?></strong></label>
        <input type="text" class="form-control search-username input-size-medium" name="send[keywords]" placeholder="<?php echo get_text_by_lang('Username/Email/User ID','admin');?>" />
      </p> 
      <p>
        <label><strong><?php echo get_text_by_lang('API Key','admin');?></strong></label>
        <input type="text" class="form-control search-apikey input-size-medium" name="send[keywords]" placeholder="<?php echo get_text_by_lang('API Key','admin');?>" />
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
        <h5 class="modal-title " id="exampleModalLabel"><?php echo get_text_by_lang('Add new api key','admin');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
      <p>
        <label><strong><?php echo get_text_by_lang('Username/Email/User ID','admin');?></strong></label>
        <input type="text" class="form-control add-username input-size-medium" name="" autocomplete="off" placeholder="<?php echo get_text_by_lang('Username/Email/User ID','admin');?>" />
      </p> 
      <p>
        <label><strong><?php echo get_text_by_lang('API Key','admin');?></strong></label>
        <input type="text" class="form-control add-apikey input-size-medium" name="" autocomplete="off"  placeholder="<?php echo get_text_by_lang('API Key','admin');?>" />
      </p> 
      <p>
        <label><strong><?php echo get_text_by_lang('From date','admin');?></strong></label>
        <input type="text" class="form-control add-from-date datepicker input-size-medium" name="" autocomplete="off"   />
    </p> 
      <p>
        <label><strong><?php echo get_text_by_lang('To date','admin');?></strong></label>
        <input type="text" class="form-control add-to-date datepicker input-size-medium" name="" autocomplete="off"   />
    </p> 
      
      <p id="wrap_add_per">
      <label><strong><?php echo get_text_by_lang('Permissions','admin');?>:</strong></label> <button type='button' class='btn btn-primary btnSetAllPerAdd btn-xs'><?php echo get_text_by_lang('All','admin');?></button>
      <select class="form-control add-per" multiple name="send[status]">
        <?php
        $total=count($listPermissions);

        $li='';

        for ($i=0; $i < $total; $i++) { 
          $li.='<option value="'.$listPermissions[$i]['permission_c'].'">'.$listPermissions[$i]['title'].'</option>';
        }

        echo $li;
        ?>
      </select>
      </p>      
      <p>
      <label><strong><?php echo get_text_by_lang('Status','admin');?>:</strong></label>
      <select class="form-control add-status" name="send[status]">
        <option value="1">Activate</option>
        <option value="0">Deactivate</option>
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
        <h5 class="modal-title " id="exampleModalLabel"><?php echo get_text_by_lang('Edit api key','admin');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p>
        <label><strong><?php echo get_text_by_lang('Username/Email/User ID','admin');?></strong></label>
        <input type="text" disabled class="form-control edit-username input-size-medium" name="" autocomplete="off" placeholder="<?php echo get_text_by_lang('Username/Email/User ID','admin');?>" />
      </p> 
      <p>
        <label><strong><?php echo get_text_by_lang('API Key','admin');?></strong></label>
        <input type="text" disabled class="form-control edit-apikey input-size-medium" name="" autocomplete="off"  placeholder="<?php echo get_text_by_lang('API Key','admin');?>" />
      </p> 
      <p>
        <label><strong><?php echo get_text_by_lang('From date','admin');?></strong></label>
        <input type="text" class="form-control edit-from-date datepicker input-size-medium" name="" autocomplete="off"   />
    </p> 
      <p>
        <label><strong><?php echo get_text_by_lang('To date','admin');?></strong></label>
        <input type="text" class="form-control edit-to-date datepicker input-size-medium" name="" autocomplete="off"   />
    </p> 
      
      <p id="wrap_edit_per">
      <label><strong><?php echo get_text_by_lang('Permissions','admin');?>:</strong></label> <button type='button' class='btn btn-primary btnSetAllPerEdit btn-xs'><?php echo get_text_by_lang('All','admin');?></button>
      <select class="form-control edit-per" multiple name="send[status]">
        <?php
        $total=count($listPermissions);

        $li='';

        for ($i=0; $i < $total; $i++) { 
          $li.='<option value="'.$listPermissions[$i]['permission_c'].'">'.$listPermissions[$i]['title'].'</option>';
        }

        echo $li;
        ?>
      </select>
      </p>      
      <p>
      <label><strong><?php echo get_text_by_lang('Status','admin');?>:</strong></label>
      <select class="form-control edit-status" name="send[status]">
        <option value="1">Activate</option>
        <option value="0">Deactivate</option>
      </select>
      </p>
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info btnEdit" ><i class="fas fa-save"></i> <?php echo get_text_by_lang('Save Changes','admin');?></button>
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
                <h3 class="card-title">API Keys</h3>
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
                    <th><?php echo get_text_by_lang('Username','admin');?></th>
                    <th><?php echo get_text_by_lang('API Key','admin');?></th>
                    <th><?php echo get_text_by_lang('Start Date','admin');?></th>
                    <th><?php echo get_text_by_lang('End Date','admin');?></th>
                    <th><?php echo get_text_by_lang('Permissions','admin');?></th>
                    <th class="text-right"><?php echo get_text_by_lang('Status','admin');?></th>
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
                        <option value="activate"><?php echo get_text_by_lang('Activate','admin');?></option>
                        <option value="deactivate"><?php echo get_text_by_lang('Deactivate','admin');?></option>
                          
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
    pageData['listAPIKeys']=[];

</script>

<script type="text/javascript">
    pageData['listPermissions']=<?php echo json_encode($listPermissions); ?>;

   // postData('http://localhost/coffeecms/api/index', { answer: 42 })
 // .then(data => {
  //  console.log(data); // JSON data parsed by `data.json()` call
  //  console.log(data['error']);
  // });


function prepareShowPost()
{
  var total=pageData['listAPIKeys'].length;

  var li='';

  var td='';

  $('.body_list_data').html('');

  var postStatus='';

  for (var i = 0; i < total; i++) {


    postStatus='<span class="text text-default text-sm">Deactivated</span>';
    if(parseInt(pageData['listAPIKeys'][i]['status'])==1)
    {
      postStatus='<span class="text text-success text-sm">Activated</span>';
    }

    li+='<tr class="tr-id-'+pageData['listAPIKeys'][i]['api_key']+' tr-edit-user pointer" data-id="'+pageData['listAPIKeys'][i]['api_key']+'">';
    li+='<td><button type="button" class="btn btn-default btn-xs btn-checkbox" data-checked="no" data-id="'+pageData['listAPIKeys'][i]['api_key']+'"><i class="fas fa-square"></i></button></td>';
    li+='<td>'+pageData['listAPIKeys'][i]['username']+'</td>';
    li+='<td>'+pageData['listAPIKeys'][i]['api_key']+'</td>';
    li+='<td>'+pageData['listAPIKeys'][i]['start_date']+'</td>';
    li+='<td>'+pageData['listAPIKeys'][i]['end_date']+'</td>';
    li+='<td><button type="button" data-apikey="'+pageData['listAPIKeys'][i]['api_key']+'" class="btn btn-success btn-sm btnEditPermissions">'+pageData['listAPIKeys'][i]['total_per']+'</button></td>';
    li+='<td class="text-right">'+postStatus+'</td>';
    li+='</tr>';
  }

  $('.body_list_data').html(li);
}


$(document).ready(function(){


  $('.select2js').select2({
    dropdownParent: $("#modalSearch")
  });

  $('.select2js-add').select2({
    dropdownParent: $("#modalAdd")
  });

  $('.select2js-edit').select2({
    dropdownParent: $("#modalEdit")
  });

  $('.add-per').select2({
    dropdownParent: $("#wrap_add_per")
  });
  $('.edit-per').select2({
    dropdownParent: $("#wrap_edit_per")
  });

  $('.post-action').select2({
    'width':'200px'
  });

  
  $('.datepicker').datepicker({
          autoclose: true,
          format: 'mm/dd/yyyy',
        });

      $('.search-from-date').val(moment().format('MM/DD/YYYY'));
      $('.search-to-date').val(moment().add('years',1).format('MM/DD/YYYY'));

});

//btn-modal-search
$(document).on('click','.btn-add-user',function(){

  var key=genAlpha(68);

  $('.add-apikey').val(key);
  $('.add-from-date').val(moment().format('DD/MM/YYYY'));
  $('.add-to-date').val(moment().add('days',30).format('DD/MM/YYYY'));

  $('#modalAdd').modal({backdrop:'static',keyboard:false});

});
$(document).on('click','.tr-edit-user',function(){
  var user_id=$(this).attr('data-id');
  var total=pageData['listAPIKeys'].length;

  for (var i = 0; i < total; i++) {
    if(user_id==pageData['listAPIKeys'][i]['api_key'])
    {
      $('.edit-username').val(pageData['listAPIKeys'][i]['username']);
      $('.edit-apikey').val(pageData['listAPIKeys'][i]['api_key']);
      $('.edit-from-date').val(moment(pageData['listAPIKeys'][i]['start_date'],'YYYY-MM-DD').format('MM/DD/YYYY'));
      $('.edit-to-date').val(moment(pageData['listAPIKeys'][i]['end_date'],'YYYY-MM-DD').format('MM/DD/YYYY'));
      $('.edit-status').val(pageData['listAPIKeys'][i]['status']).trigger('change');

      pageData['api_key_edit']=pageData['listAPIKeys'][i]['api_key'];

      var sendData={};

      sendData['type']='1';
      sendData['apikey']=pageData['listAPIKeys'][i]['api_key'];
      
      postData(API_URL+'call_api?api_nm=apikey_data', sendData).then(data => {
        // console.log(data); // JSON data parsed by `data.json()` call
        if(data['error']=='yes')
        {
        showAlertOK('',data['data']);
        }
        else
        {

          $('.edit-per > option').each(function(){
            $(this).attr('selected',false);
          });

          $('.edit-per').trigger('change');

          var totalPer=data['data'].length;

          for (var i = 0; i < totalPer; i++) {
            $('.edit-per > option').each(function(){
              if($(this).val()==data['data'][i]['permission_c'])
              {
                $(this).attr('selected',true);
              }
            });
          }

          $('.edit-per').trigger('change');

          $('#modalEdit').modal({backdrop:'static',keyboard:false});   

        }

      }); 


      break;   
    }
  }

});



$(document).on('click','.btnSetAllPerAdd',function(){
  $('.add-per > option').each(function(){
    $(this).attr('selected',true);
  });  
  
  $('.add-per').trigger('change');
});

$(document).on('click','.btnSetAllPerEdit',function(){
  $('.edit-per > option').each(function(){
    $(this).attr('selected',true);
  });  
  
  $('.edit-per').trigger('change');
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
 
  sendData['apikey']=$('.add-apikey').val().trim();
  sendData['username']=$('.add-username').val().trim();
  sendData['start_date']=$('.add-from-date').val().trim();
  sendData['end_date']=$('.add-to-date').val().trim();
  sendData['status']=$('.add-status > option:selected').val();

  pageData['list_per_add']='';

  $('.add-per > option:selected').each(function(){
    pageData['list_per_add']+=$(this).val()+'||';
  });

   sendData['list_per_add']=pageData['list_per_add'];
 

  if(sendData['username'].length==0)
  {
    showAlert('','Username not allow blank');
    return false;
  }

  if(sendData['start_date'].length < 5 || sendData['end_date'].length < 5)
  {
    showAlert('','From Date and To Date not allow blank.');
    return false;
  }

  if(sendData['start_date'].length > 2 && sendData['end_date'].length > 2)
  {
    sendData['start_date']=moment(sendData['start_date'],'MM/DD/YYYY').format('YYYY-MM-DD');
    sendData['end_date']=moment(sendData['end_date'],'MM/DD/YYYY').format('YYYY-MM-DD');
  }

  postData(API_URL+'call_api?api_nm=apikey_add', sendData).then(data => {
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

      $('.search-from-date').val('');
      $('.search-to-date').val('');
      $('.search-username').val('');
      $('.search-apikey').val('');

      $('.btnSearch').trigger('click');

      showAlertOK('','Done!');
    }

  });  

});

$(document).on('click','.btnEdit',function(){
  var sendData={};

 
  sendData['type']='1';
 
  sendData['apikey']=$('.edit-apikey').val().trim();
  sendData['username']=$('.edit-username').val().trim();
  sendData['start_date']=$('.edit-from-date').val().trim();
  sendData['end_date']=$('.edit-to-date').val().trim();
  sendData['status']=$('.edit-status > option:selected').val();

  pageData['list_per_edit']='';

  $('.edit-per > option:selected').each(function(){
    pageData['list_per_edit']+=$(this).val()+'||';
  });

   sendData['list_per_edit']=pageData['list_per_edit'];
 
  if(sendData['username'].length==0)
  {
    showAlert('','Username not allow blank');
    return false;
  }

  if(sendData['start_date'].length < 5 || sendData['end_date'].length < 5)
  {
    showAlert('','From Date and To Date not allow blank.');
    return false;
  }

  if(sendData['start_date'].length > 5 && sendData['end_date'].length > 5)
  {
    sendData['start_date']=moment(sendData['start_date'],'MM/DD/YYYY').format('YYYY-MM-DD');
    sendData['end_date']=moment(sendData['end_date'],'MM/DD/YYYY').format('YYYY-MM-DD');
  }

  postData(API_URL+'call_api?api_nm=apikey_edit', sendData).then(data => {
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

      $('.btnSearch').trigger('click');

      // showAlertOK('','Done!');
    }

  });  

});

$(document).on('click','.btnSearch',function(){
  var sendData={};

  sendData['page_no']='1';
    $('.txtPageNumber').val(sendData['page_no']);

  sendData['type']='1';
  sendData['username']=$('.search-username').val().trim();
  sendData['apikey']=$('.search-apikey').val().trim();
  sendData['start_date']=$('.search-from-date').val().trim();
  sendData['end_date']=$('.search-to-date').val().trim();
 

  if(sendData['start_date'].length > 0 && sendData['end_date'].length > 0)
  {
    sendData['start_date']=moment(sendData['start_date'],'MM/DD/YYYY').format('YYYY-MM-DD');
    sendData['end_date']=moment(sendData['end_date'],'MM/DD/YYYY').format('YYYY-MM-DD');
  }



  postData(API_URL+'call_api?api_nm=apikey_list', sendData).then(data => {
    // console.log(data); // JSON data parsed by `data.json()` call

    if(data['error']=='yes')
    {
    showAlertOK('',data['data']);
    }
    else
    {
      $('#modalSearch').modal('hide');

      pageData['listAPIKeys']=data['data'];
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
  sendData['username']=$('.search-username').val().trim();
  sendData['apikey']=$('.search-apikey').val().trim();
  sendData['start_date']=$('.search-from-date').val().trim();
  sendData['end_date']=$('.search-to-date').val().trim();
 

  if(sendData['start_date'].length > 0 && sendData['end_date'].length > 0)
  {
    sendData['start_date']=moment(sendData['start_date'],'MM/DD/YYYY').format('YYYY-MM-DD');
    sendData['end_date']=moment(sendData['end_date'],'MM/DD/YYYY').format('YYYY-MM-DD');
  }
  

  postData(API_URL+'call_api?api_nm=apikey_list', sendData).then(data => {
    // console.log(data); // JSON data parsed by `data.json()` call

    if(data['error']=='yes')
    {
    showAlertOK('',data['data']);
    }
    else
    {
      $('#modalSearch').modal('hide');

      pageData['listAPIKeys']=data['data'];
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
  sendData['username']=$('.search-username').val().trim();
  sendData['apikey']=$('.search-apikey').val().trim();
  sendData['start_date']=$('.search-from-date').val().trim();
  sendData['end_date']=$('.search-to-date').val().trim();
 

  if(sendData['start_date'].length > 0 && sendData['end_date'].length > 0)
  {
    sendData['start_date']=moment(sendData['start_date'],'MM/DD/YYYY').format('YYYY-MM-DD');
    sendData['end_date']=moment(sendData['end_date'],'MM/DD/YYYY').format('YYYY-MM-DD');
  }
  
  postData(API_URL+'call_api?api_nm=apikey_list', sendData).then(data => {
    // console.log(data); // JSON data parsed by `data.json()` call

    if(data['error']=='yes')
    {
    showAlertOK('',data['data']);
    }
    else
    {
      $('#modalSearch').modal('hide');

      pageData['listAPIKeys']=data['data'];
      prepareShowPost();
    }

  });   
});
     
</script>