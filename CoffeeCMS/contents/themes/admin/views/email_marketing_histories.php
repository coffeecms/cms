
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
      <p >
      
        <label><strong><?php echo get_text_by_lang('Keywords','admin');?></strong></label>
        <input type="text" class="form-control search-keywords input-size-medium" name="send[keywords]" placeholder="Keywords" />
      </p> 
    
      <p>
      <label><strong><?php echo get_text_by_lang('Groups','admin');?>:</strong></label>
      <select class="form-control search-group select2js" name="send[type]">
      <option value="all">All</option>
     
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
                <h3 class="card-title"><?php echo get_text_by_lang('Send Histories','admin');?></h3>
                <div class="card-tools">
                <!-- <a href="#" class="btn btn-tool btn-sm btn-modal-search">
                    <i class="fas fa-search"></i>
                  </a> -->
                 
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-hover table-striped table-valign-middle">
                  <thead>
                  <tr>
                  <th><button type="button" class="btn btn-default btn-xs btn-checkall" data-checked="no"><i class="fas fa-square"></i></button></th>
                    <th><?php echo get_text_by_lang('Date','admin');?></th>
                    <th><?php echo get_text_by_lang('To Email','admin');?></th>
                    <th><?php echo get_text_by_lang('Subject','admin');?></th>
                    <th><?php echo get_text_by_lang('Send Status','admin');?></th>
                    <th><?php echo get_text_by_lang('Read Status','admin');?></th>
                    
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
                      <!-- <div class="btn-group" style='float:left;' role="group" aria-label="Basic example">
                        <select class="form-control post-action select2js-nomodal" name="send[type]">
                        <option value=""><?php echo get_text_by_lang('Select an action','admin');?></option>
                        <option value="delete"><?php echo get_text_by_lang('Delete','admin');?></option>
                        <option value="mark_as_sended"><?php echo get_text_by_lang('Mark as sended','admin');?></option>
                          
                        </select>
                        <button type="button" class="btn btn-info btnApply"><?php echo get_text_by_lang('Apply','admin');?></button>

                        
                    </div>                       -->
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
    pageData['theList']=<?php echo json_encode($theList);?>;

    pageData['page_no']='1';
    pageData['category_c']='all';
    pageData['post_c']='';
    pageData['tags']='';
    pageData['status']='all';
    pageData['post_type']='all';
    pageData['author_id']='all';
    pageData['username']='';
    pageData['title']='';
    pageData['content']='';
    pageData['subject']='';
    pageData['keywords']='';
</script>

<script type="text/javascript">


   // postData('http://localhost/coffeecms/api/index', { answer: 42 })
 // .then(data => {
  //  console.log(data); // JSON data parsed by `data.json()` call
  //  console.log(data['error']);
  // });


function prepareGroupData()
{
    var total=pageData['listGroups'].length;

    var li='';

    li+='<option value="all">ALL</option>';

    for (var i = 0; i < total; i++) {
       li+='<option value="'+pageData['listGroups'][i]['group_id']+'">'+pageData['listGroups'][i]['title']+'</option>';
    }

    $('.search-group').html(li);
}

function prepareShowData()
{
    var total=pageData['theList'].length;

    var li='';

    var td='';
    $('.the-list').html('');

    var sendStatus='';
    var isReaded='';

    for (var i = 0; i < total; i++) {

        sendStatus='<span class="text text-primary">Not send</span>';
        isReaded='<span class="text text-primary">Not read</span>';

        if(parseInt(pageData['theList'][i]['status'])==1)
        {
            sendStatus='<span class="text text-success">Sended</span>';
        }
        if(parseInt(pageData['theList'][i]['is_readed'])==1)
        {
            isReaded='<span class="text text-success">Readed</span>';
        }

        li+='<tr class="tr-id-'+pageData['theList'][i]['send_id']+'">';
        li+='<td><button type="button" class="btn btn-default btn-xs btn-checkbox" data-checked="no" data-id="'+pageData['theList'][i]['send_id']+'"><i class="fas fa-square"></i></button></td>';
        li+='<td>'+pageData['theList'][i]['ent_dt']+'</td>';
        li+='<td>'+pageData['theList'][i]['to_email']+'</td>';
        li+='<td>'+pageData['theList'][i]['subject']+'</td>';
        li+='<td>'+sendStatus+'</td>';
        li+='<td>'+isReaded+'</td>';
       
        li+='</tr> ';
    }

    $('.the-list').html(li);

    prepareGroupData();
}

    $(document).ready(function(){

        prepareShowData();
    //   $('.select2js').select2();

      $('.search-group').select2({
            dropdownParent: $("#modalSearch")
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


//btn-modal-search
$(document).on('click','.btn-modal-search',function(){
  $('#modalSearch').modal({backdrop:'static',keyboard:false});

});

$(document).on('click','.btnApply',function(){
  pageData['list_email']='';

  $('.btn-checkbox').each(function(){
    var id=$(this).attr('data-id');
    var checked=$(this).attr('data-checked');

    if(checked=='yes')
    {
      pageData['list_email']+=id+',';
    }
    
  });

  var sendData={};

  sendData['type']='1';
 
  sendData['list_email']=pageData['list_email'];
  pageData['action']=$('.post-action > option:selected').val().trim();
  sendData['action']=pageData['action'];

  postData(API_URL+'email_marketing_emaillist_action_apply', sendData).then(data => {
    // console.log(data); // JSON data parsed by `data.json()` call
    $('#modalSearch').modal('hide');

    if(pageData['action']=='delete')
    {
      $('.btn-checkbox').each(function(){
        var id=$(this).attr('data-id');
        var checked=$(this).attr('data-checked');

        if(checked=='yes')
        {
        //   $('.tr-id-'+id).remove();
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


$(document).on('click','.btnSearch',function(){
  var sendData={};

  sendData['page_no']='1';
    $('.txtPageNumber').val(sendData['page_no']);

  sendData['type']='1';

  postData(API_URL+'get_list_email_marketing_histories', sendData).then(data => {
    // console.log(data); // JSON data parsed by `data.json()` call
    $('#modalSearch').modal('hide');

    pageData['theList']=data['data'];
    prepareShowData();
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

  postData(API_URL+'get_list_email_marketing_histories', sendData).then(data => {
    // console.log(data); // JSON data parsed by `data.json()` call
    $('#modalSearch').modal('hide');

    pageData['theList']=data['data'];
    prepareShowData();
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


  postData(API_URL+'get_list_email_marketing_histories', sendData).then(data => {
    // console.log(data); // JSON data parsed by `data.json()` call
    $('#modalSearch').modal('hide');

    pageData['theList']=data['data'];
    prepareShowData();
  });   
});
        
</script>