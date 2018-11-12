<div class="container" id="content">
      <!-- content-->
        <div class="panel panel-default">
  <div class="panel-heading">Quản lý người dùng</div>
  <div class="clearfix"></div>
  
    
   <div class="panel-body" style="padding-top:5px;">
   
     <div class="box">    
     <a href="<?php echo base_url() . 'admin/user/add' ?>" style="background: #660033;margin-left: 15px;margin-top: 15px;" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm quyền ADMIN</a>   
            <div class="btn-group pull-right padding-left-right-15">
                <a style="margin-bottom: 5px;" href="javascript: multiDelfunc('<?php echo base_url(); ?>admin/ajaxcalls/delete_multiple_customer', 'checkboxcls')"  class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Xóa mục đã chọn</a> 

                  <a style="margin-bottom: 5px;margin-left: 20px;" href="" class="btn btn-default"><i class="glyphicon glyphicon-print"></i> In trang</a> 
                   <a style="margin-bottom: 5px;margin-left: 20px;" href="" class="btn btn-default"><i class="glyphicon glyphicon-file"></i> Xuất CSV</a> 
            </div>
                <div class="clearfix"></div>
        <!-- /.box-header -->
        <div class="box-body">
          
          <table class="table table-bordered" id="table-list-data">
            <tbody>
              <tr style="background: #d8d8d8">
                <th style="width: 1%">
                    <div class="icheckbox_square-grey" style="position: relative;"><input class="all" type="checkbox" value="" id="select_all" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                </th>
                <th>Mã nhân viên</th>
                <th>Họ tên tên nhân viên</th>      
                <th>Email</th>                              
                <th>Ngày tạo</th>
                <th>Lần đăng nhập cuối</th>
                 <th>Lịch sử</th>   
                  <th>Tình trạng</th>  
                <th>Chỉnh Sửa</th>              
             
              </tr>
            </tbody>
            <tbody>
                 <?php $i= 0;
                //var_dump($content[0]);
                foreach ($content as $key => $value) {
                  $i++;
                  $editLink =  base_url() . 'admin/user/edit?id='.$value->accounts_id;
                  $delLink =  base_url() . 'admin/ajaxcalls/delAcc';
                  # code...
                ?>
               <tr id="row-594" style="background: #e5e5e5">
                 <td style="vertical-align: middle;">
                 <div class="icheckbox_square-grey" style="position: relative;"><input type="checkbox" name="" class="checkboxcls" value="<?php echo $value->accounts_id?>" ></div>
                </td>
                <td style="vertical-align: middle;">
                   <?php echo $i;?>
                </td>
                  
                <td style="vertical-align: middle;">
                   <?php echo $value->ai_first_name.' '.$value->ai_last_name;?>
                </td>          
                <td style="vertical-align: middle;">
                   <?php echo $value->accounts_email;?>
                </td>
              
                <td style="vertical-align: middle;">
                   <?php echo $value->accounts_created_at;?> 
                 </td>
                  <td style="vertical-align: middle;">
                   <?php echo $value->accounts_last_login;?> 
                 </td>
                  <td style="vertical-align: middle;">
                   <span style="color: #0099cc">Quản lý</span>
                 </td>
                <td style="vertical-align: middle;">
                  <?php if( $value->accounts_status){ ?>
                  <i class="fa fa-check cl-tim" aria-hidden="true"></i>
                  <?php } ?>
                  </td>
                             
               
                <td style="white-space:nowrap; text-align:right;vertical-align: middle;">   
                  


                    <a href="<?php echo  $editLink ?>" class="btn btn-warning btn-sm" target="_self">
                      <i class="fa fa-edit"></i>
                    </a>
                    <a onclick="javascript: delfunc('<?php echo $value->accounts_id ?>','<?php echo $delLink; ?>')" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i></a>

                 </td>
              </tr> 
              <?php } ?>               
          </tbody>
          </table>
                 <div class="text-center"><?php echo createPagination($info); ?></div>

          </div>  
        </div>        
      </div>
   </div>
      <!-- end-->

    </div>