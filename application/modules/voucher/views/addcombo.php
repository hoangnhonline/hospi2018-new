<form id="form_add_hotel" method="POST" action="">

<div class="container" id="content" >
      <!-- content-->
      <div class="col-md-12" style="border-bottom: 1px solid #ccc;    padding-bottom: 30px;padding-top: 30px;background: white">
        <div class="col-md-8" style="padding-left: 0px;margin-left: -15px;">
            <div class="form-group">
              <label for="select-standard" style="background: #660033;color: white;padding-top: 6px;padding-bottom: 7px;border: 1px solid white;" class="control-label col-md-4">E - Voucher</label>
             <div class="col-md-5" style="padding-left: 0px">
               <select class="form-control" style="background-color: #ccc;">
                 <option>Khách sạn</option>
               </select>
             </div>
                 
          </div>
     
        </div>
       <div class="col-md-4">
           <div class="col-md-5">
                 <div class="form-group">
                    <label for="select-standard" class="control-label font-weight-unset">Ngày 20/10/2017</label>
                  
                </div>
          </div>
          <div class="col-md-7">
                 <div class="form-group">
                    <label for="select-standard" class="control-label font-weight-unset">Nhân viên: Khánh Tâm</label>
                  
                </div>
          </div>
       </div>
       <div class="col-md-4" style="margin-top: 20px;">
        
        <div class="form-group">
          <div class="col-md-8" style="padding-right: 0px;padding-left: 0px;">
              <input type="text" class="form-control" name="">
          </div>
            <div class="col-md-4" style="padding-left: 0px; padding-right: 0px;">
              <button style="    background: #660033;color: white;border: 1px solid white;padding-top: 5px;padding-bottom: 8px;">Lấy thông tin</button>
          </div>
            
          </div>

       </div>
      </div>
         <div class="panel panel-default col-md-8" style="    padding-bottom: 470px;">
                      <ul class="nav nav-tabs nav-justified" role="tablist">
                          <li class="active "><a href="#GENERAL" class="text-left clssnhapthongtin" data-toggle="tab" aria-expanded="true">Nhập thông tin</a></li>
                          <li class=""><a href="#FACILITIES" class="text-left clssthongtinhcanhan" data-toggle="tab" aria-expanded="false">Thông tin cá nhân</a></li>
                          <li class=""><a href="#tinhtrangthanhtoan" class="text-left clsstinhtrangthanhtoan" data-toggle="tab" aria-expanded="false">Tình trạng thanh toán</a></li>
                        
                      </ul>
                      <div class="panel-body">
                          <div class="tab-content ">
                              <div class="tab-pane wow fadeIn animated active" id="GENERAL">
                                 <div class="row">
        <div>
                                        <div class="col-md-12">
                                          <div class="panel panel-default">
                                           
                                            <div class="panel-body" style="padding-top: 15px">
                                           
                                              <form role="form" class="form-horizontal">
                                                <div class="col-md-7">
                                                       <div class="form-group">
                                                          <label for="select-standard" class="control-label col-md-5 font-weight-unset">Tạo mã combo</label>
                                                         <div class="col-md-7">
                                                            <input type="text" name="combo_code" id="txt_combo_code" class="form-control">
                                                         </div>
                                                             
                                                      </div>
                                                </div>
                                              
                                                <div class="col-md-5">
                                                       <div class="form-group ">
                                                          <label id="generate_hotel_code"  for="select-standard" class="control-label col-md-12 font-weight-unset text-left"><u>Lấy mã tự động</u></label>
                                                           
                                                          
                                                       
                                                  
                                                      </div>
                                                </div>
                                               <div class="clearfix"></div>
                                                 <div class="col-md-8">
                                                       <div class="form-group ">
                                                          <label for="select-standard" class="control-label font-weight-unset">Tên khách sạn </label>

                                                           <select class="form-control chosen-select" name="relatedhotels[]" id="hotels_select">
                                                            <?php foreach ($hotels as $hotel) { ?>
                                                                  <option value="<?php echo $hotel->hotel_id; ?>"
                                                                     <?php if ($model['hotel_id']== $hotel->hotel_id ) { echo 'selected';} ?> >
                                                                         <?php echo $hotel->hotel_title; ?>
                                                                    </option>
                                                              <?php } ?>
                                                           </select>
                                                      </div>
                                                      
                                                       <div class="form-group">
                                                          <label for="hotel_city">Chọn
                                                            combo<span class="red-star">*</span></label>
                                                          <select class="form-control chosen-select" name="combo_id" id="combo">
                                                                <?php foreach ($combos as $combo) { ?>
                                                                  <option value="<?php echo $combo->offer_id; ?>" <?php echo isset($model['combo_id']) && $combo->offer_id == $model['combo_id'] ? "selected" : ""; ?>><?php echo $combo->offer_title; ?></option>
                                                                <?php } ?>
                                                          </select>
                                                        </div>
                                                </div>
                                                 <div class="clearfix"></div>
                                              <div class="col-md-3">
                                                 <div class="form-group">
                                                     <label for="username0" class=" control-label font-weight-unset">Ngày nhận phòng</label>
                                                    <div id="datetimepicker1" class="input-group date">
                                                      <input type="text" placeholder="Ngày nhận phòng" name="checkin" id="checkin" class="form-control mySelectCalendar dpd1" value="<?php echo $model['checkin']; ?>" required >

                                                      <span class="input-group-addon">
                                                        <span class="fa-calendar fa"></span>
                                                      </span>
                                                    </div>
                                                  </div>
                                              </div>
                                                  <div class="col-md-3" style="margin-left: 15px;">
                                                 <div class="form-group">
                                                     <label for="username0" class=" control-label font-weight-unset">Ngày trả phòng</label>
                                                    <div id="datetimepicker1" class="input-group date">
                                                      <input type="text" placeholder="Ngày nhận phòng" name="checkout" id="checkout" class="form-control mySelectCalendar dpd2" value="<?php echo $model['checkout']; ?>" required >
                                                      <span class="input-group-addon">
                                                        <span class="fa-calendar fa"></span>
                                                      </span>
                                                    </div>
                                                  </div>
                                              </div>
                                              <div class="col-md-3" style="margin-top: 25px;margin-left: 15px;">
                                                 <div class="form-group">
                                                    <label class=" control-label font-weight-unset">Số đêm: <b>02</b></label>
                                                 </div>
                                              </div>
                                              <div class="clearfix"></div>
                                              <div class="col-md-3">
                                                <div class="form-group">
                                                  <label class=" control-label font-weight-unset">Người lớn</label>

                                                  <input type="number" class="form-control" name="booking_adults" value=<?php echo $model['booking_adults'] ?>>


                                                </div>
                                              </div>
                                              <div class="col-md-3" style="margin-left: 15px">
                                                <div class="form-group">
                                                  <label class=" control-label font-weight-unset">Trẻ em</label>

                                                  <input type="number" class="form-control" name="booking_child" value=<?php echo $model['booking_child'] ?>>


                                                </div>
                                              </div>
                                              <div class="col-md-3" style="margin-left: 15px">
                                                <div class="form-group">
                                                  <label class=" control-label font-weight-unset">Yêu cầu
                                                    giường</label>

                                                  <input type="number" class="form-control" name="booking_extra_beds" value="<?php echo $model['booking_extra_beds'] ?>">


                                                </div>
                                              </div>
                                              <div class="clearfix"></div>
                                              <div id="education-box">
                                                    
                                                   <?php include ("includes/hotel/room_list.php") ?>

                      </div>
                      <div class="clearfix" style="margin-top: 15px"></div>
                      <div class="col-md-2" style="margin-top: 25px;">
                        <div class="form-group">
                          <label class=" control-label font-weight-unset">Giường phụ</label>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class=" control-label font-weight-unset">Số giường</label>
                                                    <input type="text" class="form-control" value="<?php echo $model['booking_extra_beds']?>" name="booking_extra_beds">
                        </div>
                      </div>
                      <div class="clearfix"></div>
                      <div class="col-md-10" style="padding-left: 0px;">
                        <label class=" control-label font-weight-unset">Ghi chú</label>
                                                <textarea rows="4" cols="6" class="form-control" placeholder="Nhập thông tin" name="booking_additional_notes">
                                                                         <?php echo $model['booking_additional_notes'] ?>

                                                  </textarea>
                                              </div>            
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                            <!-- end-->

                          </div>
                                
                              </div>
                              <div class="tab-pane wow fadeIn animated" id="FACILITIES">
                               <div class="col-md-6">
                                 <div class="form-group">
                                        <label class=" control-label font-weight-unset"></label>
                                        <input type="text" class="form-control" placeholder="Họ tên của bạn" name="customer_name" value ="<?php echo $model['customer_name']?>" >
                                   </div>
                                   <div class="form-group">
                                        <label class=" control-label font-weight-unset"></label>
                                        <input type="text" class="form-control" placeholder="Email" name="customer_email"  value ="<?php echo $model['customer_email']?>"  >
                                   </div>
                                   <div class="form-group">
                                        <label class=" control-label font-weight-unset"></label>
                                        <input type="text" class="form-control" placeholder="Số điện thoại" name="customer_phone" value ="<?php echo $model['customer_phone']?>" >
                                   </div>
                               </div>
                                <div class="clearfix"></div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                        <label class=" control-label font-weight-unset"></label>
                                        
                                        <input placeholder="Địa chỉ" type="text" class="form-control"  name="customer_address" value="<?php echo $model['customer_address']?>">
                                   </div>
                                </div>
                              </div>
                               <div class="tab-pane wow fadeIn animated" id="tinhtrangthanhtoan">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label class=" control-label font-weight-unset col-md-4">Tình trang thanh toán</label>
                                        <div class="col-md-8">
                                        
                                          <select class="form-control cl-tim">
                                            <option>Chưa thanh toán</option>
                                            <option>Đã thanh toán</option>
                                            <option>Đã cọc</option>
                                            <option>Đã hủy</option>
                                          </select>
                                        </div>
                                        
                                   </div>
                                 </div>
                               </div>
                          </div>
                      </div>
                </div>
                <div class="col-md-4" style="padding-left: 0px;padding-right: 0px;background: white;">
                  <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;border-bottom: 1px solid #ccc;">
                    <div class="col-md-4" style="color: #660033;border-bottom: 2px solid #660033;padding-left: 0px;padding-right: 0px;width: 60px;">Bao gồm</div>
                    <div class="col-md-8" style="padding-left: 0px;padding-right: 0px">&nbsp;</div>
                  </div>
                  <div class="col-md-12" style="padding-left: 0px;padding-right: 0px">
                    <div class="form-group">
                        <label class=" control-label font-weight-unset"></label>
                        <textarea cols="4" rows="6" class="form-control">Nhập thông tin</textarea>
                       
                     </div>
                  </div>
                </div>
     <!-- ep 2-->
       <div class="col-md-4" style="padding-left: 0px;padding-right: 0px;background: white;">
                  <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;border-bottom: 1px solid #ccc">
                    <div class="col-md-4" style="color: #660033;border-bottom: 2px solid #660033;padding-left: 0px;padding-right: 0px;width: 96px;">Thông tin khác</div>
                    <div class="col-md-8" style="padding-left: 0px;padding-right: 0px">&nbsp;</div>
                  </div>
                  <div class="col-md-12" style="padding-left: 0px;padding-right: 0px">
                    <div class="form-group">
                        <label class=" control-label font-weight-unset"></label>
                        <textarea cols="4" rows="6" class="form-control">Nhập thông tin</textarea>
                       
                     </div>
                  </div>
                </div>
                <!--ep 3 -->
                  <div class="col-md-4" style="padding-left: 0px;padding-right: 0px;background: white;">
                  <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;border-bottom: 1px solid #ccc">
                    <div class="col-md-4" style="color: #660033;border-bottom: 2px solid #660033;    padding-left: 0px;padding-right: 0px;width: 89px;">Điều kiện hủy</div>
                    <div class="col-md-8" style="padding-left: 0px;padding-right: 0px">&nbsp;</div>
                  </div>
                  <div class="col-md-12" style="padding-left: 0px;padding-right: 0px">
                    <div class="form-group">
                        <label class=" control-label font-weight-unset"></label>
                        <textarea cols="4" rows="11" class="form-control">+ Hủy phòng trước 24 ngày trước ngày khách đến (trừ thứ bảy, chủ nhật và Lễ ,Tết) không tính phí.       + Hủy phòng trước 23 ngày đến 13 ngày trước ngày khách đến (trừ thứ bảy, chủ nhật và Lễ ,Tết) tính 50% tổng tiền phòng.                                                           + Hủy phòng trong vòng 12 ngày trước ngày khách đến (trừ thứ bảy, chủ nhật và Lễ ,Tết) tính 100% tổng tiền phòng.
+ Các booking ngày lễ ,Tết không hủy,không đổi,không hoàn.
                        </textarea>
                       
                     </div>
                  </div>
                </div>
          <!-- -->
             <div class="col-md-4" style="padding-left: 0px;padding-right: 0px;background: white;">
                  <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;border-bottom: 1px solid #ccc">
                    <div class="col-md-4" style="color: #660033;border-bottom: 2px solid #660033;padding-left: 0px;
    padding-right: 0px;width: 43px;
    ">Lưu ý</div>
                    <div class="col-md-10" style="padding-left: 0px;padding-right: 0px;font-size: 12px;margin-top: 4px;">Thông tin mặc định (<u>chỉnh sửa lại thông tin</u>)</div>
                  </div>
                  <div class="col-md-12" style="padding-left: 0px;padding-right: 0px">
                    <div class="form-group">
                        <label class=" control-label font-weight-unset"></label>
                        <textarea cols="4" rows="20" class="form-control">- Theo quy định của khách sạn                                     Giờ nhận phòng :14:00 PM và Giờ trả phòng 12:00PM- Trong trường hợp đến khách sạn, resort sớm và muốn nhận phòng sớm hơn theo quy định .Vui lòng liên hệ tiếp tân để được hỗ trợ và việc check - in sớm còn tùy thuộc vào tình trạng phòng trong ngày bạn đến.Không được xác nhận trước.                                                 - Quý khách vui lòng mang CMND,Hộ Chiều...(Giấy tờ tùy thân theo pháp luật Việt Nam ) và phiếu xác nhận của HOSPI giao cho tiếp tân khi làm thủ tục nhận phòng
                                                                                     -Theo quy định của pháp luật Việt Nam .Khi một người mang quốc tịch Việt Nam và một người mang quốc tịch nước ngoài ỡ chung phòng thì phải có giấy kết hôn.
                                                                                        -Nếu Quý khách cần hỗ trợ thông tin về(Vật nuôi,xe lăn,nôi em bé ...).Vui lòng gọi (028) 3826 8797 hoặc Hotline: 09 6868 0106 để được nhân viên tư vấn
                        </textarea>
                       
                     </div>
                  </div>
                </div>

                <div class="col-md-4" style="padding-left: 0px;padding-right: 0px;background: white;padding-top: 15px">
                
                  <div class="col-md-12" style="padding-left: 0px;padding-right: 0px">
                    <div class="form-group">
                        <label class=" control-label font-weight-unset"></label>
                       <div class="icheckbox_square-grey" style="position: relative;"><input type="checkbox" class="checkboxcls" name="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Gửi E-Voucher đến khách hàng
                       
                     </div>
                  </div>
                </div>
                   <div class="col-md-4" style="padding-left: 0px;padding-right: 0px;background: white;padding-top: 15px">
                
                  <div class="col-md-12 text-center" style="padding-left: 0px;padding-right: 0px">
                    <button style="background: #660033;color: white;width: 100%;border: 1px solid white;height: 40px">TẠO VOUCHER</button>
                  </div>
                </div>
                <!-- eq 4-->

                <div class="clearfix"></div>
</div>
</form>




<script type="text/javascript">

    $("select#hotels_select").change(function () {
        var checkin = $("#checkin").val();
        var checkout= $("#checkout").val();
        data = "&checkin="  +checkin + "&checkout="  +checkout ;
        url = "<?php echo base_url();?>admin/voucher/hotelComboChange?hotel_id=" + $(this).val() +data;//alert(url);
        $.ajax({
            url: url, success: function (result) {//alert(result);
               $("#education-box").html(result);
                //$("#hotels_select").html(result);
            }
        });
    });

   function addRoom(){
       var hotel_id = $("select#hotels_select").val(); 
       var checkin = $("#checkin").val();
       var checkout= $("#checkout").val();
       var data = $('#education-box :input').serialize();
       data ="&" + data +  "&checkin="  +checkin + "&checkout="  +checkout ;
               url = "<?php echo base_url();?>admin/voucher/addComboRoom?hotel_id=" +hotel_id+data ;//alert(url);

      $.ajax({
          url: url, success: function (result) {//alert(result);
             $("#education-box").html(result);
              //$("#hotels_select").html(result);
          }
      });
    }

    

    $("#generate_hotel_code").click(function () {
        $.post("<?php echo base_url();?>admin/voucher/generate_coupon", {}, function (resp) {
            $("#txt_hotel_code").val(resp);
        });
    });

 

  function removeRoom(roomId) {
      var div = "#div_room_"+roomId;
      $(div).remove();
      var hotel_id = $("select#hotels_select").val(); 
     var checkin = $("#checkin").val();
     var checkout= $("#checkout").val();
     var data = $('#education-box :input').serialize();
     data ="&" + data +  "&checkin="  +checkin + "&checkout="  +checkout +"&hotel_id=" +hotel_id ;

     url = "<?php echo base_url();?>admin/voucher/delComboRoom?room_id=" +roomId+ data ;//alert(url);
        $.ajax({
            url: url, success: function (result) {//alert(result);
               $("#education-box").html(result);
                //$("#hotels_select").html(result);
            }
        });
  }

</script>

    