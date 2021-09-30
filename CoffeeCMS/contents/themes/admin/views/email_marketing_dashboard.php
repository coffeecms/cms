
<link href="<?php echo SITE_URL; ?>public/apexcharts-bundle/dist/apexcharts.css" rel="stylesheet" type="text/css" /> 
<script src="<?php echo SITE_URL; ?>public/apexcharts-bundle/dist/apexcharts.min.js"></script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo get_text_by_lang('Email Marketing Dashboard','admin');?></h1>
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
                <span class="info-box-text"><?php echo get_text_by_lang('Jobs','admin');?></span>
                <span class="info-box-number Jobs_stats">
                  0
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-file"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><?php echo get_text_by_lang('Groups','admin');?></span>
                <span class="info-box-number Groups_stats">0</span>
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
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-file-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><?php echo get_text_by_lang('Emails','admin');?></span>
                <span class="info-box-number Emails_stats">0</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-comment-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><?php echo get_text_by_lang('UnSubscrible','admin');?></span>
                <span class="info-box-number UnSubscrible_stats">0</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->  

        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-folder"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><?php echo get_text_by_lang('Sended','admin');?></span>
                <span class="info-box-number Sended_stats">
                  0
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-link"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><?php echo get_text_by_lang('Not send','admin');?></span>
                <span class="info-box-number NotSend_stats">0</span>
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
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-image"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><?php echo get_text_by_lang('Readed','admin');?></span>
                <span class="info-box-number Readed_stats">0</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-eye"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><?php echo get_text_by_lang('NotRead','admin');?></span>
                <span class="info-box-number NotRead_stats">0</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->  

        <!-- Info boxes -->
        <div class="row">
          <div class="col-lg-12">
                    <!-- Info boxes -->
                    <div class="row">
                                <div class="col-lg-12">
                                <form action="" method="post" enctype="multipart/form-data">

                                <div class="card" style='margin-top:20px;'>
                        <div class="card-header border-0">
                            <h3 class="card-title"><?php echo get_text_by_lang('30 Days Stats','admin');?></h3>
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
pageData['total_data']=<?php echo json_encode($total_data);?>;
pageData['send_data']=<?php echo json_encode($send_data);?>;
pageData['read_data']=<?php echo json_encode($read_data);?>;


function prepareChart1_1()
{

    var listMonth=[];
    var listMonth=[];
    var listLabels=[];
    var listSended=[];
    var listReaded=[];

    var theStartDate=moment().add('days',-31).format('YYYY-MM-DD');

    var totalSend=pageData['send_data'].length;
    var totalRead=pageData['read_data'].length;

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
            if(moment(theStartDate,'YYYY-MM-DD').add('days',i).format('DD/MM')==moment(pageData['send_data'][k]['work_date'],'YYYY-MM-DD').format('DD/MM'))
            {
                listSended.push(pageData['send_data'][k]['total_sended']);
                isPush=true;

                break;
            }
            
        }

        if(isPush==false)
        {
            listSended.push(0);
        }

        isPush=false;
        for (var k = 0; k < totalRead; k++) {
            if(parseInt(moment(theStartDate,'YYYY-MM-DD').add('days',i).format('DD/MM'))==parseInt(moment(pageData['read_data'][k]['work_date'],'YYYY-MM-DD').format('DD/MM')))
            {
                listReaded.push(pageData['read_data'][k]['total_sended']);
                isPush=true;

                break;
            }
            
        }

        if(isPush==false)
        {
            listReaded.push(0);
        }
    }

// console.log(listSended);
// console.log(listReaded);
//     return ;
    var options = {
        colors: ['#40B8E8', '#EE5E2C'],
        series: [
        {
            name: 'Send',
            type: 'column',
            data: listSended
        }, 
        {
            name: 'Read',
            type: 'column',
            data: listReaded
        }
                ],
        chart: {
        height: 350,
        type: 'line',
      },
      stroke: {
        width: [2, 2]
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
          text: 'Total',
        },
      
      }, ]
      };

      $("#chart_1_1").html('');
      var chart = new ApexCharts(document.querySelector("#chart_1_1"), options);
      chart.render();

      
    
}


function TotalStats()
{
  var total=pageData['total_data'].length;

  var target='';

  for (var i = 0; i < total; i++) {
    target=pageData['total_data'][i]['TargetCol']+'_stats';

    $('.'+target).html(pageData['total_data'][i]['Total']);
    
  }
}


$(document).ready(function(){
  TotalStats();

  prepareChart1_1();
});


</script>