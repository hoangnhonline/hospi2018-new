<?php 
        if(!empty($r->price['uuDaiTotalArr'])){
        ?>
        <?php 
        $countUuDai = 0;
        foreach($r->price['uuDaiTotalArr'] as $detail_id => $uuDaiTotal){            
            $priceUuDaiDetail = $r->price['uuDaiDetail'][$detail_id];
            $countUuDai++;

        ?>
        <tr>
            <?php if($r->price['price_sale']==0){ 
                $rowspan = 1 + count($r->price['uuDaiTotalArr']);
                if($countUuDai == 1){
                ?>

            <td rowspan="<?php echo $rowspan; ?>">
                <div class="zoom-gallery">
                    <div class="zoom-gallery<?php echo $r->id; ?>">
                        <a href="<?php echo $r->fullimage; ?>" data-source="<?php echo $r->fullimage; ?>" title="<?php echo $r->title; ?>">
                        
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
            <?php } } ?>
            <?php 
                $tmpUuDaiFirst = reset($priceUuDaiDetail);                
                ?>
            <td>
                <div class="item-countroom">
                    <h5 class="size12">Số phòng</h5>
                    <select class="form-control room_quantity" data-type="3" data-p="<?php echo $uuDaiTotal['total']/$modulelib->stay; ?>" data-name="<?php echo $tmpUuDaiFirst['name_uudai'];?>"  data-detail-id="<?php echo $detail_id; ?>">
                        <option value="0">0</option>
                        <?php for($k = 1; $k <= $r->maxQuantity; $k++){ ?>
                        <option value="<?php echo $k; ?>"><?php echo $k; ?></option>
                        <?php } ?>
                    </select>
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
                                <?php echo $tmpUuDaiFirst['name_uudai'];?>
                                <span class="clickHide_hs_full_roomMore">(x)</span>
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
            <?php 
            if($r->price['price_sale'] == 0){
                if($countUuDai == 1){
            ?>
            <td rowspan="<?php echo $rowspan; ?>">
                <p><button style="margin-bottom:5px" type="submit" class="btn btn-action btn-block chk">Đặt phòng</button></p>
                <p class="size13">Bạn vui lòng chọn số lượng phòng, Bạn có thể đặt một lúc nhiều loại phòng </p>
                <hr>
                <p class="purple andes-bold size13 text-center">Yêu cầu giường</p>
                <p class="size13 text-center"><label class="radio-inline"><input type="checkbox" name="radiobeds" value="1">1 giường</label></p>
                <p class="size13 text-center"><label class="radio-inline"><input type="checkbox" name="radiobeds" value="2">2 giường</label></p>
            </td>
            <?php }} ?>
        </tr>    
        <?php } // end foreach ?>
        <?php } // end if ?>