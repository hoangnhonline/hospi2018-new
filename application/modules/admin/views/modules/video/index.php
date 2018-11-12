<div class="container" id="content">
      <!-- content-->
        <div class="panel panel-default">
  <div class="panel-heading">Quản lý vị trí</div>
  <div class="clearfix"></div>
  
    
   <div class="panel-body" style="padding-top:5px;">
    <div class="panel panel-default" style="margin-bottom:5px !important">
        <a href="<?php echo base_url() . 'admin/video/add'; ?>" style="background: #660033;margin-left: 15px;margin-top: 15px;" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> Đăng</a>
        <div class="panel-body" style="padding-top: 15px;">
          <form class="form-inline" id="searchForm" role="form" method="GET" action="https://www.hospi.vn/admin/hotels">
            <div class="form-group" style="width:200px;">              
            
              <div class="select2-container form-control chosen-select" id="s2id_autogen1" style="width: 100%;"><a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1">   <span class="select2-chosen">Danh mục chính</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow"><b></b></span></a><input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen2"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input">   </div>   <ul class="select2-results">   </ul></div></div><select class="form-control chosen-select select2-offscreen" name="hotel_city" tabindex="-1">
                <option value="">Danh mục chính</option>
                               
               </select>
            </div>
           
            <div class="form-group" style="width:200px;">              
              <div class="select2-container form-control chosen-select" id="s2id_autogen3" style="width: 100%;"><a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1">   <span class="select2-chosen">Danh mục con</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow"><b></b></span></a><input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen4"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input">   </div>   <ul class="select2-results">   </ul></div></div><select class="form-control chosen-select select2-offscreen" name="hotel_status" tabindex="-1">
                <option value="">Danh mục con</option>
                              
              </select>
            </div>             
            <div class="form-group">  
            <input type="text" class="form-control" name="" placeholder="Tiêu đề">            
              
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
                <th>Hình ảnh</th>
                <th style="width: 300px">Tiêu đề</th>      
                <th>Danh Mục</th>                              
                <th>Người Đăng</th>
                <th>Ngày Đăng</th>
                <th>Chỉnh Sửa</th>              
             
              </tr>
            </tbody>
            <tbody>
               <tr id="row-594" style="background: #e5e5e5">
                 <td style="vertical-align: middle;">
                 <div class="icheckbox_square-grey" style="position: relative;"><input type="checkbox" name="" class="checkboxcls" value="594" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                </td>
                <td style="vertical-align: middle;">
                    <img src="/assets/img/images-2-1.png" style="width: 80px">
                </td>
                  
                <td style="vertical-align: middle;">
                  <span style="color: #00ccff">Hot : Hoa anh đào nổ rộ trong hồ pá khoang Điện Biên</span>
                </td>          
                <td style="vertical-align: middle;">
                  Điểm Đến
                </td>
              
                <td style="vertical-align: middle;">
                  Võ Đình Chi
                 </td>
                <td style="vertical-align: middle;">
                  20/10/2017,09:10PM
                  </td>
                             
               
                <td style="white-space:nowrap; text-align:right;vertical-align: middle;">   
                  <a onclick="javascript: delfunc('594','https://www.hospi.vn/admin/hotelajaxcalls/delHotel')" class="btn btn-info btn-sm"><i class="fa fa-search-plus"></i></a>


                    <a href="https://www.hospi.vn/admin/hotels/manage/can-ho-norfolk-mansion" class="btn btn-warning btn-sm" target="_self">
                      <i class="fa fa-edit"></i>
                    </a>
                    <a onclick="javascript: delfunc('594','https://www.hospi.vn/admin/hotelajaxcalls/delHotel')" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i></a>

                 </td>
              </tr> 
                          
                         
          </tbody>
          </table>
            <div class="text-center"><ul class="pagination"><li class="active"><span>1<!--<span--></span></li><li><a href="https://www.hospi.vn/admin/hotels?page=2">2</a></li><li><a href="https://www.hospi.vn/admin/hotels?page=3">3</a></li><li class="disabled"><span>...</span></li><li><a href="https://www.hospi.vn/admin/hotels?page=5">5</a></li><li><a href="https://www.hospi.vn/admin/hotels?page=2">»</a></li></ul></div>
          </div>  
        </div>        
      </div>
   </div>
      <!-- end-->

    </div>