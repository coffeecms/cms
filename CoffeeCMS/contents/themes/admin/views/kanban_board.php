
<!-- Modal -->
<div class="modal fade" id="modalConfirm"  style='z-index:99999;' data-backdrop="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel"><?php echo get_text_by_lang('Alert','admin');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
     
      <p>
        <label><strong><?php echo get_text_by_lang('Are you really do this action','admin');?> ?</strong></label>
      </p> 
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info btnConfirm" ><i class="fas fa-save"></i> <?php echo get_text_by_lang('Confirm','admin');?></button>
        <button type="button" class="btn btn-danger btnCloseAlert" data-dismiss="modal"><i class="fas fa-times"></i> <?php echo get_text_by_lang('Cancel','admin');?></button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalAdd"  style='z-index:99999;' data-backdrop="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel"><?php echo get_text_by_lang('Add column','admin');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
     
      <p>
        <label><strong><?php echo get_text_by_lang('Column name','admin');?></strong></label>
        <input type="text" class="form-control add-colname input-size-medium" name="send[keywords]" placeholder="<?php echo get_text_by_lang('Column name','admin');?>" />
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
<div class="modal fade" id="modalAddNote"  style='z-index:99999;' data-backdrop="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel"><?php echo get_text_by_lang('Add note','admin');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
      
      <p>
        <label><strong><?php echo get_text_by_lang('Note content','admin');?></strong></label>
        <textarea class="form-control add-note-content" maxlength="1000" style='height:150px;'></textarea>
      </p> 
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info btnAddNote" ><i class="fas fa-save"></i> <?php echo get_text_by_lang('Add note','admin');?></button>
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

<!-- Modal -->
<div class="modal fade" id="modalEditNote"  style='z-index:99999;' data-backdrop="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel"><?php echo get_text_by_lang('Edit note','admin');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
      
      <p>
        <label><strong><?php echo get_text_by_lang('Note content','admin');?></strong></label>
        <textarea class="form-control edit-note-content" maxlength="1000" style='height:150px;'></textarea>
      </p> 
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info btnEditNote" ><i class="fas fa-save"></i> <?php echo get_text_by_lang('Save changes','admin');?></button>
        <button type="button" class="btn btn-danger btnCloseAlert" data-dismiss="modal"><i class="fas fa-times"></i> <?php echo get_text_by_lang('Close','admin');?></button>
      </div>
    </div>
  </div>
</div>

<link rel="stylesheet" href="<?php echo base_url();?>/public/jkanban/jkanban.min.css">
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
 </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row" style='padding-top: 10px;'>
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
             
            </div>
            <!-- /.card --> 
            <div class='wrap_kanban_board' style='max-width: 800px;overflow: scroll;overflow-x: auto;overflow-y: auto;'>
              <div id="the_kanban_board"></div>
            </div>         
              
              
          </div>
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script src="<?php echo base_url();?>/public/jkanban/jkanban.js"></script>

<script>
    pageData['project_c']='<?php echo $project_c;?>';
    pageData['theListBoard']=<?php echo json_encode($theListBoard);?>;
    pageData['theListMessage']=<?php echo json_encode($theListMessage);?>;
</script>

<script type="text/javascript">


   // postData('http://localhost/coffeecms/api/index', { answer: 42 })
 // .then(data => {
  //  console.log(data); // JSON data parsed by `data.json()` call
  //  console.log(data['error']);
  // });

$(document).ready(function(){
  $('.pushmenu').trigger('click');

  $('.wrap_kanban_board').css({
    'max-width':$('.card').width()+'px'
  });
  prepareShowBoard();
});

     
</script>

<script>

function move_kanban_board(project_c,board_c,begin_order,end_order)
{
  var sendData={};

  sendData['project_c']=project_c;
  sendData['board_c']=board_c;
  sendData['begin_order']=begin_order;
  sendData['end_order']=end_order;
 
  sendData['type']='1';

  postData(API_URL+'move_kanban_board', sendData).then(data => {
      // console.log(data); // JSON data parsed by `data.json()` call
      // showAlertOK('','Done!');
    });      

}

function move_kanban_board_message(message_id,board_c,begin_order,end_order)
{
  var sendData={};

  sendData['message_id']=message_id;
  sendData['board_c']=board_c;
  sendData['begin_order']=begin_order;
  sendData['end_order']=end_order;
 
  sendData['type']='1';

  postData(API_URL+'move_kanban_board_message', sendData).then(data => {
      // console.log(data); // JSON data parsed by `data.json()` call
      // showAlertOK('','Done!');
    });      

}

function move_kanban_board_message_to_new_board(message_id,new_board_c,before_message_id)
{
  var sendData={};

  sendData['message_id']=message_id;
  sendData['new_board_c']=new_board_c;
  sendData['before_message_id']=before_message_id;
 
  sendData['type']='1';

  postData(API_URL+'move_kanban_board_message_to_new_board', sendData).then(data => {
      // console.log(data); // JSON data parsed by `data.json()` call
      // showAlertOK('','Done!');
    });      

}
  function prepareShowBoard()
  {
    var total=pageData['theListBoard'].length;
    var totalMessage=pageData['theListMessage'].length;

    var listBoard=[];

    var theBoard={};

    for (var i = 0; i < total; i++) {
      theBoard={
        'id':pageData['theListBoard'][i]['board_c'],
        'board_c':pageData['theListBoard'][i]['board_c'],
        'project_c':pageData['theListBoard'][i]['project_c'],
        'title':pageData['theListBoard'][i]['title'],
        'class' : 'info',
        'sort_order' : pageData['theListBoard'][i]['sort_order'],
        'item':[],
      };

      for (var k = 0; k < totalMessage; k++) {
        if(pageData['theListMessage'][k]['board_c']==pageData['theListBoard'][i]['board_c'])
        {
          theBoard['item'].push({
            'title':pageData['theListMessage'][k]['content'],
            'message_id':pageData['theListMessage'][k]['message_id'],
            'board_c':pageData['theListMessage'][k]['board_c'],
            'sort_order':pageData['theListMessage'][k]['sort_order'],
          });
        }
        
      }

      listBoard.push(theBoard);
      
    }

    pageData['kanbanBoard'] = new jKanban({
        element : '#the_kanban_board',
        gutter  : '15px',
        click : function(el){
          console.log('Click on note!');
            //alert(el.innerHTML);
        },
        dragEl           : function (el, source) {
          console.log('dragEl');
          console.log(el);
        },                     // callback when any board's item are dragged
        dragendEl        : function (el) {
          
          console.log('dragendEl');
          // console.log(el);
          var board_c=el.getAttribute('data-board_c');
          var this_message_id=el.getAttribute('data-message_id');

          var thisEl=$('.kanban-item[data-message_id="'+this_message_id+'"]');

          var new_board_c=thisEl.parent().parent('.kanban-board').attr('data-id');

          var new_order=0;

          var new_board_item_index=0;
          var new_board_before_move_item='';
          
          var totalBoardItems=pageData['kanbanBoard'].getBoardElements(new_board_c).length;

          if(parseInt(totalBoardItems)==1)
          {
            new_order=0;
          }
          else
          {

            for (var i = 0; i < totalBoardItems; i++) {
              if(pageData['kanbanBoard'].getBoardElements(new_board_c)[i].getAttribute('data-message_id')==this_message_id)
              {
                new_board_item_index=i;
                break;
              }
            }

            if(typeof pageData['kanbanBoard'].getBoardElements(new_board_c)[new_board_item_index-1]!='undefined')
            {
              new_board_before_move_item=pageData['kanbanBoard'].getBoardElements(new_board_c)[new_board_item_index-1].getAttribute('data-message_id');
            }


          }

          move_kanban_board_message_to_new_board(this_message_id,new_board_c,new_board_before_move_item);

        },                             // callback when any board's item stop drag
        dropEl           : function (el, target, source, sibling) {

          var board_c=el.getAttribute('data-board_c');
          var this_message_id=el.getAttribute('data-message_id');
          var this_message_order=el.getAttribute('data-sort_order');
          var change_message_id='';
          var change_message_order='';

          if(sibling==null)
          {
            change_message_order='99999';
          }
          else
          {
             change_message_id=sibling.getAttribute('data-message_id');
            change_message_order=sibling.getAttribute('data-sort_order');
          }
          console.log('dropEl');
          console.log(el);
          console.log(sibling);
          // console.log(this_message_id);
          // console.log(change_message_id);
          // move_kanban_board_message(this_message_id,board_c,this_message_order,change_message_order);
          
          

        },    // callback when any board's item drop in a board
        dragBoard        : function (el, source) {
          console.log('dragBoard');
          console.log(el);
          pageData['move_board_id']=el.getAttribute('data-id');
          pageData['move_board_project_c']=el.getAttribute('data-project_c');
          pageData['move_board_begin_order']=el.getAttribute('data-order');

        },                     // callback when any board stop drag
        dragendBoard     : function (el) {
          console.log('dragendBoard');
          console.log(el);
          // pageData['move_board_id']=el.getAttribute('data-id');
          pageData['move_board_end_order']=el.getAttribute('data-order');
          //Process change order

          move_kanban_board(pageData['move_board_project_c'],pageData['move_board_id'],pageData['move_board_begin_order'],pageData['move_board_end_order']);
          // console.log(pageData);
        },                             // callback when any board stop drag
        boards  :listBoard
    });
  }


    // var toDoButton = document.getElementById('addToDo');
    // toDoButton.addEventListener('click',function(){
    //   kanban322222.addElement(
    //         '_todo2',
    //         {
    //             'title':'Test Add',
    //         }
    //     );
    // });

    // var removeBoard = document.getElementById('removeBoard');
    // removeBoard.addEventListener('click',function(){
    //   kanban322222.removeBoard('_done2');
    // });


  $(document).on('click','.icon-add-message',function(){
      var board_c=$(this).attr('data-board_c');

      pageData['action_board_c']=board_c;
    pageData['action_name']='add_note';

      $('#modalAddNote').modal({backdrop:'static',keyboard:false});
        

        
  });
  
  $(document).on('click','.icon-delete-board',function(){
      var board_c=$(this).attr('data-board_c');

      pageData['action_board_c']=board_c;
      pageData['action_name']='delete_board';

    $('#modalConfirm').modal({backdrop:'static',keyboard:false});
        
  });

  $(document).on('click','.icon-edit-note',function(){
    var messageid=$(this).attr('data-messageid');

    pageData['action_message_id']=messageid;
    pageData['action_name']='edit_note';

    var total=pageData['theListMessage'].length;

    for (var i = 0; i < total; i++) {
      if(pageData['theListMessage'][i]['message_id']==messageid)
      {
        $('.edit-note-content').val(pageData['theListMessage'][i]['content']);
        break;
      }
    }

    $('#modalEditNote').modal({backdrop:'static',keyboard:false});
        
  });

  $(document).on('click','.btnAddNote',function(){

    
    var sendData={};

    sendData['content']=$('.add-note-content').val().trim();

    if(sendData['content'].length==0)
    {
      showAlert('','Content disallow empty!');return false;
    }

    pageData['action_content']=sendData['content'];
    pageData['action_id']=genNumber(22);

    sendData['board_c']=pageData['action_board_c'];
    sendData['message_id']=pageData['action_id'];
    sendData['type']='1';

    postData(API_URL+'add_new_kanban_board_message', sendData).then(data => {
          // console.log(data); // JSON data parsed by `data.json()` call
          $('#modalAddNote').modal('hide');
          $('#modalEditNote').modal('hide');
          $('#modalConfirm').modal('hide');
          // showAlertOK('','Done!');
          pageData['kanbanBoard'].addElement(pageData['action_board_c'],{'title':pageData['action_content'],'id':pageData['action_id'],'message_id':pageData['action_id'],'board_c':pageData['action_board_c']})

        });      

  });

  $(document).on('click','.btnEditNote',function(){

    
    var sendData={};

    sendData['content']=$('.edit-note-content').val().trim();

    if(sendData['content'].length==0)
    {
      showAlert('','Content disallow empty!');return false;
    }

    sendData['message_id']=pageData['action_message_id'];
    sendData['type']='1';

    postData(API_URL+'update_kanban_board_message', sendData).then(data => {
          // console.log(data); // JSON data parsed by `data.json()` call
          $('#modalEditNote').modal('hide');
          $('#modalConfirm').modal('hide');
          // showAlertOK('','Done!');
        });      

  });

  $(document).on('click','.icon-delete-note',function(){
    var messageid=$(this).attr('data-messageid');
    var board_c=$(this).attr('data-board_c');

    pageData['action_message_id']=messageid;
    pageData['action_board_c']=board_c;
    pageData['action_name']='delete_note';

    $('#modalConfirm').modal({backdrop:'static',keyboard:false});
      
  });

  $(document).on('click','.btn-add-user',function(){
    $('#modalAdd').modal({backdrop:'static',keyboard:false});
  });

  $(document).on('click','.btnConfirm',function(){
      var sendData={};

      if(pageData['action_name']=='delete_note')
      {
        
        sendData['message_id']=pageData['action_message_id'];
        sendData['type']='1';

        postData(API_URL+'delete_kanban_board_message', sendData).then(data => {
          // console.log(data); // JSON data parsed by `data.json()` call
          $('#modalConfirm').modal('hide');

          var totalItem=pageData['kanbanBoard'].getBoardElements(pageData['action_board_c']).length;

          for (var i = 0; i < totalItem; i++) {
            if(pageData['kanbanBoard'].getBoardElements(pageData['action_board_c'])[i].dataset['message_id']==pageData['action_message_id'])
            {
              pageData['kanbanBoard'].getBoardElements(pageData['action_board_c'])[i].remove();
              break;
            }
            
          }
          // showAlertOK('','Done!');
        });          
      }
      else if(pageData['action_name']=='delete_board')
      {
        sendData['board_c']=pageData['action_board_c'];
        sendData['type']='1';

        postData(API_URL+'delete_kanban_board', sendData).then(data => {
          // console.log(data); // JSON data parsed by `data.json()` call
          $('#modalConfirm').modal('hide');

          pageData['kanbanBoard'].removeBoard(pageData['action_board_c']);
          // showAlertOK('','Done!');
        });  
      }

        
  });


  $(document).on('click','.btnAdd',function(){
    var sendData={};

    pageData['new_board_id']=genNumber(12);

    sendData['project_c']=pageData['project_c'];
    sendData['board_c']=pageData['new_board_id'];
    sendData['title']=$('.add-colname').val().trim();
    sendData['type']='1';

    postData(API_URL+'add_new_kanban_board', sendData).then(data => {
      console.log(data); // JSON data parsed by `data.json()` call
      $('.add-colname').val('');
      $('#modalAdd').modal('hide');

      pageData['kanbanBoard'].addBoards(
            [{
                'id' : pageData['new_board_id'],
                'title'  : sendData['title'],
                'class'  : 'info',
                'item'  : []
            }]
        )      
      
    });  
  });

  $(document).on('click','.icon-view-comment-note',function(){
     var message_id=$(this).attr('data-messageid');
    pageData['message_id']=message_id;

    var sendData={};

    sendData['message_id']=pageData['message_id'];
    sendData['type']='1';

    $('.list-note-comments').html('');

    postData(API_URL+'get_list_kanban_board_comment', sendData).then(data => {
      // console.log(data); // JSON data parsed by `data.json()` call
      // $('.add-colname').val('');
      $('#modalAdd').modal('hide');
      $('#modalEdit').modal('hide');


      var total=data['data'].length;

      var li='';

      for (var i = 0; i < total; i++) {
        li+=' <div class="col-lg-12">'+moment(data['data'][i]['ent_dt'],'YYYY-MM-DD HH:mm:ss').format('DD/MM/YYYY HH:mm:ss')+': '+data['data'][i]['content']+'<hr></div>';
      }

      $('.list-note-comments').html(li);

      total=pageData['theListMessage'].length;

      for (var i = 0; i < total; i++) {
        if(pageData['theListMessage'][i]['message_id']==pageData['message_id'])
        {
          $('.view-note-content').html(pageData['theListMessage'][i]['content']);
          break;
        }
      }

      $('#modalViewMessage').modal('show');



      });
     
  });

  $(document).on('click','.btnAddNewComment',function(){
    var sendData={};

    var content=$('.add-note-comment').val().trim();

    if(content.length==0)
    {
      showAlert('','Comment content not allow blank!');
      return false;
    }

    sendData['message_id']=pageData['message_id'];
    sendData['content']=$('.add-note-comment').val().trim();
    sendData['type']='1';

    postData(API_URL+'add_new_kanban_board_comment', sendData).then(data => {
      // console.log(data); // JSON data parsed by `data.json()` call
      // $('.add-colname').val('');

      var content=$('.add-note-comment').val().trim();
      
      var li='';
      li+=' <div class="col-lg-12">'+moment().format('DD/MM/YYYY HH:mm:ss')+': '+content+'<hr></div>';
      $('.list-note-comments').prepend(li);

      $('.add-note-comment').val('');

      // $('.icon-view-comment-note[data-messageid="'+pageData['message_id']+'"]').trigger('click');

    });
     
  });

</script>
