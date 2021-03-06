<script type="text/javascript" src="<?php echo $theme_url; ?>plugins/jslider/js/jshashtable-2.1_src.js"></script>
<script type="text/javascript" src="<?php echo $theme_url; ?>plugins/jslider/js/jquery.numberformatter-1.2.3.js"></script>
<script type="text/javascript" src="<?php echo $theme_url; ?>plugins/jslider/js/tmpl.js"></script>
<script type="text/javascript" src="<?php echo $theme_url; ?>plugins/jslider/js/jquery.dependClass-0.1.js"></script>
<script type="text/javascript" src="<?php echo $theme_url; ?>plugins/jslider/js/draggable-0.1.js"></script>
<script type="text/javascript" src="<?php echo $theme_url; ?>plugins/jslider/js/jquery.slider.js"></script>
<link rel="stylesheet" href="<?php echo $theme_url; ?>plugins/jslider/css/jslider.css" type="text/css">
<link rel="stylesheet" href="<?php echo $theme_url; ?>plugins/jslider/css/jslider.round.css" type="text/css">


<!-- CONTENT -->

<div class="container pagecontainer offset-0">
  <div class="clearfix"></div>
  


  
  <div class="visible-xs"><br><br></div>
  <!-- LIST CONTENT-->
  
  <div class="secondary col-md-3 add_bottom_30 go-right">
    <button type="button" class="widget-collapsebtn go-text-right" data-toggle="collapse" data-target="#collapse3">
     <i class="fa fa-chevron-down" aria-hidden="true"></i> <?php  echo trans('0828'); ?>
      </button>
    <div id="collapse3" class="collapse in" style="border:none;">
          <div class="clearfix"></div>
          <div class="tours-zippack">
          <?php 
            foreach($moduleTypes as $mtype){
              if(!empty($mtype->name)){ 

              
     
            echo '<p class="where-location"><span class="hotel-location widget-tourtype"><a href="'.base_url().'tours/search?type='.$mtype->id.'">'.$mtype->name.'</a></span>';
            echo '</p>';

        ?>

          <div class="clearfix"></div>
          <?php  } } ?>
          </div>
        
      </div>
      <div class="clearfix"></div>
      <br>
      <?php echo run_widget(111); ?>
    <div class="list-group">
    <div class="panel panel-default">
      <div class="panel-heading go-text-right"><?php echo trans('0765');?></div>
        <?php echo run_widget(106); ?>
      <?php echo run_widget(108); ?>
      </div>
  </div>
        <?php echo run_widget(105); ?>
  <div class="list-group">
    <div class="panel panel-default">
      <div class="panel-heading go-text-right"><?php echo trans('0827');?></div>
      <div class="hotel-zippack">
        <?php foreach($hotelslocationsList as $loc){
            $city_slug = create_slug($loc->name);
            $country_slug = create_slug($loc->country);
            echo '<div class="col-md-12 col-sm-12 col-xs-12">';
            echo '<p class="where-location"><span class="hotel-location link-color"><a href="'.base_url().'hotels/search/'.$country_slug.'/'.$city_slug.'/'.$loc->id.'?txtSearch='.$loc->name.'&searching='.$loc->id.'&modType=location&checkin=&checkout=&adults=&child=">'.$loc->name.'</a></span>';
            echo '<span class="pricetxt-location">'.trans('0566').' VND</span>';
            echo '</p><p><span class="count-location">'.$loc->total.' ';echo trans('Hotels').'</span>';
            echo '<span class="price-location link-color">'.$loc->bestprices.'</span>';
            echo '</p></div>';
        } ?>
        </div>
      </div>
  </div>
</div>
<!--//secondary-->

  <div class="rightcontent col-md-9 offset-0">
    <div class="itemscontainer offset-1">
        <div class="offer-banners offset-2">
        <div id="carousel-banner" class="carousel slide tour-result" data-ride="carousel">
        <?php //echo run_widget(get_widget_id($_GET['searching'],"Tour")); 
        $image = get_location_image($_GET['searching']);
        if(!empty($image)) echo '<img alt="'.$_GET['txtSearch'].'" src="'.PT_LOCATION_IMAGES.$image.'">';
        else echo '<img alt="'.$_GET['txtSearch'].'" src="'.PT_DEFAULT_IMAGE.'toursearch.jpg">';?>
            <div class="clearfix"></div>
            <?php if(isset($_GET['searching']) && $_GET['searching']>0) { echo "<div style=\"font-family: 'Open Sans',sans-serif;font-style: italic;margin-bottom: 15px;\">" . getLocationsdesc($_GET['searching']) . "</div>";?>
        <div class="clearfix"></div>
        <?php echo "<span class='andes-bold'>" . trans('0797') ."</span> <span class='desc-link'><a href='/blog/" . getCamnang($_GET['searching']) . "'>" .trans('0764') . " " . $_GET['txtSearch'] . "</a></span>";?>
            <?php } ?>
        <div class="clearfix"></div>
        <hr>
        <div class="search-result-location">
            <div class="result-location-title"><?php echo trans('0796');?><?php echo $_GET['txtSearch'];?></div>
        </div>
        </div>
        </div>
        <div class="col-md-12"><div class="go-right andes-bold purple"><?php echo trans('0796');?><?php echo $_GET['txtSearch'];?></div></div>
      <?php if(!empty($module)){ foreach($module as $item){ ?>
      <div class="offset-2">
        <div class="wow fadeInUp col-lg-3 col-md-3 col-sm-3 offset-0 go-right tour-image">
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
        <div class="wow fadeInUp col-md-9 offset-0">
          <div class="itemlabel3 toursitemlabel">
            <div class="labelright go-left" style="min-width:105px;margin-left:5px">
                <div class="text-center andes-bold"><?php echo trans('0775');?></div>
                <div class="text-center">(<?php echo $item->currSymbol; ?>)</div>
              <div class="purple andes-bold size18 text-center">
              <?php  if($item->price > 0){ ?>
              <br><b>
              <?php echo $item->price;?>
              </b></div>
              <div class="clearfix"></div>
              <?php } ?>
              <br>
              <a href="<?php echo $item->slug;?>">
              <button type="submit" class="btn btn-tours"><?php echo trans('0776');?></button>
              </a>
            </div>
            <div class="labelleft2 rtl_title_home tour-item">
              <h4 class="mtb0 RTL go-text-right">
                <a href="<?php echo $item->slug;?>"><b><?php echo $item->title;?></b> <small class="purple"><?php echo $item->tourDays;?> <?php echo trans('0275');?> <?php echo $item->tourNights;?> <?php echo trans('0276');?></small></a>
              </h4>
                <br>
                <p><?php echo "<span class='tour-desc'>" . trans("0772") . "</span><i class='fa fa-chevron-right' aria-hidden='true'></i>" . $item->departure;?></p>
                <p><?php echo "<span class='tour-desc'>" . trans("0773") . "</span><i class='fa fa-chevron-right' aria-hidden='true'></i>" . $item->transportation;?></p>
                <p><?php echo "<span class='tour-desc'>" . trans("0774") . "</span><i class='fa fa-chevron-right' aria-hidden='true'></i><span class='andes-bold'>" . $item->location . "</span>";?></p>
              
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