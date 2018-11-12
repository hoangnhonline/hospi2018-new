<?php $UriSegment = $this->uri->segment(1); ?>
<div class="row form-group">
  <!-- BEGIN ICON BUTTONS SET-->
  <?php if($canQuickBook){ ?>
  <div class="col-xs-6 col-sm-6 col-md-2">
    <button data-toggle="modal" data-target="#quickbook" class="btn btn-danger btn-block">
      <div class="h5"><i class="fa fa-dashboard fa-lg"></i> Đặt nhanh</div>
    </button>
  </div>
  <?php } ?>
  <div class="col-xs-6 col-sm-6 col-md-2">
    <form action="<?php echo base_url().$this->uri->segment(1); ?>/bookings/" method="post">
      <button type="submit" class="btn btn-primary btn-block">
        <div class="h5"><i class="fa fa-bar-chart-o fa-lg"></i> Bookings</div>
      </button>
    </form>
  </div>
  <?php if($isadmin){ ?>
  <div class="col-xs-6 col-sm-6 col-md-2">
    <form action="<?php echo base_url(); ?>admin/cms/" method="post">
      <button type="submit" class="btn btn-info btn-block">
        <div class="h5"><i class="fa fa-list-alt fa-lg"></i> &nbsp; CMS Pages</div>
      </button>
    </form>
  </div>
  <?php if($blogenabled){ ?>
  <div class="col-xs-6 col-sm-6 col-md-2">
    <form action="<?php echo base_url(); ?>admin/blog/" method="post">
      <button type="submit" class="btn btn-success btn-block">
        <div class="h5"><i class="glyphicon glyphicon-th-large fa-lg"></i> Blog</div>
      </button>
    </form>
  </div>
  <?php } if($newsletterEnabled){ ?>
  <div class="col-xs-6 col-sm-6 col-md-2">
    <form action="<?php echo base_url(); ?>admin/newsletter/" method="post">
      <button type="submit" role="button" class="btn btn-warning btn-block">
        <div class="h5"><i class="fa fa-envelope fa-lg"></i> Send Newsletter</div>
      </button>
    </form>
  </div>
  <?php } ?>
  <div class="col-xs-6 col-sm-6 col-md-2">
    <form action="<?php echo base_url(); ?>admin/backup/" method="post">
      <button type="submit" role="button" class="btn btn-default btn-block">
        <div class="h5"><i class="fa fa-inbox fa-lg"></i> Backup Databse</div>
      </button>
    </form>
  </div>
  <?php } ?>
  <!-- END ICON BUTTONS SET-->
</div>

<!-- Reports section -->
<?php if(!empty($isadmin)){ ?>

<div class="row">
  <div class="col-md-8">
    <div class="panel panel-default">
      <div class="panel-heading">Sơ đồ doanh thu </div>
      <div class="panel-body">
        <style>
          .rev-but { padding: 8px 16px; background-color:#f7f7f7; }
          .rev-bg { background-color:#f9f9f9;border-radius:5px }
          .pad8 { padding: 8px; }
          .pad8 h4 { margin-bottom: 5px; }
          .pad8 p { color: #8e8e8e }
          .mlr0 { padding-right: 0px; padding-left: 0px; }
          .mtb10 { margin-top: 15px;margin-bottom: 15px; }
          .mtb04 { margin-top: 0px;margin-bottom: 5px; }
          .mb0 { margin-bottom: 0px; }
          .tempStatBox {
          width: 120px;
          -webkit-box-sizing: content-box;
          -moz-box-sizing: content-box;
          box-sizing: content-box;
          margin: 0 auto;
          }
          .tempStatBox .tempStat {
          position: relative;
          font-size: 27px;
          line-height: 80px;
          -webkit-border-radius: 50em;
          -moz-border-radius: 50em;
          border-radius: 50em;
          border: 10px solid #FFF;
          background: #f9f9f9;
          height: 80px;
          width: 80px;
          text-align: center;
          margin: 0 auto;
          -webkit-box-sizing: content-box;
          -moz-box-sizing: content-box;
          box-sizing: content-box;
          }
          .tempStatBox .tempStat:before {
          content: "";
          top: -10px;
          left: -10px;
          height: 100px;
          width: 100px;
          position: absolute;
          -webkit-border-radius: 50em;
          -moz-border-radius: 50em;
          border-radius: 50em;
          background: transparent;
          -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,0.3),0px 1px 0 #fff;
          -moz-box-shadow: inset 0 1px 1px rgba(0,0,0,0.3),0px 1px 0 #fff;
          box-shadow: inset 0 1px 1px rgba(0,0,0,0.3),0px 1px 0 #fff;
          -webkit-box-sizing: content-box;
          -moz-box-sizing: content-box;
          box-sizing: content-box;
          }
        </style>
        <div class="row">
          <div class="col-md-12">
            <div id="container" style="min-width: 310px; height: 335px; margin: 0 auto"></div>
          </div>
          <!-- Line Chart JS -->
          <script type="text/javascript">
            $(function () {
                $('#container').highcharts({
                    title: {
                        text: 'Thống kê 30 ngày cuối',
                        x: -20 //center
                    },
                    xAxis: {
                        categories: <?php echo json_encode($graphReport['days']); ?>
                    },
                    yAxis: {
                        title: {
                            text: 'Số tiền Booking'
                        },
                     min: 0,
                        plotLines: [{
                            value: 0,
                            width: 1,
                            color: '#808080'
                        }]
                    },
                    tooltip: {
                        valueSuffix: ' <?php echo $currCode; ?>'
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle',
                        borderWidth: 0
                    },
                    series: <?php echo $resArray;?>
                });
            });
          </script>
          <!-- End Line Chart JS -->
          <div class="col-md-4">
            <div class="block">
              <div class="panel panel-default mb0">
                <div class="pad8">
                  <button class="btn btn-default btn-block rev-but">
                  Hôm nay
                  </button>
                  <div class="pad8 text-center">
                    <h4><strong><?php echo $currCode;?> <?php echo number_format($todayPaid->totalPaidAmount + $todayExpedia->totalAmount);?></strong></h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="block">
              <div class="panel panel-default mb0">
                <div class="pad8">
                  <button class="btn btn-default btn-block rev-but">
                  30 ngày cuối
                  </button>
                  <div class="pad8 text-center">
                    <h4><strong><?php echo $currCode;?> <?php echo number_format($thirtyDaysPaid->totalPaidAmount + $thirtyDaysExpedia->totalAmount);?></strong></h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="block">
              <div class="panel panel-default mb0">
                <div class="pad8">
                  <button class="btn btn-default btn-block rev-but">
                  90 ngày cuối
                  </button>
                  <div class="pad8 text-center">
                    <h4><strong><?php echo $currCode;?> <?php echo number_format($nintyDaysPaid->totalPaidAmount + $nintyDaysExpedia->totalAmount);?></strong></h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="panel panel-default">
      <div class="panel-heading">Tóm lược booking </div>
      <div class="panel-body">
        <div class="block">
          <div class="pad8 rev-bg">
            <div class="col-md-5 row col-sm-5">
              <div class="tempStatBox" style="margin-left:-10px;" >
                <div class="tempStat" style="border-color: rgb(0, 204, 51);"><?php echo $today->totalCount + $todayExpedia->totalCount;?></div>
              </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-7">
              <div class="text-left">
                <h4><strong>Hôm nay</strong></h4>
                <p>Hôm qua : <?php echo $yesterday->totalCount + $yesterdayExpedia->totalCount ;?></p>
                <hr class="mtb04">
                <span class="text-success"><strong>Đã thanh toán :</strong> <?php echo number_format($today->paidAmount + $todayExpedia->paidAmount);?></span>
                <div class="clearfix"></div>
                <span class="text-danger"><strong>Chưa thanh toán :</strong> <?php echo number_format($today->unpaidAmount);?></span>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
        <div class="clearfix"></div>
        <hr class="mtb10">
        <div class="clearfix"></div>
        <div class="block">
          <div class="pad8 rev-bg">
            <div class="col-md-5 row col-sm-5">
              <div class="tempStatBox" style="margin-left:-10px;" >
                <div class="tempStat" style="border-color: rgb(255, 153, 51);"><?php echo $thirtyDays->totalCount + $thirtyDaysExpedia->totalCount;;?></div>
              </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-7">
              <div class="text-left">
                <h4><strong>30 ngày trước</strong></h4>
                <p>60 ngày trước : <?php echo $sixtyDays->totalCount + $sixtyDaysExpedia->totalCount;?></p>
                <hr class="mtb04">
                <span class="text-success"><strong>Đã thanh toán :</strong> <?php echo number_format($thirtyDays->paidAmount + $thirtyDaysExpedia->paidAmount);?></span>
                <div class="clearfix"></div>
                <span class="text-danger"><strong>Chưa thanh toán :</strong> <?php echo number_format($thirtyDays->unpaidAmount);?></span>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
        <div class="clearfix"></div>
        <hr class="mtb10">
        <div class="clearfix"></div>
        <div class="block hidden-md hiddin-sm hidden-xs">
          <div class="pad8 rev-bg">
            <div class="col-md-5 row col-sm-5">
              <div class="tempStatBox" style="margin-left:-10px;" >
                <div class="tempStat" style="border-color: rgb(204, 0, 51);"><?php echo $nintyDays->totalCount + $nintyDaysExpedia->totalCount;?></div>
              </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-7">
              <div class="text-left">
                <h4><strong>90 ngày trước</strong></h4>
                <p>180 ngày trước : <?php echo $oneEightyDays->totalCount + $oneEightyDaysExpedia->totalCount;?></p>
                <hr class="mtb04">
                <span class="text-success"><strong>Đã thanh toán :</strong> <?php echo number_format($nintyDays->paidAmount + $nintyDaysExpedia->paidAmount);?></span>
                <div class="clearfix"></div>
                <span class="text-danger"><strong>Chưa thanh toán :</strong> <?php echo number_format($nintyDays->unpaidAmount);?></span>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  <hr>
</div>

<?php } ?>
<!-- Reports section -->


<!-- Bookings gần đây -->
<?php if(pt_permissions('booking',@$userloggedin)){ ?>
<?php  echo modules::run($UriSegment.'/bookings/dashboardBookings'); ?>
<?php } ?>
<!--Bookings gần đây -->

<!-- Expedia Bookings gần đây -->
<?php if(!empty($isadmin)){ $chkExpedia = $chklib->is_mod_available_enabled("ean");
 if($chkExpedia){ echo modules::run('ean/eanback/dashboardBookings'); } } ?>
<!--Expedia Bookings gần đây -->
<div class="row">
  <div class="col-md-12">
    <?php if(!empty($isadmin)){ ?>
    <div class="panel panel-default">
      <div class="panel-heading">
       <div class="pull-left"> <span class="fa fa-bar-chart-o"></span> Thống kê truy cập <?php echo date('m/Y', time()); ?></div>
       <div class="pull-right btn btn-xs btn-danger resetChart"> <span class="fa fa-bar-chart-o"></span> Reset sơ đồ </div>
      <div class="clearfix"></div>
     </div>

      <div class="panel-body">
        <br>
        <!-- <canvas id="canvasbar" height="237" width="750"></canvas>-->
        <div id="resgraph" style="min-width: 310px; height: 250px; margin: 0 auto"></div>
      </div>
    </div>
    <?php } ?>
  </div>
</div>
<!---quick booking modal-->
<div class="modal fade" id="quickbook" tabindex="-1" role="dialog" aria-labelledby="ADD_BLOG_CAT" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="<?php echo base_url().$this->uri->segment(1); ?>/quickbooking/" method="GET">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Đặt nhanh</h4>
        </div>
        <div class="modal-body form-horizontal">
          <div class="form-group">
            <label class="col-md-3 control-label" >Áp dụng thuế</label>
            <div class="col-md-4">
              <select name="applytax" class="form-control" id="apply" >
                <option value="yes" >Có</option>
                <option value="no">Không</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label" id="service" >Dịch vụ</label>
            <div class="col-md-4">
              <select required name="service" data-placeholder="Select" class="form-control" id="servicetype" tabindex="1">
                <option value="">-Chọn-</option>
                <?php
                  foreach($quickmodules as $mod):
                    $istrue = $chklib->is_mod_available_enabled($mod);
                     $isintegration = $chklib->is_integration($mod);
                   if($istrue && !$isintegration && !in_array($mod,$chklib->notinclude)){
                     if(pt_permissions($mod,@$userloggedin)){
                  ?>
                <option value="<?php echo $mod;?>"><?php echo ucfirst($mod);?></option>
                <?php } } endforeach; ?>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
          <button type="submit" class="btn btn-primary">Tiếp tục</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- end modal -->
<!-- Charts -->
<script src="<?php echo base_url(); ?>assets/include/highcharts/highcharts.js"></script>
<!-- Charts -->
<script type="text/javascript">
  $(function () {

    $(".resetChart").on("click",function(){
      
  $.alert.open('confirm', 'Bạn chắc chắn muốn reset thống kê truy cập?', function(answer) {
   if(answer == 'yes'){
     
      $.post("<?php echo base_url();?>admin/resetVisits",{isAjax: "yes"},function(resp){
       
       location.reload();
       
      })

    }else{

      return false;
    }

    });

});


          $('#resgraph').highcharts({
                  chart: {
              type: 'column',
               zoomType: 'x'
          },
          title: {
              text: ''
          },
          xAxis: {
            title: {
                  text: "<?php echo date('F', time()); ?>"
              },
            categories: [<?php for($day =1;$day <= $totalDays;$day++){echo $day.","; }?>]
          },
          yAxis: {
              min: 0,
              title: {
                  text: 'Visits'
              },
              stackLabels: {
                  enabled: true,
                  style: {
                      fontWeight: 'bold',
                      color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                  }
              }
          },
          legend: {
              align: 'right',
              x: -70,
              verticalAlign: 'top',
              y: 20,
              floating: true,
              backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
              borderColor: '#CCC',
              borderWidth: 1,
              shadow: false
          },
          tooltip: {
              formatter: function () {
                  return '<b>' + this.x + '</b><br/>' +
                      this.series.name + ': ' + this.y + '<br/>' +
                      'Total: ' + this.point.stackTotal;
              }
          },
          plotOptions: {
              column: {
                  stacking: 'normal',
                  dataLabels: {
                      enabled: false,
                      color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                      style: {
                          textShadow: '0 0 3px black, 0 0 3px black'
                      }
                  }
              }
          },
          series: [{
              name: 'Unique',
              data: [<?php echo implode(",", $uniqueVisits); ?>],
       stack: 'male'
          }, {
              name: 'Total Hits',
              data: [<?php echo implode(",", $totalHits); ?>],
      stack: 'female'
          }]
          });
      });


</script>