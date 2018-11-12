  </div><script type="text/javascript" src="<?php echo $theme_url; ?>plugins/jslider/js/jshashtable-2.1_src.js"></script>
<script type="text/javascript" src="<?php echo $theme_url; ?>plugins/jslider/js/jquery.numberformatter-1.2.3.js"></script>
<script type="text/javascript" src="<?php echo $theme_url; ?>plugins/jslider/js/tmpl.js"></script>
<script type="text/javascript" src="<?php echo $theme_url; ?>plugins/jslider/js/jquery.dependClass-0.1.js"></script>
<script type="text/javascript" src="<?php echo $theme_url; ?>plugins/jslider/js/draggable-0.1.js"></script>
<script type="text/javascript" src="<?php echo $theme_url; ?>plugins/jslider/js/jquery.slider.js"></script>
<link rel="stylesheet" href="<?php echo $theme_url; ?>plugins/jslider/css/jslider.css" type="text/css">
<link rel="stylesheet" href="<?php echo $theme_url; ?>plugins/jslider/css/jslider.round.css" type="text/css">
<div class="container offer-banners">
    <div id="carousel-banner" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class='item active'><img alt="" src="https://www.hospi.vn/uploads/cms/images/1513311094_Six-senses-Con-Dao-Resort.png" /></div><div class='item'><img alt="" height="323" src="https://www.hospi.vn/uploads/cms/images/1513206591_Sapa-jade-hill.png" width="1140" /></div><div class='item'><img alt="" height="323" src="https://www.hospi.vn/uploads/cms/images/1514540448_Combo-ictoria-Núi-Sam-Châu-Đốc.jpg" width="1140" /></div><div class='item'><img alt="" height="323" src="https://www.hospi.vn/uploads/cms/images/1513215826_Sea-Shell-phu-quoc-hotel-&amp;-Spa.png" width="1140" /></div>        </div>
        <!-- Indicators -->
        <ol class="carousel-indicators hidden-xs">
                        <li data-target='#carousel-banner' data-slide-to='0' class='active'></li><li data-target='#carousel-banner' data-slide-to='1'></li><li data-target='#carousel-banner' data-slide-to='2'></li><li data-target='#carousel-banner' data-slide-to='3'></li>        </ol>
    </div>
    <!-- Carousel -->

        <div class="clearfix"></div>
    <ul class="offer-banner-bottom hidden-xs">
        <li><a href="<?php echo base_url();?>offers">Deals - Ưu đãi</a></li>
        <li class="active"><a href="<?php echo base_url();?>bestchoice">Bestchoice</a></li>
        <li><a href="<?php echo base_url();?>combo">Combo</a></li>
    </ul>
    <div class="visible-xs col-xs-12 offer-content-menu-promotion no-padding-mobile text-center">
       <ul class="">
          <li><a href="<?php echo base_url();?>offers">Deals - Ưu đãi</a></li>
          <li class="active"><a href="<?php echo base_url();?>bestchoice">Khuyến Bestchoice</a></li>
          <li><a href="<?php echo base_url();?>combo">Combo</a></li>
      </ul>
    </div>
      <div class="clearfix"></div>
    <div class="visible-xs col-xs-12 breambun no-padding-mobile">
      <div class="breadcrumb">
            <span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
              <a href="" itemprop="url">
                <span itemprop="title">Trang chủ</span>
              </a>
            </span> <i class="fa fa-angle-right"></i>

            <span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
              <a href="" itemprop="url"><span itemprop="title">Best choice</span></a>
          </span> <i class="fa fa-angle-right"></i>
          <span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
            <a href="" itemprop="url" class="active">
              <span itemprop="title">Amanoi Ninh Thuận Resort</span>
            </a>
          </span> 
        </div>

       
    </div>
   
</div>
<!-- CONTENT -->
<div class="collapse" id="collapseMap">
    <div id="map" class="map"></div>
    <br>
</div>
<div class="container pagecontainer offset-0 offset-content-mobile">
    <!-- LIST CONTENT-->
    <div class="offer-page rightcontent col-md-12 offset-0">
        <div class="itemscontainer offset-1">
            <div class="offset-2">
                <h1 class="h1-offers">Amanoi Ninh Thuận Resort</h1>
                 <div class="col-xs-12 no-padding-mobile conten-like">
                  <div class="col-xs-4 no-padding-mobile view-aticol"><i class="fa fa-eye" aria-hidden="true"></i> 1,200</div>
                   <div class="col-xs-8 no-padding-mobile">
                      <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
                   </div>
                 
                </div>
                <div style="color: #666666; font-size: 15px;">


                Với mong muốn mang đến nhiều giá phòng khách sạn giá rẻ. Hospi luôn cập nhật giá khuyến mãi hàng ngày giảm giá từ 10-50% giá phòng khách sạn. Quý khách đang mong muốn ở những khách sạn sang trọng (4-5 sao) với giá tốt nhất. Hospi luôn cho nhiều sự lựa chọn cho quý khách. Để thuận tiện cho việc tìm kiếm nhanh chóng. Quý khách vui lòng chọn điểm đến để tìm cho mình 1 nơi nghỉ dưỡng thích hợp.</div>
            
                
            </div>

                            <!-- End of offset1-->
            <!-- start EAN multiple locations found and load more hotels -->
                        <!-- End EAN multiple locations found and load more hotels  -->
        </div>
        <!-- END OF LIST CONTENT-->
    </div>
    <!-- END OF container-->
</div>
<!-- END OF CONTENT -->

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
                                        {
                        name: 'hotel name',
                        location_latitude: "",
                        location_longitude: "",
                        map_image_url: "https://www.hospi.vn/uploads/images/offers/424732_290867_khach-san-samdi-da-nang-Hospi-(14).jpg",
                        name_point: "Ưu đãi giá tốt tại Samdi Đà Nẵng Hotel 4 sao",
                        description_point: "Samdi Đ&agrave; Nẵng Hotel &nbsp;4 sao c&aacute;ch s&acirc;n bay Đ&agrave;&#8230;",
                        url_point: "https://www.hospi.vn/offers/uu-dai-gia-tot-tai-samdi-da-nang-hotel-4-sao"
                    },
                                        {
                        name: 'hotel name',
                        location_latitude: "",
                        location_longitude: "",
                        map_image_url: "https://www.hospi.vn/uploads/images/offers/202579_579484_Avani-quy-nhon-resort-spa-Hospi.vn-(16).jpg",
                        name_point: "Ưu đãi giá tốt tại AVANI Quy Nhơn Resort & Spa",
                        description_point: "AVANI Quy Nhon Resort &amp; Spa&nbsp;gồm 63 ph&ograve;ng nghỉ c&oacute;&#8230;",
                        url_point: "https://www.hospi.vn/offers/uu-dai-gia-tot-tai-avani-quy-nhon-resort-spa"
                    },
                                        {
                        name: 'hotel name',
                        location_latitude: "",
                        location_longitude: "",
                        map_image_url: "https://www.hospi.vn/uploads/images/offers/865493_59144_khach-san-gold-3-da-nang-10.jpg",
                        name_point: "Ưu đãi đến tháng 3/2018 tại Gold III Đà Nẵng",
                        description_point: "Kh&aacute;ch sạn Gold III Đ&agrave; Nẵng. Ti&ecirc;u chuẩn 3 sao ( c&oacute;&#8230;",
                        url_point: "https://www.hospi.vn/offers/uu-dai-den-thang-3-2018-tai-gold-iii-da-nang"
                    },
                                        {
                        name: 'hotel name',
                        location_latitude: "",
                        location_longitude: "",
                        map_image_url: "https://www.hospi.vn/uploads/images/offers/350012_836178_Sanctuary-Ho-Tram-Resort---Hospi-(9).jpg",
                        name_point: "Ưu đãi tại Sanctuary Hồ Tràm Resort  năm 2018",
                        description_point: "Sanctuary Hồ Tr&agrave;m Resort&nbsp;với gam m&agrave;u trắng chủ đạo&#8230;",
                        url_point: "https://www.hospi.vn/offers/uu-dai-tai-sanctuary-ho-tram-resort-nam-2018"
                    },
                                        {
                        name: 'hotel name',
                        location_latitude: "",
                        location_longitude: "",
                        map_image_url: "https://www.hospi.vn/uploads/images/offers/461989_110606_Swiss-Village-Resort-&-Spa---Hospi-(1).jpg",
                        name_point: "Ưu đãi năm 2018 tại Swiss Village Resort & Spa  sao",
                        description_point: "Swiss Village Resort &amp; Spa&nbsp;c&aacute;ch trung t&acirc;m Th&agrave;nh&#8230;",
                        url_point: "https://www.hospi.vn/offers/uu-dai-nam-2018-tai-swiss-village-resort-spa-sao"
                    },
                                        {
                        name: 'hotel name',
                        location_latitude: "",
                        location_longitude: "",
                        map_image_url: "https://www.hospi.vn/uploads/images/offers/575389_nam-nghi-phu-quoc-resort---hospi-(11).jpg",
                        name_point: "Ưu đãi tại Nam Nghi Phú Quốc resort sang chảnh cho 2 khách",
                        description_point: "Nam Nghi Phu Quoc Island&nbsp; nằm c&aacute;ch thị trấn Dương Đ&ocirc;ng&#8230;",
                        url_point: "https://www.hospi.vn/offers/uu-dai-tai-nam-nghi-phu-quoc-resort-sang-chanh-cho-2-khach"
                    },
                                        {
                        name: 'hotel name',
                        location_latitude: "",
                        location_longitude: "",
                        map_image_url: "https://www.hospi.vn/uploads/images/offers/617977_Royal-Hoi-An,-MGallery-by-Sofitel.jpg",
                        name_point: "Ưu đãi giá tốt đến 31.06.2018 tại Royal Hoi An, MGallery by Sofitel",
                        description_point: "Kh&aacute;ch sạn Royal Hoi An, MGallery by Sofitel&nbsp;l&agrave; một kh&aacute;ch&#8230;",
                        url_point: "https://www.hospi.vn/offers/uu-dai-gia-tot-den-31-06-2018-tai-royal-hoi-an-mgallery-by-sofitel"
                    },
                                        {
                        name: 'hotel name',
                        location_latitude: "",
                        location_longitude: "",
                        map_image_url: "https://www.hospi.vn/uploads/images/offers/299436_sapa-jade-hill.jpg",
                        name_point: "Ưu đãi giá tối tại Sapa Jade Hill Resort",
                        description_point: "Sapa Jade Hill Resort&nbsp;tọa lạc ngay tại phố Mường Hoa, b&ecirc;n&#8230;",
                        url_point: "https://www.hospi.vn/offers/uu-dai-gia-toi-tai-sapa-jade-hill-resort"
                    },
                                        {
                        name: 'hotel name',
                        location_latitude: "",
                        location_longitude: "",
                        map_image_url: "https://www.hospi.vn/uploads/images/offers/619369_vinpearl-ha-tinh.jpg",
                        name_point: "Ưu đãi Vinpearl Hà Tĩnh Hotel cho 2 khách",
                        description_point: "Kh&aacute;ch sạn Vinpearl H&agrave; Tĩnh&nbsp;tọa lạc tại 9-152 H&agrave;&#8230;",
                        url_point: "https://www.hospi.vn/offers/uu-dai-vinpearl-ha-tinh-hotel-cho-2-khach"
                    },
                                        {
                        name: 'hotel name',
                        location_latitude: "",
                        location_longitude: "",
                        map_image_url: "https://www.hospi.vn/uploads/images/offers/143245_sealinks-hotel.jpg",
                        name_point: "Combo 2N1Đ, 3N2Đ Sealinks Hotel 5 sao trong tuần",
                        description_point: "Kh&aacute;ch Sạn Sea Links Beach&nbsp;c&aacute;ch ga Phan Thiết khoảng&#8230;",
                        url_point: "https://www.hospi.vn/offers/combo-2n1d-3n2d-sealinks-hotel-5-sao-trong-tuan"
                    },
                                        {
                        name: 'hotel name',
                        location_latitude: "",
                        location_longitude: "",
                        map_image_url: "https://www.hospi.vn/uploads/images/offers/620810_cocobay-da-nang-resort.jpg",
                        name_point: "Combo 3N2Đ ở Cocobay Đà Nẵng cho 2 khách",
                        description_point: "Tọa lạc giữa tuyến phố đi bộ Coco Promenade, chuỗi Boutique&#8230;",
                        url_point: "https://www.hospi.vn/offers/combo-3n2d-o-cocobay-da-nang-cho-2-khach"
                    },
                                        {
                        name: 'hotel name',
                        location_latitude: "",
                        location_longitude: "",
                        map_image_url: "https://www.hospi.vn/uploads/images/offers/49715_6.jpg",
                        name_point: "Ưu đãi giảm giá khi đặt phòng trước 30 ngày tại Amazing Sapa",
                        description_point: "Ưu đ&atilde;i giảm gi&aacute; khi đặt ph&ograve;ng trước 30 ng&agrave;y&#8230;",
                        url_point: "https://www.hospi.vn/offers/uu-dai-giam-gia-khi-dat-phong-truoc-30-ngay-tai-amazing-sapa"
                    },
                                        {
                        name: 'hotel name',
                        location_latitude: "",
                        location_longitude: "",
                        map_image_url: "https://www.hospi.vn/uploads/images/offers/767122_furama-villas-da-nang-1.jpg",
                        name_point: "Combo nghỉ dưỡng Furama Villas Đà Nẵng 5 sao + buffet hải sản tôm hùm chỉ 2.190.000 VND/khách",
                        description_point: "Combo nghỉ dưỡng Furama Villas Đ&agrave; Nẵng 5 sao + buffet hải&#8230;",
                        url_point: "https://www.hospi.vn/offers/combo-nghi-duong-furama-villas-da-nang-5-sao-buffet-hai-san-tom-hum-chi-2-190-000-vnd-khach"
                    },
                                        {
                        name: 'hotel name',
                        location_latitude: "",
                        location_longitude: "",
                        map_image_url: "https://www.hospi.vn/uploads/images/offers/600638_VNTLB_-VILLAS-_LIVING-ROOM.jpg",
                        name_point: "Chương trình Voucher 2N1Đ siêu hot tại Vinpearl Nha Trang Long Beach Villas bao gồm ăn 3 bữa + vé vào khu vui chơi và Safari không giới hạn",
                        description_point: "Chương tr&igrave;nh Voucher 2N1Đ si&ecirc;u hot tại Vinpearl Nha Trang&#8230;",
                        url_point: "https://www.hospi.vn/offers/chuong-trinh-voucher-2n1d-sieu-hot-tai-vinpearl-nha-trang-long-beach-villas-bao-gom-an-3-bua-ve-vao-khu-vui-choi-va-safari-khong-gioi-han"
                    },
                                        {
                        name: 'hotel name',
                        location_latitude: "",
                        location_longitude: "",
                        map_image_url: "https://www.hospi.vn/uploads/images/offers/719404_vinpearl-phu-quoc-resort-0.jpg",
                        name_point: "Chương trình Voucher 2N1Đ siêu hot tại Vinpearl Phú Quốc bao gồm ăn 3 bữa, đón tiễn sân bay + vé vào khu vui chơi và Safari không giới hạn",
                        description_point: "Chương tr&igrave;nh Voucher 2N1Đ si&ecirc;u hot tại Vinpearl Ph&uacute;&#8230;",
                        url_point: "https://www.hospi.vn/offers/chuong-trinh-voucher-2n1d-sieu-hot-tai-vinpearl-phu-quoc-bao-gom-an-3-bua-don-tien-san-bay-ve-vao-khu-vui-choi-va-safari-khong-gioi-han"
                    },
                    
                ],

            };
        var mapOptions = {
                        zoom: 10,
                        center: new google.maps.LatLng(11.955632,108.440495),
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
                    icon: 'https://www.hospi.vn/assets/img/' + key + '.png',
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
                '<a href="'+ item.url_point + '" class="btn btn-primary">Xem ngay</a>' +
                '</div>',
                disableAutoPan: true,
                maxWidth: 0,
                pixelOffset: new google.maps.Size(40, -190),
                closeBoxMargin: '0px -20px 2px 2px',
                closeBoxURL: "https://www.hospi.vn<?php echo $theme_url; ?>assets/img/close.png",
                isHidden: false,
                pane: 'floatPane',
                enableEventPropagation: true
            }); };  });
</script>
<script src="https://www.hospi.vn<?php echo $theme_url; ?>assets/js/infobox.js"></script>
<script src="https://www.hospi.vn<?php echo $theme_url; ?>assets/include/icheck/icheck.min.js"></script>
<link href="https://www.hospi.vn<?php echo $theme_url; ?>assets/include/icheck/square/grey.css" rel="stylesheet">
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
<script type="text/javascript">
    function submitform() {
        var url = document.location.href;
        formAction = document.itemlist.location[document.itemlist.location.selectedIndex].value;
        var currentUrl = url.indexOf("location") == -1 ? true : false;
        if (currentUrl) {
            var searchString = '?location=';
            searchString = url.indexOf("?") == -1 ? searchString : '&location=';
        } else {
            url = url.split('location')[0];
            var searchString = 'location=';
        }
        document.itemlist.action = url + searchString + formAction;
        document.getElementById('itemlist').submit();
    }
</script> 