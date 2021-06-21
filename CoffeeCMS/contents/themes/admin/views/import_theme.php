
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
                <h3 class="card-title">Import Theme</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-bars"></i>
                  </a>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Sales</th>
                    <th>More</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>
                      <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                      Some Product
                    </td>
                    <td>$13 USD</td>
                    <td>
                      <small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i>
                        12%
                      </small>
                      12,000 Sold
                    </td>
                    <td>
                      <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                      Another Product
                    </td>
                    <td>$29 USD</td>
                    <td>
                      <small class="text-warning mr-1">
                        <i class="fas fa-arrow-down"></i>
                        0.5%
                      </small>
                      123,234 Sold
                    </td>
                    <td>
                      <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                      Amazing Product
                    </td>
                    <td>$1,230 USD</td>
                    <td>
                      <small class="text-danger mr-1">
                        <i class="fas fa-arrow-down"></i>
                        3%
                      </small>
                      198 Sold
                    </td>
                    <td>
                      <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                      Perfect Item
                      <span class="badge bg-danger">NEW</span>
                    </td>
                    <td>$199 USD</td>
                    <td>
                      <small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i>
                        63%
                      </small>
                      87 Sold
                    </td>
                    <td>
                      <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
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
    pageData['listCat']=[];

</script>

<script type="text/javascript">


   // postData('http://localhost/coffeecms/api/index', { answer: 42 })
 // .then(data => {
  //  console.log(data); // JSON data parsed by `data.json()` call
  //  console.log(data['error']);
  // });

function prepareShowCategories()
{
  var total=pageData['listCat'].length;

  var li='';

  var td='';

  li+='<option value="">Choose parent category</option>';


  for (var i = 0; i < total; i++) {
    li+='<option value="'+pageData['listCat'][i]['category_c']+'">'+pageData['listCat'][i]['title']+'</option>';

    td+='<tr style="cursor:pointer;">';
    // td+='<td style="width:80px;text-align: left;">';
    // td+='<button class="btn btn-info btn-xs btn-select-all" data-id="'+pageData['listCat'][i]['category_c']+'"  type="button"><i class="fas fa-minus"></i></button>';
    td+='</td>';
    td+='<td class="td-category" data-id="'+pageData['listCat'][i]['category_c']+'">'+pageData['listCat'][i]['title'];
    td+='<span style="display:block;margin-top:5px;margin-bottom:5px;font-size: 9pt;">Descriptions: '+pageData['listCat'][i]['descriptions']+'</span>';
    td+='<span style="display:block;margin-bottom:5px;font-size: 9pt;">Keywords: '+pageData['listCat'][i]['keywords']+'</span>';
    td+='</td>';
    td+='<td style="width:110px;text-align: right;">';
    td+='<button class="btn btn-info btn-sm btn-sort-up" data-id="'+pageData['listCat'][i]['category_c']+'"  type="button"><i class="fas fa-chevron-up"></i></button>&nbsp;';
    td+='<button class="btn btn-info btn-sm btn-sort-down" data-id="'+pageData['listCat'][i]['category_c']+'"  type="button"><i class="fas fa-chevron-down"></i></button>';
    td+='</td>';

    td+='<td style="width:110px;text-align: right;">';

    if(pageData['listCat'][i]['thumbnail']==null || pageData['listCat'][i]['thumbnail'].length==0)
    {
      td+='<button class="btn btn-default btn-sm " data-id="'+pageData['listCat'][i]['category_c']+'"  type="button"><i class="fas fa-image"></i></button>&nbsp;';
    }
    else
    {
      td+='<button class="btn btn-success btn-sm " data-id="'+pageData['listCat'][i]['category_c']+'"  type="button"><i class="fas fa-image"></i></button>&nbsp;';
    }


    td+='</td>';
    td+='</tr>';

  }

  $('.parentid').html(li);
  $('.edit-parentid').html(li);
  $('.list-categories').html(td);
}

masterDB['media_selected_callback']=function(theMediaUrl){
    console.log('Added...'+theMediaUrl);
    $('.txtThumbnail').val(theMediaUrl);
};

    $(document).ready(function(){

      prepareShowCategories();
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