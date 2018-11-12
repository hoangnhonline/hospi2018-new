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
                  <h3 class="panel-title">ĐĂNG KÝ</h3>
                 
                </div>
                <div class="panel-body">
                  <form action="" method="POST" role="form">
                    <div class="col-md-12">
                      <div class="col-md-4">
                        <div class="form-group">
                              <label for="select-standard" class="font-weight-unset">Họ tên khách hàng</label>
                              <input type="text" name="fname" value="<?php echo setFrmVal(@$profile[0]->ai_first_name,set_value('fname')); ?>" class="form-control">
                          </div>
                      </div>
                        <div class="col-md-4">
                        <div class="form-group">
                              <label for="select-standard" class="font-weight-unset">Giới tính</label>
                              <div class="select2-container form-control chosen-select" id="s2id_autogen1" style="width: 100%;"><a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1">   <span class="select2-chosen">Nam</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow"><b></b></span></a><input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen2"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input">   </div>   <ul class="select2-results">   </ul></div></div><select class="form-control chosen-select select2-offscreen" tabindex="-1">
                                <option>Nam</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                              <label for="select-standard" class="font-weight-unset">Ngày sinh</label>
                              <input type="text" name="" class="form-control">
                             
                          </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                              <label for="select-standard" class="font-weight-unset">Email</label>
                              <input type="email" name="email" value="<?php echo setFrmVal(@$profile[0]->accounts_email,set_value('email')); ?>" class="form-control">
                             
                          </div>
                      </div>
                      <div class="clearfix"></div>
                     
                     
                         
                     
                          <div class="col-md-6">
                        <div class="form-group">
                              <label for="select-standard" class="font-weight-unset">Mật khẩu</label>
                              <input type="password"  name="password" class="form-control">
                             
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                              <label for="select-standard" class="font-weight-unset">Nhập lại mật khẩu</label>
                              <input type="password"  name="re_password" class="form-control">
                             
                          </div>
                      </div>
                       <div class="col-md-12">
                        <div class="form-group">
                              <label for="select-standard" class="font-weight-unset">Địa chỉ</label>
                              <input type="text" name="address1" value="<?php echo setFrmVal(@$profile[0]->ai_address_1,set_value('address1')); ?>" class="form-control">
                             
                          </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                              <label for="select-standard" class="font-weight-unset">Trạng thái</label>
                             <select name="status" class="form-control chosen-select select2">
                              <option value="yes" <?php  makeSelected(@$profile[0]->accounts_status,"yes"); ?>>Cho phép</option>
                              <option value="no"  <?php  makeSelected(@$profile[0]->accounts_status,"no"); ?> >Khóa</option>
                              </select>
                          </div>
                      </div>
                      <div class="clearfix"></div>
                       <div class="col-md-12 text-center">
                          <input type="hidden" name="<?php echo $viewtype;?>" value="1" />
                          <input type="hidden" name="type" value="<?php echo $type;?>" />
                          <input type="hidden" name="oldemail" value="<?php echo @$profile[0]->accounts_email;?>" />
                         <button class="btn-tim" style="padding-right: 20px;padding-left: 20px;padding-top: 10px;padding-bottom: 10px">Đăng Ký</button>
                       </div>
                   </div>
                    
                    </form></div>
           
                   
                     
                    
                  
                </div>
              </div>
            </div>
            
          </div>

