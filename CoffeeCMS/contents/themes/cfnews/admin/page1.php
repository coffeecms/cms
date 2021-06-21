
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
                <h3 class="card-title">Basic theme admin page 1</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm btn-add-group" title="Add new" style='font-size:18pt;'>
                    <i class="fas fa-plus-square"></i>
                  </a>
                 
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-hover table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Date</th>
                    <th>User</th>
                    <th>Content</th>
                    <th class='text-right'>Actions</th>
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
    li+='<td>'+pageData['theList'][i]['group_c']+'</td>';
    li+='<td>'+pageData['theList'][i]['title']+'</td>';
    li+='<td class="text-right">'+pageData['theList'][i]['Total']+'</td>';
    li+='<td class="text-right">';
    li+='<span class="edit-group" style="cursor:pointer;margin-right:10px;"><i class="fas fa-edit"></i></span>';
    li+='<span class="delete-group" style="cursor:pointer;"><i class="fas fa-trash"></i></span>';
    li+='</td>';
    li+='</tr> ';
  }

  $('.the-list').html(li);
}

masterDB['media_selected_callback']=function(theMediaUrl){
    console.log('Added...'+theMediaUrl);
    $('.txtThumbnail').val(theMediaUrl);
};

    $(document).ready(function(){

        prepareShowData();
      $('.select2js').select2();

    });

    $(document).on('click','.btnSaveAdd',function(){
      var sendData={};

      sendData['title']=$('.title').val().trim();
      sendData['parentid']=$('.parentid > option:selected').val().trim();
      sendData['descriptions']=$('.descriptions').val().trim();
      sendData['keywords']=$('.keywords').val().trim();
      sendData['thumbnail']=$('.txtThumbnail').val();
      sendData['type']='1';

      postData(API_URL+'add_new_category', sendData).then(data => {
        console.log(data); // JSON data parsed by `data.json()` call
        // console.log(data['error']);
        $('.txtThumbnail').val('');
        showAlertOK('','Add new category successfull!');
        $('#modalAddnew').modal('hide');
      });      
        
    });
    $(document).on('click','.btnSaveEdit',function(){
      var sendData={};

      sendData['category_c']=$('.edit-category_c').val();
      sendData['title']=$('.edit-title').val().trim();
      sendData['parentid']=$('.edit-parentid > option:selected').val().trim();
      sendData['descriptions']=$('.edit-descriptions').val().trim();
      sendData['keywords']=$('.edit-keywords').val().trim();
      sendData['thumbnail']=$('.txtThumbnail').val();
      sendData['type']='1';

      postData(API_URL+'update_category', sendData).then(data => {
        console.log(data); // JSON data parsed by `data.json()` call
        console.log(data['error']);
        $('.txtThumbnail').val('');
        showAlertOK('','Save changes successfull!');
        $('#modalEdit').modal('hide');
      });      
        
    });

    $(document).on('click','.btn-select-thumbnail',function(){
      showListMedia();  
        
    });

    $(document).on('click','.btn-sort-up',function(){
      var sendData={};

      sendData['category_c']=$(this).attr('data-id');
      sendData['type']='1';

      postData(API_URL+'category_sort_up', sendData).then(data => {
        console.log(data); // JSON data parsed by `data.json()` call

        location.href=location.href;
      });            
        
    });

    $(document).on('click','.btn-sort-down',function(){
      var sendData={};

      sendData['category_c']=$(this).attr('data-id');
      sendData['type']='1';

      postData(API_URL+'category_sort_down', sendData).then(data => {
        console.log(data); // JSON data parsed by `data.json()` call

        location.href=location.href;
      });            
        
    });
    
    $(document).on('click','.td-category',function(){
      var sendData={};

      sendData['category_c']=$(this).attr('data-id');
      sendData['type']='1';

      $('.edit-category_c').val(sendData['category_c']);

      postData(API_URL+'load_category_data', sendData).then(data => {
        console.log(data); // JSON data parsed by `data.json()` call


        $('.edit-title').val(data['data']['title']);
        $('.edit-keywords').val(data['data']['keywords']);
        $('.edit-descriptions').val(data['data']['descriptions']);
        $('.edit-parentid').val(data['data']['parent_category_c']).trigger('change');
        
        //modalEdit
        $('#modalEdit').modal({backdrop:'static',keyboard:false});
      });            
        
    });

    $(document).on('click','.btnAddNew',function(){
      $('#modalAddnew').modal({backdrop:'static',keyboard:false});
    });

       
</script>