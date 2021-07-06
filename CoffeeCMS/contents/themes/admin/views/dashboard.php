

<link href="<?php echo SITE_URL; ?>public/apexcharts-bundle/dist/apexcharts.css" rel="stylesheet" type="text/css" /> 
<script src="<?php echo SITE_URL; ?>public/apexcharts-bundle/dist/apexcharts.min.js"></script>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo get_text_by_lang('Dashboard','admin');?></h1>
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
                <span class="info-box-text"><?php echo get_text_by_lang('Users','admin');?></span>
                <span class="info-box-number User_stats">
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
                <span class="info-box-text"><?php echo get_text_by_lang('Posts','admin');?></span>
                <span class="info-box-number Post_stats">0</span>
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
                <span class="info-box-text"><?php echo get_text_by_lang('Pages','admin');?></span>
                <span class="info-box-number Page_stats">0</span>
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
                <span class="info-box-text"><?php echo get_text_by_lang('Comments','admin');?></span>
                <span class="info-box-number Comment_stats">0</span>
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
                <span class="info-box-text"><?php echo get_text_by_lang('Categories','admin');?></span>
                <span class="info-box-number Categories_stats">
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
                <span class="info-box-text"><?php echo get_text_by_lang('Plugins activated','admin');?></span>
                <span class="info-box-number PluginActivated_stats">0</span>
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
                <span class="info-box-text"><?php echo get_text_by_lang('Theme','admin');?></span>
                <span class="info-box-number"><?php echo Configs::$_['default_theme'];?></span>
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
                <span class="info-box-text"><?php echo get_text_by_lang('Views','admin');?></span>
                <span class="info-box-number PostViews_stats">0</span>
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
                      <div class="col-lg-12">
                      <form action="" method="post" enctype="multipart/form-data">

                      <div class="card" style='margin-top:20px;'>
              <div class="card-header border-0">
                  <h3 class="card-title"><?php echo get_text_by_lang('30 Days Post Views Stats','admin');?></h3>
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
          <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-6 ">
                <form action="" method="post" enctype="multipart/form-data">

                <div class="card" style='margin-top:20px;'>
                  <div class="card-header border-0">
                      <h3 class="card-title"><?php echo get_text_by_lang('User Group Stats','admin');?></h3>
                      <div class="card-tools">
                          
                      
                      </div>
                  </div>
                  <div class="card-body table-responsive p-0" style='overflow:scroll;min-height:450px;max-height:450px;'> 
                    <table class='table table-hover table-strip'>
                      <thead>
                        <tr>
                            <th><strong><?php echo get_text_by_lang('Title','admin');?></strong></th>
                            <th class='text-right'><strong><?php echo get_text_by_lang('Total Users','admin');?></strong></th>
                        </tr>
                      </thead>

                      <tbody class='wrap_top_user_group_stats'>
                                                
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.card -->
            
                </form>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-6 ">
                <form action="" method="post" enctype="multipart/form-data">

                <div class="card" style='margin-top:20px;'>
                  <div class="card-header border-0">
                      <h3 class="card-title"><?php echo get_text_by_lang('Top 50 Popular Posts','admin');?></h3>
                      <div class="card-tools">
                          
                      
                      </div>
                  </div>
                  <div class="card-body table-responsive p-0" style='overflow:scroll;min-height:450px;max-height:450px;'> 
                    <table class='table table-hover table-strip'>
                      <thead>
                        <tr>
                            <th><strong><?php echo get_text_by_lang('Title','admin');?></strong></th>
                            <th class='text-right'><strong><?php echo get_text_by_lang('Views','admin');?></strong></th>
                        </tr>
                      </thead>

                      <tbody class='wrap_top_50_popular_post'>
                                               
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /.card -->
            
                </form>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-6 ">
                <form action="" method="post" enctype="multipart/form-data">

                <div class="card" style='margin-top:20px;'>
                  <div class="card-header border-0">
                      <h3 class="card-title"><?php echo get_text_by_lang('Top 50 Writers','admin');?></h3>
                      <div class="card-tools">
                          
                      
                      </div>
                  </div>
                  <div class="card-body table-responsive p-0" style='overflow:scroll;min-height:450px;max-height:450px;'> 
                    <table class='table table-hover table-strip'>
                      <thead>
                        <tr>
                            <th><strong><?php echo get_text_by_lang('Username','admin');?></strong></th>
                            <th class='text-right'><strong><?php echo get_text_by_lang('Total Posts','admin');?></strong></th>
                        </tr>
                      </thead>

                      <tbody class='wrap_top_50_writers'>
                                              
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
pageData['total_data']=<?php echo json_encode($total_data);?>;
pageData['stats_30days']=<?php echo json_encode($stats_30days);?>;
pageData['top_user_group_stats']=<?php echo json_encode($top_user_group_stats);?>;
pageData['top_50_popular_post']=<?php echo json_encode($top_50_popular_post);?>;
pageData['top_50_writers']=<?php echo json_encode($top_50_writers);?>;


function prepareChart1_1()
{

    var listMonth=[];
    var listMonth=[];
    var listLabels=[];
    var listSended=[];
    var listReaded=[];
    var listVal=[];

    var theStartDate=moment().add('days',-31).format('YYYY-MM-DD');

    var totalSend=pageData['stats_30days'].length;

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
            if(moment(theStartDate,'YYYY-MM-DD').add('days',i).format('DD/MM')==moment(pageData['stats_30days'][k]['work_date'],'YYYY-MM-DD').format('DD/MM'))
            {
                listVal.push(pageData['stats_30days'][k]['total']);
                isPush=true;

                break;
            }
            
        }

        if(isPush==false)
        {
            listVal.push(0);
        }

    }

// console.log(listSended);
// console.log(listReaded);
//     return ;
    var options = {
        colors: ['#40B8E8'],
        series: [
        {
            name: 'Views',
            type: 'column',
            data: listVal
        }
                ],
        chart: {
        height: 350,
        type: 'line',
      },
      stroke: {
        width: [2]
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
  var li='';

  for (var i = 0; i < total; i++) {
    target=pageData['total_data'][i]['TargetCol']+'_stats';

    $('.'+target).html(pageData['total_data'][i]['Total']);
    
  }

  li='';

  total=pageData['top_user_group_stats'].length;

  for (var i = 0; i < total; i++) {
      li+='<tr>';
      li+='<td><span>'+pageData['top_user_group_stats'][i]['title']+'</span></td>';
      li+='<td class="text-right"><span>'+pageData['top_user_group_stats'][i]['total_users']+'</span></td>';
      li+='</tr> ';
  }

  $('.wrap_top_user_group_stats').html(li);

  li='';

  total=pageData['top_50_popular_post'].length;

  for (var i = 0; i < total; i++) {
      li+='<tr>';
      li+='<td><span>'+pageData['top_50_popular_post'][i]['title']+'</span></td>';
      li+='<td class="text-right"><span>'+pageData['top_50_popular_post'][i]['views']+'</span></td>';
      li+='</tr> ';
  }

  $('.wrap_top_50_popular_post').html(li);

  li='';

  total=pageData['top_50_writers'].length;

  for (var i = 0; i < total; i++) {
      li+='<tr>';
      li+='<td><span>'+pageData['top_50_writers'][i]['username']+'</span></td>';
      li+='<td class="text-right"><span>'+pageData['top_50_writers'][i]['total_post']+'</span></td>';
      li+='</tr> ';
  }

  $('.wrap_top_50_writers').html(li);

}


$(document).ready(function(){
  TotalStats();

  prepareChart1_1();


});


</script>