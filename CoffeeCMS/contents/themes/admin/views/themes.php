

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid" style='padding-top: 20px;'>
        <!-- Info boxes -->
                <!-- row -->
                <div class='row row-themes' style=''>
                  
                </div>
                <!-- row -->
        <!-- /.row -->


        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script>
    pageData['theList']=<?php echo json_encode($theList);?>;
    pageData['listInstalled']=<?php echo json_encode($listInstalled);?>;
    pageData['default_theme']='<?php echo $default_theme;?>';

</script>

<script type="text/javascript">


   // postData('http://localhost/coffeecms/api/index', { answer: 42 })
 // .then(data => {
  //  console.log(data); // JSON data parsed by `data.json()` call
  //  console.log(data['error']);
  // });

function preparelistInstalled()
{
  var total=pageData['listInstalled'].length;

  pageData['listInstalledByKey']={};

  for (var i = 0; i < total; i++) {

    if(typeof pageData['listInstalledByKey'][pageData['listInstalled'][i]['theme_dir']]=='undefined')
    {
      pageData['listInstalled'][i]['theme_dir']=pageData['listInstalled'][i]['theme_dir'].toLowerCase();

      pageData['listInstalledByKey'][pageData['listInstalled'][i]['theme_dir']]={};

      pageData['listInstalledByKey'][pageData['listInstalled'][i]['theme_dir']]=pageData['listInstalled'][i];
    }
  }
}
function prepareShowData()
{
  pageData['listInstalledByKey']={};

  preparelistInstalled();

  var total=pageData['theList'].length;

  var li='';

  var td='';

  $('.row-themes').html('');

  for (var i = 0; i < total; i++) {
//.toLowerCase();
      pageData['theList'][i]['dir']=pageData['theList'][i]['dir'].toLowerCase();

      li+='<div class="col-lg-3 col-md-4 col-sm-6 col-6 ">';
        li+='<div class="card" style="width: 18rem;">';

        li+='<img src="'+SITE_URL+pageData['theList'][i]['thumbnail']+'" class="card-img-top theme-thumbnail" alt="'+pageData['theList'][i]['title']+'">';
        
        li+='<div class="card-body">';
        li+='<h5 class="card-title">'+pageData['theList'][i]['title']+'</h5>';
        li+='<p class="card-text">Version: '+pageData['theList'][i]['version']+'</p>';
        li+='<p class="card-text">'+pageData['theList'][i]['descriptions']+'</p>';

        if(typeof pageData['listInstalledByKey'][pageData['theList'][i]['dir']]!='undefined' || pageData['default_theme']==pageData['theList'][i]['dir'])
        {

          li+='<button class="btn btn-danger btnUninstall" title="Uninstall" data-dir="'+pageData['theList'][i]['dir']+'"><i class="fas fa-trash-alt"></i></button>';

          if(pageData['theList'][i]['setting_file']=='yes')
          {

            li+='<a  href="'+SITE_URL+'admin/theme_page_url?theme='+pageData['theList'][i]['dir']+'&page=setting" class="btn btn-info " title="Setting" style="margin-left:10px;" data-dir="'+pageData['theList'][i]['dir']+'"><i class="fas fa-cogs"></i></a>';
          }
        }
        else
        {
          if(pageData['theList'][i]['install_file']=='yes')
          {
            li+='<a  href="'+SITE_URL+'admin/theme_page_url?theme='+pageData['theList'][i]['dir']+'&page=install" class="btn btn-primary " title="Install" data-dir="'+pageData['theList'][i]['dir']+'"><i class="fas fa-plus-square"></i> Install</a>';
          }
          else
          {
            li+='<button type="button" title="Install" class="btn btn-primary btnInstall" data-dir="'+pageData['theList'][i]['dir']+'"><i class="fas fa-plus-square"></i></button>';
          }          

          // li+='<button class="btn btn-primary btnInstall" data-dir="'+pageData['theList'][i]['dir']+'"><i class="fas fa-plus-square"></i> Install</button>';
        }        

        li+='<a title="Go to author website" href="'+pageData['theList'][i]['url']+'" target="_blank" class="btn btn-info" style="margin-left:10px;"><i class="fas fa-link"></i></a>';
        li+='<a title="Edit" href="'+SITE_URL+'admin/theme_edit/'+pageData['theList'][i]['dir']+'" class="btn btn-info" style="margin-left:10px;"><i class="fas fa-edit"></i></a>';
        li+='</div>';
        li+='</div>';
      li+='</div>';
  }

  $('.row-themes').html(li);

}


    $(document).ready(function(){

     prepareShowData();

    });

    $(document).on('click','.btnInstall',function(){
      var sendData={};

      sendData['theme_name']=$(this).attr('data-dir');
      sendData['type']='1';

      postData(API_URL+'theme_activate', sendData).then(data => {
        // console.log(data); // JSON data parsed by `data.json()` call

        location.href=location.href;
      });            
        
    });
    
    $(document).on('click','.btnUninstall',function(){
      var sendData={};

      sendData['theme_name']=$(this).attr('data-dir');
      sendData['type']='1';

      postData(API_URL+'theme_deactivate', sendData).then(data => {
        // console.log(data); // JSON data parsed by `data.json()` call

        location.href=location.href;
      });            
        
    });

       
</script>