

<!-- Modal -->
<div class="modal fade" id="modalAdd"  style='z-index:99999;' data-backdrop="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
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
        <label><strong><?php echo get_text_by_lang('Email Lists (seperate by commma or new line)','admin');?></strong></label>
          
          <textarea class="form-control add-emailist" style='height:250px;'></textarea>
      </p>   
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info btnAddGroup" ><i class="fas fa-search"></i> <?php echo get_text_by_lang('Add new','admin');?></button>
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
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info btnSaveGroup" ><i class="fas fa-search"></i> <?php echo get_text_by_lang('Save changes','admin');?></button>
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
                <h3 class="card-title"><?php echo get_text_by_lang('Email Marketing Groups','admin');?></h3>
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
                    <th class="text-right"><?php echo get_text_by_lang('Total Emails','admin');?></th>
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
                        <option value="deleteallemail"><?php echo get_text_by_lang('Delete all email','admin');?></option>
                          
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
    pageData['listGroupPermissions']=<?php echo json_encode($listGroupPermissions);?>;

</script>

<script type="text/javascript">


   // postData('http://localhost/coffeecms/api/index', { answer: 42 })
 // .then(data => {
  //  console.log(data); // JSON data parsed by `data.json()` call
  //  console.log(data['error']);
  // });

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
    li+='<tr class="tr-id-'+pageData['theList'][i]['group_id']+'">';
    li+='<td><button type="button" class="btn btn-default btn-xs btn-checkbox" data-checked="no" data-id="'+pageData['theList'][i]['group_id']+'"><i class="fas fa-square"></i></button></td>';
    li+='<td>'+pageData['theList'][i]['group_id']+'</td>';
    li+='<td>'+pageData['theList'][i]['title']+'</td>';
    li+='<td class="text-right">'+pageData['theList'][i]['Total']+'</td>';
    li+='<td class="text-right">';
    li+='<span class="edit-group" data-id="'+pageData['theList'][i]['group_id']+'" style="cursor:pointer;margin-right:10px;"><i class="fas fa-edit"></i></span>';
    li+='</td>';
    li+='</tr> ';
  }

  $('.the-list').html(li);
}

    $(document).ready(function(){

        prepareShowData();
        preparePermissionsData();
      $('.select2js').select2();
      $('.add-permissions').select2({
            dropdownParent: $("#modalAdd")
      });
      $('.edit-permissions').select2({
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
  pageData['list_group_id']='';

  $('.btn-checkbox').each(function(){
    var id=$(this).attr('data-id');
    var checked=$(this).attr('data-checked');

    if(checked=='yes')
    {
      pageData['list_group_id']+=id+',';
    }
    
  });

  var sendData={};

  sendData['type']='1';
 
  sendData['list_group_id']=pageData['list_group_id'];
  pageData['action']=$('.post-action > option:selected').val().trim();
  sendData['action']=pageData['action'];

  postData(API_URL+'email_marketing_group_action_apply', sendData).then(data => {
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

  for (var i = 0; i < total; i++) {
      if(pageData['theList'][i]['group_id']==id)
      {
        pageData['edit_c']=id;
        $('.edit-title').val(pageData['theList'][i]['title']);

        break;
      }
  }

  $('#modalEdit').modal({backdrop:'static',keyboard:false});

});

$(document).on('click','.btn-add-group',function(){
  //modalAdd
    $('#modalAdd').modal({backdrop:'static',keyboard:false});

});

$(document).on('click','.btnAddGroup',function(){

  var sendData={};

  sendData['type']='1';
 
  sendData['title']=$('.add-title').val().trim();

  sendData['email_list']=$('.add-emailist').val().trim();
 
  // console.log(pageData['add_per']);return false;

  postData(API_URL+'add_new_email_marketing_group', sendData).then(data => {
    // console.log(data); // JSON data parsed by `data.json()` call
    $('#modalAdd').modal('hide');

    showAlert('','Done!');
  });  
});

$(document).on('click','.btnSaveGroup',function(){

  var sendData={};

  sendData['type']='1';
 
  sendData['title']=$('.edit-title').val().trim();
  sendData['group_id']=pageData['edit_c'];


  postData(API_URL+'edit_email_marketing_group', sendData).then(data => {
    // console.log(data); // JSON data parsed by `data.json()` call
    $('#modalSearch').modal('hide');
    $('#modalAdd').modal('hide');
    $('#modalEdit').modal('hide');

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