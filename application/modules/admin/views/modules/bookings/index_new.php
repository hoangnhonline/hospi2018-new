<div class="container" id="content">
      <!-- content-->
        <div class="panel panel-default">
  <div class="panel-heading"><?php echo $header_title; ?></div>
  <div class="clearfix"></div>
  
    
   <div class="panel-body" style="padding-top:5px;">
    <div class="panel panel-default" style="margin-bottom:5px !important">
        <a href="<?php echo $add_hotel;?>" style="background: #660033;margin-left: 15px;margin-top: 15px;" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tạo E-Booking khách sạn</a>

        <a href="<?php echo $add_combo;?>" style="background: #660033;margin-left: 15px;margin-top: 15px;" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tạo E-Booking combo</a>
        <div class="panel-body" style="padding-top: 15px;">
          <form class="form-inline" id="searchForm" role="form" method="GET" action="<?php echo base_url() . 'admin/bookings'; ?>">
            <div class="form-group" style="width:200px;">              
            
               <!-- <div class="select2-container form-control chosen-select" id="s2id_autogen1" style="width: 100%;">
                <a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1">  
                 <span class="select2-chosen">Loại E-Booking</span><abbr class="select2-search-choice-close"></abbr> 
                   <span class="select2-arrow"><b></b></span></a>
                <input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen2">
                <div class="select2-drop select2-display-none select2-with-searchbox">  
                 <div class="select2-search">  
                     <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input">   </div>  
                      <ul class="select2-results">   </ul></div></div>
                <select class="form-control chosen-select select2-offscreen" tabindex="-1">
                <option value="">Loại E-Booking</option>
                               
               </select> -->

               <select class="form-control chosen-select" name="booking_type" id="booking_type">
                <option value="" >Tất cả</option>
               <option value="hotels" <?php echo isset($params['booking_type']) && 'hotels' == $params['booking_type'] ? "selected" : ""; ?>>
                Khách sạn
              </option>
              <option value="combo" <?php echo isset($params['booking_type']) && 'combo' == $params['booking_type'] ? "selected" : ""; ?>>
                Combo
              </option>
              <option value="honeymoon" <?php echo isset($params['booking_type']) && 'honeymoon' == $params['booking_type'] ? "selected" : ""; ?>>
                Honeymoon
              </option>
            </select>
            </div>
            <div class="form-group" style="width:200px;">              
            
              <!-- <div class="select2-container form-control chosen-select" id="s2id_autogen3" style="width: 100%;"><a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1">   <span class="select2-chosen">Tình trạng</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow"><b></b></span></a><input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen4"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input">   </div>   <ul class="select2-results">   </ul></div></div>


              <select class="form-control chosen-select select2-offscreen" tabindex="-1">
                <option value="">Tình trạng</option>
                               
               </select> -->

               <select class="form-control chosen-select select2-offscreen" name="booking_status" id="booking_status">
              <option value="">Tình trạng</option>
              <option value="unpaid" <?php echo isset($params['booking_status']) && 'unpaid' == $params['booking_status'] ? "selected" : ""; ?>>
                Chưa thanh toán
              </option>
              <option value="paid" <?php echo isset($params['booking_status']) && 'paid' == $params['booking_status'] ? "selected" : ""; ?>>
                Đã thanh toán
              </option>
              <option value="reserved" <?php echo isset($params['booking_status']) && 'reserved' == $params['booking_status'] ? "selected" : ""; ?>>
                Đã cọc
              </option>
              <option value="cancelled" <?php echo isset($params['booking_status']) && 'cancelled' == $params['booking_status'] ? "selected" : ""; ?>>
                Đã hủy
              </option>
            </select>

            </div>
                     
            <div class="form-group">  
            <input type="text" class="form-control" name="booking_ref_no" value="<?php echo isset($params['booking_ref_no']) ? $params['booking_ref_no'] : ""; ?>" placeholder="Mã Booking">            
              
            </div>  
             <div class="form-group">  
                <input type="text" class="form-control" name="ai_last_name" value="<?php echo isset($params['ai_last_name']) ? $params['ai_last_name'] : ""; ?>" placeholder="Tên khách hàng">            
              
            </div>    
            
            <button type="submit" class="btn btn-inverse btn-md">Lọc</button>
          </form>         
        </div>
      </div>
     <div class="box">       
            <div class="btn-group pull-right padding-left-right-15">
                <a style="margin-bottom: 5px;" href="javascript: multiDelfunc('<?php echo base_url(); ?>admin/bookings/delMultipleBookings', 'checkboxcls')" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Xóa mục đã chọn</a> 

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
                    <div class="icheckbox_square-grey" style="position: relative;">
                      <input class="all" type="checkbox" value="" id="select_all" >
                    </div>
                </th>
                <th>Mã Booking</th>
                <th>E - Booking</th>      
                <th>Họ Tên</th>                              
                <th>Tổng</th>
                <th>Tình Trạng</th>
                 <th>Ngày đặt</th>    
                <th>Chỉnh Sửa</th>              
             
              </tr>
            </tbody>
            <tbody>
              <?php if (!empty($content)) {
                $i = 0;
                foreach ($content as $item) {
                  $i++;
                  if($item->booking_type =='hotels'){
                     $editLink =  base_url() . 'admin/bookings/edithotel?id='.$item->booking_id;
                  }elseif ($item->booking_type =='combo') {
                     $editLink =  base_url() . 'admin/bookings/editcombo?id='.$item->booking_id;
                  }else{
                     $editLink =  base_url() . 'admin/bookings/edit/offers/' . $item->booking_id;
                  }
              ?>
               <tr id="row-595" style="background: #e5e5e5">
                 <td style="vertical-align: middle;">
                 <div class="icheckbox_square-grey" style="position: relative;">
                  <input type="checkbox" name="id[]" class="checkboxcls" value="<?= $item->booking_id ?>" >
                </div>
                </td>
                <td style="vertical-align: middle;">
                   <?php  echo $item->booking_ref_no;?>
                </td>
                  
                <td style="vertical-align: middle;">
                  <?php echo $item->booking_type == "hotels" ? "Khách sạn" : $item->booking_type; ?>
                </td>          
                <td style="vertical-align: middle;">
                  <?php echo $item->ai_last_name; ?>
                </td>
              
                <td style="vertical-align: middle;">
                  <?php echo number_format($item->booking_remaining); ?> VND
                 </td>
                   <td style="vertical-align: middle;">
                  <?php
                  if ($item->booking_status == "unpaid")
                    echo "<span style=color:red>Chưa thanh toán</span>";
                  elseif ($item->booking_status == "paid")
                    echo "<span style=color:green>Đã thanh toán</span>";
                  elseif ($item->booking_status == "reserved")
                    echo "Đã cọc";
                  else
                    echo "Đã hủy";

                  ?>
                  </td>
                <td style="vertical-align: middle;">
                  <?php echo date('d/m/Y', $item->booking_date); ?>
                  </td>
                             
               
                <td style="white-space:nowrap; text-align:right;vertical-align: middle;">   
                  <a href="<?php echo base_url(); ?>invoice?id=<?php echo $item->booking_id; ?>&sessid=<?php echo $item->booking_ref_no; ?>" class="btn btn-info btn-sm"><i class="fa fa-search-plus"></i></a>

                    <a href="<?php echo $editLink  ?>" class="btn btn-warning btn-sm" target="_self">
                      <i class="fa fa-edit"></i>
                    </a>
                      <?php
                  if ($deletepermission) {
                    $delurl = base_url() . 'admin/bookings/deleteBooking?id='.$item->booking_id;

                    ?>
                    <a href="<?php echo   $delurl ; ?>" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i></a>
                  <?php } ?>

                 </td>
              </tr>
              <?php }
          } else { ?>
            <tr>
              <td colspan="12">Không có dữ liệu.</td>
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


    <script type="text/javascript">
    $(document).ready(function () {
        $('#booking_type, #hotel_stars, #booking_status').change(function () {
            $(this).parents('form').submit();
        });
        $('#hotel_is_featured').on('ifChanged', function () {
            $(this).parents('form').submit();
        });
    });
</script>