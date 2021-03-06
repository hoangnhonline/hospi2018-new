<?php if (isset($_GET['searching']) && !empty($_GET['searching'])) { ?>
<div class="block-breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Trang chủ</a></li>
            <li><a href="<?php echo base_url(); ?>hotels">Khách sạn</a></li>
            <li class="active"><?php echo $city_name; ?></li>
        </ol>
    </div>
</div><!-- block-breadcrumb -->
<div class="container offer-banners">
    <div id="carousel-banner" class="banner-by-location carousel slide" data-ride="carousel">
        <?php //echo run_widget(get_widget_id($_GET['searching'], "Hotel"));
            $image = PT_LOCATION_IMAGES.get_location_hotel_image($_GET['searching']);
            echo '<img alt="'.$city_name.'" src="'.$image.'">';
            ?>
        <div class="search-result-location">
            <div class="result-location-title"><?php echo $city_name; ?></div>
            <a data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap"><i class="icon-location-6"></i> <?php echo trans('067'); ?></a>
        </div>
    </div>
</div><!-- container offer-banners -->
<?php } else { ?>
<div class="listing-search hidden-xs">
    <form class="container" action="<?php echo base_url() . $appModule; ?>/search" method="GET">
        <div class="col-md-3 col-lg-4 col-sm-12 go-right" ng-controller="autoSuggest">
            <div class="form-group">
                <div class="clearfix"></div>
                <label class="control-label go-right"><i class="icon-location-6"></i> <?php echo trans('0254'); ?></label>
                <div class="clearfix"></div>
                <!--<div angucomplete-alt id="<?php $appModule; ?>Search" input-name="txtSearch" initial-value="txtSearch" placeholder="<?php echo trans('0526'); ?>" pause="500" selected-object="selectedItem" remote-url="<?php echo base_url(); ?>home/suggestions/<?php echo $appModule; ?>" remote-url-request-formatter="remoteUrlRequestFn" remote-url-data-field="items" title-field="name" description-field="" minlength="2" input-class="form-control form-control-small" match-class="highlight">
                    </div>-->
                <input id="search" name="txtSearch" class="form-control form-control-small" placeholder="<?php echo trans('026');?>"/>
                <div id="autocomlete-container"></div>
                <input id="searching" type="hidden" name="searching" value="{{searching}}"> <input id="modType" type="hidden" name="modType" value="{{modType}}">
            </div>
        </div>
        <!-- start hotels checkin checkout fields -->
        <?php if ($appModule == "hotels") { ?>
        <div class="col-md-2 col-sm-6 col-xs-6 go-right">
            <div class="form-group">
                <div class="clearfix"></div>
                <label class="control-label go-right size13"><i class="icon-calendar-7"></i> <?php echo trans('07'); ?></label>
                <input type="text" placeholder="<?php echo trans('07'); ?> " name="checkin" class="form-control mySelectCalendar dpd1" value="<?php echo @$checkin; ?>" required >
            </div>
        </div>
        <div class="col-md-2 col-sm-6 col-xs-6 go-right">
            <div class="form-group">
                <div class="clearfix"></div>
                <label class="control-label go-right size13"><i class="icon-calendar-7"></i> <?php echo trans('09'); ?></label>
                <input type="text" placeholder="<?php echo trans('09'); ?> " name="checkout" class="form-control mySelectCalendar dpd2" value="<?php echo @$checkout; ?>" required >
            </div>
        </div>
        <?php } ?>
        <!-- end hotels checkin checkout fields -->
        <div class="col-md-2 col-lg-1 col-sm-6 col-xs-6 go-right">
            <div class="form-group">
                <div class="clearfix"></div>
                <label class="control-label go-right size13" style="white-space:nowrap;"><i class="icon-user-7"></i> <?php if ($appModule == "hotels") {
                    echo trans('010');
                    } else if ($appModule == "tours") {
                    echo trans('0446');
                    } ?></label>
                <select  required class="form-control" placeholder=" <?php echo trans(''); ?> " name="adults" id="adults">
                    <?php for ($Selectadults = 1; $Selectadults < 11; $Selectadults++) { ?>
                    <option value="<?php echo $Selectadults; ?>" <?php if ($Selectadults == $modulelib->adults) {
                        echo "selected";
                        } ?> > <?php echo $Selectadults; ?> </option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <!-- start hotels child field -->
        <?php if ($appModule == "hotels") { ?>
        <div class="hidden-md col-lg-1 col-sm-6 col-xs-6 go-right">
            <div class="form-group">
                <div class="clearfix"></div>
                <label class="control-label go-right size13"><i class="icon-user-7"></i> <?php echo trans('011'); ?></label>
                <select  class="form-control" placeholder=" <?php echo trans('011'); ?> " name="child" id="child">
                    <?php for ($Selectchild = 0; $Selectchild < 6; $Selectchild++) { ?>
                    <option value="<?php echo $Selectchild; ?>" <?php if ($Selectchild == @$modulelib->children) {
                        echo "selected";
                        } ?> > <?php echo $Selectchild; ?> </option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <?php } ?>
        <?php
            if (strpos($city_name, "-khu-vuc-") !== false) {
                $ok = substr($city_name, strpos($city_name, "-khu-vuc-") + 9);
                echo '<input type="hidden" name="near" value="' . $ok . '">';
            }
            ?>
        <!-- end hotels child field -->
        <div class="visible-sm visible-xs">
            <div class="clearfix"></div>
        </div>
        <div class="col-md-3 col-lg-2 col-xs-12 col-sm-12 go-right">
            <div class="form-group">
                <div class="clearfix"></div>
                <label class="control-label go-right size13">&nbsp;</label>
                <button style="font-size: 14px;" type="submit" class="btn btn-block btn-action"><?php echo trans('012'); ?></button>
            </div>
        </div>
        <div class="clearfix"></div>
    </form>
</div><!-- listing-search -->
<?php } ?>

<div class="container pagecontainer hidden-xs">
    <div class="clearfix"></div>
    <!-- FILTERS -->
    <div class="col-md-3 filters offset-0 go-right">
        <div class="block-module">
            <div class="block-md-item">
                <?php if (isset($_GET['searching'])) { ?>
                <form class="" action="<?php echo base_url() . $appModule; ?>/search" method="GET">
                    <button type="button" class="collapsebtn go-text-right" data-toggle="collapse" data-target="#txtsearch">
                    <?php echo trans('0693'); ?> <span class="collapsearrow"></span>
                    </button>
                    <div id="txtsearch" class="collapse in collapse-br">
                        <div class="block-content">
                            <br>
                            <div class="col-md-12 col-sm-12 go-right" ng-controller="autoSuggest">
                                <div class="form-group">
                                    <div class="clearfix"></div>
                                    <input id="search" name="txtSearch" value="<?php echo $city_name; ?>" class="form-control form-control-small" placeholder="<?php echo trans('026');?>"/>
                                    <div id="autocomlete-container"></div>
                                    <input id="searching" type="hidden" name="searching" value="{{searching}}"> <input id="modType" type="hidden" name="modType" value="{{modType}}">
                                </div>
                            </div>
                            <!-- start hotels checkin checkout fields -->
                            <?php if ($appModule == "hotels") { ?>
                            <div class="col-md-12 col-sm-12 col-xs-12 go-right">
                                <div class="form-group">
                                    <div class="clearfix"></div>
                                    <input type="text" placeholder="<?php echo trans('07'); ?> " name="checkin" class="form-control mySelectCalendar dpd1" value="<?php echo @$checkin; ?>" required >
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 go-right">
                                <div class="form-group">
                                    <div class="clearfix"></div>
                                    <input type="text" placeholder="<?php echo trans('09'); ?> " name="checkout" class="form-control mySelectCalendar dpd2" value="<?php echo @$checkout; ?>" required >
                                </div>
                            </div>
                            <?php } ?>
                            <!-- end hotels checkin checkout fields -->
                            <div class="col-md-12 col-sm-12 col-xs-12 go-right">
                                <div class="form-group">
                                    <div class="clearfix"></div>
                                    <select  required class="form-control" placeholder=" <?php echo trans(''); ?> " name="adults" id="adults">
                                        <?php for ($Selectadults = 1; $Selectadults < 11; $Selectadults++) { ?>
                                        <option value="<?php echo $Selectadults; ?>" <?php if ($Selectadults == $modulelib->adults) {
                                            echo "selected";
                                            } ?> > <?php echo $Selectadults; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <!-- start hotels child field -->
                            <?php if ($appModule == "hotels") { ?>
                            <div class="col-md-12 col-sm-12 col-xs-12 go-right">
                                <div class="form-group">
                                    <div class="clearfix"></div>
                                    <select  class="form-control" placeholder=" <?php echo trans('011'); ?> " name="child" id="child">
                                        <?php for ($Selectchild = 0; $Selectchild < 6; $Selectchild++) { ?>
                                        <option value="<?php echo $Selectchild; ?>" <?php if ($Selectchild == @$modulelib->children) {
                                            echo "selected";
                                            } ?> > <?php echo $Selectchild; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <?php } ?>
                            <?php
                                if (strpos($city_name, "-khu-vuc-") !== false) {
                                    $ok = substr($city_name, strpos($city_name, "-khu-vuc-") + 9);
                                    echo '<input type="hidden" name="near" value="' . $ok . '">';
                                }
                                ?>
                            <!-- start coupon child field -->
                            <div class="col-md-12 col-sm-12 col-xs-12 go-right">
                                <div class="form-group">
                                    <div class="coupon">
                                      <input type="text" class="form-control form-control-small inputcoupon" name="inputcoupon" placeholder="<?php echo trans('0745');?>" style="padding-right: 20px;">
                                      <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right" title="Bạn có mã giảm giá ưu đãi từ HOSPI vui lòng nhập mã ưu đãi vào đây, số tiền tương ứng sẽ được trừ vào đơn phòng"></i> 
                                    </div>
                                </div>
                            </div>
                            <!-- end hotels child field -->
                            <div class="visible-sm visible-xs">
                                <div class="clearfix"></div>
                            </div>
                            <div class="go-right" style="width: 190px; margin: 0 auto;">
                                <div class="form-group">
                                    <div class="clearfix"></div>
                                    <button style="font-size: 14px;margin-top: 6px;" type="submit" class="btn btn-block btn-action"><?php echo trans('012'); ?></button>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </form>
                <?php } ?>
            </div>
        </div>
        <div class="block-module">
            <?php 
             include 'includes/form-search-ajax.php';
            ?>
        </div>        
        
    </div>
    <!-- END OF FILTERS -->
    <div class="visible-xs"><br><br></div>
    <!-- LIST CONTENT-->
    <div class="rightcontent col-md-9 offset-0" id="right-content">
        <div class="itemscontainer offset-1 hotels">
            <div class="offset-2">
                <div class="bg-form-arrangement">
                    <form name="orderbylist" id="orderbylist" action="" method="GET">
                        <input type="hidden" name="price" value="<?php if (!empty($_GET['price'])) {
                            echo $_GET['price'];
                            } ?>">
                        <input type="hidden" name="stars" value="<?php if (!empty($_GET['stars'])) {
                            echo $_GET['stars'];
                            } ?>">
                        <input type="hidden" name="type" value="<?php if (!empty($_GET['type'])) {
                            echo $_GET['type'];
                            } ?>">
                        <input type="hidden" name="issale" value="<?php if (!empty($_GET['issale'])) {
                            echo $_GET['issale'];
                            } ?>">
                        <input type="hidden" name="uudai" value="<?php if (!empty($_GET['uudai'])) {
                            echo $_GET['uudai'];
                            } ?>">
                        <input type="hidden" name="pickup" value="<?php if (!empty($_GET['pickup'])) {
                            echo $_GET['pickup'];
                            } ?>">
                        <input type="hidden" name="amenities" value="<?php if (!empty($_GET['amenities'])) {
                            echo $_GET['amenities'];
                            } ?>">
                        <input type="hidden" name="near" value="<?php if (!empty($_GET['near'])) {
                            echo $_GET['near'];
                            } ?>">
                        <input type="hidden" name="txtSearch" value="<?php if (!empty($city_name)) {
                            echo $city_name;
                            } ?>">
                        <input type="hidden" name="modType" value="<?php if (!empty($_GET['modType'])) {
                            echo $_GET['modType'];
                            } ?>">
                        <input type="hidden" name="city" value="<?php if (!empty($_GET['city'])) {
                            echo $_GET['city'];
                            } else {
                            echo $selectedCity;
                            } ?>">
                        <input type="hidden" name="checkin" value="<?php if (!empty($_GET['checkin'])) {
                            echo $_GET['checkin'];
                            } ?>">
                        <input type="hidden" name="checkout" value="<?php if (!empty($_GET['checkout'])) {
                            echo $_GET['checkout'];
                            } ?>">
                        <input type="hidden" name="childages" value="<?php if (!empty($_GET['childages'])) {
                            echo $_GET['childages'];
                            } ?>">
                        <input type="hidden" name="adults" value="<?php if (!empty($_GET['adults'])) {
                            echo $_GET['adults'];
                            } ?>">
                        <input type="hidden" name="searching" value="<?php if (!empty($_GET['searching'])) {
                            echo $_GET['searching'];
                            } ?>">
                        <div class="col-md-3"><span class="sap-xep-theo andes-bold lblue"><?php echo trans('0736'); ?></span></div>
                        <div class="col-md-3"><input type="radio" id="thap-cao" name="sortby" class="hospi-checkbox sortajax" value="p_lh" <?php if ($_GET['sortby'] == "p_lh") {
                            echo 'checked="checked"';
                            } ?>>  <label for="thap-cao" class="hospi-label">&nbsp;</label>
                            <span class="txt-label"><?php echo trans('0723'); ?></span>
                        </div>
                        <div class="col-md-3"><input type="radio" id="cao-thap" name="sortby" class="hospi-checkbox sortajax" value="p_hl" <?php if ($_GET['sortby'] == "p_hl") {
                            echo 'checked="checked"';
                            } ?>>  <label for="cao-thap" class="hospi-label">&nbsp;</label>
                            <span class="txt-label"><?php echo trans('0724'); ?></span>
                        </div>
                        <div class="col-md-3"><input type="radio" id="feature" name="sortby" class="hospi-checkbox sortajax" value="featured" <?php if ($_GET['sortby'] == "featured") {
                            echo 'checked="checked"';
                            } ?>>  <label for="feature" class="hospi-label">&nbsp;</label>
                            <span class="txt-label">Yêu thích</span>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                    <?php if (isset($_GET['searching']) && !empty($_GET['searching'])) { ?>
                    <?php
                        $widget_ids = get_widget_ids($_GET['searching'], "Advert");
                        $list = array();
                        foreach ($widget_ids as $id) {
                            array_push($list, $id->widget_id);
                        }
                        ?>
                    <?php } ?>
                </div>
            </div>
            <?php
                if (!empty($module)) {
                    $i = 1;
                    $moduleForeach = isset($resultSort) ? $resultSort : $module;
                    foreach ($moduleForeach as $htl_id => $item) {
                       
                    if(isset($resultSort)){
                        $item = $module[$htl_id];                        
                    }
                    //var_dump("<pre>", $item, "</pre>");
                        ?>
            <div class="offset-2 dong-du-lieu" data-price="">
                <div class="searching-item row-eq-height">
                    <div class="wow fadeInUp col-lg-3 col-md-3 col-sm-3 offset-0 go-right tour-image">
                        <!-- Add to whishlist -->
                        <?php if ($appModule != "ean" && $appModule != "offers") { ?>
                        <span  ><?php //echo wishListInfo($appModule, $item->id); ?></span>
                        <?php } ?>
                        <!-- Add to whishlist -->
                        <?php if (is_sales_off_hotel($item->id)) $khuyenmai = "khuyenmai";
                            else $khuyenmai = ""; ?>
                        <div class="img_list <?php echo $khuyenmai; ?>">
                            <?php if (isset($_GET['honeymoon']) && !empty($_GET['honeymoon'])) { ?>
                            <a href="<?php echo base_url().'hotels/'.$item->hotel_slug; ?>/?details=<?php echo $item->roomid;?>">
                            <?php } else { ?>
                            <a href="<?php echo base_url().'hotels/'.$item->hotel_slug; ?>">
                                <?php } ?>
                                <img style="height: 100%;width: auto" src="<?php echo $item->thumbnail; ?>" alt="<?php echo character_limiter($item->title, 20); ?>">
                                <?php                                  
                                if($item->hotel_is_featured == "yes"){ ?>
                                <div class="hs_favorite">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    Yêu thích
                                </div>
                                <?php } ?>
                                <div class="short_info"></div>
                            </a>
                        </div>
                    </div>
                    <div class="wow fadeInUp col-md-9 offset-0">
                        <div class="itemlabel3 itemlabel3-cus hp_itemlabel3-cus_mb">
                            <div class="labelright go-left" style="min-width:105px;margin-left:5px">
                                <div class="purple size18 text-center">
                                    <?php 
                                        if ($item->price_status == 'Yes') {
                                        ?>
                                            <b style="display: none;">
                                                <span class="price-display" data-id="<?php echo $item->id; ?>"></span>
                                                <div class="smalltext">(<?php echo $item->currSymbol; ?>)</div>
                                                <hr>
                                            </b>
                                            <div class="clearfix"></div>
                                        
                                        <?php
                                        } else {
                                        ?>
                                            <div class='click-2get-price'>
                                                <a id="popoverData" href="#emailme<?php echo $item->id; ?>" data-toggle="modal" data-content="<?php echo trans('0800'); ?>" rel="popover" data-placement="top" data-original-title="<?php echo $item->title; ?>" data-trigger="hover">
                                                    <div class="click-a"><?php echo trans('0799'); ?></div>
                                                    <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <div class="clearfix"></div>
                                            <hr>
                                        <?php } ?>
                                   
                                   <?php if (pt_is_module_enabled('reviews')) { ?>
                                        <?php if ($item->avgReviews->overall > 0) { ?>
                                                <div class="review text-center size18"><i class="icon-thumbs-up-4"></i><?php echo $item->avgReviews->overall; ?></div>
                                                <!--<?php echo $item->avgReviews->totalReviews; ?>-->
                                                <div class="clearfix"></div>
                                                <hr>
                                        <?php } ?>
                                    <?php } ?>

                                    <?php if ($appModule == "ean") {
                                        if ($item->tripAdvisorRating > 0) { ?>
                                                <div class="review text-center size18"><i class="icon-thumbs-up-4"></i><?php echo $item->tripAdvisorRating; ?> </div>
                                                <div class="clearfix"></div>
                                                <hr>
                                        <?php }
                                    } ?>
                                    <?php if (isset($_GET['honeymoon']) && !empty($_GET['honeymoon'])) { ?>
                                    <a href="<?php echo base_url().'hotels/'.$item->hotel_slug; ?>/?details=<?php echo $item->roomid;?>">
                                    <?php } else { ?>
                                    <a href="<?php echo base_url().'hotels/'.$item->hotel_slug; ?>">
                                    <?php } ?>
                                    <button type="submit" class="btn btn-action2"><?php echo trans('0177'); ?></button>
                                    </a>
                                </div>
                            </div>
                            <div class="labelleft2 rtl_title_home description">
                                <h4 class="mtb0 RTL go-text-right hotel-name">
                                    <a href="<?php echo base_url().'hotels/'.$item->hotel_slug; ?>/<?php echo @str_replace("/", "-",$checkin); ?>/<?php echo @str_replace("/", "-",$checkout); ?>/<?php echo $adults; ?>"><b><?php echo $item->title; ?></b></a>
                                    <!-- Cars airport pickup -->  <?php if ($appModule == "cars") {
                                        if ($item->airportPickup == "yes") { ?> <button class="btn btn-success btn-xs"><i class="icon-paper-plane-2"></i> <?php echo trans('0207'); ?></button> <?php }
                                        } ?> <!-- Cars airport pickup -->
                                </h4>
                                <?php if ($appModule != "offers") { ?> <a class="go-right" href="javascript:void(0);" onclick="showMap('<?php echo base_url(); ?>home/maps/<?php echo $item->latitude; ?>/<?php echo $item->longitude; ?>/<?php echo $appModule; ?>/<?php echo $item->id; ?>', 'modal');" title="<?php echo $item->location; ?>"><i style="margin-left: -3px;" class="icon-location-6 go-right"></i><?php echo character_limiter($item->location, 10); ?></a> <span class="go-right"><?php echo $item->stars; ?></span> <?php } ?>
                                <br>
                                <ul class="itemlabel-info">
                                    <?php if(is_have_deal($item->id, 2)) { ?>
                                    <li class="hs_cb">Combo</li>
                                    <?php } ?>
                                    <?php if(is_have_deal($item->id)) { ?>
                                    <li class="hs_deal">Deals - Giảm giá</li>
                                    <?php } ?>
                                    <?php if(is_have_deal($item->id, 3)) { ?>
                                    <li class="hs_hnm">Gói honeymoon</li>
                                    <?php } ?>
                                    <?php if($item->salefrom) { ?>
                                    <li class="hs_prt">Đang khuyến mãi</li>
                                    <?php } ?>
                                    <?php if($item->salefrom) { ?>
                                    <li><span style="color:#660033">Đang khuyến mãi</span></li>
                                    <?php } ?>
                                </ul>
                                <?php 
                                    $tmp = array();
                                    if($item->diem_noi_bat){
                                        $tmp = explode(',', $item->diem_noi_bat);
                                    }
                                    ?>
                                    <?php if(!empty($tmp)){ ?>
                                    <ul class="itemlabel-info itemlabel-info-add">
                                        <?php foreach($tmp as $diemnb){ ?>
                                        <li><?php echo $diemnb; ?></li>
                                        <?php } ?>
                                    </ul>
                                    <?php } ?>
                                <?php if (is_sales_off_hotel($item->id)) { ?>
                                <div class="purple sale-off-now-icon"><?php echo trans('0709'); ?>
                                    <span class="sale-percent-star"><?php echo "-" . is_sales_off_hotel($item->id) . "%"; ?></span>
                                </div>
                                <?php } ?>
                                <p class="grey RTL des"><?php echo character_limiter($item->desc, 100); ?></p>
                                <?php if ($appModule == "hotels") { ?>
                                    <?php
                                    if ($item->vatvalue == 0 || $item->servicevalue == 0) {
                                        echo "<div class='price-include price-include_mb'>";
                                        echo trans('0700');
                                        echo "- " . trans('0701') . " ";
                                        if ($item->vatvalue == 0)
                                            echo "- " . trans('0702') . " 10% ";
                                        if ($item->servicevalue == 0)
                                            echo "- " . trans('0703') . " 5%";
                                        echo "</div>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <script type="text/javascript">
                        $(window).load(function(){
                        
                        $(".successemail<?php echo $item->id; ?>").on('click', function(){
                        var youremail = $(".youremail<?php echo $item->id; ?>").val();
                        var yourphone = $(".yourphone<?php echo $item->id; ?>").val();
                        var itemid = <?php echo $item->id; ?>;
                        var duration = "từ " + $(".dpd1").val() + " đến " + $(".dpd2").val();
                        $('#getresponse<?php echo $item->id; ?>').html('<div id="rotatingDiv"></div>');
                        $.post("<?php echo base_url(); ?>admin/ajaxcalls/laygiaEmail", {email: youremail, phone: yourphone, id: itemid, hotel: duration}, function(resp){
                        //alert(resp);
                        if (resp === "done") {
                        console.log(resp);
                        $("#getresponse<?php echo $item->id; ?>").html("");
                        $('.email-me-modal<?php echo $item->id; ?>').modal('hide');
                        $('#openModal<?php echo $item->id; ?>').modal('show');
                        var myModal = $('#openModal<?php echo $item->id; ?>');
                        clearTimeout(myModal.data('hideInterval'));
                        myModal.data('hideInterval', setTimeout(function(){
                        myModal.modal('hide');
                        }, 4000));
                        } else {alert(resp); $("#getresponse<?php echo $item->id; ?>").html("<span class='error'>Đã có lỗi xảy ra, chúng tôi đang xem xét.<span>");}
                        });
                        });
                        });
                    </script>
                    <div id="emailme<?php echo $item->id; ?>" class="modal fade email-me-modal<?php echo $item->id; ?>" tabindex="-1" data-focus-on="input:first" style="display: none;">
                        <div class="modal-dialog click-2email">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <div class="hotel-name">
                                        <?php echo trans('0801'); ?>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <div class="panel-body">
                                        <div class="col-md-12 col-sm-12 col-xs-12 go-right">
                                            <div class="form-group">
                                                <div class="clearfix"></div>
                                                <input type="text" placeholder="<?php echo trans('0804'); ?> " name="youremail" id="youremail<?php echo $item->id; ?>" class="form-control youremail<?php echo $item->id; ?>" required >
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 go-right">
                                            <div class="form-group">
                                                <div class="clearfix"></div>
                                                <input type="text" placeholder="<?php echo trans('0805'); ?> " name="yourphone" id="yourphone<?php echo $item->id; ?>" class="form-control yourphone<?php echo $item->id; ?>" required >
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <br>
                                        <div class="hotel-modal-title"><?php echo trans('0802'); ?></div>
                                        <br>
                                        <!--<a id="successemail" style="margin-bottom:5px;float:none;" href="#openModal" type="submit" class="btn btn-action chk successemail" data-toggle="modal" data-content="<?php echo trans('0800'); ?>" rel="popover" data-placement="top" data-original-title="<?php echo $item->title; ?>" data-trigger="hover"><?php echo trans('0806'); ?></a>-->
                                        <button id="successemail<?php echo $item->id; ?>" style="margin-bottom:5px;float:none;" type="submit" class="btn btn-action chk successemail<?php echo $item->id; ?>"><?php echo trans('0806'); ?></button>
                                        <div id="getresponse<?php echo $item->id; ?>"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="openModal<?php echo $item->id; ?>" class="modal fade" tabindex="-1" data-focus-on="input:first" style="display: none;">
                        <div class="modal-dialog email-confirm">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="panel-body">
                                        <div class='purple'><strong><i class='fa fa-check-square-o' aria-hidden='true'></i> <?php echo trans('0807'); ?></strong></div>
                                        <div><?php echo trans('0808'); ?></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                if ($i % 6 == 0) {
                    $random_key = array_rand($list);
                    echo '<div class="offset-2">' . run_widget($list[$random_key]) . '</div>';
                    unset($list[$random_key]);
                }
                $i++;
                $random_key = "";
                }
                ?>
            <div class="clearfix"></div>
            <div class="col-md-12 go-right">            
                <div class="block-pagination">
                    <?php echo createPagination($info); ?></div>
                </div>
            <div class="pull-right">
                <?php } else {
                    echo '<h1 class="text-center">' . trans("066") . '</h1>';
                    } ?>
            </div>
            <!-- End of offset1-->
            <!-- start EAN multiple locations found and load more hotels -->
            <?php if ($appModule == "ean") {
                if ($multipleLocations > 0) {
                    foreach ($locationInfo as $loc) { ?>
            <p><?php echo $loc->link; ?></p>
            <?php }
                } ?>
            <!--This is for display cache Parameter-->
            <div id="latest_record_para">
                <input type="hidden" name="moreResultsAvailable" id="moreResultsAvailable" value="<?php echo $moreResultsAvailable; ?>" />
                <input type="hidden" name="cacheKey" id="cacheKey" value="<?php echo $cacheKey; ?>" />
                <input type="hidden" name="cacheLocation" id="cacheLocation" value="<?php echo $cacheLocation; ?>" />
                <input type="hidden" name="" id="agesappendurl" value="<?php echo $agesApendUrl; ?>" />
                <input type="hidden" name="" id="adultsCount" value="<?php echo $adults; ?>" />
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
</div><!-- container pagecontainer -->
<!-- END OF CONTENT -->
<div class="listing-search visible-xs">
         <form class="container ng-pristine ng-valid" action="https://www.hospi.vn/hotels/search" method="GET">
            <div class="col-md-3 col-lg-4 col-sm-12 go-right hidden-xs ng-scope" ng-controller="autoSuggest">
               <div class="form-group">
                  <div class="clearfix"></div>
                  <label class="control-label go-right"><i class="icon-location-6"></i> Bạn muốn đi đâu</label>
                  <div class="clearfix"></div>
                
                  <input id="search" name="txtSearch" class="form-control form-control-small" placeholder="Nhập tên khách sạn, thành phố!">
                  <div id="autocomlete-container"></div>
                  <input id="searching" type="hidden" name="searching" value=""> <input id="modType" type="hidden" name="modType" value="">
               </div>
            </div>
         <div class="block-search-hotel-hd">
            <button type="button" class="collapsebtn go-text-right collapsed none-border" data-toggle="collapse" data-target="#collapse_menu">
                  <h3>Tìm khách sạn/resort <span class="collapsearrow"></span></h3>
            </button>
            <div id="collapse_menu" class="collapse out collapse-br">
               <div class="col-md-3 col-lg-4 col-sm-12 go-right visible-xs autoSuggest ng-scope" ng-controller="autoSuggest">
               <div class="form-group">
                 
                  <div class="clearfix"></div>
                  <!--<div angucomplete-alt id="Search" input-name="txtSearch" initial-value="txtSearch" placeholder="Nhập điểm đến, thành phố!" pause="500" selected-object="selectedItem" remote-url="https://www.hospi.vn/home/suggestions/hotels" remote-url-request-formatter="remoteUrlRequestFn" remote-url-data-field="items" title-field="name" description-field="" minlength="2" input-class="form-control form-control-small" match-class="highlight">
                     </div>-->
                  <input id="search" name="txtSearch" class="form-control form-control-small" placeholder="Nhập tên khách sạn, thành phố!">
                  <div id="autocomlete-container"></div>
                  <input id="searching" type="hidden" name="searching" value=""> <input id="modType" type="hidden" name="modType" value="">
               </div>
            </div>
            <!-- start hotels checkin checkout fields -->
            <div class="col-md-2 col-sm-6 col-xs-6 go-right input-calendar-hotel">
               <div class="form-group">
                  <div class="clearfix"></div>
                  <label class="control-label go-right size13 hidden-xs"><i class="icon-calendar-7"></i> Ngày nhận phòng</label>
                  <input type="text" placeholder="Ngày nhận phòng " name="checkin" class="form-control mySelectCalendar dpd1" value="15/01/2018" required="" autocomplete="off">
               </div>
            </div>
            <div class="col-md-2 col-sm-6 col-xs-6 go-right input-calendar-hotel">
               <div class="form-group">
                  <div class="clearfix"></div>
                  <label class="control-label go-right size13 hidden-xs"><i class="icon-calendar-7"></i> Ngày trả phòng</label>
                  <input type="text" placeholder="Ngày trả phòng " name="checkout" class="form-control mySelectCalendar dpd2" value="16/01/2018" required="">
               </div>
            </div>
            <!-- end hotels checkin checkout fields -->
            <div class="col-md-2 col-lg-1 col-sm-6 col-xs-6 go-right input-calendar-hotel">
               <div class="form-group">
                  <div class="clearfix"></div>
                  <label class="control-label go-right size13 hidden-xs" style="white-space:nowrap;"><i class="icon-user-7"></i> Người lớn</label>
                  <select required="" class="form-control" placeholder="  " name="adults" id="adults">
                      <option value="0" selected=""> Người lớn </option>
                     <option value="1"> 1 </option>
                     <option value="2"> 2 </option>
                     <option value="3"> 3 </option>
                     <option value="4"> 4 </option>
                     <option value="5"> 5 </option>
                     <option value="6"> 6 </option>
                     <option value="7"> 7 </option>
                     <option value="8"> 8 </option>
                     <option value="9"> 9 </option>
                     <option value="10"> 10 </option>
                  </select>
               </div>
            </div>
            <!-- start hotels child field -->
            <div class="hidden-md col-lg-1 col-sm-6 col-xs-6 go-right input-calendar-hotel">
               <div class="form-group">
                  <div class="clearfix"></div>
                  <label class="control-label go-right size13 hidden-xs"><i class="icon-user-7"></i> Trẻ em</label>
                  <select class="form-control" placeholder=" Trẻ em " name="child" id="child">
                     <option value="0" selected=""> Trẻ em </option>
                     <option value="1"> 1 </option>
                     <option value="2"> 2 </option>
                     <option value="3"> 3 </option>
                     <option value="4"> 4 </option>
                     <option value="5"> 5 </option>
                  </select>
               </div>
            </div>
            <!-- end hotels child field -->
            <div class="clearfix"></div>
            <div class="col-md-3 col-lg-4 col-sm-12 go-right visible-xs ma-giam-gia">
               <div class="form-group">
                 
                
                
                  <input name="magiamgia" class="form-control form-control-small" placeholder="Nhập mã giảm giá">
                 
                 
               </div>
            </div>
            <div class="col-md-3 col-lg-2 col-xs-12 col-sm-12 go-right input-calendar-hotel">
               <div class="form-group">
                  <div class="clearfix"></div>
                  <label class="control-label go-right size13 hidden-xs">&nbsp;</label>
                  <button style="font-size: 14px;" type="submit" class="btn btn-block btn-action">Tìm kiếm</button>
               </div>
            </div>

            <div class="col-md-3 col-lg-2 col-xs-12 col-sm-12 go-right input-calendar-hotel check-box-khuyenmian">
                 <label>
                   <input type="checkbox" name="issale" id="issale" value="yes"><span>Đang khuyến mãi</span>
                           
               </label>
            </div>

         </div>

      </div>

            <div class="clearfix"></div>
         </form>
      </div>
<!-- CONTENT -->
<div class="collapse" id="collapseMap">
    <div id="map" class="map"></div>
    <br>
</div><!-- #collapseMap -->      
<div class="container pagecontainer visible-xs">
         <div class="clearfix"></div>
         <!-- FILTERS -->
         <div class="col-md-3 filters offset-0 go-right">
            <div class="block-module">
               <div class="block-md-item">
               </div>
            </div>
            <div class="block-module">
               <form class="hospifilter ng-pristine ng-valid" action="https://www.hospi.vn/hotels/search" method="GET" role="search" id="formSearchAjax">
                  <!--<a class="btn btn-block btn-default" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap"><i class="icon_set_1_icon-41"></i> Xem bản đồ</a>-->
                  <!-- TOP TIP
                     <div class="filtertip">
                       <div class="padding20">
                         <h4 class="size24 text-center"><i class="icon_set_1_icon-95 go-right"></i><span>Filter Search</span> <span class="countprice"></span></h4>
                       </div>
                       <div class="clearfix"></div>
                     </div>-->
                  <div class="block-md-item">
                     <!-- Star ratings -->
                     <button type="button" class="collapsebtn go-text-right collapsed" data-toggle="collapse" data-target="#collapse11">
                     Xếp hạng sao <span class="collapsearrow"></span>
                     </button>
                     <div id="collapse11" class="collapse out collapse-br">
                        <div class="block-content">
                           <div class="hpadding20">
                              <br>
                              <div class="rating" style="font-size: 14px;">
                                 <div class="block-check-sale-sb go-right">
                                    <label class="go-left" for="1">
                                    <input id="1" type="checkbox" name="stars[]" class="go-right radio filter" value="1">
                                    <span></span>
                                    <i class="star text-warning fa fa-star voted"></i> <i class="fa fa-star-o"></i>  <i class="fa fa-star-o"></i>  <i class="fa fa-star-o"></i>  <i class="fa fa-star-o"></i>                                         </label>
                                 </div>
                                 <div class="clearfix"></div>
                                 <div class="block-check-sale-sb go-right">
                                    <label class="go-left" for="2">
                                    <input id="2" type="checkbox" name="stars[]" class="radio go-right filter" value="2">
                                    <span></span>
                                    <i class="star text-warning fa fa-star voted"></i>  <i class="star text-warning fa fa-star voted"></i>  <i class="fa fa-star-o"></i>  <i class="fa fa-star-o"></i>  <i class="fa fa-star-o"></i>                                         </label>
                                 </div>
                                 <div class="clearfix"></div>
                                 <div class="block-check-sale-sb go-right">
                                    <label class="go-left" for="3">
                                    <input id="3" type="checkbox" name="stars[]" class="radio filter" value="3">
                                    <span></span>
                                    <i class="star text-warning fa fa-star voted"></i>  <i class="star text-warning fa fa-star voted"></i>  <i class="star text-warning fa fa-star voted"></i>  <i class="fa fa-star-o"></i>  <i class="fa fa-star-o"></i>                                         </label>
                                 </div>
                                 <div class="clearfix"></div>
                                 <div class="block-check-sale-sb go-right">
                                    <label class="go-left" for="4">
                                    <input id="4" type="checkbox" name="stars[]" class="radio filter" value="4">
                                    <span></span>
                                    <i class="star text-warning fa fa-star voted"></i>  <i class="star text-warning fa fa-star voted"></i>  <i class="star text-warning fa fa-star voted"></i>  <i class="star text-warning fa fa-star voted"></i>  <i class="fa fa-star-o"></i> </label>
                                 </div>
                                 <div class="clearfix"></div>
                                 <div class="block-check-sale-sb go-right">
                                    <label class="go-left" for="5">
                                    <input id="5" type="checkbox" name="stars[]" class="radio filter" value="5">
                                    <span></span>
                                    <i class="star text-warning fa fa-star voted"></i>  <i class="star text-warning fa fa-star voted"></i>  <i class="star text-warning fa fa-star voted"></i>  <i class="star text-warning fa fa-star voted"></i>  <i class="star text-warning fa fa-star voted"></i>                                         </label>
                                 </div>
                                 <!--<div class="clearfix"></div>
                                    <div class="go-right"><input id="7" type="radio" name="stars" class="radio" value="7" >&nbsp;&nbsp;<label class="go-left" for="7"> <i class="star text-warning fa fa-star voted"></i>  <i class="star text-warning fa fa-star voted"></i>  <i class="star text-warning fa fa-star voted"></i>  <i class="star text-warning fa fa-star voted"></i>  <i class="star text-warning fa fa-star voted"></i>  <i class="star text-warning fa fa-star voted"></i>  <i class="star text-warning fa fa-star voted"></i> </label></div>-->
                              </div>
                           </div>
                           <div class="clearfix"></div>
                           <br>
                        </div>
                     </div>
                     <!-- End of Star ratings -->
                  </div>
                  <!-- block-md-item -->
                  <div class="block-md-item">
                     <!-- Price range -->
                     <button type="button" class="collapsebtn go-text-right collapsed" data-toggle="collapse" data-target="#collapse21">
                     Giá phòng <span class="collapsearrow"></span>
                     </button>
                     <div id="collapse21" class="collapse out collapse-br">
                        <div class="block-content">
                           <div class="hpadding20">
                              <br>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="Dưới 500.000" class="css-label go-left">
                                 <input type="checkbox" value="0;500000" name="price" id="Dưới 500.000" class="go-right radio filter-price">
                                 <span></span>
                                 Dưới 500.000
                                 </label>
                              </div>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="Từ 500.000 - 1,000.000" class="css-label go-left">
                                 <input type="checkbox" value="500000;1000000" name="price" id="Từ 500.000 - 1,000.000" class="go-right radio filter-price">
                                 <span></span>
                                 Từ 500.000 - 1,000.000
                                 </label>
                              </div>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="Từ 1,000.000 - 2,000.000" class="css-label go-left">
                                 <input type="checkbox" value="1000000;2000000" name="price" id="Từ 1,000.000 - 2,000.000" class="go-right radio filter-price">
                                 <span></span>
                                 Từ 1,000.000 - 2,000.000
                                 </label>
                              </div>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="Từ 2,000.000 - 4,000.000" class="css-label go-left">
                                 <input type="checkbox" value="2000000;4000000" name="price" id="Từ 2,000.000 - 4,000.000" class="go-right radio filter-price">
                                 <span></span>
                                 Từ 2,000.000 - 4,000.000
                                 </label>
                              </div>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="Trên  4,000.000" class="css-label go-left">
                                 <input type="checkbox" value="4000000;100000000" name="price" id="Trên  4,000.000" class="go-right radio filter-price">
                                 <span></span>
                                 Trên  4,000.000
                                 </label>
                              </div>
                              <div class="clearfix"></div>
                              <br>
                           </div>
                        </div>
                     </div>
                     <!-- End of Price range -->
                  </div>
                  <!-- block-md-item -->
                  <div class="block-md-item">
                     <!-- Advance types -->
                     <button type="button" class="collapsebtn go-text-right collapsed" data-toggle="collapse" data-target="#collapseadvance1">
                     Nâng cao <span class="collapsearrow"></span>
                     </button>
                     <div id="collapseadvance1" class="collapse out collapse-br">
                        <div class="block-content">
                           <div class="hpadding20">
                              <br>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="issale" class="css-label go-left">
                                 <input type="checkbox" value="yes" name="issale" id="issale" class="checkbox  filter">
                                 <span></span>
                                 Đang khuyến mãi                                    </label>
                              </div>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="uudai" class="css-label go-left">
                                 <input type="checkbox" value="yes" name="uudai" id="uudai" class="checkbox  filter">
                                 <span></span>
                                 Gói ưu đãi                                    </label>
                              </div>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="honeymoon" class="css-label go-left">
                                 <input type="checkbox" value="yes" name="honeymoon" id="honeymoon" class="checkbox  filter">
                                 <span></span>
                                 Gói Honeymoon                                    </label>
                              </div>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="pickup" class="css-label go-left">
                                 <input type="checkbox" value="yes" name="pickup" id="pickup" class="checkbox  filter">
                                 <span></span>
                                 Đón, tiễn sân bay                                    </label>
                              </div>
                              <div class="clearfix"></div>
                              <br>
                           </div>
                           <div class="clearfix"></div>
                        </div>
                     </div>
                     <!-- End of Advance Types -->
                  </div>
                  <!-- block-md-item -->
                  <div class="block-md-item">
                     <!-- Module types -->
                     <button type="button" class="collapsebtn go-text-right collapsed" data-toggle="collapse" data-target="#collapse31">
                     Loại hình <span class="collapsearrow"></span>
                     </button>
                     <div id="collapse31" class="collapse out collapse-br">
                        <div class="block-content">
                           <div class="hpadding20">
                              <br>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="Khách sạn" class="css-label go-left">
                                 <input type="checkbox" value="97" name="type[]" id="Khách sạn" class="checkbox  filter">
                                 <span></span>
                                 Khách sạn                                    </label>
                              </div>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="Resort" class="css-label go-left">
                                 <input type="checkbox" value="98" name="type[]" id="Resort" class="checkbox  filter">
                                 <span></span>
                                 Resort                                    </label>
                              </div>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="Biệt thự" class="css-label go-left">
                                 <input type="checkbox" value="99" name="type[]" id="Biệt thự" class="checkbox  filter">
                                 <span></span>
                                 Biệt thự                                    </label>
                              </div>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="Homestay" class="css-label go-left">
                                 <input type="checkbox" value="100" name="type[]" id="Homestay" class="checkbox  filter">
                                 <span></span>
                                 Homestay                                    </label>
                              </div>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="Căn hộ" class="css-label go-left">
                                 <input type="checkbox" value="101" name="type[]" id="Căn hộ" class="checkbox  filter">
                                 <span></span>
                                 Căn hộ                                    </label>
                              </div>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="Du Thuyền" class="css-label go-left">
                                 <input type="checkbox" value="1262" name="type[]" id="Du Thuyền" class="checkbox  filter">
                                 <span></span>
                                 Du Thuyền                                    </label>
                              </div>
                              <div class="clearfix"></div>
                              <br>
                           </div>
                           <div class="clearfix"></div>
                        </div>
                     </div>
                     <!-- End of Module Types -->
                  </div>
                  <!-- block-md-item -->
                  <div class="block-md-item">
                     <!-- Hotel Amenities -->
                     <button type="button" class="collapsebtn last go-text-right collapsed" data-toggle="collapse" data-target="#collapse41">
                     Tiện nghi <span class="collapsearrow"></span>
                     </button>
                     <div id="collapse41" class="collapse out collapse-br">
                        <div class="block-content">
                           <div class="hpadding20">
                              <br>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="Đón tiễn sân bay" class="css-label go-left">
                                 <input type="checkbox" value="62" name="amenities[]" id="Đón tiễn sân bay" class="checkbox  filter">
                                 <span></span>
                                 <img class="go-right" style="height: 22px;margin-right:5px;margin-left:5px" src="https://www.hospi.vn/uploads/images/hotels/amenities/522827_airport.png">  Đón tiễn sân bay                                    </label>
                              </div>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="Xe bus đi trung tâm" class="css-label go-left">
                                 <input type="checkbox" value="63" name="amenities[]" id="Xe bus đi trung tâm" class="checkbox  filter">
                                 <span></span>
                                 <img class="go-right" style="height: 22px;margin-right:5px;margin-left:5px" src="https://www.hospi.vn/uploads/images/hotels/amenities/593292_receptionist.png">  Xe bus đi trung tâm                                    </label>
                              </div>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="Xe lăn" class="css-label go-left">
                                 <input type="checkbox" value="64" name="amenities[]" id="Xe lăn" class="checkbox  filter">
                                 <span></span>
                                 <img class="go-right" style="height: 22px;margin-right:5px;margin-left:5px" src="https://www.hospi.vn/uploads/images/hotels/amenities/920288_wheelchar.png">  Xe lăn                                    </label>
                              </div>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="Bar" class="css-label go-left">
                                 <input type="checkbox" value="66" name="amenities[]" id="Bar" class="checkbox  filter">
                                 <span></span>
                                 <img class="go-right" style="height: 22px;margin-right:5px;margin-left:5px" src="https://www.hospi.vn/uploads/images/hotels/amenities/78888_club.png">  Bar                                    </label>
                              </div>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="Giặt ủi" class="css-label go-left">
                                 <input type="checkbox" value="71" name="amenities[]" id="Giặt ủi" class="checkbox  filter">
                                 <span></span>
                                 <img class="go-right" style="height: 22px;margin-right:5px;margin-left:5px" src="https://www.hospi.vn/uploads/images/hotels/amenities/813018_laundry.png">  Giặt ủi                                    </label>
                              </div>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="Nhà hàng" class="css-label go-left">
                                 <input type="checkbox" value="78" name="amenities[]" id="Nhà hàng" class="checkbox  filter">
                                 <span></span>
                                 <img class="go-right" style="height: 22px;margin-right:5px;margin-left:5px" src="https://www.hospi.vn/uploads/images/hotels/amenities/79773_breakfast.png">  Nhà hàng                                    </label>
                              </div>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="Wi-Fi miễn phí" class="css-label go-left">
                                 <input type="checkbox" value="182" name="amenities[]" id="Wi-Fi miễn phí" class="checkbox  filter">
                                 <span></span>
                                 <img class="go-right" style="height: 22px;margin-right:5px;margin-left:5px" src="https://www.hospi.vn/uploads/images/hotels/amenities/53193_858245_wifi.png">  Wi-Fi miễn phí                                    </label>
                              </div>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="Bar Lounge" class="css-label go-left">
                                 <input type="checkbox" value="183" name="amenities[]" id="Bar Lounge" class="checkbox  filter">
                                 <span></span>
                                 <img class="go-right" style="height: 22px;margin-right:5px;margin-left:5px" src="https://www.hospi.vn/uploads/images/hotels/amenities/906341_bar.png">  Bar Lounge                                    </label>
                              </div>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="Hồ bơi" class="css-label go-left">
                                 <input type="checkbox" value="184" name="amenities[]" id="Hồ bơi" class="checkbox  filter">
                                 <span></span>
                                 <img class="go-right" style="height: 22px;margin-right:5px;margin-left:5px" src="https://www.hospi.vn/uploads/images/hotels/amenities/926605_811401_poll.png">  Hồ bơi                                    </label>
                              </div>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="Bãi đậu xe" class="css-label go-left">
                                 <input type="checkbox" value="186" name="amenities[]" id="Bãi đậu xe" class="checkbox  filter">
                                 <span></span>
                                 <img class="go-right" style="height: 22px;margin-right:5px;margin-left:5px" src="https://www.hospi.vn/uploads/images/hotels/amenities/6348_541779_parking.png">  Bãi đậu xe                                    </label>
                              </div>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="Xe shuttle bus" class="css-label go-left">
                                 <input type="checkbox" value="187" name="amenities[]" id="Xe shuttle bus" class="checkbox  filter">
                                 <span></span>
                                 <img class="go-right" style="height: 22px;margin-right:5px;margin-left:5px" src="https://www.hospi.vn/uploads/images/hotels/amenities/117737_653168_busstation.png">  Xe shuttle bus                                    </label>
                              </div>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="Trông giữ trẻ" class="css-label go-left">
                                 <input type="checkbox" value="188" name="amenities[]" id="Trông giữ trẻ" class="checkbox  filter">
                                 <span></span>
                                 <img class="go-right" style="height: 22px;margin-right:5px;margin-left:5px" src="https://www.hospi.vn/uploads/images/hotels/amenities/403809_764557_fitness.png">  Trông giữ trẻ                                    </label>
                              </div>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="Sapa - Massage" class="css-label go-left">
                                 <input type="checkbox" value="189" name="amenities[]" id="Sapa - Massage" class="checkbox  filter">
                                 <span></span>
                                 <img class="go-right" style="height: 22px;margin-right:5px;margin-left:5px" src="https://www.hospi.vn/uploads/images/hotels/amenities/308869_654419_spa.png">  Sapa - Massage                                    </label>
                              </div>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="Khu vui chơi trẻ em" class="css-label go-left">
                                 <input type="checkbox" value="190" name="amenities[]" id="Khu vui chơi trẻ em" class="checkbox  filter">
                                 <span></span>
                                 <img class="go-right" style="height: 22px;margin-right:5px;margin-left:5px" src="https://www.hospi.vn/uploads/images/hotels/amenities/7599_441834_children.png">  Khu vui chơi trẻ em                                    </label>
                              </div>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="Máy lạnh" class="css-label go-left">
                                 <input type="checkbox" value="192" name="amenities[]" id="Máy lạnh" class="checkbox  filter">
                                 <span></span>
                                 <img class="go-right" style="height: 22px;margin-right:5px;margin-left:5px" src="https://www.hospi.vn/uploads/images/hotels/amenities/124634_ac.png">  Máy lạnh                                    </label>
                              </div>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="Nhà hàng ngoài trời" class="css-label go-left">
                                 <input type="checkbox" value="193" name="amenities[]" id="Nhà hàng ngoài trời" class="checkbox  filter">
                                 <span></span>
                                 <img class="go-right" style="height: 22px;margin-right:5px;margin-left:5px" src="https://www.hospi.vn/uploads/images/hotels/amenities/162720_hall.png">  Nhà hàng ngoài trời                                    </label>
                              </div>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="Thanh toán thẻ" class="css-label go-left">
                                 <input type="checkbox" value="194" name="amenities[]" id="Thanh toán thẻ" class="checkbox  filter">
                                 <span></span>
                                 <img class="go-right" style="height: 22px;margin-right:5px;margin-left:5px" src="https://www.hospi.vn/uploads/images/hotels/amenities/524780_card.png">  Thanh toán thẻ                                    </label>
                              </div>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="Thang máy" class="css-label go-left">
                                 <input type="checkbox" value="195" name="amenities[]" id="Thang máy" class="checkbox  filter">
                                 <span></span>
                                 <img class="go-right" style="height: 22px;margin-right:5px;margin-left:5px" src="https://www.hospi.vn/uploads/images/hotels/amenities/999481_elevator.png">  Thang máy                                    </label>
                              </div>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="Cho phép vật nuôi" class="css-label go-left">
                                 <input type="checkbox" value="196" name="amenities[]" id="Cho phép vật nuôi" class="checkbox  filter">
                                 <span></span>
                                 <img class="go-right" style="height: 22px;margin-right:5px;margin-left:5px" src="https://www.hospi.vn/uploads/images/hotels/amenities/179352_pet.png">  Cho phép vật nuôi                                    </label>
                              </div>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="Lễ tân 24/7" class="css-label go-left">
                                 <input type="checkbox" value="197" name="amenities[]" id="Lễ tân 24/7" class="checkbox  filter">
                                 <span></span>
                                 <img class="go-right" style="height: 22px;margin-right:5px;margin-left:5px" src="https://www.hospi.vn/uploads/images/hotels/amenities/71405_Tiep-tan.png">  Lễ tân 24/7                                    </label>
                              </div>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="Khu vực giữ hành lý" class="css-label go-left">
                                 <input type="checkbox" value="198" name="amenities[]" id="Khu vực giữ hành lý" class="checkbox  filter">
                                 <span></span>
                                 <img class="go-right" style="height: 22px;margin-right:5px;margin-left:5px" src="https://www.hospi.vn/uploads/images/hotels/amenities/100039_hanh-ly.png">  Khu vực giữ hành lý                                    </label>
                              </div>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="Sân tennis" class="css-label go-left">
                                 <input type="checkbox" value="199" name="amenities[]" id="Sân tennis" class="checkbox  filter">
                                 <span></span>
                                 <img class="go-right" style="height: 22px;margin-right:5px;margin-left:5px" src="https://www.hospi.vn/uploads/images/hotels/amenities/539409_San-tennis.png">  Sân tennis                                    </label>
                              </div>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="Phòng gia đình" class="css-label go-left">
                                 <input type="checkbox" value="202" name="amenities[]" id="Phòng gia đình" class="checkbox  filter">
                                 <span></span>
                                 <img class="go-right" style="height: 22px;margin-right:5px;margin-left:5px" src="https://www.hospi.vn/uploads/images/hotels/amenities/83776_Phong-gia-dinh.png">  Phòng gia đình                                    </label>
                              </div>
                              <div class="clearfix"></div>
                              <div class="block-check-sale-sb go-right">
                                 <label for="Phòng họp, hội nghị" class="css-label go-left">
                                 <input type="checkbox" value="203" name="amenities[]" id="Phòng họp, hội nghị" class="checkbox  filter">
                                 <span></span>
                                 <img class="go-right" style="height: 22px;margin-right:5px;margin-left:5px" src="https://www.hospi.vn/uploads/images/hotels/amenities/719341_Phong-hop.png">  Phòng họp, hội nghị                                    </label>
                              </div>
                              <div class="clearfix"></div>
                              <br>
                           </div>
                           <div class="clearfix"></div>
                        </div>
                     </div>
                  </div>
                  <!-- block-md-item -->
                  <div class="block-md-item">
                     <!-- End of Hotel Amenities -->
                  </div>
                  <!-- block-md-item -->
                  <div class="block-md-item hidden-xs">
                     <div class="clearfix"></div>
                     <br>
                     <input type="hidden" name="txtSearch" value="">
                     <input type="hidden" name="modType" value="">
                     <input type="hidden" name="city" value="">
                     <input type="hidden" name="checkin" value="15/01/2018">
                     <input type="hidden" name="checkout" value="16/01/2018">
                     <input type="hidden" name="childages" value="">
                     <input type="hidden" name="adults" value="">
                     <input type="hidden" name="searching" value="">
                     <input name="sortby" type="hidden" id="sortbyajax" class="sortby" value="">
                  </div>
                  <!-- block-md-item -->
               </form>
            </div>
         </div>
         <!-- END OF FILTERS -->
         <!-- LIST CONTENT-->
         <div class="rightcontent col-md-9 offset-0" id="right-content">
            <div class="itemscontainer offset-1 hotels">
               <div class="offset-2">
                  <div class="bg-form-arrangement">
                     <form name="orderbylist" id="orderbylist" action="#" method="GET" class="ng-pristine ng-valid">
                        <input type="hidden" name="price" value="">
                        <input type="hidden" name="stars" value="">
                        <input type="hidden" name="type" value="">
                        <input type="hidden" name="issale" value="">
                        <input type="hidden" name="uudai" value="">
                        <input type="hidden" name="pickup" value="">
                        <input type="hidden" name="amenities" value="">
                        <input type="hidden" name="near" value="">
                        <input type="hidden" name="txtSearch" value="">
                        <input type="hidden" name="modType" value="">
                        <input type="hidden" name="city" value="">
                        <input type="hidden" name="checkin" value="">
                        <input type="hidden" name="checkout" value="">
                        <input type="hidden" name="childages" value="">
                        <input type="hidden" name="adults" value="">
                        <input type="hidden" name="searching" value="">
                        <div class="col-md-3 col-xs-12 no-padding-left">
                           <div class="col-xs-6">
                              <span class="sap-xep-theo andes-bold lblue">Sắp xếp theo</span>
                           </div>
                           <div class="col-xs-6 padding-left-4 order-khachsan">
                              <select class="visible-xs">
                                 <option value="0">Giá thấp đến cao</option>
                                 <option value="1">Giá cao xuống thấp</option>
                                 <option value="2">Gợi ý của Hospi</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3 hidden-xs">
                           <input type="radio" id="thap-cao" name="sortby" class="hospi-checkbox sortajax" value="p_lh">
                           <label for="thap-cao" class="hospi-label">&nbsp;</label>
                           <span class="txt-label">Giá thấp đến cao</span>
                        </div>
                        <div class="col-md-3 hidden-xs">
                           <input type="radio" id="cao-thap" name="sortby" class="hospi-checkbox sortajax" value="p_hl">  <label for="cao-thap" class="hospi-label">&nbsp;</label>
                           <span class="txt-label">Giá cao xuống thấp</span>
                        </div>
                        <div class="col-md-3 hidden-xs">
                           <input type="radio" id="feature" name="sortby" class="hospi-checkbox sortajax" value="featured">  <label for="feature" class="hospi-label">&nbsp;</label>
                           <span class="txt-label">Gợi ý của Hospi</span>
                        </div>
                        <div class="clearfix"></div>
                     </form>
                  </div>
               </div>
            
                <?php
                if (!empty($module)) {
                    $i = 1;
                    $moduleForeach = isset($resultSort) ? $resultSort : $module;
                    foreach ($moduleForeach as $htl_id => $item) {
                       
                    if(isset($resultSort)){
                        $item = $module[$htl_id];                        
                    }
                    //var_dump("<pre>", $item, "</pre>");
                        ?>

               <div class="offset-2">
                  <div class="searching-item row-eq-height">
                     <div class="wow fadeInUp col-lg-3 col-md-3 col-sm-3 col-xs-12 offset-0 go-right tour-image">
                        <!-- Add to whishlist -->
                       <!--  <span class="hidden-xs">
                           <div title="" data-toggle="tooltip" data-placement="left" id="38" data-module="hotels" class="wishlist wishlistcheck hotelswishtext38" data-original-title="Add to wishlist"><a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);"><span class="hotelswishsign38">+</span></a></div>
                        </span> -->
                          <?php if (is_sales_off_hotel($item->id)) { ?>
                          <span class="visible-xs icon-left-sao" style="float:left">
                          <div>
                             <a><img src="<?php echo $theme_url; ?>images/icon-left-sao.png"></a>
                          </div>
                        </span>
                           <?php } ?>
                        <span class="visible-xs icon-best" style="float:right">
                          <div>
                             <a><img src="<?php echo $theme_url; ?>images/icon-best.png"></a>
                          </div>
                        </span>
                        <!-- Add to whishlist -->
                        <div class="img_list ">
                           <a href="<?php echo base_url().'hotels/'.$item->hotel_slug; ?>">
                              <img src="<?php echo $item->thumbnail; ?>" alt="<?php echo character_limiter($item->title, 20); ?>">
                              <div class="short_info"></div>
                           </a>
                        </div>
                     </div>
                     <div class="wow fadeInUp col-md-9 col-xs-12 offset-0">
                        <div class="itemlabel3 itemlabel3-cus hp_itemlabel3-cus_mb">
                           <div class="labelleft2 rtl_title_home description">
                              <h4 class="mtb0 RTL go-text-right hotel-name">
                                 <a href="<?php echo base_url().'hotels/'.$item->hotel_slug; ?>"><b><?php echo $item->title; ?></b></a>
                                 <!-- Cars airport pickup -->   <!-- Cars airport pickup -->
                              </h4>
                              <a class="go-right" href="javascript:void(0);" onclick="showMap('<?php echo base_url(); ?>home/maps/<?php echo $item->latitude; ?>/<?php echo $item->longitude; ?>/<?php echo $appModule; ?>/<?php echo $item->id; ?>', 'modal');" title="<?php echo character_limiter($item->location, 10); ?>"><i style="margin-left: -3px;" class="icon-location-6 go-right"></i><?php echo character_limiter($item->location, 10); ?></a>
                                    <span class="go-right"><?php echo $item->stars; ?></span>  
                                   
                              <ul class="itemlabel-info">
                                    <?php if(is_combo_hotel($item->id)) { ?>
                                    <li>
                                       <a href="#" title="Combo"><span>Combo</span></a>
                                    </li>
                                    <?php } ?>
                                    <?php if(is_deal_hotel($item->id)) { ?>
                                    <li class="deal-hotel">
                                       <a href="#" title="Deals - Giảm giá"><span>Deals - Giảm giá</span></a>
                                    </li>
                                    <?php } ?>
                                    <!--<li><a href="#" title="Gói honeymoon"><span>Gói honeymoon</span></a></li>-->
                              </ul>
                              <?php 
                                    $tmp = array();
                                    if($item->diem_noi_bat){
                                        $tmp = explode(',', $item->diem_noi_bat);
                                    }
                                    ?>
                                    <?php if(!empty($tmp)){ ?>
                                    <ul class="itemlabel-info itemlabel-info-add">
                                        <?php foreach($tmp as $diemnb){ ?>
                                        <li><?php echo $diemnb; ?></li>
                                        <?php } ?>
                                    </ul>
                                    <?php } ?>
                                <p class="grey RTL des hidden-xs">Novotel Phú Quốc Resort&nbsp;tọa lạc tại Bãi Trường, xã Dương Tơ,…</p>
                                <div class="hp_price_mb clearfix">
                                    <div class="purple size18 text-center item-book-hotels">
                                
                                    
											<?php 
                                            if ($item->price_status == 'Yes') {
                                            ?>
											<div class="col-xs-4 item-gia-tot">
                                        <b style="display: none;">
                                            <span class="price-display" style="font-size:20px" data-id="<?php echo $item->id; ?>"></span>
                                            <div class="smalltext">(<?php echo $item->currSymbol; ?>)</div>
                                           
                                        </b>
                                        <div class="clearfix"></div>
                                        </div>
                                        <?php
                                            } else {
                                            ?>
                                        <div class='click-2get-price col-xs-4 item-gia-tot'>
                                            <a  style="font-size: 12px;" id="popoverData" href="#emailme<?php echo $item->id; ?>" data-toggle="modal" data-content="<?php echo trans('0800'); ?>" rel="popover" data-placement="top" data-original-title="<?php echo $item->title; ?>" data-trigger="hover">
                                                <div class="click-a"><?php echo trans('0799'); ?></div>
                                                <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                        <div class="clearfix"></div>
                                      
                                        <?php } ?>
                                    <div class="line-right"></div>
                                  <?php if (pt_is_module_enabled('reviews')) { ?>
                                        <?php if ($item->avgReviews->overall > 0) { ?>
                                                <div class=" text-center size18 col-xs-4 item-like">
                                                   <i class="icon-thumbs-up-4"></i><?php echo $item->avgReviews->overall; ?>
                                                </div>
                                        <?php } ?>
                                    <?php } ?>

                                    <?php if ($appModule == "ean") {
                                        if ($item->tripAdvisorRating > 0) { ?>
                                                <div class=" text-center size18 col-xs-4 item-like">
                                                   <i class="icon-thumbs-up-4"></i><?php echo $item->tripAdvisorRating; ?>
                                                </div>
                                        <?php }
                                    } ?>
                                 
                                 <div class="line-right-tow"></div>
                                  <div class=" text-center size18 col-xs-4 item-xem-ngay">
                                     <a href="<?php echo base_url().'hotels/'.$item->hotel_slug; ?>">
                                       <button type="submit" class="btn btn-action2">Xem ngay</button>
                                    </a>
                                 </div>
                                 <!--2-->
                                
                               
                              </div>
                                </div>
                                <div class="price-include price-include_mb hidden">Giá đã bao gồm: - Ăn sáng - VAT 10% - Phí phục vụ 5%</div>
                               <?php if ($appModule == "hotels") { ?>
                                    <?php
                                    if ($item->vatvalue == 0 || $item->servicevalue == 0) {
                                        echo "<div class='price-include price-include_mb'>";
                                        echo trans('0700');
                                        echo "- " . trans('0701') . " ";
                                        if ($item->vatvalue == 0)
                                            echo "- " . trans('0702') . " 10% ";
                                        if ($item->servicevalue == 0)
                                            echo "- " . trans('0703') . " 5%";
                                        echo "</div>";
                                    }
                                }
                                ?>
                                
                           </div>
                          
                           <div class="labelright go-left hidden-xs" style="width: 100%;margin-left:5px">
                              <div class="purple size18 text-center">
                                 <div class="click-2get-price">
                                    <a id="popoverData" href="#emailme38" data-toggle="modal" data-content="Vì giá tốt nhất không được công bố lên website, Bạn vui lòng click vào để nhận giá tốt nhất qua email hoặc qua điện thoại" rel="popover" data-placement="top" data-original-title="Novotel Phú Quốc Resort" data-trigger="hover">
                                       <div class="click-a">Click lấy giá tốt</div>
                                       <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                                    </a>
                                 </div>
                                 <div class="clearfix"></div>
                                 <hr>
                                 <div class="review text-center size18">
                                    <i class="icon-thumbs-up-4"></i>8.9
                                 </div>
                                 <!--2-->
                                 <div class="clearfix"></div>
                                 <hr>
                                 <a href="https://www.hospi.vn/hotels/vietnam/phu-quoc/novotel-phu-quoc-resort">
                                 <button type="submit" class="btn btn-action2">Xem ngay</button>
                                 </a>
                              </div>
                           </div>
                           
                        </div>
                     </div>
                     <div class="clearfix"></div>
                     <script type="text/javascript">
                        $(window).load(function(){
                        
                        $(".successemail38").on('click', function(){
                        var youremail = $(".youremail38").val();
                        var yourphone = $(".yourphone38").val();
                        var itemid = 38;
                        var duration = "từ " + $(".dpd1").val() + " đến " + $(".dpd2").val();
                        $('#getresponse38').html('<div id="rotatingDiv"></div>');
                        $.post("https://www.hospi.vn/admin/ajaxcalls/laygiaEmail", {email: youremail, phone: yourphone, id: itemid, hotel: duration}, function(resp){
                        //alert(resp);
                        if (resp === "done") {
                        console.log(resp);
                        $("#getresponse38").html("");
                        $('.email-me-modal38').modal('hide');
                        $('#openModal38').modal('show');
                        var myModal = $('#openModal38');
                        clearTimeout(myModal.data('hideInterval'));
                        myModal.data('hideInterval', setTimeout(function(){
                        myModal.modal('hide');
                        }, 4000));
                        } else {alert(resp); $("#getresponse38").html("<span class='error'>Đã có lỗi xảy ra, chúng tôi đang xem xét.<span>");}
                          });
                          });
                          });
                          
                     </script>
                     <div id="emailme38" class="modal fade email-me-modal38" tabindex="-1" data-focus-on="input:first" style="display: none;">
                        <div class="modal-dialog click-2email">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                 <div class="hotel-name">
                                    Nhập thông tin để nhận giá tốt nhất                                    
                                 </div>
                              </div>
                              <div class="modal-body">
                                 <div class="panel-body">
                                    <div class="col-md-12 col-sm-12 col-xs-12 go-right">
                                       <div class="form-group">
                                          <div class="clearfix"></div>
                                          <input type="text" placeholder="Email " name="youremail" id="youremail38" class="form-control youremail38" required="">
                                       </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 go-right">
                                       <div class="form-group">
                                          <div class="clearfix"></div>
                                          <input type="text" placeholder="Số điện thoại " name="yourphone" id="yourphone38" class="form-control yourphone38" required="">
                                       </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <br>
                                    <div class="hotel-modal-title">* Giá phòng sẽ được gởi qua email cho bạn</div>
                                    <br>
                                    <!--<a id="successemail" style="margin-bottom:5px;float:none;" href="#openModal" type="submit" class="btn btn-action chk successemail" data-toggle="modal" data-content="Vì giá tốt nhất không được công bố lên website, Bạn vui lòng click vào để nhận giá tốt nhất qua email hoặc qua điện thoại" rel="popover" data-placement="top" data-original-title="Novotel Phú Quốc Resort" data-trigger="hover">Lấy giá</a>-->
                                    <button id="successemail38" style="margin-bottom:5px;float:none;" type="submit" class="btn btn-action chk successemail38">Lấy giá</button>
                                    <div id="getresponse38"></div>
                                    <div class="clearfix"></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div id="openModal38" class="modal fade" tabindex="-1" data-focus-on="input:first" style="display: none;">
                        <div class="modal-dialog email-confirm">
                           <div class="modal-content">
                              <div class="modal-body">
                                 <div class="panel-body">
                                    <div class="purple"><strong><i class="fa fa-check-square-o" aria-hidden="true"></i> Gởi báo giá thành công</strong></div>
                                    <div>Bạn vui lòng kiểm tra email trong inbox hoặc thư rác</div>
                                    <div class="clearfix"></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
                <?php
                if ($i % 6 == 0) {
                    $random_key = array_rand($list);
                    //echo '<div class="offset-2">' . run_widget($list[$random_key]) . '</div>';
                    unset($list[$random_key]);
                }
                $i++;
                $random_key = "";
                }//end foreach
            }//end if
                ?>
               
               <div class="clearfix"></div>
               <div class="col-md-12 go-right">
                  <div class="block-pagination">
                     <?php echo createPagination($info); ?></div>
                    <!-- 
                     <ul class="pagination">
                        <li class="active"><span>1<!--<span</span></li>
                        <li><a href="javascript:;" data-url="https://www.hospi.vn/hotels/search?page=2">2</a></li>
                        <li><a href="javascript:;" data-url="https://www.hospi.vn/hotels/search?page=3">3</a></li>
                       
                     </ul> -->
                  </div>
               </div>
               <div class="pull-right">
               </div>
               <!-- End of offset1-->
               <!-- start EAN multiple locations found and load more hotels -->
               <!-- End EAN multiple locations found and load more hotels  -->
            </div>
            <!-- END OF LIST CONTENT-->
         </div>


<script type="text/javascript">
    $('ul.pagination li a').each(function() {
            var url = '<?php echo $ajaxurl; ?>';
    
            $(this)
                .attr('href', 'javascript:;')
                .attr('data-url', url)
                .data('url', url)
                .on('click', function(evt) {
                    evt.preventDefault();                   
                    $('#formSearchAjaxSidebar #page').val(parseInt($(this).text()));
                    ajaxSearch($('#formSearchAjaxSidebar #uudai'));
                });
        });

    function ajaxSearchPagination(url){ // hoangnh
        url = url.replace('/search', '/searchajax');

        $.ajax({
            url : url,
            type : "get",
            beforeSend : function(){
                $('#listing-search').html('<p style="text-align:center;margin-top:100px"><img src="<?php echo $theme_url ?>images/loading.gif"></p>');
                $('html, body').animate({
                    scrollTop: $("#listing-search").offset().top
                }, 500);
                $('#wait').show();
            },
            success : function(data){
                $('#wait').hide();
                $('#listing-search').html(data);
            }
        });
    }
</script>