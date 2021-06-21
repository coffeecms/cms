<style>
.tab-content>.active {
    display: block;
    /* padding: 0px; */
    /* margin-left: 10px; */
}


#exTab1 .tab-content {
  color : white;
  background-color: #428bca;
  padding : 5px 15px;
}

#exTab2 h3 {
  color : white;
  background-color: #428bca;
  padding : 5px 15px;
}

/* remove border radius for the tab */


</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo get_text_by_lang('Send new email','admin');?></h1>
          </div><!-- /.col -->
      
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-md-12 col-sm-12">

		  <div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">
              <div class="card-header d-flex p-0">
                <!-- <h3 class="card-title p-3">Tabs</h3> -->
                <ul class="nav nav-pills  p-2">
                  <li class="nav-item tab1"><a class="nav-link a_tab1 active" href="#tab_1" data-toggle="tab"><?php echo get_text_by_lang('New email information','admin');?></a></li>
                  <li class="nav-item tab2"><a class="nav-link a_tab2" href="#tab_2" data-toggle="tab"><?php echo get_text_by_lang('Send logs','admin');?></a></li>
                 
                  
                
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">

						<div class="row" style="margin-top:10px;margin-bottom:10px;">
								<div class="col-lg-12">
                                <p>
								<span><?php echo get_text_by_lang('To Groups','admin');?>:</span>

                                <select name="general[system_status]" id="groups" class="form-control groups  select2js">
                                </select>
                                </p>
                                <p>
								<span><?php echo get_text_by_lang('From Template','admin');?>:</span>

                                <select name="general[system_status]" id="template_id" class="form-control template_id  select2js">
                                </select>
                                </p>
                               
								</div>


							</div>
						


					<p>
					<button type="button" name="btnSave" class="btn btn-info btnSend"><i class='fas fa-paper-plane'></i> <?php echo get_text_by_lang('Add new job','admin');?></button>
					</p>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                  <button type="button" name="btnSave" class="btn btn-info btnStart"><i class='fas fa-paper-plane'></i> <?php echo get_text_by_lang('Start Send','admin');?></button>
                  <button type="button" name="btnSave" class="btn btn-info btnStop hide"><i class='fas fa-paper-plane'></i> <?php echo get_text_by_lang('Stop','admin');?></button>
                    <p style='margin-top:10px;'>
                        <span class='text-primary' style='margin-right:20px;'><?php echo get_text_by_lang('Total sended','admin');?>: <span class='job_total_sended_email' style='margin-right:5px;'>0</span>/ <span class='job_total_email' style='margin-right:10px;'>0</span></span>
                    </p>
				  	<p><?php echo get_text_by_lang('Logs','admin');?>:</p>
					<p>
					<textarea class='form-control' style='height:500px;width:100%;'></textarea>
					</p>
				
                  </div>
                  <!-- /.tab-pane -->
                



                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- ./card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- END CUSTOM TABS -->
   
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->


        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script>

pageData['listGroups']=<?php echo json_encode($listGroups);?>;
pageData['listTemplates']=<?php echo json_encode($listTemplates);?>;
pageData['theData']=<?php echo json_encode($theData);?>;

pageData['email_send_list']=[];
pageData['cur_email_index']=0;
pageData['job_id']='';

pageData['is_sending']=false;
pageData['send_completed']=false;

function prepareGroupsData()
{
  var total=pageData['listGroups'].length;

  var li='';

  li+='<option value="" selected>Select a email group</option>';

  for (var i = 0; i < total; i++) {
   
    li+='<option value="'+pageData['listGroups'][i]['group_id']+'">'+pageData['listGroups'][i]['title']+'</option>';
  }

  $('.groups').html(li).trigger('change');

  prepareTemplatesData();

  if(typeof pageData['theData'][0]!='undefined')
  {
    prepareSendData();
  }
}

function prepareSendData()
{
    pageData['job_id']=pageData['theData'][0]['job_id'];
    $('.job_total_sended_email').html(pageData['theData'][0]['total_sended']);
    $('.job_total_email').html(pageData['theData'][0]['total_email']);


    $('.a_tab2').trigger('click');
}

function prepareTemplatesData()
{
  var total=pageData['listTemplates'].length;

  var li='';

  li+='<option value="" selected>Select a email template</option>';

  for (var i = 0; i < total; i++) {
   
    li+='<option value="'+pageData['listTemplates'][i]['template_id']+'">'+pageData['listTemplates'][i]['title']+'</option>';
  }

  $('.template_id').html(li).trigger('change');
}

$(document).ready(function(){

	$('.select2js').select2();

    prepareGroupsData();


});

function setSelect(id,value)
{
	$('#'+id+' option').each(function(){
		var thisVal=$(this).val();

		if(thisVal==value)
		{
			$(this).attr('selected',true);
		}

	});
}

//btnSavePage1

function email_marketing_load_email_for_send()
{
  var sendData={};
  sendData['type']='1';
  sendData['job_id']=pageData['job_id'];

  pageData['email_send_list']=[];

  postData(API_URL+'email_marketing_load_email_for_send', sendData).then(data => {
    toastr.success("Job starting...");

    var total=data['data'].length;

    pageData['send_completed']=false;

    for (var i = 0; i < total; i++) {
      pageData['email_send_list'].push(data['data'][i]['to_email']);
    }
      pageData['cur_email_index']=0;

      setTimeout(function(){
        send_email();
      }, 2000);
      
  });    
}

function updateStats()
{
  $('.job_total_sended_email').html(pageData['cur_email_index'].toString());
  $('.job_total_email').html(pageData['email_send_list'].length.toString());

}

function send_email()
{
  if(typeof pageData['email_send_list'][pageData['cur_email_index']]=='undefined')
  {
    pageData['is_sending']=false;
    $('.btnStart').addClass('hide');
    $('.btnStop').removeClass('hide');
    toastr.error("Job stopped!");
    return false;
  }
  var sendData={};
  sendData['type']='1';
  sendData['job_id']=pageData['job_id'];
  sendData['email']=pageData['email_send_list'][pageData['cur_email_index']];

  if(sendData['email'].length < 5)
  {
    pageData['is_sending']=false;
    $('.btnStart').addClass('hide');
    $('.btnStop').removeClass('hide');
    toastr.error("Job stopped!");
    return false;
  }

  pageData['send_completed']=true;

  toastr.success("Sending email to "+sendData['email']);

  postData(API_URL+'email_marketing_sendemail', sendData).then(data => {
    pageData['cur_email_index']+=1;
    updateStats();
    send_email();
  });     
}

$(document).on('click','.btnSend',function(){
    var sendData={};

    if(pageData['is_sending']==true)
    {
        showAlert('','Email is sending, you can stop sending email then add new job!');
        return;
    }
   
    sendData['type']='1';
    sendData['group_id']=$('.groups > option:selected').val().trim();
    sendData['template_id']=$('.template_id > option:selected').val().trim();

    if(typeof sendData['group_id']=='undefined' || sendData['group_id']==null)
    {
        showAlert('','Select a group');
        return;
    }

    if(sendData['group_id'].length==0)
    {
        showAlert('','Select a group');
        return;
    }

    if(typeof sendData['template_id']=='undefined' || sendData['template_id']==null)
    {
        showAlert('','Select a template');
        return;
    }
    if(sendData['template_id'].length==0)
    {
        showAlert('','Select a template');
        return;
    }

    pageData['theData']=[];
    postData(API_URL+'email_marketing_add_new_job', sendData).then(data => {
      // console.log(data); // JSON data parsed by `data.json()` call

      pageData['theData']=data['data'];
      
      prepareSendData();
        $('.a_tab2').trigger('click');

        email_marketing_load_email_for_send();
      toastr.success("Create job completed");
    });        

});


$(document).on('click','.btnStart',function(){
    pageData['is_sending']=true;

    email_marketing_load_email_for_send();

});

$(document).on('click','.btnStop',function(){
    pageData['is_sending']=false;

});




</script>