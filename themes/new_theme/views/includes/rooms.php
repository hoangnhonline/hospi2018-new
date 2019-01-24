<section id="ROOMS" style="background-color:#FFFFFF" style="position: relative;">
    <div style="background-color:#fff">
    <div class="rooms-update rooms-update-bg">
        <form action="" method="GET">
            <div class="row">
                <div class="col-sm-3 col-xs-12 go-right">
                    <label class="size12 RTL go-right" style="white-space: nowrap;"><?php echo trans('07'); ?></label>
                    <input type="text" placeholder="<?php echo trans('07'); ?>" name="checkin" id="checkin_update" class="form-control mySelectCalendar dpd1" value="<?php echo date('d/m/Y', strtotime($checkin)); ?>" required autocomplete="off">
                </div>
                <div class="col-sm-3 col-xs-12 go-right">
                    <label class="size12 RTL go-right"><?php echo trans('09'); ?></label>
                    <input type="text" placeholder="<?php echo trans('09'); ?>" name="checkout" id="checkout_update" class="form-control mySelectCalendar dpd2" value="<?php echo date('d/m/Y', strtotime($checkout)); ?>" required autocomplete="off">
                </div>
                <div class="col-xs-12 col-sm-2 one-dem-hotel-detail" style="margin-top: 10px;">
                    <label>&nbsp;</label>
                    <?php if (!empty($rooms)) { ?>
                    <h5 class="text-left size16"><strong><i class="icon_set_1_icon-83"></i> <?php echo $modulelib->stay; ?> đêm</strong> </h5>
                    <?php } ?>
                </div>
                <div class="col-sm-4 col-xs-12 go-right one-dem-hotel-detail">
                    <label>&nbsp;</label>
                    <button class="btn btn-block btn-success pull-right" type="button" id="btnUpdate"><?php echo trans('0106'); ?></button>
                    <input type="hidden" id="loggedin" value="<?php echo $usersession; ?>" />
                    <input type="hidden" id="itemid" value="<?php echo $module->id; ?>" />
                    <input type="hidden" id="module" value="<?php echo $appModule; ?>" />
                    <input type="hidden" id="addtxt" value="<?php echo trans('029'); ?>" />
                    <input type="hidden" id="removetxt" value="<?php echo trans('028'); ?>" />
					<input type="hidden" id="hotel_slug" value="<?php echo $hotel_slug; ?>" />
                </div>
            </div>
        </form>
        <div class="clearfix"></div>
    </div>
    <!-- update rooms-update-bg -->
    <div class="clearfix"></div>
    <?php if (!empty($modulelib->stayerror)) { ?>
    <div class="panel-body">
        <div class="alert alert-danger go-text-right">
            <?php echo trans("0420"); ?>
        </div>
    </div>
    <!-- panel-body -->
    <?php } ?>
    <div class="clearfix block-rooms visible-xs">
        <div class="tabble-responsive">
            <form action="<?php echo base_url() . $appModule; ?>/book/<?php echo $module->bookingSlug; ?>" method="GET" class="ng-pristine ng-valid">
                <input type="hidden" name="adults" value="<?php echo $modulelib->adults > 1 ? $modulelib->adults : 2; ?>" />
                <input type="hidden" name="child" value="<?php echo $modulelib->children; ?>" />
                <input type="hidden" name="checkin" value="<?php echo $modulelib->checkin; ?>" />
                <input type="hidden" name="checkout" value="<?php echo $modulelib->checkout; ?>" />
                <?php if (!empty($rooms)) { 
                    $i = 0;
                    ?>
                <?php foreach ($rooms as $r) { 
                   // echo "<pre>", var_dump($r->price);die;
                    $i++;               
                    ?>
                <input type="hidden" name="room_id[]" value="<?php echo $r->id; ?>" />
                <table class="table table-customize room-multi">
                    <thead class="hidden">
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <input type="hidden" name="room_id[]" value="<?php echo $r->id; ?>" />
                        <tr>
                            <td>
                                <div class="zoom-gallery">
                                    <div class="zoom-gallery<?php echo $r->id; ?>">
                                        <a href="<?php echo $r->fullimage; ?>" data-source="<?php echo $r->fullimage; ?>" title="<?php echo $r->title; ?>">
                                        <img class="img-responsive" src="<?php echo $r->thumbnail; ?>">
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="info">
                                    <h4 class="RTL go-text-right"><b class="purple"><?php echo $r->title; ?></b></h4>
                                    <div class="block-people">
                                        <h5>Người lớn: <span><?php echo $r->room_adults; ?></span> </h5>
                                        <h5>Trẻ em: <span><?php echo $r->room_children; ?></span></h5>
                                    </div>
                                    <!-- <div class="block-view-detail">
                                        <div class="visible-lg visible-md visible-xs go-right" id="accordion" style="margin-top: 0px;">
                                            <a data-toggle="modal" href="#details55">Xem chi tiết</a>
                                        </div>
                                    </div> -->
                                    <div class="block-view-detail">
                                        <span class="hs_cl_show_info" href="javascript:;">Xem chi tiết</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="hs_room_info hs_show_info">
                            <td colspan="2">
                                <div class="clearfix">
                                    <p class="hs_cl_show_info"><span class="purple" style="font-weight: bold">Thông tin phòng</span> <span class="grey">(chỉ mang tính chất tham khảo)</span></p>
                                </div>
                                <div class="hs_room_details">
                                    <?php 
                                    echo $r->desc;
                                    ?>
                                </div>
                                <div class="hs_room_convenient">
                                    <p class="title">
                                        <span class="purple">Tiện nghi</span>
                                    </p>
                                    <div class="row">
                                        <?php 
                                        $countAment = 0;
                                        foreach($r->Amenities as $ament){
                                        
                                        ?>
                                        <div class="col-sm-6">
                                            <span class="hs_ic_room_convenient"><i class="fa fa-check"></i></span>
                                            <span class="grey hs_des_room_convenient"><?php echo $ament->name; ?></span>
                                        </div>                        
                                        <?php } ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="item-countroom">
                                    <h5 class="size12">Số phòng</h5>
                                    <select class="form-control room_quantity" data-type="1" data-p="<?php echo $r->price['total']/$modulelib->stay; ?>" data-name=""  data-detail-id="0">
                                        <option value="0">0</option>
                                        <?php for($k = 1; $k <= $r->maxQuantity; $k++){ ?>
                                        <option value="<?php echo $k; ?>"><?php echo $k; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="item-countroom">
                                    <h5 class="size12">Giường phụ</h5>
                                    <select class="form-control extra_beds" data-price="1" data-p="<?php echo $r->price['price_bed_total']/$modulelib->stay; ?>" data-name=""  data-detail-id="0">
                                        <option value="0">0</option>
                                        <?php for($j = 1; $j <= $r->extraBeds; $j++){ ?>
                                        <option value="<?php echo $j; ?>"><?php echo $j; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <input type="hidden" class="room_quantity_hidden" name="room_quantity[<?php echo $r->id; ?>]" id="room_quantity_<?php echo $r->id; ?>">
                                <input type="hidden" class="extra_beds_hidden" name="extra_beds[<?php echo $r->id; ?>]" id="extra_beds_<?php echo $r->id; ?>">  
                                <input type="hidden" class="ptype_hidden" name="ptype[<?php echo $r->id; ?>]" id="ptype<?php echo $r->id; ?>" value="">
                                <input type="hidden" class="p_hidden" name="p[<?php echo $r->id; ?>]" id="p<?php echo $r->id; ?>" value="">
                                <input type="hidden" class="pb_hidden" name="pb[<?php echo $r->id; ?>]" id="pb<?php echo $r->id; ?>" value="">
                                <input type="hidden" class="detail_id" name="detail_id[<?php echo $r->id; ?>]" id="detail_id<?php echo $r->id; ?>" value="">
                                <input type="hidden" class="name_uudai" name="name_uudai[<?php echo $r->id; ?>]" id="name_uudai<?php echo $r->id; ?>" value="">
                            </td>
                            <td>
                                <div class="block-price">
                                    <p class="purple size18"><b><?php echo number_format($r->price['total']); ?></b></p>
                                    <div class="size13 grey">
                                        Giá VND/<?php echo $modulelib->stay; ?>  đêm
                                        <div class="block-price-info" style="display: inline-block;">
                                            <i class="fa fa-question-circle"></i>
                                            <div class="block-info-price-rooms">
                                                <p>Giá phòng/đêm</p>
                                                <p class="purple size14"><?php echo $r->title; ?></p>
                                                <?php 
                                                    if(!empty($r->price['detail'])){                          
                                                        foreach($r->price['detail'] as $priceDetail){
                                                    ?>
                                                <p>Đêm <?php echo date('d/m', strtotime($priceDetail->date_use)); ?>: <?php echo number_format($priceDetail->total); ?> VND</p>
                                                <?php 
                                                    } 
                                                    } 
                                                    ?>
                                                <p>Tổng <?php echo $modulelib->stay; ?> đêm: <?php echo number_format($r->price['total']); ?> VND</p>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="block-price-info">
                                        <span>Bao gồm: Ăn sáng.</span>
                                        <span>Phí dịch vụ 5%, VAT 10%</span>
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <?php if($r->price['price_sale'] > 0 ){ ?>
                        <tr>
                            <td>
                                <div class="item-countroom">
                                    <h5 class="size12">Số phòng</h5>
                                    <select class="form-control room_quantity" data-type="2" data-p="<?php echo $r->price['price_sale']/$modulelib->stay; ?>" data-name="Giá khuyến mãi"  data-detail-id="0">
                                        <option value="0">0</option>
                                        <?php for($k = 1; $k <= $r->maxQuantity; $k++){ ?>
                                        <option value="<?php echo $k; ?>"><?php echo $k; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="item-countroom">
                                    <h5 class="size12">Giường phụ</h5>
                                    <select class="form-control extra_beds"  data-type="2" data-p="<?php echo $r->price['price_bed_sale']/$modulelib->stay; ?>"  data-name="Giá khuyến mãi"  data-detail-id="0">
                                        <option value="0">0</option>
                                        <?php for($j = 1; $j <= $r->extraBeds; $j++){ ?>
                                        <option value="<?php echo $j; ?>"><?php echo $j; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="block-price block-hs_promotionning">
                                    <div class="show_hs_promotionning">
                                        <span>Đang khuyến mãi</span>
                                        <br>
                                        <span><?php echo $r->price['duration']; ?></span>
                                    </div>
                                    <p class="purple size18"><b><?php echo number_format($r->price['price_sale']); ?></b></p>
                                    <div class="size13 grey">
                                        Giá VND/<?php echo $modulelib->stay; ?> đêm
                                        <div class="block-price-info" style="display: inline-block;">
                                            <i class="fa fa-question-circle"></i>
                                            <div class="block-info-price-rooms">
                                                <p class="purple size16" style="border-bottom: 1px solid #ccc; padding: 4px 8px; "><?php echo $r->title; ?></p>
                                                <div class="ct" style="padding: 4px 8px;">
                                                   <?php 
                                                        if(!empty($r->price['detail'])){                          
                                                            foreach($r->price['detail'] as $priceDetail){
                                                        ?>
                                                    <p class="grey">Đêm <?php echo date('d/m', strtotime($priceDetail->date_use)); ?>: <?php echo number_format($priceDetail->price_sale); ?> VND</p>
                                                    <?php } } ?>
                                                </div>
                                                <p style="border-top: 1px solid #ccc; padding: 4px 8px;">
                                                    <span class="grey">Tổng <?php echo $modulelib->stay; ?> đêm:</span>
                                                    <span class="purple size14"><?php echo number_format($r->price['price_sale']); ?> VND</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="block-price-infos">
                                        <span>Bao gồm: Ăn sáng.</span>
                                        <span>Phí dịch vụ 5%, VAT 10%</span>
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                        <?php 
                        if(!empty($r->price['uuDaiTotalArr'])){
                        ?>
                        <?php 
                        $countUuDai = 0;
                        foreach($r->price['uuDaiTotalArr'] as $detail_id => $uuDaiTotal){            
                            $priceUuDaiDetail = $r->price['uuDaiDetail'][$detail_id];
                            $countUuDai++;

                        ?>
                        <?php 
                        $tmpUuDaiFirst = reset($priceUuDaiDetail);                
                        ?>
                        <tr>
                            <td>
                                <div class="item-countroom">
                                    <h5 class="size12">Số phòng</h5>
                                    <select class="form-control room_quantity" data-type="3" data-p="<?php echo $uuDaiTotal['total']/$modulelib->stay; ?>" data-name="<?php echo $tmpUuDaiFirst['name_uudai'];?>"  data-detail-id="<?php echo $detail_id; ?>">
                                        <option value="0">0</option>
                                        <?php for($k = 1; $k <= $r->maxQuantity; $k++){ ?>
                                        <option value="<?php echo $k; ?>"><?php echo $k; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="item-countroom">
                                    <h5 class="size12">Giường phụ</h5>
                                    <select class="form-control extra_beds" data-type="3" data-p="<?php echo $uuDaiTotal['bed']/$modulelib->stay; ?>" data-name="<?php echo $tmpUuDaiFirst['name_uudai'];?>" data-detail-id="<?php echo $detail_id; ?>">
                                        <option value="0">0</option>
                                        <?php for($j = 1; $j <= $r->extraBeds; $j++){ ?>
                                        <option value="<?php echo $j; ?>"><?php echo $j; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="block-price block-hs_promotionning">
                                    <div class="show_hs_promotionning show_hs_roomMore">
                                        <span><?php echo $tmpUuDaiFirst['name_uudai'];?></span>
                                        <br>
                                        <span class="clickShow_hs_full_roomMore">(Chi tiết)</span>
                                        <div class="hs_full_roomMoreP">
                                            <p class="size16" style="border-bottom: 1px solid #ccc; padding: 4px 8px; color: #649800;">
                                                <?php echo $tmpUuDaiFirst['name_uudai'];?>                               <span class="clickHide_hs_full_roomMore">(x)</span>
                                            </p>
                                            <div class="ct grey" style="padding: 4px 8px;">
                                               <?php echo $tmpUuDaiFirst['detail_uudai'];?>                          
                                            </div>
                                            <p style="border-top: 1px solid #ccc; padding: 4px 8px;">
                                                <span class="grey">Thời gian</span>
                                                <span class="blue02 size14"><?php echo $tmpUuDaiFirst['duration']; ?></span>
                                            </p>
                                        </div>
                                    </div>
                                    <p class="purple size18"><b><?php echo number_format($uuDaiTotal['total']); ?></b></p>
                                    <div class="size13 grey">
                                        Giá VND/<?php echo $modulelib->stay; ?> đêm
                                        <div class="block-price-info" style="display: inline-block;">
                                            <i class="fa fa-question-circle"></i>
                                            <div class="block-info-price-rooms">
                                                <p class="purple size16" style="border-bottom: 1px solid #ccc; padding: 4px 8px; "><?php echo $r->title; ?></p>
                                                <div class="ct" style="padding: 4px 8px;">
                                                    <?php 
                                        if(!empty($r->price['detail'])){                          
                                            foreach($priceUuDaiDetail as $date_useKey => $priceDetail){
                                        ?>
                                    <p class="grey">Đêm <?php echo date('d/m', strtotime($date_useKey)); ?>: <?php echo number_format($priceDetail['price']); ?> VND</p>
                                    <?php } } ?>
                                                </div>
                                                <p style="border-top: 1px solid #ccc; padding: 4px 8px;">
                                                    <span class="grey">Tổng <?php echo $modulelib->stay; ?> đêm:</span>
                                                    <span class="purple size14"><?php echo number_format($uuDaiTotal['total']); ?> VND</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="block-price-infos">
                                        <span>Bao gồm: Ăn sáng.</span>
                                        <span>Phí dịch vụ 5%, VAT 10%</span>
                                    </p>
                                </div>
                            </td>
                        </tr>
                         <?php } // end foreach ?>                         
                        <?php } // end if ?>
                        <tr>
                            <td colspan="2">
                                <div class="no-padding-mobile">
                                    <button type="submit" class="btn btn-action btn-block chk">Đặt phòng</button>
                                    <p class="size13">Bạn vui lòng chọn số lượng phòng hoặc giường phụ (nếu có).<br>
                                        Giường phụ : <?php echo $r->price['price_bed_total']/$modulelib->stay; ?>
                                    </p>
                                    <p class="purple andes-bold size13 text-center">Yêu cầu giường</p>
                                    <div class="col-xs-6 no-padding-mobile">
                                        <p class="size13 text-center"><label class="radio-inline"><input type="checkbox" name="radiobeds" value="1"><span>  1 giường</span></label></p>
                                    </div>
                                    <div class="col-xs-6 no-padding-mobile">
                                        <p class="size13 text-center"><label class="radio-inline no-padding-mobile"><input type="checkbox" name="radiobeds" value="2">  2 giường</label></p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php } ?>
                <?php } ?>
            </form>
        </div>
    </div>

    <div class="clearfix block-rooms hidden-xs" id="rld">
        <div class="table-responsive">
            <form action="<?php echo base_url() . $appModule; ?>/book/<?php echo $module->bookingSlug; ?>" method="GET">
                <input type="hidden" name="adults" value="<?php echo $modulelib->adults > 1 ? $modulelib->adults : 2; ?>" />
                <input type="hidden" name="child" value="<?php echo $modulelib->children; ?>" />
                <input type="hidden" name="checkin" value="<?php echo $modulelib->checkin; ?>" />
                <input type="hidden" name="checkout" value="<?php echo $modulelib->checkout; ?>" />
                <table class="table table-customize">
                    <thead>
                        <tr>
                            <th style="width: 345px;">Loại phòng</th>
                            <th style="width: 167px;">Số phòng</th>
                            <th style="width: 167px;">Giá phòng</th>
                            <th>Đặt phòng</th>
                        </tr>
                    </thead>
                    </table>
                    <?php if (!empty($rooms)) { 
                        $i = 0;
                    ?>
                    <?php foreach ($rooms as $r) {                        
                        $i++;               
                        //var_dump("<pre>",$r->price);die;
                        //var_dump($r->price['price_sale']);
                    ?>
                    <?php 
                    include 'prices/three.php';
                    ?>
                    <?php } ?>
                <?php } ?>
            </form>
        </div>
    </div>
</section>
<script type="text/javascript">
    $('select.room_quantity').change(function(){        
        $(this).parents('table.room-multi').find('.room_quantity_hidden').val($(this).val());
        $(this).parents('table.room-multi').find('.ptype_hidden').val($(this).data('type'));
        $(this).parents('table.room-multi').find('.p_hidden').val($(this).data('p'));
        $(this).parents('table.room-multi').find('.name_uudai').val($(this).data('name'));
        $(this).parents('table.room-multi').find('.detail_id').val($(this).data('detail-id'));
    });
    $('select.extra_beds').change(function(){
        $(this).parents('table.room-multi').find('.extra_beds_hidden').val($(this).val());
        $(this).parents('table.room-multi').find('.pb_hidden').val($(this).data('p'));
    });
    $('.hs_cl_show_info').on('click', function(){
        $(this).parents('table').find('.hs_show_info').slideToggle();
    });
    $('.show_hs_roomMore .clickShow_hs_full_roomMore').on('click', function(){
        $(this).parent().find('.hs_full_roomMoreP').addClass('active');
    });
    $('.hs_full_roomMoreP .clickHide_hs_full_roomMore').on('click', function(){
        $(this).parents('.hs_full_roomMoreP').removeClass('active');
    });
</script>
<?php if(isset($_GET['details'])) { ?>
<script type="text/javascript">
    $(window).load(function(){
        $('#details<?php echo $_GET['details'];?>').modal('show');
    });
</script>
<?php } ?>
<script type="text/javascript">
    $(window).load(function(){
    
    $(".successemail<?php echo $item->id; ?>").on('click', function(){ 
    var youremail = $(".youremail").val();
    var yourphone = $(".yourphone").val();
    var itemid = <?php echo $module->id; ?>;
    var duration = "từ " + $(".dpd1").val() + " đến " + $(".dpd2").val();
    $('#getresponse<?php echo $module->id; ?>').html('<div id="rotatingDiv"></div>');
    $.post("<?php echo base_url(); ?>admin/ajaxcalls/laygiaEmail", {email: youremail, phone: yourphone, id: itemid, hotel: duration}, function(resp){
    //alert(resp);
    if (resp === "done") {
    console.log(resp);
    $("#getresponse<?php echo $module->id; ?>").html("");
    $('.email-me-modal<?php echo $module->id; ?>').modal('hide');
    $('#openModal<?php echo $module->id; ?>').modal('show');
    var myModal = $('#openModal<?php echo $module->id; ?>');
    clearTimeout(myModal.data('hideInterval'));
    myModal.data('hideInterval', setTimeout(function(){
    myModal.modal('hide');
    }, 4000));
    } else {alert(resp); $("#getresponse<?php echo $module->id; ?>").html("<span class='error'>Đã có lỗi xảy ra, chúng tôi đang xem xét.<span>");}
    });
    });
    });
</script>
<div id="emailme<?php echo $module->id; ?>" class="modal fade email-me-modal<?php echo $module->id; ?>" tabindex="-1" data-focus-on="input:first" style="display: none;">
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
                            <input type="text" placeholder="<?php echo trans('0804'); ?> " name="youremail" id="youremail<?php echo $module->id; ?>" class="form-control youremail" required >
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 go-right">
                        <div class="form-group">
                            <div class="clearfix"></div>
                            <input type="text" placeholder="<?php echo trans('0805'); ?> " name="yourphone" id="yourphone<?php echo $module->id; ?>" class="form-control yourphone" required >
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <br>
                    <div class="hotel-modal-title"><?php echo trans('0802'); ?></div>
                    <br>
                    <!--<a id="successemail" style="margin-bottom:5px;float:none;" href="#openModal" type="submit" class="btn btn-action chk successemail" data-toggle="modal" data-content="<?php echo trans('0800'); ?>" rel="popover" data-placement="top" data-original-title="<?php echo $item->title; ?>" data-trigger="hover"><?php echo trans('0806'); ?></a>-->
                    <button id="successemail<?php echo $module->id; ?>" style="margin-bottom:5px;float:none;" type="submit" class="btn btn-action chk successemail<?php echo $item->id; ?>"><?php echo trans('0806'); ?></button>
                    <div id="getresponse<?php echo $module->id; ?>"></div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal -->
<div id="openModal<?php echo $module->id; ?>" class="modal fade" tabindex="-1" data-focus-on="input:first" style="display: none;">
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
<!-- modal -->
<script type="text/javascript">
	$(document).ready(function(){
		$('#btnUpdate').click(function(){
			 var url = "<?php echo base_url(); ?>hotels";
			  
				url += '/' + $('#hotel_slug').val();
			  
			  
			  var checkout = $('#checkout_update').val();
			  console.log(checkout);
			  checkout = checkout.replace("/", "-");
			  checkout = checkout.replace("/", "-");

			  var checkin = $('#checkin_update').val();
			  checkin = checkin.replace("/", "-");
			  checkin = checkin.replace("/", "-");
			  url += '/' + checkin;
			  url += '/' + checkout;			   
			  window.location.href = url + '#rld';
		});
	});
</script>