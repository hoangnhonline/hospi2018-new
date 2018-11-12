<script type="text/javascript">
    $(function () {

        $(".generate").click(function () {
            var id = $(this).prop("id");
            $.post("<?php echo base_url();?>admin/coupons/generate_coupon", {}, function (resp) {
                $("#code" + id).val(resp);
            });
        });
        //add coupon
        $(".submitcoupon").on("click", function () {

            $.post("<?php echo base_url();?>admin/coupons/addcoupon", $("#addcoupon").serialize(), function (resp) {

                var response = $.parseJSON(resp);
                console.log(response);
                //  $("#coupon_result").html(response).fadeIn("slow");
                if (response.status == "success") {

                    $("#coupon_result").html("please wait....").fadeIn("slow");
                    location.reload();

                } else {

                    $("#coupon_result").html(response.msg).fadeIn("slow");

                }


            });

            setTimeout(function () {

                $("#coupon_result").fadeOut("slow");

            }, 5000);

        });

        //update coupon
        $(".editcoupon").on("click", function () {
            var id = $(this).prop('id');
            $.post("<?php echo base_url();?>admin/coupons/updatecoupon", $("#editcoupon" + id).serialize(), function (resp) {

                var response = $.parseJSON(resp);
                console.log(response);
                //  $("#coupon_result").html(response).fadeIn("slow");
                if (response.status == "success") {

                    $("#coupon_result" + id).html("please wait....").fadeIn("slow");
                    location.reload();

                } else {

                    $("#coupon_result" + id).html(response.msg).fadeIn("slow");

                }


            });

            setTimeout(function () {

                $("#coupon_result" + id).fadeOut("slow");

            }, 3000);

        });

    });


</script>

<div class="container" id="content">
      <!-- content-->
       <div class="row">
       
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">THÊM MÃ GIẢM GIÁ</h3>
                 
                </div>
                <div class="panel-body">
                  <form action="" method="POST" role="form" class="form-horizontal">
                    <div class="col-md-5" style="background: #e5e5e5;padding-top: 15px;    padding-bottom: 37px;">
                      <div class="col-md-12">
                           <div class="form-group">
                              <label for="select-standard" class=" col-md-5">Trạng thái</label>
                              <div class="col-md-7">
                                  <select class="form-control" id="#" name="status">
                              <option value="Yes" <?php makeSelected($cop->status, 'Yes'); ?> >
                                Enable
                              </option>
                              <option value="No" <?php makeSelected($cop->status, 'No'); ?> >
                                Disable
                              </option>
                            </select>
                              </div>
                             
                          </div>
                            <div class="form-group">
                              <label for="select-standard" class=" col-md-5">Loại giảm giá</label>
                              <div class="col-md-7">
                                <select class="form-control"  name="type">
                                  <option value="VND" <?php if ($cop->type == "fixed") {  echo 'selected';  } ?> >Fixed
                                  </option>
                                  <option value="%" <?php if ($cop->type == "percentage") {echo 'selected';} ?> >Percentage
                                  </option>
                                </select>
                              </div>
                             
                          </div>
                           <div class="form-group">
                              <label for="select-standard" class=" col-md-5">Giá trị</label>
                              <div class="col-md-7">
                                <input type="text" placeholder="Value" class="form-control number" name="rate" id="rate" value="<?php echo number_format($cop->value); ?>"/>
                              </div>
                             
                          </div>
                           <div class="form-group">
                              <label for="select-standard" class=" col-md-5">Số lượng tối đa</label>
                              <div class="col-md-7">
                                  <input type="text" placeholder="Maximum Uses" class="form-control" name="max" id="max" value="<?php echo $cop->maxuses; ?>"/>
                                </div>
                             
                          </div>
                            <div class="form-group">
                              <label for="select-standard" class=" col-md-5">Điều kiện booking</label>
                              <div class="col-md-7">
                                <select class="form-control" name="condition">
                                  <option value= 0  <?php if ($cop->condition == 0) {  echo 'selected';  } ?> >Áp dụng</option>
                                  <option value= 1  <?php if ($cop->condition == 1) {  echo 'selected';  } ?> >Không áp dụng</option>
                                </select>
                              </div>
                             
                          </div>
                           <div class="form-group">
                              <label for="select-standard" class=" col-md-5" >Tổng booking</label>
                              <div class="col-md-7">
                                <input type="text" class="form-control number" name="condition_value" placeholder="Giá tiền VND (<=)" value ="<?php echo number_format($cop->condition_value) ?>" >
                              </div>
                             
                          </div>
                          <div class="form-group">
                           <label for="username0" class="col-md-5" style="margin-right: 15px;">Ngày bắt đầu</label>
                          <div id="datetimepicker1" class="input-group date col-md-6">
                            <input type="text"  class="form-control dpd1" name="startdate" id="stardate" value="<?php echo pt_show_date_php($cop->startdate); ?>"/>
                            <span class="input-group-addon">
                              <span class="fa-calendar fa"></span>
                            </span>
                          </div>
                        </div>
                        <div class="form-group">
                           <label for="username0" class="col-md-5" style="margin-right: 15px;">Ngày kết thúc</label>
                          <div id="datetimepicker1" class="input-group date col-md-6">
                            <input type="text" class="form-control dpd2" name="expdate" id="expdate" value="<?php echo pt_show_date_php($cop->expirationdate); ?>"/>
                            <span class="input-group-addon">
                              <span class="fa-calendar fa"></span>
                            </span>
                          </div>
                        </div>
                       
                    </div>
                   </div>
                    <div class="col-md-7">
                          
                      <div class="panel panel-default">
                          <div class="panel-heading">
                            <h3 class="panel-title">Mã giảm giá áp dụng chung</h3>
                           
                          </div>
                          <div class="panel-body" style="padding-top: 10px;padding-bottom: 10px;">
                            <?php foreach ($modules as $mod => $items): ?>
                              <div class="col-md-6" style="margin-top: 15px">
                               <div class="icheckbox_square-grey" style="position: relative;">
                                <input type="checkbox" class="form-control checkboxcls" name="allmodules[]" value="<?php echo $mod; ?>" style="position: absolute; visibility: hidden;" <?php if (pt_couponAssignedAllItems($cop->id, $mod)) {echo "checked";} ?> >
                              </div> All <?php echo ucfirst($mod); ?> &nbsp;
                             </div>

                            <?php endforeach; ?>

                            
                         </div>
                      </div>

                      <div class="panel panel-default">
                          <div class="panel-heading">
                            <h3 class="panel-title">Mã giảm giá áp dụng riêng</h3>
                           
                          </div>
                          <div class="panel-body" style="padding-top: 10px;padding-bottom: 10px;">
                             <?php foreach ($modules as $mod => $items): ?>
                                

                                <div class="form-group">
                                  <label for="select-standard" class=" col-md-4 font-weight-unset">Áp dụng <?php echo ucfirst($mod); ?></label>
                                  <div class="col-md-8">
                                     <select class="chosen-multi-select" name="items[<?php echo $mod; ?>][]" id="" multiple>
                                        <?php foreach ($items as $item) { ?>
                                          <option value="<?php echo $item->id; ?>" <?php if (pt_couponAssigned($cop->id, $mod, $item->id)) {
                                             echo "selected"; } ?>>
                                          <?php echo $item->title; ?>
                                          </option>
                                        <?php } ?>
                                      </select>
<!--                                    <input type="text" class="form-control" name="">
 -->                                  </div>
                             
                              </div>

                              <?php endforeach; ?>
                              
                             
                         </div>
                         <div class="panel-footer">
                            
                                  
                              <div class="col-md-4">
                                <input type="hidden" name="code" id="codeadd" placeholder="Coupon Code" class="form-control code" value="<?php echo $cop->code; ?>">
                              </div>
                             
                               <div class="col-md-4">
                                <button class="btn-tim" style="padding-top: 6px;padding-bottom: 6px">SỬA MÃ GIẢM GIÁ</button>
                              </div>
                              <div class="clearfix"></div>
                         </div>
                      </div>

                    </div>
                      <input type="hidden" name="couponid" value="<?php echo $cop->id; ?>"/>
                  </form>
                  <div class="col-md-12">
                    <div class="form-group">
                                  <label for="select-standard" class=" col-md-2 font-weight-unset">Ghi chú</label>
                                  <div class="col-md-10">
                                   <textarea cols="4" rows="8" class="form-control"></textarea>
                                  </div>
                             
                              </div>
                  </div>
                   
                     
                    
                  
                </div>
              </div>
            </div>
            
          </div>
      <!-- end-->

    </div>