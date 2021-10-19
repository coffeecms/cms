

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row" >
                    <div class="col-lg-12">
                    <form action="" method="post" enctype="multipart/form-data">

                    <div class="card" style='margin-top:20px;'>
              <div class="card-header border-0">
                <h3 class="card-title"><?php echo get_text_by_lang('Plugins','admin');?></h3>
                <div class="card-tools">
                  <!-- <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-bars"></i>
                  </a> -->
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table  table-valign-middle">
                  <thead>
                  <tr>
                   
                    <th><?php echo get_text_by_lang('Name','admin');?></th>
                    <th><?php echo get_text_by_lang('Descriptions','admin');?></th>
                  </tr>
                  </thead>
                  <tbody class='tbody-list'>
                  
                 
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
                  
                    </form>
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
    pageData['listInstalled']=<?php echo json_encode($listInstalled);?>;

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
    if(typeof pageData['listInstalledByKey'][pageData['listInstalled'][i]['plugin_dir']]=='undefined')
    {
      pageData['listInstalled'][i]['plugin_dir']=pageData['listInstalled'][i]['plugin_dir'].toLowerCase();

      pageData['listInstalledByKey'][pageData['listInstalled'][i]['plugin_dir']]={};

      pageData['listInstalledByKey'][pageData['listInstalled'][i]['plugin_dir']]=pageData['listInstalled'][i];
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

  $('.tbody-list').html('');

  for (var i = 0; i < total; i++) {

    pageData['theList'][i]['dir']=pageData['theList'][i]['dir'].toLowerCase();
    li+='<tr>';
      li+='<td style="min-width:320px;">';
      li+='<span style="display:block;margin-bottom:10px;">'+pageData['theList'][i]['title']+'</span>';

      if(typeof pageData['listInstalledByKey'][pageData['theList'][i]['dir']]!='undefined')
      {
        if(pageData['theList'][i]['setting_file']=='yes')
        {
          li+='<a title="Setting" href="'+SITE_URL+'admin/plugin_page_url?plugin='+pageData['theList'][i]['dir']+'&page=setting" class="pointer " style="color:blue;font-size: 10pt;margin-right:10px;" data-dir="'+pageData['theList'][i]['dir']+'">Setting</a>';
        }

        li+='<span title="Deactivate" class="pointer change-status-plugin deactivate-plugin" style="color:red;font-size: 10pt;" data-dir="'+pageData['theList'][i]['dir']+'">Deactivate</span>';

      }
      else
      {
        if(pageData['theList'][i]['install_file']=='yes')
        {
          li+='<a href="'+SITE_URL+'admin/plugin_page_url?plugin='+pageData['theList'][i]['dir']+'&page=install" class="pointer " style="color:blue;font-size: 10pt;" data-dir="'+pageData['theList'][i]['dir']+'">Activate</a>';
        }
        else
        {
          li+='<span class="pointer change-status-plugin activate-plugin" style="color:blue;font-size: 10pt;" data-dir="'+pageData['theList'][i]['dir']+'">Activate</span>';
        }

        // li+='<span class="pointer change-status-plugin deactivate-plugin" style="margin-left:10px;color:red;font-size: 10pt;" data-dir="'+pageData['theList'][i]['dir']+'">Force Deactivate</span>';
        
      }

      li+='<a href="'+SITE_URL+'admin/plugin_edit/'+pageData['theList'][i]['dir']+'" class="pointer " style="color:blue;font-size: 10pt;margin-left:10px;" data-dir="'+pageData['theList'][i]['dir']+'">Edit</a>';

      li+='</td>';
      li+='<td>';
      li+='<span style="display:block;margin-bottom:10px;">'+pageData['theList'][i]['descriptions']+'</span>';
      li+='<span class="" style="font-size: 10pt;" data-dir="">Version: '+pageData['theList'][i]['version']+'</span>';                
      li+='<span class="" style="font-size: 10pt;" data-dir=""> - Author:</span>   <a href="'+pageData['theList'][i]['url']+'" style="font-size: 10pt;" data-dir="">'+pageData['theList'][i]['author']+'</a>';                
      li+='</td>';
    li+='</tr>';
  }

  $('.tbody-list').html(li);

}



    $(document).ready(function(){

      prepareShowData();

    });

    
    $(document).on('click','.activate-plugin',function(){
      var sendData={};

      sendData['plugin_name']=$(this).attr('data-dir');
      sendData['type']='1';


      postData(API_URL+'plugin_activate', sendData).then(data => {
        console.log(data); // JSON data parsed by `data.json()` call

        // location.href=location.href;
        location.reload();
      });            
        
    });
    
    $(document).on('click','.deactivate-plugin',function(){
      var sendData={};

      sendData['plugin_name']=$(this).attr('data-dir');
      sendData['type']='1';


      postData(API_URL+'plugin_deactivate', sendData).then(data => {
        // console.log(data); // JSON data parsed by `data.json()` call

        location.reload();
      });            
        
    });

    $(document).on('click','.btnAddNew',function(){
      $('#modalAddnew').modal({backdrop:'static',keyboard:false});
    });

       
</script>