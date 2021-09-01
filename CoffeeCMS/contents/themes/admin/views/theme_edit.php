

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
                    <!-- col -->
                    <div class="col-lg-3 col-md-4 col-sm-7 ">
                    <form action="" method="post" enctype="multipart/form-data">

                    <div class="card" style='margin-top:20px;'>
                        <div class="card-header border-0">
                            <h3 class="card-title"><?php echo $theme_name;?></h3>
                            <div class="card-tools">
                                    
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0" style='    max-height: 500px;'>
                            <table class="table table-striped table-valign-middle">
                            <thead>
                            <tr>
                                <th><?php echo get_text_by_lang('File name','admin');?></th>
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
                    <!-- col -->
                    <!-- col -->
                    <div class="col-lg-9 col-md-8 col-sm-5 ">
                    <form action="" method="post" enctype="multipart/form-data">

                    <div class="card" style='margin-top:20px;'>
                        <div class="card-header border-0">
                            <h3 class="card-title"><?php echo $file;?></h3>
                            <div class="card-tools">
                                    
                            </div>
                        </div>
                        <div class="card-body" style='    max-height: 900px;'>
                            <textarea class='form-control file_content' style='height: 700px;'><?php echo $file_content;?></textarea>
                            <div class="row " style='margin-top:10px;'>
                                <div class="col-lg-12">
                                    <button type='button' class='btn btn-info btnSaveContent'><i class='fa fa-save'></i> Save Changes</button>
                                </div>                                    
                            </div>
                            
                        </div>
                    </div>
                    <!-- /.card -->
                  
                    </form>
                    </div>
                    <!-- col -->
               

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
    pageData['listFiles']=<?php echo json_encode($listFiles);?>;
    pageData['path']='<?php echo $path;?>';
    pageData['file']='<?php echo $file;?>';
    pageData['theme_name']='<?php echo $theme_name;?>';
</script>

<script type="text/javascript">


   // postData('http://localhost/coffeecms/api/index', { answer: 42 })
 // .then(data => {
  //  console.log(data); // JSON data parsed by `data.json()` call
  //  console.log(data['error']);
  // });


function prepareShowPost()
{
  var total=pageData['listFiles'].length;

  var li='';

  var td='';

  $('.body_list_data').html('');

  var postStatus='';

  var addFile='';
  var addDir='';
  

  for (var i = 0; i < total; i++) {
    if(pageData['listFiles'][i]=='.')
    {
        continue;
    }
    // if(pageData['listFiles'][i]=='..')
    // {
    //     continue;
    // }

    addDir=pageData['path'];

    if(pageData['listFiles'][i]!='..' && pageData['listFiles'][i].indexOf('.')>0)
    {
        addFile=pageData['listFiles'][i];
    }

    if(pageData['listFiles'][i].indexOf('.')<0)
    {
        addDir=pageData['path']+'/'+pageData['listFiles'][i];
    }

    li+='<tr >';
    li+='<td><a href="'+SITE_URL+'admin/theme_edit/basic?path='+addDir+'&file='+addFile+'" style="color:#000;display:block;">'+pageData['listFiles'][i]+'</a></td>';
    li+='</tr>';
  }

  $('.body_list_data').html(li);
}

$(document).ready(function(){
  prepareShowPost();

});


$(document).on('click','.btnSaveContent',function(){
  var sendData={};

 
  sendData['type']='1';
 
  sendData['path']=pageData['path'];
  sendData['file']=pageData['file'];
  sendData['theme_name']=pageData['theme_name'];
  sendData['content']=$('.file_content').val().trim();
 
  postData(API_URL+'save_theme_file_content', sendData).then(data => {
    // console.log(data); // JSON data parsed by `data.json()` call

    showAlertOK('','Done!');
  });  

});


     
</script>