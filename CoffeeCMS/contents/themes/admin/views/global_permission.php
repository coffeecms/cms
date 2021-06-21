

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
                <h3 class="card-title"><?php echo get_text_by_lang('Permissions','admin');?></h3>
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
                    <th><?php echo get_text_by_lang('Code','admin');?></th>
                    <th><?php echo get_text_by_lang('Title','admin');?></th>
                    <th class='text-right'><?php echo get_text_by_lang('Action','admin');?></th>
                  </tr>
                  </thead>
                  <tbody class='body-list'>
                  
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
                  
                    </form>
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

</script>

<script type="text/javascript">


   // postData('http://localhost/coffeecms/api/index', { answer: 42 })
 // .then(data => {
  //  console.log(data); // JSON data parsed by `data.json()` call
  //  console.log(data['error']);
  // });

function prepareShowData()
{
  var total=pageData['theList'].length;

  var li='';

  var td='';

  $('.body-list').html('');

  li+='<option value="">Choose parent category</option>';


  for (var i = 0; i < total; i++) {
   
    td+='<tr>';
        td+='<td>';
        td+=pageData['theList'][i]['permission_c'];
        td+='</td>';
        td+='<td>';
        td+=pageData['theList'][i]['title'];
        td+='</td>';
        td+='<td class="text-right">';
        td+='<i class="fas fa-trash delete-item" data-id="'+pageData['theList'][i]['permission_c']+'" style="cursor:pointer;"></i>';
        td+='</td>';
    td+='</tr>';
  }

  $('.body-list').html(td);
}


    $(document).ready(function(){

        prepareShowData();
      $('.select2js').select2();

    });

    $(document).on('click','.delete-item',function(){
      var sendData={};

      sendData['permission_c']=$(this).attr('data-id');
    
      sendData['type']='1';

      postData(API_URL+'remove_permission', sendData).then(data => {
        console.log(data); // JSON data parsed by `data.json()` call
        console.log(data['error']);
        location.href=   location.href;     
      });      
        
    });


$(document).on('click','.btn-add-group',function(){
  //modalAdd
    $('#modalAdd').modal({backdrop:'static',keyboard:false});

});

$(document).on('click','.btnAddGroup',function(){

  var sendData={};

  sendData['type']='1';
 
  sendData['title']=$('.add-title').val().trim();

  // console.log(pageData['add_per']);return false;

  postData(API_URL+'add_new_permission', sendData).then(data => {
    // console.log(data); // JSON data parsed by `data.json()` call

    if(data['error']=='yes')
    {
    showAlertOK('',data['data']);
    }
    else
    {
        $('#modalSearch').modal('hide');
      $('#modalAdd').modal('hide');

      showAlert('','Done!');
    }

  });  
});

$(document).on('click','.btnSaveGroup',function(){

  var sendData={};

  sendData['type']='1';
 
  sendData['title']=$('.edit-title').val().trim();
  sendData['permission_c']=pageData['edit_c'];

  postData(API_URL+'edit_permission', sendData).then(data => {
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

        showAlert('','Done!');
    }

  });  
});
       

       
</script>