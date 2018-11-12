<div class="container" id="content">
      <!-- content-->
        <div class="panel panel-default">
  <div class="panel-heading">Quản lý honeymoom</div>
  <div class="clearfix"></div>
  
    
   <div class="panel-body" style="padding-top:5px;">
    <div class="panel panel-default" style="margin-bottom:5px !important">
        <a href="<?php echo $add_link; ?>" style="background: #660033;margin-left: 15px;margin-top: 15px;" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm honeymoom</a>
        <div class="panel-body" style="padding-top: 15px;">
          <form class="form-inline" id="searchForm" role="form" method="GET" action="https://www.hospi.vn/admin/hotels">
            <div class="form-group" style="width:200px;">              
            
              <div class="select2-container form-control chosen-select" id="s2id_autogen1" style="width: 100%;"><a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1">   <span class="select2-chosen">Thành Phố</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow"><b></b></span></a><input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen2"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input">   </div>   <ul class="select2-results">   </ul></div></div><select class="form-control chosen-select select2-offscreen" tabindex="-1">
                <option value="">Thành Phố</option>
                               
               </select>
            </div>
           
            <div class="form-group" style="width:200px;">              
              <div class="select2-container form-control chosen-select" id="s2id_autogen3" style="width: 100%;"><a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1">   <span class="select2-chosen">Tình trạng</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow"><b></b></span></a><input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen4"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input">   </div>   <ul class="select2-results">   </ul></div></div><select class="form-control chosen-select select2-offscreen" tabindex="-1">
                <option value="">Tình trạng</option>
                              
              </select>
            </div>             
            <div class="form-group">              
              <input type="text" class="form-control" name="" placeholder="Tên honeymoom">
            </div>

            <button type="submit" class="btn btn-inverse btn-md">Lọc</button>
          </form>         
        </div>
      </div>
     <div class="box">       
            <div class="btn-group pull-right padding-left-right-15">
                <a style="margin-bottom: 5px;" href="javascript: multiDelfunc('https://www.hospi.vn/admin/hotelajaxcalls/delMultipleHotels', 'checkboxcls')" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Xóa mục đã chọn</a> 

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
                <th>Ảnh </th>
                <th>Tên honeymoom </th>      
                <th>Hình ảnh</th>                              
                <th>Trạng thái</th>
                <th>Ngày đăng</th>
                <th>Chỉnh Sửa</th>              
             
              </tr>
            </tbody>
            <tbody>
                <?php if( !empty($content)) {
               $i = 0;
              foreach($content as $item ) {
                $i ++;   
                ?>
               <tr id="row-594" style="background: #e5e5e5">
                <td style="vertical-align: middle;">
                 <div class="icheckbox_square-grey" style="position: relative;"><input type="checkbox" name="" class="checkboxcls" value="594" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                </td>
                  
                <td style="vertical-align: middle;">
                   <img class="img-thumbnail" width="120" src="<?php echo '../../'.PT_OFFERS_THUMBS_UPLOAD.$item->offer_thumb; ?>" alt="<?php echo $item->offer_title; ?>" title="<?php echo $item->offer_title; ?>" style="width: 50px" />
                </td>          
                <td style="vertical-align: middle;">
 <a href="<?php echo base_url() . 'admin/hotels/manage/'.$item->offer_slug; ?>" target="_self"><?php echo $item->offer_title; ?></a>                </td>
                <td style="vertical-align: middle;">                  
                  <?php 
                  $CI = get_instance();
                  $role = $CI->session->userdata('pt_role');
                  if($role != "supplier"){
                    $role = "admin";
                  }

                  $photocounts =  isset($photoArr[$item->offer_id]) ? $photoArr[$item->offer_id] : 0;
                  echo "<a href=".base_url().$role."/offers/gallery/".$item->offer_id.">Tải hình ảnh (".$photocounts.")</a>";
                  ?>
                
                </td>
                <td style="vertical-align: middle;">
                   <?php 
                  if($item->offer_status == "Yes" || $item->offer_status == "yes"){
                    echo '<i class="fa fa-check cl-tim"></i>';
                  }else{
                   echo '<i class="fa fa-times text-danger"></i>';
                  }
                  ?>
                 </td>
                <td style="vertical-align: middle;">
                <?php echo date('d/m/Y', $item->offers_created_at); ?>           
                  </td>
                             
               
                <td style="white-space:nowrap; text-align:right;vertical-align: middle;">   
                  <a href="<?php echo base_url() . 'offers/'.$item->offer_slug; ?>" class="btn btn-info btn-sm"><i class="fa fa-search-plus"></i></a>


                    <a href="<?php echo base_url() . 'admin/honeymoon/manage/'.$item->offer_slug; ?>" class="btn btn-warning btn-sm" target="_self">
                      <i class="fa fa-edit"></i>
                    </a>
                    <a onclick="javascript: delfunc('<?php echo $item->offer_id; ?>','<?php echo $delurl; ?>')" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i></a>

                 </td>
              </tr> 
             <?php }} else { ?>
            <tr>
              <td colspan="12">Không có dữ liệu.</td>
            </tr>
            <?php } ?>               
                         
          </tbody>
          </table>
               <div class="text-center"><?php echo createPagination($info);?></div>
          </div>  
        </div>        
      </div>
   </div>
      <!-- end-->

    </div>