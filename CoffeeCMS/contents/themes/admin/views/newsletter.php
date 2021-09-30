
<!-- Modal -->
<div class="modal fade" id="modalAdd"  style='z-index:99999;' data-backdrop="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel">Add new user</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
      <p >
      <p>
        <label><strong>Fullname</strong></label>
        <input type="text" class="form-control add-fullname input-size-medium" name="send[keywords]" placeholder="Fullname" />
      </p> 
      <p>
        <label><strong>Username</strong></label>
        <input type="text" class="form-control add-username input-size-medium" name="send[keywords]" placeholder="Username" />
      </p> 
      <p>
        <label><strong>Password</strong></label>
        <input type="text" class="form-control add-password input-size-medium" name="send[keywords]" placeholder="Password" />
      </p> 
      <p>
        <label><strong>Email</strong></label>
        <input type="text" class="form-control add-email input-size-medium" name="send[keywords]" placeholder="Email" />
      </p> 
      <p>
      <label><strong>Group:</strong></label>
      <select class="form-control add-group select2js-add" name="send[type]">
      
      </select>
      </p>
      <p>
      <label><strong>Level:</strong></label>
      <select class="form-control add-level select2js-add" name="send[status]">
     
      </select>
      </p>
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info btnAdd" ><i class="fas fa-save"></i> Add new</button>
        <button type="button" class="btn btn-danger btnCloseAlert" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
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
                <h3 class="card-title">Newsletter registered</h3>
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
                    <th>Title</th>
                    <th class='text-right'>Update Time</th>
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
                        <option value="">Select an action</option>
                        <option value="delete">Delete</option>
                        </select>
                        <button type="button" class="btn btn-info btnApply">Apply</button>
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
    li+='<tr class="tr-id-'+pageData['theList'][i]['template_id']+'">';
    li+='<td><button type="button" class="btn btn-default btn-xs btn-checkbox" data-checked="no" data-id="'+pageData['theList'][i]['template_id']+'"><i class="fas fa-square"></i></button></td>';
    li+='<td><a href="'+SITE_URL+'admin/edit_email_template?template_id='+pageData['theList'][i]['template_id']+'" title="'+pageData['theList'][i]['title']+'">'+pageData['theList'][i]['title']+'</td>';
 
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
  pageData['list_template_id']='';

  $('.btn-checkbox').each(function(){
    var id=$(this).attr('data-id');
    var checked=$(this).attr('data-checked');

    if(checked=='yes')
    {
      pageData['list_template_id']+=id+',';
    }
    
  });

  var sendData={};

 

  sendData['type']='1';
 
  sendData['list_template_id']=pageData['list_template_id'];
  pageData['action']=$('.post-action > option:selected').val().trim();
  sendData['action']=pageData['action'];

  postData(API_URL+'email_template_action_apply', sendData).then(data => {
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

    showAlert('','Action completed!');
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