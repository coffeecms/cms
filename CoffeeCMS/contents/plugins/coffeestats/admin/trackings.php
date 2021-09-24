<?php


$db=new Database();    

$theList=$db->query("select * from cs_tracking_data order by upd_dt desc");


?>

<!-- Modal -->
<div class="modal fade" id="modalAdd"  style='z-index:99999;' data-backdrop="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel"><?php echo get_text_by_lang('Add tracking','admin');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
      
      <p>
        <label><strong><?php echo get_text_by_lang('Title','admin');?></strong></label>
        <input type="text" class="form-control add-keywords input-size-medium" name="send[keywords]" />
      </p> 
      <p>
        <label><strong><?php echo get_text_by_lang('Embed script','admin');?></strong></label>
        <textarea type="text" class="form-control add-embed-script-result input-size-medium" name="send[keywords]" style='height:200px;'></textarea>
      </p> 
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info btnAddnew" ><i class="fas fa-plus"></i> <?php echo get_text_by_lang('Add new','admin');?></button>
        <button type="button" class="btn btn-danger btnCloseAlert" data-dismiss="modal"><i class="fas fa-times"></i> <?php echo get_text_by_lang('Close','admin');?></button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalEmbed"  style='z-index:99999;' data-backdrop="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel"><?php echo get_text_by_lang('Embed Code','admin');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">

      <p>
        <label><strong><?php echo get_text_by_lang('Embed script','admin');?></strong></label>
        <textarea type="text" class="form-control view-embed-script-result input-size-medium" name="send[keywords]" style='height:200px;'></textarea>
      </p> 
      
      </div>
      <div class="modal-footer">
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
                <h3 class="card-title"><?php echo get_text_by_lang('Trackings','admin');?></h3>
                <div class="card-tools">
                  <!-- <a href="<?php echo SITE_URL;?>admin/plugin_page_url?plugin=coffeestats&page=add_tracking" class="btn btn-tool btn-sm">
                    <i class="fas fa-plus"></i>
                  </a>                   -->
                  
                  <a href="#" class="btn btn-tool btn-sm btn-modal-add">
                    <i class="fas fa-plus"></i>
                  </a>
                  
                
               
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th><button type="button" class="btn btn-default btn-xs btn-checkall" data-checked="no"><i class="fas fa-square"></i></button></th>
                    <th><?php echo get_text_by_lang('Title','admin');?></th>
                    <th><?php echo get_text_by_lang('Status','admin');?></th>
                    <th style="text-align:right;"><?php echo get_text_by_lang('Action','admin');?></th>
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
    pageData['listPost']=<?php echo json_encode($theList);?>;

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
  var total=pageData['listPost'].length;

  var li='';

  var td='';

  $('.body_list_data').html('');

  var postStatus='';

  for (var i = 0; i < total; i++) {


    postStatus='<span class="text text-default text-sm">Deactivated</span>';
    if(parseInt(pageData['listPost'][i]['status'])==1)
    {
      postStatus='<span class="text text-success text-sm">Activated</span>';
    }

    li+='<tr class="tr-id-'+pageData['listPost'][i]['tracking_id']+'">';
    li+='<td><button type="button" class="btn btn-default btn-xs btn-checkbox" data-checked="no" data-id="'+pageData['listPost'][i]['tracking_id']+'"><i class="fas fa-square"></i></button></td>';
    li+='<td><a style="color:#000;" href="'+SITE_URL+'admin/plugin_page_url?plugin=coffeestats&page=report&tracking_id='+pageData['listPost'][i]['tracking_id']+'"  title="'+pageData['listPost'][i]['title']+'">'+pageData['listPost'][i]['title']+'</td>';
    li+='<td>'+postStatus+'</td>';
    li+='<td style="text-align:right;">';
    li+='<a href="'+SITE_URL+'admin/plugin_page_url?plugin=coffeestats&page=report&tracking_id='+pageData['listPost'][i]['tracking_id']+'"><i title="Statistics" class="fas fa-chart-bar" style="margin-right:15px;color:#000;"></i></a>';
    li+='<i title="Embed Code" class="fas fa-code showEmbedCode" data-id="'+pageData['listPost'][i]['tracking_id']+'" style="cursor:pointer;"></i>';
    li+='</td>';
    li+='</tr>';
  }

  $('.body_list_data').html(li);
}

function prepareShowCategories()
{
 

}


$(document).ready(function(){


  prepareShowCategories();
  prepareShowPost();

  $('.select2js').select2({
    dropdownParent: $("#modalSearch")
  });
  $('.post-action').select2({
    'width':'200px'
  });

});

//btn-modal-search
$(document).on('click','.btn-modal-search',function(){
  $('#modalSearch').modal({backdrop:'static',keyboard:false});

});
//btn-modal-add
$(document).on('click','.btn-modal-add',function(){
  $('#modalAdd').modal({backdrop:'static',keyboard:false});

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
  pageData['list_post_c']='';

  $('.btn-checkbox').each(function(){
    var id=$(this).attr('data-id');
    var checked=$(this).attr('data-checked');

    if(checked=='yes')
    {
      pageData['list_post_c']+=id+',';
    }
    
  });

  var sendData={};

 

  sendData['type']='1';
 
  sendData['list_post_c']=pageData['list_post_c'];
  pageData['action']=$('.post-action > option:selected').val().trim();
  sendData['action']=pageData['action'];

  postData(API_URL+'post_action_apply', sendData).then(data => {
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

$(document).on('click','.btnAddnew',function(){
  var sendData={};

  sendData['page_no']='1';
  
  $('.txtPageNumber').val(sendData['page_no']);

  sendData['type']='1';
 
  sendData['title']=$('.add-keywords').val().trim();

  postData(API_URL+'plugin_api?plugin=CoffeeStats&func=cs_add_new_tracking', sendData).then(data => {
    // console.log(data); // JSON data parsed by `data.json()` call

    var li='<script src="'+API_URL+'plugin_api?plugin=CoffeeStats&func=cs_tracking&tracking_id='+data['data']+'"><\/script>';

    $('.add-embed-script-result').val(li);
  });  

});

$(document).on('click','.showEmbedCode',function(){
  var id=$(this).attr('data-id');

  var li='<script src="'+API_URL+'plugin_api?plugin=CoffeeStats&func=cs_tracking&tracking_id='+id+'"><\/script>';

  $('.view-embed-script-result').val(li);  
  
  $('#modalEmbed').modal({backdrop:'static',keyboard:false});

});

</script>