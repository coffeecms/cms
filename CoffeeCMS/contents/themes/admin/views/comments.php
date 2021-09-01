
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
        <label><strong><?php echo get_text_by_lang('Keywords','admin');?></strong></label>
        <input type="text" class="form-control search-keywords input-size-medium" name="send[keywords]" placeholder="Keywords" />
    </p> 
      <label><strong><?php echo get_text_by_lang('Category','admin');?></strong></label>
      <select name="send[catid]" class="form-control search-category category_c select2js ">
          
      </select>

      </p> 
      
      <p>
      <label><strong><?php echo get_text_by_lang('Publish','admin');?>:</strong></label>
      <select class="form-control search-post-status select2js" name="send[status]">
      <option value="all"><?php echo get_text_by_lang('All','admin');?></option>
      <option value="1"><?php echo get_text_by_lang('Yes','admin');?></option>
        <option value="0"><?php echo get_text_by_lang('No','admin');?></option>

      </select>
      </p>
      <p>
        <label><strong><?php echo get_text_by_lang('Post title','admin');?></strong></label>
        <input type="text" class="form-control search-post-title input-size-medium" name="send[keywords]" placeholder="<?php echo get_text_by_lang('Post title','admin');?>" />
    </p> 
      <p>
        <label><strong><?php echo get_text_by_lang('Post Tags','admin');?></strong></label>
        <input type="text" class="form-control search-tags input-size-medium" name="send[keywords]" placeholder="Tags" />
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
                <h3 class="card-title"><?php echo get_text_by_lang('Comments','admin');?></h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm btn-modal-search">
                    <i class="fas fa-search"></i>
                  </a>
                               
                 
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-hover table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th><button type="button" class="btn btn-default btn-xs btn-checkall" data-checked="no"><i class="fas fa-square"></i></button></th>
                    <th><?php echo get_text_by_lang('Date','admin');?></th>
                    <th><?php echo get_text_by_lang('Post title','admin');?></th>
                    <th><?php echo get_text_by_lang('Comment','admin');?></th>
                    <th><?php echo get_text_by_lang('Status','admin');?></th>
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
                          <option value="deactivate"><?php echo get_text_by_lang('Set Deactivate','admin');?></option>
                          <option value="activate"><?php echo get_text_by_lang('Set Activate','admin');?></option>
                          
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
    pageData['theList']=<?php echo json_encode($theList);?>;
    pageData['listCat']=<?php echo $listCat;?>;

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
  var total=pageData['theList'].length;

  var li='';
  var postStatus='';

  var td='';
  $('.the-list').html('');

  for (var i = 0; i < total; i++) {


    postStatus='<span class="text text-default text-sm">Deactivated</span>';
    if(parseInt(pageData['theList'][i]['status'])==1)
    {
      postStatus='<span class="text text-success text-sm">Activated</span>';
    }
    
    li+='<tr class="tr-id-'+pageData['theList'][i]['comment_id']+'">';
    li+='<td><button type="button" class="btn btn-default btn-xs btn-checkbox" data-checked="no" data-id="'+pageData['theList'][i]['comment_id']+'"><i class="fas fa-square"></i></button></td>';
    li+='<td>'+pageData['theList'][i]['ent_dt']+'</td>';
    li+='<td>'+pageData['theList'][i]['title']+'</td>';
    li+='<td>'+pageData['theList'][i]['content']+'</td>';

    li+='<td>'+postStatus+'</td>';
  
    li+='</tr> ';
  }

  $('.the-list').html(li);
}

function prepareShowCategories()
{
  var total=pageData['listCat'].length;

  var li='';

  var td='';

  pageData['listCatDetails']={};

  li+='<option value="all">All categories</option>';

  for (var i = 0; i < total; i++) {

    if(typeof pageData['listCatDetails'][pageData['listCat'][i]['category_c']]=='undefined')
    {
      pageData['listCatDetails'][pageData['listCat'][i]['category_c']]={};

      pageData['listCatDetails'][pageData['listCat'][i]['category_c']]=pageData['listCat'][i];
    }
   
    li+='<option value="'+pageData['listCat'][i]['category_c']+'">'+pageData['listCat'][i]['title']+'</option>';

  }

  $('.category_c').html(li).trigger('change');

}

    $(document).ready(function(){

        prepareShowPost();
        prepareShowCategories();
  $('.select2js').select2({
    dropdownParent: $("#modalSearch")
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
  pageData['list_comment_id']='';

  $('.btn-checkbox').each(function(){
    var id=$(this).attr('data-id');
    var checked=$(this).attr('data-checked');

    if(checked=='yes')
    {
      pageData['list_comment_id']+=id+',';
    }
    
  });

  var sendData={};

 

  sendData['type']='1';
 
  sendData['list_comment_id']=pageData['list_comment_id'];
  pageData['action']=$('.post-action > option:selected').val().trim();
  sendData['action']=pageData['action'];

  postData(API_URL+'comment_action_apply', sendData).then(data => {
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
$(document).on('click','.btnSearch',function(){
  var sendData={};

  sendData['page_no']='1';
    $('.txtPageNumber').val(sendData['page_no']);

  sendData['type']='1';
  pageData['category_c']=$('.search-category > option:selected').val().trim();
  pageData['status']=$('.search-post-status > option:selected').val().trim();
  pageData['content']=$('.search-keywords').val().trim();
  pageData['post_title']=$('.search-post-title').val().trim();
  pageData['tags']=$('.search-tags').val().trim();
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
  sendData['category_c']=pageData['category_c'];
  sendData['status']=pageData['status'];
  sendData['content']=pageData['content'];
  sendData['post_title']=pageData['post_title'];
  sendData['tags']=pageData['tags'];

  postData(API_URL+'get_list_comment', sendData).then(data => {
    // console.log(data); // JSON data parsed by `data.json()` call
    $('#modalSearch').modal('hide');

    pageData['theList']=data['data'];
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

  pageData['category_c']=$('.search-category > option:selected').val().trim();
  pageData['status']=$('.search-post-status > option:selected').val().trim();
  pageData['content']=$('.search-keywords').val().trim();
  pageData['post_title']=$('.search-post-title').val().trim();
  pageData['tags']=$('.search-tags').val().trim();
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
  sendData['category_c']=pageData['category_c'];
  sendData['status']=pageData['status'];
  sendData['content']=pageData['content'];
  sendData['post_title']=pageData['post_title'];
  sendData['tags']=pageData['tags'];


  postData(API_URL+'get_list_comment', sendData).then(data => {
    // console.log(data); // JSON data parsed by `data.json()` call
    $('#modalSearch').modal('hide');

    pageData['theList']=data['data'];
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
  pageData['category_c']=$('.search-category > option:selected').val().trim();
  pageData['status']=$('.search-post-status > option:selected').val().trim();
  pageData['content']=$('.search-keywords').val().trim();
  pageData['post_title']=$('.search-post-title').val().trim();
  pageData['tags']=$('.search-tags').val().trim();
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
  sendData['category_c']=pageData['category_c'];
  sendData['status']=pageData['status'];
  sendData['content']=pageData['content'];
  sendData['post_title']=pageData['post_title'];
  sendData['tags']=pageData['tags'];

  postData(API_URL+'get_list_comment', sendData).then(data => {
    // console.log(data); // JSON data parsed by `data.json()` call
    $('#modalSearch').modal('hide');

    pageData['theList']=data['data'];
    prepareShowPost();
  });   
});
     
       
</script>