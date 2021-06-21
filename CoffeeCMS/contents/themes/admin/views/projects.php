
<!-- Modal -->
<div class="modal fade" id="modalAdd"  style='z-index:99999;' data-backdrop="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel"><?php echo get_text_by_lang('Add new project','admin');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
      <p >
      <p>
        <label><strong>Title</strong></label>
        <input type="text" class="form-control add-title input-size-medium" name="send[keywords]" placeholder="Title" />
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
        <h5 class="modal-title " id="exampleModalLabel"><?php echo get_text_by_lang('Edit project','admin');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
      <p >
      <p>
        <label><strong><?php echo get_text_by_lang('Title','admin');?></strong></label>
        <input type="text" class="form-control edit-title input-size-medium" name="send[keywords]" placeholder="<?php echo get_text_by_lang('Title','admin');?>" />
      </p> 
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info btnSave" ><i class="fas fa-save"></i> <?php echo get_text_by_lang('Save changes','admin');?></button>
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
                <h3 class="card-title"><?php echo get_text_by_lang('Projects','admin');?></h3>
                <div class="card-tools">
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
                    <th><?php echo get_text_by_lang('Title','admin');?></th>
                    <th class='text-right'><?php echo get_text_by_lang('Action','admin');?></th>
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
    pageData['theList']=<?php echo $theList;?>;
</script>

<script type="text/javascript">


   // postData('http://localhost/coffeecms/api/index', { answer: 42 })
 // .then(data => {
  //  console.log(data); // JSON data parsed by `data.json()` call
  //  console.log(data['error']);
  // });


function prepareShowPost()
{
  var total=pageData['theList'].length;

  var li='';

  var td='';

  $('.body_list_data').html('');

  var postStatus='';

  for (var i = 0; i < total; i++) {
    li+='<tr class="tr-id-'+pageData['theList'][i]['project_c']+'">';
    li+='<td><button type="button" class="btn btn-default btn-xs btn-checkbox" data-checked="no" data-id="'+pageData['theList'][i]['project_c']+'"><i class="fas fa-square"></i></button></td>';
    li+='<td><a style="color:#000;" href="'+SITE_URL+'admin/kanban_board?project_c='+pageData['theList'][i]['project_c']+'" title="'+pageData['theList'][i]['title']+'">'+pageData['theList'][i]['title']+'</a></td>';
 
    li+='<td class="text-right">';
    li+='<span class="edit-project" data-id="'+pageData['theList'][i]['project_c']+'" style="cursor:pointer;margin-right:10px;"><i class="fas fa-edit"></i></span>';
    li+='</td>';
    li+='<td class="text-right">'+pageData['theList'][i]['upd_dt']+'</td>';
    li+='</tr>';
  }

  $('.body_list_data').html(li);
}

$(document).ready(function(){
  prepareShowPost();

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
  pageData['list_project_c']='';

  $('.btn-checkbox').each(function(){
    var id=$(this).attr('data-id');
    var checked=$(this).attr('data-checked');

    if(checked=='yes')
    {
      pageData['list_project_c']+=id+',';
    }
    
  });

  var sendData={};

 

  sendData['type']='1';
 
  sendData['list_project_c']=pageData['list_project_c'];
  pageData['action']=$('.post-action > option:selected').val().trim();
  sendData['action']=pageData['action'];

  postData(API_URL+'project_action_apply', sendData).then(data => {
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


$(document).on('click','.btn-add-user',function(){
    $('#modalAdd').modal({backdrop:'static',keyboard:false});
  });

$(document).on('click','.edit-project',function(){
    var id=$(this).attr('data-id');

    pageData['project_c']=id;

    var total=pageData['theList'].length;

    for (var i = 0; i < total; i++) {
      if(pageData['theList'][i]['project_c']==id)
      {
        $('.edit-title').val(pageData['theList'][i]['title']);
        break;
      }
      
    }

    $('#modalEdit').modal({backdrop:'static',keyboard:false});
      
  });
$(document).on('click','.btnAdd',function(){
  var sendData={};

 
  sendData['type']='1';
 
  sendData['title']=$('.add-title').val().trim();
 
  if(sendData['title'].length==0)
  {
    showAlert('','Type project title!');

    return;
  }

  postData(API_URL+'add_new_kanban_board_project', sendData).then(data => {
    // console.log(data); // JSON data parsed by `data.json()` call
    $('#modalAdd').modal('hide');
    $('#modalEdit').modal('hide');

    showAlertOK('','Done!');
  });  

});

$(document).on('click','.btnSave',function(){
  var sendData={};

 
  sendData['type']='1';
 
  sendData['title']=$('.edit-title').val().trim();
  sendData['project_c']=pageData['project_c'];
 
  if(sendData['title'].length==0)
  {
    showAlert('','Type project title!');

    return;
  }

  postData(API_URL+'edit_kanban_board_project', sendData).then(data => {
    // console.log(data); // JSON data parsed by `data.json()` call
    $('#modalAdd').modal('hide');
    $('#modalEdit').modal('hide');

    showAlertOK('','Done!');
  });  

});

     
</script>