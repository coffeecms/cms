
<!-- Modal -->
<div class="modal fade" id="modalAdd"  style='z-index:99999;' data-backdrop="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel"><?php echo get_text_by_lang('Add task','admin');?></h5>
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
        <label><strong><?php echo get_text_by_lang('Progress','admin');?></strong></label>
        <input type="text" class="form-control add-progress input-size-medium" value="0" name="send[keywords]" placeholder="<?php echo get_text_by_lang('Progress','admin');?>" />
      </p> 

      <p>
        <label><strong><?php echo get_text_by_lang('Start Date','admin');?></strong></label>
        <input type="text" class="form-control add-start-date datepicker input-size-medium" name="send[keywords]" placeholder="<?php echo get_text_by_lang('Start Date','admin');?>" />
      </p> 

      <p>
        <label><strong><?php echo get_text_by_lang('End Date','admin');?></strong></label>
        <input type="text" class="form-control add-end-date datepicker input-size-medium" name="send[keywords]" placeholder="<?php echo get_text_by_lang('End Date','admin');?>" />
      </p> 

      <p>
        <label><strong><?php echo get_text_by_lang('Assign to','admin');?></strong></label>
        <select class="form-control add-assign input-size-medium"></select>
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
<div class="modal fade" id="modalUpdate"  style='z-index:99999;' data-backdrop="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel"><?php echo get_text_by_lang('Update task','admin');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
     
      <p>
        <label><strong><?php echo get_text_by_lang('Title','admin');?></strong></label>
        <input type="text" class="form-control edit-title input-size-medium" name="send[keywords]" placeholder="<?php echo get_text_by_lang('Title','admin');?>" />
      </p> 
     
      <p>
        <label><strong><?php echo get_text_by_lang('Progress','admin');?></strong></label>
        <input type="text" class="form-control edit-progress input-size-medium" value="0" name="send[keywords]" placeholder="<?php echo get_text_by_lang('Progress','admin');?>" />
      </p> 

      <p>
        <label><strong><?php echo get_text_by_lang('Start Date','admin');?></strong></label>
        <input type="text" class="form-control edit-start-date datepicker input-size-medium" name="send[keywords]" placeholder="<?php echo get_text_by_lang('Start Date','admin');?>" />
      </p> 

      <p>
        <label><strong><?php echo get_text_by_lang('End Date','admin');?></strong></label>
        <input type="text" class="form-control edit-end-date datepicker input-size-medium" name="send[keywords]" placeholder="<?php echo get_text_by_lang('End Date','admin');?>" />
      </p> 

      <p>
        <label><strong><?php echo get_text_by_lang('Assign to','admin');?></strong></label>
        <select class="form-control edit-assign input-size-medium"></select>
      </p> 
    
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-info btnUpdate" ><i class="fas fa-save"></i> <?php echo get_text_by_lang('Save changes','admin');?></button>
        <button type="button" class="btn btn-danger btnDelete " style='float:left;' ><i class="fas fa-save"></i> <?php echo get_text_by_lang('Delete','admin');?></button>
        <button type="button" class="btn btn-danger btnCloseAlert" data-dismiss="modal"><i class="fas fa-times"></i> <?php echo get_text_by_lang('Close','admin');?></button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalViewMessage"  style='z-index:99999;' data-backdrop="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel"><?php echo get_text_by_lang('Comments','admin');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
      
      <p>
        <label><strong><?php echo get_text_by_lang('Note content','admin');?></strong></label>
        <div class='view-note-content'>

        </div>
      </p> 
      
      <p>
        <label><strong><?php echo get_text_by_lang('Add comment','admin');?></strong></label>
        <textarea class="form-control add-note-comment" maxlength="1000" style='height:150px;'></textarea>
        <br>
        <button type="button" class="btn btn-success btnAddNewComment"><?php echo get_text_by_lang('Add new comment','admin');?></button>


      </p> 

      <div class='wrap-list-note-comments' style='overflow:scroll;max-height:500px;'>
        <div class='row list-note-comments' style=''>
               
        </div>
      </div>

    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btnCloseAlert" data-dismiss="modal"><i class="fas fa-times"></i> <?php echo get_text_by_lang('Close','admin');?></button>
      </div>
    </div>
  </div>
</div>


 <style>
.m-b-30 {
  margin-bottom: 60px; }

.success {
  background: #00B961;
  color: #fff; }
/* 
.info {
  background: #2A92BF;
  color: #fff; } */

.info {
  background: #2A92BF;
  color: #fff; }

.warning {
  background: #F4CE46;
  color: #fff; }

.error {
  background: #FB7D44;
  color: #fff; }

#demo3 {
  overflow-x: auto;
  padding: 20px 0; }
  .kanban-item
  {
    border-radius:5px;
  }
  .kanban-board header
  {

    border-radius: 5px;
    border-bottom-left-radius: 0px;
    border-bottom-right-radius: 0px;

  }
  .kanban-board .kanban-drag
  {
    min-height: 600px;
    max-height: 600px;
    overflow: scroll;
  }
  .kanban-board
  {
    min-width:400px;
  }
  .kanban-container
  {
    width:3000px!important;
  }
  .kanban-drag
  {
    background-color: #EBEBEB;
  }

  .kanban-board header .kanban-title-board
  {
    font-weight:500;
  }
  .datepicker{ z-index:99999 !important; }
 </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row" style='padding-top: 10px;'>

            <div class="col-lg-1 col-md-1 col-sm-1  ">
                <p>
                <label><?php echo get_text_by_lang('Year','admin');?></label>
                    <input type="text" class="form-control yearpicker select-year " value="" autofill="off" />  
                
                    </p>
                            
          </div>

          <div class="col-lg-3 col-md-3 col-sm-4  ">
            <button type='button' class='btn btn-primary btnShowData' style='margin-top: 30px;'><i class='fas fa-search'></i> <?php echo get_text_by_lang('Show Data','admin');?></button>
          </div>
          <div class="col-lg-12">

          <div class="card" style='margin-top:20px;'>
              <div class="card-header border-0">
                <h3 class="card-title"><?php echo $theProject[0]['title'];?></h3>
                <div class="card-tools">
                  <!-- <a href="#" class="btn btn-tool btn-sm btn-modal-search">
                    <i class="fas fa-search"></i>
                  </a> -->
                  <a href="#" class="btn btn-tool btn-sm btn-add-user" title="Add new" style='font-size:18pt;'>
                    <i class="fas fa-plus-square"></i>
                  </a>               
                              
                </div>
              </div>
              <div class="card-body table-responsive p-0" style='min-height:600px;'>
                
                <div class='wrap_kanban_board' style='min-height:600px;max-width: 800px;overflow: scroll;overflow-x: auto;overflow-y: auto;padding:10px;'>
                    <table class="table table-hover table-valign-middle" style='font-size: 13px;'>
                    <thead>

                    <tr class='tr_task_header_year' style='background-color: #999;color: #fff;'>
                        <th colspan='5'>Year</th>
                        
                    </tr>
                    <tr class='tr_task_header_day' style='background-color: #999;color: #fff;'>
                        <th colspan='5'>Date</th>
                    </tr>
                    <tr class='tr_task_header_day_name' style='background-color: #666;color: #fff;'>
                        <th style='min-width:410px;max-width:410px;'>Tasks</th>
                        <th class='' style='width:210px;'>Assigned to</th>
                        <th class='text-center' style='width:70px;'>Progress</th>
                        <th class='' style='width:110px;'>Start</th>
                        <th class='' style='width:110px;'>End</th>
                        


                    </tr>
                    </thead>
                    <tbody class='body_list_data'>
                            
                    </tbody>
                    </table>
                </div> 
              </div>
             
            </div>
            <!-- /.card --> 
        
              
              
          </div>
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<script>
    pageData['project_c']='<?php echo $project_c;?>';
    pageData['listUsers']=<?php echo json_encode($listUsers);?>;
    pageData['listTask']=<?php echo json_encode($listTask);?>;
</script>

<script type="text/javascript">

function prepareUserData()
{
    var total=pageData['listUsers'].length;

    var li='';

    for (var i = 0; i < total; i++) {
        li+='<option value="'+pageData['listUsers'][i]['user_id']+'">'+pageData['listUsers'][i]['username']+'</option>';        
    }

    $('.add-assign').html(li).trigger('change');
    $('.edit-assign').html(li).trigger('change');
}

function genTaskProgress(task_id,start_date,end_date,progress)
{
    var li='';

    var default_width=40;

    var d1=moment(start_date,'YYYY-MM-DD');
    var d2=moment(end_date,'YYYY-MM-DD');

    var diffDays = d2.diff(d1, 'days');     

    default_width=60*parseInt(diffDays);
    var task_status='bg-success';

    // console.log('.Task'+task_id+'-'+start_date);
    // console.log($('.Task'+task_id+'-'+start_date).length);
    // console.log($('.Task'+task_id+'-'+start_date).offset().top);
    // console.log($('.Task'+task_id+'-'+start_date).offset().left);

    if($('.Task'+task_id+'-'+start_date).length > 0)
    {
        var top=$('.Task'+task_id+'-'+start_date).offset().top;
        var left=$('.Task'+task_id+'-'+start_date).offset().left;

        task_status='';

        if(parseInt(progress)==100)
        {
            task_status=' bg-success';
        }        

        //$('.container-fluid').offset().top
        li+='<div class="progress-'+task_id+'-'+start_date+'" style="min-width:'+default_width.toString()+'px;max-width:'+default_width.toString()+'px;position: relative;top:0px;left:0px;">';
        li+='<div class="progress">';
        li+='<div class="progress-bar '+task_status+'" role="progressbar" style="width: '+progress+'%;" aria-valuenow="'+progress+'" aria-valuemin="0" aria-valuemax="100">'+progress+'%</div>';
        li+='</div>';            
        li+='</div>';

        // $('.wrap_kanban_board').append(li);
        // $('.body_list_data').append(li);
        $('.Task'+task_id+'-'+start_date).append(li);
    }

}

function gen_task_header_day()
{

    $('.tr_task_header_day').html('');
    $('.tr_task_header_day_name').html('');
    $('.body_list_data').html('');
    $('.tr_task_header_year').html('');


    var li_year="<th colspan='5'>Year</th>";
    var li_day="<th colspan='5'>Date</th>";

    var li_day_name='';
    var li_task='';

    li_day_name+="<th>Tasks</th>";
    li_day_name+="<th class='' style='width:210px;'>Assigned to</th>";
    li_day_name+="<th class='' style='width:70px;'>Progress</th>";
    li_day_name+="<th class='' style='width:110px;'>Start</th>";
    li_day_name+="<th class='' style='width:110px;'>End</th>";



    var thisYear=moment().format('YYYY');
    var nextYear=moment().add('year',1).format('YYYY');

    var total=pageData['listTask'].length;

    var task_status='bg-success';

    for (var i = 0; i < 730; i++) {
                li_year+="<th class='text-center' style='width:40px;'>"+moment(moment().format('YYYY')+'-01-01','YYYY-MM-DD').add('days',i).format('YY')+"</th>";
                li_day+="<th class='text-center' style='width:40px;'>"+moment(moment().format('YYYY')+'-01-01','YYYY-MM-DD').add('days',i).format('MM/DD')+"</th>";
                li_day_name+="<th class='text-center'>"+moment(moment().format('YYYY')+'-01-01','YYYY-MM-DD').add('days',i).format('ddd')+"</th>";
    }

    var d1='';
    var d2='';
    var d3='';
    var diffDays = 0;     

    for (var k = 0; k < total; k++) {

        task_status='';

        if(parseInt(pageData['listTask'][k]['progress'])==100)
        {
            task_status=' bg-success';
        }

        li_task+="<tr class='tr_task_body click-to-edit' data-id='"+pageData['listTask'][k]['task_id']+"' style='border-bottom: 1px solid #cbcbcb;cursor:pointer;'>";
        li_task+="<td style='min-width:410px;max-width:410px;'>"+pageData['listTask'][k]['title']+"</td>";
        li_task+="<td class='' style='min-width:210px;'>"+pageData['listTask'][k]['username']+"</td>";
            li_task+="<td class='' style='width:70px;'>";

            li_task+='<div class="progress">';
                li_task+='<div class="progress-bar '+task_status+'" role="progressbar" style="width: '+pageData['listTask'][k]['progress']+'%;" aria-valuenow="'+pageData['listTask'][k]['progress']+'" aria-valuemin="0" aria-valuemax="100">'+pageData['listTask'][k]['progress']+'%</div>';
            li_task+='</div>';   

            li_task+="</td>";

            li_task+="<th class='' style='min-width:110px;'>"+pageData['listTask'][k]['start_date']+"</th>";
            li_task+="<th class='' style='min-width:110px;'>"+pageData['listTask'][k]['end_date']+"</th>";

            for (var i = 0; i < 730; i++) {
                d1=moment(moment().format('YYYY')+'-01-01','YYYY-MM-DD').add('days',i);
                d2=moment(pageData['listTask'][k]['start_date'],'YYYY-MM-DD');
                d3=moment(pageData['listTask'][k]['end_date'],'YYYY-MM-DD');

                if(d1.format('YYYY-MM-DD')==d2.format('YYYY-MM-DD'))
                {

                    console.log(d1.format('YYYY-MM-DD'));
                    diffDays = d3.diff(d2, 'days')+1; 

                    li_task+="<td colspan='"+diffDays.toString()+"' class='text-center Task"+pageData['listTask'][k]['task_id']+"-"+moment(moment().format('YYYY')+'-01-01','YYYY-MM-DD').add('days',i).format('YYYY-MM-DD')+"' style='width:40px;border-right: 1px solid #cbcbcb;    border-left: 1px solid #cbcbcb;'>&nbsp;</td>";

                    i=i+diffDays;
                }
                else
                {
                    li_task+="<td class='text-center Task"+pageData['listTask'][k]['task_id']+"-"+moment(moment().format('YYYY')+'-01-01','YYYY-MM-DD').add('days',i).format('YYYY-MM-DD')+"' style='width:40px;border-right: 1px solid #cbcbcb;    border-left: 1px solid #cbcbcb;'>&nbsp;</td>";
                }    

                


                
            }
        li_task+="</tr>";


    }

    setTimeout(() => {
        var totalTask=pageData['listTask'].length;
        for (var k = 0; k < totalTask; k++) {
            genTaskProgress(pageData['listTask'][k]['task_id'],pageData['listTask'][k]['start_date'],pageData['listTask'][k]['end_date'],pageData['listTask'][k]['progress']);
        }

    }, 1000);

    $('.tr_task_header_day').html(li_day);
    $('.tr_task_header_day_name').html(li_day_name);
    $('.body_list_data').html(li_task);
    $('.tr_task_header_year').html(li_year);


}
   // postData('http://localhost/coffeecms/api/index', { answer: 42 })
 // .then(data => {
  //  console.log(data); // JSON data parsed by `data.json()` call
  //  console.log(data['error']);
  // });

$(document).ready(function(){

    prepareUserData();
  $('.pushmenu').trigger('click');

  $('.wrap_kanban_board').css({
    'max-width':$('.card').width()+'px'
  });

  $('.datepicker').datepicker({
        autoclose: true,
        format: 'mm/dd/yyyy',
    });

//   $('.yearpicker').datepicker({
//         autoclose: true,
//         format: "yyyy",
//         viewMode: "years", 
//         minViewMode: "years"
//     });

$('.yearpicker').val(moment().format('YYYY'));


// $('.add-start-date').val(moment().add('days',-90).format('MM/DD/YYYY'));
// $('.add-end-date').val(moment().add('days',180).format('MM/DD/YYYY'));
    
$('.add-start-date').val(moment().format('MM/DD/YYYY'));
$('.add-end-date').val(moment().add('days',30).format('MM/DD/YYYY'));

});

     
</script>

<script>

  $(document).on('click','.btnShowData',function(){
    var year=$('.select-year').val().trim();

    if(year.length==0)
    {
        showAlert('','Year not allow blank');
        return ;
    }
    var sendData={};

    sendData['project_c']=pageData['project_c'];
    sendData['year']=$('.select-year').val().trim();
    sendData['type']='1';

    pageData['listTask']=[];

    postData(API_URL+'get_kanban_board_task', sendData).then(data => {
        pageData['listTask']=data['data'];
        
        gen_task_header_day();

    });  

  });

  $(document).on('click','.btn-add-user',function(){
    $('#modalAdd').modal({backdrop:'static',keyboard:false});
  });

  $(document).on('click','.click-to-edit',function(){
    var id=$(this).attr('data-id');

    pageData['updata_data']={};
    pageData['edit_task_id']=id;

    var totalTask=pageData['listTask'].length;
    for (var k = 0; k < totalTask; k++) {
       if(pageData['listTask'][k]['task_id']==id)
       {
            pageData['updata_data']=pageData['listTask'][k];

            $('.edit-title').val(pageData['updata_data']['title']);
            $('.edit-progress').val(pageData['updata_data']['progress']);
            $('.edit-start-date').val(moment(pageData['updata_data']['start_date'],'YYYY-MM-DD').format('MM/DD/YYYY'));
            $('.edit-end-date').val(moment(pageData['updata_data']['end_date'],'YYYY-MM-DD').format('MM/DD/YYYY'));
            $('.edit-assign').val(pageData['updata_data']['assigned_to']).trigger('change');

            $('#modalUpdate').modal('show');
           break;
       }
    }


  });

  $(document).on('click','.btnAdd',function(){
    var sendData={};

    sendData['title']=$('.add-title').val().trim();
    sendData['project_c']=pageData['project_c'];

    sendData['start_date']=moment($('.add-start-date').val().trim(),'MM/DD/YYYY').format('YYYY-MM-DD');
    sendData['end_date']=moment($('.add-end-date').val().trim(),'MM/DD/YYYY').format('YYYY-MM-DD');
    sendData['progress']=$('.add-progress').val().trim();
    sendData['assign_to']=$('.add-assign > option:selected').val();
    
    sendData['type']='1';

    if(sendData['title'].length==0)
    {
        showAlert('','Title not allow blank');
        return false;
    }

    if(sendData['start_date'].length==0)
    {
        showAlert('','Start date not allow blank');
        return false;
    }

    if(sendData['end_date'].length==0)
    {
        showAlert('','End date not allow blank');
        return false;
    }

    if(typeof sendData['assign_to']=='undefined')
    {
        showAlert('','You must assign to at least 1 user');
        return false;
    }

    postData(API_URL+'add_new_kanban_board_task', sendData).then(data => {
      $('#modalAdd').modal('hide');

        $('.btnShowData').trigger('click');

    });  
  });

  $(document).on('click','.btnUpdate',function(){
    var sendData={};

    sendData['title']=$('.edit-title').val().trim();
    sendData['task_id']=pageData['edit_task_id'];

    sendData['start_date']=moment($('.edit-start-date').val().trim(),'MM/DD/YYYY').format('YYYY-MM-DD');
    sendData['end_date']=moment($('.edit-end-date').val().trim(),'MM/DD/YYYY').format('YYYY-MM-DD');
    sendData['progress']=$('.edit-progress').val().trim();
    sendData['assign_to']=$('.edit-assign > option:selected').val();
    
    sendData['type']='1';

    if(sendData['title'].length==0)
    {
        showAlert('','Title not allow blank');
        return false;
    }

    if(sendData['start_date'].length==0)
    {
        showAlert('','Start date not allow blank');
        return false;
    }

    if(sendData['end_date'].length==0)
    {
        showAlert('','End date not allow blank');
        return false;
    }

    if(typeof sendData['assign_to']=='undefined')
    {
        showAlert('','You must assign to at least 1 user');
        return false;
    }

    postData(API_URL+'update_kanban_board_task', sendData).then(data => {
      $('#modalUpdate').modal('hide');

    $('.btnShowData').trigger('click');

    });  
  });

  $(document).on('click','.btnDelete',function(){
    var sendData={};

    sendData['task_id']=pageData['edit_task_id'];
    sendData['type']='1';

    postData(API_URL+'delete_kanban_board_task', sendData).then(data => {
      $('#modalUpdate').modal('hide');

    $('.btnShowData').trigger('click');

    });  
  });


</script>
