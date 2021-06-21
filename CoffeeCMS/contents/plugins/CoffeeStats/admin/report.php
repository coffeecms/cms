
<?php

$queryStr='';
$db=new Database();

$tracking_id=getGet('tracking_id','');

$queryStr="select * from cs_tracking_data where tracking_id='".$tracking_id."'";

$trackingData=$db->query($queryStr);

$totalActiveNow=$db->query("SELECT count(*) as total FROM cs_visitor_data WHERE upd_dt >= '".date('Y-m-d H:i:s', strtotime("-5 second"))."'");

if(is_array($totalActiveNow) && count($totalActiveNow) > 0)
{
    $totalActiveNow=$totalActiveNow[0]['total'];
}
else
{
    $totalActiveNow=0;
}

$today_visitor=$db->query("SELECT count(*) as total FROM cs_visitor_data WHERE CAST(ent_dt as date) = '".date('Y-m-d')."' group by ip_add");

if(is_array($today_visitor) && count($today_visitor) > 0)
{
    $today_visitor=$today_visitor[0]['total'];
}
else
{
    $today_visitor=0;
}

$today_views=$db->query("SELECT count(*) as total FROM cs_visitor_data WHERE CAST(ent_dt as date) = '".date('Y-m-d')."'");

if(is_array($today_views) && count($today_views) > 0)
{
    $today_views=$today_views[0]['total'];
}
else
{
    $today_views=0;
}

$avg_time=$db->query("SELECT AVG(live_time) as total FROM cs_visitor_data WHERE CAST(ent_dt as date) = '".date('Y-m-d')."'");
if(is_array($avg_time) && count($avg_time) > 0)
{
    $avg_time=$avg_time[0]['total'];
}
else
{
    $avg_time=0;
}


$queryStr=" select CAST(ent_dt as date) as work_date,count(*) as total";
$queryStr.=" from cs_visitor_data";
$queryStr.=" where CAST(ent_dt as date) BETWEEN '".date("Y-m-d", strtotime('-30 days'))."' AND '".date("Y-m-d")."'";
$queryStr.=" group by CAST(ent_dt as date)";
$queryStr.=" order by CAST(ent_dt as date) asc";

$stats_30days=$db->query($queryStr);

?>
<link href="<?php echo SITE_URL; ?>public/apexcharts-bundle/dist/apexcharts.css" rel="stylesheet" type="text/css" /> 
<script src="<?php echo SITE_URL; ?>public/apexcharts-bundle/dist/apexcharts.min.js"></script>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo get_text_by_lang('Tracking ID: '.$trackingData[0]['title'].' Statistics','admin');?></h1>
          </div><!-- /.col -->
      
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
          <div class="col-lg-12">
          <?php coffee_content_hook('admin_panel_dashboard_top');?>
          </div>                   
        </div>
        <!-- /.row -->
        <!-- Info boxes -->
        <div class="row">
    
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><?php echo get_text_by_lang('Active Visitor','admin');?> (<?php echo get_text_by_lang('Right Now','admin');?>)</span>
                <span class="info-box-number User_stats">
                  <?php echo $totalActiveNow;?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-chart-bar"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><?php echo get_text_by_lang('Today Visitor','admin');?></span>
                <span class="info-box-number Post_stats">
                <?php echo $today_visitor;?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-chart-bar"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><?php echo get_text_by_lang('Today Views','admin');?></span>
                <span class="info-box-number Page_stats">
                <?php echo $today_views;?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-chart-bar"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><?php echo get_text_by_lang('AVG time on site','admin');?></span>
                <span class="info-box-number Comment_stats">
                <?php echo $avg_time;?> seconds
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->  

       
        
        <!-- Info boxes -->
          <!-- Info boxes -->
          <div class="row">

          <div class="col-lg-3 col-md-3 col-sm-4  ">
                <p>
                <label><?php echo get_text_by_lang('Start Date','admin');?></label>
                    <input type="text" class="form-control datepicker add-start-date " autofill="off" />  
                
                    </p>
                            
          </div>

          <div class="col-lg-3 col-md-3 col-sm-4  ">
            <p>
            <label><?php echo get_text_by_lang('End Date','admin');?></label>
                <input type="text" class="form-control datepicker add-end-date " autofill="off"  />  
            </p>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-4  ">
            <button type='button' class='btn btn-primary btnShowData' style='margin-top: 30px;'><i class='fas fa-search'></i> <?php echo get_text_by_lang('Show Data','admin');?></button>
          </div>
                      <div class="col-lg-12">
                      <form action="" method="post" enctype="multipart/form-data">

                      <div class="card" style='margin-top:20px;'>
              <div class="card-header border-0">
                  <h3 class="card-title"><?php echo get_text_by_lang('Views Stats By Date','admin');?></h3>
                  <div class="card-tools">
                      
                  
                  </div>
              </div>
              <div class="card-body table-responsive p-0">
                  <div id='chart_1_1'></div>
              </div>
              </div>
              <!-- /.card -->
                  
                      </form>
                      </div>
                      
                  </div>
          <!-- /.row -->
      
        
        <!-- Info boxes -->
          
          <!-- Info boxes -->
          <div class="row">
        

              <div class="col-lg-4 col-md-4 col-sm-4  ">
                <form action="" method="post" enctype="multipart/form-data">

                <div class="card" style='margin-top:20px;'>
                  <div class="card-header border-0">
                      <h3 class="card-title"><?php echo get_text_by_lang('Traffic Sources By Browsers','admin');?></h3>
                      <div class="card-tools">
                          
                      
                      </div>
                  </div>
                  <div class="card-body table-responsive p-0"> 
                    <div id='wrap_chart_4_1'><canvas id="chart_4_1" height="300"></canvas></div>
                    
                  </div>
                </div>
                <!-- /.card -->
            
                </form>
              </div>


              <div class="col-lg-4 col-md-4 col-sm-4  ">
                <form action="" method="post" enctype="multipart/form-data">

                <div class="card" style='margin-top:20px;'>
                  <div class="card-header border-0">
                      <h3 class="card-title"><?php echo get_text_by_lang('Traffic Sources By Operating System','admin');?></h3>
                      <div class="card-tools">
                          
                      
                      </div>
                  </div>
                  <div class="card-body table-responsive p-0"> 
                    <div id='wrap_chart_5_1'><canvas id="chart_5_1" height="300"></canvas></div>
 
                  </div>
                </div>
                <!-- /.card -->
            
                </form>
              </div>

              <div class="col-lg-4 col-md-4 col-sm-4  ">
                <form action="" method="post" enctype="multipart/form-data">

                <div class="card" style='margin-top:20px;'>
                  <div class="card-header border-0">
                      <h3 class="card-title"><?php echo get_text_by_lang('Traffic Sources By Referrers','admin');?></h3>
                      <div class="card-tools">
                          
                      
                      </div>
                  </div>
                  <div class="card-body table-responsive p-0"> 
                    <div id='wrap_chart_6_1'><canvas id="chart_6_1" height="300"></canvas></div>
 
                  </div>
                </div>
                <!-- /.card -->
            
                </form>
              </div>
              
              <div class="col-lg-6 col-md-6 col-sm-6 ">
                <form action="" method="post" enctype="multipart/form-data">

                <div class="card" style='margin-top:20px;'>
                  <div class="card-header border-0">
                      <h3 class="card-title"><?php echo get_text_by_lang('Top 30 Page Views','admin');?></h3>
                      <div class="card-tools">
                          
                      
                      </div>
                  </div>
                  <div class="card-body table-responsive p-0" style='overflow:scroll;min-height:450px;max-height:450px;'> 
                    <table class='table table-hover table-strip'>
                      <thead>
                        <tr>
                            <th><strong><?php echo get_text_by_lang('Post Title','admin');?></strong></th>
                            <th class='text-right'><strong><?php echo get_text_by_lang('Views','admin');?></strong></th>
                        </tr>
                      </thead>

                      <tbody class='wrap_top_page_views'>
                                              
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.card -->
            
                </form>
              </div>   
              
              <div class="col-lg-6 col-md-6 col-sm-6 ">
                <form action="" method="post" enctype="multipart/form-data">

                <div class="card" style='margin-top:20px;'>
                  <div class="card-header border-0">
                      <h3 class="card-title"><?php echo get_text_by_lang('Top 30 Page Referred','admin');?></h3>
                      <div class="card-tools">
                          
                      
                      </div>
                  </div>
                  <div class="card-body table-responsive p-0" style='overflow:scroll;min-height:450px;max-height:450px;'> 
                    <table class='table table-hover table-strip'>
                      <thead>
                        <tr>
                            <th><strong><?php echo get_text_by_lang('Post Title','admin');?></strong></th>
                            <th class='text-right'><strong><?php echo get_text_by_lang('Referrers','admin');?></strong></th>
                        </tr>
                      </thead>

                      <tbody class='wrap_top_page_ref'>
                                              
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

        <!-- Info boxes -->
        <div class="row">
          <div class="col-lg-12">
          <?php coffee_content_hook('admin_panel_dashboard_bottom');?>
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

pageData['colorDB']=['#e74645','#fb7756','#facd60','#fdfa66','#1ac0c6','dfdf','dfdf','dfdf','dfdf','dfdf','dfdf','dfdf','dfdf','dfdf','dfdf','dfdf',];

pageData['views_by_date']=[];

pageData['views_by_months']=[];

pageData['traffic_source_by_os']=[];
pageData['traffic_source_by_browsers']=[];
pageData['traffic_source_by_referrer']=[];
pageData['traffic_source_by_devices']=[];

pageData['referrer_by_date']=[];
pageData['referrer_by_month']=[];


function prepareChart1_1()
{

    var listMonth=[];
    var listMonth=[];
    var listLabels=[];
    var listSended=[];
    var listReaded=[];
    var listVal=[];
    var listViews=[];
    var listVisitors=[];

    var theStartDate=moment().add('days',-31).format('YYYY-MM-DD');

    var totalSend=pageData['views_by_date'].length;

    var isPush=false;

    var totalIPD=0;

    var isPush=false;

    var listDays=[];

    var listDayAdded={};
    

    for (var i = 0; i < 32; i++) {

        if(typeof listDayAdded[moment(theStartDate,'YYYY-MM-DD').add('days',i).format('DD/MM')]!='undefined')
        {
            continue;
        }

        listDayAdded[moment(theStartDate,'YYYY-MM-DD').add('days',i).format('DD/MM')]='';

        listLabels.push(moment(theStartDate,'YYYY-MM-DD').add('days',i).format('DD/MM'));

        isPush=false;
        for (var k = 0; k < totalSend; k++) {
            if(moment(theStartDate,'YYYY-MM-DD').add('days',i).format('DD/MM')==moment(pageData['views_by_date'][k]['work_date'],'YYYY-MM-DD').format('DD/MM'))
            {
                listViews.push(pageData['views_by_date'][k]['total']);
                isPush=true;

                break;
            }
            
        }

        if(isPush==false)
        {
            listViews.push(0);
        }

    }

    totalSend=pageData['visitor_by_date'].length;

    listDayAdded={};
    // listLabels=[];

    for (var i = 0; i < 32; i++) {

        if(typeof listDayAdded[moment(theStartDate,'YYYY-MM-DD').add('days',i).format('DD/MM')]!='undefined')
        {
            continue;
        }

        listDayAdded[moment(theStartDate,'YYYY-MM-DD').add('days',i).format('DD/MM')]='';

        // listLabels.push(moment(theStartDate,'YYYY-MM-DD').add('days',i).format('DD/MM'));

        isPush=false;
        for (var k = 0; k < totalSend; k++) {
            if(moment(theStartDate,'YYYY-MM-DD').add('days',i).format('DD/MM')==moment(pageData['visitor_by_date'][k]['work_date'],'YYYY-MM-DD').format('DD/MM'))
            {
                listVisitors.push(pageData['visitor_by_date'][k]['total']);
                isPush=true;

                break;
            }
            
        }

        if(isPush==false)
        {
            listVisitors.push(0);
        }

    }
    
    var options = {
        colors: ['#40B8E8', '#55B661'],
        series: [{
        name: 'Views',
        type: 'column',
        data: listViews
      }, {
        name: 'Visitors (Unique)',
        type: 'line',
        data: listVisitors
      }],
        chart: {
        height: 350,
        type: 'line',
      },
      stroke: {
        width: [0, 4]
      },
      title: {
        text: ''
      },
      dataLabels: {
        enabled: true,
        enabledOnSeries: [0,1]
      },
      labels: listLabels,
      xaxis: {
        type: 'string'
      },
      yaxis: [{
        title: {
          text: 'Views',
        },
      
      }, {
        opposite: true,
        title: {
          text: 'Visitors'
        }
      }]
      };

      $("#chart_1_1").html('');
      var chart = new ApexCharts(document.querySelector("#chart_1_1"), options);
      chart.render();
    
      prepareChart_4_1();
      prepareChart_5_1();
      prepareChart_6_1();
}

function prepareChart_4_1()
{

   var total=pageData['traffic_source_by_browsers'].length;

   var listLabels=[];
   var listVal=[];
   var listColor=[];

   var listColors=['red','orange','yellow','green','blue','purple'];

   var totalVal=0;

   var randomColor='';

   for (var i = 0; i < total; i++) {

    randomColor = "#000000".replace(/0/g,function(){return (~~(Math.random()*16)).toString(16);});
    // randomColor = listColors[i];

    totalVal=parseInt(totalVal)+parseInt(pageData['traffic_source_by_browsers'][i]['total']);
    listLabels.push(pageData['traffic_source_by_browsers'][i]['browser_title']);
    listVal.push(pageData['traffic_source_by_browsers'][i]['total']);
    listColor.push(randomColor);
       
   }

   const data = {
    labels: listLabels,
    datasets: [
        {
        label: 'Dataset 1',
        data: listVal,
        backgroundColor: listColor,
        }
    ]
    };

   const config = {
    type: 'pie',
    data: data,
    options: {
        responsive: true,
        plugins: {
        legend: {
            position: 'top',
        },
        title: {
            display: false,
            text: 'Chart.js Pie Chart'
        }
        }
    },
    };

   $('.wrap_chart_4_1').html('<canvas id="chart_4_1" height="100"></canvas>');

    ctxCanvas = document.getElementById('chart_4_1');
    ctxCanvas.height=100;
    ctxCanvas = ctxCanvas.getContext('2d');

    var myChart = new Chart(ctxCanvas, config);
    
}

function prepareChart_5_1()
{

   var total=pageData['traffic_source_by_os'].length;

   var listLabels=[];
   var listVal=[];
   var listColor=[];

   var totalVal=0;
   var randomColor='';

   for (var i = 0; i < total; i++) {
    randomColor = "#000000".replace(/0/g,function(){return (~~(Math.random()*16)).toString(16);});
 
    totalVal=parseInt(totalVal)+parseInt(pageData['traffic_source_by_os'][i]['total']);
    listLabels.push(pageData['traffic_source_by_os'][i]['os_title']);
    listVal.push(pageData['traffic_source_by_os'][i]['total']);
    listColor.push(randomColor);
        
   }
    

   const data = {
    labels: listLabels,
    datasets: [
        {
        label: 'Dataset 1',
        data: listVal,
        backgroundColor: listColor,
        }
    ]
    };

   const config = {
    type: 'pie',
    data: data,
    options: {
        responsive: true,
        plugins: {
        legend: {
            position: 'top',
        },
        title: {
            display: false,
            text: 'Chart.js Pie Chart'
        }
        }
    },
    };

   $('.wrap_chart_5_1').html('<canvas id="chart_5_1" ></canvas>');

    ctxCanvas = document.getElementById('chart_5_1');
    ctxCanvas = ctxCanvas.getContext('2d');

    var myChart = new Chart(ctxCanvas, config);
    
}

function prepareChart_6_1()
{

   var total=pageData['traffic_source_by_referrer'].length;

   var listLabels=[];
   var listVal=[];
   var listColor=[];

   var totalVal=0;
   var randomColor='';

   for (var i = 0; i < total; i++) {
    randomColor = "#000000".replace(/0/g,function(){return (~~(Math.random()*16)).toString(16);});
 
    totalVal=parseInt(totalVal)+parseInt(pageData['traffic_source_by_referrer'][i]['total']);
    listLabels.push(pageData['traffic_source_by_referrer'][i]['referrer_site']);
    listVal.push(pageData['traffic_source_by_referrer'][i]['total']);
    listColor.push(randomColor);
        
   }
    

   const data = {
    labels: listLabels,
    datasets: [
        {
        label: 'Dataset 1',
        data: listVal,
        backgroundColor: listColor,
        }
    ]
    };

   const config = {
    type: 'pie',
    data: data,
    options: {
        responsive: true,
        plugins: {
        legend: {
            position: 'top',
        },
        title: {
            display: false,
            text: 'Chart.js Pie Chart'
        }
        }
    },
    };

   $('.wrap_chart_6_1').html('<canvas id="chart_6_1" ></canvas>');

    ctxCanvas = document.getElementById('chart_6_1');
    ctxCanvas = ctxCanvas.getContext('2d');

    var myChart = new Chart(ctxCanvas, config);
}


function preparea_top_page_views_data()
{
  var total=pageData['top_page_views_by_date'].length;

  var li='';

  for (var i = 0; i < total; i++) {
    li+='<tr>';
    li+='<td><span>'+pageData['top_page_views_by_date'][i]['page_url']+'</span></td>';
    li+="<td class='text-right'><span>"+pageData['top_page_views_by_date'][i]['total']+"</span></td>";
    li+='</tr>';
  }

  $('.wrap_top_page_views').html(li);
}


function preparea_top_page_ref_data()
{
  var total=pageData['top_page_ref_by_date'].length;

  var li='';

  for (var i = 0; i < total; i++) {
    li+='<tr>';
    li+='<td><span>'+pageData['top_page_ref_by_date'][i]['page_url']+'</span></td>';
    li+="<td class='text-right'><span>"+pageData['top_page_ref_by_date'][i]['total']+"</span></td>";
    li+='</tr>';
  }

  $('.wrap_top_page_ref').html(li);
}

$(document).ready(function(){

    
    $('.datepicker').datepicker({
          autoclose: true,
          format: 'mm/dd/yyyy',
    });


    $('.datepicker').val(moment().add('days',-30).format('MM/DD/YYYY'));
    $('.add-end-date').val(moment().format('MM/DD/YYYY'));
        
    $('.btnShowData').trigger('click');
//   prepareChart1_1();


});

//btnShowData


$(document).on('click','.btnShowData',function(){
    var sendData={};

    sendData['start_date']=moment($('.add-start-date').val(),'MM/DD/YYYY').format('YYYY-MM-DD');
    sendData['end_date']=moment($('.add-end-date').val(),'MM/DD/YYYY').format('YYYY-MM-DD');

    if(sendData['start_date'].length==0)
    {
      showAlert('','Start date not allow is blank');return false;
    }

    if(sendData['end_date'].length==0)
    {
      showAlert('','End date not allow is blank');return false;
    }

    sendData['type']='1';

    pageData['views_by_date']=[];
    pageData['views_by_months']=[];

    pageData['traffic_source_by_os']=[];
    pageData['traffic_source_by_browsers']=[];
    pageData['traffic_source_by_referrer']=[];
    pageData['traffic_source_by_devices']=[];

    pageData['referrer_by_date']=[];
    pageData['referrer_by_month']=[];
    pageData['top_page_views_by_date']=[];
    pageData['top_page_ref_by_date']=[];

    postData(API_URL+'plugin_api?plugin=CoffeeStats&func=cs_get_views_by_date', sendData).then(data => {
    //   console.log(data); // JSON data parsed by `data.json()` call
      pageData['views_by_date']=data['data']['views_by_date'];
      pageData['visitor_by_date']=data['data']['visitor_by_date'];
    //   pageData['views_by_months']=data['data']['views_by_months'];
    //   pageData['visitor_by_month']=data['data']['visitor_by_month'];
      pageData['traffic_source_by_referrer']=data['data']['traffic_source_by_referrer'];
      pageData['traffic_source_by_browsers']=data['data']['traffic_source_by_browsers'];
      pageData['traffic_source_by_os']=data['data']['traffic_source_by_os'];
      pageData['top_page_ref_by_date']=data['data']['top_page_ref_by_date'];
      pageData['top_page_views_by_date']=data['data']['top_page_views_by_date'];

      prepareChart1_1();
      preparea_top_page_views_data();
      preparea_top_page_ref_data();

    });  
  });

</script>