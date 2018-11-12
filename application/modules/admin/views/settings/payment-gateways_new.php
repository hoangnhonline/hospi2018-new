<style>
input, button, select, textarea  {
  display: block;
  height: 34px;
  padding: 6px 12px;
  font-size: 14px;
  line-height: 1.42857143;
  color: #555;
  background-color: #fff;
  background-image: none;
  border: 1px solid #ccc;
  border-radius: 2px;
}

</style>

<script>
  $(function(){
  // change order - MoveUp
  $('.moveup').click(function(){
  var order = $(this).data('order');
  // $.alert.open('confirm', 'Are you sure you want to Disable it', function(answer) {
  //   if (answer == 'yes')

  $.post("<?php echo base_url();?>admin/ajaxcalls/updateGatewayOrder", { order: order, action: 'up' }, function(theResponse){
  location.reload(); });  });
  //end move up

  // change order - MoveDown
  $('.movedown').click(function(){
  var order = $(this).data('order');
  $.post("<?php echo base_url();?>admin/ajaxcalls/updateGatewayOrder", { order: order, action: 'down' }, function(theResponse){
  location.reload(); }); });
  //end movedown
  })
</script>
<?php
$cod = $all_payments['activeGateways'][0]['gatewayValues']['cod'];
$payatoffice = $all_payments['activeGateways'][0]['gatewayValues']['payatoffice'];

?>
<div class="container" id="content">
      
      <!-- content-->
   <div class="col-md-12 text-right" style="
    padding-top: 13px;background: white">
                                                <button type="button" class="btn btn-info"><i class="fa fa-arrow-down"></i></button>
                                                <button type="button" class="btn btn-warning"><i class="fa fa-arrow-up"></i></button>
                                              </div>
         <div class="panel panel-default col-md-12" style="    margin-bottom: -37px;">
                      <ul class="nav nav-tabs nav-justified" role="tablist">
                          <li class="active "><a href="#GENERAL" class="text-left clsschuyenkhoan" data-toggle="tab" aria-expanded="true">Chuyển khoản</a></li>
                          <li class=""><a href="#FACILITIES" class="text-left" data-toggle="tab" aria-expanded="false"></a></li>
                          <li class=""><a href="#tinhtrangthanhtoan" class="text-left" data-toggle="tab" aria-expanded="false"></a></li>
                         <li class=""><a href="#tinhtrangthanhtoan" class="text-left" data-toggle="tab" aria-expanded="false"></a></li>
                      </ul>
                      <div class="panel-body">
                          <div class="tab-content ">
                              <div class="tab-pane wow fadeIn animated active" id="GENERAL">
                                 <div class="row">
        <div>
                                        <div class="col-md-12">
                                          <div class="panel panel-default">
                                           
                                            <div class="panel-body" style="padding-top: 0px;padding-bottom: 0px" id ="atmList">
                                           

                                              <div class="col-md-8">
                                                   <div class="form-group ">
                                                          <label for="select-standard" class="col-md-3 font-weight-unset ">Tên phương thức</label>
                                                          <div class="col-md-9">
                                                               <input type="text" value="Chuyển khoản Banking/ATM" class="form-control cl-tim" name="">
                                                          </div>
                                                       
                                                      </div>
                                                </div>
                                                <div class="col-md-2">
                                                  <button class="btn btn-tim" onclick = "addAtm()"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm ngân hàng</button>
                                                </div>
                                                <div class="clearfix"></div>
                                                <?php foreach ($atmList as $key => $value) {
                                                ?>
                                                  <form action="<?php echo base_url()?>admin/settings/editAtm" method="post">
                                                <div class="col-md-3" style="margin-top: 15px;">
                                                 <div class="form-group">
                                                     <label for="username0" class=" control-label font-weight-unset">Tên ngân hàng</label>
                                                     <input type="text" class="form-control" value="<?php echo $key ?>" name="atm_name">
                                                    
                                                  </div>
                                              </div>
                                              <div class="col-md-6">
                                                 <div class="form-group" style="margin-left: 10px">
                                                     <label for="username0" class=" control-label font-weight-unset"></label>
                                                   
                                                    <textarea name="atm_content" rows="5" cols="4" class="form-control" style="font-size: 11px"><?php echo $value;?></textarea>
                                                    
                                                  </div>
                                              </div>
                                              <div class="col-md-3" style="margin-top: 24px;">
                                                <div class="form-group">
                                                     <label for="username0" class=" control-label font-weight-unset"></label>
                                                     <input type="submit" class="btn btn-inverse" value="Sửa" >
                                                    
                                                  </div>
                                                  <div class="form-group">
                                                     <label for="username0" class=" control-label font-weight-unset"></label>
                                                     <input type="button" class="btn btn-tim" value="Xóa" onclick="removeAtm('<?php echo $key;?>')">
                                                    
                                                  </div>
                                              </div>
                                              <div class="clearfix"></div>
                                            </form>
                                             <?php } ?>
                                             <div id="newAtm" style="display: none">
                                                  <form action="<?php echo base_url()?>admin/settings/addAtm" method="post">

                                               <div class="col-md-3" style="margin-top: 15px;">
                                                 <div class="form-group">
                                                     <label for="username0" class=" control-label font-weight-unset">Tên ngân hàng</label>
                                                     <input type="text" class="form-control" value="" name="atm_name">
                                                    
                                                  </div>
                                              </div>
                                              <div class="col-md-6">
                                                 <div class="form-group" style="margin-left: 10px">
                                                     <label for="username0" class=" control-label font-weight-unset"></label>
                                                   
                                                    <textarea name="atm_content" rows="5" cols="4" class="form-control" style="font-size: 11px"></textarea>
                                                    
                                                  </div>
                                              </div>
                                              <div class="col-md-3" style="margin-top: 48px;">
                                          
                                                  <div class="form-group">
                                                     <label for="username0" class=" control-label font-weight-unset"></label>
                                                     <input type="submit" class="btn btn-info" value="Lưu lại" name="">
                                                    
                                                  </div>
                                              </div>
                                               </form>
                                             </div>

                                              <div class="col-md-12">
                                                <div class="form-group">
                                                     <label for="username0" class=" control-label font-weight-unset"></label>
                                                     <div class="icheckbox_square-grey" style="position: relative;"><input type="checkbox" class="checkboxcls" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Tài khoản này xuất hóa đơn ?
                                                    
                                                  </div>
                                              </div>                      
                                              
                                            </div>
                                          </div>
                                        </div>





                                      </div>
                            <!-- end-->

                          </div>
                                
                              </div>
                            
                          </div>
                      </div>

                      <!-- menu -2-->
                     
                      <!-- end -->


                </div>
                <div class="panel panel-default col-md-12" style="    margin-bottom: -37px;">
                      <ul class="nav nav-tabs nav-justified" role="tablist">
                          <li class="active "><a href="#thanhtonataihospi" class="text-left clssthanhtoantaihopsi" data-toggle="tab" aria-expanded="true">Thanh Toán tại HOSPI</a></li>
                          <li class=""><a href="#FACILITIES" class="text-left" data-toggle="tab" aria-expanded="false"></a></li>
                          <li class=""><a href="#" class="text-left" data-toggle="tab" aria-expanded="false"></a></li>
                         <li class=""><a href="#" class="text-left" data-toggle="tab" aria-expanded="false"></a></li>
                      </ul>
                      <div class="panel-body">
                          <div class="tab-content ">
                              <div class="tab-pane wow fadeIn animated active" id="thanhtonataihospi">
                                 <div class="row">
        <div>
                                        <div class="col-md-12">
                                          <div class="panel panel-default">
                                           
                                            <div class="panel-body" style="padding-top: 0px;padding-bottom: 0px">
                                           
                                                  <form action="<?php echo base_url()?>admin/settings/editPaymentMethod?payment_type=payatoffice" method="post">
 
                                              <div class="col-md-8">
                                                   <div class="form-group ">
                                                          <label for="select-standard" class="col-md-3 font-weight-unset ">Tên phương thức</label>
                                                          <div class="col-md-9">
                                                               <input type="text" value="<?php echo $payatoffice['name']?>" class="form-control cl-tim" name="payment_method_name">
                                                          </div>
                                                       
                                                      </div>
                                                </div>
                                               
                                             
                                              <div class="clearfix"></div>
                                                <div class="col-md-9">
                                                   <div class="form-group ">
                                                          <label for="select-standard" class=" font-weight-unset "></label>
                                                         <textarea  name ="payment_method_content" cols="4" rows="9" style="font-size: 12px" class="form-control"><?php echo $payatoffice['instructions']?>
                                                         </textarea>
                                                              
                                                      </div>
                                                </div>
                                                  <div class="col-md-3" style="margin-top: 60px;">
                                                <div class="form-group">
                                                     <label for="username0" class=" control-label font-weight-unset"></label>
                                                     <input type="submit" class="btn btn-inverse" value="Sửa" name="">
                                                    
                                                  </div>
                                                  <div class="form-group">
                                                     <label for="username0" class=" control-label font-weight-unset"></label>
                                                     <input type="button" class="btn btn-tim" value="Xóa" name="">
                                                    
                                                  </div>
                                              </div>         
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                        




                                      </div>
                            <!-- end-->

                          </div>
                                
                              </div>
                            
                          </div>
                      </div>

                      <!-- menu -2-->
                     
                      <!-- end -->


                </div>
                <div class="panel panel-default col-md-12">
                      <ul class="nav nav-tabs nav-justified" role="tablist">
                          <li class="active "><a href="#thanhtonataihospi" class="text-left clssthanhtoantainha" data-toggle="tab" aria-expanded="true">Thanh Toán tại nhà</a></li>
                          <li class=""><a href="#FACILITIES" class="text-left" data-toggle="tab" aria-expanded="false"></a></li>
                          <li class=""><a href="#" class="text-left" data-toggle="tab" aria-expanded="false"></a></li>
                         <li class=""><a href="#" class="text-left" data-toggle="tab" aria-expanded="false"></a></li>
                      </ul>
                      <div class="panel-body">
                          <div class="tab-content ">
                              <div class="tab-pane wow fadeIn animated active" id="thanhtonataihospi">
                                 <div class="row">
        <div>
                                        <div class="col-md-12">
                                          <div class="panel panel-default">
                                           
                                            <div class="panel-body" style="padding-top: 0px;padding-bottom: 0px">
                                           
                                                  <form action="<?php echo base_url()?>admin/settings/editPaymentMethod?payment_type=cod" method="post">
 
                                              <div class="col-md-8">
                                                   <div class="form-group ">
                                                          <label for="select-standard" class="col-md-3 font-weight-unset ">Tên phương thức</label>
                                                          <div class="col-md-9">
                                                               <input type="text" value="<?php echo $cod['name']?>" class="form-control cl-tim" name="payment_method_name">
                                                          </div>
                                                       
                                                      </div>
                                                </div>
                                               
                                             
                                              <div class="clearfix"></div>
                                                <div class="col-md-9">
                                                   <div class="form-group ">
                                                          <label for="select-standard" class=" font-weight-unset "></label>
                                                         <textarea   name ="payment_method_content" cols="4" rows="12" style="font-size: 12px;"  class="form-control"><?php echo $cod['instructions']?></textarea>
                                                          
                                                         
                                                              
                                                      </div>
                                                </div>
                                                <div class="col-md-3" style="margin-top: 87px;">
                                                <div class="form-group">
                                                     <label for="username0" class=" control-label font-weight-unset"></label>
                                                     <input type="submit" class="btn btn-inverse" value="Sửa" name="">
                                                    
                                                  </div>
                                                  <div class="form-group">
                                                     <label for="username0" class=" control-label font-weight-unset"></label>
                                                     <input type="button" class="btn btn-tim" value="Xóa" name="">
                                                    
                                                  </div>
                                              </div>
                                                              
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                        




                                      </div>
                            <!-- end-->

                          </div>
                                
                              </div>
                            
                          </div>
                      </div>

                      <!-- menu -2-->
                     
                      <!-- end -->


                </div>
                <!-- eq 4-->

                <div class="clearfix"></div>
</div>


<script type="text/javascript">
  function addAtm(){
    $("#newAtm").show();
  }
function removeAtm(bank_name){
  url = "<?php echo base_url()?>admin/settings/removeAtm?bankname="+bank_name;
  window.location.href = url;
  }

</script>