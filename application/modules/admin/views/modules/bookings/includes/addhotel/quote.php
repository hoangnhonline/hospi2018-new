 <ul class="nav nav-tabs nav-justified" role="tablist">
                          <li class="active " style="font-size: 13px"><a href="#donhang" class="text-left" data-toggle="tab" aria-expanded="true">Đơn hàng</a></li>
                          <li class="" style="font-size: 13px"><a href="#dieukienhuy" class="text-left" data-toggle="tab" aria-expanded="false">Điều kiện hủy</a></li>
                          <li class="" style="font-size: 13px"><a href="#" class="text-left" data-toggle="tab" aria-expanded="false"></a></li>
                        
                      </ul>
                        <div class="panel-body margin-top-10" style="padding-top: 0px;padding-bottom: 0px">
                          <div class="tab-content ">
                             <div class="tab-pane wow fadeIn animated active" id="donhang">
                                 <div class="col-md-12" style="padding-left: 0px;padding-right: 0px">
                                      <div class="col-md-3" style="padding-left: 0px;padding-right: 0px">
                                        <img src="<?php if(isset($model['hotel_detail'])) echo PT_OFFERS_IMAGES.$model['hotel_detail']->thumbnail_image; ?>" class="img-responsive">
                                      </div>
                                       <div class="col-md-9">
                                        <div><span><?php if(isset($model['hotel_detail'])) echo $model['hotel_detail']->hotel_title; ?></span></div>
                                        <div><i class="fa fa-map-marker " aria-hidden="true"></i><span><?php if(isset($model['hotel_detail'])) echo $model['hotel_detail']->hotel_map_city; ?></span></div>
                                         <div> 
                                          <?php if(isset($model['hotel_detail'])) {
                                          for($i=0 ; $i< $model['hotel_detail']->hotel_stars;$i++){ ?>
                                          <i class="fa fa-star cl-tim" aria-hidden="true"></i>
                                           <?php }}?>
                                       </div>
                                   
                                      </div>
                                      <div class="col-md-12 no-padding">
                                      <div class="col-md-7" style="padding-left: 0px; height: 102px;   border: 1px solid #ccc;margin-top: 10px;      border-right: 0px;">
                                           <div class="form-group " style="margin-bottom: 0px;">
                                                <label for="select-standard" style="font-size: 12px" class="control-label col-md-7 font-weight-unset">Ngày nhận phòng</label>
                                                <div class="col-md-5" style="padding-left: 0px">
                                                   <label class="cl-tim"><?php echo $model['checkin']; ?></label>
                                                </div> 
                                                   
                                            </div>
                                            <div class="form-group " style="margin-bottom: 0px;">
                                                <label for="select-standard" style="font-size: 12px" class="control-label col-md-7 font-weight-unset">Ngày trả phòng</label>
                                                <div class="col-md-5" style="padding-left: 0px">
                                                   <label class="cl-tim"><?php echo $model['checkout']; ?></label>
                                                </div>
                                                   
                                            </div>
                                             <div class="form-group " style="margin-bottom: 0px;">
                                                <label for="select-standard" style="font-size: 12px" class="control-label col-md-7 font-weight-unset">Số đêm</label>
                                                <div class="col-md-5" style="padding-left: 0px">
                                                   <label class="cl-tim"><?php echo $model['stay']; ?> </label>
                                                </div>
                                                   
                                            </div>
                                      </div>
                                       <div class="col-md-5" style="border: 1px solid #ccc;margin-top: 10px">
                                         <form class="form-horizontal">
                                           <div class="form-group " style="margin-bottom: 0px;">
                                                <label for="select-standard" style="font-size: 12px;padding-right: 0px" class="control-label col-md-9 font-weight-unset">Người lớn</label>
                                                <div class="col-md-3">
                                                   <label class="cl-tim"> <?php echo $model['booking_adults']; ?></label>
                                                </div> 
                                                   
                                            </div>
                                            <div class="form-group " style="margin-bottom: 0px;">
                                                <label for="select-standard" style="font-size: 12px;padding-right: 0px" class="control-label col-md-9 font-weight-unset">Trẻ em</label>
                                                <div class="col-md-3">
                                                   <label class="cl-tim"> <?php echo $model['booking_child']; ?></label>
                                                </div>
                                                   
                                            </div>
                                             <div class="form-group " style="margin-bottom: 0px;">
                                                <label for="select-standard" style="font-size: 12px;padding-right: 0px" class="control-label col-md-9 font-weight-unset">Số lượng phòng</label>
                                                <div class="col-md-3">
                                                   <label class="cl-tim"><?php echo $model['room_total']; ?></label>
                                                </div>
                                                   
                                            </div>
                                             <div class="form-group " style="margin-bottom: 0px;">
                                                <label for="select-standard" style="font-size: 12px;padding-right: 0px" class="control-label col-md-9 font-weight-unset">Giường phụ</label>
                                                <div class="col-md-3">
                                                   <label class="cl-tim"><?php echo $model['booking_extra_beds']; ?></label>
                                                </div>
                                                   
                                            </div>
                                        </form>
                                       </div>

                                    </div>

                                    <div id="div_total_price">
                                      <!-- total price -->
                                        <?php              
                                           $this->load->view('modules/bookings/includes/addhotel/total_price');
                                          ?>
                                     </div>
                                    <!--end total price -->
                                 </div>

                              </div>
                              <div class="tab-pane wow fadeIn animated" id="dieukienhuy">
                                    <div class="form-group">
                                        <label class=" control-label font-weight-unset"></label>
                                        <textarea cols="4" rows="13" class="form-control" name="cancel_condition"><?php if(isset($model['hotel_detail'])) echo $model['cancel_condition']?></textarea>
                       
                                </div>
                              </div>
                         
                          </div>
                        </div>

                        <ul class="nav nav-tabs nav-justified" role="tablist">
                          <li class="active " style="font-size: 13px"><a href="#tinhtrangthanhtonadon" class="text-left" data-toggle="tab" aria-expanded="true">Tình trạng thanh toán</a></li>
                          <li class="" style="font-size: 13px"><a href="#" class="text-left" data-toggle="tab" aria-expanded="false"></a></li>
                          <li class="" style="font-size: 13px"><a href="#" class="text-left" data-toggle="tab" aria-expanded="false"></a></li>

                      </ul>
                       <div class="panel-body">
                          <div class="tab-content ">
                             <div class="tab-pane wow fadeIn animated active" id="tinhtrangthanhtonadon">
                                <div class="col-md-12">
                                     <div class="form-group ">
                                  <label for="select-standard" class="control-label col-md-6 font-weight-unset">Tình trạng thanh toán</label>
                                  <div class="col-md-6">
                                     <select class="form-control cl-tim" name="booking_status" id ="booking_status">
                                       <option value="unpaid" <?php if($model['booking_status'] == "unpaid")echo "selected" ?> >Chưa thanh toán</option>
                                      <option value="paid" <?php if( $model['booking_status'] == "paid")echo "selected" ?>>Đã thanh toán</option>
                                      <option value="reserved" <?php if( $model['booking_status'] == "reserved")echo "selected" ?>>Đã cọc</option>
                                      <option value="cancelled" <?php if( $model['booking_status'] == "cancelled")echo "selected" ?>>Đã Hủy</option>
                                     </select>
                                  </div>
                                </div>
                                </div>
                              <div class="col-md-12 margin-top-10">
                                  <div class="form-group ">
                                  <label for="select-standard" class="control-label col-md-6 font-weight-unset">Số tiền</label>
                                  <div class="col-md-6">
                                     <input id="booking_amount_paid" type="text" class="form-control" value="<?php echo number_format($model['booking_amount_paid']) ?>" name="booking_amount_paid" onkeyup="paid()">
                                  </div>
                                </div>
                              </div>
                                 <div class="col-md-12 margin-top-10">
                                  <div class="form-group ">
                                  <label for="select-standard" class="control-label col-md-6 font-weight-unset cl-tim">Còn lại</label>
                                  <div class="col-md-6 text-right">
                                     <label class="cl-tim" id="remain"><?php echo number_format($model['booking_remaining']) ?> VND</label>
                                  </div>

                                </div>
                              </div>
                              <div class="col-md-12 margin-top-10">
                                <div class="form-group">
                                <label for="username0" class="col-md-6 control-label font-weight-unset">Cập nhật ngày</label>
                                <div id="datetimepicker1" class="input-group date col-md-6">
                                  <input type="text" class="form-control dpd1" name="booking_payment_date" value="<?php echo $model['booking_payment_date']?>">
                                  <span class="input-group-addon">
                                    <span class="fa-calendar fa"></span>
                                  </span>
                                </div>
                              </div>
                              </div>
                              <div class="col-md-12">
                                  <div class="form-group ">
                                    <label for="select-standard" class="control-label font-weight-unset">Ghi chú</label>
                                      <textarea cols="4" class="form-control" rows="6"  name="note"><?php echo $model['note'] ?></textarea>
                                </div>
                              </div>
                              <div class="col-md-12" style="padding-bottom: 5px">
                                    <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;background: white;padding-top: 15px">
                
                                      <div class="col-md-12" style="padding-left: 0px;padding-right: 0px">
                                        <div class="form-group">
                                            <label class=" control-label font-weight-unset"></label>
                                           <div class="icheckbox_square-grey" style="position: relative;"><input type="checkbox" class="checkboxcls" name="is_send" <?php if($model['is_send'] == 1){echo 'checked';}?> >
                                           </div> Gửi email xác nhận đến khách hàng 
                                           
                                         </div>
                                      </div>
                                    </div>
                                       <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;background: white;padding-top: 15px">
                                    
                                      <div class="col-md-12 text-center" style="padding-left: 0px;padding-right: 0px">
                                        <button style="background: #660033;color: white;width: 100%;border: 1px solid white;height: 40px">LƯU BOOKING</button>
                                      </div>
                                    </div>
                              </div>
                              
                             </div>
                           </div>
                         </div>

<script type="text/javascript">
  $( document ).ready(function() {
  $('.dpd1').datepicker();
});


  
</script>