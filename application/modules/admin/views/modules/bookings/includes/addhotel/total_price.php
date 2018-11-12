 <div class="col-md-12" style="border: 1px solid #ccc;margin-top: 15px;">
                                        <?php if(isset($model['book_info'])){
                                             foreach ($model['book_info'] as $key => $room) {
                                             $roomStr =  $room['priceRoomAvr']. 'x '.$room['nights'].' (đêm) x '.$room['room_total'].'(phòng) = '.$room['totalRoomPrice'].' VND';
                                             $bedStr =  $room['priceBedAvr']. 'x '.$room['nights'].' (đêm) x '.$room['bed_total'].'(giường) = '.$room['totalBedPrice'].' VND';

                                        ?>
                                            <div class="form-group" style="padding-top: 10px;">
                                                <label for="select-standard" style="font-size: 12px;padding-right: 0px" class="control-label cl-tim"> <?php echo  $room['room_title'] ?></label>
                                                <div>
                                                   <label class="cl-grey font-weight-unset" style="color: #ccc;font-size: 13px"><?php echo $roomStr; ?></label>
                                                </div>
                                            </div>
                                              <?php if($room['bed_total'] >0  && $room['priceBedAvr'] >0){?>
                                            
                                            <div class="clearfix"></div>
                                           <div class="form-group">
                                              <label for="select-standard" style="font-size: 12px;padding-right: 0px" class="control-label cl-tim"> * Giường phụ</label>
                                                <div>
                                              <label class="cl-grey font-weight-unset" style="color: #ccc;font-size: 13px"><?php echo $bedStr; ?></label>
                                             </div>
                                                 
                                          </div>
                                           <?php }?>
                                         <div class="col-md-3" style="height: 1px;background: #ccc;margin-top: -9px;"></div>
                                         <?php 
                                             }
                                            }
                                          ?>
                                    </div>
                                    <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;color: #666666;border: 1px solid #ccc;border-top: 0px">
                                        <div class="col-md-6 text-left padding-top-bottom-5">
                                          <span>Thành tiền</span>
                                        </div>
                                        <div class="col-md-6 text-right padding-top-bottom-5">
                                          <span><?php echo $model['sub_total'] ?> VND</span>
                                        </div>
                                        <div class="col-md-6 text-left padding-top-bottom-5">
                                          <span>Phí VAT</span>
                                        </div>
                                        <div class="col-md-6  text-right padding-top-bottom-5"> 
                                          <span><?php echo $model['vat_cost'] ?> VND</span>
                                        </div>
                                        <div class="col-md-6 text-left padding-top-bottom-5">
                                          <span>Phí dịch vụ</span>
                                        </div>
                                        <div class="col-md-6  text-right padding-top-bottom-5">
                                          <span><?php echo $model['service_cost'] ?> VND</span>
                                        </div>
                                         <div class="col-md-6 text-left padding-top-bottom-5">
                                          <span>Chi phí khác</span>
                                        </div>
                                        <div class="col-md-6  text-right padding-top-bottom-5">
                                          <span>
                                            <?php if(isset( $model['booking_extras_fee']) && (isset( $model['booking_extras_quantity'])) ) {
                                              $total_booking_extras_fee = $model['booking_extras_fee'] * $model['booking_extras_quantity'] ;
                                             echo number_format( $total_booking_extras_fee) ;
                                        }else{  echo '0' ;
                                      }
                                        ?>
                                           VND</span>
                                        </div>
                                         <div class="col-md-6 text-left padding-top-bottom-5">
                                          <span>Thanh toán</span>
                                        </div>
                                        <div class="col-md-6  text-right padding-top-bottom-5">
                                          <span><?php echo $model['preDiscountTotal'] ?> VND</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 no-padding cotent-giamgia">
                                      <div class="col-md-6">Bạn có mã giảm giá ?</div>
                                      <div class="col-md-3 no-padding text-center"><input type="text" class="form-control"  name="coupon_code" id="coupon_code" value="<?php echo $model['coupon_code']?>"></div>
                                      <div class="col-md-3 no-padding text-center"><input type="button" class="form-control btn-tim" name="" value="Áp dụng" onclick="checkCoupon()"></div>
                                      <div class="col-md-12 cl-grey-cc padding-top-bottom-5">

                                        <span> <?php if (isset($model['coupon']) && $model['has_coupon'] == true ) { ?>
                                            Mã giảm giá <?php echo $model['coupon']['code'] ?> được áp dụng. Bạn đã được giảm
                                            <?php echo number_format($model['coupon']['value']) . $model['coupon']['type'] ?>
                                            /tổng hóa đơn. Số tiền được giảm thể hiện trong hóa đơn
                                        <?php } ?>
                                        </span>
                                      </div>
                                      <div class="col-md-6 cl-tim text-left">
                                        <span>Giảm giá</span>
                                      </div>
                                        <div class="col-md-6 cl-tim text-right">
                                        <span><?php echo number_format($model['discountValue']) ?> VND</span>
                                      </div>
                                    </div>
                                    <div class="col-md-12 no-padding tongthanhtoan">
                                       <div class="col-md-6 text-left">
                                        <span>Tổng thanh toán</span>
                                      </div>
                                        <div class="col-md-6 cl-tim text-right">
                                        <span ><?php echo number_format($model['booking_total']) ?> VND</span>
                                        <input type="hidden" id ="booking_total" value="<?php echo $model['booking_total'] ?>" >
                                      </div>
                                    </div>