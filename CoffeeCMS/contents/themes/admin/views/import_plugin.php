
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
                <h3 class="card-title">Import Plugin</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm btnAddNew">
                    <i class="fas fa-plus"></i>
                  </a>
                 
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                
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
    pageData['listCat']=[];

</script>

<script type="text/javascript">
pageData['attach_files']=[];

pageData['attach_files_upload_status']=0;


function attach_files_upload_check()
  {
    if(parseInt(masterDB['media_upload_status'])!=2)
    {
      // console.log('Checking...');
      setTimeout(() => {
        attach_files_upload_check();
      }, 200);
    }
    else if(parseInt(masterDB['media_upload_status'])==2)
    {
      // Upload completed
      pageData['attach_files_upload_status']=2;
      pageData['attach_files']=masterDB['media_list'];
      // console.log(masterDB['media_list']);return false;

      var files='';

      var total=pageData['attach_files'].length;

      for (let i = 0; i < total; i++) {
        files+=pageData['attach_files'][i]+'|||';
      }

      var sendData={};

      sendData['list_files']=files;
    
      sendData['type']='1';

      postData(API_URL+'import_plugin', sendData).then(data => {
        console.log(data); // JSON data parsed by `data.json()` call
        // console.log(data['error']);
        if(data['error']=='yes')
        {
          showAlert('','Import plugin error!')
        }
        else
        {
          showAlertOK('',data['data']);
        }
        
      });        
      return false;
    }

  }

  $(document).on('change','.fileMedias',function(){
    masterDB['media_list']=[];
    pageData['attach_files']=[];
    // Uploading...
    pageData['attach_files_upload_status']=1;

    attach_files_upload_check();
    // prepareMediaUpload();
  });



   // postData('http://localhost/coffeecms/api/index', { answer: 42 })
 // .then(data => {
  //  console.log(data); // JSON data parsed by `data.json()` call
  //  console.log(data['error']);
  // });


masterDB['media_selected_callback']=function(theMediaUrl){
    console.log('Added...'+theMediaUrl);
    $('.txtThumbnail').val(theMediaUrl);
};

    $(document).ready(function(){


    });


    $(document).on('click','.btnAddNew',function(){
      // $('#modalAddnew').modal({backdrop:'static',keyboard:false});

      $('.showModalMediaManagement').trigger('click');

    });

       
</script>