<div class="container" id="content">
      <!-- content-->
        <div class="panel panel-default">
  <div class="panel-heading">Quản lý vị trí</div>
  <div class="clearfix"></div>
  
    
   <div class="panel-body" style="padding-top:5px;">
    <div class="panel panel-default" style="margin-bottom:5px !important">
     <!--    <button type="button" style="background: #660033;margin-left: 15px;margin-top: 15px;" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i>Thêm vị trí</button> -->
          <a href="<?php echo base_url().'admin/locations/create'; ?>" style="background: #660033;margin-left: 15px;margin-top: 15px;" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i>Thêm vị trí</a>
        <div class="panel-body" style="padding-top: 15px;">
          <form class="form-inline" id="searchForm" role="form" method="GET" action="https://www.hospi.vn/admin/hotels">
            <div class="form-group" style="width:200px;">              
            
              <div class="select2-container form-control chosen-select" id="s2id_hotel_city" style="width: 100%;"><a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1">   <span class="select2-chosen">Thành phố</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow"><b></b></span></a><input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen1"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input">   </div>   <ul class="select2-results">   </ul></div></div><select class="form-control chosen-select select2-offscreen" name="hotel_city" id="hotel_city" tabindex="-1">
                <option value="">Thành phố</option>
                               
               </select>
            </div>
           
            <div class="form-group" style="width:200px;">              
              <div class="select2-container form-control chosen-select" id="s2id_hotel_status" style="width: 100%;"><a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1">   <span class="select2-chosen">Quốc gia</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow"><b></b></span></a><input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen2"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input">   </div>   <ul class="select2-results">   </ul></div></div><select class="form-control chosen-select select2-offscreen" name="hotel_status" id="hotel_status" tabindex="-1">
                <option value="">Quốc gia</option>
                              
              </select>
            </div>             
 

            <button type="submit" class="btn btn-inverse btn-sm">Lọc</button>
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
                <th>Thành Phố</th>
                <th>Quốc Gia</th>      
                <th>Vĩ Độ</th>                              
                <th>kinh Độ</th>
                <th>Trạng Thái</th>
                <th>Chỉnh Sửa</th>              
             
              </tr>
            </tbody>
            <tbody>
              <?php 
                foreach ($locations as $key => $location) {
                  $editLink =  base_url() . 'admin/locations/edit/'.$location->id;
                   $delLink =  base_url() . 'admin/ajaxcalls/delAcc';

              ?>
               <tr id="row-594" style="background: #e5e5e5">
                <td>
                 <div class="icheckbox_square-grey" style="position: relative;"><input type="checkbox" name="" class="checkboxcls" value="594" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                </td>
                  
                <td>
                  <span><?php echo $location->location?></span>
                </td>          
                <td>
                <?php echo $location->country?>
                </td>
                <td>                  
                <?php echo $location->latitude?>
                
                </td>
                <td>
                <?php echo $location->longitude?>
                 </td>
                <td>
                     <?php if( $location->status == 'Yes'){?>
                   <i class="fa fa-check cl-tim" aria-hidden="true"></i>
                    <?php }?>
                  </td>
                             
               
                <td style="white-space:nowrap; text-align:right">   
                

                    <a href="<?php echo  $editLink ?>" class="btn btn-warning btn-sm" target="_self">
                      <i class="fa fa-edit"></i>
                    </a>
                    <a onclick="javascript: delfunc('594','https://www.hospi.vn/admin/hotelajaxcalls/delHotel')" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i></a>

                 </td>
              </tr> 
                  <?php }?>   
                         
          </tbody>
          </table>
            <div class="text-center">
             <!--  <ul class="pagination"><li class="active"><span>1</span></li><li><a href="https://www.hospi.vn/admin/hotels?page=2">2</a></li><li><a href="https://www.hospi.vn/admin/hotels?page=3">3</a></li><li class="disabled"><span>...</span></li><li><a href="https://www.hospi.vn/admin/hotels?page=5">5</a></li><li><a href="https://www.hospi.vn/admin/hotels?page=2">»</a></li></ul> -->

            </div>
          </div>  
        </div>        
      </div>
   </div>
      <!-- end-->

    </div>