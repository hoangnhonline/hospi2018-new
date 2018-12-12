<link href="<?php echo $theme_url; ?>asset/css/responsive-bestchoise.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo $theme_url; ?>plugins/jslider/js/jshashtable-2.1_src.js"></script>
<script type="text/javascript" src="<?php echo $theme_url; ?>plugins/jslider/js/jquery.numberformatter-1.2.3.js"></script>
<script type="text/javascript" src="<?php echo $theme_url; ?>plugins/jslider/js/tmpl.js"></script>
<script type="text/javascript" src="<?php echo $theme_url; ?>plugins/jslider/js/jquery.dependClass-0.1.js"></script>
<script type="text/javascript" src="<?php echo $theme_url; ?>plugins/jslider/js/draggable-0.1.js"></script>
<script type="text/javascript" src="<?php echo $theme_url; ?>plugins/jslider/js/jquery.slider.js"></script>
<link rel="stylesheet" href="<?php echo $theme_url; ?>plugins/jslider/css/jslider.css" type="text/css">
<link rel="stylesheet" href="<?php echo $theme_url; ?>plugins/jslider/css/jslider.round.css" type="text/css">
<?php if($appModule == "offers"){ ?>
<div class="container offer-banners">
    <div id="carousel-banner" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <?php //$str = run_widget(82);
                //preg_match('~{p}([^{]*){/p}~i', $str, $match);
                //var_dump($match[1]); 
                $input = get_widget_content(82);
                preg_match_all('/<img[^>]+>/i',$input, $result); 
                //print_r($result);
                $i=0;
                foreach($result[0] as $img) 
                  { 
                    if($i==0) {
                    echo "<div class='item active'>";
                    } else {
                    echo "<div class='item'>";
                    }
                      echo $img;
                    echo "</div>";
                    $i++;
                }
                
                ?>
        </div>
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php $total = count($result[0]);?>
            <?php for($j=0;$j<$total;$j++) {
                if($j==0) {
                    echo "<li data-target='#carousel-banner' data-slide-to='".$j."' class='active'></li>";
                }
                else {
                    echo "<li data-target='#carousel-banner' data-slide-to='".$j."'></li>";
                }
                }
                ?>
        </ol>
    </div>
    <!-- Carousel -->
    <?php } ?>
    <div class="clearfix"></div>
    <ul class="offer-banner-bottom hidden-xs">
        <li><a href="<?php echo base_url();?>offers"><?php echo trans('0580'); ?></a></li>
        <li class="active"><a href="#"><?php echo "Best choice" ;//trans('0558'); ?></a></li>
        <li><a href="<?php echo base_url();?>combo"><?php echo trans('0559'); ?></a></li>
    </ul>
    <div class="visible-xs col-xs-12 offer-content-menu-promotion no-padding-mobile text-center">
       <ul class="">
          <li ><a href="<?php echo base_url();?>offers">Khuyến mãi</a></li>
          <li class="active"><a href="#">Best choice</a></li>
          <li><a href="<?php echo base_url();?>combo">Combo</a></li>
      </ul>
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
                <h1 class="h1-offers">Best choice</h1>
                <div style="color: #666666; font-size: 15px;">Bestchoice là trang được Hospi lựa chọn những khách sạn resort tốt nhất (Đẹp nhất , sang chảnh nhất , yêu thích nhất ) để giới thiệu đến bạn và đặc biệt khi bạn nghỉ dưỡng tại những khách sạn /resort được Hospi giới thiệu tại đây chắc chắn sẽ đem đến cho bạn những trải nghiệm tuyệt vời ...</div>
                <div style="margin-top:30px" class="titl-best-choise">
                    <span style="color: #666666; font-size: 16px;">Bạn muốn tìm bestchoice ở đâu?</span>
                    <form name="itemlist" id="itemlist" class="itemlist-cus ng-pristine ng-valid" action="#" method="post">
                        <select id="location" name="location" onchange="submitform();">
                            <option value=""><?php echo trans('0690'); ?></option>
                            <?php $location = getLocations();
                                $selected = "";
                                foreach($location as $loc){
                                if($_GET['location']==$loc->id) $selected = "selected"; else $selected = "";
                                echo "<option value='".$loc->id."' ".$selected.">".$loc->location."</option>";
                            }?>
                        </select>
                    </form>
                </div>
                <div style="margin-top:15px"></div>
            </div>
                <div class="col-lg-12 col-sm-3 col-xs-12 no-padding-mobile item-conten-bestchoise hidden-xs conten-left">
                            <div class="col-lg-4 wow fadeInUp offset-0 go-right">
                                <div class="img_list" style="min-height: 207px">
                                    <a href="<?php echo base_url();?>offers/bestchoiceDetail">
                                        <img src="https://www.hospi.vn/uploads/images/offers/424732_290867_khach-san-samdi-da-nang-Hospi-(14).jpg" alt="Ưu đãi giá tốt…">
                                        <div class="short_info"></div>
                                    </a>
                                </div>
                                <span class="offer-location"><i class="fa fa-map-marker" aria-hidden="true"></i> Đà Nẵng</span>
                            </div>
                            <div class="col-lg-8 wow fadeInUp offset-0 offer-content">
                                <div class="itemlabel3 bk-tim">
                                    <img src="<?php echo $theme_url; ?>images/icon-bestchoise-big.png">
                                    <div class="labelleft2 rtl_title_home">
                                        <h4 class="mtb0 RTL go-text-right offer-title-listing">
                                            <a href="<?php echo base_url();?>offers/bestchoiceDetail"><b>Ưu đãi giá tốt tại Samdi Đà Nẵng Hotel 4 sao</b></a>
                                        </h4>
                                        
                                        <p class="grey RTL">Samdi Đà Nẵng Hotel &nbsp;4 sao cách sân bay Đà Nẵng 500m, cách bãi biển…</p>

                                        <div class="offer-xemthem offer-tim">
                                          <a href="<?php echo base_url();?>offers/bestchoiceDetail">
                                                <i class="fa fa-angle-double-right" aria-hidden="true"></i> Xem ngay                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-lg-12 col-sm-3 col-xs-12 no-padding-mobile item-conten-bestchoise content-right hidden-xs">
                             <div class="col-lg-8 wow fadeInUp offset-0 offer-content">
                                <div class="itemlabel3 bk-tim">
                                  <img src="<?php echo $theme_url; ?>images/icon-bestchoise-big.png">
                                    <div class="labelleft2 rtl_title_home">
                                        <h4 class="mtb0 RTL go-text-right offer-title-listing">
                                            <a href="<?php echo base_url();?>offers/bestchoiceDetail"><b>Ưu đãi giá tốt tại AVANI Quy Nhơn Resort &amp; Spa</b></a>
                                        </h4>
                                       
                                        <p class="grey RTL">AVANI Quy Nhon Resort &amp; Spa&nbsp;gồm 63 phòng nghỉ có ban công riêng hướng biển thoáng…</p>
                                        <div class="offer-xemthem offer-tim"><a href="<?php echo base_url();?>offers/bestchoiceDetail">
                                                <i class="fa fa-angle-double-right" aria-hidden="true"></i> Xem ngay                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 wow fadeInUp offset-0 go-right">
                                <div class="img_list" style="min-height: 207px">
                                    <a href="<?php echo base_url();?>offers/bestchoiceDetail">
                                        <img src="https://www.hospi.vn/uploads/images/offers/202579_579484_Avani-quy-nhon-resort-spa-Hospi.vn-(16).jpg" alt="Ưu đãi giá tốt…">
                                        <div class="short_info"></div>
                                    </a>
                                </div>
                                <span class="offer-location"><i class="fa fa-map-marker" aria-hidden="true"></i> Quy Nhơn</span>
                            </div>
                         
                        </div>
                        <div class="col-lg-12 col-sm-3 col-xs-12 no-padding-mobile item-conten-bestchoise hidden-xs margin-top-15">
                            <div class="col-lg-4 wow fadeInUp offset-0 go-right">
                                <div class="img_list" style="min-height: 207px">
                                    <a href="<?php echo base_url();?>offers/bestchoiceDetail">
                                        <img src="https://www.hospi.vn/uploads/images/offers/865493_59144_khach-san-gold-3-da-nang-10.jpg" alt="Ưu đãi đến tháng…">
                                        <div class="short_info"></div>
                                    </a>
                                </div>
                                <span class="offer-location"><i class="fa fa-map-marker" aria-hidden="true"></i> Đà Nẵng</span>
                            </div>
                            <div class="col-lg-8 wow fadeInUp offset-0 offer-content">
                                <div class="itemlabel3 bk-tim">
                                  <img src="<?php echo $theme_url; ?>images/icon-bestchoise-big.png">
                                    <div class="labelleft2 rtl_title_home">
                                        <h4 class="mtb0 RTL go-text-right offer-title-listing">
                                            <a href="<?php echo base_url();?>offers/bestchoiceDetail"><b>Ưu đãi đến tháng 3/2018 tại Gold III Đà Nẵng</b></a>
                                        </h4>
                                       
                                        <p class="grey RTL">Khách sạn Gold III Đà Nẵng. Tiêu chuẩn 3 sao ( có gắn bảng đồng ). Tọa lạc…</p>
                                        <div class="offer-xemthem offer-tim"><a href="<?php echo base_url();?>offers/bestchoiceDetail">
                                                <i class="fa fa-angle-double-right" aria-hidden="true"></i> Xem ngay                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-3 col-xs-12 no-padding-mobile item-conten-bestchoise content-right hidden-xs">
                             <div class="col-lg-8 wow fadeInUp offset-0 offer-content">
                                <div class="itemlabel3 bk-tim">
                                  <img src="<?php echo $theme_url; ?>images/icon-bestchoise-big.png">
                                    <div class="labelleft2 rtl_title_home">
                                        <h4 class="mtb0 RTL go-text-right offer-title-listing">
                                            <a href="<?php echo base_url();?>offers/bestchoiceDetail"><b>Ưu đãi giá tốt tại AVANI Quy Nhơn Resort &amp; Spa</b></a>
                                        </h4>
                                       
                                        <p class="grey RTL">AVANI Quy Nhon Resort &amp; Spa&nbsp;gồm 63 phòng nghỉ có ban công riêng hướng biển thoáng…</p>
                                        <div class="offer-xemthem offer-tim"><a href="<?php echo base_url();?>offers/bestchoiceDetail">
                                                <i class="fa fa-angle-double-right" aria-hidden="true"></i> Xem ngay                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 wow fadeInUp offset-0 go-right">
                                <div class="img_list" style="min-height: 207px">
                                    <a href="<?php echo base_url();?>offers/bestchoiceDetail">
                                        <img src="https://www.hospi.vn/uploads/images/offers/202579_579484_Avani-quy-nhon-resort-spa-Hospi.vn-(16).jpg" alt="Ưu đãi giá tốt…">
                                        <div class="short_info"></div>
                                    </a>
                                </div>
                                <span class="offer-location"><i class="fa fa-map-marker" aria-hidden="true"></i> Quy Nhơn</span>
                            </div>
                         
                        </div>
                        <div class="col-lg-12 col-sm-3 col-xs-12 no-padding-mobile item-conten-bestchoise hidden-xs margin-top-15">
                            <div class="col-lg-4 wow fadeInUp offset-0 go-right">
                                <div class="img_list" style="min-height: 207px">
                                    <a href="<?php echo base_url();?>offers/bestchoiceDetail">
                                        <img src="https://www.hospi.vn/uploads/images/offers/865493_59144_khach-san-gold-3-da-nang-10.jpg" alt="Ưu đãi đến tháng…">
                                        <div class="short_info"></div>
                                    </a>
                                </div>
                                <span class="offer-location"><i class="fa fa-map-marker" aria-hidden="true"></i> Đà Nẵng</span>
                            </div>
                            <div class="col-lg-8 wow fadeInUp offset-0 offer-content">
                                <div class="itemlabel3 bk-tim">
                                  <img src="<?php echo $theme_url; ?>images/icon-bestchoise-big.png">
                                    <div class="labelleft2 rtl_title_home">
                                        <h4 class="mtb0 RTL go-text-right offer-title-listing">
                                            <a href="<?php echo base_url();?>offers/bestchoiceDetail"><b>Ưu đãi đến tháng 3/2018 tại Gold III Đà Nẵng</b></a>
                                        </h4>
                                       
                                        <p class="grey RTL">Khách sạn Gold III Đà Nẵng. Tiêu chuẩn 3 sao ( có gắn bảng đồng ). Tọa lạc…</p>
                                        <div class="offer-xemthem offer-tim"><a href="<?php echo base_url();?>offers/bestchoiceDetail">
                                                <i class="fa fa-angle-double-right" aria-hidden="true"></i> Xem ngay                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-3 col-xs-12 no-padding-mobile item-conten-bestchoise content-right hidden-xs">
                             <div class="col-lg-8 wow fadeInUp offset-0 offer-content">
                                <div class="itemlabel3 bk-tim">
                                  <img src="<?php echo $theme_url; ?>images/icon-bestchoise-big.png">
                                    <div class="labelleft2 rtl_title_home">
                                        <h4 class="mtb0 RTL go-text-right offer-title-listing">
                                            <a href="<?php echo base_url();?>offers/bestchoiceDetail"><b>Ưu đãi giá tốt tại AVANI Quy Nhơn Resort &amp; Spa</b></a>
                                        </h4>
                                       
                                        <p class="grey RTL">AVANI Quy Nhon Resort &amp; Spa&nbsp;gồm 63 phòng nghỉ có ban công riêng hướng biển thoáng…</p>
                                        <div class="offer-xemthem offer-tim"><a href="<?php echo base_url();?>offers/bestchoiceDetail">
                                                <i class="fa fa-angle-double-right" aria-hidden="true"></i> Xem ngay                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 wow fadeInUp offset-0 go-right">
                                <div class="img_list" style="min-height: 207px">
                                    <a href="<?php echo base_url();?>offers/bestchoiceDetail">
                                        <img src="https://www.hospi.vn/uploads/images/offers/202579_579484_Avani-quy-nhon-resort-spa-Hospi.vn-(16).jpg" alt="Ưu đãi giá tốt…">
                                        <div class="short_info"></div>
                                    </a>
                                </div>
                                <span class="offer-location"><i class="fa fa-map-marker" aria-hidden="true"></i> Quy Nhơn</span>
                            </div>
                         
                        </div>
                        <div class="col-lg-12 col-sm-3 col-xs-12 no-padding-mobile item-conten-bestchoise hidden-xs margin-top-15">
                            <div class="col-lg-4 wow fadeInUp offset-0 go-right">
                                <div class="img_list" style="min-height: 207px">
                                    <a href="<?php echo base_url();?>offers/bestchoiceDetail">
                                        <img src="https://www.hospi.vn/uploads/images/offers/865493_59144_khach-san-gold-3-da-nang-10.jpg" alt="Ưu đãi đến tháng…">
                                        <div class="short_info"></div>
                                    </a>
                                </div>
                                <span class="offer-location"><i class="fa fa-map-marker" aria-hidden="true"></i> Đà Nẵng</span>
                            </div>
                            <div class="col-lg-8 wow fadeInUp offset-0 offer-content">
                                <div class="itemlabel3 bk-tim">
                                  <img src="<?php echo $theme_url; ?>images/icon-bestchoise-big.png">
                                    <div class="labelleft2 rtl_title_home">
                                        <h4 class="mtb0 RTL go-text-right offer-title-listing">
                                            <a href="<?php echo base_url();?>offers/bestchoiceDetail"><b>Ưu đãi đến tháng 3/2018 tại Gold III Đà Nẵng</b></a>
                                        </h4>
                                       
                                        <p class="grey RTL">Khách sạn Gold III Đà Nẵng. Tiêu chuẩn 3 sao ( có gắn bảng đồng ). Tọa lạc…</p>
                                        <div class="offer-xemthem offer-tim"><a href="<?php echo base_url();?>offers/bestchoiceDetail">
                                                <i class="fa fa-angle-double-right" aria-hidden="true"></i> Xem ngay                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

<div class="col-lg-12 col-sm-3 col-xs-12 no-padding-mobile item-conten-bestchoise content-right hidden-xs">
                             <div class="col-lg-8 wow fadeInUp offset-0 offer-content">
                                <div class="itemlabel3 bk-tim">
                                  <img src="<?php echo $theme_url; ?>images/icon-bestchoise-big.png">
                                    <div class="labelleft2 rtl_title_home">
                                        <h4 class="mtb0 RTL go-text-right offer-title-listing">
                                            <a href="<?php echo base_url();?>offers/bestchoiceDetail"><b>Ưu đãi giá tốt tại AVANI Quy Nhơn Resort &amp; Spa</b></a>
                                        </h4>
                                       
                                        <p class="grey RTL">AVANI Quy Nhon Resort &amp; Spa&nbsp;gồm 63 phòng nghỉ có ban công riêng hướng biển thoáng…</p>
                                        <div class="offer-xemthem offer-tim"><a href="<?php echo base_url();?>offers/bestchoiceDetail">
                                                <i class="fa fa-angle-double-right" aria-hidden="true"></i> Xem ngay                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 wow fadeInUp offset-0 go-right">
                                <div class="img_list" style="min-height: 207px">
                                    <a href="<?php echo base_url();?>offers/bestchoiceDetail">
                                        <img src="https://www.hospi.vn/uploads/images/offers/202579_579484_Avani-quy-nhon-resort-spa-Hospi.vn-(16).jpg" alt="Ưu đãi giá tốt…">
                                        <div class="short_info"></div>
                                    </a>
                                </div>
                                <span class="offer-location"><i class="fa fa-map-marker" aria-hidden="true"></i> Quy Nhơn</span>
                            </div>
                         
                        </div>



                        <div class="col-sm-3 col-xs-12 no-padding-mobile item-conten-bestchoise visible-xs">
                            <div class="wow fadeInUp offset-0 go-right">
                                <div class="img_list" style="min-height: 207px">
                                    <a href="<?php echo base_url();?>offers/bestchoiceDetail">
                                        <img src="https://www.hospi.vn/uploads/images/offers/424732_290867_khach-san-samdi-da-nang-Hospi-(14).jpg" alt="Ưu đãi giá tốt…">
                                        <div class="short_info"></div>
                                    </a>
                                </div>
                                <span class="offer-location"><i class="fa fa-map-marker" aria-hidden="true"></i> Đà Nẵng</span>
                            </div>
                            <div class="wow fadeInUp offset-0 offer-content">
                                <div class="itemlabel3">
                                    <img src="<?php echo $theme_url; ?>images/icon-bestchoise-big.png">
                                    <div class="labelleft2 rtl_title_home">
                                        <h4 class="mtb0 RTL go-text-right offer-title-listing">
                                            <a href="<?php echo base_url();?>offers/bestchoiceDetail"><b>Ưu đãi giá tốt tại Samdi Đà Nẵng Hotel 4 sao</b></a>
                                        </h4>
                                        
                                        <p class="grey RTL">Samdi Đà Nẵng Hotel &nbsp;4 sao cách sân bay Đà Nẵng 500m, cách bãi biển…</p>
                                        <div class="offer-xemthem">
                                          <a href="<?php echo base_url();?>offers/bestchoiceDetail">
                                                <i class="fa fa-angle-double-right" aria-hidden="true"></i> Xem ngay                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                          <div class="col-sm-3 col-xs-12 no-padding-mobile item-conten-bestchoise visible-xs">
                            <div class="wow fadeInUp offset-0 go-right">
                                <div class="img_list" style="min-height: 207px">
                                    <a href="<?php echo base_url();?>offers/bestchoiceDetail">
                                        <img src="https://www.hospi.vn/uploads/images/offers/202579_579484_Avani-quy-nhon-resort-spa-Hospi.vn-(16).jpg" alt="Ưu đãi giá tốt…">
                                        <div class="short_info"></div>
                                    </a>
                                </div>
                                <span class="offer-location"><i class="fa fa-map-marker" aria-hidden="true"></i> Quy Nhơn</span>
                            </div>
                            <div class="wow fadeInUp offset-0 offer-content">
                                <div class="itemlabel3">
                                  <img src="<?php echo $theme_url; ?>images/icon-bestchoise-big.png">
                                    <div class="labelleft2 rtl_title_home">
                                        <h4 class="mtb0 RTL go-text-right offer-title-listing">
                                            <a href="<?php echo base_url();?>offers/bestchoiceDetail"><b>Ưu đãi giá tốt tại AVANI Quy Nhơn Resort &amp; Spa</b></a>
                                        </h4>
                                       
                                        <p class="grey RTL">AVANI Quy Nhon Resort &amp; Spa&nbsp;gồm 63 phòng nghỉ có ban công riêng hướng biển thoáng…</p>
                                        <div class="offer-xemthem"><a href="<?php echo base_url();?>offers/bestchoiceDetail">
                                                <i class="fa fa-angle-double-right" aria-hidden="true"></i> Xem ngay                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-sm-3 col-xs-12 no-padding-mobile item-conten-bestchoise visible-xs">
                            <div class="wow fadeInUp offset-0 go-right">
                                <div class="img_list" style="min-height: 207px">
                                    <a href="<?php echo base_url();?>offers/bestchoiceDetail">
                                        <img src="https://www.hospi.vn/uploads/images/offers/865493_59144_khach-san-gold-3-da-nang-10.jpg" alt="Ưu đãi đến tháng…">
                                        <div class="short_info"></div>
                                    </a>
                                </div>
                                <span class="offer-location"><i class="fa fa-map-marker" aria-hidden="true"></i> Đà Nẵng</span>
                            </div>
                            <div class="wow fadeInUp offset-0 offer-content">
                                <div class="itemlabel3">
                                  <img src="<?php echo $theme_url; ?>images/icon-bestchoise-big.png">
                                    <div class="labelleft2 rtl_title_home">
                                        <h4 class="mtb0 RTL go-text-right offer-title-listing">
                                            <a href="<?php echo base_url();?>offers/bestchoiceDetail"><b>Ưu đãi đến tháng 3/2018 tại Gold III Đà Nẵng</b></a>
                                        </h4>
                                       
                                        <p class="grey RTL">Khách sạn Gold III Đà Nẵng. Tiêu chuẩn 3 sao ( có gắn bảng đồng ). Tọa lạc…</p>
                                        <div class="offer-xemthem"><a href="<?php echo base_url();?>offers/bestchoiceDetail">
                                                <i class="fa fa-angle-double-right" aria-hidden="true"></i> Xem ngay                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-sm-3 col-xs-12 no-padding-mobile item-conten-bestchoise visible-xs">
                            <div class="wow fadeInUp offset-0 go-right">
                                <div class="img_list" style="min-height: 207px">
                                    <a href="https://www.hospi.vn/offers/uu-dai-tai-sanctuary-ho-tram-resort-nam-2018">
                                        <img src="https://www.hospi.vn/uploads/images/offers/350012_836178_Sanctuary-Ho-Tram-Resort---Hospi-(9).jpg" alt="Ưu đãi tại Sanctuary…">
                                        <div class="short_info"></div>
                                    </a>
                                </div>
                                <span class="offer-location"><i class="fa fa-map-marker" aria-hidden="true"></i> Vũng Tàu</span>
                            </div>
                            <div class="wow fadeInUp offset-0 offer-content">
                                <div class="itemlabel3">
                                  <img src="<?php echo $theme_url; ?>images/icon-bestchoise-big.png">
                                    <div class="labelleft2 rtl_title_home">
                                        <h4 class="mtb0 RTL go-text-right offer-title-listing">
                                            <a href="https://www.hospi.vn/offers/uu-dai-tai-sanctuary-ho-tram-resort-nam-2018"><b>Ưu đãi tại Sanctuary Hồ Tràm Resort&nbsp; năm 2018</b></a>
                                        </h4>
                                       
                                        <p class="grey RTL">Sanctuary Hồ Tràm Resort&nbsp;với gam màu trắng chủ đạo tạo nên sự trang nhã và…</p>
                                        <div class="offer-xemthem"><a href="https://www.hospi.vn/offers/uu-dai-tai-sanctuary-ho-tram-resort-nam-2018">
                                                <i class="fa fa-angle-double-right" aria-hidden="true"></i> Xem ngay                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="margin-bottom:10px;"></div>
                        <div class="col-sm-3 col-xs-12 no-padding-mobile item-conten-bestchoise visible-xs">
                            <div class="wow fadeInUp offset-0 go-right">
                                <div class="img_list style="min-height: 207px"">
                                    <a href="https://www.hospi.vn/offers/uu-dai-nam-2018-tai-swiss-village-resort-spa-sao">
                                        <img src="https://www.hospi.vn/uploads/images/offers/461989_110606_Swiss-Village-Resort-&amp;-Spa---Hospi-(1).jpg" alt="Ưu đãi năm 2018…">
                                        <div class="short_info"></div>
                                    </a>
                                </div>
                                <span class="offer-location"><i class="fa fa-map-marker" aria-hidden="true"></i> Mũi Né</span>
                            </div>
                            <div class="wow fadeInUp offset-0 offer-content">
                                <div class="itemlabel3">
                                  <img src="<?php echo $theme_url; ?>images/icon-bestchoise-big.png">
                                    <div class="labelleft2 rtl_title_home">
                                        <h4 class="mtb0 RTL go-text-right offer-title-listing">
                                            <a href="https://www.hospi.vn/offers/uu-dai-nam-2018-tai-swiss-village-resort-spa-sao"><b>Ưu đãi năm 2018 tại Swiss Village Resort &amp; Spa  sao</b></a>
                                        </h4>
                                       
                                        <p class="grey RTL">Swiss Village Resort &amp; Spa&nbsp;cách trung tâm Thành phố Phan Thiết 12 km, cách ga Phan…</p>
                                        <div class="offer-xemthem"><a href="https://www.hospi.vn/offers/uu-dai-nam-2018-tai-swiss-village-resort-spa-sao">
                                                <i class="fa fa-angle-double-right" aria-hidden="true"></i> Xem ngay                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-sm-3 col-xs-12 no-padding-mobile item-conten-bestchoise visible-xs">
                            <div class="wow fadeInUp offset-0 go-right">
                                <div class="img_list" style="min-height: 207px">
                                    <a href="https://www.hospi.vn/offers/uu-dai-tai-nam-nghi-phu-quoc-resort-sang-chanh-cho-2-khach">
                                        <img src="https://www.hospi.vn/uploads/images/offers/575389_nam-nghi-phu-quoc-resort---hospi-(11).jpg" alt="Ưu đãi tại Nam…">
                                        <div class="short_info"></div>
                                    </a>
                                </div>
                                <span class="offer-location"><i class="fa fa-map-marker" aria-hidden="true"></i> Phú Quốc</span>
                            </div>
                            <div class="wow fadeInUp offset-0 offer-content">
                                <div class="itemlabel3">
                                  <img src="<?php echo $theme_url; ?>images/icon-bestchoise-big.png">
                                    <div class="labelleft2 rtl_title_home">
                                        <h4 class="mtb0 RTL go-text-right offer-title-listing">
                                            <a href="https://www.hospi.vn/offers/uu-dai-tai-nam-nghi-phu-quoc-resort-sang-chanh-cho-2-khach"><b>Ưu đãi tại Nam Nghi Phú Quốc resort sang chảnh cho 2 khách</b></a>
                                        </h4>
                                       
                                        <p class="grey RTL">Nam Nghi Phu Quoc Island&nbsp; nằm cách thị trấn Dương Đông – Phú Quốc khoảng 25…</p>
                                        <div class="offer-xemthem"><a href="https://www.hospi.vn/offers/uu-dai-tai-nam-nghi-phu-quoc-resort-sang-chanh-cho-2-khach">
                                                <i class="fa fa-angle-double-right" aria-hidden="true"></i> Xem ngay                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-sm-3 col-xs-12 no-padding-mobile item-conten-bestchoise visible-xs">
                            <div class="wow fadeInUp offset-0 go-right">
                                <div class="img_list" style="min-height: 207px">
                                    <a href="https://www.hospi.vn/offers/uu-dai-gia-tot-den-31-06-2018-tai-royal-hoi-an-mgallery-by-sofitel">
                                        <img src="https://www.hospi.vn/uploads/images/offers/617977_Royal-Hoi-An,-MGallery-by-Sofitel.jpg" alt="Ưu đãi giá tốt…">
                                        <div class="short_info"></div>
                                    </a>
                                </div>
                                <span class="offer-location"><i class="fa fa-map-marker" aria-hidden="true"></i> Hội An</span>
                            </div>
                            <div class="wow fadeInUp offset-0 offer-content">
                                <div class="itemlabel3">
                                  <img src="<?php echo $theme_url; ?>images/icon-bestchoise-big.png">
                                    <div class="labelleft2 rtl_title_home">
                                        <h4 class="mtb0 RTL go-text-right offer-title-listing">
                                            <a href="https://www.hospi.vn/offers/uu-dai-gia-tot-den-31-06-2018-tai-royal-hoi-an-mgallery-by-sofitel"><b>Ưu đãi giá tốt đến 31.06.2018 tại Royal Hoi An, MGallery by Sofitel</b></a>
                                        </h4>
                                       
                                        <p class="grey RTL">Khách sạn Royal Hoi An, MGallery by Sofitel&nbsp;là một khách sạn sang trọng thuộc dòng…</p>
                                        <div class="offer-xemthem"><a href="https://www.hospi.vn/offers/uu-dai-gia-tot-den-31-06-2018-tai-royal-hoi-an-mgallery-by-sofitel">
                                                <i class="fa fa-angle-double-right" aria-hidden="true"></i> Xem ngay                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-12 no-padding-mobile item-conten-bestchoise visible-xs">
                            <div class="wow fadeInUp offset-0 go-right">
                                <div class="img_list" style="min-height: 207px">
                                    <a href="<?php echo base_url();?>offers/bestchoiceDetail">
                                        <img src="https://www.hospi.vn/uploads/images/offers/299436_sapa-jade-hill.jpg" alt="Ưu đãi giá tối…">
                                        <div class="short_info"></div>
                                    </a>
                                </div>
                                <span class="offer-location"><i class="fa fa-map-marker" aria-hidden="true"></i> Sapa</span>
                            </div>
                            <div class="wow fadeInUp offset-0 offer-content">
                                <div class="itemlabel3">
                                  <img src="<?php echo $theme_url; ?>images/icon-bestchoise-big.png">
                                    <div class="labelleft2 rtl_title_home">
                                        <h4 class="mtb0 RTL go-text-right offer-title-listing">
                                            <a href="<?php echo base_url();?>offers/bestchoiceDetail"><b>Ưu đãi giá tối tại Sapa Jade Hill Resort</b></a>
                                        </h4>
                                       
                                        <p class="grey RTL">Sapa Jade Hill Resort&nbsp;tọa lạc ngay tại phố Mường Hoa, bên cạnh sườn núi Hàm Rồng,…</p>
                                        <div class="offer-xemthem"><a href="<?php echo base_url();?>offers/bestchoiceDetail">
                                                <i class="fa fa-angle-double-right" aria-hidden="true"></i> Xem ngay                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="margin-bottom:10px;"></div>
                        <div class="col-sm-3 col-xs-12 no-padding-mobile item-conten-bestchoise visible-xs">
                            <div class="wow fadeInUp offset-0 go-right">
                                <div class="img_list" style="min-height: 207px">
                                    <a href="<?php echo base_url();?>offers/bestchoiceDetail">
                                        <img src="https://www.hospi.vn/uploads/images/offers/49715_6.jpg" alt="Ưu đãi giảm giá…">
                                        <div class="short_info"></div>
                                    </a>
                                </div>
                                <span class="offer-location"><i class="fa fa-map-marker" aria-hidden="true"></i> Sapa</span>
                            </div>
                            <div class="wow fadeInUp offset-0 offer-content">
                                <div class="itemlabel3">
                                  <img src="<?php echo $theme_url; ?>images/icon-bestchoise-big.png">
                                    <div class="labelleft2 rtl_title_home">
                                        <h4 class="mtb0 RTL go-text-right offer-title-listing">
                                            <a href="<?php echo base_url();?>offers/bestchoiceDetail"><b>Ưu đãi giảm giá khi đặt phòng trước 30 ngày tại Amazing Sapa</b></a>
                                        </h4>
                                        
                                        <p class="grey RTL">Ưu đãi giảm giá khi đặt phòng trước 30 ngày tại Amazing Sapa Thời gian áp…</p>
                                        <div class="offer-xemthem"><a href="<?php echo base_url();?>offers/bestchoiceDetail">
                                                <i class="fa fa-angle-double-right" aria-hidden="true"></i> Xem ngay                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="margin-bottom:10px;"></div>
                        <div class="col-sm-3 col-xs-12 no-padding-mobile item-conten-bestchoise visible-xs">
                            <div class="wow fadeInUp offset-0 go-right">
                                <div class="img_list" style="min-height: 207px">
                                    <a href="<?php echo base_url();?>offers/bestchoiceDetail">
                                        <img src="https://www.hospi.vn/uploads/images/offers/767122_furama-villas-da-nang-1.jpg" alt="Combo nghỉ dưỡng…">
                                        <div class="short_info"></div>
                                    </a>
                                </div>
                                <span class="offer-location"><i class="fa fa-map-marker" aria-hidden="true"></i> Đà Nẵng</span>
                            </div>
                            <div class="wow fadeInUp offset-0 offer-content">
                                <div class="itemlabel3">
                                  <img src="<?php echo $theme_url; ?>images/icon-bestchoise-big.png">
                                    <div class="labelleft2 rtl_title_home">
                                        <h4 class="mtb0 RTL go-text-right offer-title-listing">
                                            <a href="<?php echo base_url();?>offers/bestchoiceDetail"><b>Combo nghỉ dưỡng Furama Villas Đà Nẵng 5 sao + buffet hải sản tôm hùm chỉ 2.190.000 VND/khách</b></a>
                                        </h4>
                                       
                                        <p class="grey RTL">Combo nghỉ dưỡng Furama Villas Đà Nẵng 5 sao + buffet hải sản tôm hùm chỉ &nbsp;2.190.000…</p>
                                        <div class="offer-xemthem"><a href="<?php echo base_url();?>offers/bestchoiceDetail">
                                                <i class="fa fa-angle-double-right" aria-hidden="true"></i> Xem ngay                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                           <div class="col-sm-3 col-xs-12 no-padding-mobile item-conten-bestchoise visible-xs">
                            <div class="wow fadeInUp offset-0 go-right">
                                <div class="img_list" style="min-height: 207px">
                                    <a href="<?php echo base_url();?>offers/bestchoiceDetail">
                                        <img src="https://www.hospi.vn/uploads/images/offers/600638_VNTLB_-VILLAS-_LIVING-ROOM.jpg" alt="Chương trình Voucher…">
                                        <div class="short_info"></div>
                                    </a>
                                </div>
                                <span class="offer-location"><i class="fa fa-map-marker" aria-hidden="true"></i> Nha Trang</span>
                            </div>
                            <div class="wow fadeInUp offset-0 offer-content">
                                <div class="itemlabel3">
                                  <img src="<?php echo $theme_url; ?>images/icon-bestchoise-big.png">
                                    <div class="labelleft2 rtl_title_home">
                                        <h4 class="mtb0 RTL go-text-right offer-title-listing">
                                            <a href="<?php echo base_url();?>offers/bestchoiceDetail"><b>Chương trình Voucher 2N1Đ siêu hot tại Vinpearl Nha Trang Long Beach Villas&nbsp;bao gồm ăn 3 bữa + vé vào khu vui chơi và Safari không giới hạn</b></a>
                                        </h4>
                                      
                                        <p class="grey RTL">Chương trình Voucher 2N1Đ siêu hot tại Vinpearl Nha Trang Long Beach Villas&nbsp;bao gồm ăn 3 bữa…</p>
                                        <div class="offer-xemthem"><a href="<?php echo base_url();?>offers/bestchoiceDetail">
                                                <i class="fa fa-angle-double-right" aria-hidden="true"></i> Xem ngay                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                          <div class="col-sm-3 col-xs-12 no-padding-mobile item-conten-bestchoise visible-xs">
                            <div class="wow fadeInUp offset-0 go-right">
                                <div class="img_list" style="min-height: 207px">
                                    <a href="<?php echo base_url();?>offers/bestchoiceDetail">
                                        <img src="https://www.hospi.vn/uploads/images/offers/719404_vinpearl-phu-quoc-resort-0.jpg" alt="Chương trình Voucher…">
                                        <div class="short_info"></div>
                                    </a>
                                </div>
                                <span class="offer-location"><i class="fa fa-map-marker" aria-hidden="true"></i> Phú Quốc</span>
                            </div>
                            <div class="wow fadeInUp offset-0 offer-content">
                                <div class="itemlabel3">
                                  <img src="<?php echo $theme_url; ?>images/icon-bestchoise-big.png">
                                    <div class="labelleft2 rtl_title_home">
                                        <h4 class="mtb0 RTL go-text-right offer-title-listing">
                                            <a href="<?php echo base_url();?>offers/bestchoiceDetail"><b>Chương trình Voucher 2N1Đ siêu hot tại Vinpearl Phú Quốc bao gồm ăn 3 bữa, đón tiễn sân bay + vé vào khu vui chơi và Safari không giới hạn</b></a>
                                        </h4>
                                       
                                        <p class="grey RTL">Chương trình Voucher 2N1Đ siêu hot tại Vinpearl Phú Quốc bao gồm ăn 3 bữa, đón tiễn…</p>
                                        <div class="offer-xemthem"><a href="<?php echo base_url();?>offers/bestchoiceDetail">
                                                <i class="fa fa-angle-double-right" aria-hidden="true"></i> Xem ngay                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                        <div class="clearfix"></div>
                <div class="col-md-12 text-center go-right margin-top-30"><ul class="pagination"><li class="active"><span>1<!--<span--></span></li><li><a href="https://www.hospi.vn/offers?page=2">2</a></li><li><a href="https://www.hospi.vn/offers?page=2">»</a></li></ul></div>
                            <!-- End of offset1-->
            <!-- start EAN multiple locations found and load more hotels -->
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