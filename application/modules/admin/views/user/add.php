<?php
$validationerrors = validation_errors();
if(isset($errormsg) || !empty($validationerrors)){
?>
<div class="alert alert-danger">
<i class="fa fa-times-circle"></i>
<?php
echo @$errormsg;
echo $validationerrors; ?>
</div>
<?php
}
?>



<div class="container" id="content">
      <!-- content-->
       <div class="row">
       
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title"><?php echo $headertitle;?></h3>

                </div>
                <div class="panel-body">
                  <form role="form" action="" method="POST">
                    <div class="col-md-7">
                        <div class="col-md-3">
                        <div class="form-group">
                              <label for="select-standard" class="font-weight-unset">Mã nhân viên</label>
                              <input type="text" name="" class="form-control">
                             
                          </div>
                      </div>
                        <div class="col-md-9">
                        <div class="form-group">
                              <label for="select-standard" class="font-weight-unset">Họ tên nhân viên</label>
                               <input class="form-control" type="text" placeholder="Tên" name="fname" value="<?php echo setFrmVal(@$profile[0]->ai_first_name,set_value('fname')); ?>">
                             
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                              <label for="select-standard" class="font-weight-unset">Email</label>
                              <input class="form-control" type="email" placeholder="Email" name="email" value="<?php echo setFrmVal(@$profile[0]->accounts_email,set_value('email')); ?>">
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                              <label for="select-standard" class="font-weight-unset">Số điện thoại</label>
                              <input class="form-control" type="text" placeholder="Số điện thoại" name="mobile" value="<?php echo setFrmVal(@$profile[0]->ai_mobile,set_value('mobile')); ?>">
                          </div>
                      </div>
                       <div class="col-md-6">
                        <div class="form-group">
                              <label for="select-standard" class="font-weight-unset">Ngày sinh</label>
                              <input type="text" name="" class="form-control">
                             
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                              <label for="select-standard" class="font-weight-unset">Ngày bắt đầu làm việc tại công ty</label>
                              <input type="text" name="" class="form-control">
                             
                          </div>
                      </div>
                          <div class="col-md-6">
                        <div class="form-group">
                              <label for="select-standard" class="font-weight-unset">Chức vụ</label>
                              <input type="text" name="" class="form-control">
                             
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                              <label for="select-standard" class="font-weight-unset">Phòng ban</label>
                              <input type="text" name="" class="form-control">
                             
                          </div>
                      </div>
                          <div class="col-md-6">
                        <div class="form-group">
                              <label for="select-standard" class="font-weight-unset">Mật khẩu</label>
                              <input class="form-control" type="password" placeholder="Mật khẩu" name="password">
                             
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                              <label for="select-standard" class="font-weight-unset">Nhập lại mật khẩu</label>
                              <input type="password" name="" class="form-control">
                             
                          </div>
                      </div>
                       <div class="col-md-12">
                        <div class="form-group">
                              <label for="select-standard" class="font-weight-unset">Địa chỉ</label>
                              <input class="form-control" type="text" placeholder="Full address" name="address1" value="<?php echo setFrmVal(@$profile[0]->ai_address_1,set_value('address1')); ?>">

                          </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                              <label for="select-standard" class="font-weight-unset">Trạng thái</label>
                              <!-- <div class="select2-container form-control chosen-select" id="s2id_autogen1" style="width: 100%;"><a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1">   <span class="select2-chosen">Cho phép</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow"><b></b></span></a><input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen2"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input">   </div>   <ul class="select2-results">   </ul></div></div> -->


                               <select name="status" class="form-control chosen-select select2-offscreen">
                                <option value="yes" <?php  makeSelected($profile[0]->accounts_status,"yes"); ?>>Cho phép</option>
                                <option value="no"  <?php  makeSelected($profile[0]->accounts_status,"no"); ?> >Khóa</option>
                                </select>
                             
                          </div>
                      </div>
                       <input type="hidden" name="<?php echo $viewtype;?>" value="1" />
                      <input type="hidden" name="type" value="<?php echo $type;?>" />
                      <input type="hidden" name="oldemail" value="<?php echo @$profile[0]->accounts_email;?>" />
                      <input type="hidden" name="lname" value="" />
                      <input type="hidden" name="country" value="VN" />

                      

                      <div class="clearfix"></div>
                       <div class="col-md-12 text-center">
                         <button class="btn-tim" style="padding-right: 20px;padding-left: 20px;padding-top: 10px;padding-bottom: 10px">Thêm quyền admin</button>
                       </div>
                   </div>
                    <div class="col-md-5">
                          
                      <div class="panel panel-default">
                          <div class="panel-heading text-center" style="background-color: #cccccc;">
                            <h3 class="panel-title">Thêm</h3>
                           
                          </div>
                          <div class="panel-body" style="padding-top: 10px;padding-bottom: 10px;background: #e0e0e0;">
                               <?php foreach($mainmodules as $md) { if($md != "smsaddon"){ ?>
       
        <div class="col-md-6" style="margin-top: 15px">
               <div class="icheckbox_square-grey" style="position: relative;">
               <input name="permissions[]"  type="checkbox" class="form-control checkboxcls" value="<?php echo "add".$md;?>" <?php if(in_array("edit".$md,$permitted) || set_value('permissions[]') == "add".$md){ echo "checked"; } ?> >
             </div> 
                <?php echo ucfirst($md);?>
        </div>
                             
        <?php } } ?>
          <div class="col-md-6" style="margin-top: 15px">
               <div class="icheckbox_square-grey" style="position: relative;">
               <input name="permissions[]"  type="checkbox" class="form-control checkboxcls" value="<?php echo "addlocations";?>" <?php if(in_array("addlocations",$permitted) || set_value('permissions[]') == "addlocations"){ echo "checked"; } ?> >
             </div> 
                Bookings
        </div>
         <div class="col-md-6" style="margin-top: 15px">
               <div class="icheckbox_square-grey" style="position: relative;">
               <input name="permissions[]"  type="checkbox" class="form-control checkboxcls" value="<?php echo "addbooking";?>" <?php if(in_array("addbooking",$permitted) || set_value('permissions[]') == "addbooking"){ echo "checked"; } ?> >
             </div> 
               Locations
        </div>
                         </div>
                      </div>

                      <div class="panel panel-default">
                          <div class="panel-heading text-center" style="background-color: #cccccc;">
                            <h3 class="panel-title">Chỉnh Sửa</h3>
                           
                          </div>
                          <div class="panel-body" style="padding-top: 10px;padding-bottom: 10px;background: #e0e0e0;">
                               <?php foreach($mainmodules as $md) { if($md != "smsaddon"){ ?>
       
        <div class="col-md-6" style="margin-top: 15px">
               <div class="icheckbox_square-grey" style="position: relative;">
               <input name="permissions[]"  type="checkbox" class="form-control checkboxcls" value="<?php echo "edit".$md;?>" <?php if(in_array("edit".$md,$permitted) || set_value('permissions[]') == "edit".$md){ echo "checked"; } ?> >
             </div> 
                <?php echo ucfirst($md);?>
        </div>
                             
        <?php } } ?>
          <div class="col-md-6" style="margin-top: 15px">
               <div class="icheckbox_square-grey" style="position: relative;">
               <input name="permissions[]"  type="checkbox" class="form-control checkboxcls" value="<?php echo "editlocations";?>" <?php if(in_array("editlocations",$permitted) || set_value('permissions[]') == "editlocations"){ echo "checked"; } ?> >
             </div> 
                Bookings
        </div>
         <div class="col-md-6" style="margin-top: 15px">
               <div class="icheckbox_square-grey" style="position: relative;">
               <input name="permissions[]"  type="checkbox" class="form-control checkboxcls" value="<?php echo "deletebooking";?>" <?php if(in_array("editbooking",$permitted) || set_value('permissions[]') == "editbooking"){ echo "checked"; } ?> >
             </div> 
               Locations
        </div>
                             
                         </div>
                       
                      </div>

                        <div class="panel panel-default">
                          <div class="panel-heading text-center" style="background-color: #cccccc;">
                            <h3 class="panel-title">Xóa</h3>
                           
                          </div>
                          <div class="panel-body" style="padding-top: 10px;padding-bottom: 10px;background: #e0e0e0;">
                             <?php foreach($mainmodules as $md) { if($md != "smsaddon"){ ?>
       
        <div class="col-md-6" style="margin-top: 15px">
               <div class="icheckbox_square-grey" style="position: relative;">
               <input name="permissions[]"  type="checkbox" class="form-control checkboxcls" value="<?php echo "delete".$md;?>" <?php if(in_array("delete".$md,$permitted) || set_value('permissions[]') == "delete".$md){ echo "checked"; } ?> >
             </div> 
                <?php echo ucfirst($md);?>
        </div>
                             
        <?php } } ?>
          <div class="col-md-6" style="margin-top: 15px">
               <div class="icheckbox_square-grey" style="position: relative;">
               <input name="permissions[]"  type="checkbox" class="form-control checkboxcls" value="<?php echo "deletelocations";?>" <?php if(in_array("deletelocations",$permitted) || set_value('permissions[]') == "deletelocations"){ echo "checked"; } ?> >
             </div> 
                Bookings
        </div>
         <div class="col-md-6" style="margin-top: 15px">
               <div class="icheckbox_square-grey" style="position: relative;">
               <input name="permissions[]"  type="checkbox" class="form-control checkboxcls" value="<?php echo "deletebooking";?>" <?php if(in_array("deletebooking",$permitted) || set_value('permissions[]') == "deletebooking"){ echo "checked"; } ?> >
             </div> 
               Locations
        </div>
                         </div>
                       
                      </div>

                    </div>
                    </form></div>
           
                   
                     
                    
                  
                </div>
              </div>
            </div>
            
          </div>
<script type="text/javascript">
  $(function(){

    $(".verify").on("click",function(){ 
      var id = $(this).prop('id');
      var accType = "<?php echo $type;?>";
      var ask = confirm("Proceed to Verify this user.");
      if(ask){
        $.post("<?php echo base_url();?>admin/ajaxcalls/verifyAccount", {id: id, accType: accType}, function(resp){
          location.reload();
        });

      }else{
        return false;
      }

    })
  })
</script>




