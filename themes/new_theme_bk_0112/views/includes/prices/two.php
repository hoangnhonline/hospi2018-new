<table class="table table-customize table-content room-multi">
    <thead>
        <tr>
            <th style="width: 345px;"></th>
            <th style="width: 167px;"></th>
            <th style="width: 167px;"></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <input type="hidden" name="room_id[]" value="<?php echo $r->id; ?>" />                                  
        <tr>
            <td rowspan="2">
                <div class="zoom-gallery">
                    <div class="zoom-gallery<?php echo $r->id; ?>">
                        <a href="<?php echo $r->fullimage; ?>" data-source="<?php echo $r->fullimage; ?>" title="<?php echo $r->title; ?>">
                        <!-- <img class="img-responsive" src="<?php echo $r->thumbnail; ?>"> -->
                        <!-- <img class="img-responsive" src="https://www.hospi.vn/uploads/images/hotels/rooms/thumbs/979440_Superior-room---Novotel-Phu-Quoc.jpg"> -->
                        </a>
                    </div>
                </div>
                <div class="info">
                    <h4 class="RTL go-text-right"><b class="purple"><?php echo $r->title; ?></b></h4>
                    <div class="block-people">
                        <h5>Người lớn: <span><?php echo $r->room_adults; ?></span> </h5>
                        <h5>Trẻ em: <span><?php echo $r->room_children; ?></span></h5>
                    </div>
                    <div class="block-view-detail">
                        <div class="visible-lg visible-md go-right" style="margin-top: 0px;">
                            <span class="hs_cl_show_info" href="javascript:;">Xem chi tiết</span>
                        </div>
                    </div>
                </div>                
            </td>
            <td>
                <div class="item-countroom">
                    <h5 class="size12">Số phòng</h5>
                    <select class="form-control room_quantity" data-price="<?php echo $r->price['name_uudai'];?>">
                        <option value="0">0</option>
                        <?php for($k = 1; $k <= $r->maxQuantity; $k++){ ?>
                        <option value="<?php echo $k; ?>"><?php echo $k; ?></option>
                        <?php } ?>
                    </select>
                    </select>
                </div>
                <div class="item-countroom">
                    <h5 class="size12">Giường phụ</h5>
                    <select class="form-control extra_beds">
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
                        <span><?php echo $r->price['name_uudai'];?></span>
                        <br>
                        <span class="clickShow_hs_full_roomMore">(Chi tiết)</span>
                        <div class="hs_full_roomMoreP">
                            <p class="size16" style="border-bottom: 1px solid #ccc; padding: 4px 8px; color: #649800;">
                                <?php echo $r->price['name_uudai'];?>
                                <span class="clickHide_hs_full_roomMore">(x)</span>
                            </p>
                            <div class="ct grey" style="padding: 4px 8px;">
                                <?php echo $r->price['detail_uudai'];?>
                            </div>
                            <p style="border-top: 1px solid #ccc; padding: 4px 8px;">
                                <span class="grey">Thời gian</span>
                                <span class="blue02 size14"><?php echo $r->price['duration']; ?></span>
                            </p>
                        </div>
                    </div>
                    <p class="purple size18"><b><?php echo number_format($r->price['price_uudai']); ?></b></p>
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
                                    <p class="grey">Đêm <?php echo date('d/m', strtotime($priceDetail->date_use)); ?>: <?php echo number_format($priceDetail->total); ?> VND</p>
                                    <?php } } ?>
                                </div>
                                <p style="border-top: 1px solid #ccc; padding: 4px 8px;">
                                    <span class="grey">Tổng <?php echo $modulelib->stay; ?> đêm:</span>
                                    <span class="purple size14"><?php echo number_format($r->price['total']); ?> VND</span>
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
            <td rowspan="2">
                <p><button style="margin-bottom:5px" type="submit" class="btn btn-action btn-block chk">Đặt phòng</button></p>
                <p class="size13">Bạn vui lòng chọn số lượng phòng, Bạn có thể đặt một lúc nhiều loại phòng </p>
                <hr>
                <p class="purple andes-bold size13 text-center">Yêu cầu giường</p>
                <p class="size13 text-center"><label class="radio-inline"><input type="checkbox" name="radiobeds" value="1">1 giường</label></p>
                <p class="size13 text-center"><label class="radio-inline"><input type="checkbox" name="radiobeds" value="2">2 giường</label></p>
            </td>
        </tr>                            
        <tr>
            <td>
                <div class="item-countroom">
                    <h5 class="size12">Số phòng</h5>
                    <select class="form-control room_quantity">
                        <option value="0">0</option>
                        <?php for($k = 1; $k <= $r->maxQuantity; $k++){ ?>
                        <option value="<?php echo $k; ?>"><?php echo $k; ?></option>
                        <?php } ?>
                    </select>
                    </select>
                </div>
                <div class="item-countroom">
                    <h5 class="size12">Giường phụ</h5>
                    <select class="form-control extra_beds">
                        <option value="0">0</option>
                        <?php for($j = 1; $j <= $r->extraBeds; $j++){ ?>
                        <option value="<?php echo $j; ?>"><?php echo $j; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <input type="hidden" class="room_quantity_hidden" name="room_quantity[<?php echo $r->id; ?>]" id="room_quantity_<?php echo $r->id; ?>">
                <input type="hidden" class="extra_beds_hidden" name="extra_beds[<?php echo $r->id; ?>]" id="extra_beds_<?php echo $r->id; ?>">                
            </td>
            <td>
                <div class="block-price">
                    <p class="purple size18"><b><?php echo number_format($r->price['total']); ?></b></p>
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
                                    <p class="grey">Đêm <?php echo date('d/m', strtotime($priceDetail->date_use)); ?>: <?php echo number_format($priceDetail->total); ?> VND</p>
                                    <?php } } ?>
                                </div>
                                <p style="border-top: 1px solid #ccc; padding: 4px 8px;">
                                    <span class="grey">Tổng <?php echo $modulelib->stay; ?> đêm:</span>
                                    <span class="purple size14"><?php echo number_format($r->price['total']); ?> VND</span>
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
        <tr class="hs_room_info hs_show_info">
            <td colspan="4">
                <?php //echo "<pre>"; print_r($r);echo "</pre>"; ?>
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
    </tbody>
</table>