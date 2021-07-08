
  <link rel="stylesheet" href="<?php echo SITE_URL; ?>public/admin_theme/plugins/fullcalendar/main.min.css">
  <link rel="stylesheet" href="<?php echo SITE_URL; ?>public/admin_theme/plugins/fullcalendar-daygrid/main.min.css">
  <link rel="stylesheet" href="<?php echo SITE_URL; ?>public/admin_theme/plugins/fullcalendar-timegrid/main.min.css">
  <link rel="stylesheet" href="<?php echo SITE_URL; ?>public/admin_theme/plugins/fullcalendar-bootstrap/main.min.css">
<style>
.datepicker
{
  z-index:99999;
}
</style>
<script src="<?php echo SITE_URL; ?>public/admin_theme/plugins/fullcalendar/main.min.js"></script>
<script src="<?php echo SITE_URL; ?>public/admin_theme/plugins/fullcalendar-daygrid/main.min.js"></script>
<script src="<?php echo SITE_URL; ?>public/admin_theme/plugins/fullcalendar-timegrid/main.min.js"></script>
<script src="<?php echo SITE_URL; ?>public/admin_theme/plugins/fullcalendar-interaction/main.min.js"></script>
<script src="<?php echo SITE_URL; ?>public/admin_theme/plugins/fullcalendar-bootstrap/main.min.js"></script>

<!-- Modal -->
<div class="modal fade" id="modalAddnew" data-backdrop="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo get_text_by_lang('Add new event','admin');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class='row'>
        <div class="col-lg-12">
            
    
        <p>
            <label><strong><?php echo get_text_by_lang('Event','admin');?></strong></label>
            <input type="text" class="form-control input-size-medium add-event" name="send[title]" placeholder="<?php echo get_text_by_lang('Event','admin');?>" id="txtTitle" />
        </p>
    
                    
        </div>
        </div>
        <div class='row'>
        <div class="col-lg-6 col-md-6 col-sm-6 ">
    
        <p>
            <label><strong><?php echo get_text_by_lang('Start date','admin');?></strong></label>
            <input type="text" class="form-control input-size-medium datepicker add-start-date" name="send[title]"  id="txtTitle" />
        </p>
    
                    
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 ">
    
        <p>
            <label><strong><?php echo get_text_by_lang('End date','admin');?></strong></label>
            <input type="text" class="form-control input-size-medium datepicker add-end-date" name="send[title]"  id="txtTitle" />
        </p>
    
                    
        </div>
        </div>

        <div class='row'>
        <div class="col-lg-12">
            
    
        <p>
            <label><strong><?php echo get_text_by_lang('All day','admin');?></strong></label>
            <select class='form-control input-size-medium select2js add-allday'>
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
        </p>
    
                    
        </div>
        </div>

        <div class='row'>
        <div class="col-lg-12">
            
    
        <p>
            <label><strong><?php echo get_text_by_lang('Status','admin');?></strong></label>
            <select class='form-control input-size-medium  add-status'>
                <option value="0">Pending</option>
                <option value="2">Working</option>
                <option value="1">Completed</option>
            </select>
        </p>
    
                    
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btnSaveAdd" ><i class="fas fa-save"></i> <?php echo get_text_by_lang('Add new','admin');?></button>
        <button type="button" class="btn btn-danger " data-dismiss="modal"><i class="fas fa-times"></i> <?php echo get_text_by_lang('Close','admin');?></button>
      </div>
    </div>
  </div>
</div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content" >
      <div class="container-fluid">
        <div class="row">

          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>
  $(function () {


    // ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendarInteraction.Draggable;

    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    var calendar = new Calendar(calendarEl, {
      plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      'themeSystem': 'bootstrap',
      //Random default events
      events    : [
        {
          title          : 'All Day Event',
          start          : new Date(y, m, 1),
          backgroundColor: '#f56954', //red
          borderColor    : '#f56954', //red
          allDay         : true
        },
        {
          title          : 'Long Event',
          start          : new Date(y, m, d - 5),
          end            : new Date(y, m, d - 2),
          backgroundColor: '#f39c12', //yellow
          borderColor    : '#f39c12' //yellow
        },
        {
          title          : 'Meeting',
          start          : new Date(y, m, d, 10, 30),
          allDay         : false,
          backgroundColor: '#0073b7', //Blue
          borderColor    : '#0073b7' //Blue
        },
        {
          title          : 'Lunch',
          start          : new Date(y, m, d, 12, 0),
          end            : new Date(y, m, d, 14, 0),
          allDay         : false,
          backgroundColor: '#00c0ef', //Info (aqua)
          borderColor    : '#00c0ef' //Info (aqua)
        },
        {
          title          : 'Birthday Party',
          start          : new Date(y, m, d + 1, 19, 0),
          end            : new Date(y, m, d + 1, 22, 30),
          allDay         : false,
          backgroundColor: '#00a65a', //Success (green)
          borderColor    : '#00a65a' //Success (green)
        },
        {
          title          : 'Click for Google',
          start          : new Date(y, m, 28),
          end            : new Date(y, m, 29),
          url            : 'http://google.com/',
          backgroundColor: '#3c8dbc', //Primary (light-blue)
          borderColor    : '#3c8dbc' //Primary (light-blue)
        }
      ],
      select: 
      function(start,end){ 
          console.log(start); 
          console.log(end); 
          // var selDate = new Date(start);
          // add your function
      },
      // editable  : true,
         
    });

    calendar.render();
    // $('#calendar').fullCalendar()

  
  })


$(document).ready(function(){
    $('.select2js').select2({
    dropdownParent: $("#modalAddnew")
  });

    
  $('.datepicker').datepicker({
          autoclose: true,
          format: 'mm/dd/yyyy',
    });

    $('.datepicker').val(moment().format('MM/DD/YYYY'));
});

$(document).on('click','.fc-day',function(){
    var day=$(this).attr('data-date');

    pageData['day']=day;

    $('#modalAddnew').modal('show');
});


$(document).on('click','.btnSaveAdd',function(){

  var sendData={};

  sendData['type']='1';

  sendData['event']=$('.add-event').val().trim();

  sendData['start_date']=$('.add-start-date').val().trim();
  sendData['end_date']=$('.add-end-date').val().trim();

  sendData['allday']=$('.add-allday').val().trim();

  sendData['status']=$('.add-status').val().trim();

  if(sendData['event'].length==0)
  {
    showAlert('','Event not allow blank!');return;
  }

  if(sendData['start_date'].length==0)
  {
    showAlert('','Start date not allow blank!');return;
  }

  if(sendData['end_date'].length==0)
  {
    showAlert('','End date not allow blank!');return;
  }

  sendData['start_date']=moment(sendData['start_date'],'MM/DD/YYYY').format('YYYY-MM-DD');
  sendData['end_date']=moment(sendData['end_date'],'MM/DD/YYYY').format('YYYY-MM-DD');

  postData(API_URL+'add_calendar', sendData).then(data => {
    // console.log(data); // JSON data parsed by `data.json()` call
    $('#modalAddnew').modal('hide');
    $('#modalEdit').modal('hide');

    showAlert('','Done!');
  });  
});
     
</script>