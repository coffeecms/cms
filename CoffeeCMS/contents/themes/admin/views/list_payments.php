

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
        <label><strong><?php echo get_text_by_lang('Username/user id/email','admin');?></strong></label>
        <input type="text" class="form-control search-username input-size-medium" name="send[username]" placeholder="username" />
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
                <h3 class="card-title"><?php echo get_text_by_lang('Payments Histories','admin');?></h3>
                <div class="card-tools">
                              
                  <a href="#" class="btn btn-tool btn-sm btn-modal-search">
                    <i class="fas fa-search"></i>
                  </a>
               
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th><button type="button" class="btn btn-default btn-xs btn-checkall" data-checked="no"><i class="fas fa-square"></i></button></th>
                    <th><?php echo get_text_by_lang('ID','admin');?></th>
                    <th><?php echo get_text_by_lang('Date','admin');?></th>
                    <th><?php echo get_text_by_lang('Username','admin');?></th>
                    <th><?php echo get_text_by_lang('Order Status','admin');?></th>
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
    pageData['listOrder']=[];

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
    pageData['tags']='';


</script>

<script type="text/javascript">


   // postData('http://localhost/coffeecms/api/index', { answer: 42 })
 // .then(data => {
  //  console.log(data); // JSON data parsed by `data.json()` call
  //  console.log(data['error']);
  // });


function prepareShowPost()
{
  var total=pageData['listOrder'].length;

  var li='';

  var td='';

  $('.body_list_data').html('');

  var postStatus='';

  for (var i = 0; i < total; i++) {


    postStatus='<span class="text text-warning text-sm">Waitting...</span>';
    if(parseInt(pageData['listOrder'][i]['status'])==1)
    {
      postStatus='<span class="text text-success text-sm">Successfull</span>';
    }

    li+='<tr class="tr-id-'+pageData['listOrder'][i]['id']+'">';
    li+='<td><button type="button" class="btn btn-default btn-xs btn-checkbox" data-checked="no" data-id="'+pageData['listOrder'][i]['id']+'"><i class="fas fa-square"></i></button></td>';
    li+='<td>'+pageData['listOrder'][i]['id']+'</td>';
    li+='<td>'+moment(pageData['listOrder'][i]['ent_dt'],'YYYY-MM-DD HH:mm:ss').format('MM/DD/YYYY HH:mm:ss')+'</td>';
    li+='<td>'+pageData['listOrder'][i]['username']+'</td>';
    li+='<td>'+postStatus+'</td>';
    li+='</tr>';
  }

  $('.body_list_data').html(li);
}



$(document).ready(function(){


    prepareShowPost();

    $('.datepicker').datepicker({
            autoclose: true,
            format: 'mm/dd/yyyy',
        });

    $('.search-from-date').val(moment().add('days',-90).format('MM/DD/YYYY'));
    $('.search-to-date').val(moment().format('MM/DD/YYYY'));

        $('.btnSearch').trigger('click');

});

//btn-modal-search
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
  pageData['username']=$('.search-username').val().trim();
  pageData['start_date']=$('.search-from-date').val().trim();
  pageData['end_date']=$('.search-to-date').val().trim();

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

  sendData['start_date']=moment(pageData['start_date'],'MM/DD/YYYY').format('YYYY-MM-DD');
  sendData['end_date']=moment(pageData['end_date'],'MM/DD/YYYY').format('YYYY-MM-DD');
  sendData['username']=pageData['username'];

  postData(API_URL+'call_api?api_nm=get_list_payment_data', sendData).then(data => {
    // console.log(data); // JSON data parsed by `data.json()` call
    $('#modalSearch').modal('hide');

    pageData['listOrder']=data['data'];
    prepareShowPost();
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

  pageData['username']=$('.search-username').val().trim();
  pageData['start_date']=$('.search-from-date').val().trim();
  pageData['end_date']=$('.search-to-date').val().trim();

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

  sendData['start_date']=moment(pageData['start_date'],'MM/DD/YYYY').format('YYYY-MM-DD');
  sendData['end_date']=moment(pageData['end_date'],'MM/DD/YYYY').format('YYYY-MM-DD');
  sendData['username']=pageData['username'];

  postData(API_URL+'call_api?api_nm=get_list_payment_data', sendData).then(data => {
    // console.log(data); // JSON data parsed by `data.json()` call
    $('#modalSearch').modal('hide');

    pageData['listOrder']=data['data'];
    prepareShowPost();
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

  pageData['username']=$('.search-username').val().trim();
  pageData['start_date']=$('.search-from-date').val().trim();
  pageData['end_date']=$('.search-to-date').val().trim();

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

  sendData['start_date']=moment(pageData['start_date'],'MM/DD/YYYY').format('YYYY-MM-DD');
  sendData['end_date']=moment(pageData['end_date'],'MM/DD/YYYY').format('YYYY-MM-DD');
  sendData['username']=pageData['username'];

  postData(API_URL+'call_api?api_nm=get_list_payment_data', sendData).then(data => {
    // console.log(data); // JSON data parsed by `data.json()` call
    $('#modalSearch').modal('hide');

    pageData['listOrder']=data['data'];
    prepareShowPost();
  });  
});
     
</script>