 <div id="footer" class="clearfix  footerbg2" >
         <div class="container">
            <ul class="list-social">
               <li class="ketnoi">Kết nối với chúng tôi</li>
               <li class="item-social youtube"><a href="https://www.youtube.com/channel/UCxfzWdfkaDPWGIVrI2vKchg" target="_blank"><i class="fa fa-play"></i> Youtube</a></li>
               <li class="item-social facebook"><a href="https://www.facebook.com/hospi.vn/" target="_blank"><i class="fa fa-facebook"></i> Facebook</a></li>
               <li class="item-social google"><a href="https://plus.google.com/104246180420952281462" target="_blank"><i class="fa fa-google-plus"></i> Google +</a></li>
            </ul>
            <div class="row">
               <!-- Blog -->
               <div class="footerblog">
                  <div class="row col-md-7 center-mobile">
                     <div class="col-md-5 img-logo-mobile">
                        <a href="blog.html"><img src="https://www.hospi.vn/uploads/global/footer-logo.png" class="img-responsive logo"/></a>
                     </div>
                     <div class="col-md-7">
                        <div class="fttle">"Blog tôi yêu du lịch tổng hợp những thông tin du lịch, chia sẻ kinh nghiệm, điểm đến, khuyến mãi... nhằm mang đến những thông tin bổ ích cho bạn đọc"</div>
                     </div>
                  </div>
                  <div class="row col-md-5">
                     <div class="col-md-7 facebook-like footer-blog-center">
                        <div class="facebook-text">Like để cập nhật cẩm nang du lịch</div>
                        <div class="fb-like" data-href="https://www.facebook.com/hospi.vn" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="false"></div>
                     </div>
                     <div class="col-md-5 footer-blog-center nowrap">
                        <div>Hỗ trợ bạn đọc, khách hàng</div>
                        <div class="phone_footer"  style="color: #666 !important">028 3826 8797</div>
                     </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-12">
                     <div class="hottest-news"></div>
                  </div>
                  <div class="col-md-3">
                     <div class="ftitle">&copy; Bản quyền của Hospi Travel Co., Ltd</div>
                  </div>
                  <div class="col-md-2 footer-blog-center">
                     <div class="ftitle">
                        <div class="chung-toi-la-ai" >
                           <!--<h2 class="ftitle go-text-center"><strong>Blog - Chúng tôi là ai ?</strong></h2>-->
                           <ul class="go-right go-text-center">
                              <li><a href="https://www.hospi.vn/chung-toi-la-ai" target="" title="">Chúng tôi là ai ?</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="blog-map ftitle go-text-right">
                        Lầu 1, Số 124 Khánh Hội, P.6, Quận 4, Tp. Hồ Chí Minh                        
                     </div>
                  </div>
                  <div class="row col-md-3">
                     <div class="blog-map go-text-right"><a class="purple" target="_blank" href="https://www.google.com/maps/place/124+Khánh+Hội,+phường+6,+Quận+4,+Hồ+Chí+Minh,+Việt+Nam/@10.7572978,106.6982959,17z/data=!3m1!4b1!4m5!3m4!1s0x31752f6d4faf461f:0xcf0c2485be1d0fdc!8m2!3d10.7572925!4d106.7004846"><i style="margin-left: -3px;" class="icon-location-6 go-right"></i>Bản đồ đến văn phòng Hospi</a></div>
                  </div>
               </div>
               <!-- End Blog -->
            </div>
         </div>
      </div>
      <!-- Angular Data -->
      <script src='//ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.js'></script>
      <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-sanitize.js"></script>
      <link rel="stylesheet" href="assets/include/angucomplete/angucomplete.css" />
      <script src="assets/include/angucomplete/angucomplete.js"></script>
      <script type="text/javascript"> (function () {
         'use strict';
         var app = angular.module('phptravelsApp',['ngSanitize','angucomplete-alt']);
         app.controller('appCtrl', ['$scope', '$http', function appCtrl ($scope, $http) { var self = this; var url = "https://www.hospi.vn/tours/featuredTours/"; $scope.lg = "6"; $scope.md = "6"; $scope.items = []; $http.get(url).success(function(data) { $scope.items = data; $scope.setClasses($scope.items); }); $scope.getData = function(loc){ $http.get(url+loc).success(function(data) { $scope.items = data; $scope.setClasses($scope.items); }); }; $scope.setClasses = function(data){ var totalItems = data.length; if(totalItems == 1){ $scope.lg = "6 tours12"; $scope.md = "6 tours12"; }else if(totalItems == 2){ $scope.lg = "6"; $scope.md = "6"; }else if(totalItems > 2){ $scope.lg = "6"; $scope.md = "6"; } }; } ]);
         app.filter('strLimit', function() { 'use strict'; return function(input, limit) { if (input) { if (limit > input.length) { return input.slice(0, limit); } else { return input.slice(0, limit) + '...'; } } }; });
         app.controller('autoSuggest', ['$scope','$http', function autoSuggest ($scope, $http) {
          $scope.searching = "";
          $scope.modType = "";
          $scope.txtSearch = "";
         $scope.remoteUrlRequestFn = function(str) {
             return {q: str};
           };
         $scope.selectedItem = function(selected) {
           $scope.searching = selected.originalObject.id;
           $scope.modType = selected.originalObject.module;
         
           };
         
         
           } ]);
         
         })(); 
      </script>
      <!-- End Angular Data -->
      <link href="themes/default/assets/include/select2/select2.css" rel="stylesheet" />
      <script src="themes/default/assets/include/select2/select2.min.js"></script>
      <!-- This page JS -->
      <!-- Custom functions -->
      <script src="themes/default/assets/js/functions.js"></script>
      <!-- Picker UI-->
      <!--<script src="themes/default/assets/js/jquery-ui.js"></script>-->
      <script type="text/javascript" src="//code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>
      <!-- Easing -->
      <script src="themes/default/assets/js/jquery.easing.js"></script>
      <!-- Nicescroll  -->
      <!--<script src="themes/default/assets/js/jquery.nicescroll.min.js"></script>-->
      <!-- CarouFredSel -->
      <script src="themes/default/assets/js/jquery.carouFredSel-6.2.1-packed.js"></script>
      <script src="themes/default/assets/js/helper-plugins/jquery.touchSwipe.min.js"></script>
      <script type="text/javascript" src="themes/default/assets/js/helper-plugins/jquery.mousewheel.min.js"></script>
      <script type="text/javascript" src="themes/default/assets/js/helper-plugins/jquery.transit.min.js"></script>
      <script type="text/javascript" src="themes/default/assets/js/helper-plugins/jquery.ba-throttle-debounce.min.js"></script>
      <!-- Custom Select -->
      <script type='text/javascript' src='themes/default/assets/js/jquery.customSelect.js'></script>
      <script src="themes/default/assets/js/bootstrap.min.js"></script>
      <script src="themes/default/assets/js/bootstrap-slider.js"></script>
      <script src="themes/default/assets/include/datepicker/datepicker.js"></script>
      <link rel="stylesheet" href="themes/default/assets/include/datepicker/datepicker.css" />
      <link rel="stylesheet" href="themes/default/assets/include/datepicker/dp2.css" />
      <script>
         $('#popoverData').popover();
         $('#popoverOption').popover({ trigger: "hover" });
      </script>
      <!-- WOWJs -->
      <script>
         //new WOW().init();
      </script>
      <!-- WOWJs -->
      <script>
         var fmt = "dd/mm/yyyy";
         var baseURL = "https://www.hospi.vn/";
         
         $(function() {
         
          /* Wish list global function */
          $(".wishlistcheck").on("click",function(){
            var id = $(this).prop('id');
            var module = $(this).data('module');
            var userid = "";
            var action = "add";
            var thisdiv = $(this);
            if($(this).hasClass('fav')){
                action = "remove";
            }
         
         
         $.post(baseURL+'account/wishlist/'+action,{module: module, itemid: id, loggedin: userid},function(resp){
           var response = $.parseJSON(resp);
         
           if(response.isloggedIn){
         
             if(action == "remove"){
             $("."+module+"wishsign"+id).html("+");
             //$("."+module+"wishtext"+id).html("Add to Wishlist");
             $("."+module+"wishtext"+id).tooltip('hide').attr('data-original-title', "Add to Wishlist").tooltip('fixTitle').tooltip('show');
             $("."+module+"wishsign"+id).removeClass("fav");
             thisdiv.removeClass('fav');
         
            }else{
         
             thisdiv.addClass('fav');
             $("."+module+"wishsign"+id).addClass("fav");
             $("."+module+"wishsign"+id).html("-");
             //$("."+module+"wishtext"+id).html("Remove From Wishlist");
             $("."+module+"wishtext"+id).tooltip('hide').attr('data-original-title', "Remove From Wishlist").tooltip('fixTitle').tooltip('show');
         
            }
         
            }else{
             alert("Please Login to add to wishlist.");
            }
            console.log(response);
          });
         
          })
          /* End Wish list global function */
         
         /* select2 */
         $('.chosen-select').select2({ width: '100%', maximumSelectionSize: 1  });
         
         /* homepage main search auto detector */
         $('.nav-tabs li:first-child').addClass('active');  var t  = $('.nav-tabs li:first-child').data('title'); $("#"+t).addClass("active in"); $('.feat li:first-child').addClass('active'); var t  = $('.feat li:first-child').data('title'); $("#"+t).addClass("active in");
         
         /* tours ajax categories loader */
           $('#location').on('change',function(){ var location = $(this).val(); $.post(baseURL+'tours/tourajaxcalls/onChangeLocation',{location: location},function(resp){ var response = $.parseJSON(resp); console.log(response); if(response.hasResult){ $("#tourtype").html(response.optionsList); }else{ $("#tourtype").html(response.optionsList); } mySelectUpdate(); }) });
         
          /* cars ajax types loader */
         function parseDate(str) {
           var mdy = str.split('https://www.hospi.vn/')
           return new Date(mdy[2],  mdy[1], mdy[0]-1);
         }
         
         function daydiff(first, second) {
           return (second-first)/(1000*60*60*24);
         }
         function Padder(len, pad) {
         if (len === undefined) {
           len = 1;
         } else if (pad === undefined) {
           pad = '0';
         }
         
         var pads = '';
         while (pads.length < len) {
           pads += pad;
         }
         
         this.pad = function (what) {
           var s = what.toString();
           return pads.substring(0, pads.length - s.length) + s;
         };
         }
         
         
         
          /* tooltip */
         $('[data-toggle=tooltip]').tooltip();
         
         /* datepicker */
         window.prettyPrint&&prettyPrint(),$(".dob").datepicker({format:fmt,autoclose:!0}).on("changeDate",function(){$(this).datepicker("hide")}),$("#dp1").datepicker(),$("#dp2").datepicker();
         window.prettyPrint&&prettyPrint(),$(".dob").datepicker({format:fmt,autoclose:!0}).on("changeDate",function(){$(this).datepicker("hide")}),$("#dp3").datepicker(),$("#dp4").datepicker();
         
         /* disabling dates */
             var nowTemp = new Date();
             var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
             var checkin = $('.dpd1').datepicker({
                 format: fmt,
                 language: 'vi',
                 onRender: function(date) {
                     return date.valueOf() < now.valueOf() ? 'disabled' : '';
                 }
             }).on('changeDate', function(ev) {
                 if (ev.date.valueOf() > checkout.date.valueOf()) {
                     var newDate = new Date(ev.date)
                     newDate.setDate(newDate.getDate() + 1);
                     checkout.setValue(newDate);              
                 }
                 checkin.hide();
                 $('.dpd2')[0].focus();
                 if($('.dpd2').val() != '' && $('.dpd1').val() != '' ){
                   var number_night = parseInt(daydiff(parseDate($('.dpd1').val()), parseDate($('.dpd2').val())));
                   var zero2 = new Padder(2);            
                   $('#number_night').html(zero2.pad(number_night));
                 }
             }).data('datepicker');
             var checkout = $('.dpd2').datepicker({
                 format: fmt,
                 onRender: function(date) {
                     return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
                 }
             }).on('changeDate', function(ev) {
                 checkout.hide();
                 if($('.dpd2').val() != '' && $('.dpd1').val() != '' ){
                   var number_night = parseInt(daydiff(parseDate($('.dpd1').val()), parseDate($('.dpd2').val())));
                   var zero2 = new Padder(2);            
                   $('#number_night').html(zero2.pad(number_night));
                 }
         
             }).data('datepicker');
         
             var checkins = $('.dpd3').datepicker({
                 format: fmt,
                 language: 'vi',
                 onRender: function(date) {
                     return date.valueOf() < now.valueOf() ? 'disabled' : '';
                 }
             }).on('changeDate', function(ev) {
                 if (ev.date.valueOf() > checkouts.date.valueOf()) {
                     var newDates = new Date(ev.date)
                     newDates.setDate(newDates.getDate() + 1);
                     checkouts.setValue(newDates);
                 }
                 checkins.hide();
                 $('.dpd4')[0].focus();
             }).data('datepicker');
             var checkouts = $('.dpd4').datepicker({
                 format: fmt,
                 onRender: function(date) {
                     return date.valueOf() <= checkins.date.valueOf() ? 'disabled' : '';
                 }
             }).on('changeDate', function(ev) {
                 checkouts.hide();
         
             }).data('datepicker');
         
         /* Expedia datepicker */
           /* End Expedia Datepicker*/
         
          /* Dohop datepicker */
           /* End Dohop Datepicker*/
         
             // Tours checkin - disabling Single date
         var nowTemp4 = new Date();
         var now4 = new Date(nowTemp4.getFullYear(), nowTemp4.getMonth(), nowTemp4.getDate(), 0, 0, 0, 0);
         var checkin4 = $('#tchkin').datepicker({format: fmt, onRender: function(date) {
         return date.valueOf() < now4.valueOf() ? 'disabled' : ''; } }).on('changeDate', function(ev) {
         $('#tchkin').datepicker('hide');
         });
         
         
           /* Cartrawler datepicker */
           /* End Cartrawler Datepicker*/
         
         /* Newsletter subscription */
         $(".sub_newsletter").on("click",function(){var e=$(".sub_email").val();$.post("https://www.hospi.vn/home/subscribe",{email:e},function(e){$(".subscriberesponse").html(e).fadeIn("slow"),setTimeout(function(){$(".subscriberesponse").fadeOut("slow")},2000)})});
         
         /* dropdown on hover */
         $("ul.nav li.dropdown").hover(function(){$(this).find(".dropdown-menu").stop(!0,!0).delay(200).fadeIn(200)},function(){$(this).find(".dropdown-menu").stop(!0,!0).delay(200).fadeOut(200)}); });
         
         /* start change currency functionality */
         function change_currency(c){$("#loadingbg").css("display","block"),$.post("https://www.hospi.vn/admin/ajaxcalls/changeCurrency",{id:c},function(){location.reload()})}
         
         /* map iframe modal */
         function showMap(a,o){"modal"==o?($("#mapModal").modal("show"),$("#mapModal").on("shown.bs.modal",function(){$("#mapModal .mapContent").html('<iframe src="'+a+'" width="100%" height="450" frameborder="0" style="border:0"></iframe>')})):$("#"+o).html('<iframe src="'+a+'" width="100%" height="450" frameborder="0" style="border:0"></iframe>')}
      </script>
      <script>
         (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
         (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
         m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
         })(window,document,'script','../www.google-analytics.com/analytics.js','ga');
         
         ga('create', 'UA-86943600-1', 'auto');
         ga('send', 'pageview');
         
      </script>
      <style type="text/css">
         .block-panel-info{
         line-height: 25px;
         }
      </style>
   </body>
 
</html>