
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
                        <h3 class="card-title"><?php echo get_text_by_lang('Activities Logs','admin');?></h3>
                        <div class="card-tools">
                      
                        
                        </div>
                      </div>
                      <div class="card-body table-responsive p-0">
                        <table class="table table-hover table-striped table-valign-middle">
                          <thead>
                          <tr>
                            <th><?php echo get_text_by_lang('Datetime','admin');?></th>
                            <th><?php echo get_text_by_lang('Content','admin');?></th>
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
                    
                    <div class='col-lg-12 ' style='margin-bottom:100px;' >
                                        
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
  $('.the-list').html('');

  for (var i = 0; i < total; i++) {
    li+='<tr>';
    li+='<td>'+pageData['theList'][i]['ent_dt']+'</td>';
    li+='<td>'+pageData['theList'][i]['activity_content']+'</td>';
    li+='</tr> ';
  }

  $('.the-list').html(li);
}


    $(document).ready(function(){

        prepareShowData();
      $('.select2js').select2();

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

postData(API_URL+'get_list_activities', sendData).then(data => {
  // console.log(data); // JSON data parsed by `data.json()` call

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

postData(API_URL+'get_list_activities', sendData).then(data => {
  // console.log(data); // JSON data parsed by `data.json()` call

  pageData['theList']=data['data'];
  prepareShowData();
});   
});
          
</script>