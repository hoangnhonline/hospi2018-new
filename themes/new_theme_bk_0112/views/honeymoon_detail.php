<link href="<?php echo $theme_url; ?>asset/css/responsive-combo.css" rel="stylesheet">
<link href="<?php echo $theme_url; ?>assets/include/slider/slider.min.css" rel="stylesheet" />
<script src="<?php echo $theme_url; ?>assets/js/single.js"></script>
<script src="<?php echo $theme_url; ?>/assets/js/jquery.nicescroll.min.js"></script>
<script src="<?php echo $theme_url; ?>assets/include/slider/slider.js"></script>
<script src="<?php echo $theme_url; ?>assets/js/infobox.js"></script>
<div class="mtslide2 sliderbg2"></div>
<!-- map -->
<div class="container offer-banners">
 <div id="carousel-banner" class="carousel slide" data-ride="carousel">
 
 
  <!-- Wrapper for slides -->
 <div class="carousel-inner">
    <div class="item">
        <a href="http://www.hospi.vn/blog/diem-den-honeymoon-cung-thuc-day-o-1-noi-xa"><img alt="" height="323" src="https://www.hospi.vn/uploads/cms/images/1489040455_Diem-den-honeymoon---web.jpg" width="1140"></a>
    </div>
          <div class="item active">
        <a href="https://www.facebook.com/hospi.vn/"><img alt="" height="323" src="https://www.hospi.vn/uploads/cms/images/1487783097_1478919923_honeymoon.jpg" width="1140"></a>
    </div>
           </div>
      <!-- Indicators -->
  <ol class="carousel-indicators hidden-xs">
            <li data-target="#carousel-banner" data-slide-to="0" class=""></li><li data-target="#carousel-banner" data-slide-to="1" class="active"></li>  </ol>
 </div><!-- Carousel -->
      <div class="clearfix"></div>
  
</div>

<div class="container block-breadcrumb hidden-xs">
    <div class="container">
        <?php echo $breadcrumb;?>
    </div>
</div>
<div class="visible-xs col-xs-12 breambun">
      <div class="breadcrumb">
            <span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
              <a href="/" itemprop="url">
                <span itemprop="title">Trang chủ</span>
              </a>
            </span> <i class="fa fa-angle-right"></i>

            <span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
              <a href="/" itemprop="url"><span itemprop="title">Honeymoon</span></a>
          </span> <i class="fa fa-angle-right"></i>
          <span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
            <a href="/" itemprop="url" class="active">
              <span itemprop="title"><?php echo $module->title; ?></span>
            </a>
          </span> 
        </div>

       
    </div>
    <div class="clearfix"></div>
<div class="container pagecontainer offset-0 offset-0-padding-15">
    <div class="offer-page rightcontent col-md-12 offset-0">
        <div class="itemscontainer offset-1">
            <div class="page-dt-cb">
                <div class="row">
                    <div class="col-sm-9 col-xs-12">
                        <h1 class="h1-offers"><?php echo $module->title; ?></h1>
                         <div class="honeymoon-start">
                            <?php echo $module->stars?>
           <!--   <i class="fa fa-star cl-tim" aria-hidden="true"></i>
             <i class="fa fa-star cl-tim" aria-hidden="true"></i>
             <i class="fa fa-star cl-tim" aria-hidden="true"></i>
             <i class="fa fa-star cl-tim" aria-hidden="true"></i>
             <i class="fa fa-star cl-tim" aria-hidden="true"></i> -->
           </div>
                        <ul class="information">
                            <li>
                                <p class="address">
                                    <i style="margin-left:-5px; display: inline-block;">
                                        <img src="https://www.hospi.vn/themes/default/assets/img/location-icon2.png" alt="">
                                    </i>
                                    <?php echo $module->location ; ?>
                                </p>
                            </li>
                            <?php if (!$module->offerForever) { ?>
                                <li class="dots">
                                    <?php echo trans('0834'); ?>: <strong><?php echo date('d/m/Y', $module->from) ?></strong>
                                </li>
                                <li class="dots">
                                    <?php echo trans('0835'); ?>: <strong><?php echo date('d/m/Y', $module->to) ?></strong>
                                </li>

                            <?php } ?>
                        </ul>
                        <!-- /.infomation -->
                        <div class="block-tabs-2">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs nav-tabs-honemoon-details-desktop nav-tabs-honemoon-details-mobile" role="tablist">
                                <li role="presentation" class="active width-63"><a href="#Combo_detail" aria-controls="Combo_detail" role="tab" data-toggle="tab">Honeymoon chi tiết</a></li>
                                <li role="presentation" class="width-37"><a href="#Rule_cancel" aria-controls="Rule_cancel" role="tab" data-toggle="tab">Điều kiện</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="Combo_detail">
                                    <div class="wysiwyg">
                                        <p><strong class="purple"><?php echo trans('0836'); ?></strong></p>
                                        <?php echo $module->desc; ?>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="Rule_cancel">
                                    <div class="wysiwyg">
                                        <?php if ($module->type == 2) { ?>
                                        <div class="block-dk-cancel">
                                            <div class="form-group">
                                                <p><strong class="purple"><?php echo trans('0837'); ?></strong></p>
                                                <p>
                                                    <?php echo nl2br($module->cancel_condition); ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="block-dk-cancel">
                                            <div class="form-group">
                                                <p><strong class="purple"><?php echo trans('0838'); ?></strong></p>
                                                <p>
                                                    <?php echo nl2br($module->use_condition); ?>
                                                </p>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.block-tab-2 -->
                    </div>
                        <div class="col-sm-3 col-xs-12">
                            <div class="block-content">
                                <div class="block-cb-detail">
                                    <p class="title">Trọn gói Honeymoon</p>
                                    <div class="price">
                                        <img src="https://www.hospi.vn/themes/default/assets/img/triangle_cb.png">
                                        <p><?php echo $module->price; ?> <span>(<?php echo $module->currSymbol; ?>/<?php echo $module->so_khach; ?> Khách)</span></p>
                                    </div>
                                    <div class="detail">
                                        <p><strong>Phụ thu</strong></p>
                                        <ul>
                                            <?php if (!empty($module->surchargeInfo)) {
                                                foreach ($module->surchargeInfo as $item) {
                                                ?>
                                                    <li>
                                                        <p><?php echo $item->name; ?></p>
                                                        <?php if ($item->show_price) { ?>
                                                            <p class="price-sm"><strong><?php echo $item->price; ?> <?php echo $module->currSymbol; ?></strong></p>
                                                        <?php } ?>
                                                    </li>
                                                <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                        <button type="button" class="btn btn-combo2" data-toggle="modal" data-target="#book-combo"><?php echo 'Đặt gói honeymoon'; ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Modal -->
    <div class="modal fade" id="book-combo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="  background: #666;text-align: center;color: #fff;">
                    <h4 class="modal-title" id="myModalLabel">Xác nhận thông tin</h4>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url() . $appModule;?>/book/<?php echo $module->slug; ?>" method="get" role="search">
                        <div class="form-inline">
                            <div class="form-group">
                                <p class="title">Ngày đi</p>
                                <div class="block-mySelectCalendar">
                                    <input type="text" placeholder="Ngày đi" name="checkin" class="form-control mySelectCalendar dpd1 go-text-left" value="<?php echo date('d/m/Y', $module->to) ?>" required >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="checkbox-inline checkbox-style2">
                                    <input type="checkbox" name="note" value="Mua trước đi sau">
                                    <span></span>
                                    Bạn mua trước đi sau
                                    <div class="block-question-info" style="display: inline-block;">
                                        <i class="fa fa-question-circle"></i>
                                        <div class="block-info">
                                            <p>Nếu bạn chưa xác định được ngày đi. Bạn có thể mua trước đi sau ....</p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="form-inline ">
                            <div class="form-group cls-poup">
                                <p class="title">Giá trọn gói</p>
                                <p class="price-sm"><strong><?php echo $module->price; ?> <?php echo $module->currSymbol; ?></strong></p>
                            </div>
                            <div class="form-group cls-right-poup">
                                <p class="title">Số lượng</p>
                                <select class="form-control" name="quantity">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                        </div>
                        <div class="clearfix"></div>
 <?php if (!empty($module->surchargeInfo)) {
                            foreach ($module->surchargeInfo as $item) {
                            ?>
                                <div class="form-inline">
                                    <div class="form-group">
                                        <p class="title"><?php echo $item->name; ?></p>
                                        <p class="price-sm"><strong><?php echo $item->price; ?> <?php echo $module->currSymbol; ?></strong></p>
                                    </div>
                                    <div class="form-group cls-right-poup">
                                        <p class="title">Số lượng</p>
                                        <select class="form-control" name="surcharge[<?php echo $item->id; ?>]">
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>
                                </div>
				    <?php
                            }
                        }
                        ?>
                                  
                                                    <div class="form-inline text-center">
                            <button type="submit" class="btn btn-combo2 btn-combo22">Xác nhận</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    

    $(function () {
        setTimeout(function () {
            $(".successMsg").fadeOut("slow");
        }, 7000);
    });
</script>  