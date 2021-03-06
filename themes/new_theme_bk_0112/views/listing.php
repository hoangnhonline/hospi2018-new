<script type="text/javascript" src="<?php echo $theme_url; ?>plugins/jslider/js/jshashtable-2.1_src.js"></script>
<script type="text/javascript" src="<?php echo $theme_url; ?>plugins/jslider/js/jquery.numberformatter-1.2.3.js"></script>
<script type="text/javascript" src="<?php echo $theme_url; ?>plugins/jslider/js/tmpl.js"></script>
<script type="text/javascript" src="<?php echo $theme_url; ?>plugins/jslider/js/jquery.dependClass-0.1.js"></script>
<script type="text/javascript" src="<?php echo $theme_url; ?>plugins/jslider/js/draggable-0.1.js"></script>
<script type="text/javascript" src="<?php echo $theme_url; ?>plugins/jslider/js/jquery.slider.js"></script>
<link rel="stylesheet" href="<?php echo $theme_url; ?>plugins/jslider/css/jslider.css" type="text/css">
<link rel="stylesheet" href="<?php echo $theme_url; ?>plugins/jslider/css/jslider.round.css" type="text/css">
<div class="listing-search">


<?php if($appModule == "ean"){ ?>
<!-- EAN search form -->
   <form  class="container" action="<?php echo $baseUrl;?>search" method="GET" role="search">
    <div class="col-md-3 col-lg-4 col-sm-12 go-right">
      <div class="form-group">
        <div class="clearfix"></div>
        <label class="control-label go-right"><i class="icon-location-6"></i><?php echo trans('012');?></label>
        <input id="HotelsPlacesEan" name="city"  type="text" class="form-control RTL search-location" placeholder="<?php echo trans('026');?>" value="<?php if(!empty($_GET['city'])){ echo $_GET['city']; }else{ echo $selectedCity; } ?>" required >
      </div>
    </div>
    <div class="col-md-2 col-sm-6 col-xs-6 go-right">
      <div class="form-group">
        <div class="clearfix"></div>
        <label class="control-label go-right size13"><i class="icon-calendar-7"></i> <?php echo trans('07');?></label>
        <input type="text" placeholder=" <?php echo trans('07');?>" name="checkIn" class="dpean1 form-control mySelectCalendar" value="<?php echo $checkin; ?>" required >
      </div>
    </div>
    <div class="col-md-2 col-sm-6 col-xs-6 go-right">
      <div class="form-group">
        <div class="clearfix"></div>
        <label class="control-label go-right size13"><i class="icon-calendar-7"></i> <?php echo trans('09');?></label>
        <input type="text" class="form-control dpean2" placeholder=" <?php echo trans('09');?>" name="checkOut" value="<?php echo $checkout; ?>" required >
      </div>
    </div>
    <div class="col-md-2 col-lg-1 col-sm-6 col-xs-6 go-right">
      <div class="form-group">
        <div class="clearfix"></div>
        <label class="control-label go-right size13" style="white-space:nowrap;"><i class="icon-user-7"></i> <?php echo trans('010');?></label>
        <select class="RTL form-control" placeholder=" <?php echo trans('');?>"  name="adults">
          <?php for($i = 1; $i <= 9; $i++){ if(empty($adults)){ $adults = 2; } ?>
          <option value="<?php echo $i; ?>" <?php if($i == $adults){ echo "selected"; } ?> ><?php echo $i; ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    <div class="hidden-md col-lg-1 col-sm-6 col-xs-6 go-right">
      <div class="form-group">
        <div class="clearfix"></div>
        <label class="control-label go-right size13"><i class="icon-user-7"></i> <?php echo trans('011');?></label>
        <select  class="form-control childcount" placeholder=" <?php echo trans('011');?> " name="child" id="child">
          <option value="">0</option>
          <?php for($j = 1; $j <= 3; $j++ ){ ?>
          <option value="<?php echo $j; ?>" <?php if($j == $child){ echo "selected"; } ?> > <?php echo $j; ?> </option>
          <?php } ?>
        </select>
      </div>
    </div>
    <div class="visible-sm visible-xs">
      <div class="clearfix"></div>
    </div>
    <div class="col-md-3 col-lg-2 col-xs-12 col-sm-12 go-right">
      <div class="form-group">
        <div class="clearfix"></div>
        <input name="search" type="hidden" value="1">
        <input type="hidden" name="childages" id="childages" value="<?php echo $childAges; ?>">
        <button style="font-size: 14px;" type="submit" class="btn btn-block btn-action"><?php echo trans('012');?></button>
      </div>
    </div>
    <div class="clearfix"></div>
  </form>
<?php include 'integrations/ean/ages.php'; ?>
    <script>
    $(function() {
       google.maps.event.addDomListener(window,"load",function(){new google.maps.places.Autocomplete(document.getElementById("HotelsPlacesEan"))});
    });
  </script>

<script type="text/javascript">
  var loading = false;//to prevent duplicate
  function loadNewContent() {

      // get the current cache location and key..
      var moreResultsAvailable = $("#moreResultsAvailable").val();
      var cacheKey = $("#cacheKey").val();
      var cacheLocation = $("#cacheLocation").val();
      var cachePaging = $("#cachePaging").val();
      var checkin = $(".dpean1").val();
      var checkout = $(".dpean2").val();
      var agesappend = $("#agesappendurl").val();
      var adultsCount = $("#adultsCount").val();


      $('#loader_new').html("<div id='rotatingDiv'></div>");
      var url_to_new_content = '<?php echo base_url(); ?>ean/loadMore';

      $.ajax({
          type: 'POST',
          data: {'moreResultsAvailable': moreResultsAvailable, 'cacheKey': cacheKey, 'cacheLocation': cacheLocation, 'checkin': checkin, 'checkout': checkout,'agesappendurl': agesappend,'adultsCount': adultsCount },
          url: url_to_new_content,
          success: function (data) {

              // document.getElementById('loadNewdata').value = 1;

              if (data != "" && data != "404") {
                
                  $('#loader_new').html('');
                  loading = false;


                 // $("#latest_record_para").html(data);

                         var newData = data.split("###");

                    $("#latest_record_para").html(newData[0]);

                    $("#New_data_load").append(newData[1]);
 

              }
              else
              {
                  $('#loader_new').html('');
                  $("#message_noResult").html('');

              }
              //console.log(data);

          }
      });
  }

  //scroll to PAGE's bottom
  var winTop = $(window).scrollTop();
  var docHeight = $(document).height();
  var winHeight = $(window).height();




  $(window).scroll(function () {

      var moreResultsAvailable = $("#moreResultsAvailable").val();
      var foot = $("#footer").offset().top - 500;
      // console.log($(window).scrollTop()+" == "+foot);

      if (moreResultsAvailable != '' && moreResultsAvailable == 1) {

          if ($(window).scrollTop() > foot) {

              if (!loading) {
                  loading = true;
                  loadNewContent();



              }
          }
      }
  });

</script>

<!-- End EAN Search Form -->

<?php }else if($appModule == "offers"){ ?>

<form class="container" action="<?php echo base_url();?>offers/search" method="GET">
      <div class="col-md-3 col-lg-4 col-sm-12 go-right">
         <div class="form-group">
            <div class="clearfix"></div>
            <label class="control-label go-right size13"><i class="icon-location-6"></i> <?php echo trans('0350');?></label>
            <div class="clearfix"></div>
              <input id="" name="searching" type="text" class="RTL form-control form searching" placeholder=" <?php echo trans('0350');?>" value="<?php if(!empty($_GET['searching'])){ echo $_GET['searching']; } ?>">

         </div>
      </div>
      <div class="col-md-2 col-sm-6 col-xs-6 go-right">
         <div class="form-group">
            <div class="clearfix"></div>
          <label class="control-label go-right size13"><i class="icon-calendar-7"></i> <?php echo trans('0273');?></label>
              <input type="text" placeholder=" <?php echo trans('0273');?> " name="dfrom" class="RTL form-control  mySelectCalendar dpd1" value="<?php echo $dfrom; ?>" >
            </div>
      </div>
      <div class="col-md-2 col-sm-6 col-xs-6 go-right">
         <div class="form-group">
            <div class="clearfix"></div>
           <label class="control-label go-right size13"><i class="icon-calendar-7"></i> <?php echo trans('0274');?></label>
              <input type="text" placeholder=" <?php echo trans('0274');?> " name="dto" class="RTL form-control mySelectCalendar dpd2" value="<?php echo $dto; ?>" >
            </div>
      </div>

      <div class="visible-sm visible-xs"><div class="clearfix"></div></div>
      <div class="col-md-5 col-lg-4 col-xs-12 col-sm-12 go-right">

         <div class="form-group">
            <div class="clearfix"></div>
            <label class="control-label">&nbsp;</label>
            <button type="submit" class="btn btn-block btn-primary"><?php echo trans('012');?></button>
         </div>
      </div>
      <div class="clearfix"></div>
   </form>

<?php }else { ?>

  <form class="container" action="<?php echo base_url().$appModule;?>/search" method="GET">
    <?php if($appModule == "cars"){ ?>
    <div class="col-md-3 col-lg-3 col-sm-12 go-right">
      <div class="form-group">
        <div class="clearfix"></div>
        <label class="control-label go-right size13"><i class="icon-location-6"></i> <?php echo trans('0210');?></label>
        <div class="clearfix"></div>
        <select name="pickupLocation" class="chosen-select RTL" id="carlocations" required>
          <option value=""><?php echo trans('0447');?></option>
          <?php foreach($carspickuplocationsList as $locations): ?>
          <option value="<?php echo $locations->id;?>" <?php echo makeSelected($selectedpickupLocation, $locations->id); ?> ><?php echo $locations->name;?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <div class="col-md-3 col-lg-3 col-sm-12 go-right">
      <div class="form-group">
        <div class="clearfix"></div>
        <label class="control-label go-right size13"><i class="icon-location-6"></i> <?php echo trans('0211');?></label>
        <div class="clearfix"></div>
        <select name="dropoffLocation" class="chosen-select RTL" id="carlocations2" required>
          <option value=""><?php echo trans('0447');?></option>
          <?php foreach($carsdropofflocationsList as $locations): ?>
          <option value="<?php echo $locations->id;?>" <?php echo makeSelected($selecteddropoffLocation, $locations->id); ?> ><?php echo $locations->name;?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <div class="col-md-3 col-lg-4 col-sm-6 col-xs-12 go-right">
      <div class="form-group">
        <div class="clearfix"></div>
        <label class="control-label"><i class="icon-calendar-7"></i> <?php echo trans('08');?> <?php echo trans('0259');?></label>
        <div class="dropdown">
          <button data-toggle="modal" data-target="#myModal" class="btn btn-default btn-block" type="button"><span class="datesModal"> <?php echo $modulelib->pickupDate; ?> - <?php echo $modulelib->dropoffDate; ?> </span> &nbsp;&nbsp;<span class="caret"></span></button>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><i class="icon-calendar-7"></i> <?php echo trans('08');?> <?php echo trans('0259');?></h4>
          </div>
          <div class="modal-body">
            <div class="col-md-6 col-sm-6 col-xs-6 go-right">
              <div class="form-group">
                <div class="clearfix"></div>
                <label class="control-label go-right"><i class="icon-calendar-7"></i> <?php echo trans('0210');?> <?php echo trans('08');?></label>
                <input type="text" class="form-control RTL" id="departcar" name="pickupDate" placeholder="<?php echo trans('08');?>" value="<?php echo $modulelib->pickupDate; ?>" required>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6 go-right">
              <div class="form-group">
                <div class="clearfix"></div>
                <label class="control-label go-right"><i class="icon_set_1_icon-38"></i> <?php echo trans('0210');?> <?php echo trans('0259');?></label>
                <select class="form-control" name="pickupTime">
                  <?php foreach($carModTiming as $time){ ?>
                  <option value="<?php echo $time; ?>" <?php makeSelected($modulelib->pickupTime,$time); ?> ><?php echo $time; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6 go-right">
              <div class="form-group">
                <div class="clearfix"></div>
                <label class="control-label go-right"><i class="icon-calendar-7"></i> <?php echo trans('0211');?> <?php echo trans('08');?></label>
                <input type="text" class="form-control RTL" id="returncar" name="dropoffDate" placeholder="<?php echo trans('08');?>" value="<?php echo $modulelib->dropoffDate; ?>" required>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6 go-right">
              <div class="form-group">
                <div class="clearfix"></div>
                <label class="control-label go-right"><i class="icon_set_1_icon-38"></i> <?php echo trans('0211');?> <?php echo trans('0259');?></label>
                <select class="form-control" name="dropoffTime">
                  <?php foreach($carModTiming as $time){ ?>
                  <option value="<?php echo $time; ?>" <?php makeSelected($modulelib->dropoffTime,$time); ?> ><?php echo $time; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-footer">
            <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
            <button  data-dismiss="modal" type="button" class="btn btn-default saveDates"><?php echo trans('0233');?></button>
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="form-group">
      <div class="clearfix"></div>
      <label class="control-label go-right size13"><i class="icon-calendar-7"></i> <?php echo trans('0210');?> <?php echo trans('08');?></label>
      <input type="text" class="form-control RTL"  id="tchkin" name="pickupDate" placeholder="<?php echo trans('08');?>" value="<?php echo @$pickupDate; ?>" required >
      </div>
      </div>
      <div class="col-md-2 col-lg-2 col-sm-6 col-xs-6 go-right">
      <div class="form-group">
      <div class="clearfix"></div>
      <label class="control-label go-right size13"><i class="icon-calendar-7"></i> <?php echo trans('0211');?> <?php echo trans('08');?></label>
      <input type="text" class="form-control RTL"  id="tchkout" name="pickupDate" placeholder="<?php echo trans('08');?>" value="<?php echo @$pickupDate; ?>" required >
      </div>
      </div>-->
    <?php }else{ ?>
    <div class="col-md-3 col-lg-4 col-sm-12 go-right" ng-controller="autoSuggest">
      <div class="form-group">
        <div class="clearfix"></div>
            <label class="control-label go-right"><i class="icon-location-6"></i> <?php echo trans('0254');?></label>
        <div class="clearfix"></div>
       <div angucomplete-alt id="<?php $appModule; ?>Search" input-name="txtSearch" initial-value="txtSearch" placeholder="<?php echo trans('0526');?>" pause="500" selected-object="selectedItem" remote-url="<?php echo base_url();?>home/suggestions/<?php echo $appModule; ?>" remote-url-request-formatter="remoteUrlRequestFn" remote-url-data-field="items" title-field="name" description-field="" minlength="2" input-class="form-control form-control-small" match-class="highlight">
        </div>
       
        <input type="hidden" name="searching" value="{{searching}}"> <input type="hidden" name="modType" value="{{modType}}"> 
      </div>
    </div>
    <!-- start tour types dropdown -->
    <?php if($appModule == "tours"){ ?>
    <div class="col-md-2 col-sm-6 col-xs-6 go-right">
      <div class="form-group">
        <div class="clearfix"></div>
        <label class="control-label go-right size13"><i class="icon-diamond"></i> <?php echo trans('0222');?></label>
        <select class="form-control mySelectBoxClass" name="type" id="tourtype">
          <option value=""> <?php echo trans('0158');?></option>
          <?php foreach($moduleTypes as $mtype){ ?>
          <option value="<?php echo $mtype->id;?>" <?php if($mtype->id == $_GET['type']){ echo "selected"; } ?> ><?php echo $mtype->name;?> </option>
          <?php } ?>
        </select>
      </div>
    </div>
    <?php } ?>
    <!-- end tour types dropdown -->
    <!-- start hotels checkin checkout fields -->
    <?php if($appModule == "hotels"){ ?>
    <div class="col-md-2 col-sm-6 col-xs-6 go-right">
      <div class="form-group">
        <div class="clearfix"></div>
        <label class="control-label go-right size13"><i class="icon-calendar-7"></i> <?php echo trans('07');?></label>
        <input type="text" placeholder="<?php echo trans('07');?> " name="checkin" class="form-control dpd1" value="<?php echo @$checkin; ?>" required >
      </div>
    </div>
    <div class="col-md-2 col-sm-6 col-xs-6 go-right">
      <div class="form-group">
        <div class="clearfix"></div>
        <label class="control-label go-right size13"><i class="icon-calendar-7"></i> <?php echo trans('09');?></label>
        <input type="text" placeholder="<?php echo trans('09');?> " name="checkout" class="form-control dpd2" value="<?php echo @$checkout; ?>" required >
      </div>
    </div>
    <?php } ?>
    <!-- end hotels checkin checkout fields -->
    <!-- start tour Date field -->
    <?php if($appModule == "tours"){ ?>
    <div class="col-md-2 col-sm-6 col-xs-6 go-right">
      <div class="form-group">
        <div class="clearfix"></div>
        <label class="control-label go-right size13"><i class="icon-calendar-7"></i> <?php echo trans('08');?></label>
        <input type="text" style="opacity: 10;" class="form-control-icon form-control RTL"  id="tchkin" name="date" placeholder="<?php echo trans('08');?>" value="<?php echo $date;?>" required >
      </div>
    </div>
    <?php } ?>
    <!-- end tour Date field -->
    <div class="col-md-2 col-lg-1 col-sm-6 col-xs-6 go-right">
      <div class="form-group">
        <div class="clearfix"></div>
        <label class="control-label go-right size13" style="white-space:nowrap;"><i class="icon-user-7"></i> <?php if($appModule == "hotels"){ echo trans('010'); }else if($appModule == "tours"){ echo trans('0446'); } ?></label>
        <select  required class="form-control" placeholder=" <?php echo trans('');?> " name="adults" id="adults">
          <option value="">0</option>
          <?php for($Selectadults = 1; $Selectadults < 11;$Selectadults++){ ?>
          <option value="<?php echo $Selectadults;?>" <?php if($Selectadults == $modulelib->adults){ echo "selected"; } ?> > <?php echo $Selectadults;?> </option>
          <?php } ?>
        </select>
      </div>
    </div>
    <!-- start hotels child field -->
    <?php if($appModule == "hotels"){ ?>
    <div class="hidden-md col-lg-1 col-sm-6 col-xs-6 go-right">
      <div class="form-group">
        <div class="clearfix"></div>
        <label class="control-label go-right size13"><i class="icon-user-7"></i> <?php echo trans('011');?></label>
        <select  class="form-control" placeholder=" <?php echo trans('011');?> " name="child" id="child">
          <?php for($Selectchild = 0; $Selectchild < 6;$Selectchild++){ ?>
          <option value="<?php echo $Selectchild;?>" <?php if($Selectchild == @$modulelib->children){ echo "selected"; } ?> > <?php echo $Selectchild;?> </option>
          <?php } ?>
        </select>
      </div>
    </div>
    <?php } ?>
     <?php if( strpos( $_GET['txtSearch'], "-khu-vuc-" ) !== false ) {
            $ok = substr($_GET['txtSearch'], strpos($_GET['txtSearch'], "-khu-vuc-") + 9); 
            echo '<input type="hidden" name="near" value="'.$ok.'">';
        }
        ?>
    <!-- end hotels child field -->
    <?php } ?>
    <div class="visible-sm visible-xs">
      <div class="clearfix"></div>
    </div>
    <div class="col-md-3 col-lg-2 col-xs-12 col-sm-12 go-right">
      <div class="form-group">
        <div class="clearfix"></div>
        <label class="control-label go-right size13">&nbsp;</label>
        <button style="font-size: 14px;" type="submit" class="btn btn-block btn-action"><?php echo trans('012');?></button>
      </div>
    </div>
    <div class="clearfix"></div>
  </form>

<?php } ?>

</div>
<!-- CONTENT -->
<div class="collapse" id="collapseMap">
  <div id="map" class="map"></div>
  <br>
</div>
<div class="container pagecontainer offset-0">
  <div class="clearfix"></div>
  <?php if($appModule == "offers"){ ?>
    <!-- Widgets for offers list page -->
       <div class="clearfix"></div>
      <div class="col-md-3 go-right">
      <?php echo run_widget(63); ?>
       </div>
    <!-- End Widgets for offers list page -->

   <?php }else{ if($appModule == "ean"){ ?>
  <!-- Start Ean search form left side -->
  <form  action="<?php echo $baseUrl;?>search" method="GET">
    <!-- FILTERS -->
    <div class="col-md-3 filters go-right">
      <a class="btn btn-block btn-default" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap"><?php echo trans('067');?></a>
      <!-- TOP TIP -->
      <div class="filtertip">
        <div class="padding20">
          <p class="size13">&nbsp;</p>
          <p class="size24"><i class="icon_set_1_icon-42 go-right"></i><span class="go-right"><?php echo trans('0191');?></span> <span class="countprice"></span></p>
        </div>
        <div class="tip-arrow"></div>
      </div>

      <!-- Star ratings -->
      <button type="button" class="collapsebtn go-text-right" data-toggle="collapse" data-target="#collapse1">
      <?php //echo trans('0137');?> <?php echo trans('069');?> <span class="collapsearrow"></span>
      </button>
      <div id="collapse1" class="collapse in">
        <div class="hpadding20">
          <br>
          <?php $star = '<i class="star text-warning fa fa-star voted"></i>'; ?>
          <?php $stars = '<i class="fa fa-star-o"></i>'; ?>
          <div  class="rating" style="font-size: 14px;">
            <div class="go-right"><input id="1" type="radio" name="stars" class="go-right radio" value="1" <?php if(@$_GET['stars'] == "1"){echo "checked";}?>>&nbsp;&nbsp;<label class="go-left" for="1"><?php echo $star; ?><?php for($i=1;$i<=6;$i++){ ?> <?php echo $stars; ?> <?php } ?></label></div>
            <div class="clearfix"></div>
            <div class="go-right"><input id="2" type="radio" name="stars" class="radio go-right" value="2" <?php if(@$_GET['stars'] == "2"){echo "checked";}?>>&nbsp;&nbsp;<label class="go-left" for="2"><?php for($i=1;$i<=2;$i++){ ?> <?php echo $star; ?> <?php } ?><?php for($i=1;$i<=5;$i++){ ?> <?php echo $stars; ?> <?php } ?></label></div>
            <div class="clearfix"></div>
            <div class="go-right"><input id="3" type="radio" name="stars" class="radio" value="3" <?php if(@$_GET['stars'] == "3"){echo "checked";}?>>&nbsp;&nbsp;<label class="go-left" for="3"><?php for($i=1;$i<=3;$i++){ ?> <?php echo $star; ?> <?php } ?><?php for($i=1;$i<=4;$i++){ ?> <?php echo $stars; ?> <?php } ?></label></div>
            <div class="clearfix"></div>
            <div class="go-right"><input id="4" type="radio" name="stars" class="radio" value="4" <?php if(@$_GET['stars'] == "4"){echo "checked";}?>>&nbsp;&nbsp;<label class="go-left" for="4"><?php for($i=1;$i<=4;$i++){ ?> <?php echo $star; ?> <?php } ?><?php for($i=1;$i<=3;$i++){ ?> <?php echo $stars; ?> <?php } ?></label></div>
            <div class="clearfix"></div>
            <div class="go-right"><input id="5" type="radio" name="stars" class="radio" value="5" <?php if(@$_GET['stars'] == "5"){echo "checked";}?>>&nbsp;&nbsp;<label class="go-left" for="5"><?php for($i=1;$i<=5;$i++){ ?> <?php echo $star; ?> <?php } ?><?php for($i=1;$i<=2;$i++){ ?> <?php echo $stars; ?> <?php } ?></label></div>
            <div class="clearfix"></div>
            <div class="go-right"><input id="7" type="radio" name="stars" class="radio" value="7" <?php if(@$_GET['stars'] == "7"){echo "checked";}?>>&nbsp;&nbsp;<label class="go-left" for="7"><?php for($i=1;$i<=7;$i++){ ?> <?php echo $star; ?> <?php } ?></label></div>
          </div>
        </div>
        <div class="clearfix"></div>
        <br>
      </div>
      <!-- End of Star ratings -->
      <!-- Price range -->
      <button type="button" class="collapsebtn go-text-right" data-toggle="collapse" data-target="#collapse2">
      <?php echo trans('0301');?> <span class="collapsearrow"></span>
      </button>
      <div id="collapse2" class="collapse in">
        <?php if(!empty($_GET['price'])){
          $selectedprice = $_GET['price'];
          }else{
          $selectedprice =  "0,0"; //$minprice.",".$maxprice;
          }?>
        <div class="padding20">
          <div class="layout-slider wh100percent">
            <span class="cstyle09"><input id="Slider1" type="slider" value="<?php echo $selectedprice; ?>" />
             <input id="getvar" type="hidden" name="price" value="<?php echo $selectedprice; ?>"/>
            </span>
          </div>
          <script type="text/javascript" >
            jQuery("#Slider1").slider({ from: <?php echo @$minprice;?>, to: <?php echo @$maxprice;?>, step: 5, smooth: true, round: 0, dimension: "&nbsp;<?php echo $currSign; ?>", skin: "round", onstatechange: function( value ){

            if(value != $("#getvar").val()){
             $("#getvar").val(value);  
            }else{
             $("#getvar").val("");    
            } }});
          </script>
        </div>
      </div>
      <!-- End of Price range -->
      <!-- Acomodations -->
      <button type="button" class="collapsebtn go-text-right" data-toggle="collapse" data-target="#collapse3">
      <?php echo trans('0478');?> <span class="collapsearrow"></span>
      </button>
      <div id="collapse3" class="collapse in">
        <div class="hpadding20">
          <br>
          <div class="go-right"><input type="checkbox" name="propertyCategory[]" value="6" id="all" class="checkbox go-right" <?php if(in_array("6", $propertyCategory)){ echo "checked"; } ?> /><label for="all" class="css-label go-left"> &nbsp;&nbsp;<?php echo trans('0467');?> &nbsp;</label></div>
          <div class="clearfix"></div>
          <div class="go-right"><input type="checkbox" name="propertyCategory[]" value="1" id="hotel" class="checkbox go-right" <?php if(in_array("1", $propertyCategory)){ echo "checked"; } ?> /><label for="hotel" class="css-label go-left"> &nbsp;&nbsp;<?php echo trans('01');?> &nbsp; </label></div>
          <div class="clearfix"></div>
          <div class="go-right"><input type="checkbox" name="propertyCategory[]" value="2" id="suite" class="checkbox go-right" <?php if(in_array("2", $propertyCategory)){ echo "checked"; } ?> /><label for="suite" class="css-label go-left"> &nbsp;&nbsp;<?php echo trans('0468');?>&nbsp;&nbsp; </label></div>
          <div class="clearfix"></div>
          <div class="go-right"><input type="checkbox" name="propertyCategory[]" value="3" id="resort" class="checkbox go-right" <?php if(in_array("3", $propertyCategory)){ echo "checked"; } ?> /><label for="resort" class="css-label go-left"> &nbsp;&nbsp;<?php echo trans('0469');?> &nbsp;</label></div>
          <div class="clearfix"></div>
          <div class="go-right"><input type="checkbox" name="propertyCategory[]" value="4" id="vacation" class="checkbox go-right" <?php if(in_array("4", $propertyCategory)){ echo "checked"; } ?> /><label for="vacation" class="css-label go-left"> &nbsp;&nbsp;<?php echo trans('0470');?> &nbsp; </label></div>
          <div class="clearfix"></div>
          <div class="go-right"><input type="checkbox" name="propertyCategory[]" value="5" id="bed" class="checkbox go-right" <?php if(in_array("5", $propertyCategory)){ echo "checked"; } ?> /><label for="bed" class="css-label go-left"> &nbsp;&nbsp;<?php echo trans('0471');?> &nbsp;</label></div>
          <div class="clearfix"></div>
          <br>
        </div>
        <div class="clearfix"></div>
      </div>
      <!-- End of Acomodations -->
      <!-- End of Hotel Preferences -->
      <div class="clearfix"></div>
      <br/>
      <input type="hidden" name="city" value="<?php if(!empty($_GET['city'])){ echo $_GET['city']; }else{ echo $selectedCity; } ?>">
      <input type="hidden" name="checkIn" value="<?php echo $checkin; ?>">
      <input type="hidden" name="checkOut" value="<?php echo $checkout; ?>">
      <input type="hidden" name="childages" value="<?php echo $childAges; ?>">
      <input type="hidden" name="adults" value="<?php echo $adults; ?>">
      <input type="hidden" name="search" value="1">
      <button style="border-radius:0px" type="submit" class="btn btn-action btn-lg btn-block" id="searchform"><?php echo trans('012');?></button>
    </div>
    <!-- END OF FILTERS -->
  </form>

  <!-- End Ean search form left side -->

  <?php }else{ ?>
  <form  action="<?php echo base_url().$appModule;?>/search" method="GET" role="search">

    <!-- FILTERS -->
    <div class="col-md-3 filters offset-0 go-right">
      <a class="btn btn-block btn-default" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap"><i class="icon_set_1_icon-41"></i> <?php echo trans('067');?></a>
      
      <!-- Star ratings -->
      <button type="button" class="collapsebtn go-text-right" data-toggle="collapse" data-target="#collapse1">
      <?php //echo trans('0137');?> <?php echo trans('069');?> <span class="collapsearrow"></span>
      </button>
      <div id="collapse1" class="collapse in">
        <div class="hpadding20">
          <br>
          <?php $star = '<i class="star text-warning fa fa-star voted"></i>'; ?>
          <?php $stars = '<i class="fa fa-star-o"></i>'; ?>
          <div  class="rating" style="font-size: 14px;">
            <div class="go-right"><input id="1" type="radio" name="stars" class="go-right radio" value="1" <?php if(@$_GET['stars'] == "1"){echo "checked";}?>>&nbsp;&nbsp;<label class="go-left" for="1"><?php echo $star; ?><?php for($i=1;$i<=6;$i++){ ?> <?php echo $stars; ?> <?php } ?></label></div>
            <div class="clearfix"></div>
            <div class="go-right"><input id="2" type="radio" name="stars" class="radio go-right" value="2" <?php if(@$_GET['stars'] == "2"){echo "checked";}?>>&nbsp;&nbsp;<label class="go-left" for="2"><?php for($i=1;$i<=2;$i++){ ?> <?php echo $star; ?> <?php } ?><?php for($i=1;$i<=5;$i++){ ?> <?php echo $stars; ?> <?php } ?></label></div>
            <div class="clearfix"></div>
            <div class="go-right"><input id="3" type="radio" name="stars" class="radio" value="3" <?php if(@$_GET['stars'] == "3"){echo "checked";}?>>&nbsp;&nbsp;<label class="go-left" for="3"><?php for($i=1;$i<=3;$i++){ ?> <?php echo $star; ?> <?php } ?><?php for($i=1;$i<=4;$i++){ ?> <?php echo $stars; ?> <?php } ?></label></div>
            <div class="clearfix"></div>
            <div class="go-right"><input id="4" type="radio" name="stars" class="radio" value="4" <?php if(@$_GET['stars'] == "4"){echo "checked";}?>>&nbsp;&nbsp;<label class="go-left" for="4"><?php for($i=1;$i<=4;$i++){ ?> <?php echo $star; ?> <?php } ?><?php for($i=1;$i<=3;$i++){ ?> <?php echo $stars; ?> <?php } ?></label></div>
            <div class="clearfix"></div>
            <div class="go-right"><input id="5" type="radio" name="stars" class="radio" value="5" <?php if(@$_GET['stars'] == "5"){echo "checked";}?>>&nbsp;&nbsp;<label class="go-left" for="5"><?php for($i=1;$i<=5;$i++){ ?> <?php echo $star; ?> <?php } ?><?php for($i=1;$i<=2;$i++){ ?> <?php echo $stars; ?> <?php } ?></label></div>
            <div class="clearfix"></div>
            <div class="go-right"><input id="7" type="radio" name="stars" class="radio" value="7" <?php if(@$_GET['stars'] == "7"){echo "checked";}?>>&nbsp;&nbsp;<label class="go-left" for="7"><?php for($i=1;$i<=7;$i++){ ?> <?php echo $star; ?> <?php } ?></label></div>
          </div>
        </div>
        <div class="clearfix"></div>
        <br>
      </div>
      <!-- End of Star ratings -->
      <!-- Price range -->
      <button type="button" class="collapsebtn go-text-right" data-toggle="collapse" data-target="#collapse2">
      <?php echo trans('0706');?> <span class="collapsearrow"></span>
      </button>
      <div id="collapse2" class="collapse in">
        <?php if(!empty($_GET['price'])){ 
          $selectedprice = $_GET['price'];
          }else{
          $selectedprice = "0,0";// $minprice.",".$maxprice;
          } ?>
        <div class="padding20">
          <div class="layout-slider wh100percent">
            <span class="cstyle09">
            <input id="Slider1" type="slider" value="<?php echo $selectedprice; ?>" />
             <input id="getvar" type="hidden" name="price" value="<?php echo $selectedprice; ?>"/>
            </span>
          </div>
          <script type="text/javascript" >
            jQuery("#Slider1").slider({ from: <?php echo @$minprice;?>, to: <?php echo @$maxprice;?>, step: 5, smooth: true, round: 0, dimension: "&nbsp;<?php echo $currSign; ?>", skin: "round", onstatechange: function( value ){

            if(value != $("#getvar").val()){
             $("#getvar").val(value);  
            }else{
             $("#getvar").val("");    
            }   } });
          </script>
        </div>
      </div>
      <!-- End of Price range -->
      <!-- Module types -->
      <button type="button" class="collapsebtn go-text-right" data-toggle="collapse" data-target="#collapse3">
      <?php if($appModule == "hotels"){ echo trans('0478'); }else if($appModule == "tours"){ echo trans('0366'); }else if($appModule == "cars"){ echo trans('0214'); } ?> <span class="collapsearrow"></span>
      </button>
      <div id="collapse3" class="collapse in">
        <div class="hpadding20">
          <br>
          <div class="clearfix"></div>
          <?php @$vartype = $_GET['type'];
            if(empty($vartype)){
            $vartype = array();
            }
            foreach($moduleTypes as $mtype){
              if(!empty($mtype->name)){
                if($appModule == "hotels"){
            ?>
          <div class="go-right"> <input type="checkbox" value="<?php echo $mtype->id;?>" <?php if(in_array($mtype->id,$vartype)){echo "checked";}?> name="type[]" id="<?php echo $mtype->name;?>" class="checkbox" /> <label for="<?php echo $mtype->name;?>" class="css-label go-left">&nbsp;&nbsp;<?php echo $mtype->name;?></label></div>
          <div class="clearfix"></div>
          <?php }else if($appModule == "tours" || $appModule == "cars"){ ?>
          <div class="go-right"><input class="radio" type="radio" value="<?php echo $mtype->id;?>" name="type" id="<?php echo $mtype->name;?>" class="checkbox go-right" <?php if($mtype->id == $vartype){echo "checked";}?> /><label for="<?php echo $mtype->name;?>" class="css-label go-left"> &nbsp;&nbsp; <?php echo $mtype->name;?> &nbsp;&nbsp;</label></div>
          <div class="clearfix"></div>
          <?php } } } ?>
          <br>
        </div>
        <div class="clearfix"></div>
      </div>
      <!-- End of Module Types -->
      <!-- Hotel Amenities -->
      <?php if(!empty($amenities)){ ?>
      <button type="button" class="collapsebtn last go-text-right" data-toggle="collapse" data-target="#collapse4">
      <?php echo trans('0249');?> <span class="collapsearrow"></span>
      </button>
      <div id="collapse4" class="collapse in">
        <div class="hpadding20">
          <br>
          <div class="clearfix"></div>
          <?php @$varAmt = $_GET['amenities'];
            if(empty($varAmt)){
            $varAmt = array();
            }
            foreach($amenities as $hamt){
            ?>
          <div class="go-right"><input type="checkbox" value="<?php echo $hamt->id;?>" <?php if(in_array($hamt->id,$varAmt)){echo "checked";}?> name="amenities[]" id="<?php echo $hamt->name;?>" class="checkbox" /><label for="<?php echo $hamt->name;?>" class="css-label go-left"> <img class="go-right" style="height: 22px;margin-right:5px;margin-left:5px" src="<?php echo $hamt->icon;?>">  <?php echo $hamt->name;?></label></div>
          <div class="clearfix"></div>
          <?php } ?>
        </div>
        <div class="clearfix"></div>
      </div>
      <?php } ?>
      <?php if($appModule == "cars"){ ?>
      <button type="button" class="collapsebtn go-text-right" data-toggle="collapse" data-target="#collapse5">
      <?php echo trans('0207');?> <span class="collapsearrow"></span>
      </button>
      <div id="collapse5" class="collapse in">
        <div class="hpadding20">
          <br>
          <div class="clearfix"></div>
          <select class="selectx" name="pickup">
            <option value=""> <?php echo trans('0158');?></option>
            <option value="yes" <?php echo makeSelected($selectedPickup, "yes"); ?>  ><?php echo trans('0363');?></option>
            <option value="no" <?php echo makeSelected($selectedPickup, "no"); ?> ><?php echo trans('0364');?></option>
          </select>
        </div>
      </div>
      <?php } ?>
      <!-- End of Hotel Amenities -->
      <!-- Hotel Nearby -->
      <div class="clearfix"></div>
      <?php if(!empty($nears)){ ?>
      <button type="button" class="collapsebtn last go-text-right" data-toggle="collapse" data-target="#collapse5">
      <?php echo trans('0601');?> <span class="collapsearrow"></span>
      </button>
      <div id="collapse5" class="collapse in">
        <div class="hpadding20">
          <br>
          <?php @$varNear = $_GET['near'];
            if(empty($varNear)){
            $varNear = array();
            }
            foreach($nears as $near){
                $eachnear = explode(',', $near->near);
                foreach($eachnear as $item){
            ?>
          <div class="go-right"><input type="radio" value="<?php echo trim($item);?>" <?php if(trim($item)==str_replace("+", ' ', $varNear)) {echo "checked";}?> name="near" id="<?php echo trim($item);?>" class="checkbox" /><label for="<?php echo trim($item);?>" class="css-label go-left">&nbsp;<?php echo trim($item);?></label></div>
            <?php }} ?>
        </div>
      </div>
      <?php } ?>

      <!-- End Hotel Nearby -->
      <div class="clearfix"></div>
      <br/>
      <input type="hidden" name="txtSearch" value="<?php if(!empty($_GET['txtSearch'])){ echo $_GET['txtSearch']; } ?>">
      <input type="hidden" name="modType" value="<?php if(!empty($_GET['modType'])){ echo $_GET['modType']; } ?>">
      <input type="hidden" name="city" value="<?php if(!empty($_GET['city'])){ echo $_GET['city']; }else{ echo $selectedCity; } ?>">
      <input type="hidden" name="checkIn" value="<?php echo $checkin; ?>">
      <input type="hidden" name="checkOut" value="<?php echo $checkout; ?>">
      <input type="hidden" name="childages" value="<?php echo $childAges; ?>">
      <input type="hidden" name="adults" value="<?php echo $adults; ?>">
      <input type="hidden" name="searching" value="<?php echo $selectedLocation;?>">
      <input name="sortby" type="hidden" class="sortby" value="<?php if(!empty($_GET['sortby'])){ echo $_GET['sortby']; } ?>">
      <button style="border-radius:0px" type="submit" class="btn btn-action btn-lg btn-block" id="searchform"><?php echo trans('0694');?></button>
    </div>
    <!-- END OF FILTERS -->
  </form>

  <?php } } ?>
  
  <div class="visible-xs"><br><br></div>
  <!-- LIST CONTENT-->
  <div class="rightcontent col-md-9 offset-0">
    <div class="itemscontainer offset-1">

      <?php if(!empty($module)){ foreach($module as $item){ ?>
      <div class="offset-2">
        <div class="wow fadeInUp col-lg-4 col-md-4 col-sm-4 offset-0 go-right">
          <!-- Add to whishlist -->
          <?php if($appModule != "ean" && $appModule != "offers"){ ?>
          <span  ><?php echo wishListInfo($appModule, $item->id); ?></span>
          <?php } ?>
          <!-- Add to whishlist -->
          <div class="img_list">
            <a href="<?php echo $item->slug;?>">
              <img src="<?php echo $item->thumbnail;?>" alt="<?php echo character_limiter($item->title,20);?>">
              <div class="short_info"></div>
            </a>
          </div>
        </div>
        <div class="wow fadeInUp col-md-8 offset-0">
          <div class="itemlabel3">
            <div class="labelright go-left" style="min-width:105px;margin-left:5px">
              <br/>
              <div class="purple size18 text-center">
              <?php  if($item->price > 0){ ?>
              <b>
              <?php echo $item->price;?><div class="smalltext">(<?php echo $item->currSymbol; ?>)</div>
              </b></div>
              <div class="clearfix"></div>
              <hr>
              <?php } ?>
              <?php if(pt_is_module_enabled('reviews')){ ?>
              <?php  if($item->avgReviews->overall > 0){ ?>
              <div class="review text-center size18"><i class="icon-thumbs-up-4"></i><?php echo $item->avgReviews->overall; ?></div>
              <!--<?php echo $item->avgReviews->totalReviews; ?>-->
              <div class="clearfix"></div>
              <hr>
              <?php } ?>
              <?php } ?>

              <?php if($appModule == "ean"){ if($item->tripAdvisorRating > 0){ ?>
              <div class="review text-center size18"><i class="icon-thumbs-up-4"></i><?php echo $item->tripAdvisorRating;?> </div>
              <div class="clearfix"></div>
              <hr>
              <?php } } ?>
              <a href="<?php echo $item->slug;?>">
              <button type="submit" class="btn btn-action"><?php echo trans('0177');?></button>
              </a>
            </div>
            <div class="labelleft2 rtl_title_home">
              <h4 class="mtb0 RTL go-text-right">
                <a href="<?php echo $item->slug;?>"><b><?php echo character_limiter($item->title,20);?></b></a>
                <!-- Cars airport pickup -->  <?php if($appModule == "cars"){ if($item->airportPickup == "yes"){ ?> <button class="btn btn-success btn-xs"><i class="icon-paper-plane-2"></i> <?php echo trans('0207');?></button> <?php } } ?> <!-- Cars airport pickup -->
              </h4>
              <?php if($appModule != "offers"){ ?> <a class="go-right" href="javascript:void(0);" onclick="showMap('<?php echo base_url();?>home/maps/<?php echo $item->latitude; ?>/<?php echo $item->longitude; ?>/<?php echo $appModule; ?>/<?php echo $item->id;?>','modal');" title="<?php echo $item->location;?>"><i style="margin-left: -3px;" class="icon-location-6 go-right"></i><?php echo character_limiter($item->location,10);?></a> <span class="go-right"><?php echo $item->stars;?></span> <?php } ?>
              <br><br>
              <p class="grey RTL"><?php echo character_limiter($item->desc,190);?></p>
              <br/>
              <?php if($appModule == "hotels"){ ?>
              <ul class="hotelpreferences go-right hidden-xs">
                <?php $cnt = 0; foreach($item->amenities as $amt){ $cnt++; if($cnt <= 10){ if(!empty($amt->name)){ ?>
                <img title="<?php echo $amt->name;?>" data-toggle="tooltip" data-placement="top" style="height:25px;" src="<?php echo $amt->icon;?>" alt="<?php echo $amt->name;?>" />
                <?php } } } ?>
              </ul>
              <?php } if($appModule == "tours"){ ?>
              <div class="add_info hidden-sm hidden-xs go-right RTL">
                <strong><?php echo trans('0222');?></strong> : <a href="javascript:void(0);" class="tooltip-1" data-placement="top" data-original-title="<?php echo character_limiter($item->tourType,5); ?>"><?php echo character_limiter($item->tourType,5); ?></a>
                &nbsp;<strong><?php echo trans('0275');?></strong> : <a href="javascript:void(0);" class="tooltip-1" data-placement="top" data-original-title="<?php echo $item->tourDays;?>"><?php echo $item->tourDays;?></a>
                &nbsp;<strong><?php echo trans('0276');?></strong> : <a href="javascript:void(0);" class="tooltip-1" data-placement="top" data-original-title="<?php echo $item->tourNights;?>"><?php echo $item->tourNights;?></a>
              </div>
              <?php } if($appModule == "cars"){ ?>
              <div class="hidden-sm hidden-xs">
                <table class="table-bordered table-striped">
                  <thead>
                    <tr>
                      <td class="text-center"><a href="javascript:void(0);" class="tooltip-1" data-placement="top" data-original-title="<?php echo trans('0446');?>"><i class="icon-user-7"></i><?php echo trans('0446');?></a></td>
                      <td class="text-center"><a href="javascript:void(0);" class="tooltip-1" data-placement="top" data-original-title="<?php echo trans('0213');?>"><i class="icon-print-3"></i><?php echo trans('0213');?></a></td>
                      <td class="text-center"><a href="javascript:void(0);" class="tooltip-1" data-placement="top" data-original-title="<?php echo trans('0201');?>"><i class="icon-params"></i><?php echo trans('0201');?></a></td>
                      <td class="text-center"><a href="javascript:void(0);" class="tooltip-1" data-placement="top" data-original-title="<?php echo trans('0199');?>"><i class="icon-tag-6"></i><?php echo trans('0199');?></a></td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-center"><?php echo $item->passengers;?></td>
                      <td class="text-center"><?php echo $item->doors;?></td>
                      <td class="text-center"><?php echo $item->transmission;?></td>
                      <td class="text-center"><?php echo $item->baggage;?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="offset-2">
        <hr style="margin-top: 10px; margin-bottom: 10px;">
      </div>
      <?php } ?>
      <div class="clearfix"></div>
      <div class="col-md-12 pull-right go-right"><?php echo createPagination($info);?></div>
      <div class="pull-right">
        <?php }else{  echo '<h1 class="text-center">' . trans("066") . '</h1>'; } ?>
      </div>
      <!-- End of offset1-->

    <!-- start EAN multiple locations found and load more hotels -->
    <?php if($appModule == "ean"){ if($multipleLocations > 0){ foreach($locationInfo as $loc){ ?> 
      <p><?php echo $loc->link; ?></p>
     <?php } } ?>
        <!--This is for display cache Parameter-->
      <div id="latest_record_para">
        <input type="hidden" name="moreResultsAvailable" id="moreResultsAvailable" value="<?php echo $moreResultsAvailable; ?>" />
        <input type="hidden" name="cacheKey" id="cacheKey" value="<?php echo $cacheKey; ?>" />
        <input type="hidden" name="cacheLocation" id="cacheLocation" value="<?php echo $cacheLocation; ?>" />
        <input type="hidden" name="" id="agesappendurl" value="<?php echo $agesApendUrl; ?>" />
        <input type="hidden" name="" id="adultsCount" value="<?php echo $adults;?>" />
      </div>
      <!--This is for display content-->
      <div id="New_data_load"></div>
      <!--This is for display Loader Image-->
      <div id="loader_new"></div>
      <div id="message_noResult"></div>
      <!-- END OF LIST CONTENT-->  
    <?php } ?>
      <!-- End EAN multiple locations found and load more hotels  -->




    </div>
    <!-- END OF LIST CONTENT-->
  </div>
  <!-- END OF container-->
</div>
<!-- END OF CONTENT -->
<br><br><br>
<!-- End container -->
<!-- Map -->
<!-- Map Modal -->
<div class="modal fade" id="mapModal" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div  class="modal-content">
      <div class="mapContent">
      </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>
<script>
<?php if($appModule == "cars"){ ?>
  $(function(){
    $(".saveDates").on("click",function(){
      var pickup = $("#departcar").val();
      var drop = $("#returncar").val();
      var htmlvar = pickup+' - '+drop; 
      $(".datesModal").html(htmlvar);      
    });    
  })

<?php } ?>

  $('#collapseMap').on('shown.bs.collapse', function(e){
  (function(A) {

  if (!Array.prototype.forEach)
   A.forEach = A.forEach || function(action, that) {
     for (var i = 0, l = this.length; i < l; i++)
       if (i in this)
         action.call(that, this[i], i, this);
     };

   })(Array.prototype);

   var
   mapObject,
   markers = [],
   markersData = {

     'map-red': [
      <?php foreach($module as $item): ?>
     {
       name: 'hotel name',
       location_latitude: "<?php echo $item->latitude;?>",
       location_longitude: "<?php echo $item->longitude;?>",
       map_image_url: "<?php echo $item->thumbnail;?>",
       name_point: "<?php echo $item->title;?>",
       description_point: "<?php echo character_limiter(strip_tags(trim($item->desc)),75);?>",
       url_point: "<?php echo $item->slug;?>"
     },
      <?php endforeach; ?>

     ],

   };
     var mapOptions = {
        <?php if(empty($_GET)){ ?>
       zoom: 10,
        <?php }else{ ?>
         zoom: 12,
        <?php } ?>
       center: new google.maps.LatLng(<?php echo $item->latitude;?>, <?php echo $item->longitude;?>),
       mapTypeId: google.maps.MapTypeId.ROADMAP,

       mapTypeControl: false,
       mapTypeControlOptions: {
         style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
         position: google.maps.ControlPosition.LEFT_CENTER
       },
       panControl: false,
       panControlOptions: {
         position: google.maps.ControlPosition.TOP_RIGHT
       },
       zoomControl: true,
       zoomControlOptions: {
         style: google.maps.ZoomControlStyle.LARGE,
         position: google.maps.ControlPosition.TOP_RIGHT
       },
       scrollwheel: false,
       scaleControl: false,
       scaleControlOptions: {
         position: google.maps.ControlPosition.TOP_LEFT
       },
       streetViewControl: true,
       streetViewControlOptions: {
         position: google.maps.ControlPosition.LEFT_TOP
       },
       styles: [/*map styles*/]
     };
     var
     marker;
     mapObject = new google.maps.Map(document.getElementById('map'), mapOptions);
     for (var key in markersData)
       markersData[key].forEach(function (item) {
         marker = new google.maps.Marker({
           position: new google.maps.LatLng(item.location_latitude, item.location_longitude),
           map: mapObject,
           icon: '<?php echo base_url(); ?>assets/img/' + key + '.png',
         });

         if ('undefined' === typeof markers[key])
           markers[key] = [];
         markers[key].push(marker);
         google.maps.event.addListener(marker, 'click', (function () {
       closeInfoBox();
       getInfoBox(item).open(mapObject, this);
       mapObject.setCenter(new google.maps.LatLng(item.location_latitude, item.location_longitude));
      }));

  });

   function hideAllMarkers () {
     for (var key in markers)
       markers[key].forEach(function (marker) {
         marker.setMap(null);
       });
   };

   function closeInfoBox() {
     $('div.infoBox').remove();
   };

   function getInfoBox(item) {
     return new InfoBox({
       content:
       '<div class="marker_info" id="marker_info">' +
       '<img style="width:280px;height:140px" src="' + item.map_image_url + '" alt=""/>' +
       '<h3>'+ item.name_point +'</h3>' +
       '<span>'+ item.description_point +'</span>' +
       '<a href="'+ item.url_point + '" class="btn btn-primary"><?php echo trans('0177');?></a>' +
       '</div>',
       disableAutoPan: true,
       maxWidth: 0,
       pixelOffset: new google.maps.Size(40, -190),
       closeBoxMargin: '0px -20px 2px 2px',
       closeBoxURL: "<?php echo $theme_url; ?>assets/img/close.png",
       isHidden: false,
       pane: 'floatPane',
       enableEventPropagation: true
     }); };  });
</script>
<script src="<?php echo $theme_url; ?>assets/js/infobox.js"></script>
<script src="<?php echo $theme_url; ?>assets/include/icheck/icheck.min.js"></script>
<link href="<?php echo $theme_url; ?>assets/include/icheck/square/grey.css" rel="stylesheet">
<script>
  var cb, optionSet1;
      $(".checkbox").iCheck({
        checkboxClass: "icheckbox_square-grey",
        radioClass: "iradio_square-grey"
      });

      $(".radio").iCheck({
        checkboxClass: "icheckbox_square-grey",
        radioClass: "iradio_square-grey"
      });
</script>